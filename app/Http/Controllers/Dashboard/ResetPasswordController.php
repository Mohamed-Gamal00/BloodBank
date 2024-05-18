<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Redirect;

class ResetPasswordController extends Controller
{
    public function index()
    {
        return view('dashboard.settings.reset-password');
    }

    public function update(Request $request)
    {

        $request->validate([
            'current_pwd' => 'required',
            'new_pwd' => 'required|min:6|confirmed',
        ]);

        $user = Auth::user();
        if (!Hash::check($request->current_pwd, $user->password)) {
            return back()->withErrors(['current_pwd' => 'Current password is incorrect']);
        }

        $user->password = Hash::make($request->new_pwd);
        $user->save();

        return Redirect::route('reset_password.index')->with('success', 'Password updated successfully');

        // return redirect()->route('reset_password.index')->with('success', 'Password updated successfully');
    }
}
