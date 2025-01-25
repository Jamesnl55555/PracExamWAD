<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/send" method="POST">
        @csrf
        <input type="hidden" name="user_id" value="{{$user->id}}" required>
        <input type="hidden" name="title" value="{{$user->name}}'s message" required>
        <input type="text" name="body" placeholder="message: " required>
        <button type="submit">Send</button>
    </form>
    

</body>
</html>