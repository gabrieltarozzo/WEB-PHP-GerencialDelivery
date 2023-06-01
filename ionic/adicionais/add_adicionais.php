<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


    include"../config.php";

		$idAD=$_GET["idAD"];
		$idProdutoP =$_GET["idProdutoP"];
		$idUser =$_GET["idUser"];

    // ID adicional, vai vir tipo: 39, 38
    // Preciso separar com explosion ou algo do tipo para 39
    //                                                    38
//$result=explode(",", implode($idAD));

$params = explode(',', $idAD);

    $sql="DELETE FROM adicionais_produto where id_user='$idUser' and id_produto = '$idProdutoP' ";
    $res=mysqli_query($conn,$sql);

//echo $lat;
//echo $lon;
//echo $val;
//echo $params;

foreach($params as $result) {

    $sql="insert into adicionais_produto(id_adicional,id_produto,id_user)
         values('$result','$idProdutoP','$idUser')";
    $res=mysqli_query($conn,$sql);

}

    //$teste = str_split(',', $idAD);
    //echo $result[0]; // vetor1
   // echo $teste;

   // $adicional_id = $result[0];
   // $categoria_id = $result[1];
   // $i = $result[2];


    if($res){
      echo true;
    }else{
      echo false;
    }
 $conn->close();
?>
