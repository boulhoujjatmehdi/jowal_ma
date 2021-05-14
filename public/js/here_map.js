function onloadd(){
  document.getElementById('saveButton').disabled = true;
}

//  var dataPoints = [];
var lastCoord = [];
var prevLayer;
function setUpClickListener(map) {

    var coord
    map.addEventListener('tap', function (evt) {
      coord = map.screenToGeo(evt.currentPointer.viewportX , evt.currentPointer.viewportY);
      document.getElementById('cordlng').value = coord.lat;
      document.getElementById("cordlng").dispatchEvent(new Event('input'));
      document.getElementById('cordlat').value = coord.lng;
      document.getElementById("cordlat").dispatchEvent(new Event('input'));
      addDataPoint(coord.lat , coord.lng);
      this.removeEventListener('tap' , arguments.callee);
      document.getElementById("mapContainer").style.cursor = "auto";
      
    });    
  }

  

  function addDataPoint(co , xo){
    co = document.getElementById('cordlng').value;
    xo = document.getElementById('cordlat').value;
    map.removeLayer();
    var x = [(new H.clustering.DataPoint(co , xo))];
    lastCoord = [co , xo]
    
    console.log(lastCoord);    
    var clusteredDataProvider = new H.clustering.Provider(x);
    // Create a layer that includes the data provider and its data points: 
    var layer = new H.map.layer.ObjectLayer(clusteredDataProvider);
    //change the value of cordinates input
    // document.addEventListener('livewire:load',function (){ document.getElementById('cordlng').value = lastCoord[0] });




    // Add the layer to the map:
    map.removeLayer(prevLayer);
    map.addLayer(layer);
    prevLayer = layer;
    document.getElementById('saveButton').disabled = false;
    document.getElementById('newButton').innerHTML ='new point';
  }
addDataPoint();
  // function  addlayerr(){
  //     var clusteredDataProvider = new H.clustering.Provider(dataPoints, {
          
  //     clusteringOptions: {
  //       eps: 100,
  //       minWeight: 7
  //     }
  //   });
  //   // Create a layer that includes the data provider and its data points: 
  //   var layer = new H.map.layer.ObjectLayer(clusteredDataProvider);

  //   // Add the layer to the map:
    
  //   map.addLayer(layer);
  // }


  // addlayerr();
  
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