<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'room_type_id',
        'theater_id',
        'status'
    ];

    public function roomType()
    {
        return $this->belongsTo(RoomType::class, 'roomType_id', 'id');
    }

    public function seats()
    {
        return $this->hasMany(Seat::class, 'room_id', 'id');
    }

    public function rows()
    {
        return $this->seats()->select('row', 'mb', 'col')->groupBy('row');
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'room_id', 'id');
    }

    public function latestSchedule()
    {

        return $this->schedules()->latest('endTime')->limit(1);;
    }
}
