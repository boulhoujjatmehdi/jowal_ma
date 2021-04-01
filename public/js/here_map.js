

/**
 * An event listener is added to listen to tap events on the map.
 * Clicking on the map displays an alert box containing the latitude and longitude
 * of the location pressed.
 * @param  {H.Map} map      A HERE Map instance within the application
 */
 var dataPoints = [];


 function setUpClickListener(map) {

    var coord
    map.addEventListener('tap', function (evt) {
      coord = map.screenToGeo(evt.currentPointer.viewportX , evt.currentPointer.viewportY);
      addDataPoint(coord.lat , coord.lng);
      this.removeEventListener('tap' , arguments.callee);
      document.getElementById("mapContainer").style.cursor = "auto"; 
      document.getElementById('btn2').style.display = 'inline';
    });
    
  }
  function addDataPoint(co , xo){
    map.removeLayer();
    var x = [(new H.clustering.DataPoint(co , xo))];
    console.log(x);

    var clusteredDataProvider = new H.clustering.Provider(x , {
          
    });
    // Create a layer that includes the data provider and its data points: 
    var layer = new H.map.layer.ObjectLayer(clusteredDataProvider);

    // Add the layer to the map:
    
    map.addLayer(layer);
  }

  function  addlayerr(){
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
  }


  addlayerr();
  
  // Helper for logging events
  // function logEvent(str) {
  //   console.log(str);
  // }
// =========================================================================================================================================
    /**
 * Restricts a moveable map to a given rectangle.
 *
 * @param {H.Map} map   A HERE Map instance within the application
 *
 */  
  
  function restrictMap(map){
  
    var bounds = new H.geo.Rect(30.476, -9.670, 30.291, -9.424);
  
    map.getViewModel().addEventListener('sync', function() {
      var center = map.getCenter();
      
      if (!bounds.containsPoint(center)) {
        if (center.lat > bounds.getTop()) {
         
          center.lat = bounds.getTop();
          
        } else if (center.lat < bounds.getBottom()) {
          center.lat = bounds.getBottom();
        }
        if (center.lng < bounds.getLeft()) {
          center.lng = bounds.getLeft();
        } else if (center.lng > bounds.getRight()) {
          center.lng = bounds.getRight();
        }
        map.setCenter(center);
      }
    });
  
    //Debug code to visualize where your restriction is
    // map.addObject(new H.map.Rect(bounds, {
    //   style: {
    //       fillColor: 'rgba(55, 85, 170, 0.1)',
    //       strokeColor: 'rgba(55, 85, 170, 0.6)',
    //       lineWidth: 8
    //     }
    //   }
    // ));
  }



  
 




restrictMap(map);