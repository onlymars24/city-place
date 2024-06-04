<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'user_id',
        'place_id',
        'branches_amount',
        'branches_condition',
        'trashes_amount',
        'trashes_condition',
        'light',
        'common_condition',
        'toilet',
        'toilet_condition',
        'ramp',
        'images',
    ];
}
