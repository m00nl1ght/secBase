<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/app.css">
    <title>@yield('title-block')</title>
</head>
<body class="d-flex flex-column min-vh-100">
    @include('includes.header')
    <main role="main" class="container py-4">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                @include('includes.main_menu')
            </nav>
            <div class="col-md-9 ml-sm-auto col-lg-10 px-4">
                @yield('content')
            </div>
            
                
            
        </div>
    </main>
    @include('includes.footer')
</body>
</html>