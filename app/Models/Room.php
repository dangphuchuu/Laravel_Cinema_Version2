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
        $rows = $this->seats()->select('row', 'mb')->groupBy('row');
        foreach ($rows as $row) {
            $row = Seat::class->where('room_id', $this->id)->where('row', $row);
        }
        return $rows;
    }
}
