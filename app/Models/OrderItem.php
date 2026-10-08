<?php

namespace App\Models;

use App\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use LogsActivity;

    public function variant()
    {
        return $this->belongsTo(ProductVariant::class, 'product_variant_id');
    }
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
