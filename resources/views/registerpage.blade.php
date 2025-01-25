<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  rel="stylesheet" href="{{asset('style/dashboard.css')}}">
    <title>Document</title>
</head>
<body>
    <form action="/register" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Username: " required>
        <input type="email" name="email" placeholder="Email: " required>
        <input type="password" name="password" placeholder="password: " required>
        <button type="submit">REGISTER</button>
    </form>
    @if($errors->any)
        <div>
            {{$errors->first('email')}}
        </div>
    @endif
    <a href="/">Already have an account, login</a>
</body>
</html>