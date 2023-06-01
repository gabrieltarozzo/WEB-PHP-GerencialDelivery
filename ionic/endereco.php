<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script src="https://code.jquery.com/jquery-2.x-git.min.js"></script>
    <script  defer src="https://maps.googleapis.com/maps/api/js?libraries=places&language=pt-br&key=AIzaSyCGU0PK5ks0K4jqqAZ6l2A6FKWUknklPkM"  type="text/javascript"></script>

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<div class="row">
<div class="jumbotron">
<h1>Calculo de distancia entre 2 endereços : ATALOS</h1>
</div>
<!--    -->

<?php
/**
 * gMaps Class
 *
 * Pega as informações de latitude, longitude e zoom de um endereço usando a API do Google Maps
 *
 * @author Thiago Belem <contato@thiagobelem.net>
 */
class gMaps {
  private $mapsKey;
  function __construct($key = null) {
    if (!is_null($key)) {
      $this->mapsKey = $key;
    }
  }
  function carregaUrl($url) {
    if (function_exists('curl_init')) {
      $cURL = curl_init($url);
      curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($cURL, CURLOPT_FOLLOWLOCATION, true);
      $resultado = curl_exec($cURL);
      curl_close($cURL);
    } else {
      $resultado = file_get_contents($url);
    }
    if (!$resultado) {
      trigger_error('Não foi possível carregar o endereço: <strong>' . $url . '</strong>');
    } else {
      return $resultado;
    }
  }
  function geoLocal($endereco) {
    $url = "https://maps.googleapis.com/maps/api/geocode/json?key={$this->mapsKey}&address=" . urlencode($endereco);
    $data = json_decode($this->carregaUrl($url));
    
    if ($data->status === 'OK') {
      return $data->results[0]->geometry->location;
    } else {
      return false;
    }
  }
}




?>
<!--  -->

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
             $uf = $rows_enderecos['uf'];
             $pais = $rows_enderecos['pais'];
            $endereco = $rua.", ".$numero." - ".$bairro.", ".$cidade." - ".$uf.", ".$pais;

            // $id_doidi = $rows_enderecos['situacao_id'];
            // $nome_situacao = ("SELECT nome FROM situacoes WHERE id = '$id_doidi'  ");
            // $resultado_situacao = mysqli_query($conn, $nome_situacao);
            // $roww = mysqli_fetch_assoc($resultado_situacao);
            // $n_sit = $roww['nome'];
        }
             ?>

<div class="col-md-6">
<form id="distance_form">
<div class="form-group"><label>Origin: </label>  

    <input class="form-control" readonly id="from_places" value="<?php echo $endereco;?>" name="aqui" placeholder="" />
 <input id="origin" name="origin" value="<?php echo $endereco;?>" type="hidden" />
</div>



<div class="form-group"><label>Destination: </label> 
    <input class="form-control" id="to_places" placeholder="Enter a location" /> 
    <input id="destination" name="destination" required="" type="hidden" /></div>
<input class="btn btn-primary" type="submit" value="Calculate" /></form>


<div id="result">
    <ul class="list-group">
        <li  class="list-group-item d-flex justify-content-between align-items-center">
            Distance In Mile :
            <span id="in_mile" class="badge badge-primary badge-pill"></span>
        </li>
        <li  class="list-group-item d-flex justify-content-between align-items-center">
            Distance is Kilo:
            <span id='in_kilo' class="badge badge-primary badge-pill"></span>
        </li>
        <li  class="list-group-item d-flex justify-content-between align-items-center">
            IN TEXT:
            <span id="duration_text" class="badge badge-primary badge-pill"></span>
        </li>
        <li  class="list-group-item d-flex justify-content-between align-items-center">
            IN MINUTES:
            <span id="duration_value" class="badge badge-primary badge-pill"></span>
        </li>

        <li  class="list-group-item d-flex justify-content-between align-items-center">
            FROM:
            <span id="from" class="badge badge-primary badge-pill"></span>
        </li>
        <li  class="list-group-item d-flex justify-content-between align-items-center">
            TO:
            <span id="to" class="badge badge-primary badge-pill"></span>
        </li>

    </ul>
</div>

</div>
</div>
</div>

<?php
//Em php, para puxar as informações e usalas como variavel no script lá embaixo, é dessa forma que faz, no Ionic talvez seja diferente... ai tem que adaptar o método que se puxa as informações. .. talvez posso colocar o resultado de todos seja recebido em uma variavel "resultado", e levar essa variavel atravez de uma API PHP pro ionic
    $result_precos = "SELECT * FROM precos WHERE id=1 ";
    $resultado_precos = mysqli_query($conn, $result_precos);
    $total_precos = mysqli_num_rows($resultado_precos);   
    $varR = 'R$';
     while($rows_precos = mysqli_fetch_assoc($resultado_precos)){ 
            $valores1 =  $rows_precos['valores']; 
        }
    $result_precos2 = "SELECT * FROM precos WHERE id=2 ";
    $resultado_precos2 = mysqli_query($conn, $result_precos2);
    $total_precos2 = mysqli_num_rows($resultado_precos2);   
     while($rows_precos2 = mysqli_fetch_assoc($resultado_precos2)){ 
            $valores2 =  $rows_precos2['valores']; 
        }
            $result_precos3 = "SELECT * FROM precos WHERE id=3 ";
    $resultado_precos3 = mysqli_query($conn, $result_precos3);
    $total_precos3 = mysqli_num_rows($resultado_precos3);   
     while($rows_precos3 = mysqli_fetch_assoc($resultado_precos3)){ 
            $valores3 =  $rows_precos3['valores']; 
        }
            $result_precos4 = "SELECT * FROM precos WHERE id=4 ";
    $resultado_precos4 = mysqli_query($conn, $result_precos4);
    $total_precos4 = mysqli_num_rows($resultado_precos4);   
     while($rows_precos4 = mysqli_fetch_assoc($resultado_precos4)){ 
            $valores4 =  $rows_precos4['valores']; 
        }
            $result_precos5 = "SELECT * FROM precos WHERE id=5 ";
    $resultado_precos5 = mysqli_query($conn, $result_precos5);
    $total_precos5 = mysqli_num_rows($resultado_precos5);   
     while($rows_precos5 = mysqli_fetch_assoc($resultado_precos5)){ 
            $valores5 =  $rows_precos5['valores']; 
        }
            $result_precos6 = "SELECT * FROM precos WHERE id=6 ";
    $resultado_precos6 = mysqli_query($conn, $result_precos6);
    $total_precos6 = mysqli_num_rows($resultado_precos6);   
     while($rows_precos6 = mysqli_fetch_assoc($resultado_precos6)){ 
            $valores6 =  $rows_precos6['valores']; 
        }
             ?>


<script>



    $(function() {
        // add input listeners
        google.maps.event.addDomListener(window, 'load', function () {
            var from_places = new google.maps.places.Autocomplete(document.getElementById('from_places'));
            var to_places = new google.maps.places.Autocomplete(document.getElementById('to_places'));

            google.maps.event.addListener(from_places, 'place_changed', function () {
                var from_place = from_places.getPlace();
                var from_address = from_place.formatted_address;
                $('#origin').val(from_address);
            });

            google.maps.event.addListener(to_places, 'place_changed', function () {
                var to_place = to_places.getPlace();
                var to_address = to_place.formatted_address;
                $('#destination').val(to_address);
            });

        });


        // calculate distance
        function calculateDistance() {
            var origin = $('#origin').val();
            var destination = $('#destination').val();
            var service = new google.maps.DistanceMatrixService();
            service.getDistanceMatrix(
                {
                    origins: [origin],
                    destinations: [destination],
                    travelMode: google.maps.TravelMode.DRIVING,
                    unitSystem: google.maps.UnitSystem.IMPERIAL, // miles and feet.
                    // unitSystem: google.maps.UnitSystem.metric, // kilometers and meters.
                    avoidHighways: false,
                    avoidTolls: false
                }, callback);
        }
        // get distance results
        function callback(response, status) {
            if (status != google.maps.DistanceMatrixStatus.OK) {
                $('#result').html(err);
            } else {
                var origin = response.originAddresses[0];
                var destination = response.destinationAddresses[0];
                if (response.rows[0].elements[0].status === "ZERO_RESULTS") {
                    $('#result').html("Melhor ir de avião, não tem estrada para você =D"  + origin + " and " + destination);
                } else {
                    var distance = response.rows[0].elements[0].distance;
                    var duration = response.rows[0].elements[0].duration;
                    console.log(response.rows[0].elements[0].distance);
                    var distance_in_kilo = distance.value / 1000; // the kilom
                    var distance_in_mile = distance.value / 1609.34; // the mile
                    var duration_text = duration.text;
                    var duration_value = duration.value;
                    $('#in_mile').text(distance_in_mile.toFixed(2));
                    $('#in_kilo').text(distance_in_kilo.toFixed(2));
               if (distance_in_kilo <= 1.0){
                alert("<?php echo $varR."".$valores1 ?>");
               }
                 if (distance_in_kilo >= 1.1 && distance_in_kilo <= 2.0 ){
               alert("<?php echo $varR."".$valores2 ?>");
               }
                                if (distance_in_kilo >= 2.1 && distance_in_kilo <= 3.0 ){
               alert("<?php echo $varR."".$valores3 ?>");
               }
                                if (distance_in_kilo >= 3.1 && distance_in_kilo <= 4.0 ){
               alert("<?php echo $varR."".$valores4 ?>");
               }
                                if (distance_in_kilo >= 4.1 && distance_in_kilo <= 5.0 ){
               alert("<?php echo $varR."".$valores5 ?>");
               }
                                if (distance_in_kilo >= 5.1){
                //pode ser apresentado varias formas, modifique para sua linguagem ex.. em ionic é  de outro jeito provavelmente, ou não
                // como alert:
              alert("<?php echo $varR."".$valores6; ?>");
              // como resultado em texto:
              // $('#result').html("<?php echo $valores6 ?>");
               }
                    // if (distance_in_kilo > 3 || < 4){
                    //     $('#result').html("deu certo 3 e 4");
                    // }
                    $('#duration_text').text(duration_text);
                    $('#duration_value').text(duration_value);
                    $('#from').text(origin);
                    $('#to').text(destination);
                }
            }
        }
        // print results on submit the form
        $('#distance_form').submit(function(e){
            e.preventDefault();
            calculateDistance();


        });

    });


</script>


<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-2.x-git.min.js"></script>
</body>
</html>