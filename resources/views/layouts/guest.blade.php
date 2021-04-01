@extends('index')

@section('head')
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Bootstrap -->
        <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/cover/">

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
@endsection


@section('header')
    @parent
@endsection


@section('content')
    <div class="font-sans text-gray-900 antialiased ">
        {{ $slot }}
    </div>
@endsection

{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        
        
    </head>
    <body>

    </body>
</html> --}}
