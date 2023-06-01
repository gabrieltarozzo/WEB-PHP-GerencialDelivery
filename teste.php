<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Google Maps localiza latitude / longitude</title>

<link href="../../css/screen.css" rel="stylesheet" type="text/css" />
 <?php 
    include_once("conexao.php");
    $result_enderecos = "SELECT * FROM endereco WHERE id=1";
    $resultado_enderecos = mysqli_query($conn, $result_enderecos);
    //Contar o total de categorias
    $total_enderecos = mysqli_num_rows($resultado_enderecos);  
    while($rows_enderecos = mysqli_fetch_assoc($resultado_enderecos)){ 




            $cidade =  $rows_enderecos['cidade']; 
            $bairro = $rows_enderecos['bairro'];
            $rua = $rows_enderecos['rua'];
            $numero = $rows_enderecos['numero'];
            $latitude = $rows_enderecos['Latitude'];
            $longitude = $rows_enderecos['Longitude'];
            $endereco = $rua.", ".$numero." - ".$bairro.", ".$cidade;
            echo $endereco;
        
            // $id_doidi = $rows_enderecos['situacao_id'];
            // $nome_situacao = ("SELECT nome FROM situacoes WHERE id = '$id_doidi'  ");
            // $resultado_situacao = mysqli_query($conn, $nome_situacao);
            // $roww = mysqli_fetch_assoc($resultado_situacao);
            // $n_sit = $roww['nome'];
        }
             ?>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBdUJE4lyPDd8QQUio9iYOTQaw_mkx6X94&callback=initMap"></script>
<script type="text/javascript">
  var map;
  var geocoder;
  var centerChangedLast;
  var reverseGeocodedLast;
  var currentReverseGeocodeResponse;

  function initialize() {
    var latlng = new google.maps.LatLng(32.5468,-23.2031);
    var myOptions = {
      zoom: 2,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
    geocoder = new google.maps.Geocoder();


    setupEvents();
    centerChanged();
  }

  function setupEvents() {
    reverseGeocodedLast = new Date();
    centerChangedLast = new Date();

    setInterval(function() {
      if((new Date()).getSeconds() - centerChangedLast.getSeconds() > 1) {
        if(reverseGeocodedLast.getTime() < centerChangedLast.getTime())
          reverseGeocode();
      }
    }, 1000);

    google.maps.event.addListener(map, 'zoom_changed', function() {
      document.getElementById("zoom_level").innerHTML = map.getZoom();
    });

    google.maps.event.addListener(map, 'center_changed', centerChanged);

    google.maps.event.addDomListener(document.getElementById('crosshair'),'dblclick', function() {
       map.setZoom(map.getZoom() + 1);
    });

  }
// aqui
  function getCenterLatLngText() {
    return '(' + map.getCenter().lat() +', '+ map.getCenter().lng() +')';
  }



  function centerChanged() {
    centerChangedLast = new Date();
    var latlng = getCenterLatLngText();
    document.getElementById('latlng').innerHTML = latlng;
    document.getElementById('formatedAddress').innerHTML = '';
    currentReverseGeocodeResponse = null;
  }

  function reverseGeocode() {
    reverseGeocodedLast = new Date();
    geocoder.geocode({latLng:map.getCenter()},reverseGeocodeResult);
  }

  function reverseGeocodeResult(results, status) {
    currentReverseGeocodeResponse = results;
    if(status == 'OK') {
      if(results.length == 0) {
        document.getElementById('formatedAddress').innerHTML = 'None';
      } else {
        document.getElementById('formatedAddress').innerHTML = results[0].formatted_address;
      }
    } else {
      document.getElementById('formatedAddress').innerHTML = 'Error';
    }
  }


  function geocode() {
    var address = document.getElementById("address").value;
    geocoder.geocode({
      'address': address,
      'partialmatch': true}, geocodeResult);
  }

  function geocodeResult(results, status) {
    if (status == 'OK' && results.length > 0) {
      map.fitBounds(results[0].geometry.viewport);
    } else {
      alert("Geocode was not successful for the following reason: " + status);
    }
  }

  function addMarkerAtCenter() {
    var marker = new google.maps.Marker({
        position: map.getCenter(),
        map: map
    });

    var text = 'Lat/Lng: ' + getCenterLatLngText();
    if(currentReverseGeocodeResponse) {
      var addr = '';
      if(currentReverseGeocodeResponse.size == 0) {
        addr = 'None';
      } else {
        addr = currentReverseGeocodeResponse[0].formatted_address;
      }
      text = text + '<br>' + 'address: <br>' + addr;
    }

    var infowindow = new google.maps.InfoWindow({ content: text });

    google.maps.event.addListener(marker, 'click', function() {
      infowindow.open(map,marker);
    });
  }


</script>


</head>

<body onLoad="initialize()">
<h1 style="display:none;">APP Google Maps - Localizar Latitude / Longitude</h1>
<div style="position: relative; width:980px; left:50%; margin-left:-490px; height:90px;">
  <div style="position:absolute; left:0px; top:20px;">
      <a href="http://www.procriativo.com.br/" target="_blank"><img src="../../images/geral/logo-procriativo.png" /></a>
    </div>
    
    <div style="position:absolute; right:0px; top:30px;">
      Localizar Região: 
        <input type="text" class="form_contato" id="address" style="width:300px; margin-right:15px;"/>
        
        <input type="button" value="Procurar" onClick="geocode()" class="form_contato"> <input type="button" value="Adicionar ponto no mapa" onClick="addMarkerAtCenter()" class="form_contato"/>
  </div>
</div>
<div style="background:url(../../images/geral/separacao_line.png) repeat-x; height:2px;"></div>
<div style="position: relative; width:980px; left:50%; margin-left:-490px; height:40px; line-height:40px; text-align:center;" class="Caecilia17">Para realizar a pesquisa digite no formulario acima o endereço desejado.</div>
<div style="background:url(../../images/geral/separacao_line.png) repeat-x; height:2px;"></div>
<div style="background:#ffffff;">
    <div id="map">
    <div id="map_canvas" style="width:100%; height:400px"></div>

    <div id="crosshair"></div>
  </div>
</div>
<div style="background:url(../../images/geral/separacao_line.png) repeat-x; height:2px;"></div>
<div style="position: relative; width:980px; left:50%; margin-left:-490px; height:90px; margin-top:20px; line-height:20px;" class="arial15cinza">
  Latitude / Longitude: <span id="latlng"></span><br />
  Endereço: <span id="formatedAddress"></span><br />
    Nivel do zoom: <span id="zoom_level"></span><br />
    Latitude: <span id="lat"></span><br />
    Longitude: <span id="lng"></span><br />
</div>
</body>



<?php
function Distance($lat1, $lon1, $lat2, $lon2, $unit) { 
  
  $radius = 6378.137; // earth mean radius defined by WGS84
  $dlon = $lon1 - $lon2; 
  $distance = acos( sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($dlon))) * $radius; 

  if ($unit == "K") {
      return ($distance); 
  } else if ($unit == "M") {
      return ($distance * 0.621371192);
  } else if ($unit == "N") {
      return ($distance * 0.539956803);
  } else {
      return 0;
  }
}

$lat1 = $latitude;
$lon1 = $longitude;

$lat2 = -20.801616993077342;
$lon2 = -49.39363850000001;

echo Distance($lat1, $lon1, $lat2, $lon2, "K") . " kilometers<br>";
echo Distance($lat1, $lon1, $lat2, $lon2, "M") . " miles<br>";
echo Distance($lat1, $lon1, $lat2, $lon2, "N") . " nautical miles<br>";
?>


</html>




