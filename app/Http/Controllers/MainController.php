<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index($city , $need){
        return view('client.selectP');    
    }
}
