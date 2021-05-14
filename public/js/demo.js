

/**
 * An event listener is added to listen to tap events on the map.
 * Clicking on the map displays an alert box containing the latitude and longitude
 * of the location pressed.
 * @param  {H.Map} map      A HERE Map instance within the application
 */
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
 dataPoints.push(new H.clustering.DataPoint(30.373128316663653, -9.57857389049992));
 dataPoints.push(new H.clustering.DataPoint(30.411965249975847 , -9.514298507690432));

 function setUpClickListener(map) {
    // Attach an event listener to map display
    // obtain the coordinates and display in an alert box.
    var coord
    map.addEventListener('tap', function (evt) {
      coord = map.screenToGeo(evt.currentPointer.viewportX , evt.currentPointer.viewportY);

      
      // console.log(dataPoints[dataPoints.length-1]);
      addDataPoint(coord.lat , coord.lng);
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