<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $fillable = [
        'code', 'type','value','usage_limit','used_count','min_order_amount','expires_at','applies_to_products','applies_to_categories','is_active'
    ];

    protected $casts = [
        'applies_to_products' => 'array',
        'applies_to_categories' => 'array',
        'expires_at' => 'datetime',
    ];

}
