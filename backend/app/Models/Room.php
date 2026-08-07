<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['invite_code', 'owner_id', 'movie_title'];


    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function members()
    {
        return $this->hasMany(RoomMember::class,'room_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'room_members', 'room_id', 'user_id');
    }
}
