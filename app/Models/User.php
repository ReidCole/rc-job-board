<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Application;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

use function PHPSTORM_META\map;

class User extends Authenticatable
{
  use HasApiTokens, HasFactory, Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'name',
    'email',
    'password',
  ];

  /**
   * The attributes that should be hidden for serialization.
   *
   * @var array<int, string>
   */
  protected $hidden = [
    'password',
    'remember_token',
  ];

  /**
   * The attributes that should be cast.
   *
   * @var array<string, string>
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];

  public function listings()
  {
    return $this->hasMany(Listing::class, 'owner_user_id');
  }

  public function appliedListings()
  {
    $applications = Application::latest()->where('user_id', $this->id)->get();
    $listingIds = [];
    foreach ($applications as $application) {
      array_push($listingIds, $application->listing_id);
    }
    $listings = Listing::latest()->whereIn('id', $listingIds)->get();
    return $listings;
  }
}
