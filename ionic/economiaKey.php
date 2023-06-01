<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json;");



	 include"config.php";
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
                                    //descomentar esse echo false
    	    		// echo false; // arrumar um jeito de bloquear
                                    //descomentar esse $w = false
    	     //  $w = false;
                                    //comentar esse resp7
                                    $resp7 = $valores7;
                                    //adicionar $w no lugar de $valores7 aqui embaixo
    		    $sql="update endereco set frete = '$valores7', distancia = '$kim'
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


