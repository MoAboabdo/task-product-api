<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'qty',
        'image',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'qty' => 'integer',
    ];

}
