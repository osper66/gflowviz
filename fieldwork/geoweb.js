//
//set ups
//

// set up i18n
setupi18n();

// set up default layers
setupDefaultLayers();
       
       //ui
	setupSideMenuEvents();
	
	//current geolocation
  	L.DomUtil.get('currentpos').onclick = function () {
    		map.locate({setView: true, maxZoom: 18, timeout:5000, enableHighAccuracy:true});
    		
    		sideMenu._animate(sideMenu._menu,-300,-300,false,true,30);
   
    		};	

	 // Initialise the draw control and pass it the FeatureGroup of editable layers
	 var drawControl = new L.Control.Draw({
	  draw: {
    		polygon: false
    		//polygon: {repeatMode: true}
    	,	polyline: false
   		 //,polyline: {repeatMode: true}
    		,rectangle: false
   		 ,circle: false
      
    		,marker: {
      			//repeatMode: true
      			repeatMode: false
    		}    
   		 ,circlemarker: false
         },
	  edit: {
	   featureGroup: drawnItems,/*
	   edit: {
	     moveMarkers: true // centroids, default: false
	     ,selectedPathOptions: {
	      maintainColor: true, 
	      moveMarkers: true
	     }
	   }
	   */
	   edit: false,
	   remove: false,
	  } 
	});
		 
	 map.addControl(drawControl); 
	 
	 //
	 /*
	if (!map.restoreView())
	  map.setView([lat, lng], 5 );
	 */
		  
   	// set up all
   	setupAll();
	 	  	
	//
       loadWebObject();
       
        //geophoto
	 setPhotoMngEvents();	 
	 
       //draw3duserfeatures();
       
   //
       //L.control.scale({imperial: false}).addTo(map);

