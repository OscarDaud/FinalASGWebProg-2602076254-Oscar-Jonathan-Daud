<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function create(Request $req) {
        
        $req->validate([
            'content' => 'required',
        ]);

        Chat::create($req->all());
        return back();

    }
}
