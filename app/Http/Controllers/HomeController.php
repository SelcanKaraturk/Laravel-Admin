<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        //clearLogs();
        return view('frontend.index');
    }
}
