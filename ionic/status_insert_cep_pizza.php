<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

		include"config.php";
                $chave=$_GET["chave"];
$chaveH = '';

if($chave == $chaveH){
		$idUser=$_GET["idUser"];
        $troco=$_GET["troco"];
        $nomeProduto=$_GET["nomeProduto"];
        $descricao=$_GET["descricao"];
        $valor=$_GET["valor"];
        $nomeAd=$_GET["nomeAd"];
        $valorAd=$_GET["valorAd"];
        $nomeCd=$_GET["nomeCd"];
        $valorCd=$_GET["valorCd"];

        $Pizza2=$_GET["Pizza2"];
        $valorMax2=$_GET["valorMax2"];

         $cepCliente=$_GET["cepCliente"];
        $metricaValor=$_GET["metricaValor"];
        $formaPagamento=$_GET["formaPagamento"];
        $nomeCliente = $_GET["nomeCliente"];
        $cidadeCliente = $_GET["cidadeCliente"];
      //  $cepCliente = $_GET["cepCliente"];
        $bairroCliente = $_GET["bairroCliente"];
        $ruaCliente = $_GET["ruaCliente"];
        $numeroCasaCliente = $_GET["numeroCasaCliente"];
        $telefoneCliente = $_GET["telefoneCliente"];
        $status = $_GET["status"];
         $idEmpresa= $_GET["idEmpresa"];
         $id_entrega= $_GET["id_entrega"];
        $complemento= $_GET["complemento"];
        $frete= $_GET["frete"];

        $sql= "SELECT DATE_FORMAT(NOW(),'%d%m%Y%H%i%s');";

    $sql="insert into pedidos(id_usuarios, nomeAd, valorAd, nomeCd, valorCd, cepCliente, frete,nomeProduto,metricaValor,descricao,valor,id_entrega,troco,formaPagamento,nomeCliente,cidadeCliente,bairroCliente,ruaCliente,numeroCasaCliente,telefoneCliente,status, empresa,complemento, Pizza2, valorMax2, created)
    values('$idUser', '$nomeAd', '$valorAd', '$nomeCd', '$valorCd', '$cepCliente','$frete','$nomeProduto','$metricaValor','$descricao','$valor','$id_entrega','$troco','$formaPagamento','$nomeCliente','$cidadeCliente','$bairroCliente','$ruaCliente','$numeroCasaCliente','$telefoneCliente','$status', '$idEmpresa','$complemento', '$Pizza2', '$valorMax2', NOW() )
    ";

    $res=mysqli_query($conn,$sql);
    if($res){
      echo true;
    }else{
      echo false;
    }

} else{

    echo "lanchão do sérgiao";
  
}
   $conn->close();
?>
