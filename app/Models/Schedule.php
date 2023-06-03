<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'movie_id',
        'audio_id',
        'sub_id',
        'time_id',
        'early',
        'status',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id', 'id');
    }

    public function movie()
    {
        return $this->belongsTo(Movie::class, 'room_id', 'id');
    }

    public function audio()
    {
        return $this->belongsTo(Audio::class, 'room_id', 'id');
    }

    public function sub()
    {
        return $this->belongsTo(Sub::class, 'room_id', 'id');
    }
}
