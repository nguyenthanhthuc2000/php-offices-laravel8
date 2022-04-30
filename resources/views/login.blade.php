<!DOCTYPE html>
<html lang="vn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
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
</body>
</html>
