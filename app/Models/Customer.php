<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'mobile'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'customer_id');
    }
    public function carts()
    {
        return $this->hasMany(CartItem::class, 'user_id');
    }
}
