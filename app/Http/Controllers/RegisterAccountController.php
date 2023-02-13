<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterAccountController extends Controller
{
    public function getView()
    {
        return view('v_register');
    }
}
