<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    use HasFactory;

    protected $table = 'roomtypes';

    protected $fillable = [
        'name',
        'surchange',
        'status',
    ];

    public function rooms()
    {
        return $this->hasMany(Room::class, 'roomType_id', 'id');
    }
}
