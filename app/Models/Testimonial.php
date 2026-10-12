<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'image',
        'customer_id',
        'name',
        'city',
        'rating',
        'description',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'rating' => 'integer',
        ];
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
