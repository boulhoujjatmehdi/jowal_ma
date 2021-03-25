@extends('index')

@section('head')
    @parent
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
    
       
    <!-- Bootstrap css -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">


    <link href="{{asset('css/style.css')}}" rel="stylesheet" />
    
@endsection


@section('header')
    @parent
@endsection

@section('content')
<div  class="d-flex"  style="width: 100%; height:100%; background-color:red;">
    <div  id="mapContainer" class=" w-100 flex-fill ">



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
      ui.getControl('zoom').setDisabled(false)

      // Enable the event system on the map instance:
      var mapEvents = new H.mapevents.MapEvents(map);

      // Add event listeners:
      map.addEventListener('tap', function(evt) {
          // Log 'tap' and 'mouse' events:
          console.log(evt.type, evt.currentPointer.type);
      });

      // Instantiate the default behavior, providing the mapEvents object:
      var behavior = new H.mapevents.Behavior(mapEvents);


    


    </script>
    <script>
      var dataPoints = [];
      dataPoints.push(new H.clustering.DataPoint(30.374804498004796, -9.570148128462348));
      dataPoints.push(new H.clustering.DataPoint(30.374758682368622, -9.569158099030417));
      dataPoints.push(new H.clustering.DataPoint(30.373926826906377, -9.570609537338553));
      dataPoints.push(new H.clustering.DataPoint(30.373591095043388, -9.56801311997821));
      dataPoints.push(new H.clustering.DataPoint(30.372109360022414, -9.573562513645065));
      dataPoints.push(new H.clustering.DataPoint(30.372346588108638, -9.573058241617527));
      dataPoints.push(new H.clustering.DataPoint(30.372083078468826, -9.57249561346296));
      dataPoints.push(new H.clustering.DataPoint(30.371472842886700, -9.576020077062138));
      dataPoints.push(new H.clustering.DataPoint(30.371486711919374, -9.57674345611801));
      dataPoints.push(new H.clustering.DataPoint(30.370970089123684, -9.575493617860364));
      dataPoints.push(new H.clustering.DataPoint(30.373393257723710, -9.578846794401326));
      dataPoints.push(new H.clustering.DataPoint(30.373128316663653, -9.57887389049992));      






      /**
       * Assuming that 'dataPoints' and 'map' 
       * is initialized and available, create a data provider:
       */

      var clusteredDataProvider = new H.clustering.Provider(dataPoints, {
        
        clusteringOptions: {
          eps: 100,
          minWeight: 7
        }
      });
      // Create a layer that includes the data provider and its data points: 
      var layer = new H.map.layer.ObjectLayer(clusteredDataProvider);

      // Add the layer to the map:
      map.addLayer(layer);
    </script>
        

    </div>

    <aside class="flex-fill bg-primary" style="font-size: 13px">
        <button class="btn btn-danger  " >add markup</button>

    </aside>
</div>
    <script type="text/javascript" src='{{asset('js/demo.js')}}'></script>
@endsection

