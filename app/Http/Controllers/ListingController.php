<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
  public function store(Request $request)
  {
    // required fields
    $listing = $request->validate([
      'title' => ['required', 'min:3'],
      'description' => ['required', 'min:10'],
      'company' => ['required'],
      'email' => ['required', 'email'],
      'location_type' => ['required'],
    ]);

    // optional fields
    if ($request->hasFile('logo')) {
      $listing['logo'] = $request->file('logo')->store('logos', 'public');
    }
    $listing['location'] = $request->input('location');
    $listing['close_date'] = $request->input('close_date');

    // owner
    $listing['owner_user_id'] = Auth::id();

    // create listing
    Listing::create($listing);

    return redirect('/account');
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
