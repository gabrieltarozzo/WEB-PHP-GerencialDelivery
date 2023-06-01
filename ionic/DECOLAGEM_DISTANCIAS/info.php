<?php
header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");
//header("Accept: application/json");
header("Content-Type: application/json;");

//header("Access-Control-Allow-Origin:http://localhost:8100");
//header("Content-Type: application/x-www-form-urlencoded");
//header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

	 include"../config.php";

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
$result_precos = "SELECT * FROM precos WHERE id=56 ";
    $resultado_precos = mysqli_query($conn, $result_precos);
    $total_precos = mysqli_num_rows($resultado_precos);
    $varR = 'R$';
     while($rows_precos = mysqli_fetch_assoc($resultado_precos)){
            $valores1 =  $rows_precos['valores'];
        }
    $result_precos2 = "SELECT * FROM precos WHERE id=57 ";
    $resultado_precos2 = mysqli_query($conn, $result_precos2);
    $total_precos2 = mysqli_num_rows($resultado_precos2);
     while($rows_precos2 = mysqli_fetch_assoc($resultado_precos2)){
            $valores2 =  $rows_precos2['valores'];
        }
            $result_precos3 = "SELECT * FROM precos WHERE id=58 ";
    $resultado_precos3 = mysqli_query($conn, $result_precos3);
    $total_precos3 = mysqli_num_rows($resultado_precos3);
     while($rows_precos3 = mysqli_fetch_assoc($resultado_precos3)){
            $valores3 =  $rows_precos3['valores'];
        }
            $result_precos4 = "SELECT * FROM precos WHERE id=59 ";
    $resultado_precos4 = mysqli_query($conn, $result_precos4);
    $total_precos4 = mysqli_num_rows($resultado_precos4);
     while($rows_precos4 = mysqli_fetch_assoc($resultado_precos4)){
            $valores4 =  $rows_precos4['valores'];
        }

            $result_precos5 = "SELECT * FROM precos WHERE id=60 ";
    $resultado_precos5 = mysqli_query($conn, $result_precos5);
    $total_precos5 = mysqli_num_rows($resultado_precos5);
     while($rows_precos5 = mysqli_fetch_assoc($resultado_precos5)){
            $valores5 =  $rows_precos5['valores'];
        }
            $result_precos6 = "SELECT * FROM precos WHERE id=61 ";
    $resultado_precos6 = mysqli_query($conn, $result_precos6);
    $total_precos6 = mysqli_num_rows($resultado_precos6);
     while($rows_precos6 = mysqli_fetch_assoc($resultado_precos6)){
            $valores6 =  $rows_precos6['valores'];
        }

                    $result_precos7 = "SELECT * FROM precos WHERE id=65 ";
    $resultado_precos7 = mysqli_query($conn, $result_precos7);
    $total_precos7 = mysqli_num_rows($resultado_precos7);
     while($rows_precos7 = mysqli_fetch_assoc($resultado_precos7)){
            $valores7 =  $rows_precos7['valores'];
        }   /*

                            $result_precos8 = "SELECT * FROM precos WHERE id=16 ";
    $resultado_precos8 = mysqli_query($conn, $result_precos8);
    $total_precos8 = mysqli_num_rows($resultado_precos8);
     while($rows_precos8 = mysqli_fetch_assoc($resultado_precos8)){
            $valores8 =  $rows_precos8['valores'];
        }

                            $result_precos9 = "SELECT * FROM precos WHERE id=17 ";
    $resultado_precos9 = mysqli_query($conn, $result_precos9);
    $total_precos9 = mysqli_num_rows($resultado_precos9);
     while($rows_precos9 = mysqli_fetch_assoc($resultado_precos9)){
            $valores9 =  $rows_precos9['valores'];
        }

                            $result_precos10 = "SELECT * FROM precos WHERE id=18 ";
    $resultado_precos10 = mysqli_query($conn, $result_precos10);
    $total_precos10 = mysqli_num_rows($resultado_precos10);
     while($rows_precos10 = mysqli_fetch_assoc($resultado_precos10)){
            $valores10 =  $rows_precos10['valores'];
        }

                            $result_precos11 = "SELECT * FROM precos WHERE id=19 ";
    $resultado_precos11 = mysqli_query($conn, $result_precos11);
    $total_precos11 = mysqli_num_rows($resultado_precos11);
     while($rows_precos11 = mysqli_fetch_assoc($resultado_precos11)){
            $valores11 =  $rows_precos11['valores'];
        }

                            $result_precos12 = "SELECT * FROM precos WHERE id=20 ";
    $resultado_precos12 = mysqli_query($conn, $result_precos12);
    $total_precos12 = mysqli_num_rows($resultado_precos12);
     while($rows_precos12 = mysqli_fetch_assoc($resultado_precos12)){
            $valores12 =  $rows_precos12['valores'];
        }

  $result_precos13 = "SELECT * FROM precos WHERE id=21 ";
    $resultado_precos13 = mysqli_query($conn, $result_precos13);
    $total_precos13 = mysqli_num_rows($resultado_precos13);
     while($rows_precos13 = mysqli_fetch_assoc($resultado_precos13)){
            $valores13 =  $rows_precos13['valores'];
        }

                           $result_precos14 = "SELECT * FROM precos WHERE id=22 ";
    $resultado_precos14 = mysqli_query($conn, $result_precos14);
    $total_precos14 = mysqli_num_rows($resultado_precos14);
     while($rows_precos14 = mysqli_fetch_assoc($resultado_precos14)){
            $valores14 =  $rows_precos14['valores'];
        }

                            $result_precos15 = "SELECT * FROM precos WHERE id=23 ";
    $resultado_precos15 = mysqli_query($conn, $result_precos15);
    $total_precos15 = mysqli_num_rows($resultado_precos15);
     while($rows_precos15 = mysqli_fetch_assoc($resultado_precos15)){
            $valores15 =  $rows_precos15['valores'];
        }

                            $result_precos16 = "SELECT * FROM precos WHERE id=24 ";
    $resultado_precos16 = mysqli_query($conn, $result_precos16);
    $total_precos16 = mysqli_num_rows($resultado_precos16);
     while($rows_precos16 = mysqli_fetch_assoc($resultado_precos16)){
            $valores16 =  $rows_precos16['valores'];
        }

                 $result_precos17 = "SELECT * FROM precos WHERE id=25 ";
    $resultado_precos17 = mysqli_query($conn, $result_precos17);
    $total_precos17 = mysqli_num_rows($resultado_precos17);
     while($rows_precos17 = mysqli_fetch_assoc($resultado_precos17)){
            $valores17 =  $rows_precos17['valores'];
        }


                   $result_precos18 = "SELECT * FROM precos WHERE id=26 ";
    $resultado_precos18 = mysqli_query($conn, $result_precos18);
    $total_precos18 = mysqli_num_rows($resultado_precos18);
     while($rows_precos18 = mysqli_fetch_assoc($resultado_precos18)){
            $valores18 =  $rows_precos18['valores'];
        }

                   $result_precos19 = "SELECT * FROM precos WHERE id=27 ";
    $resultado_precos19 = mysqli_query($conn, $result_precos19);
    $total_precos19 = mysqli_num_rows($resultado_precos19);
     while($rows_precos19 = mysqli_fetch_assoc($resultado_precos19)){
            $valores19 =  $rows_precos19['valores'];
        }


                   $result_precos20 = "SELECT * FROM precos WHERE id=28 ";
    $resultado_precos20 = mysqli_query($conn, $result_precos20);
    $total_precos20 = mysqli_num_rows($resultado_precos20);
     while($rows_precos20 = mysqli_fetch_assoc($resultado_precos20)){
            $valores20 =  $rows_precos20['valores'];
        }

                           $result_precos21 = "SELECT * FROM precos WHERE id=29 ";
    $resultado_precos21 = mysqli_query($conn, $result_precos21);
    $total_precos21 = mysqli_num_rows($resultado_precos21);
     while($rows_precos21 = mysqli_fetch_assoc($resultado_precos21)){
            $valores21 =  $rows_precos21['valores'];
        }

 */


      //   $result_precos7 = "SELECT * FROM precos WHERE id=13 ";
    //$resultado_precos7 = mysqli_query($conn, $result_precos7);
   // $total_precos7 = mysqli_num_rows($resultado_precos7);
    // while($rows_precos7 = mysqli_fetch_assoc($resultado_precos7)){
       //     $valores7 =  $rows_precos7['valores'];
     //   }
        if($kim == '0'){
            echo false; // arrumar um jeito de bloquear

               $w = false;
                $sql="update endereco set frete = '$w', distancia = '$w'
                          where id_usuarios='$idUser'

                    ";
        }
    	if($kim >= '0.1' && $kim <= '1.0') {
    		// proximo passo é fazer o resp  ser uma variavel de acordo com tabela de 'precos' do mysql, só copiar algum select e jogar aqui e tentar fazer tudo aqui mesmo.
    				$resp1 = $valores1;
    		    $sql="    update endereco set frete = '$resp1', distancia = '$kim'
				          where id_usuarios='$idUser'

				    ";
    	}
    	    	if($kim >= '1.0' && $kim <= '2.0' ) {
    	    		$resp2 = $valores2;
    		    $sql="    update endereco set frete = '$resp2', distancia = '$kim'
				          where id_usuarios='$idUser'

				    ";
    	}
    	    	    	if($kim > '2.0' && $kim <= '3.0' ) {
    	    		$resp3 = $valores3;
    		    $sql="    update endereco set frete = '$resp3', distancia = '$kim'
				          where id_usuarios='$idUser'

				    ";
    	}
    	    	    	if($kim > '3.0' && $kim <= '4.0' ) {
    	    		$resp4 = $valores4;
    		    $sql="    update endereco set frete = '$resp4', distancia = '$kim'
				          where id_usuarios='$idUser'

				    ";
    	}
    
    	    	    	if($kim > '4.0' && $kim <= '5.0' ) {
    	    		$resp5 = $valores5;
    		    $sql="update endereco set frete = '$resp5', distancia = '$kim'
				          where id_usuarios='$idUser'

				    ";

    	}
    	    	    	if($kim > '5.0' && $kim <= '8.0' ) {
    	    		$resp6 = $valores6;
    		    $sql="update endereco set frete = '$resp6', distancia = '$kim'
				          where id_usuarios='$idUser'

				    ";
    	}  

                        if($kim > '8.0' && $kim <= '12.0' ) {
              $resp7 = $valores7;
            $sql="update endereco set frete = '$resp7', distancia = '$kim'
                  where id_usuarios='$idUser'

            ";
      }/*

                        if($kim > '6.0' && $kim <= '6.5' ) {
              $resp8 = $valores8;
            $sql="update endereco set frete = '$resp8', distancia = '$kim'
                  where id_usuarios='$idUser'

            ";
      }

                        if($kim > '6.5' && $kim <= '7.0' ) {
              $resp9 = $valores9;
            $sql="update endereco set frete = '$resp9', distancia = '$kim'
                  where id_usuarios='$idUser'

            ";
      }

                        if($kim > '7.0' && $kim <= '7.5' ) {
              $resp10 = $valores10;
            $sql="update endereco set frete = '$resp10', distancia = '$kim'
                  where id_usuarios='$idUser'

            ";
      }


                        if($kim > '7.5' && $kim <= '8.0' ) {
              $resp11 = $valores11;
            $sql="update endereco set frete = '$resp11', distancia = '$kim'
                  where id_usuarios='$idUser'

            ";
      }

                        if($kim > '8.0' && $kim <= '8.5' ) {
              $resp12 = $valores12;
            $sql="update endereco set frete = '$resp12', distancia = '$kim'
                  where id_usuarios='$idUser'

            ";
      }


                        if($kim > '8.5' && $kim <= '9.0' ) {
              $resp13 = $valores13;
            $sql="update endereco set frete = '$resp13', distancia = '$kim'
                  where id_usuarios='$idUser'

            ";
      }

                        if($kim > '9.0' && $kim <= '9.5' ) {
              $resp14 = $valores14;
            $sql="update endereco set frete = '$resp14', distancia = '$kim'
                  where id_usuarios='$idUser'

            ";
      }


                        if($kim > '9.5' && $kim <= '10.0' ) {
              $resp15 = $valores15;
            $sql="update endereco set frete = '$resp15', distancia = '$kim'
                  where id_usuarios='$idUser'

            ";
      }

                        if($kim > '10.0' && $kim <= '10.5' ) {
              $resp16 = $valores16;
            $sql="update endereco set frete = '$resp16', distancia = '$kim'
                  where id_usuarios='$idUser'

            ";
      }

                        if($kim > '10.5' && $kim <= '11.0' ) {
              $resp17 = $valores17;
            $sql="update endereco set frete = '$resp17', distancia = '$kim'
                  where id_usuarios='$idUser'

            ";
      }


                        if($kim > '11.0' && $kim <= '11.5' ) {
              $resp18 = $valores18;
            $sql="update endereco set frete = '$resp18', distancia = '$kim'
                  where id_usuarios='$idUser'

            ";
      }

                        if($kim > '11.5' && $kim <= '12.0' ) {
              $resp19 = $valores19;
            $sql="update endereco set frete = '$resp19', distancia = '$kim'
                  where id_usuarios='$idUser'

            ";
      }


                        if($kim > '12.0' && $kim <= '12.5' ) {
              $resp20 = $valores20;
            $sql="update endereco set frete = '$resp20', distancia = '$kim'
                  where id_usuarios='$idUser'

            ";
      }


                        if($kim > '12.5' && $kim <= '13.0' ) {
              $resp21 = $valores21;
            $sql="update endereco set frete = '$resp21', distancia = '$kim'
                  where id_usuarios='$idUser'

            ";
      }
                //                if($kim >= '18.1' && $kim < '21.1' ) {
                 //   $resp7 = $valores7;
              //  $sql="update endereco set frete = '$resp7', distancia = '$kim'
               //           where id_usuarios='$idUser'

                //    ";
      //  }
      */

    	if($kim > '12.0') {

        // importante, para voltar ao normal, tirar o comentario do $w aqui embaixo
    	       $w = false;

          //e comentar esse $yuri
           //  $yuri = '50';
            //   adicionar exatamente frete = '$w'

    		    $sql="update endereco set frete = '$w', distancia = '$kim'
				          where id_usuarios='$idUser'
				    ";
       // importante, para voltar ao normal, tirar o comentario do $echo false; aqui embaixo
          echo false; // arrumar um jeito de bloquear

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


