<nav class="navbar navbar-expand-lg navbar-light bg-blue">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}" style="padding: 1px;"><img style="height: 55px;" src="{{ asset('/images/sv_header_login.png') }}" alt=""></a>

        <button class="navbar-toggler" style="border-color: #fff;" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="justify-content: end;">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active text-light" aria-current="page" href="{{ route('home') }}">TRANG CHỦ</a>
                </li>
                @if(Auth::check() && getRole() == 1)
                    <li class="nav-item">
                        <a class="nav-link active text-light" aria-current="page" href="{{ route('listTeacher') }}">GIÁO VIÊN</a>
                    </li>
                @endif
                @if(Auth::check() && getRole() == 1 || getRole() == 2 )
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{ route('listStudent') }}">SINH VIÊN</a>
                    </li>
                @endif
                @if(Auth::check() && getRole() == 1)
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{ route('listClass') }}">LỚP</a>
                    </li>
                @endif
                @if(Auth::check() && getRole() == 3)
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{ route('profile') }}">THÔNG TIN CÁ NHÂN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">IN BIỂU MẨU</a>
                    </li>
                @endif
            </ul>
            @if(!Auth::check())
                <a class="btn btn-outline-success btn-login"  href="{{ route('login') }}">Đăng nhập</a>
            @else
                <div class="dropdown" >
                    <a class="btn btn-mute text-light dropdown-toggle" type="button" style="display: flex;
    align-items: center;    text-transform: uppercase;    padding: 10px 0;" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('images/no_avatar.jpg') }}" style="border-radius: 50%; width: 25px; margin-right: 5px" > {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu " aria-labelledby="dropdownMenuButton1">
                    <li style="    border-bottom: 1px solid #3333;"><a class="dropdown-item" href="#">Hồ sơ</a></li>
                    <li style="    border-bottom: 1px solid #3333;"><a class="dropdown-item" href="#">Đổi mật khẩu</a></li>
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

