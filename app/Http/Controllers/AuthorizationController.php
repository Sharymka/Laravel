<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorizationController extends Controller
{
    function authorization() {

        return view('signin.authorization');
    }
}
