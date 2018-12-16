<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function get()
    {
        $user = User::find(Auth::user()->id);
        return $user->toArray();
        return view('partials.profile', ['user' => $user]);
    }

    public function update(User $user)
    {
        return redirect()->route('profile', ['user' => $user->id]);
    }
}
