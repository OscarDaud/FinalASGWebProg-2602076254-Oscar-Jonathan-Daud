<?php

namespace App\Http\Controllers;

use App\Models\ChatSecond;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    
    public function create(Request $req) {
        
        Wishlist::create($req->all());

        $wishlist = Wishlist::where('wishlist_user_id', $req->user_id)
            ->where('user_id', $req->wishlist_user_id)
            ->first();
        
        if($wishlist) {

            ChatSecond::create([
                'user1_id' => $req->user_id,
                'user2_id' => $req->wishlist_user_id,
            ]);

        }
        
        return back();

    }

    public function delete($wishlist_id) {

        $wishlist = Wishlist::find($wishlist_id);
        $wishlist->delete();
        
        ChatSecond::where(function ($query) use ($wishlist) {
            $query->where('user1_id', $wishlist->user_id)
                  ->where('user2_id', $wishlist->wishlist_user_id);
        })->orWhere(function ($query) use ($wishlist) {
            $query->where('user1_id', $wishlist->wishlist_user_id)
                  ->where('user2_id', $wishlist->user_id);
        })->delete();

        return back();

    }

}
