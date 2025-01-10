<?php

namespace Database\Seeders;

use App\Models\Hobby;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $hobbies = Hobby::all();

     
        $images = [
            '/assets/user.jpg',
          
        ];
        
       
        for ($i = 1; $i <= 10; $i++) {
            User::create([
                'name' => 'user' . $i,
                'password' => bcrypt('user' . $i),
                'gender' => $i % 2 == 0 ? 'Male' : 'Female',
                'instagram' => 'instagram',
                'interest' => $hobbies->random()->name,
                'mobile_number' => 'mobile_number',
                'image' => $images[0],
            ]);
        }
    }
}