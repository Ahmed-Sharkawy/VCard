<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Profile extends Model
{
    use HasFactory;

  public function user()
  {
    return $this->belongsTo(User ::class);
  }

    protected $fillable = [
        "profile_name",
        "phone",
        "email",
        "fb",
        "linkedin",
        "github",
        "profile_pic",
        "user_id"
    ];

}
