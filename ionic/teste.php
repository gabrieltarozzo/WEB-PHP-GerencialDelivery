

<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json;");



	 include"config.php";

$result_precos = "SELECT * FROM precos WHERE empresa='1'"; //= 7 resultados
    $resultado_precos = mysqli_query($conn, $result_precos);
    $total_precos = mysqli_num_rows($resultado_precos);
    $varR = 'R$';
     while($rows_precos = mysqli_fetch_assoc($resultado_precos)){
            $valores1 =  $rows_precos['valores'];
               echo $valores1;
        }

     

//cadastrar no banco mysql esse resultado... testar na volta

           ?>



