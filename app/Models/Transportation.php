<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transportation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'capacity',
    ];

    public function activities()
    {
        return $this->belongsToMany(Activity::class);
    }
}
