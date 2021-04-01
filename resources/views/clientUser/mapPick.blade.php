@extends('index')

@section('head')
    @parent
    <!-- -------------------------------------------------------- -->
    <meta name="viewport" content="initial-scale=1.0, width=device-width"/>
    <script src="https://js.api.here.com/v3/3.1/mapsjs-core.js"
       type="text/javascript" charset="utf-8"></script>
    <script src="https://js.api.here.com/v3/3.1/mapsjs-service.js"
       type="text/javascript" charset="utf-8"></script>
    <script src="https://js.api.here.com/v3/3.1/mapsjs-mapevents.js"
       type="text/javascript" charset="utf-8"></script>
    <script src="https://js.api.here.com/v3/3.1/mapsjs-ui.js"
        type="text/javascript" charset="utf-8"></script>
    <link rel="stylesheet" type="text/css"
        href="https://js.api.here.com/v3/3.1/mapsjs-ui.css" />  
    <script src="https://js.api.here.com/v3/3.1/mapsjs-clustering.js"
     type="text/javascript" charset="utf-8"></script>       
    
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">


    <link href="{{asset('css/style.css')}}" rel="stylesheet" />

    <!--cursor icon-->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.2.0/css/all.css">

    {{-- <link rel="stylesheet" href="https://static.fontawesome.com/css/fontawesome-app.css">
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="https://cdn.rawgit.com/jwarby/jquery-awesome-cursor/master/dist/jquery.awesome-cursor.min.js"></script></pre> --}}
    <!--cursor icon end-->
    
@endsection


@section('header')
    @parent
@endsection

@section('content')
<div  class="d-flex bg-light"  style="width: 100%; height:95%; ">
    <div  id="mapContainer" class="position-relative w-100  ">

      

    <script>
      // Initialize the platform object:
      var platform = new H.service.Platform({
        'apikey': 'rhVcJDXLVpKMKSx-K7i2K_x7k1HoOvXCCNkGacmnJis'
      });

      // Obtain the default map types from the platform object
      var maptypes = platform.createDefaultLayers();
      maptypes.vector.normal.map.setMin(14);

      // Instantiate (and display) a map object:
      var map = new H.Map(
        document.getElementById('mapContainer'),
        maptypes.vector.normal.map,
        {
          zoom: 14,
          center: { lng:-9.547, lat: 30.3835 }
        });

      //Add a resize listner to make sure that the map occupies the whole container
      window.addEventListener('resize', () => map.getViewPort().resize());

      // Create the default UI:
      var ui = H.ui.UI.createDefault(map, maptypes);
      ui.getControl('mapsettings').setDisabled(true);


      // Enable the event system on the map instance:
      var mapEvents = new H.mapevents.MapEvents(map);

      // Instantiate the default behavior, providing the mapEvents object:
      var behavior = new H.mapevents.Behavior(mapEvents);


    


    </script>

   
        
<div class="position-absolute" style="top:.3rem;left:.5rem;">
  <button class="btn btn-danger  " id="btn1" onclick="cursor_in()"><i class="fas fa-map-marker-alt"></i> add point </button>
  <button class="btn btn-danger  " id="btn2"  ><i class="fas fa-map-marker-alt"></i> save this point</button>
</div>
    </div>

    <aside id="btn2" class="flex-fill bg-warning" style="font-size: 13px">


    </aside>
</div>
    <script> 
      function cursor_in(){
        document.getElementById("mapContainer").style.cursor = "url('{{asset('icons/map-pin.svg')}}')12 24, auto";
        setUpClickListener(map , time=0);
        
      }

</script>
    <script type="text/javascript" src='{{asset('js/here_map.js')}}'></script>
    <div aria-disabled="true" >


    </div>
@endsection

