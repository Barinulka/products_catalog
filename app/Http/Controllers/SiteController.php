<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiteController extends Controller
{
    public function index() 
    {
        $title = 'Home Page Title';

        $categories = [];

        return view('home', compact('title'));
    }

}
