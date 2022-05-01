<!doctype html>
<html lang="en">
    @include('layouts.head')
<body class="">
    @include('layouts.menu')

    <div class="container my-3">
        @yield('content')
    </div>
    @include('layouts.script')
</body>
</html>
