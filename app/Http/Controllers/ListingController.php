<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
  // listings page
  public function index()
  {
    $listings = Listing::latest()->filter(request(['search']))->paginate(10);

    // return view('listings.index', ['search' => $search, 'listings' => $listings]);
    return view('listings.index', [
      'listings' => $listings,
      'search' => request('search')
    ]);
  }

  // single listing page
  public function show($id)
  {
    return view('listings.show', [
      'listing' => Listing::findOrFail($id)
    ]);
  }

  // show create listing page
  public function create()
  {
    return view('listings.create');
  }

  // show edit listing page
  public function edit($id)
  {
    return view('listings.edit', [
      'listing' => Listing::findOrFail($id)
    ]);
  }

  // create new listing
  public function store()
  {
  }

  // update listing
  public function update()
  {
  }

  // delete listing
  public function destroy($id)
  {
  }
}
