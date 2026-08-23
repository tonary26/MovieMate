<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoomStoreRequest;
use App\Models\Room;
use Illuminate\Support\Str;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = auth()->user()->rooms()->with(['owner', 'members'])->get();

        return response()->json([
            'rooms' => $rooms
        ]);
    }

    public function store(RoomStoreRequest $request)
    {
        $data = $request->validated();

        $room = Room::create([
            'invite_code' => Str::random(6),
            'owner_id' => auth()->id(),
            'movie_title' => $data['movie_title'] ?? null
        ]);

        $room->users()->attach(auth()->id());
        $room->load(['owner', 'users']);

        return response()->json([
            'room' => $room
        ], 201);
    }

    public function join(Room $room)
    {
        
    }
}
