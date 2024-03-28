<?php

include("include/common.php");

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Patte - Map</title>
  <link rel="icon" href="assets/img/heading-img.png">
  <!-- CSS only -->
   <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
   <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
   <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
   <link rel="stylesheet" href="assets/css/slick.css">
   <link rel="stylesheet" href="assets/css/slick-theme.css">
   <!-- nice-select -->
   <link rel="stylesheet" href="assets/css/nice-select.css">
   <!-- fancybox -->
   <link rel="stylesheet" href="assets/css/jquery.fancybox.min.css">
   <link rel="stylesheet" href="assets/css/fontawesome.min.css">
   <!-- style -->
   <link rel="stylesheet" href="assets/css/style.css">
   <!-- responsive -->
   <link rel="stylesheet" href="assets/css/responsive.css">
   <!-- color -->
   <link rel="stylesheet" href="assets/css/color.css">
   <!-- jQuery -->
   <script src="assets/js/jquery-3.6.0.min.js"></script>
   <script src="assets/js/preloader.js"></script>

   <script src="https://maps.googleapis.com/maps/api/js?key=<?=API_KEY?>&v=3.0&dummy=dummy.js"></script>


    <style>

        #map {
            width: 100%;
            height: 500px;
        }
    </style>
 </head>
<body>

<?php include ("header.php");?>


<section class="banner" style="background-color: #fff8e5; background-image:url(assets/img/banner.png)">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="banner-text">
                    <h2>Map</h2>
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="index.php">Home</a>
                      </li>
                        <li class="breadcrumb-item active" aria-current="page">Map</li>
                    </ol>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="banner-img">
                    <div class="banner-img-1">
                        <svg width="260" height="260" viewBox="0 0 673 673" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.82698 416.603C-19.0352 298.701 18.5108 173.372 107.497 90.7633L110.607 96.5197C24.3117 177.199 -12.311 298.935 15.0502 413.781L9.82698 416.603ZM89.893 565.433C172.674 654.828 298.511 692.463 416.766 663.224L414.077 658.245C298.613 686.363 175.954 649.666 94.9055 562.725L89.893 565.433ZM656.842 259.141C685.039 374.21 648.825 496.492 562.625 577.656L565.413 582.817C654.501 499.935 691.9 374.187 662.536 256.065L656.842 259.141ZM581.945 107.518C499.236 18.8371 373.997 -18.4724 256.228 10.5134L259.436 16.4515C373.888 -10.991 495.248 25.1518 576.04 110.708L581.945 107.518Z" fill="#fa441d"></path>
                        </svg>
                        <img src="assets/img/banner-img-1.jpg" alt="banner">
                    </div>
                    <div class="banner-img-2">
                        <svg width="320" height="320" viewBox="0 0 673 673" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.82698 416.603C-19.0352 298.701 18.5108 173.372 107.497 90.7633L110.607 96.5197C24.3117 177.199 -12.311 298.935 15.0502 413.781L9.82698 416.603ZM89.893 565.433C172.674 654.828 298.511 692.463 416.766 663.224L414.077 658.245C298.613 686.363 175.954 649.666 94.9055 562.725L89.893 565.433ZM656.842 259.141C685.039 374.21 648.825 496.492 562.625 577.656L565.413 582.817C654.501 499.935 691.9 374.187 662.536 256.065L656.842 259.141ZM581.945 107.518C499.236 18.8371 373.997 -18.4724 256.228 10.5134L259.436 16.4515C373.888 -10.991 495.248 25.1518 576.04 110.708L581.945 107.518Z" fill="#fa441d"></path>
                        </svg>
                        <img src="assets/img/banner-img-2.jpg" alt="banner">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <img src="assets/img/hero-shaps-1.png" alt="hero-shaps" class="img-2">
    <img src="assets/img/hero-shaps-1.png" alt="hero-shaps" class="img-4">
</section>
<section class="gap">
    <div class="container">
        <div class="heading">
            <h6>We would love to hear from you.</h6>
            <h2>Expert Pet Care with a personal touch</h2>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="content-us">
                    <div id="map"></div>
                </div>
            </div>

        </div>
    </div>
</section>



<?php include ("footer.php");?>

<!-- Bootstrap Js -->
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/slick.min.js"></script>
<script src="assets/js/jquery.nice-select.min.js"></script>
<!-- fancybox -->
<script src="assets/js/jquery.fancybox.min.js"></script>
<script src="assets/js/custom.js"></script>

<script type="text/javascript">

    var gmarkers1 = [];
    var markers1 = [];

    var infowindow = new google.maps.InfoWindow({
        content: ''
    });

    // Our markers
    markers1 = [

        <?php
        $list = $DB->getAll("SELECT * FROM `pet` where status=1 and jd!='' and wd!='' order by id desc " );
        foreach ($list as $row){

        ?>
        ['<?=$row["id"]?>', '<p class="infowin_title" style="font-weight:800;"><a href="pet_details.php?id=<?=$row["id"]?>"><?=$row["title"]?></a></p><div class="infowin_head" style="width:200px;"><p class="Shop_address"><?=str_replace(array("\r\n", "\r", "\n"), "",$row["address"])?></p></div>', '<?=$row["jd"]?>', '<?=$row["wd"]?>'],

        <?php } ?>



    ];


    /**
     * Function to init map
     */

    function initialize() {

        var center = new google.maps.LatLng(22.285466, 114.13898489999997);
        var mapOptions = {
            zoom: 18,
            center: center,
            mapTypeId: google.maps.MapTypeId.TERRAIN,
        };

        map = new google.maps.Map(document.getElementById('map'), mapOptions);
        for (i = 0; i < markers1.length; i++) {
            addMarker(markers1[i]);
        }

    }

    /**
     * Function to add marker to map
     */

    function addMarker(marker) {
        var title = marker[1];
        var pos = new google.maps.LatLng(marker[2], marker[3]);
        var content = marker[1];

        /*var markerLetter = 'M';*/
        /*var markerIcon = MARKER_PATH + markerLetter + '.png';*/
        /*var markerIcon = 'dist/images/map_icon.png';*/
        var markerIcon = {
            url: "assets/img/map_icon.png", // url
            scaledSize: new google.maps.Size(25, 25), // scaled size
            origin: new google.maps.Point(0,0), // origin
            anchor: new google.maps.Point(0, 0) // anchor
        };

        marker1 = new google.maps.Marker({
            title: title,
            position: pos,
            icon: markerIcon,
            map: map
        });

        gmarkers1.push(marker1);


        // Marker click listener
        google.maps.event.addListener(marker1, 'click', (function (marker1, content) {

            return function () {
                infowindow.setContent(content);
                infowindow.open(map, marker1);
                map.panTo(this.getPosition());
                map.setZoom(18);
            }
        })(marker1, content));
    }

    function infoOpen(infolat, infolon, infoId, infozoom){

        for (i = 0; i < markers1.length; i++) {
            if(infoId==markers1[i][0]){
                addMarker(markers1[i]);
            }
        }

        google.maps.event.trigger(marker1, 'click', (function (marker1, content) {
            return function () {

                infowindow.setContent(content);
                infowindow.open(map, marker1);

            }
        })(marker1));

    }

    function newLocation(newLat,newLng, newZoom) {
        map.setCenter({
            lat : newLat,
            lng : newLng
        });
        map.setZoom(newZoom);
    }


    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
        function showMap(newlat,newlog, newZoom, i){

            (function(global, $){

            })(this, jQuery)

            map.setCenter({
                lat : newlat,
                lng : newlog
            });
            map.setZoom(newZoom);
            var marid = i;
            var lat = newlat;
            var lon = newlog;
            var zo = newZoom;
            infoOpen(lat, lon, marid, zo);
        }




    } else{
        function showMap(newlat,newlog, newZoom, i){
            map.setCenter({
                lat : newlat,
                lng : newlog
            });
            map.setZoom(newZoom);
            var marid = i;
            var lat = newlat;
            var lon = newlog;
            var zo = newZoom;

            infoOpen(lat, lon, marid, zo);
        }

    }

    // Init map
    google.maps.event.addDomListener(window, 'load', initialize);

    $(window).resize(function() {

        if ($(window).width() <= 764) {

            $("#map").height(250);
            $("#map").css("min-height","200px");

        }else{

            $("#map").height(500);
            $("#map").css("min-height","500px");
        }

    });


</script>
</body>
</html>
