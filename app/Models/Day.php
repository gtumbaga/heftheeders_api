<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'this_day',
        'this_day',
        'items_breakfast',
        'items_lunch',
        'items_dinner',
        'items_snacks',
        'items_activity',
    ];

    public function user() {
        return $this->belongsToOne(User::class);
    }
}
