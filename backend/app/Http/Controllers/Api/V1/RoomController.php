<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = auth()->user()->rooms()->with('owner')->get();

        return response()->json([
            'rooms' => $rooms
        ]);
    }
}
