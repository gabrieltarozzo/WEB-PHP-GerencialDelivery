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

  //$db = mysqli_connect("localhost", "root", "", "deliveryatalos");

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
    // Get image name
    // Get text
  //$image = basename($_FILES['image']['name']);

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
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="imagens/favicon.png">

        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.min.js"></script>
       
        <title>Top Entregas</title>
       <link href="css/bootstrap.css" rel="stylesheet">
<link href="css/checkbox.css" rel="stylesheet">
       <link href="css/navbarsResponsives/navbarResponsivePEDIDOS.css" rel="stylesheet">
       <link href="css/navbarsResponsives/navbarResponsive.css" rel="stylesheet">
<!-- DATABLE NOVA -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.js"></script>
<script data-require="datatables@*" data-semver="1.10.12" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs-3.3.7/dt-1.10.18/b-1.5.2/b-print-1.5.2/fh-3.1.4/r-2.2.2/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/bs-3.3.7/dt-1.10.18/b-1.5.2/b-print-1.5.2/fh-3.1.4/r-2.2.2/datatables.min.js"></script>

<script>
$(function(){
  $("#nav-placeholder").load("nav.php");
});
</script>
</head>
<body >
    <div id="nav-placeholder">

</div>

 <div style="margin-top: 6%;" text-align="center" id="main" class="container-fluid" >
  <h3 class="page-header">Adicionar categoria</h3>
  <br> <br>
<?php $filterEmp = $_SESSION['usuarioEmpresa'] ?>
    <form class="form-group col-md-12 col-lg-12 col-sm-12 col-xs-12 upload-form" method="POST" id="cadCat" action="processocategoria/processa_cad.php" enctype="multipart/form-data">
<div class="row">
    <div class="form-group col-md-4 col-lg-4 col-sm-4 col-xs-12 ">
        <label  for="recipient-name" class="control-label">Nome da Categoria</label>
        <input name="nome" type="text" class="form-control" placeholder="Digite o nome do categoria" required>
      </div>




  <div class="form-group col-md-3 col-lg-3 col-sm-3 col-xs-6">
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
<div class="row">


      </div>
          <div class="form-group col-md-2">
        <label  for="recipient-codigo" class="control-label">Código da Categoria</label>
        <input name="codigo" type="text" class="form-control " placeholder="Código" required>
      </div>

              <div class="form-group col-md-3 col-lg-3 col-sm-3 col-xs-12">
        <label >Foto da Categoria</label>
          <input name="arquivo" type="file" class="upload-file" data-max-size="534800" required/><p> </p>
            <b style="font-size:10px;">Tamanho Mínimo Recomendado: 300x100</b><p> </p>
            <b style="font-size:10px;">Peso Máximo: 500kb</b>

  </div>

  <div class="row">

  </div>
<div class="row">
      <div style="width:290px;">
  <input class="input" type="checkbox" id="fruit4" name="fruit4" value="1" checked>
  <label for="fruit4"> Terá campo observação?</label>
    </div>
         <div style="width:290px;">
  <input class="input" type="checkbox" id="fruit2" name="fruit2" value="1" checked>
  <label for="fruit2"> Terá opção de adicionais?</label>
    </div>
    
    <!-- <div style="width:290px;">
  <input class="input" type="checkbox" id="fruit3" name="fruit3" value="1">
  <label for="fruit3"> Terá opção meio a meio?</label>
    </div> -->


 <script>



  </script>

</div>
  </div>
    <div class="row">





        </div>
<!--         <script>
function aviso(){
if(confirm (' Tudo certo? '))
{
document.forms['cadCat'].onsubmit = function(){return true;}

}
else
{
document.forms['cadCat'].onsubmit = function(){return false;}
}
}
//-->
</script>
        </script>

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
  <hr />
  <div class="row">
    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
      <button type="submit"  class="btn btn-primary">Salvar</button>
    <a  href="categorias.php"" class="btn btn-default">Cancelar</a>
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


</body>
</html>


<?php $conn->close(); ?>
