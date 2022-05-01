<nav class="navbar navbar-expand-lg navbar-light bg-blue">
    <div class="container-fluid container">
        <a class="navbar-brand" href="#" style="padding: 0;"><img style="height: 55px;" src="{{ asset('/images/sv_header_login.png') }}" alt=""></a>

        <button class="navbar-toggler" style="border-color: #fff;" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="justify-content: end;">
            <form class="d-flex" style="    position: relative;">
                <input class="form-control me-2" type="search" placeholder="Tìm kiếm..." aria-label="Search">
                <i class="fa-solid fa-magnifying-glass" style="position: absolute;right: 20px;top: 11px; cursor: pointer;"></i>
            </form>
            @if(!Auth::check())
                <a class="btn btn-outline-success btn-login"  href="{{ route('login') }}">Đăng nhập</a>
            @else
                <div class="dropdown">
                    <a class="btn btn-mute text-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="#">Hồ sơ</a></li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}">Đăng xuất</a></li>
                    </ul>
                </div>
            @endif
        </div>
        <div class="d-flex">
{{--                <button class="btn btn-outline-success btn-login" type="submit">Đăng nhập</button>--}}
        </div>
    </div>
</nav>
