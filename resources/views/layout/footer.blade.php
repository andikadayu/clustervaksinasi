</body>

<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin=""></script>

   <script src="js/panel/src/leaflet-panel-layers.js"></script>
   <script src="js/leaflet.ajax.js"></script>
   <script src="js/cluster/dist/leaflet.markercluster-src.js"></script>

   <script type="text/javascript">
      
        var mymap = L.map('mapid').setView([-3.788892, 102.266579], 9);
        var layersKabupaten=[];
        var Layer = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
            maxZoom: 20,
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1,
            accessToken: 'pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw'
        });
        var dataKabupaten;


            mymap.addLayer(Layer);

            var url = "{{route('apis')}}";
            var request = new XMLHttpRequest();
            request.open('GET', url, true);
            request.onload = function () {
               if (this.status >= 200 && this.status < 400) {
                  // retrieve the JSON from the response
                  dataKabupaten = JSON.parse(this.response);

                  console.log(dataKabupaten);
                  var i = 0; 
                  for(i;i<dataKabupaten.length;i++){
                     var data=dataKabupaten[i];
                     console.log(dataKabupaten[i].geojson_kabupaten);
                     var layer={
                        name: dataKabupaten[i].nama,
                        icon: iconByName(dataKabupaten[i].warna_kabupaten),
                        layer: new L.GeoJSON.AJAX(["geojson/"+dataKabupaten[i].geojson_kabupaten],
                        {
                           onEachFeature:popUp,
                           style: function(feature){

                           },
                        }).addTo(mymap)
                     }
                     layersKabupaten.push(layer);
                  }
                  // update the drone symbol's location on the map
                  

               }
            };
            request.send();
        
            var myStyle = {
                "color": "#ff7800",
                "weight": 5,
                "opacity": 0.10
             };

            function popUp(f,l){
                var out = [];
                if (f.properties){
                    //for(key in f.properties){
                        //}
                        out.push("Kabupaten : "+f.properties['kabupaten']);
                    
                    l.bindPopup(out.join("<br />"));
                }
            }


            //legend
                  function iconByName(name) {
                     return '<i class="icon icon-'+name+'"></i>';
                  }

                  function featureToMarker(feature, latlng) {
                     return L.marker(latlng, {
                        icon: L.divIcon({
                           className: 'marker-'+feature.properties.amenity,
                           html: iconByName(feature.properties.amenity),
                           iconUrl: '../images/markers/'+feature.properties.amenity+'.png',
                           iconSize: [25, 41],
                           iconAnchor: [12, 41],
                           popupAnchor: [1, -34],
                           shadowSize: [41, 41]
                        })
                     });
                  }

                  var baseLayers = [
                     {
                        name: "OpenStreetMap",
                        layer:Layer
                     },
                     {
                        name: "OpenCycleMap",
                        layer: L.tileLayer('http://{s}.tile.opencyclemap.org/cycle/{z}/{x}/{y}.png')
                     },
                     {
                        name: "Outdoors",
                        layer: L.tileLayer('http://{s}.tile.thunderforest.com/outdoors/{z}/{x}/{y}.png')
                     }
                  ];
                  
                  var overLayers = [{
                     group: "Layer Kabupaten",
                     layers: layersKabupaten
                  }];



                  var panelLayers = new L.Control.PanelLayers(baseLayers, overLayers,{
                     collapsibleGroup: true
                  });
                mymap.addControl(panelLayers);

                
                @foreach ($kecamatan as $row)
            
            
            L.marker([<?=$row->lat?>, <?=$row->lng?>]).addTo(mymap).bindPopup("Kecamatan : <?=$row->nama_kec?><br>Data Belum Vaksin : <?=$row->bvaksin?><br>Zona Area : <?=$row->zona?>");
            @endforeach;
   </script>

</html>