<?php

namespace App\Http\Controllers;
use App\Models\Cordinate;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index($city , $need){
        return view('client.selectP', ['name' => 'James']);    
    }
    public function mapPick($city , $need){
        // dd($need);
        return view('clientUser.mapPick' , ['need' => $need]);
        
    }
}
