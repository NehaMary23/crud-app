<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png')}}">
    <link rel='stylesheet' href="{{ asset('css/edit.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
</head>
<body>        
    <form action="{{ route('registration.post') }}" method="POST" >
        @csrf
        <label for="Username">Username</label><br>
        <input type="text" name="username" required><br><br>
        <label for="Email">Email</label><br>
        <input type="text" name="email" required><br><br>
        <label for="Password">Password</label><br>
        <input type="password" name="password" required><br><br>
        <button class="btn btn-dark" type="submit">Sign Up</button>
    </form>
    <a href="{{ route('login')}}">Already have an account? Log in!</a>
    @if ($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    @if (session()->has('error'))
        {{session('error')}}
    @endif
    @if (session()->has('success'))
        {{session('success')}}
    @endif
</body>
</html>-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png')}}">
    <link rel='stylesheet' href="{{ asset('css/forgot.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
</head>
<body>        
    <div class="container">
        <div class="row">
            <div class="col-md-6 left">
                <h3>Welcome to Our Website</h3>
                <p>Love blogging? Then You're in the right place!
                    Join us today and start creating your own amazing blogs. 🚀</p>
                <div class="new">
                    <p>Already have an account?</p>
                    <a href="{{ route('login')}}" class="btn btn-light"> Log in</a><br>                    
                </div>
            </div>
            <div class="col-md-6 right">
                <h4>USER SIGN IN</h4>

                <form action="{{ route('registration.post') }}" method="POST" >
                    @csrf
                    <label for="Username">Username</label>
                    <div class="input-container">
                        <i class="fa fa-user"></i>
                        <input type="text" name="username" placeholder="Enter your Username" required>
                        @error('username')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>
                    <label for="Email">Email</label>
                    <div class="input-container">
                        <i class="fa fa-envelope"></i>
                        <input type="text" name="email" placeholder="Enter your Email" required>
                        @error('email')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>
                    <label for="Password">Password</label>
                    <div class="input-container">
                        <i class="fa fa-lock"></i>
                        <input type="password" name="password" placeholder="Enter your Password" required>
                        @error('password')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>
                    <button class="btn btn-dark" type="submit">Sign Up</button>
                </form>
            </div>
        </div>
    </div>
    
    

<script>
    @if (session()->has('error'))
        Swal.fire({
            icon: 'warning',
            title: '⚠️ Registration Failed!',
            text: "{{ session('error') }}",
            confirmButtonText: 'OK',
            confirmButtonColor: '#8B4513'
        });
    @endif
</script>


</body>
</html>