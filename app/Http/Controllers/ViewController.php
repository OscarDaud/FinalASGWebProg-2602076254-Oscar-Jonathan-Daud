<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\ChatSecond;
use App\Models\Hobby;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewController extends Controller
{
    
    public function anon_home(Request $req) {

        $hobby = $req->query('hobby');
        $gender = $req->query('gender');

        if($gender) {
            $users = User::where('interest', 'like', '%' . $hobby . '%')
                ->where('gender', $gender)
                ->get();
        } else {
            $users = User::where('interest', 'like', '%' . $hobby . '%')->get();
        }

        $hobbies = Hobby::all();

        return view('anon.home', compact('users', 'hobbies'));

    }

    public function anon_register() {
        $hobbies = Hobby::all();
        return view('anon.register', compact('hobbies'));
    }

    public function anon_payment() {
        return view('anon.payment');
    }

    public function gueslogin() {
        return view('anon.login');
    }

    public function user_home(Request $req) {

        $hobby = $req->query('hobby');
        $gender = $req->query('gender');

        $loggedin_user = Auth::user();

        $wishlist_user_ids = Wishlist::select('wishlist_user_id')
            ->where('user_id', $loggedin_user->id)
            ->get();

        if($gender) {
            $users = User::where('interest', 'like', '%' . $hobby . '%')
                ->where('gender', $gender)
                ->where('name', '!=', $loggedin_user->name)
                ->whereNotIn('id', $wishlist_user_ids)
                ->get();
        } else {
            $users = User::where('interest', 'like', '%' . $hobby . '%')
                ->where('name', '!=', $loggedin_user->name)
                ->whereNotIn('id', $wishlist_user_ids)
                ->get();
        }

        $hobbies = Hobby::all();

        return view('user.home', compact('users', 'loggedin_user', 'hobbies'));

    }

    public function user_chat() {
        $loggedin_user_id = Auth::user()->id;
        $chat_rooms = ChatSecond::where('user1_id', $loggedin_user_id)
            ->orWhere('user2_id', $loggedin_user_id)
            ->get();
        return view('user.chat', compact('chat_rooms', 'loggedin_user_id'));
    }

    public function user_chat_detail($chat_room_id) {

        $loggedin_user_id = Auth::user()->id;

        Chat::where('chat_room_id', $chat_room_id)->where('user_id', '!=', $loggedin_user_id)->update(['is_read' => 1]);

        $chat_room = ChatSecond::find($chat_room_id);
        $chats = Chat::where('chat_room_id', $chat_room_id)->get();
        return view('user.chat_detail', compact('chats', 'loggedin_user_id', 'chat_room'));
    }

    public function friend() {
        $loggedin_user_id = Auth::user()->id;
        $wishlists = Wishlist::where('user_id', $loggedin_user_id)->get();
        return view('user.friend', compact('wishlists'));
    }

    public function top_up() {
        $loggedin_user_id = Auth::user()->id;
        $loggedin_user = User::find($loggedin_user_id);
        return view('user.top_up', compact('loggedin_user'));
    }

}
