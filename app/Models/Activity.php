<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'start_date',
        'end_date',
        'capacity',
        'status',
        'provider_id',
        'guide_id',
        'place_id',
        'category_id',
    ];

    public function place()
    {
        return $this->belongsTo(Place::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function transportations()
    {
        return $this->belongsToMany(Transportation::class);
    }

    public function provider()
    {
        return $this->belongsTo(User::class, 'provider_id');
    }

    public function guide()
    {
        return $this->belongsTo(User::class, 'guide_id');
    }
}
