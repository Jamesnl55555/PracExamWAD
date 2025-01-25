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
    <header> 

        <p>Dashboard</p>
        <div><a href="cmessage">Post a message</a></div>
        <div><a href="/">Logout</a></div>
        
    </header>
    <div class="content">
    <div class="messages">
        @foreach($messages as $message)
            @if($message->user_id === $user->id)
                <div class="user">
                    {{$message->body}}
                    <span>{{$message->title}}</span>
                    <form action="{{route('read', ['id' => $message->id])}}" method="GET">
                        @csrf
                        <button type="submit">Read</button>
                    </form>
                    <form action="{{route('updatepage', ['id' => $message->id])}}" method="GET">
                        @csrf
                        <button type="submit">Update</button>
                    </form>
                    <form action="{{route('delete', ['id' => $message->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                            <button type="submit">Delete</button>
                    </form>
                </div>
            @else
                <div class="other">
                    
                    <span>{{$message->title}}</span>
                    {{$message->body}}
                    <form action="{{route('read', ['id' => $message->id])}}" method="GET">
                            <button type="submit">Read</button>
                    </form>
                </div>
            @endif
        @endforeach
    </div>
    </div>
    
    
</body>
</html>