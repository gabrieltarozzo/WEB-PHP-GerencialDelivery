<?php
header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");
//header("Accept: application/json");
header("Content-Type: application/json;");

//header("Access-Control-Allow-Origin:http://localhost:8100");
//header("Content-Type: application/x-www-form-urlencoded");
//header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

	 include"config.php";

	// $origins=$_GET["origin"];
//	 $destinations = $_GET["destination"];
 //    $googleMapsApiKey=$_GET["googleMapsApiKey"];


   // $url = 'http://google.com/maps/api/distancematrix/json?origins='.$origins.'&destinations='.$destinations.'&key='.$googleMapsApiKey;
     //$url = 'https://maps.googleapis.com/maps/api/distancematrix/json?origins=Vancouver+BC|Seattle&destinations=San+Francisco|Victoria+BC&mode=bicycling&language=fr-FR&key=AIzaSyCGU0PK5ks0K4jqqAZ6l2A6FKWUknklPkM';


	//	$jsondata = file_get_contents($url);
	//	$obj = json_decode($jsondata,true);
		//echo "<pre>";
		//print_r($obj);
	 $chave=$_GET["chave"];
$chaveH = '';

if($chave == $chaveH){
$idUser=$_GET["idUser"];
$origin=$_GET["origin"];
$destination=$_GET["destination"];
$key = 'AIzaSyDAl26O-yvj6mVKPfC-jDUD791Kmnjm-h8';

$newO = str_replace(' ', '%20', $origin);
$newA = str_replace(' ', '%20', $destination);


$url = 'https://maps.googleapis.com/maps/api/directions/json?origin='.$newO.'&destination='.$newA.'&alternatives=true&sensor=false&key='.$key;
$routes=json_decode(file_get_contents($url))->routes;

 // sort the routes based on the distancematrix
usort($routes,create_function('$a,$b','return intval($a->legs[0]->distance->value) - intval($b->legs[0]->distance->value);'));

 //print the shortest distance
$km = $routes[0]->legs[0]->distance->text;
//echo $km;//returns 9.0 km
$kim = floatval($km);
//echo $km;//returns 9.0 km

           //ALTERAR ESSES IDS DE ACORDO COM A TABELA NO MYSQL DE CADA CLIENTE PEGANDO A COLUNA ID DA TABELA PREÇOS, aqui e na economiaKey
$result_precos = "SELECT * FROM precos WHERE id=7 ";
    $resultado_precos = mysqli_query($conn, $result_precos);
    $total_precos = mysqli_num_rows($resultado_precos);
    $varR = 'R$';
     while($rows_precos = mysqli_fetch_assoc($resultado_precos)){
            $valores1 =  $rows_precos['valores'];
        }
    $result_precos2 = "SELECT * FROM precos WHERE id=8 ";
    $resultado_precos2 = mysqli_query($conn, $result_precos2);
    $total_precos2 = mysqli_num_rows($resultado_precos2);
     while($rows_precos2 = mysqli_fetch_assoc($resultado_precos2)){
            $valores2 =  $rows_precos2['valores'];
        }
            $result_precos3 = "SELECT * FROM precos WHERE id=9 ";
    $resultado_precos3 = mysqli_query($conn, $result_precos3);
    $total_precos3 = mysqli_num_rows($resultado_precos3);
     while($rows_precos3 = mysqli_fetch_assoc($resultado_precos3)){
            $valores3 =  $rows_precos3['valores'];
        }
            $result_precos4 = "SELECT * FROM precos WHERE id=10 ";
    $resultado_precos4 = mysqli_query($conn, $result_precos4);
    $total_precos4 = mysqli_num_rows($resultado_precos4);
     while($rows_precos4 = mysqli_fetch_assoc($resultado_precos4)){
            $valores4 =  $rows_precos4['valores'];
        }
            $result_precos5 = "SELECT * FROM precos WHERE id=11 ";
    $resultado_precos5 = mysqli_query($conn, $result_precos5);
    $total_precos5 = mysqli_num_rows($resultado_precos5);
     while($rows_precos5 = mysqli_fetch_assoc($resultado_precos5)){
            $valores5 =  $rows_precos5['valores'];
        }
            $result_precos6 = "SELECT * FROM precos WHERE id=12 ";
    $resultado_precos6 = mysqli_query($conn, $result_precos6);
    $total_precos6 = mysqli_num_rows($resultado_precos6);
     while($rows_precos6 = mysqli_fetch_assoc($resultado_precos6)){
            $valores6 =  $rows_precos6['valores'];
        }
         $result_precos7 = "SELECT * FROM precos WHERE id=13 ";
    $resultado_precos7 = mysqli_query($conn, $result_precos7);
    $total_precos7 = mysqli_num_rows($resultado_precos7);
     while($rows_precos7 = mysqli_fetch_assoc($resultado_precos7)){
            $valores7 =  $rows_precos7['valores'];
        }

        if($kim == '0'){
            echo false; // arrumar um jeito de bloquear

               $w = false;
                $sql="update endereco set frete = '$w', distancia = '$w'
                          where id_usuarios='$idUser'

                    ";
        }
    	if($kim >= '0.1' && $kim <= '3.0') {
    		// proximo passo é fazer o resp  ser uma variavel de acordo com tabela de 'precos' do mysql, só copiar algum select e jogar aqui e tentar fazer tudo aqui mesmo.

    				$resp1 = $valores1;
    		    $sql="    update endereco set frete = '$resp1', distancia = '$kim'
				          where id_usuarios='$idUser'

				    ";


    	}
    	    	if($kim >= '3.1' && $kim < '6.1' ) {
    	    		$resp2 = $valores2;
    		    $sql="    update endereco set frete = '$resp2', distancia = '$kim'
				          where id_usuarios='$idUser'

				    ";



    	}
    	    	    	if($kim >= '6.1' && $kim < '9.1' ) {
    	    		$resp3 = $valores3;
    		    $sql="    update endereco set frete = '$resp3', distancia = '$kim'
				          where id_usuarios='$idUser'

				    ";


    	}
    	    	    	if($kim >= '9.1' && $kim < '12.1' ) {
    	    		$resp4 = $valores4;
    		    $sql="    update endereco set frete = '$resp4', distancia = '$kim'
				          where id_usuarios='$idUser'

				    ";


    	}
    	    	    	if($kim >= '12.1' && $kim < '15.1' ) {
    	    		$resp5 = $valores5;
    		    $sql="update endereco set frete = '$resp5', distancia = '$kim'
				          where id_usuarios='$idUser'

				    ";


    	}
    	    	    	if($kim >= '15.1' && $kim < '18.1' ) {
    	    		$resp6 = $valores6;
    		    $sql="update endereco set frete = '$resp6', distancia = '$kim'
				          where id_usuarios='$idUser'

				    ";


    	}
                                if($kim >= '18.1' && $kim < '21.1' ) {
                    $resp7 = $valores7;
                $sql="update endereco set frete = '$resp7', distancia = '$kim'
                          where id_usuarios='$idUser'

                    ";


        }
    	    	    	    	if($kim >= '21.1') {


                // importante, para voltar ao normal, tirar o comentario do $w aqui embaixo
    	      // $w = false;

                                    //e comentar esse $yuri
                                    $yuri = '50';
                                    //   adicionar exatamente frete = '$w'
    		    $sql="update endereco set frete = '$yuri', distancia = '$kim'
				          where id_usuarios='$idUser'

				    ";
                     // importante, para voltar ao normal, tirar o comentario do $echo false; aqui embaixo
                      //  echo false; // arrumar um jeito de bloquear

    	}
//---------------------------------------------------------------

    $res=mysqli_query($conn,$sql);
    if($res){
      echo true;
    }else{
      echo false;
    }
     $conn->close();
    } else{
 $conn->close();
    echo "lanchão do sérgiao";
}
//cadastrar no banco mysql esse resultado... testar na volta

           ?>


