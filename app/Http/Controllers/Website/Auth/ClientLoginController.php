<?php

namespace App\Http\Controllers\Website\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientLoginController extends Controller
{
    public function index()
    {
        return view('website.auth.login');
    }

    public function check(Request $request)
    {
        $check = $request->all();
        if (Auth::guard('client')->attempt(['phone' => $check['phone'], 'password' => $check['password']])) {
            echo "true";
            return redirect()->route('home');
        } else {
            echo "fasle";
            // return redirect()->back()->with('error','your credintal is invalid');
        }
    }
    public function logout(Request $request)
    {
        Auth::guard('client')->logout();
        return redirect()->route('client-login');
    }
}
