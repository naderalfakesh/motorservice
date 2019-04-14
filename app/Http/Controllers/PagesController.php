<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    Public function index(){
       return view('pages.index');
    }

    Public function about(){
        return view('pages.about');
    }

    Public function services(){
        return view('pages.services');
    }
}
