<?php

namespace Database\Seeders;

use App\Models\ChatSecond;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChatSecondSeeder extends Seeder
{
    public function run(): void
    {
        ChatSecond::create([
            'user1_id' => 1,
            'user2_id' => 2,
        ]);
        ChatSecond::create([
            'user1_id' => 3,
            'user2_id' => 1,
        ]);
    }
}
