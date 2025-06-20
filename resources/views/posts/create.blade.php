<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png')}}">
    <link rel='stylesheet' href="{{ asset('css/create.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <h1>CREATE A NEW POST</h1>
                </div>
                <div class="col-md-4">
                    <a class="btn btn-light" href="{{route('logout')}}">Logout</a>
                </div>
                <div class="col-sm-8">
                    <h1>CREATE A NEW POST</h1>
                </div>
                <div class="col-sm-4">
                    <button><a href="{{route('logout')}}">Logout</a></button>
                </div>
            </div>
        </div>
    </div>
    <div class="posts">
        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            @csrf
            <label for="Title">Title</label><br>
            <input type="text" placeholder="Enter Title" name="title" value="{{ old('title') }}" required><br><br>

            <label for="Body">Body</label><br>
            <textarea name="body" placeholder="Enter Message" required>{{ old('body') }}</textarea><br><br>

            <label for="Image">Upload Image</label>  <br>                  
            <input type="file" name="image" accept="image/*" class="image" required><br>
            @error('image')
                <div class="error-text">{{ $message }}</div>
            @enderror 
            <button type="submit" class="btn btn-dark">Save</button>
        </form>
    </div>

</body>
</html>