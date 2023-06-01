    <?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include"config.php";

$idUser=$_GET["idUser"];

$erro = false;

    $result_usuario = "SELECT id FROM endereco WHERE id_usuarios='". $idUser ."'";
    $resultado_usuario = mysqli_query($conn, $result_usuario);
    if(($resultado_usuario) AND ($resultado_usuario->num_rows == 0)){
      $erro = true;
      echo 3;
    //  $_SESSION['msg'] = "Este usuário já está sendo utilizado";
    }

    	$conn->close();



    ?>