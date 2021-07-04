<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }

   
    public function index() {
        $locationForJS = "[";
        foreach (auth()->user()->locations as $location) {
            $locationForJS = "[" . $location->longitude . "," . $location->latitude . "]";
        }
        $locationForJS .= "]";
        return view('home', compact("locationForJS"));

    }

    
}
