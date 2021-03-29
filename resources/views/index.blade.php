<!doctype html>
<html lang="en" class="h-100">
  <head>
    @section('head')
    
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>Cover Template · Bootstrap v5.0</title>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/cover/">
    @show
    

    <!-- Bootstrap core CSS -->
<link href="/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }
      .nav-bb{
        width:100%;
      }


      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
          margin-right:2%;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="/css/cover.css" rel="stylesheet">
  </head>
  <body class="d-block h-100 text-center text-white bg-dark">
@section('header')
    <header class="mb-auto w-100 ">
      <div>
        <h3 class="float-md-start mb-0 ms-5">Cover</h3>
        <nav class="nav nav-masthead justify-content-center float-md-end me-5">

          
          @if (Auth::user())
          <form id="LogOutForm" action="{{route('logout')}}" method="post">@csrf</form><br>
            <a class="nav-link active" aria-current="page" href="{{url('/')}}">Home</a>
            <a class="nav-link" href="">Contact</a>
            <a class="nav-link" href="{{route('profile.show')}}">Profil</a>          
            <button form="LogOutForm" class="nav-link" type="sumbit" style="border-top: 0; border-left:0; border-right:0;">Logout</button>
          @else
            <a class="nav-link active" aria-current="page" href="{{url('/')}}">Home</a>
            <a class="nav-link" href="">Contact</a>
            <a class="nav-link" href="{{route('login')}}">Login</a>
            <a class="nav-link" href="{{route('register')}}">Sign up</a>
          @endif

        </nav>
      </div>
    </header>
@show
  
@section("content")
<div class=" d-flex w-100 h-100 p-3 mx-auto flex-column">
  <main class="px-3 m-auto" style="max-width:42rem; align-self:center;">
    <h1>7oooooooooooot Ha Semta.</h1>
    <p class="lead">If you need somme thing from the hawkers, you can use our website to facilitate the life .</p>
    <p class="d-flex lead bg-light rounded " >
    <select class="form-select rounded border-0" aria-label="Default select example" id="cities" >
      <option selected>select your city</option>
      <option value="Agadir">Agadir</option>
      <option value="Casablanca">Casablanca</option>
      <option value="Fes">Fes</option>
      <option value="Marrakech">Marrakech</option>
      <option value="Mekness">Mekness</option>
      <option value="Rabat">Rabat</option>
    </select>
    <select class="form-select rounded-0" aria-label="Default select example" id="needs">
      <option selected>select what you need</option>
      <option value="Fishes">Fishes</option>
      <option value="Cleaning">Cleaning Products</option>
    </select>
    <a id="url_send" class="btn wd-10 bg-light  rounded-right " href="#" onclick='f1()' ><svg xmlns="http://www.w3.org/2000/svg"  width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
</svg></a>
    </p>
  </main>

  <footer class="mt-auto text-white-50">
    
  </footer>

</div>


  <script>
    function f1(){
      var city = document.getElementById('cities').value;
      var need = document.getElementById('needs').value;
      document.getElementById('url_send').href =  '{{ url('search')}}/' + city + '/' + need;


    }

  </script>
@show  
    
  </body>
</html>
