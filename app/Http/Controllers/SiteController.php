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

    public function create()
    {
        return view('post');
    }

    public function store(Request $request)
    {
       
        $this->validate($request, [
            'name' => 'required|min:2|max:10',
            'message' => 'required'
        ]);

        // $rules = [
        //     'name' => 'required|min:2|max:10',
        //     'message' => 'required'
        // ];

        // $messages = [
        //     'name.required' => 'Заполнте поле "Имя"',
        //     'name.min' => 'Минимум :min символа',
        //     'name.max' => 'Максимум 10 символов'
        // ];

        $validator = Validator::make($request->all(), $rules, $messages)->validate();

        return redirect()->route('home');

    }
}
