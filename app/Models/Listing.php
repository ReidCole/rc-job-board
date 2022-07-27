<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
  use HasFactory;

  protected $fillable = [
    'owner_user_id',
    'title',
    'description',
    'company',
    'email',
    'logo',
    'location_type',
    'location',
    'close_date'
  ];

  public function user()
  {
    return $this->belongsTo(User::class, 'owner_user_id');
  }
}
