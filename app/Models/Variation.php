<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variation extends Model
{
    use HasFactory;

    protected $fillable = [
        'productid', 
        'name', 
        'sku',
        'price',
        'saleprice',
        'kleur',
        'maat',
        'extraoption',
        'price_eo'
    ];
}