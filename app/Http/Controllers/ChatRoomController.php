<?php

namespace App\Http\Controllers;

use App\Models\ChatRoom;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ChatRoomController extends Controller
{
    public function index()
    {
        $rooms = ChatRoom::with(['users', 'lastMessage'])->get();
        return Inertia::render('Chat/ChatHome', [
            'rooms' => $rooms,
            'mustVerifyEmail' => true,
            'status' => session('status'),
        ]);
    }

    public function show(ChatRoom $room)
    {
        return view('rooms.chat', [
            'room' => $room,
            'roomId' => $room->id,
            'messages' => []
        ]);
    }
}
