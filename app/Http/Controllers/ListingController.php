<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
  public function show($id)
  {
    return view('listing.show', [
      'listing' => Listing::findOrFail($id)
    ]);
  }
}
