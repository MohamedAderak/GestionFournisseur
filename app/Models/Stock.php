<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'product', // Add the 'product' field here
        'price',
        'service',
        'date',
        'Quantity',
        'desc',
    ];

    public $timestamps = false;
}
