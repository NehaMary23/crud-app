<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Posts</title>
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png')}}">
    <link rel='stylesheet' href="{{ asset('css/index.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    
    <div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7">
                    <h1>ALL POSTS!</h1>
                </div>
                <div class="col-md-5">
                    <a class="btn btn-light" href="{{route('logout')}}">Logout</a>
                </div>
                <div class="col-sm-7">
                    <h1>ALL POSTS!</h1>
                </div>
                <div class="col-sm-5">
                    <button><a href="{{route('logout')}}">Logout</a></button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="posts">
        <a href="{{ route('posts.create') }}" class="atag">✯ Create New Post ✯</a>   <!--Creates a link to the create() in the PostController since posts is the route created
                                                                    linking to PostController class {this posts is defined inside web.php}-->
        <div class="post-action">
            @foreach($posts as $post)
                <div class="post">
                    <h4>{{ $post->title }}</h4>
                    <p>{{ $post->body }}</p>
                    
                    <a class="btn btn-dark" href="{{ route('posts.edit', $post->id) }}">Edit</a>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-dark" type="submit" onclick="return confirm('Are you sure you want to delete the post?')">Delete</button>
                    </form>
                </div>
            @endforeach
        </div>
        
        
    </div>
    
</body>
</html>