<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        if(auth()->user()->role == 'admin') {
            return view('admin.home');
        }else if(auth()->user()->role == 'author') {
            return view('author.home');
        }
    }
}
