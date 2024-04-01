<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'phone',
        'availability',
        'spoken_languages',
    ];

    protected $casts = [
        'availability' => 'boolean',
        'spoken_languages' => 'array',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function providedActivities()
    {
        return $this->hasMany(Activity::class, 'provider_id');
    }

    public function guidedActivities()
    {
        return $this->hasMany(Activity::class, 'guide_id');
    }
}
