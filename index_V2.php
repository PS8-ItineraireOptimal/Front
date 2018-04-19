<!DOCTYPE html>
<html>
  <head>
    <title>Place Autocomplete</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #right-panel {
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
      #right-panel select, #right-panel input {
        font-size: 15px;
      }
      #right-panel select {
        width: 100%;
      }
      #right-panel i {
        font-size: 12px;
      }

      #map {
        height: 100%;
        float: left;
        width: 70%;
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #right-panel {
        margin: 20px;
        border-width: 2px;
        width: 20%;
        height: 400px;
        float: left;
        text-align: left;
        padding-top: 0;
      }
      #directions-panel {
        margin-top: 10px;
        background-color: #FFEE77;
        padding: 10px;
      }
      .controls {
        margin-top: 10px;
        border: 1px solid transparent;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 32px;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
      }

      #start, #end {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 300px;
      }

      #start, #end:focus {
        border-color: #4d90fe;
      }

      .pac-container {
        font-family: Roboto;
      }

      }
    </style>
  </head>
  <body onload="initMap()">

  <!--   <div id="type-selector" class="controls">
      <input type="radio" name="type" id="changetype-all" checked="checked">
      <label for="changetype-all">All</label>

      <input type="radio" name="type" id="changetype-establishment">
      <label for="changetype-establishment">Establishments</label>

      <input type="radio" name="type" id="changetype-address">
      <label for="changetype-address">Addresses</label>

      <input type="radio" name="type" id="changetype-geocode">
      <label for="changetype-geocode">Geocodes</label>
    </div> -->
    <div id="map"></div>
    <div id="right-panel">

      <b>VE choice:</b>
    <?php
      //Vérification de la date limite
      include "bdd.php";
      $mysqli = get_bdd();
      $query = "SELECT * FROM car";
      $result = $mysqli->query($query);      
    ?>
    <div>
      <select id="VE">
        <?php
          while($row = mysqli_fetch_assoc($result)){
        ?>
          <option><?php echo $row["Marque"]. " " .$row["Modele"];?></option>
        <?php
            }
            $mysqli->close();
        ?>
      </select>
    </div>


    <b>Start energy:</b>
    <div>
      <input type="range" name="startEnergyInName" id="startEnergyIn" value="24" min="1" max="100" oninput="startEnergyOut.value = startEnergyIn.value">
      <output name="startEnergyOutName" id="startEnergyOut">24</output>
    </div>


    <b>Energy wanted after the journey:<b>
    <div>
      <input type="range" name="endEnergyInName" id="endEnergyIn" value="24" min="1" max="100" oninput="endEnergyOut.value = endEnergyIn.value">
      <output name="endEnergyOutName" id="endEnergyOut">24</output>
    </div>

    

    


    <div> 
    <br>
    <b>Start:</b>
        <input id="start" class="controls" type="text"
        placeholder="Enter a location">
    <!-- <input id="start" type="textbox" >
    <input type="button" value="Geocode" onclick="codeAddressStart()">  -->
    <br>
    <b>End: </b>
        <input id="end" class="controls" type="text"
        placeholder="Enter a location">
    <!-- <input id="end" type="textbox" >
    <input type="button" value="Geocode" onclick="codeAddressEnd()">  -->
    </div>  
    <div>

    <b>Waypoints:</b> <br>
    <i>(Ctrl+Click or Cmd+Click for multiple selection)</i> <br>
    <select multiple id="waypoints">
      <option value="montreal, quebec">Montreal, QBC</option>
      <option value="montana">Montana</option>
      <option value="portland">portland</option>
      <option value="idaho">idaho</option>
      <option value="wyoming">wyoming</option>
      <option value="nevada">nevada</option>
      <option value="utah">utah</option>
      <option value="arizona">arizona</option>
      <option value="colorado">colorado</option>
      <option value="oklahoma">oklahoma</option>
      <option value="texas">texas</option>
      <option value="louisiane">louisiane</option>
      <option value="mississippi">mississippi</option>
      <option value="alabama">alabamaC</option>
      <option value="kansas">kansas</option>
      <option value="missouri">missouri</option>
      <option value="kentucky">kentucky</option>
      <option value="atlanta">atlanta</option>
      <option value="washington">washington</option>
      <option value="toronto, ont">Toronto, ONT</option>
      <option value="chicago, il">Chicago</option>
      <option value="winnipeg, mb">Winnipeg</option>
      <option value="fargo, nd">Fargo</option>
      <option value="calgary, ab">Calgary</option>
      <option value="spokane, wa">Spokane</option>
    </select>
    <br>

    <input type="submit" id="submit" value="Go!">
    </div>
    <div id="directions-panel"></div>
    </div>

    <script>
      var geocoder;
      var map;
      var path = null, timer = 0, index = 0, markerShow = null;

      function initMap() {
         geocoder = new google.maps.Geocoder();
        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;
        map = new google.maps.Map(document.getElementById('map'), {
          zoom      : 4, // Zoom par défaut
          center: {lat: 39.01, lng: -98.48},
          mapTypeId : google.maps.MapTypeId.TERRAIN, // Type de carte, différentes valeurs possible HYBRID, ROADMAP, SATELLITE, TERRAIN
          gestureHandling: 'greedy' //Zoomer par molette seulement
        });
        directionsDisplay.setMap(map);
        document.getElementById('submit').addEventListener('click', function() {
          calculateAndDisplayRoute(directionsService, directionsDisplay);
        });
        var inputStart = (document.getElementById('start'));
        var inputEnd = (document.getElementById('end'));


        var startAutocomplete = new google.maps.places.Autocomplete(inputStart);
        startAutocomplete.bindTo('bounds', map);

        var endAutocomplete = new google.maps.places.Autocomplete(inputEnd);
        endAutocomplete.bindTo('bounds', map);

        

      }
      function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        var waypts = [];
        var checkboxArray = document.getElementById('waypoints');
        for (var i = 0; i < checkboxArray.length; i++) {
          if (checkboxArray.options[i].selected) {
            waypts.push({
              location: checkboxArray[i].value,
              stopover: true
            });
          }
        }
        directionsService.route({
          origin: document.getElementById('start').value,
          destination: document.getElementById('end').value,
          waypoints: waypts,
          optimizeWaypoints: false,
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay.setDirections(response);
            path = response.routes[0].overview_path;
            if (path) {
                    timer = window.setInterval(function () {
                        if (!markerShow) {
                            markerShow = new google.maps.Marker({ position: path[index++], map: map });
                        }else {
                            if (index < path.length) {
                                markerShow.setPosition(path[index++]);
                            } else {               
                                window.clearInterval(timer);                           
                            } 
                        }
                    }, 35); 
                }
                index = 0; 
            var route = response.routes[0];
            var summaryPanel = document.getElementById('directions-panel');
            summaryPanel.innerHTML = '';
            // For each route, display summary information.
            for (var i = 0; i < route.legs.length; i++) {
              var routeSegment = i + 1;
              summaryPanel.innerHTML += '<b>Route Segment: ' + routeSegment +
                  '</b><br>';
              summaryPanel.innerHTML += route.legs[i].start_address + ' to ';
              summaryPanel.innerHTML += route.legs[i].end_address + '<br>';
              summaryPanel.innerHTML += route.legs[i].distance.text + '<br><br>';
            }
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      }
      //Script for the display of range power in battery 
      document.registrationForm.startEnergyIn.oninput = function(){
      document.registrationForm.startEnergyOut.value = document.registrationForm.startEnergyIn.value;
      }
      document.registrationForm.endEnergyIn.oninput = function(){
      document.registrationForm.endEnergyOut.value = document.registrationForm.endEnergyIn.value;
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBzE9xAESye6Kde-3hT-6B90nfwUkcS8Yw&libraries=places&callback=initMap&language=fr"
        async defer></script>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

  </body>
</html>