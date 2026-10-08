<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
         protected $fillable = [

        'quantity',
        // 'site_logo'
    ];
    public function variant()
    {
        return $this->belongsTo(ProductVariant::class, 'product_variant_id')
                    ->with(['product:id,title,slug', 'attributeValues.attribute']);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
