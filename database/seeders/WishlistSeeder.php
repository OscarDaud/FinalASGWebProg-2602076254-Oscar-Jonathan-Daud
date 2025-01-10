<?php

namespace Database\Seeders;

use App\Models\Wishlist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WishlistSeeder extends Seeder
{
    public function run(): void
    {
        // User 1's wishlists
        Wishlist::create([
            'user_id' => 1,
            'wishlist_user_id' => 2
        ]);
        Wishlist::create([
            'user_id' => 1,
            'wishlist_user_id' => 3
        ]);

        // User 2's wishlist
        Wishlist::create([
            'user_id' => 2,
            'wishlist_user_id' => 1
        ]);

        // User 3's wishlist
        Wishlist::create([
            'user_id' => 3,
            'wishlist_user_id' => 1
        ]);
    }
}