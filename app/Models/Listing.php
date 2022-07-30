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

  public function scopeFilter($query, array $filters)
  {
    if (isset($filters['search'])) {
      $query->where('title', 'like', '%' . $filters['search'] . '%')->orWhere('description', 'like', '%' . $filters['search'] . '%');
    }
  }

  public function user()
  {
    return $this->belongsTo(User::class, 'owner_user_id');
  }
}
