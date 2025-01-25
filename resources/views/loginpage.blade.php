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
    <form action="/login" method="POST">
        @csrf
        <input type="text" name="email" placeholder="name: " required>
        <input type="password" name="password" placeholder="password: " required>
        <button type="submit">LOGIN</button>
    </form>
    <a href="/registerpage">Dont have account, register</a>
    @if($errors->any)
        <div>
            {{$errors->first('email')}}
        </div>
    @endif
</body>
</html>