<?php

namespace Database\Seeders;

use App\Models\Chat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChatSeeder extends Seeder
{
    public function run(): void
    {
        Chat::create([
            'chat_room_id' => 1,
            'user_id' => 1,
            'content' => 'Pagi, apakah benar anda melamar kerja di Binus',
            'is_read' => 1,
        ]);
        Chat::create([
            'chat_room_id' => 1,
            'user_id' => 2,
            'content' => 'Pagi, benar saya yang melamar di Binus',
            'is_read' => 1,
        ]);
        Chat::create([
            'chat_room_id' => 1,
            'user_id' => 2,
            'content' => 'Anda diterima kerja di Binus, semoga kita menjadi kolega yang akrab',
            'is_read' => 1,
        ]);
        Chat::create([
            'chat_room_id' => 1,
            'user_id' => 1,
            'content' => 'Senang mendengarnya',
            'is_read' => 0,
        ]);
    }
}
