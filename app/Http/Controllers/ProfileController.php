<?php

namespace App\Http\Controllers;

use App\Classes\MyHttpResponse;
use App\Rules\ValidatePassword;
use App\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function index()
    {
        return view('partials.profile');
    }

    public function profileUpdate(User $user)
    {
        try {
            request()->validate([
                'name' => ['required'],
                'email' => ['required', 'email'],
            ]);

            $user->name = request('name');
            $user->email = request('email');
            $user->save();
            return MyHttpResponse::updateResponse(true, 'Profile Successfully Updated', 'profile');
        } catch (\Exception $e) {
            return MyHttpResponse::updateResponse(false, $e->getMessage(), 'home');
        }
    }

    public function changePassword(User $user)
    {
        request()->validate([
            'current_password' => ['required', new ValidatePassword($user)],
            'new_password' => ['required', 'min:6', 'max:35', 'confirmed'],
            'new_password_confirmation' => ['required']
        ]);

        try {
            $user->password = Hash::make(request('new_password'));
            $user->save();
            return MyHttpResponse::updateResponse(true, 'Password Successfully Updated', 'profile');
        } catch (\Exception $e) {
            return MyHttpResponse::updateResponse(false, $e->getMessage(), 'profile');
        }
    }
}
