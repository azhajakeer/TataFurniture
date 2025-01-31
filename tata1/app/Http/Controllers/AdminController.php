<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // You can add logic to return the admin dashboard view
        return view('admin.dashboard');
    }
}
