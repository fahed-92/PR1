<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function index (){
        return view('users\index' )->with('users', User::all());
    }
    public function create (){
        return view('users\create' );
    }
    public function makeAdmin(User $user)
    {
        $user->role ="dashboard";
        $user->save();
        return redirect(route('users.index'));
    }
    public function getGravatar()
    {
        $hash = md5(strtolower(trim($this->attributes['email']))
    );
        return "http://gravatar.com/avatar/$hash";

    }
    public function edit( User $user ){
        return view ('users.profile', ['user=>$user']);
    }
    public function AuthRouteAPI(Request $request){
        return $request->user();
    }
}
