<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'phone', 'seats', 'restaurant_id', 'slot'];
    public function restaurant()
    {
        return $this->hasOne(Restaurant::class);
    }
}
