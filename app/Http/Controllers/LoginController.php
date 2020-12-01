<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $user = DB::table('user')->get();
        return $user;
    }
}