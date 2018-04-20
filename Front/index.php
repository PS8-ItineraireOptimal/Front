<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge, chrome=1"/>
    <title>TrajElec</title>
    <!-- Chargement de la librairie font-awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Chargement de la feuille de style adaptative Bootrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">

    <style>
        #headline{
            color:white;
            background-image:url(index.jpg);
            background-color: rgba(0, 0, 0, 0.1);
        }
        body{
            background-color:white;
            background-image:url(index.jpg);
        }
        footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            color: black;
            text-align: center;
        }
        input::-webkit-slider-thumb {
            height: 18px;
            width: 28px;
            -webkit-appearance: none;
                    appearance: none;
            background: #fff;
            border-radius: 8px;
            box-shadow: 5px 0 0 -8px #c7c7c7, 6px 0 0 -8px #c7c7c7, 7px 0 0 -8px #c7c7c7, 8px 0 0 -8px #c7c7c7, 9px 0 0 -8px #c7c7c7, 10px 0 0 -8px #c7c7c7, 11px 0 0 -8px #c7c7c7, 12px 0 0 -8px #c7c7c7, 13px 0 0 -8px #c7c7c7, 14px 0 0 -8px #c7c7c7, 15px 0 0 -8px #c7c7c7, 16px 0 0 -8px #c7c7c7, 17px 0 0 -8px #c7c7c7, 18px 0 0 -8px #c7c7c7, 19px 0 0 -8px #c7c7c7, 20px 0 0 -8px #c7c7c7, 21px 0 0 -8px #c7c7c7, 22px 0 0 -8px #c7c7c7, 23px 0 0 -8px #c7c7c7, 24px 0 0 -8px #c7c7c7, 25px 0 0 -8px #c7c7c7, 26px 0 0 -8px #c7c7c7, 27px 0 0 -8px #c7c7c7, 28px 0 0 -8px #c7c7c7, 29px 0 0 -8px #c7c7c7, 30px 0 0 -8px #c7c7c7, 31px 0 0 -8px #c7c7c7, 32px 0 0 -8px #c7c7c7, 33px 0 0 -8px #c7c7c7, 34px 0 0 -8px #c7c7c7, 35px 0 0 -8px #c7c7c7, 36px 0 0 -8px #c7c7c7, 37px 0 0 -8px #c7c7c7, 38px 0 0 -8px #c7c7c7, 39px 0 0 -8px #c7c7c7, 40px 0 0 -8px #c7c7c7, 41px 0 0 -8px #c7c7c7, 42px 0 0 -8px #c7c7c7, 43px 0 0 -8px #c7c7c7, 44px 0 0 -8px #c7c7c7, 45px 0 0 -8px #c7c7c7, 46px 0 0 -8px #c7c7c7, 47px 0 0 -8px #c7c7c7, 48px 0 0 -8px #c7c7c7, 49px 0 0 -8px #c7c7c7, 50px 0 0 -8px #c7c7c7, 51px 0 0 -8px #c7c7c7, 52px 0 0 -8px #c7c7c7, 53px 0 0 -8px #c7c7c7, 54px 0 0 -8px #c7c7c7, 55px 0 0 -8px #c7c7c7, 56px 0 0 -8px #c7c7c7, 57px 0 0 -8px #c7c7c7, 58px 0 0 -8px #c7c7c7, 59px 0 0 -8px #c7c7c7, 60px 0 0 -8px #c7c7c7, 61px 0 0 -8px #c7c7c7, 62px 0 0 -8px #c7c7c7, 63px 0 0 -8px #c7c7c7, 64px 0 0 -8px #c7c7c7, 65px 0 0 -8px #c7c7c7, 66px 0 0 -8px #c7c7c7, 67px 0 0 -8px #c7c7c7, 68px 0 0 -8px #c7c7c7, 69px 0 0 -8px #c7c7c7, 70px 0 0 -8px #c7c7c7, 71px 0 0 -8px #c7c7c7, 72px 0 0 -8px #c7c7c7, 73px 0 0 -8px #c7c7c7, 74px 0 0 -8px #c7c7c7, 75px 0 0 -8px #c7c7c7, 76px 0 0 -8px #c7c7c7, 77px 0 0 -8px #c7c7c7, 78px 0 0 -8px #c7c7c7, 79px 0 0 -8px #c7c7c7, 80px 0 0 -8px #c7c7c7, 81px 0 0 -8px #c7c7c7, 82px 0 0 -8px #c7c7c7, 83px 0 0 -8px #c7c7c7, 84px 0 0 -8px #c7c7c7, 85px 0 0 -8px #c7c7c7, 86px 0 0 -8px #c7c7c7, 87px 0 0 -8px #c7c7c7, 88px 0 0 -8px #c7c7c7, 89px 0 0 -8px #c7c7c7, 90px 0 0 -8px #c7c7c7, 91px 0 0 -8px #c7c7c7, 92px 0 0 -8px #c7c7c7, 93px 0 0 -8px #c7c7c7, 94px 0 0 -8px #c7c7c7, 95px 0 0 -8px #c7c7c7, 96px 0 0 -8px #c7c7c7, 97px 0 0 -8px #c7c7c7, 98px 0 0 -8px #c7c7c7, 99px 0 0 -8px #c7c7c7, 100px 0 0 -8px #c7c7c7, 101px 0 0 -8px #c7c7c7, 102px 0 0 -8px #c7c7c7, 103px 0 0 -8px #c7c7c7, 104px 0 0 -8px #c7c7c7, 105px 0 0 -8px #c7c7c7, 106px 0 0 -8px #c7c7c7, 107px 0 0 -8px #c7c7c7, 108px 0 0 -8px #c7c7c7, 109px 0 0 -8px #c7c7c7, 110px 0 0 -8px #c7c7c7, 111px 0 0 -8px #c7c7c7, 112px 0 0 -8px #c7c7c7, 113px 0 0 -8px #c7c7c7, 114px 0 0 -8px #c7c7c7, 115px 0 0 -8px #c7c7c7, 116px 0 0 -8px #c7c7c7, 117px 0 0 -8px #c7c7c7, 118px 0 0 -8px #c7c7c7, 119px 0 0 -8px #c7c7c7, 120px 0 0 -8px #c7c7c7, 121px 0 0 -8px #c7c7c7, 122px 0 0 -8px #c7c7c7, 123px 0 0 -8px #c7c7c7, 124px 0 0 -8px #c7c7c7, 125px 0 0 -8px #c7c7c7, 126px 0 0 -8px #c7c7c7, 127px 0 0 -8px #c7c7c7, 128px 0 0 -8px #c7c7c7, 129px 0 0 -8px #c7c7c7, 130px 0 0 -8px #c7c7c7, 131px 0 0 -8px #c7c7c7, 132px 0 0 -8px #c7c7c7, 133px 0 0 -8px #c7c7c7, 134px 0 0 -8px #c7c7c7, 135px 0 0 -8px #c7c7c7, 136px 0 0 -8px #c7c7c7, 137px 0 0 -8px #c7c7c7, 138px 0 0 -8px #c7c7c7, 139px 0 0 -8px #c7c7c7, 140px 0 0 -8px #c7c7c7, 141px 0 0 -8px #c7c7c7, 142px 0 0 -8px #c7c7c7, 143px 0 0 -8px #c7c7c7, 144px 0 0 -8px #c7c7c7, 145px 0 0 -8px #c7c7c7, 146px 0 0 -8px #c7c7c7, 147px 0 0 -8px #c7c7c7, 148px 0 0 -8px #c7c7c7, 149px 0 0 -8px #c7c7c7, 150px 0 0 -8px #c7c7c7, 151px 0 0 -8px #c7c7c7, 152px 0 0 -8px #c7c7c7, 153px 0 0 -8px #c7c7c7, 154px 0 0 -8px #c7c7c7, 155px 0 0 -8px #c7c7c7, 156px 0 0 -8px #c7c7c7, 157px 0 0 -8px #c7c7c7, 158px 0 0 -8px #c7c7c7, 159px 0 0 -8px #c7c7c7, 160px 0 0 -8px #c7c7c7, 161px 0 0 -8px #c7c7c7, 162px 0 0 -8px #c7c7c7, 163px 0 0 -8px #c7c7c7, 164px 0 0 -8px #c7c7c7, 165px 0 0 -8px #c7c7c7, 166px 0 0 -8px #c7c7c7, 167px 0 0 -8px #c7c7c7, 168px 0 0 -8px #c7c7c7, 169px 0 0 -8px #c7c7c7, 170px 0 0 -8px #c7c7c7, 171px 0 0 -8px #c7c7c7, 172px 0 0 -8px #c7c7c7, 173px 0 0 -8px #c7c7c7, 174px 0 0 -8px #c7c7c7, 175px 0 0 -8px #c7c7c7, 176px 0 0 -8px #c7c7c7, 177px 0 0 -8px #c7c7c7, 178px 0 0 -8px #c7c7c7, 179px 0 0 -8px #c7c7c7, 180px 0 0 -8px #c7c7c7, 181px 0 0 -8px #c7c7c7, 182px 0 0 -8px #c7c7c7, 183px 0 0 -8px #c7c7c7, 184px 0 0 -8px #c7c7c7, 185px 0 0 -8px #c7c7c7, 186px 0 0 -8px #c7c7c7, 187px 0 0 -8px #c7c7c7, 188px 0 0 -8px #c7c7c7, 189px 0 0 -8px #c7c7c7, 190px 0 0 -8px #c7c7c7, 191px 0 0 -8px #c7c7c7, 192px 0 0 -8px #c7c7c7, 193px 0 0 -8px #c7c7c7, 194px 0 0 -8px #c7c7c7, 195px 0 0 -8px #c7c7c7, 196px 0 0 -8px #c7c7c7, 197px 0 0 -8px #c7c7c7, 198px 0 0 -8px #c7c7c7, 199px 0 0 -8px #c7c7c7, 200px 0 0 -8px #c7c7c7, 201px 0 0 -8px #c7c7c7, 202px 0 0 -8px #c7c7c7, 203px 0 0 -8px #c7c7c7, 204px 0 0 -8px #c7c7c7, 205px 0 0 -8px #c7c7c7, 206px 0 0 -8px #c7c7c7, 207px 0 0 -8px #c7c7c7, 208px 0 0 -8px #c7c7c7, 209px 0 0 -8px #c7c7c7, 210px 0 0 -8px #c7c7c7, 211px 0 0 -8px #c7c7c7, 212px 0 0 -8px #c7c7c7, 213px 0 0 -8px #c7c7c7, 214px 0 0 -8px #c7c7c7, 215px 0 0 -8px #c7c7c7, 216px 0 0 -8px #c7c7c7, 217px 0 0 -8px #c7c7c7, 218px 0 0 -8px #c7c7c7, 219px 0 0 -8px #c7c7c7, 220px 0 0 -8px #c7c7c7, 221px 0 0 -8px #c7c7c7, 222px 0 0 -8px #c7c7c7, 223px 0 0 -8px #c7c7c7, 224px 0 0 -8px #c7c7c7, 225px 0 0 -8px #c7c7c7, 226px 0 0 -8px #c7c7c7, 227px 0 0 -8px #c7c7c7, 228px 0 0 -8px #c7c7c7, 229px 0 0 -8px #c7c7c7, 230px 0 0 -8px #c7c7c7, 231px 0 0 -8px #c7c7c7, 232px 0 0 -8px #c7c7c7, 233px 0 0 -8px #c7c7c7, 234px 0 0 -8px #c7c7c7, 235px 0 0 -8px #c7c7c7, 236px 0 0 -8px #c7c7c7, 237px 0 0 -8px #c7c7c7, 238px 0 0 -8px #c7c7c7, 239px 0 0 -8px #c7c7c7, 240px 0 0 -8px #c7c7c7;
            margin-top: -8px;
            border: 1px solid #777;
            }
        input::-moz-range-thumb {
            height: 20px;
            width: 20px;
            background: #fff;
            border-radius: 100%;
            border: 1px solid #777;
            position: relative;
            }
        input::-moz-range-progress {
            height: 5px;
            background: #3399aa;
            border: 0;
            margin-top: 0;
            }
    </style>
  </head>
  <body onload="initMap()">

    <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand lead" href="index.php">TrajElec</a>
      </nav>
    </header>
    <div class="position-relative overflow-hidden p-5 text-center bg-light" id="headline">
        <div class=" p-lg-3 mx-auto my-5">
            <h1 class="display-3 font-weight-normal">Find your electric journey</h1>
            <div class="container-fluid">
                <form action="result.php" method="post">     
                    <br>
                    <input id="ilat" name="ilat" type="hidden"/>
                    <input id="ilng" name="ilng" type="hidden"/>
                    <input id="jlat" name="jlat" type="hidden"/>
                    <input id="jlng" name="jlng" type="hidden"/>
                    <div class="center-block">
                    <label class="font-weight-bold">Choose your electic vehicle:</label>
                    </div>
                    <div class="center-block">
                        <?php
                            //Vérification de la date limite
                            include "bdd.php";
                            $mysqli = get_bdd();
                            $query = "SELECT * FROM car";
                            $result = $mysqli->query($query);      
                        ?>
                        <div>
                            <select name="VE" class="custom-select" id="VE">
                                <?php
                                    while($row = mysqli_fetch_assoc($result)){
                                ?>
                                    <option><?php echo $row["Modele"];?></option>
                                <?php
                                    }
                                    $mysqli->close();
                                ?>
                            </select>
                        </div>      
                    </div>
                    <div class="center-block">
                        <br>
                        <label class="font-weight-bold">Starting energy:</label>
                    </div>
                    <div class="center-block">
                        <input type="range" name="startEnergyInName" id="startEnergyIn" value="100" min="1" max="100" oninput="startEnergyOut.value = startEnergyIn.value">
                        <output name="startEnergyOutName" id="startEnergyOut">100</output>
                    </div>
                    <div class="center-block">
                    <br>
                        <label class="font-weight-bold">Remaining energy at destination:</label>
                    </div>
                    <div class="center-block">
                        <input type="range" name="endEnergyInName" id="endEnergyIn" value="20" min="1" max="100" oninput="endEnergyOut.value = endEnergyIn.value">
                        <output name="endEnergyOutName" id="endEnergyOut">20</output>
                    <div>
                    <br>
                    <div class="center-block">
                        <div class="form-row">
                            <div class="col">
                                <input class="form-control" id="start" type="text" placeholder="From">   
                            </div>
                            <div class="col">
                                <input class="form-control" id="end" type="text" placeholder="To">
                            </div>
                        </div>
                    <br>
                        <input type="submit" class="btn btn-success mb-2" id="submit" value="Search">
                    </div>
                    <div class="center-block">
                    <br>
                    <br>
                    <br>
                    <br>
                    <p class="copyright">© 2018 Benoit Mangeard - Jixiong Liu - Charles Mailly - Yves William OBAME EDOU - Yuang Xuan</p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="map"></div>
  </body>
  <script>
    
      var i, j ,ilat, ilng, jlat, jlng;
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
            google.maps.event.addListener(startAutocomplete, 'place_changed', function () {
                i = startAutocomplete.getPlace();
                ilat = i.geometry.location.lat();
                ilng = i.geometry.location.lng();   
                document.getElementById("ilat").value = ilat;
                document.getElementById("ilng").value = ilng; 
            });

            var endAutocomplete = new google.maps.places.Autocomplete(inputEnd);
            endAutocomplete.bindTo('bounds', map);
            google.maps.event.addListener(endAutocomplete, 'place_changed', function () {
                j = endAutocomplete.getPlace();
                jlat = j.geometry.location.lat();
                jlng = j.geometry.location.lng(); 
                document.getElementById("jlat").value = jlat;
                document.getElementById("jlng").value = jlng; 
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
</html>

