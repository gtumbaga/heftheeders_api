<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'label',
        'serving_unit',
        'serving_size',
        'serving_quantity',
        'calories',
    ];
}
