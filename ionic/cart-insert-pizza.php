<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


		include"config.php";

        if(isset($_GET["nomeProduto"]) ){

        $idUser=$_GET["idUser"];
        $nomeProduto=$_GET["nomeProduto"];
        $idProduto=$_GET["idProduto"];
        $valor=$_GET["valor"];

        $nomePizza=$_GET["nomePizza"];
        $PizzaMaxValue=$_GET["PizzaMaxValue"];

        $nomeAd=$_GET["nomeAd"];
        $valorAd=$_GET["valorAd"];
        $nomeCd=$_GET["nomeCd"];
        $valorCd=$_GET["valorCd"];
        $promo_valor=$_GET["promo_valor"];
        $metricaValor=$_GET["metricaValor"];
        $imagens=$_GET["imagens"];
        $nomeCliente=$_GET["nomeCliente"];
        $quantidade=$_GET["quantidade"];
        $categoria=$_GET["categoria"];
        $observacao=$_GET["observacao"];


    $sql="insert into carrinho(nomeProduto, nomeAd, valorAd, nomeCd, valorCd, idUser, idProduto, valor, promo_valor, metricaValor, imagens, nomeCliente, quantidade, categoria_id, observacao, Pizza2, valorMax2)
          values('$nomeProduto', '$nomeAd', '$valorAd', '$nomeCd', '$valorCd', '$idUser', '$idProduto', '$valor', '$promo_valor', '$metricaValor','$imagens', '$nomeCliente', '$quantidade', '$categoria','$observacao', '$nomePizza', '$PizzaMaxValue')
    ";

    $res=mysqli_query($conn,$sql);
    if($res){
      echo true;
    }else{
      echo false;
    }
     $conn->close();
        }

?>
