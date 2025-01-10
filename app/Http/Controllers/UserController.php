<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    
    public function register(Request $req) {
        
        $req->validate([
            'name' => 'required|unique:users,name',
            'password' => 'required',
            'gender' => 'required',
            'instagram' => 'required|min:29|starts_with:https://www.instagram.com/',
            'interest' => 'required',
            'mobile_number' => 'required|numeric',
        ]);

        User::create($req->all());

        return redirect()->route('anon.payment');

    }

    public function pay(Request $req) {

        if($req->amount < 100000) {
            return back()->with('min', 100000 - $req->amount);
        } else if($req->amount > 125000) {
            return back()->with('max', $req->amount - 125000);
        }

        return redirect()->route('anon.login');
    }

    public function login(Request $req) {
        
        $req->validate([
            'name' => 'required',
            'password' => 'required',
        ]);
        
        $user = User::where('name', $req->name)->where('password', $req->password)->first();
        
        if($user) {
            Auth::login($user);
            return redirect()->route('user.home');
        }

        return redirect()->route('anon.login');

    }

    public function logout() {
        Auth::logout();
        return redirect()->route('anon.home');
    }

    public function top_up() {

        $loggedin_user_id = Auth::user()->id;
        $user = User::find($loggedin_user_id);
        $user->coin += 100;
        $user->save();
        return back();

    }

}
