<!doctype html>
<html lang="en">
    @include('layouts.head')
<body class="">
    @include('layouts.menu')
    <div class="container mt-3 my-3">
        @yield('content')
    </div>

    @include('layouts.script')
</body>
</html>
