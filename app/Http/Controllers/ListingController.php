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
    $data = $request->validate([
      'title' => ['required', 'min:3'],
      'description' => ['required', 'min:10'],
      'company' => ['required'],
      'email' => ['required', 'email'],
      'location_type' => ['required'],
    ]);

    // optional fields
    if ($request->hasFile('logo')) {
      $data['logo'] = $request->file('logo')->store('logos', 'public');
    }
    $data['location'] = $request->input('location');
    $data['close_date'] = $request->input('close_date');

    // owner
    $data['owner_user_id'] = Auth::id();

    // create listing
    Listing::create($data);

    return redirect('/account');
  }

  // update listing
  public function update(Request $request, Listing $listing)
  {
    // make sure logged in user is owner
    if ($listing->owner_user_id != auth()->id()) {
      abort(403, 'Unauthorized action');
    }

    $data = $request->validate([
      'title' => ['required', 'min:3'],
      'description' => ['required', 'min:10'],
      'company' => ['required'],
      'email' => ['required', 'email'],
      'location_type' => ['required'],
    ]);

    if ($request->hasFile('logo')) {
      $data['logo'] = $request->file('logo')->store('logos', 'public');
    }

    $listing->update($data);

    return back();
  }

  // delete listing
  public function destroy(Request $request, Listing $listing)
  {
    // make sure logged in user is owner
    if ($listing->owner_user_id != auth()->id()) {
      abort(403, 'Unauthorized action');
    }

    Listing::destroy($listing->id);

    return redirect('/listings');
  }
}
