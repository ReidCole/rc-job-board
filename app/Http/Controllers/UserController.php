<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
  // show sign up page
  public function signup()
  {
    return view('users.signup');
  }

  // create new user
  public function store(Request $request)
  {
    $credentials = $request->validate([
      'name' => ['required', 'min:3'],
      'email' => ['required', 'email', Rule::unique('users', 'email')],
      'password' => ['required', 'confirmed', 'min:6']
    ]);

    // hash password
    $credentials['password'] = bcrypt($credentials['password']);

    // create user
    $user = User::create($credentials);

    // login
    Auth::login($user);

    return redirect('/');
  }

  // update user info
  public function update()
  {
  }

  // show account page
  public function account()
  {
    // todo: pass in account data with view
    return view('users.account');
  }

  // show login page
  public function login()
  {
    return view('users.login');
  }

  // log in user
  public function authenticate(Request $request)
  {
    $credentials = $request->validate([
      'email' => ['required', 'email'],
      'password' => ['required']
    ]);

    if (Auth::attempt($credentials)) {
      $request->session()->regenerate();

      return redirect()->intended('/');
    } else {
      return back()->withErrors([
        'email' => 'Invalid credentials'
      ])->onlyInput('email');
    }
  }

  // log out user
  public function logout(Request $request)
  {
    // todo: read about auth in documentation
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/');
  }
}
