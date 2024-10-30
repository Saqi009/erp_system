<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('template/css/custom.css') }}">
    <title>Modern Login Page | AsmrProg</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>


    <div style="width: 70vw">
        <div class="container" id="container">


            <div class="form-container sign-in">
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div>
                        <h1>Sign In</h1>
                    </div>
                    @session('failure')
                        <div class="text-danger">{{ session('failure') }}</div>
                    @endsession
                    {{-- @session('adminpanel')
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
                @endsession --}}
                    <span>or use your username password</span>
                    <input type="email" name="user_email" placeholder="Email">
                    @error('user_email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <input type="password" name="password" placeholder="Password">
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
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
    </div>

    <script src="{{ asset('template/js/custom.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
