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
        'score',
        'image',
        'location_x',
        'location_y',
        'location_address',
        'avatar',
        'type_id',
    ];
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }
}