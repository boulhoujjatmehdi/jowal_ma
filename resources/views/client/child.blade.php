@extends('client.lay')

@section('title', 'Page Title')

@section('sidebar')
   
    @parent
    <p>This is appended to the master sidebar.</p>
     
@endsection

@section('content')
@parent
    <p>This is my body content.</p>
@endsection