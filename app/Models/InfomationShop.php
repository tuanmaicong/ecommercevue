<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfomationShop extends Model
{
    use HasFactory;
    protected $fillable = [
      'name',
        'logo',
        'phone_number',
        'email',
        'address'
    ];
}
