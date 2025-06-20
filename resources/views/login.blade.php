<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login In</title>
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png')}}">
    <link rel='stylesheet' href="{{ asset('css/login.css')}}">
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
                    <p>Don't have an account?</p>
                    <a href="{{ route('registration')}}" class="btn btn-light">Sign Up</a><br>                    
                </div>
            </div>
            <div class="col-md-6 right">
                <h4>USER LOG IN</h4>
                <form action="{{ route('login.post') }}" method="POST" >
                    @csrf
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
                    <div class="forgot">
                        <a href="{{ route('forgot')}}">Forgot Password?</a>
                    </div>
                    <button class="btn btn-dark" type="submit">Log in</button>
                </form>
            </div>
        </div>
        
    </div>
    
    

<script>
    @if (session()->has('error'))
        Swal.fire({
            icon: 'warning',
            title: '⚠️ Login Failed!',
            text: "{{ session('error') }}. Don't have an account? Then Sign Up",
            confirmButtonText: 'OK',
            confirmButtonColor: '#8B4513'
        });
    @endif
</script>


</body>
</html>