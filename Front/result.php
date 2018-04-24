<?php
  include "../Path_Server/main.php";
?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Waypoints in directions</title>
    <!-- Chargement de la librairie font-awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Chargement de la feuille de style adaptative Bootrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">

    <style>
        #right-panel {
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
        margin: 20px;
        border-width: 2px;
        width: 25%;
        height: 400px;
        float: left;
        text-align: left;
        padding-top: 0;
        }

        footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            color: black;
            text-align: center;
        }
    
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }

      #map {
        height: 80%;
        float: left;
        width: 70%;
      }
    </style>
  </head>
  <body>

      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand lead" href="index.php">E-wayz</a>
      </nav>

    <div class="mt-5" id="map"></div>
    <br>
    <br>
    <div class="container text-center" id="right-panel">
        <ul class="list-group">
          <li class="list-group-item d-flex justify-content-between align-items-center">
            From:
            <span class="badge badge-info badge-pill"> <?php echo $_POST["start"]?> </span>
            <li class="list-group-item d-flex justify-content-between align-items-center">
            To:
            <span class="badge badge-info badge-pill"> <?php echo $_POST["end"]?> </span>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Time (h)
            <span class="badge badge-success badge-pill"> <?php echo $stats["time"]?> </span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Distance (km)
            <span class="badge badge-success badge-pill"> <?php echo $stats["distance"] ?>  </span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Energy (kWh)
            <span class="badge badge-success badge-pill"> <?php echo $stats["energy"] ?> </span>
          </li>
        </ul>
        <br>
        <a class="btn btn-success btn-md" href="index.php" role="button">New search &raquo;</a>
      </div>
      <footer>
        <br>
        <p class="copyright">© 2018 Benoit Mangeard - Jixiong Liu - Charles Mailly - Yves William OBAME EDOU - Yuang Xuan</p>
      </footer>
  </body>

    <script>
      var geocoder;
      var map;
      var path = null, timer = 0, index = 0, markerShow = null;
      function initMap() {
        geocoder = new google.maps.Geocoder();
        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;
        map = new google.maps.Map(document.getElementById('map'), {
          mapTypeId : google.maps.MapTypeId.TERRAIN, // Type de carte, différentes valeurs possible HYBRID, ROADMAP, SATELLITE, TERRAIN
          gestureHandling: 'greedy' //Zoomer par molette seulement
        });
        directionsDisplay.setMap(map);
        calculateAndDisplayRoute(directionsService, directionsDisplay);
      }
      
      function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        var waypts = [];
        var checkboxArray = <?php echo json_encode($waypoints); ?>;
        for (i in  checkboxArray) {
            waypts.push({
              location: new google.maps.LatLng(checkboxArray[i].lat,checkboxArray[i].lng),
              stopover: true
            });
          
        }

        directionsService.route({
          origin: new google.maps.LatLng(checkboxArray[0].lat,checkboxArray[0].lng),
          destination: new google.maps.LatLng(checkboxArray[checkboxArray.length - 1].lat,checkboxArray[checkboxArray.length - 1].lng),
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
    </script>
    <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBzE9xAESye6Kde-3hT-6B90nfwUkcS8Yw&callback=initMap&language=fr">
    </script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

</html>