<?php   
 session_start();  
 ?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sobre</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="shortcut icon" href="img/animal-prints (1).png"/>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer, body {
		font-family:Tahoma, Geneva, sans-serif;
      /*background-color: #555;
      color: white;
      padding: 15px;*/
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }

    /* Set the size of the div element that contains the map */
    #map {
        height: 400px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
}
  </style>
</head>
<body>

<!-- Cabeçalho -->
 <?php include("cabecalho.php"); ?>
  
<div class="container-fluid text-center">    
  <div class="row content">
   
 
      <!-- Centro -->
    <div class="col-sm-12 text-left"> 
      <center><h1>Sobre</h1></center>
      <hr>
       <center><h3>Onde nos encontrar?</h3></center>


  <div id="map"></div>
    <script>
      // Initialize and add the map
      function initMap() {
        // The location of Uluru
        var uluru = {lat: -23.965544, lng: -46.326133};
        // The map, centered at Uluru
        var map = new google.maps.Map(
            document.getElementById('map'), {zoom: 4, center: uluru});
        // The marker, positioned at Uluru
        var marker = new google.maps.Marker({position: uluru, map: map});
      }
      </script>
        
     <script async defer
          src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap">
    </script>
    </div>



 
  </div>
</div>
<?php include_once("footer.php");?>

</body>
<script>
$(document).ready(function(){
        $("#logout").hide();
        });


</script>
</html>
