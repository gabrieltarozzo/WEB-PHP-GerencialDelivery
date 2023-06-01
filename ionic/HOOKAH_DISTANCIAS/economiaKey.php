<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json;");



	 include"../config.php";
$chave=$_GET["chave"];
$chaveH = '';

if($chave == $chaveH){

$idUser=$_GET["idUser"];


$result_km = "SELECT * FROM endereco WHERE id_usuarios='$idUser' ";
    $resultado_km = mysqli_query($conn, $result_km);
    $total_km = mysqli_num_rows($resultado_km);
    $varR = 'R$';
     while($rows_km = mysqli_fetch_assoc($resultado_km)){
            $kim =  $rows_km['distancia'];
        }

//ALTERAR ESSES IDS DE ACORDO COM A TABELA NO MYSQL DE CADA CLIENTE PEGANDO A COLUNA ID DA TABELA PREÇOS, aqui e na info.php

$result_precos = "SELECT * FROM precos WHERE id=102 ";
    $resultado_precos = mysqli_query($conn, $result_precos);
    $total_precos = mysqli_num_rows($resultado_precos);
    $varR = 'R$';
     while($rows_precos = mysqli_fetch_assoc($resultado_precos)){
            $valores1 =  $rows_precos['valores'];
        }
    $result_precos2 = "SELECT * FROM precos WHERE id=103 ";
    $resultado_precos2 = mysqli_query($conn, $result_precos2);
    $total_precos2 = mysqli_num_rows($resultado_precos2);
     while($rows_precos2 = mysqli_fetch_assoc($resultado_precos2)){
            $valores2 =  $rows_precos2['valores'];
        }
            $result_precos3 = "SELECT * FROM precos WHERE id=104 ";
    $resultado_precos3 = mysqli_query($conn, $result_precos3);
    $total_precos3 = mysqli_num_rows($resultado_precos3);
     while($rows_precos3 = mysqli_fetch_assoc($resultado_precos3)){
            $valores3 =  $rows_precos3['valores'];
        }
            $result_precos4 = "SELECT * FROM precos WHERE id=105 ";
    $resultado_precos4 = mysqli_query($conn, $result_precos4);
    $total_precos4 = mysqli_num_rows($resultado_precos4);
     while($rows_precos4 = mysqli_fetch_assoc($resultado_precos4)){
            $valores4 =  $rows_precos4['valores'];
        }
           $result_precos5 = "SELECT * FROM precos WHERE id=106 ";
    $resultado_precos5 = mysqli_query($conn, $result_precos5);
    $total_precos5 = mysqli_num_rows($resultado_precos5);
     while($rows_precos5 = mysqli_fetch_assoc($resultado_precos5)){
            $valores5 =  $rows_precos5['valores'];
        }
            $result_precos6 = "SELECT * FROM precos WHERE id=107 ";
    $resultado_precos6 = mysqli_query($conn, $result_precos6);
    $total_precos6 = mysqli_num_rows($resultado_precos6);
     while($rows_precos6 = mysqli_fetch_assoc($resultado_precos6)){
            $valores6 =  $rows_precos6['valores'];
        }

                $result_precos7 = "SELECT * FROM precos WHERE id=108 ";
    $resultado_precos7 = mysqli_query($conn, $result_precos7);
    $total_precos7 = mysqli_num_rows($resultado_precos7);
     while($rows_precos7 = mysqli_fetch_assoc($resultado_precos7)){
            $valores7 =  $rows_precos7['valores'];
        }

                            $result_precos8 = "SELECT * FROM precos WHERE id=109 ";
    $resultado_precos8 = mysqli_query($conn, $result_precos8);
    $total_precos8 = mysqli_num_rows($resultado_precos8);
     while($rows_precos8 = mysqli_fetch_assoc($resultado_precos8)){
            $valores8 =  $rows_precos8['valores'];
        }

                    $result_precos9 = "SELECT * FROM precos WHERE id=110 ";
    $resultado_precos9 = mysqli_query($conn, $result_precos9);
    $total_precos9 = mysqli_num_rows($resultado_precos9);
     while($rows_precos9 = mysqli_fetch_assoc($resultado_precos9)){
            $valores9 =  $rows_precos9['valores'];
        }

                            $result_precos10 = "SELECT * FROM precos WHERE id=111 ";
    $resultado_precos10 = mysqli_query($conn, $result_precos10);
    $total_precos10 = mysqli_num_rows($resultado_precos10);
     while($rows_precos10 = mysqli_fetch_assoc($resultado_precos10)){
            $valores10 =  $rows_precos10['valores'];
        }

                            $result_precos11 = "SELECT * FROM precos WHERE id=116 ";
    $resultado_precos11 = mysqli_query($conn, $result_precos11);
    $total_precos11 = mysqli_num_rows($resultado_precos11);
     while($rows_precos11 = mysqli_fetch_assoc($resultado_precos11)){
            $valores11 =  $rows_precos11['valores'];
        }
                                     $result_precos12 = "SELECT * FROM precos WHERE id=117 ";
    $resultado_precos12 = mysqli_query($conn, $result_precos12);
    $total_precos12 = mysqli_num_rows($resultado_precos12);
     while($rows_precos12 = mysqli_fetch_assoc($resultado_precos12)){
            $valores12 =  $rows_precos12['valores'];
        }

                                    $result_precos13 = "SELECT * FROM precos WHERE id=118 ";
    $resultado_precos13 = mysqli_query($conn, $result_precos13);
    $total_precos13 = mysqli_num_rows($resultado_precos13);
     while($rows_precos13 = mysqli_fetch_assoc($resultado_precos13)){
            $valores13 =  $rows_precos13['valores'];
        }

                                    $result_precos14 = "SELECT * FROM precos WHERE id=119 ";
    $resultado_precos14 = mysqli_query($conn, $result_precos14);
    $total_precos14 = mysqli_num_rows($resultado_precos14);
     while($rows_precos14 = mysqli_fetch_assoc($resultado_precos14)){
            $valores14 =  $rows_precos14['valores'];
        }

                                            $result_precos15 = "SELECT * FROM precos WHERE id=120 ";
    $resultado_precos15 = mysqli_query($conn, $result_precos15);
    $total_precos15 = mysqli_num_rows($resultado_precos15);
     while($rows_precos15 = mysqli_fetch_assoc($resultado_precos15)){
            $valores15 =  $rows_precos15['valores'];
        }
 /*  
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


       //  $result_precos7 = "SELECT * FROM precos WHERE id=13 ";
    //$resultado_precos7 = mysqli_query($conn, $result_precos7);
    //$total_precos7 = mysqli_num_rows($resultado_precos7);
    // while($rows_precos7 = mysqli_fetch_assoc($resultado_precos7)){
      //      $valores7 =  $rows_precos7['valores'];
      //  }
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
    	    	if($kim > '1.0' && $kim <= '2.0' ) {
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
    	    	    	if($kim > '5.0' && $kim <= '6.0' ) {
    	    		$resp6 = $valores6;
    		    $sql="update endereco set frete = '$resp6', distancia = '$kim'
				          where id_usuarios='$idUser'

				    ";
    	}

                        if($kim > '6.0' && $kim <= '7.0' ) {
              $resp7 = $valores7;
            $sql="update endereco set frete = '$resp7', distancia = '$kim'
                  where id_usuarios='$idUser'

            ";
      }

                        if($kim > '7.0' && $kim <= '8.0' ) {
              $resp8 = $valores8;
            $sql="update endereco set frete = '$resp8', distancia = '$kim'
                  where id_usuarios='$idUser'

            ";
      }

                        if($kim > '8.0' && $kim <= '9.0' ) {
              $resp9 = $valores9;
            $sql="update endereco set frete = '$resp9', distancia = '$kim'
                  where id_usuarios='$idUser'

            ";
      }

                        if($kim > '9.0' && $kim <= '10.0' ) {
              $resp10 = $valores10;
            $sql="update endereco set frete = '$resp10', distancia = '$kim'
                  where id_usuarios='$idUser'

            ";
      }

                        if($kim > '10.0' && $kim <= '11.0' ) {
              $resp11 = $valores11;
            $sql="update endereco set frete = '$resp11', distancia = '$kim'
                  where id_usuarios='$idUser'

            ";
      }

                        if($kim > '11.0' && $kim <= '12.0' ) {
              $resp12 = $valores12;
            $sql="update endereco set frete = '$resp12', distancia = '$kim'
                  where id_usuarios='$idUser'

            ";
      }

                        if($kim > '12.0' && $kim <= '13.0' ) {
              $resp13 = $valores13;
            $sql="update endereco set frete = '$resp13', distancia = '$kim'
                  where id_usuarios='$idUser'

            ";
      }

                        if($kim > '13.0' && $kim <= '14.0' ) {
              $resp14 = $valores14;
            $sql="update endereco set frete = '$resp14', distancia = '$kim'
                  where id_usuarios='$idUser'

            ";
      }

                        if($kim > '14.0' && $kim <= '15.0' ) {
              $resp15 = $valores15;
            $sql="update endereco set frete = '$resp15', distancia = '$kim'
                  where id_usuarios='$idUser'

            ";
      }
 /*

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

 */

                    //    if($kim >= '18.1' && $kim < '21.1' ) {
                   // $resp7 = $valores7;
               // $sql="update endereco set frete = '$resp7', distancia = '$kim'
                 //         where id_usuarios='$idUser'

                 //   ";
       // }
    	    	    	    	if($kim > '15.0') {
                                    //descomentar esse echo false
    	    		 echo false; // arrumar um jeito de bloquear
                                    //descomentar esse $w = false
    	       $w = false;
                                    //comentar esse resp7
                                   // $resp7 = $valores7;
                                    //adicionar $w no lugar de $valores7 aqui embaixo
    		    $sql="update endereco set frete = '$w', distancia = '$kim'
				          where id_usuarios='$idUser'

				    ";
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


