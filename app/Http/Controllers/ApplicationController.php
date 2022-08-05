<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
  // make new application to a listing
  public function apply(Request $request)
  {
    $application = [
      'user_id' => $request->user()->id,
      'listing_id' => $request->id
    ];

    Application::create($application);

    return redirect('/account');
  }
}
