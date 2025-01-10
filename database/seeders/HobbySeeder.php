<?php

namespace Database\Seeders;

use App\Models\Hobby;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HobbySeeder extends Seeder
{
    public function run(): void
    {
        
        Hobby::create(['name' => 'Reading Books, Novels, and Poetry']);
        Hobby::create(['name' => 'Traveling, Exploring New Cultures, and Road Trips']);
        Hobby::create(['name' => 'Cooking, Baking, and Grilling']);
        Hobby::create(['name' => 'Photography, Videography, and Editing']);
        Hobby::create(['name' => 'Playing Musical Instruments, Singing, and Composing Music']);
        Hobby::create(['name' => 'Drawing, Painting, and Sketching']);
        Hobby::create(['name' => 'Gardening, Planting, and Landscaping']);
        Hobby::create(['name' => 'Hiking, Mountain Climbing, and Camping']);
        Hobby::create(['name' => 'Dancing, Choreographing, and Performing Arts']);
        Hobby::create(['name' => 'Writing, Blogging, and Poetry']);
        Hobby::create(['name' => 'Gaming, Streaming, and Creating Game Content']);
        Hobby::create(['name' => 'Swimming, Snorkeling, and Surfing']);
        Hobby::create(['name' => 'Crafting, DIY Projects, and Knitting']);
        Hobby::create(['name' => 'Yoga, Pilates, and Aerobics']);
        Hobby::create(['name' => 'Fishing, Boating, and Kayaking']);
        Hobby::create(['name' => 'Cycling, Running, and Jogging']);
        Hobby::create(['name' => 'Watching Movies, Documentaries, and TV Shows']);
        Hobby::create(['name' => 'Learning Languages, Teaching, and Reading Literature']);
        Hobby::create(['name' => 'Meditation, Mindfulness, and Journaling']);
        Hobby::create(['name' => 'Woodworking, Sculpting, and Metalworking']);        

    }
}
