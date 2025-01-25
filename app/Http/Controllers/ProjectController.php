<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    public function loginpage(){
        return view('loginpage');
    }

    public function registerpage(){
        return view('registerpage');
    }

    public function login(Request $request){
        $auth = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (auth()->guard('web')->attempt(
            ([
                'email'=> $auth['email'],
                'password'=>$auth['password']
                       ])
            )){
            $request->session()->regenerate();
            return redirect('dashboard');

        }
        else{
            return back()->withErrors([
                'email' =>'invalid credentials'
            ]);
        }

    }
    public function register(Request $request){
        $auth = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        
        if(User::where('email', $auth['email'])->exists()){
            return back()->withErrors(['email'=> 'Email already Exists']);
        }
            $auth['password'] = bcrypt($auth['password']);
            $user = User::create($auth);
            Auth::login($user);
            return redirect('dashboard');        
    }   

    public function dashboard(){
        $user = auth()->user();
        $messages = Post::all();
        return view('dashboard', compact('messages', 'user'));
    }
    public function cmessage(){
        $user = auth()->user();
        return view('cmessage', compact('user'));
    }
    public function send(Request $request){
        $message = $request->validate([
            'user_id' => 'required',
            'title' => 'required',
            'body' => 'required'
        ]);
        $user = auth()->user();
        Post::create($message);
        $messages = Post::all();
        return redirect()->route('dashboard', compact('messages', 'user'));
    }

    public function read(Request $request){

        $message = Post::find($request->id);
        return view('read', compact('message'));
    }
    public function updatepage(Request $request){
        $user = auth()->user();
        $message = Post::find($request->id);
        return view('updatepage', compact('message', 'user'));
    }
    public function update(Request $request){
        $message = $request->validate([
            'body' => 'required'
        ]);

        $msg = Post::find($request->id);
        $msg->body = $message['body'];
        $msg->updated_at = now();
        $msg->save();
        return redirect()->route('read', ['id' => $msg->id]);
    }

    public function delete(Request $request){
        $msg = Post::find($request->id);
        $msg->delete();
        return redirect('dashboard');
    }
    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
