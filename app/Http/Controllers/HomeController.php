<?php

namespace AizaBoutique\Http\Controllers;

use Illuminate\Http\Request;
use AizaBoutique\User;
use Caffeinated\Shinobi\Models\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        $role = Role::get();
        return view('home', compact('user', 'role'));
    }
}
