<?php

namespace App\Http\Controllers;

use App\Models\Cordinate;
use Illuminate\Http\Request;

class CordinateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($need , $city)
    {
        return $need . $city;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cordinate  $cordinate
     * @return \Illuminate\Http\Response
     */
    public function show(Cordinate $cordinate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cordinate  $cordinate
     * @return \Illuminate\Http\Response
     */
    public function edit(Cordinate $cordinate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cordinate  $cordinate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cordinate $cordinate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cordinate  $cordinate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cordinate $cordinate)
    {
        //
    }
}
