<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title', 'description', 'start_time', 'end_time', 'location', 'total_seats', 'available_seats'
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
