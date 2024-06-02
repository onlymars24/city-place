<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'descr',
        'images',
        'location',
        'avatar',
        'type_id',
    ];
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}