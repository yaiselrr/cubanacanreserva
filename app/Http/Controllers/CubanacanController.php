<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Auth\AuthenticatesUsers;

class CubanacanController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/admin';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
