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
$filterEmp = $_SESSION['usuarioEmpresa'];

  $result_valorP = "SELECT * FROM ValorPMin where empresa = '$filterEmp'";
  $resultado_valorP = mysqli_query($conn, $result_valorP);
  $total_valorP = mysqli_num_rows($resultado_valorP);

  $row_valor = mysqli_fetch_assoc($resultado_valorP);

//verifica se app ta on ou off

    $result_valorPe = "SELECT controle FROM horarios where empresa = '$filterEmp'";
  $resultado_valorPe = mysqli_query($conn, $result_valorPe);
  $total_valorPe = mysqli_num_rows($resultado_valorPe);

  $row_valore = mysqli_fetch_assoc($resultado_valorPe);
?>
<br>

<!DOCTYPE html>
<html lang="pt-br">
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Painel de controle</title>
 
     <script src="js/jquery.min.js"></script>
     <script src="js/bootstrap.min.js"></script>
    <link href="css/navbarsResponsives/navbarResponsive.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/button.css" rel="stylesheet">

    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>

</head>
<body >

  <div id="nav-placeholder">

</div>

<script>
$(function(){
  $("#nav-placeholder").load("nav.php");
});
</script>

 <div style="margin-top: 6%;" text-align="center" id="main" class="container-fluid" >
  <h3 class="page-header">Valor mínimo para pedido:</h3>
  <br>


<?php $filterEmp = $_SESSION['usuarioEmpresa'] ?>
    <form class="" method="POST" id="cadCat" action="processo_painel/processa_valorP.php" enctype="multipart/form-data">
<div class="row">
    <div class="form-group col-md-3 col-lg-3 col-sm-3 col-xs-9 ">
       <input  value="<?php echo $row_valor['id']; ?>" name="id" type="hidden" class="form-control" placeholder="Digite um valor minimo." required>
          <label  for="recipient-name" class="control-label"></label>
                            <div class="input-group">

                                <div class="input-group-addon ">R$</div>
        <input value="<?php echo $row_valor['valorMin'];?> " maxlength="5" type="number" step=".01" class="form-control " name="valor" size="20" onKeydown="Formata(this,20,event,2)" id="recipient-valor"  placeholder="Digite um valor minimo." required>
      </div>
      <br>
      <div style="width:200px;">
       <b> Valor mínimo atual: <b style="color:green;">R$ <?php $rows_value = $row_valor['valorMin'];echo number_format($rows_value ,2,",",""); ?> </b></b>
     </div>


    <div  style="margin-top:4%;" class="form-group col-md-12 col-lg-12 col-sm-3 col-xs-9">
      <button type="submit"  class="btn btn-primary">Salvar</button>
   <!-- <a  href="categorias.php"" class="btn btn-default">Cancelar</a> -->
    </div>
</div>
</form>
<div class="col-md-7 col-lg-7 col-sm-7 col-xs-7 " id="wrapper">

          <p><a style="font-size:21px;" >Ligar/Desligar Aplicativo</a></p> 

        <!-- Blue Buttons -->
    <div>
      <a class="btn btn--md btn--blue" onclick="return confirm('Tem certeza?');" href="onOrOFf/on.php">Ligar</a>
      <a class="btn btn--md btn--red"  onclick="return confirm('Tem certeza?');" href="onOrOFf/off.php">Desligar</a>
    </div>

     <p><a style="font-size:15px;">Estado atual: <?php if ( $row_valore['controle'] == 0 ){echo '<b style="color:green"> Ligado </b>'; } else { echo '<b style="color:red"> Desligado </b>'; }?> </a></p> 

    <!-- Green Buttons
    <div>
      <a class="btn btn--lg btn--green" href="#">Button</a>
      <a class="btn btn--df btn--green" href="#">Button</a>
      <a class="btn btn--md btn--green" href="#">Button</a>
      <a class="btn btn--sm btn--green" href="#">Button</a>
    </div>
-->
    <!-- Red Buttons
    <div>
      <a class="btn btn--lg btn--red" href="#">Button</a>
      <a class="btn btn--df btn--red" href="#">Button</a>
      <a class="btn btn--md btn--red" href="#">Button</a>
      <a class="btn btn--sm btn--red" href="#">Button</a>
    </div>
  -->
</div>
<br>

<?php 
 $result_valorPeE = "SELECT * FROM EMPRESAS where ID_EMPRESA = '$filterEmp'";
  $resultado_valorPeE = mysqli_query($conn, $result_valorPeE);
  $total_valorPeE = mysqli_num_rows($resultado_valorPeE);

  $row_valoreE = mysqli_fetch_assoc($resultado_valorPeE);
 ?>
 <div style="margin-top: 6%;" text-align="center" id="main" class="container-fluid" >
  <h3 class="page-header">Tempo de entrega:</h3>
  <br>


<?php $filterEmp = $_SESSION['usuarioEmpresa'] ?>
    <form class="" method="GET" id="cadCat3" action="processo_painel/processa_TempoE.php?ApxEntrega="<?php echo $row_valoreE['ApxEntrega'];?> enctype="multipart/form-data">
<div class="row">
    <div class="form-group col-md-3 col-lg-3 col-sm-3 col-xs-9 ">
       <input  value="<?php echo $row_valoreE['ID']; ?>" name="id" type="hidden" class="form-control" placeholder="Digite um tempo de entrega." required>
          <label  for="recipient-name" class="control-label"></label>
                            <div class="input-group">

                                <div class="input-group-addon ">Tempo</div>
        <input value="<?php echo $row_valoreE['ApxEntrega'];?> " maxlength="5" type="number" step=".01" class="form-control " name="ApxEntrega" size="20" onKeydown="Formata(this,20,event,2)" id="recipient-ApxEntrega"  placeholder="Digite um tempo de entrega." required>
      </div>
      <br>
      <div style="width:500px;">
       <b> Tempo de entrega atual: <b style="color:green;"> <?php $rows_valuen = $row_valoreE['ApxEntrega'];echo $rows_valuen; ?> Minutos</b></b>
     </div>


    <div  style="margin-top:4%;" class="form-group col-md-12 col-lg-12 col-sm-3 col-xs-9">
      <button type="submit"  class="btn btn-primary">Salvar</button>
   <!-- <a  href="categorias.php"" class="btn btn-default">Cancelar</a> -->
    </div>
</div>

</form>
  <form class="" method="GET" id="cadCat4" action="processo_painel/processa_TempoR.php?ApxRetirada="<?php echo $row_valoreE['ApxRetirada'];?>  enctype="multipart/form-data">
<div class="col-md-7 col-lg-7 col-sm-7 col-xs-7 " id="wrapper">

       <input  value="<?php echo $row_valoreE['ID']; ?>" name="id" type="hidden" class="form-control" placeholder="Digite um tempo de retirada." required>
          <label  for="recipient-name" class="control-label"></label>
                            <div class="input-group">

                                <div class="input-group-addon ">Tempo</div>
        <input value="<?php echo $row_valoreE['ApxRetirada'];?> " maxlength="5" type="number" step=".01" class="form-control " name="ApxRetirada" size="20" onKeydown="Formata(this,20,event,2)" id="recipient-ApxRetirada"  placeholder="Digite um tempo de retirada." required>
      </div>
      <br>
      <div style="width:500px;">
       <b> Tempo de retirada atual: <b style="color:green;"><?php $rows_valuenn = $row_valoreE['ApxRetirada'];echo $rows_valuenn; ?> Minutos</b></b>
     </div>


    <div  style="margin-top:4%;" class="form-group col-md-12 col-lg-12 col-sm-3 col-xs-9">
      <button type="submit"  class="btn btn-primary">Salvar</button>
   <!-- <a  href="categorias.php"" class="btn btn-default">Cancelar</a> -->
    </div>
</div>
</form>
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
    if(confirm (' Tem certeza? '))
{
document.forms['cadCat'].onsubmit = function(){return true;}
}

else
{
  event.preventDefault();
document.forms['cadCat'].onsubmit = function(){return false;}
}

});

$('#cadCat3').submit(function() {
    if(confirm (' Tem certeza? '))
{
document.forms['cadCat3'].onsubmit = function(){return true;}
}

else
{
  event.preventDefault();
document.forms['cadCat3'].onsubmit = function(){return false;}
}

});

$('#cadCat4').submit(function() {
    if(confirm (' Tem certeza? '))
{
document.forms['cadCat4'].onsubmit = function(){return true;}
}

else
{
  event.preventDefault();
document.forms['cadCat4'].onsubmit = function(){return false;}
}

});

</script>


  </form>

<style>
@import url(https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic,700italic);
/*Button Two*/
.button-two {
  background-color:   transparent;
  border: none;
}
.button-two span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}
.button-two span:after {
  content: '»';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.2s;
}
.button-two:hover span {
  padding-right: 25px;
}
.button-two:hover span:after {
  opacity: 1;
  right: 0;
}
</style>
  <h7 style="font-size:25px;" class="page-header">Horários do estabelecimento: </h7> <!-- <button style="background:transparent;" href="#" data-toggle="modal" data-target="#exampleModal" class="button-two"><span><b>Como funciona?</b></span></button> -->



<br> <br>
    <div class="form-group col-md-12 col-lg-12 col-sm-12 col-xs-12 ">



  <?php
  $filterEmp=$_SESSION['usuarioEmpresa'];

  $result_c = "SELECT * FROM horarios where empresa = $filterEmp" ;
  $resultado_c = mysqli_query($conn, $result_c);
  $total_c = mysqli_num_rows($resultado_c);
  $rows_c = mysqli_fetch_assoc($resultado_c);

//segunda-feira
  $ini = $rows_c['HorInicio']; //dar um jeito de vir em 08:00 por exemplo
  $fim = $rows_c['HorFim'];
  $ini2 = $rows_c['HorInicio2'];
  $fim2 = $rows_c['HorFim2'];

//terça-feira
  $ini3 = $rows_c['ter1'];
  $fim3 = $rows_c['ter2'];
  $ini4 = $rows_c['ter3'];
  $fim4 = $rows_c['ter4'];

  //quarta-feira
  $ini5 = $rows_c['quar1'];
  $fim5 = $rows_c['quar2'];
  $ini6 = $rows_c['quar3'];
  $fim6 = $rows_c['quar4'];

   //quinta-feira
  $ini7 = $rows_c['quin1'];
  $fim7 = $rows_c['quin2'];
  $ini8 = $rows_c['quin3'];
  $fim8 = $rows_c['quin4'];

   //sexta-feira
  $ini9 = $rows_c['sex1'];
  $fim9 = $rows_c['sex2'];
  $ini10 = $rows_c['sex3'];
  $fim10 = $rows_c['sex4'];

   //Sabado
  $ini11 = $rows_c['sab1'];
  $fim11 = $rows_c['sab2'];
  $ini12 = $rows_c['sab3'];
  $fim12 = $rows_c['sab4'];

   //Domingo
  $ini13 = $rows_c['domin1'];
  $fim13 = $rows_c['domin2'];
  $ini14 = $rows_c['domin3'];
  $fim14 = $rows_c['domin4'];

  ?>

      <form class="" method="POST" id="cadCat2" action="processo_painel/processa_hor.php" enctype="multipart/form-data">

<div class="form-group col-md-3" style="background-color: #FAFAD2;">
    <h2> Segunda-Feira </h2>


  <div > <h4> Primeiro horário: </h4> </div>
  <br>
    <div class="control" >

        <label for="appt-time1">Horário:</label>
        <input type="time" id="appt-time1" name="appt-time1" value="<?php echo $ini; ?>" required />
       <span  class="hours">Abertura.</span>
       <p>
        <div>
      <!--    <b> <span  style="color:red;" class="hours">(Atual: <?php echo $ini; ?>)</span> </b>-->
      </div>
    <br>
        <div class="control">
        <label for="appt-time2">Horário:</label>
        <input type="time" id="appt-time2" name="appt-time2" value="<?php echo $fim; ?>"
                required />
       <span class="hours">Encerramento.</span>
       <p> </p>
        <div >

     <!-- <b> <span style="color:red;" class="hours">(Atual: <?php // echo $fim; ?>)</span> </b> -->
    </div>
    </div>
</div>


      <div > <h4> Segundo Horário (opcional): </h4> </div>
  <br>
    <div class="control">

        <label for="appt-time3">Horário:</label>
        <input type="time" id="appt-time3" name="appt-time3" value="<?php echo $ini2; ?>"
               required />
       <span  class="hours">Abertura.</span>
       <p>
        <div>
       <!--   <b> <span  style="color:red;" class="hours">(Atual: <?php echo $ini2; ?>)</span> </b>-->
      </div>
    </div>
    <br>
        <div class="control">
        <label for="appt-time4">Horário:</label>
        <input type="time" id="appt-time4" name="appt-time4" value="<?php echo $fim2; ?>"
                required />
       <span class="hours">Encerramento.</span>
       <p> </p>
        <div >

      <!--  <b> <span style="color:red;" class="hours">(Atual: <?php echo $fim2; ?>)</span> </b>-->
    </div>
    </div>
  </div>


<div class="form-group col-md-3" style="background-color: #FAFAD2;">
 <h2> Terça-Feira </h2>

  <div > <h4> Primeiro horário: </h4> </div>
  <br>
    <div class="control">

        <label for="appt-time5">Horário:</label>
        <input type="time" id="appt-time5" name="appt-time5" value="<?php echo $ini3; ?>"
               required />
       <span  class="hours">Abertura.</span>
       <p>
        <div style="width:100%;">
        <!--  <b> <span  style="color:red;" class="hours">(Atual: <?php echo $ini3; ?>)</span> </b>-->
      </div>
    </div>
    <br>
        <div class="control">
        <label for="appt-time6">Horário:</label>
        <input type="time" id="appt-time6" name="appt-time6" value="<?php echo $fim3; ?>"
                required />
       <span class="hours">Encerramento.</span>
       <p></p>
        <div style="width:100%;">

      <!--  <b> <span style="color:red;" class="hours">(Atual: <?php echo $fim3; ?>)</span> </b>-->
    </div>
    </div>

      <div > <h4> Segundo Horário (opcional): </h4> </div>
  <br>
    <div class="control">

        <label for="appt-time7">Horário:</label>
        <input type="time" id="appt-time7" name="appt-time7" value="<?php echo $ini4; ?>"
               required />
       <span  class="hours">Abertura.</span>
       <p>
        <div style="width:100%;">
        <!--  <b> <span  style="color:red;" class="hours">(Atual: <?php echo $ini4; ?>)</span> </b>-->
      </div>
    </div>
    <br>
        <div class="control">
        <label for="appt-time8">Horário:</label>
        <input type="time" id="appt-time8" name="appt-time8" value="<?php echo $fim4; ?>"
                required />
       <span class="hours">Encerramento.</span>
       <p>
        <div style="width:100%;">

      <!--  <b> <span style="color:red;" class="hours">(Atual: <?php echo $fim4; ?>)</span> </b>-->
    </div>
    </div>
</div>

<div class="form-group col-md-3" style="background-color: #FAFAD2;">
 <h2> Quarta-Feira </h2>

  <div > <h4> Primeiro horário: </h4> </div>
  <br>
    <div class="control">

        <label for="appt-time9">Horário:</label>
        <input type="time" id="appt-time9" name="appt-time9" value="<?php echo $ini5; ?>"
               required />
       <span  class="hours">Abertura.</span>
       <p>
        <div style="width:100%;">
        <!--  <b> <span  style="color:red;" class="hours">(Atual: <?php echo $ini5; ?>)</span> </b>-->
      </div>
    </div>
    <br>
        <div class="control">
        <label for="appt-time10">Horário:</label>
        <input type="time" id="appt-time10" name="appt-time10" value="<?php echo $fim5; ?>"
                required />
       <span class="hours">Encerramento.</span>
       <p></p>
        <div style="width:100%;">

      <!--  <b> <span style="color:red;" class="hours">(Atual: <?php echo $fim5; ?>)</span> </b>-->
    </div>
    </div>

      <div > <h4> Segundo Horário (opcional): </h4> </div>
  <br>
    <div class="control">

        <label for="appt-time11">Horário:</label>
        <input type="time" id="appt-time11" name="appt-time11" value="<?php echo $ini6; ?>"
               required />
       <span  class="hours">Abertura.</span>
       <p>
        <div style="width:100%;">
        <!--  <b> <span  style="color:red;" class="hours">(Atual: <?php echo $ini6; ?>)</span> </b>-->
      </div>
    </div>
    <br>
        <div class="control">
        <label for="appt-time12">Horário:</label>
        <input type="time" id="appt-time12" name="appt-time12" value="<?php echo $fim6; ?>"
                required />
       <span class="hours">Encerramento.</span>
       <p>
        <div style="width:100%;">

       <!-- <b> <span style="color:red;" class="hours">(Atual: <?php echo $fim6; ?>)</span> </b>-->
    </div>
    </div>
</div>

<div class="form-group col-md-3" style="background-color:#FAFAD2;">
 <h2> Quinta-Feira </h2>

  <div > <h4> Primeiro horário: </h4> </div>
  <br>
    <div class="control">

        <label for="appt-time13">Horário:</label>
        <input type="time" id="appt-time13" name="appt-time13" value="<?php echo $ini7; ?>"
               required />
       <span  class="hours">Abertura.</span>
       <p>
        <div style="width:100%;">
        <!--  <b> <span  style="color:red;" class="hours">(Atual: <?php echo $ini7; ?>)</span> </b>-->
      </div>
    </div>
    <br>
        <div class="control">
        <label for="appt-time14">Horário:</label>
        <input type="time" id="appt-time14" name="appt-time14" value="<?php echo $fim7; ?>"
                required />
       <span class="hours">Encerramento.</span>
       <p></p>
        <div style="width:100%;">

     <!--   <b> <span style="color:red;" class="hours">(Atual: <?php echo $fim7; ?>)</span> </b>-->
    </div>
    </div>

      <div > <h4> Segundo Horário (opcional): </h4> </div>
  <br>
    <div class="control">

        <label for="appt-time15">Horário:</label>
        <input type="time" id="appt-time15" name="appt-time15" value="<?php echo $ini8; ?>"
               required />
       <span  class="hours">Abertura.</span>
       <p>
        <div style="width:100%;">
       <!--   <b> <span  style="color:red;" class="hours">(Atual: <?php echo $ini8; ?>)</span> </b>-->
      </div>
    </div>
    <br>
        <div class="control">
        <label for="appt-time16">Horário:</label>
        <input type="time" id="appt-time16" name="appt-time16" value="<?php echo $fim8; ?>"
                required />
       <span class="hours">Encerramento.</span>
       <p>
        <div style="width:100%;">

      <!--  <b> <span style="color:red;" class="hours">(Atual: <?php echo $fim8; ?>)</span> </b>-->
    </div>
    </div>
</div>

<div class="form-group col-md-3" style="background-color: #FAFAD2;">
 <h2> Sexta-Feira </h2>

  <div > <h4> Primeiro horário: </h4> </div>
  <br>
    <div class="control">

        <label for="appt-time17">Horário:</label>
        <input type="time" id="appt-time17" name="appt-time17" value="<?php echo $ini9; ?>"
               required />
       <span  class="hours">Abertura.</span>
       <p>
        <div style="width:100%;">
        <!--  <b> <span  style="color:red;" class="hours">(Atual: <?php echo $ini9; ?>)</span> </b>-->
      </div>
    </div>
    <br>
        <div class="control">
        <label for="appt-time18">Horário:</label>
        <input type="time" id="appt-time18" name="appt-time18" value="<?php echo $fim9; ?>"
                required />
       <span class="hours">Encerramento.</span>
       <p></p>
        <div style="width:100%;">

      <!--  <b> <span style="color:red;" class="hours">(Atual: <?php echo $fim9; ?>)</span> </b>-->
    </div>
    </div>

      <div > <h4> Segundo Horário (opcional): </h4> </div>
  <br>
    <div class="control">

        <label for="appt-time19">Horário:</label>
        <input type="time" id="appt-time19" name="appt-time19" value="<?php echo $ini10; ?>"
               required />
       <span  class="hours">Abertura.</span>
       <p>
        <div style="width:100%;">
        <!--  <b> <span  style="color:red;" class="hours">(Atual: <?php echo $ini10; ?>)</span> </b>-->
      </div>
    </div>
    <br>
        <div class="control">
        <label for="appt-time20">Horário:</label>
        <input type="time" id="appt-time20" name="appt-time20" value="<?php echo $fim10; ?>"
                required />
       <span class="hours">Encerramento.</span>
       <p>
        <div style="width:100%;">

      <!--  <b> <span style="color:red;" class="hours">(Atual: <?php echo $fim10; ?>)</span> </b>-->
    </div>
    </div>
</div>

<div class="form-group col-md-3" style="background-color: #FAFAD2;">
 <h2> Sábado </h2>

  <div > <h4> Primeiro horário: </h4> </div>
  <br>
    <div class="control">

        <label for="appt-time21">Horário:</label>
        <input type="time" id="appt-time21" name="appt-time21" value="<?php echo $ini11; ?>"
               required />
       <span  class="hours">Abertura.</span>
       <p>
        <div style="width:100%;">
        <!--  <b> <span  style="color:red;" class="hours">(Atual: <?php echo $ini11; ?>)</span> </b>-->
      </div>
    </div>
    <br>
        <div class="control">
        <label for="appt-time22">Horário:</label>
        <input type="time" id="appt-time22" name="appt-time22" value="<?php echo $fim11; ?>"
                required />
       <span class="hours">Encerramento.</span>
       <p></p>
        <div style="width:100%;">

       <!-- <b> <span style="color:red;" class="hours">(Atual: <?php echo $fim11; ?>)</span> </b>-->
    </div>
    </div>

      <div > <h4> Segundo Horário (opcional): </h4> </div>
  <br>
    <div class="control">

        <label for="appt-time23">Horário:</label>
        <input type="time" id="appt-time23" name="appt-time23" value="<?php echo $ini12; ?>"
               required />
       <span  class="hours">Abertura.</span>
       <p>
        <div style="width:100%;">
         <!-- <b> <span  style="color:red;" class="hours">(Atual: <?php echo $ini12; ?>)</span> </b>-->
      </div>
    </div>
    <br>
        <div class="control">
        <label for="appt-time24">Horário:</label>
        <input type="time" id="appt-time24" name="appt-time24" value="<?php echo $fim12; ?>"
                required />
       <span class="hours">Encerramento.</span>
       <p>
        <div style="width:100%;">

       <!-- <b> <span style="color:red;" class="hours">(Atual: <?php echo $fim12; ?>)</span> </b>-->
    </div>
    </div>
</div>

<div class="form-group col-md-3" style="background-color:   #FAFAD2;">
 <h2> Domingo </h2>

  <div > <h4> Primeiro horário: </h4> </div>
  <br>
    <div class="control">

        <label for="appt-time25">Horário:</label>
        <input type="time" id="appt-time25" name="appt-time25" value="<?php echo $ini13; ?>"
               required />
       <span  class="hours">Abertura.</span>
       <p>
        <div style="width:100%;">
        <!--  <b> <span  style="color:red;" class="hours">(Atual: <?php echo $ini13; ?>)</span> </b>-->
      </div>
    </div>
    <br>
        <div class="control">
        <label for="appt-time26">Horário:</label>
        <input type="time" id="appt-time26" name="appt-time26" value="<?php echo $fim13; ?>"
                required />
       <span class="hours">Encerramento.</span>
       <p></p>
        <div style="width:100%;">

       <!-- <b> <span style="color:red;" class="hours">(Atual: <?php echo $fim13; ?>)</span> </b>-->
    </div>
    </div>


      <div > <h4> Segundo Horário (opcional): </h4> </div>
  <br>
    <div class="control">

        <label for="appt-time27">Horário:</label>
        <input type="time" id="appt-time27" name="appt-time27" value="<?php echo $ini14; ?>"
               required />
       <span  class="hours">Abertura.</span>
       <p>
        <div style="width:100%;">
         <!-- <b> <span  style="color:red;" class="hours">(Atual: <?php echo $ini14; ?>)</span> </b>-->
      </div>
    </div>
    <br>

        <div class="control">
        <label for="appt-time28">Horário:</label>
        <input type="time" id="appt-time28" name="appt-time28" value="<?php echo $fim14; ?>"
                required />
       <span class="hours">Encerramento.</span>
       <p> </p>
        <div style="width:100%;">

       <!-- <b> <span style="color:red;" class="hours">(Atual: <?php echo $fim14; ?>)</span> </b> -->
    </div>
    </div>
 </div>


<script language= 'javascript'>


//-->
$('#cadCat2').submit(function() {
    if(confirm (' Tudo certo? '))
{
document.forms['cadCat2'].onsubmit = function(){return true;}
}

else
{
  event.preventDefault();
document.forms['cadCat2'].onsubmit = function(){return false;}
}

});
</script>
  

    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" align="center">
      <button type="submit"  class="btn btn-primary">Salvar</button>
   <!-- <a  href="categorias.php"" class="btn btn-default">Cancelar</a> -->
    </div>
  </form>


<hr />

 
</body>
</html>

<script>

function Limpar(valor, validos) {

// retira caracteres invalidos da string

var result = "";

var aux;

for (var i=0; i < valor.length; i++) {

aux = validos.indexOf(valor.substring(i, i+1));

if (aux>=0) {

result += aux;

}

}

return result;

}

//Formata número tipo moeda usando o evento onKeyDown

function Formata(campo,tammax,teclapres,decimal) {

var tecla = teclapres.keyCode;

vr = Limpar(campo.value,"0123456789");

tam = vr.length;

dec=decimal

if (tam < tammax && tecla != 8){ tam = vr.length + 1 ; }

if (tecla == 8 )

{ tam = tam - 1 ; }

if ( tecla == 8 || tecla >= 48 && tecla <= 57 || tecla >= 96 && tecla <= 105 )

{

if ( tam <= dec )

{ campo.value = vr ; }

if ( (tam > dec) && (tam <= 5) ){

campo.value = vr.substr( 0, tam - 2 ) + "." + vr.substr( tam - dec, tam ) ; }

if ( (tam >= 6) && (tam <= 8) ){

campo.value = vr.substr( 0, tam - 5 ) + "." + vr.substr( tam - 5, 3 ) + "." + vr.substr( tam - dec, tam ) ;

}

if ( (tam >= 9) && (tam <= 11) ){

campo.value = vr.substr( 0, tam - 8 ) + "." + vr.substr( tam - 8, 3 ) + "." + vr.substr( tam - 5, 3 ) + "." + vr.substr( tam - dec, tam ) ; }

if ( (tam >= 12) && (tam <= 14) ){

campo.value = vr.substr( 0, tam - 11 ) + "." + vr.substr( tam - 11, 3 ) + "." + vr.substr( tam - 8, 3 ) + "." + vr.substr( tam - 5, 3 ) + "." + vr.substr( tam - dec, tam ) ; }

if ( (tam >= 15) && (tam <= 17) ){

campo.value = vr.substr( 0, tam - 14 ) + "." + vr.substr( tam - 14, 3 ) + "." + vr.substr( tam - 11, 3 ) + "." + vr.substr( tam - 8, 3 ) + "." + vr.substr( tam - 5, 3 ) + "," + vr.substr( tam - 2, tam ) ;}

}

}

</script>

<?php $conn->close(); ?>

<div class="modal fade" id="exampleModal" tabindex="-1" role="" aria-labelledby="exampleModalLabel">
      <div class="modal-dialog" role="document">

        <div class="modal-content">
        <div class="modal-header">
 <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
         <div align="center"> <h2 class="modal-title" id="modalLabel">Horários</h2> </div>
          </div>
          <div class="modal-body">

            <b style="font-size:22px; color:DodgerBlue;"> Você pode selecionar até 2 horários que seu aplicativo ficará "Aberto". </b> <p> </p>
            <b style="font-size:22px; color:red;"> Entenda: Se seu estabelecimento fica aberto das 18:00 até as 04:00 do dia seguinte por exemplo, será necessário fazer uso do segundo horário.<p> </p>
            Neste caso, precisará configurar o primeiro horário das 18:00 as 23:59, e o segundo horário 00:00 as 04:00, como se cada horário representasse dias diferentes. <p></p> Caso não fique, use apenas o primeiro horário e deixe o segundo configurado em 00:00 - 00:00.</b>


            </div>

        </div>

      </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->

    <script type="text/javascript">
      $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes

        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('Horários')
        modal.find('#id_produto').val(recipient)

      })
    </script>

