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
