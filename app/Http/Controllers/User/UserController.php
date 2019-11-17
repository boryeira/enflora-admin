<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\User\User;
use App\Http\Controllers\Controller;
use Redirect;
use Auth;
use Session;


class UserController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }


  public function index()
  {
    $users = User::all();
    return view('user.index')->with('users',$users);
  }

  public function create()
  {
    return view('user.create');
  }

  public function store(Request $request)
  {
    $provisional = Str::random(8);

    $user = new User();
    $user->first_name = $request->first_name;
    $user->last_name = $request->last_name;
    $user->rut = $request->rut;
    $user->email = $request->email;
    $user->role_id = 2;
    $user->password = Hash::make($provisional);
    $user->provisional = $provisional;
    $user->save();
    
    Mail::to($user)->send(new Welcome($user));
    return redirect::route('users.show',['user'=>$user->id]);
  }

  public function show(User $user)
  {
    return view('user.show')->with('user',$user);
  }

}
