<!doctype html>
<html lang="en">
    @include('layouts.head')
<body class="" style="background-color: #e7ecf0;    color: #667580;">
    @include('layouts.menu')
    <div class="container my-3 ">
        @yield('content')
    </div>

    @include('layouts.script')
</body>
</html>
