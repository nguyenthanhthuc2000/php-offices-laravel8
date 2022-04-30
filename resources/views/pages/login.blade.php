@section('title', 'Đăng nhập')

@section('content')
    @if ($errors)
        {{ $errors }}
    @endif
    <form action="{{ route('login.post') }}" method="post">
        @csrf
        <input type="email" name="email">
        <br>
        <input type="password" name="password">
        <br>
        <button type="submit">login</button>
    </form>
@endsection
