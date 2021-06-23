<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function change_password(Request $request, User $user) {
        //validate data from request
        $request->validate([
            'password' => ['required'],
            'password_confirmation' => ['required', 'same:password']
        ]);
        //update user password 
            $user->update([
                'password' => Hash::make($request->password)
            ]);
        //redirect
        return redirect()->route('user.index')->with('message', 'user password updated successfully');
    }

}
