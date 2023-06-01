<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

		include"config.php";

        $nomeProduto=$_GET["nomeProduto"];
        $idUser=$_GET["idUser"];

        $idProduto=$_GET["idProduto"];
        $valor=$_GET["valor"];
        $categoria=$_GET["categoria"];

        $nomeAd=$_GET["nomeAd"];
        $valorAd=$_GET["valorAd"];
        $nomeCd=$_GET["nomeCd"];

        $valorCd=$_GET["valorCd"];
        $valorMax2=$_GET["valorMax2"];
        $Pizza2=$_GET["Pizza2"];

        $promo_valor=$_GET["promo_valor"];
        $nomeCliente=$_GET["nomeCliente"];
        $quantidade=$_GET["quantidade"];

        $entrega=$_GET["entrega"];
        $empresa=$_GET["empresa"];
        $frete=$_GET["frete"];

        $desconto = $valor - $promo_valor;
        $valor_total_sem_desconto = $valor * $quantidade;
        $valor_total_com_desconto = $desconto * $quantidade;
        $valor_total_adicional = $valorAd * $quantidade;
        $valor_total_complemento = $valorCd * $quantidade;

        $sql= "SELECT DATE_FORMAT(NOW(),'%d%m%Y%H%i%s');";

     //$sql = sprintf('INSERT INTO nota_fiscal(nomeProduto) VALUES (%s)', implode( '), (' , $nomeProduto ) );

    $sql="insert into nota_fiscal(nomeProduto, entrega, idUser, nomeAd, valorAd, nomeCd, valorCd, idProduto, valor, promo_valor, nomeCliente, quantidade, empresa, frete, categoria_id, created, valorTotalSemDesconto, valorTotalDesconto, valorMax2, Pizza2)
    values('$nomeProduto', '$entrega', '$idUser', '$nomeAd', '$valor_total_adicional', '$nomeCd', '$valor_total_complemento', '$idProduto', '$valor', '$promo_valor', '$nomeCliente', '$quantidade', '$empresa', '$frete', '$categoria', NOW(), '$valor_total_sem_desconto', '$valor_total_com_desconto', '$valorMax2', '$Pizza2' )
    ";

    $res=mysqli_query($conn,$sql);
    if($res){
      echo true;
    }else{
      echo false;
    }


   $conn->close();
?>
