<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP OFFICES</title>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="">
    <nav class="navbar navbar-expand-lg navbar-light bg-orange">
        <div class="container-fluid container">
            <a class="navbar-brand" href="#"><img src="{{ asset('/images/logo.jpg') }}" alt=""></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent" style="justify-content: end;">
                <form class="d-flex" style="    position: relative;">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <i class="fa-solid fa-magnifying-glass" style="position: absolute;
    right: 20px;
    top: 11px;"></i>
                </form>
                <button class="btn btn-outline-success btn-login" type="submit">Đăng nhập</button>
            </div>
            <div class="d-flex">
{{--                <button class="btn btn-outline-success btn-login" type="submit">Đăng nhập</button>--}}
            </div>
        </div>
    </nav>

    <script src="{{ asset('vendor/popper.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap.min.js') }}"></script>
</body>
</html>
