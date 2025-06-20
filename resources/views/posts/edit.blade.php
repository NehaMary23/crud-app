<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png')}}">
    <link rel='stylesheet' href="{{ asset('css/edit.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7">
                    <h1>EDIT THIS POST</h1>
                </div>
                <div class="col-md-5">
                    <a class="btn btn-light" href="{{route('logout')}}">Logout</a>
                </div>
                <div class="col-sm-7">
                    <h1>EDIT THIS POST</h1>
                </div>
                <div class="col-sm-5">
                    <button><a href="{{route('logout')}}">Logout</a></button>
                </div>
            </div>
        </div>
    </div>
    <div class="posts">
        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label for="Title">Title</label><br>
            <input type="text" placeholder="Enter Title" name="title" value="{{ old('title', $post->title) }}" required><br><br>

            <label for="Body">Body</label><br>
            <textarea name="body" placeholder="Enter Message" required>{{ old('body', $post->body) }}</textarea><br><br>

            <label for="Image">Upload Image</label>  <br>                  
            <input type="file" name="image" accept="image/*" class="image" value="{{ old('image', $post->image) }}" required><br>
            @error('image')
                <div class="error-text">{{ $message }}</div>
            @enderror 
            <button type="submit" class="btn btn-dark">Save</button>
        </form>
    </div>
</body>
</html>