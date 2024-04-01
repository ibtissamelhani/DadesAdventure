<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'email',
        'phone',
        'type_id',
        'city_id',
    ];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }
}
