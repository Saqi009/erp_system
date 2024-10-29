<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('template/css/custom.css') }}">
    <title>Modern Login Page | AsmrProg</title>
</head>

<body>


    <div class="container" id="container">


        <div class="form-container sign-in">
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div>
                    <h1>Sign In</h1>
                </div>
                @session('adminpanel')
                    <div class="text-danger">{{ session('adminpanel') }}</div>
                @endsession
                @session('firstpanel')
                    <div class="text-danger">{{ session('firstpanel') }}</div>
                @endsession
                @session('secondpanel')
                    <div class="text-danger">{{ session('secondpanel') }}</div>
                @endsession
                @session('userpanel')
                    <div class="text-danger">{{ session('userpanel') }}</div>
                @endsession
                <span>or use your username password</span>
                <input type="user_name" name="user_name" placeholder="Username">
                @error('user_name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <input type="password" name="password" placeholder="Password">
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <a href="#">Forget Your Password?</a>
                <button type="submit" name="submit">Sign In</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Zingo Assist</h1>
                    <p>Only for Zingo Employees</p>
                    <!-- <button class="hidden" id="register">Sign Up</button> -->
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('template/js/custom.js') }}"></script>
</body>

</html>
