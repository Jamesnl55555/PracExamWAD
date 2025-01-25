<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h7>Title: {{$message->title}}</h7><br>
    <h7>Created at:{{$message->created_at}}</h7>
    <form action={{route('dashboard')}} method="GET">
        <button type="submit">Back</button>
    </form>
    <hr>
    <h1>{{$message->body}}</h1>
</body>
</html>