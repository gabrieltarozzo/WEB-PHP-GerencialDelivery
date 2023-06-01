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
                  $idProdutoX = $_GET['id'];
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
       <link href="css/navbarsResponsives/navbarResponsivePEDIDOS.css" rel="stylesheet">
       <link href="css/navbarsResponsives/navbarResponsive.css" rel="stylesheet">
<!-- DATABLE NOVA -->
  <?php $filterEmp = $_SESSION['usuarioEmpresa']; ?>
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
<style> 

.pqw {
	background:transparent;
	color:#631071;
	border:none;
	outline:none; 
}


.lista-abas, .lista-abas * {


}
.lista-abas {
	position:relative;
	text-align:left;
}
.lista-abas > input {

	display:none;
}
.lista-abas > label {
	position:relative;
	z-index:1;
	display:inline-block;
	box-sizing:border-box;
	-moz-box-sizing:border-box;
	line-height:45px;
	cursor:pointer;
}
.lista-abas > label span {
	padding:10px;
	background:rgba(255, 255, 255, .9)
}
.lista-abas > label span span {

 transition:background .3s, color .4s;
 -o-transition:background .3s, color .4s;
 -ms-transition:background .3s, color .4s;
 -moz-transition:background .3s, color .4s;
 -webkit-transition:background .3s, color .4s;
}
.lista-abas > label:hover span span {
	background:#3498db;
	color:#fff
}
.lista-abas > input:checked + label span span {
	background:#3498db;
	color:#fff
}
.lista-abas > ul {
	margin-top:20px;
	list-style:none;
	position:relative;

}
.lista-abas > ul > li {
	position:absolute;
	opacity:0;
	-o-transform-origin:0% 0%;
	-ms-transform-origin:0% 0%;
	-moz-transform-origin:0% 0%;
	-webkit-transform-origin:0% 0%;

	-o-transition:opacity .8s, -o-transform .8s;
	-ms-transition:opacity .8s, -ms-transform .8s;
	-moz-transition:opacity .8s, -moz-transform .8s;
	-webkit-transition:opacity .8s, -webkit-transform .8s;
}
.lista-abas > .aba-1:checked ~ ul > .aba-1, 
.lista-abas > .aba-2:checked ~ ul > .aba-2, 
.lista-abas > .aba-3:checked ~ ul > .aba-3, 
.lista-abas > .aba-4:checked ~ ul > .aba-4 {

 opacity:1;
}


.amimacao-flip > ul > li {
	-o-transform:rotateX(-90deg);
	-ms-transform:rotateX(-90deg);
	-moz-transform:rotateX(-90deg);
	-webkit-transform:rotateX(-90deg);
}
.amimacao-flip > .aba-1:checked ~ ul > .aba-1, 
.amimacao-flip > .aba-2:checked ~ ul > .aba-2, 
.amimacao-flip > .aba-3:checked ~ ul > .aba-3, 
.amimacao-flip > .aba-4:checked ~ ul > .aba-4 {
 -o-transform:rotateX(0deg);
 -ms-transform:rotateX(0deg);
 -moz-transform:rotateX(0deg);
 -webkit-transform:rotateX(0deg);
 -o-transition-delay:0.1s;
 -ms-transition-delay:0.1s;
 -moz-transition-delay:0.1s;
 -webkit-transition-delay:0.1s;
}
.BOTAOZIN {
	background-color:white; margin-bottom:10px;
}

.BOTAOZIN button:hover,
.BOTAOZIN button:focus:hover  {
	background-color:black;
	color:#fff;
}
</style>
  <?php

        


$result_produtos_comple_X = "SELECT * FROM `produtos` WHERE `empresa` = '$filterEmp' and id = '$idProdutoX'";

  $resultado_produtos_comple_X  = mysqli_query($conn, $result_produtos_comple_X);

  $rows_produtos_comple_X = mysqli_fetch_assoc($resultado_produtos_comple_X);

         ?>

 <div style="margin-top: 6%;" text-align="center" id="main" class="container-fluid" >
 	<h3>Editar Complemento do Produto: <?php echo  $rows_produtos_comple_X['nome'] ; ?> </h3>
<hr></hr>



		<!-- <input type="radio" name="lista-abas" id="aba-3" class="aba-3">
		<label for="aba-3"><span><span>Barra de progresso</span></span></label>
		<input type="radio" name="lista-abas" id="aba-4" class="aba-4">
		<label for="aba-4"><span><span>Captcha com PHP</span></span></label> -->

  <?php

        


$result_produtos_comple = "SELECT * FROM `categoriaComplementos` WHERE `empresa` = '$filterEmp' and idProduto = '$idProdutoX'";

  $resultado_produtos_comple  = mysqli_query($conn, $result_produtos_comple );

         ?>


  <br>

		<form class="form-group col-md-12 upload-form" method="POST" id="cadCat" action="processoproduto/edit_comple.php?id=<?php echo $idProdutoX; ?>" enctype="multipart/form-data">
  <div class="tab-content">
  	 <div id="home" class="tab-pane fade in active">
   <button type="button" class="addmoreX pqw"><b style="font-size:21px;"> + </b> <b> Adicionar Categoria </b></button> <br>

 <div class="addressesH" id="addressesH" > </div>

 <br>
  	 	 <?php   while($rows_produtos_comple = mysqli_fetch_assoc($resultado_produtos_comple)){ ?>
  	<div class='addressessz' id='addressessz'>

  	 	 <div class="form-group col-md-12" style="border:solid;border-width:1px;padding:1%;width:100%;" >


       		     <div class="form-group col-md-2" style="display: none;">
<input  name='numbercat[]' value='<?php echo $rows_produtos_comple['numbercomple']; ?>' type='text' id='numbercat[]'>
		</div>
          <div class='form-group col-md-2'>
  	  	<label  for="recipient-name" class="control-label">Nome da Categoria</label>
  	<input name="nomeCategoria[]" type="text" id="nomeCategoria[]" class="form-control" placeholder="Digite o nome da Categoria"  value="<?php echo $rows_produtos_comple['categoriaComplemento']; ?>">
  	 </div>
  	   <div class="form-group col-md-1">
  	  	<label  for="recipient-name" class="control-label">Qtd. Min.</label>
  	  	<input name="qtdMin[]" type="text" id="qtdMin[]"  class="form-control" placeholder=""  value="<?php echo $rows_produtos_comple['qtdMin']; ?>">
  	  </div>

  	   <div class="form-group col-md-1">
  	  	<label  for="recipient-name" class="control-label">Qtd. Maxima.</label>
  	  	<input name="qtdMax[]" type="text" id="qtdMax[]" class="form-control" placeholder="" value="<?php echo $rows_produtos_comple['qtdMax']; ?>">
  	  </div>

  	 <div class="form-group col-md-2" >
    			<label class="">Complemento Obrigatorio</label>
			<div>
			  <select class="form-control" name="complementoObriga[]" >
								<option <?php if($rows_produtos_comple['CompleObriga'] == '1') { echo 'selected'; } ?> value="1">Sim</option>
								<option <?php if($rows_produtos_comple['CompleObriga'] == '0') { echo 'selected'; } ?> value="0">Não</option>

				</select>
			</div>
    </div>
    <div class='form-group col-md-2'> 
         <label for="">É pizza?</label> <br>
<select class="form-control" name="maiorValor[]" id="maiorValor">
    <option <?php if($rows_produtos_comple['pizza'] == '0' or $rows_produtos_comple['pizza'] == null) { echo 'selected'; } ?> value="0">NÃO</option>
    <option <?php if($rows_produtos_comple['pizza'] == '1') { echo 'selected'; } ?> value="1">SIM</option>
</select><br>
  </div>
  	 	 	<button type="button" class="removeInput2 pqw"> <b style="font-size:27px;"> - </b>  <b>Remover Categoria</b></button>
  	 	 



<br>
 <?php 
$numbercompleX = $rows_produtos_comple['numbercomple'];
 $result_produtos_comple_C = "SELECT * FROM `complementos` WHERE `empresa` = '$filterEmp' and idProduto = '$idProdutoX' and numbercomple = '$numbercompleX'";
  $resultado_produtos_comple_C  = mysqli_query($conn, $result_produtos_comple_C );


 ?>

  		<?php  while($rows_produtos_comple_C = mysqli_fetch_assoc($resultado_produtos_comple_C)){  ?>
      	    <div class="addmoreaddX address">
 <button type="button" class="addmore pqw"><b style="font-size:21px;"> + </b> <b> Adicionar Complemento </b></button>

 <div class="form-group col-md-12 ">
     	<div class="form-group col-md-3">
		<label for="" class="control-label">Complemento </label>
			<div >
	<input name="nomeComplemento[]" type="text"  class="form-control" placeholder="" style="white-space: nowrap;display:inline-block;" value="<?php echo $rows_produtos_comple_C['nomeComplemento']; ?>">

	</div>
		</div>

     	<div class="form-group col-md-3">
		<label for="" class="control-label">Descricao</label>
			<div >
	<input name="descComplemento[]" type="text"  class="form-control" placeholder="" style="white-space: nowrap;display:inline-block;" value="<?php echo $rows_produtos_comple_C['descComplemento']; ?>" >

	</div>
		</div>

     <div class="form-group col-md-2">
		<label for="" class="control-label">Valor</label>
			<div >
	<input name="valorComplemento[]" type="text"  class="form-control" placeholder="" style="white-space: nowrap;display:inline-block;"  value="<?php echo $rows_produtos_comple_C['valorComplemento']; ?>">

	</div>


		</div>
           <div class='form-group col-md-2'> 
    <label for='' class='control-label'>Valor de Desconto </label>
      <div >
   <input style='white-space: nowrap;display:inline-block;' placeholder='' maxlength='5' type='number' step='.01' class='form-control' value='<?php echo $rows_produtos_comple_C['valorDesconto']; ?>' name='valorDesconto[]' size='20' onKeydown='Formata(this,20,event,2)' >
  </div>
    </div>

     <button type='button' class='rmbtn pqw' style='margin-top:16px;'> <b style='font-size:27px;'> - </b> <b> Excluir Complemento </b> </button>


  <div class="addmoreadd">
  </div>
		     <div class="form-group col-md-2" style="display: none;">
<input  name='numbercomple[]' value='<?php echo $rows_produtos_comple_C['numbercomple']; ?>' type='text' id='numbercomple[]'>
		</div>
	</div>

  </div>



<?php } ?>

</div>
 </div>



    <?php } ?>
 
</div>

      	
</div>




	  	 <!--
		<div class="form-group col-md-2">
	   	<button type="submit" class="btn btn-primary">Adicionar Imagem</button> 
		<input  class="form-control" id="exampleInputEmail1"  >
	  </div>
	  <div id="content">
  <?php
  	include_once("conexao.php");
		//$db = mysqli_connect("localhost", "root", "", "deliveryatalos");
		$sql = "SELECT * FROM images";
		$result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div'>";
      	echo "<img src='imagens/".$row['image']."' >";
      	echo "<p>".$row['image_text']."</p>";
      echo "</div>";
    }
  ?>
  <form method="POST" action="teste.php" enctype="multipart/form-data">
  	<input type="hidden" name="size" value="1000000">
  	<div>
  	  <input type="file" name="image">
  	</div>
  	<div>
      <textarea 
      	id="text" 
      	cols="40" 
      	rows="4" 
      	name="image_text" 
      	placeholder="Say something about this image..."></textarea>
  	</div>
  	<div>
  		<button type="submit" name="upload">POST</button>

  	</div>
  </form>
</div>
-->
	   	  </div>
	
<!-- 	        <script>
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
	  <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 footer" style="" align="center">
	  	<button type="submit"  style="width:95%;font-size:23px;" class="btn btn-primary">Salvar</button>
		<a  href="produto.php" style="width:95%;font-size:23px;" class="btn btn-default">Cancelar</a>
	  </div>
	</div>
  </div>

    </form>
<script>
$(document).ready(function(){
    $(".nav-tabs a").click(function(){
        $(this).tab('show');
    });
    $('.nav-tabs a').on('shown.bs.tab', function(event){
        var x = $(event.target).text();         
        var y = $(event.relatedTarget).text();  
        $(".act span").text(x);
        $(".prev span").text(y);
    });
});
</script>
<?php

$result_produtos_compleA = "SELECT numbercomple FROM categoriaComplementos where empresa = '$filterEmp' and idProduto = '$idProdutoX' ORDER BY numbercomple DESC ";

  $resultado_produtos_compleA  = mysqli_query($conn, $result_produtos_compleA );

$rows_produtos_compleA = mysqli_fetch_assoc($resultado_produtos_compleA);

$breakNumber = $rows_produtos_compleA['numbercomple'];
	?>

  	  	  	 	<script>


	var counter2 = <?php echo $breakNumber; ?>;

var dynamicInput2 = [];

  function addInputCategoria(){


    var newdiv2 = document.createElement('div');
    newdiv2.id = dynamicInput2[counter2];


    newdiv2.innerHTML = //"Complemento " + (counter + 1) +
    // " <br><input type='text' id='a"+(counter +1)+"' class='form-control' style='display:inline-block;' name='myInputs[]'> "
     //Complemento

         "<div class='form-group col-md-2'>" +
         "<input type='button' value='-' style='margin-left: 5px;white-space: nowrap;' onClick='removeInput2("+dynamicInput2[window.counter2]+ "); '> "+
  	  	"<label  for='recipient-name' class='control-label'>Nome da Categoria</label>" +
  	  	"<input name='nomeCategoria' type='text' id='nomeCategoria[]' class='form-control' placeholder='Digite o nome da Categoria' required>" +
  	 "</div>" +
  	  	  "<div class='form-group col-md-1'>" +
  	  	"<label  for='recipient-name' class='control-label'>Qtd. Min.</label>" +
  	  	"<input name='qtdMin' type='text' id='qtdMin[]'  class='form-control' placeholder='' required>" +
  	  "</div>" +
  	    	  	 "<div class='form-group col-md-1'>" +
  	  	"<label  for='recipient-name' class='control-label'>Qtd. Maxima.</label>" +
  	  	"<input name='qtdMax' type='text' id='qtdMax[]' class='form-control' placeholder='' required>" +
  	  "</div>" +
  	   "<div class='form-group col-md-2' style='margin-top:2%;'>" +
  "<input class='input' type='checkbox' id='complementoObriga' name='complementoObriga' >" +
  "<label for='complemento1'> Complemento obrigatório </label>" +
    "</div>" +
  	"</div>" +


	"<div class='row'>"+
 "<div style='white-space: nowrap;display:inline-block;' id='eusim"+window.counter2+"'>"+
     "<div id='dynamicInput[0]' style='white-space: nowrap;display:inline-block;'>"+

		"<div class='form-group col-md-2'>"+
"<div >"+
		 "<input type='button' value='Adicionar Complemento' onClick='addInputQ("+dynamicInput2[window.counter2]+");' style='white-space: nowrap;'>"+
  "</div>"+
"</div>"+

    "</div>"+
"</div>"+
"</div>"


    document.getElementById('euCat').appendChild(newdiv2);
    counter++;
}




	var counter = <?php echo $breakNumber; ?>;
var dynamicInput = [];

function addInput(id){


    var newdiv = document.createElement('div');
    newdiv.id = dynamicInput[counter];

    newdiv.innerHTML = //"Complemento " + (counter + 1) +
    // " <br><input type='text' id='a"+(counter +1)+"' class='form-control' style='display:inline-block;' name='myInputs[]'> "
     //Complemento
     "	<div class='form-group col-md-12'> " +
     "	<div class='form-group col-md-3'> "+
		"<label for='' class='control-label'>Complemento " + (counter + 1) + "</label>" +
			"<div >" +
	"<input name='nomeComplemento[]' type='text'  class='form-control' placeholder='' style='white-space: nowrap;display:inline-block;' required>" +

	"</div>" +
		"</div>" +
     //Final Complemento

     //Descricao
     "	<div class='form-group col-md-3'> " +
		"<label for='' class='control-label'>Descricao " + (counter + 1) + "</label>" +
			"<div >" +
	"<input name='descComplemento[]' type='text'  class='form-control' placeholder='' style='white-space: nowrap;display:inline-block;' required>" +

	"</div>" +
		"</div>" +
     //Final Descricao

     //Complemento
     "	<div class='form-group col-md-2'> " +
		"<label for='' class='control-label'>Valor " + (counter + 1) + "</label>" +
			"<div >" +
	"<input name='valorComplemento[]' type='text'  class='form-control' placeholder='' style='white-space: nowrap;display:inline-block;' required>" +
     "<input type='button' value='-' style='margin-left: 5px;white-space: nowrap;' onClick='removeInput("+dynamicInput[counter]+ "); '> "+
	"</div>"+
		"</div>"+
		"</div>"; 
     //Final Complemento

    document.getElementById('eusim').appendChild(newdiv);

    counter++;
}


  function removeInput(id){
    var elem = document.getElementById(id);
    return elem.parentNode.removeChild(elem);

  }


		var ctr = 1;
        function showTextBox(id) {
            // is the table row I wanted to add the element before
            var target = document.getElementById('bef' + id);
            var tblr = document.createElement('tr');
            var tbld1 = document.createElement('td');
            var tbld2 = document.createElement('td');
            var tblin = document.createElement('input');

            tblin.name = 'Complemento' + ctr;
            tblin.id = 'Complemento' + ctr;
            tblin.placeholder = 'Adicionar outro Complemento';

            tbld1.appendChild(document.createTextNode('Complemento' + ctr));
            tbld2.appendChild(tblin);
            tblr.appendChild(tbld1);
            tblr.appendChild(tbld2);

            target.parentNode.insertBefore(tblr, target);
            ctr++;
        }

        function hideTextBox(id) {
            var name = 'Complemento' + (ctr - 1);
            var pTarget = document.getElementById('tbhold' +id);
            var cTarget = document.getElementById(name);
           var tr = cTarget.parentNode.parentNode;
                tr.parentNode.removeChild(tr);
                ctr = ctr - 1;
        }

  	  	  	 	</script>

   <div id="menu1" class="tab-pane fade">

				<div class="conteudo" >


  <script>

  	var rowNumX = 0;
  	var ctr = 0;

	var counter2 = <?php echo $breakNumber; ?>;
var dynamicInput2 = [];

$("body").on("click", ".addmoreX", function() {
counter2++;
    // is the table row I wanted to add the element before
    var newdiv = document.createElement('div');
    newdiv.id = dynamicInput[counter];
    newdiv.innerHTML = //"Complemento " + (counter + 1) +
    // " <br><input type='text' id='a"+(counter +1)+"' class='form-control' style='display:inline-block;' name='myInputs[]'> "
    //Complemento
      "<div class='addressessz' id='addressessz' style='border:solid;border-width:1px;margin-top:2%;padding:1%;width:100%;'>"+
      "<div class='addressess' id='addressess'>"+
      '<button type="button" class="removeInput2 pqw"> <b style="font-size:27px;"> - </b>  <b>Remover Categoria</b></button>'+
        "<div class='form-group col-md-2' style='display: none;'>"+
		"<input name='numbercat[]' value='"+ counter2 +"' type='text' id='numbercat[]'>"+
		"</div>"+
        "<div class='form-group col-md-2'>"+
  	  	"<label  for='recipient-name' class='control-label'>Nome da Categoria</label>"+
  	  	"<input name='nomeCategoria[]' type='text' id='nomeCategoria[]' class='form-control' placeholder='Digite o nome da Categoria' >"+
  	 "</div>"+
  	   "<div class='form-group col-md-1'>" +
  	  	"<label  for='recipient-name' class='control-label'>Qtd. Min.</label>" +
  	  	"<input name='qtdMin[]' type='text' id='qtdMin[]'  class='form-control' placeholder='' >" +
  	  "</div>" +

  	   "<div class='form-group col-md-1'>"+
  	  	"<label  for='recipient-name' class='control-label'>Qtd. Maxima.</label>" +
  	  	"<input name='qtdMax[]' type='text' id='qtdMax[]' class='form-control' placeholder='' >" +
  	  "</div>" +
  	    	   "<div class='form-group col-md-2'>" +
    			'<label class="">Complemento Obrigatorio</label>'+
			'<div>'+
			 '<select class="form-control" name="complementoObriga[]">'+
								'<option value="1">Sim</option>'+
								'<option value="0">Não</option>'+

				'</select>'+
			'</div>'+
    "</div>"+
    "<div class='form-group col-md-2'> " +
         '<label for="">É pizza?</label> <br>'+
'<select class="form-control" name="maiorValor[]" id="maiorValor">'+
    '<option value="0">NÃO</option>'+
    '<option value="1">SIM</option>'+
'</select><br>'+
  "</div>"+

        "<div class='addresses' id='addresses'>"+
  	   	"<div class='address' id='address0'>"+

 '<button type="button" class="addmore pqw"><b style="font-size:21px;"> + </b> <b> Adicionar Complemento </b></button>'+



	"<div class='addmoreaddX'>"+

 "	<div class='form-group col-md-12'> " +
     "	<div class='form-group col-md-3'> "+
		"<label for='' class='control-label'>Complemento</label>" +
			"<div >" +
	"<input name='nomeComplemento[]' type='text'  class='form-control' placeholder='' style='white-space: nowrap;display:inline-block;' >" +

	"</div>" +
		"</div>" +
     //Final Complemento

     //Descricao
     "	<div class='form-group col-md-3'> " +
		"<label for='' class='control-label'>Descricao </label>" +
			"<div >" +
	"<input name='descComplemento[]' type='text'  class='form-control' placeholder='' style='white-space: nowrap;display:inline-block;' >" +

	"</div>" +
		"</div>" +
     //Final Descricao

     //Complemento
     "	<div class='form-group col-md-2'> " +
		"<label for='' class='control-label'>Valor </label>" +
			"<div >" +
	"<input name='valorComplemento[]' type='text'  class='form-control' placeholder='' style='white-space: nowrap;display:inline-block;' >" +
	"</div>"+
		"</div>"+
		         "  <div class='form-group col-md-2'> " +
    "<label for='' class='control-label'>Valor de Desconto </label>" +
      "<div >" +
   "<input style='white-space: nowrap;display:inline-block;' placeholder='' maxlength='5' type='number' step='.01' class='form-control' name='valorDesconto[]'  size='20' onKeydown='Formata(this,20,event,2)' >"+
  "</div>"+
    "</div>"+
		  '<div class="addmoreadd">'+
 '</div>'+
				    "<div class='form-group col-md-2' style='display: none;'>"+
"<input name='numbercomple[]' value='"+ counter2 +"' type='text' id='numbercomple[]'>"+
		"</div>"+
		"</div>"+
    "</div>"+
    "</div>"+
"</div>"+
"<br><br>"+
"</div>"+
"<br><br>"+
"</div>"

     //Final Complemento
    document.getElementById('addressesH').appendChild(newdiv);
 });

 // function removeInput2(id){
 //   var elem = document.getElementById(id);
 //   return elem.parentNode.removeChild(elem);


 // }
$("body").on("click", ".removeInput2", function() {
    $(this).parents('.addressessz').remove();
});


$("body").on("click", ".rmbtnX", function() {
    $(this).parents('.addressN').remove();
});

var rowNum = 0;

$("body").on("click", ".addmore", function() {
      rowNum++;
      var $address = $(this).parents('.address');
      var nextHtml = $address.clone();
      nextHtml.attr('id', 'address' + rowNum);
      var hasRmBtn = $('.rmbtn', nextHtml).length > 0;
    if (!hasRmBtn) {
      var rm = "<button type='button' class='rmbtn pqw' style='margin-top:16px;'> <b style='font-size:27px;'> - </b> <b> Excluir Complemento </b> </button>"
      $('.addmoreadd', nextHtml).append(rm);
    }
      //  $(this).parents('.rea').remove();
   // $(this).remove();
      $address.after(nextHtml).find("input[name='nomeComplemento[]'], [name='descComplemento[]'], [name='valorComplemento[]']").val("");
 


 });

$("body").on("click", ".rmbtn", function() {
    $(this).parents('.address').remove();
});
  </script>
      <button type="button" class="addmoreX pqw"><b style="font-size:21px;"> + </b> <b> Adicionar Categoria </b></button>
      <br> <br>

        <?php

                  include_once("conexao.php");
                  $idProdutoX = $_GET['id'];


$result_produtos_comple = "SELECT * FROM `categoriaComplementos` WHERE `empresa` = '$filterEmp' and idProduto = '$idProdutoX'";

  $resultado_produtos_comple  = mysqli_query($conn, $result_produtos_comple );

         ?>



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


 <!--<script src="js/jquery.min.js"></script>-->

</body>
</html>


<!-- 

				  <?php
				  include_once("conexao.php");
			        $resultado = "SELECT * FROM categoria_produtos";
					$resultado_categoria = mysqli_query($conn, $resultado);
						$resultado_categoria =mysqli_query("SELECT * FROM categoria_produtos");
						while($dados = mysqli_fetch_assoc($resultado_categoria)){
							?>
								<option value="<?php echo $dados["id"]; ?>"><?php echo $dados["nome"];?></option>
							<?php
						}
					?>
			
				  <?php 
				          //SELECT * FROM produtos WHERE nome LIKE 'valor_pesquisar'
						$resultado =mysqli_query($conn, "SELECT * FROM categoria_produtos");
						while($dados = mysqli_fetch_assoc($resultado)){
							?>
								<option value="<?php echo $dados["id"]; ?>"> <?php echo $dados["nome"];?> </option>
							<?php
						}
					?>

</div> <!-- /container -->

<?php $conn->close(); ?>