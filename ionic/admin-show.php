<?php
//header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");

		include"config.php";

$chave=$_GET["chave"];
$chaveH = '';

if($chave == $chaveH){
    $idUser=$_GET["idUser"];

		$query="SELECT * FROM usuarios where id ='$idUser'";
		$result = $conn->query($query);

		$outp = "";
    while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
       if ($outp != "") {$outp .= ",";}
       $outp .= '{"id":"'.$rs["id"].'",';
  			$outp .= '"nome":"'.$rs["nome"].'",';
  			$outp .= '"senha":"'.$rs["senha"]. '"}';
    }
    $outp ='{"records":['.$outp.']}';
    $conn->close();

    echo($outp);
} else{

    echo "lanchão do sérgiao";
}
 $conn->close();
?>
