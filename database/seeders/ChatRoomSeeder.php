<?php

namespace Database\Seeders;

use App\Models\ChatRoom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChatRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $rooms = [
            ['name' => 'Room 1'],
            ['name' => 'Room 2'],
            ['name' => 'Room 3'],
            ['name' => 'Room 4'],
            ['name' => 'Room 5'],
        ];
        
        foreach ($rooms as $key => $room) {
            ChatRoom::create($room);
        }

    }
}
