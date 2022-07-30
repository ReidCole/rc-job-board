<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
  // show sign up page
  public function signup()
  {
    return view('users.signup');
  }

  // create new user
  public function store()
  {
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
  public function authenticate()
  {
    // todo: read about auth in documentation
  }

  // log out user
  public function logout()
  {
    // todo: read about auth in documentation
    auth()->logout();
  }
}
