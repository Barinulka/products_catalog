<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiteController extends Controller
{
    public function index() 
    {
        $title = 'Home Page Title';
        return view('home', compact('title'));
    }

}
