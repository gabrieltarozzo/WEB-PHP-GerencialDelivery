  <?php $idUser = $rows_pedidos['id_usuarios'];
  $idEmpresa = $filterEmp;

 $result_dist = "SELECT * FROM endereco where id_usuarios = '$idUser'";
    $resultado_dist = mysqli_query($conn, $result_dist);
    $row_dist = mysqli_fetch_assoc($resultado_dist);
    $distancia = $row_dist['distancia']; 


   if ($distancia >= '0.1' && $distancia <= '1.0') {

    $result_precos = "SELECT * FROM precos where empresa = '$idEmpresa' and id = '66' ";
    $resultado_precos = mysqli_query($conn, $result_precos);
    $row_preco = mysqli_fetch_assoc($resultado_precos);
    $preco = $row_preco['tempoEntrega']; 

}

     if ($distancia >= '1.1' && $distancia <= '2.0') {

    $result_precos = "SELECT * FROM precos where empresa = '$idEmpresa' and id = '69' ";
    $resultado_precos = mysqli_query($conn, $result_precos);
    $row_preco = mysqli_fetch_assoc($resultado_precos);
    $preco = $row_preco['tempoEntrega']; 

}
     if ($distancia >= '2.1' && $distancia <= '3.0') {

    $result_precos = "SELECT * FROM precos where empresa = '$idEmpresa' and id = '67' ";
    $resultado_precos = mysqli_query($conn, $result_precos);
    $row_preco = mysqli_fetch_assoc($resultado_precos);
    $preco = $row_preco['tempoEntrega']; 

}

     if ($distancia >= '3.1' && $distancia <= '4.0') {

    $result_precos = "SELECT * FROM precos where empresa = '$idEmpresa' and id = '68' ";
    $resultado_precos = mysqli_query($conn, $result_precos);
    $row_preco = mysqli_fetch_assoc($resultado_precos);
    $preco = $row_preco['tempoEntrega']; 

}

     if ($distancia >= '4.1' && $distancia <= '5.0') {

    $result_precos = "SELECT * FROM precos where empresa = '$idEmpresa' and id = '70' ";
    $resultado_precos = mysqli_query($conn, $result_precos);
    $row_preco = mysqli_fetch_assoc($resultado_precos);
    $preco = $row_preco['tempoEntrega']; 

}
     if ($distancia >= '5.1' && $distancia <= '6.0') {

    $result_precos = "SELECT * FROM precos where empresa = '$idEmpresa' and id = '71' ";
    $resultado_precos = mysqli_query($conn, $result_precos);
    $row_preco = mysqli_fetch_assoc($resultado_precos);
    $preco = $row_preco['tempoEntrega']; 

}

     if ($distancia >= '6.1' && $distancia <= '7.0') {

    $result_precos = "SELECT * FROM precos where empresa = '$idEmpresa' and id = '72' ";
    $resultado_precos = mysqli_query($conn, $result_precos);
    $row_preco = mysqli_fetch_assoc($resultado_precos);
    $preco = $row_preco['tempoEntrega']; 

}

     if ($distancia >= '7.1' && $distancia <= '8.0') {

    $result_precos = "SELECT * FROM precos where empresa = '$idEmpresa' and id = '73' ";
    $resultado_precos = mysqli_query($conn, $result_precos);
    $row_preco = mysqli_fetch_assoc($resultado_precos);
    $preco = $row_preco['tempoEntrega']; 

}

     if ($distancia >= '8.1' && $distancia <= '9.0') {

    $result_precos = "SELECT * FROM precos where empresa = '$idEmpresa' and id = '74' ";
    $resultado_precos = mysqli_query($conn, $result_precos);
    $row_preco = mysqli_fetch_assoc($resultado_precos);
    $preco = $row_preco['tempoEntrega']; 

}

     if ($distancia >= '9.1' && $distancia <= '10.0') {

    $result_precos = "SELECT * FROM precos where empresa = '$idEmpresa' and id = '75' ";
    $resultado_precos = mysqli_query($conn, $result_precos);
    $row_preco = mysqli_fetch_assoc($resultado_precos);
    $preco = $row_preco['tempoEntrega']; 

}

     if ($distancia >= '10.1' && $distancia <= '11.0') {

    $result_precos = "SELECT * FROM precos where empresa = '$idEmpresa' and id = '76' ";
    $resultado_precos = mysqli_query($conn, $result_precos);
    $row_preco = mysqli_fetch_assoc($resultado_precos);
    $preco = $row_preco['tempoEntrega']; 

}

     if ($distancia >= '11.1' && $distancia <= '12.0') {

    $result_precos = "SELECT * FROM precos where empresa = '$idEmpresa' and id = '77' ";
    $resultado_precos = mysqli_query($conn, $result_precos);
    $row_preco = mysqli_fetch_assoc($resultado_precos);
    $preco = $row_preco['tempoEntrega']; 

}
?>