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
    return view('user.show')->with('user',$user);
  }

  public function show(User $user)
  {
    return view('user.show')->with('user',$user);
  }

}
