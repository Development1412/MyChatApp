<?php

namespace Database\Seeders;

use App\Models\ChatRoomUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChatRoomUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rooms = [
            ['user_id' => 1, 'chat_room_id' => 1],
            ['user_id' => 3, 'chat_room_id' => 1],
            ['user_id' => 1, 'chat_room_id' => 2],
            ['user_id' => 3, 'chat_room_id' => 1],
            ['user_id' => 2, 'chat_room_id' => 2],
            ['user_id' => 3, 'chat_room_id' => 3],
            ['user_id' => 3, 'chat_room_id' => 4],
            ['user_id' => 2, 'chat_room_id' => 5],
            ['user_id' => 3, 'chat_room_id' => 3],
            ['user_id' => 1, 'chat_room_id' => 3],
        ];
        
        foreach ($rooms as $key => $room) {
            ChatRoomUser::create($room);
        }
    }
}
