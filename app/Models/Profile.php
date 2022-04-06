<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

  protected $fillable = [
    "profile_name",
    "phone" ,
    "email",
    "fb",
    "linkedin",
    "github",
    "profile_pic",
    "user_id"
  ];
}
