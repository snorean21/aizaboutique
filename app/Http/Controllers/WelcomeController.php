<?php

namespace AizaBoutique\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    public function index()
    {
        return view('welcome');
    }

    public function __construct()
    {
        $this->middleware('guest');
    }
}
