<?php

namespace App\Http\Controllers\Website\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientLoginController extends Controller
{
    public function index()
    {
        return view('website.auth.login');
    }
}
