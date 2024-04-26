<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $fillable = [
        'value',
        'description'
    ];
    public function productSale()
    {
        return $this->hasMany(Product::class,'sale_id','id');
    }
}
