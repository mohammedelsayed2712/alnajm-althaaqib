<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('uploads/logo.png') }}">
    @include('user.layouts.styles')
    <link href="https://fonts.googleapis.com/css2?family=Sen:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet">
</head>
<body class="body-login">
    <div class="container-login">
        <main class="form-signin w-100 m-auto">
            <h1 class="text-center">Admin Login</h1>
            <form action="{{ route('admin_login_submit') }}" method="post">
                @csrf
                <div class="form-floating">
                    <input type="text" name="email" class="form-control" placeholder="" id="floatingInput" autocomplete="off">
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control" placeholder="" id="floatingPassword" autocomplete="off">
                    <label for="floatingPassword">Password</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
            </form>
        </main>
    </div>
    @include('user.layouts.scripts')
</body>
</html>


    