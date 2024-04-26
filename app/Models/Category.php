<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\URL;
class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'parent_category_id',
        'image',
    ];

    public function attribute()
    {
        return $this->belongsToMany(Attribute::class,'category_attribute');
    }
    public function product()
    {
        return $this->hasMany(Product::class,'category_id','id')->with('sale');
    }
    public function subcategories()
    {
        return $this->hasMany(Category::class,'parent_category_id','id');
    }

    //biến đổi đường dẫn thư mục sang 1 url hoàn chỉnh có thể truy cập trực tiếp vào ảnh bằng url
    protected function Image(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => URL::to($value)
        );
    }

}
