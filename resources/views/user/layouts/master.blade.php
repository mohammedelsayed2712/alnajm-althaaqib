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
<body>
   @include('user.layouts.top')
    <div class="right-part container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-3 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3 sidebar-sticky">
                    @include('user.layouts.sidebar')
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-9 px-md-4 pb-3">
              @yield('main_content')
            </main>
        </div>
    </div>
  @include('user.layouts.scripts')
</body>
</html>