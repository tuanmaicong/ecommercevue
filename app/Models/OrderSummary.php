<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderSummary extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name_customer',
        'email_customer',
        'phone_number_customer',
        'address_customer',
        'country_customer',
        'city_customer',
        'zip_code',
        'shipping',
        'payment_method_id',
        'code_order_summary',
        'product_id',
        'product_attr_id',
        'qty',
        'total_order_summary',
        'status_payment',
        'status_oder_id',
    ];
}
