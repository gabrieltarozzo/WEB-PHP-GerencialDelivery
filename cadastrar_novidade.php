<?php
    session_start();

  
if  ($_SESSION['usuarioNiveisAcessoId'] == "3") {
        goto A;
}
if  ($_SESSION['usuarioNiveisAcessoId'] != "2") {
        header("Location: sair.php");
}

A:

 include_once("conexao.php"); 
  $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

      
    

  // Create database connection
  include_once("conexao.php");
  //$db = mysqli_connect("localhost", "root", "", "deliveryatalos");

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
    // Get image name
  
    // Get text
  $image = basename($_FILES['image']['name']);
    $image_text = mysqli_real_escape_string($conn, $_POST['image_text']);

    // image file directory
    $target = "imagens/".basename($image);

    $sql = "INSERT INTO images (image, image_text) VALUES ('$image', '$image_text')";
    // execute query
    mysqli_query($conn, $sql);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
      $msg = "Image uploaded successfully";
    }else{
      $msg = "Failed to upload image";
    }
  header("Location: teste.php");
  }
  $result = mysqli_query($conn, "SELECT * FROM images");

?>
<br>

<!DOCTYPE html>
<html lang="pt-br">
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Adicionar categoria</title>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <link href="css/navbarsResponsives/navbarResponsive.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">

</head>
<body >

     <div id="nav-placeholder">

</div>


 <div style="margin-top: 6%;" text-align="center" id="main" class="container-fluid" >
  <h3 class="page-header">Adicionar novidade</h3>
  <br> <br>

    <form class="form-group col-md-12 upload-form" method="POST" id="cadCat" action="processonovidade/processa_cad.php" enctype="multipart/form-data">
<div class="row">
    <div class="form-group col-md-4 ">
        <label  for="recipient-name" class="control-label">Nome da novidade</label>
        <input name="nome" type="text" class="form-control" placeholder="Digite o nome do categoria" required>
      </div>
                  <div class="form-group col-md-2">
      <label for="situacao_id" class="control-label">Situação</label>
      <div class="">
        <select class="form-control" name="situacao_id" required>
          <option></option>
          <?php
           include_once("conexao.php");
          $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

              $resultado =mysqli_query($conn, "SELECT * FROM situacoes");

            while($dados = mysqli_fetch_assoc($resultado)){
              ?>
                <option value="<?php echo $dados["id"]; ?>"><?php echo $dados["nome"];?></option>
              <?php
            }
          ?>
        </select>
      </div>
      </div>

  </div>
    <div class="row">
      <div class="form-group col-md-6">
        <label for="descricao-text">Descricao</label>
        <textarea name="descricao" class="form-control" class="form-control"  rows="2" id="comment" placeholder="..." > </textarea>
          </div>
            </div>

              <script>
                 document.getElementById("comment").onkeypress = function (event) {
                       if (event.keyCode == 13) {
                           event.preventDefault();
                       }
                   };
              </script>

  <div class="row">
    
        <div class="form-group col-ls-4 col-xs-4 col-md-4">
        <label >Foto da Novidade</label>
          <input name="arquivo" type="file" class="upload-file" data-max-size="534800" required/>
          <div style="width:300px;">
            <p> </p>
            <b style="font-size:10px;">Tamanho Mínimo Recomendado: 1200x800</b><p> </p>
            <b style="font-size:10px;">Peso Máximo: 500kb</b>

        </div>
      </div>

  </div>

    <div class="row">
      <div class="form-group col-md-6">
    <div class="row">
          <div class="form-group col-md-3">

          </div>
         </div>
      </div>




        </div>
  <hr />

  <script language= 'javascript'>


//-->
$('#cadCat').submit(function() {
    if(confirm (' Tudo certo? '))
{
document.forms['cadCat'].onsubmit = function(){return true;}
}

else
{
  event.preventDefault();
document.forms['cadCat'].onsubmit = function(){return false;}
}

});
</script>




  <div class="row">
    <div class="col-md-2">
     <button name="salvar"  type="submit"  class="btn btn-primary">Salvar</button>
    <a  href="home.php" class="btn btn-default">Cancelar</a>
    </div>
  </div>

  </form>

     <script>
$(function(){
    var fileInput = $('.upload-file');
    var maxSize = fileInput.data('max-size');
    $('.upload-form').submit(function(e){
        if(fileInput.get(0).files.length){
            var fileSize = fileInput.get(0).files[0].size; // in bytes
            if(fileSize>maxSize){
                alert('Sua imagem pesa mais que ' + maxSize + ' bytes, por favor, diminua o peso ou altere a imagem.');
                return false;
            }else{
                //alert('file size is correct- '+fileSize+' bytes');
               //  return false;
            }
        }else{
            alert('Escolha uma imagem.');
            return false;
        }

    });
});
    </script>

 </div>
<link href="css/basic.css" rel="stylesheet">
 <!-- <script src="js/jquery.min.js"></script> -->

</body>
</html>


<script>
$(function(){
  $("#nav-placeholder").load("nav.php");
});
</script>


<?php $conn->close(); ?>



