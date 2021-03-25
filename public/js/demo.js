/**
 * An event listener is added to listen to tap events on the map.
 * Clicking on the map displays an alert box containing the latitude and longitude
 * of the location pressed.
 * @param  {H.Map} map      A HERE Map instance within the application
 */
 function setUpClickListener(map) {
    // Attach an event listener to map display
    // obtain the coordinates and display in an alert box.
    map.addEventListener('tap', function (evt) {
      var coord = map.screenToGeo(evt.currentPointer.viewportX,
              evt.currentPointer.viewportY);
      // logEvent('Clicked at ' + Math.abs(coord.lat.toFixed(4)) + ((coord.lat > 0) ? 'N' : 'S') +' ' + Math.abs(coord.lng.toFixed(4)) +
      //      ((coord.lng > 0) ? 'E' : 'W'));
      logEvent(coord.lat + ' , ' + coord.lng)
    });
  }  
  // Helper for logging events
  function logEvent(str) {
    console.log(str);
  }
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



  
  setUpClickListener(map);




restrictMap(map);