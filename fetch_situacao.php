<?php
  
  include_once("conexao.php");
  $request2=$_POST['request2'];
     session_start();

   $filterEmp = $_SESSION['usuarioEmpresa'];
    $result_produtos = "SELECT * FROM produtos  where situacao_id='$request2' AND empresa = '$filterEmp'";

  //$resultado_produtos = mysqli_query($conn, $result_produtos);
  //$query="select * from produtos where categoria_produtos_id='$request'";
  if($request == '0'){
    $result_produtos="SELECT * FROM produtos where empresa = '$filterEmp' ORDER BY (categoria_produtos_id) ASC, (nome) ASC";
  }
  $resultado_produtos=mysqli_query($conn,$result_produtos); ?>
<script>
$(document).ready(function() {
    $('#example2').DataTable( {
 language: {
    sEmptyTable: "Nenhum registro encontrado",
    sInfo: "Mostrando de _START_ até _END_ de _TOTAL_ registros",
    sInfoEmpty: "Mostrando 0 até 0 de 0 registros",
    sInfoFiltered: "(Filtrados de _MAX_ registros)",
    sInfoPostFix: "",
    sInfoThousands: ".",
    sLengthMenu: "Mostrando até _MENU_ resultados por página",
    sLoadingRecords: "Carregando...",
    sProcessing: "Processando...",
    sZeroRecords: "Nenhum registro encontrado",
    sSearch: "Pesquisar",
    oPaginate: {
        "sNext": "Próximo",
        "sPrevious": "Anterior",
        "sFirst": "Primeiro",
        "sLast": "Último",
    },
    oAria: {
        "sSortAscending": ": Ordenar colunas de forma ascendente",
        "sSortDescending": ": Ordenar colunas de forma descendente",
    },
 },
sDom: 't',
lengthChange: false,
paging: false,
order: [[ 0, "desc" ]],

        responsive: true,
        fixedHeader: true,

            fixedHeader: {
        headerOffset: $('#navheight').outerHeight(),

    },

    } );
} );

</script>

<table id="example2" class="table table-striped table-hover table" cellspacing="0" cellpadding="0">
      <thead>
          <tr>
            <th >Cód</th>
            <th >Nome do produto</th>
            <th >Preço de Venda</th>
            <th >% Promocional</th>
            <th >Desconto em R$</th>
            <th >Situação</th>
            <th  >Categoria produto</th>
            <th></th>
          </tr>
        </thead>
            <tbody>
        <?php
  while($rows_produtos = mysqli_fetch_assoc($resultado_produtos))
  { ?>
    
      <tr>
                    <td><?php if($rows_produtos['codigo'] == ""){echo $rows_produtos['id'];} else{echo $rows_produtos['codigo'];} ?></td>
                    <td><?php echo $rows_produtos['nome']; ?></td>
                    <td>R$ <?php echo $rows_produtos['valor']-$rows_produtos['promo_valor']; ?> </td>
                    <td><?php echo (-$rows_produtos['valor']-(-$rows_produtos['promo_valor']))*100/$rows_produtos['valor']-(-100);?> % </td> 
                    <td>R$ <?php echo $rows_produtos['promo_valor']; ?></td>
                    <?php
                        $id_doidi = $rows_produtos['situacao_id'];
                    $nome_situacao = ("SELECT nome FROM situacoes WHERE id = '$id_doidi'  ");
                    $resultado_situacao = mysqli_query($conn, $nome_situacao);
                    $roww = mysqli_fetch_assoc($resultado_situacao);
                    $n_sit = $roww['nome'];
                     ?>

                    <td><?php echo $n_sit; ?></td>
                    <?php
                        $id_doido = $rows_produtos['categoria_produtos_id'];
                    $nome_categoria = ("SELECT nome FROM categoria_produtos WHERE id = '$id_doido' ");
                    $resultado_categoria = mysqli_query($conn, $nome_categoria);
                    $row = mysqli_fetch_assoc($resultado_categoria);
                    $n_cat = $row['nome'];
                     ?>
                    <td><?php echo $n_cat; ?></td>




                    <!--<td><?php // echo $rows_produtos['created']; ?></td> pensar em adicionar imagem -->


                    <td>
                      <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal<?php echo $rows_produtos['id'];?>">
                      Visualizar</button>
                      <!--  -->
                      <button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#exampleModal"
                      data-whatever="<?php echo $rows_produtos['id']; ?>"
                      data-whateversituacao_id="<?php echo $rows_produtos['situacao_id'];?>"
                      data-whatevercategoria_produtos_id="<?php echo $rows_produtos['categoria_produtos_id'];?>"
                      data-whatevernome="<?php echo $rows_produtos['nome']; ?>"
                      data-whateverimagens="<?php echo $rows_produtos['imagens']; ?>"
                      data-whatevervalor="<?php echo $rows_produtos['valor']; ?>"
                      data-whateverdescricao="<?php echo $rows_produtos['descricao']; ?>"
                      data-whatevercodigo="<?php if($rows_produtos['codigo'] == ""){echo $rows_produtos['id'];} else{echo $rows_produtos['codigo'];} ?>"
                      data-whateverpromo_valor="<?php echo $rows_produtos['promo_valor']; ?>">
                      Editar</button>

                        <!-- -->
                        <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete-modal" data-whatever="<?php echo $rows_produtos['id']; ?>">Excluir</button>
                                                    <?php if($rows_produtos['temcomple'] == '1') {  ?>
                    <?php echo "<a href='edit_complement.php?id=".$rows_produtos['id']."'>" ?>

                      <button type="button"  class="btn btn-xs btn-warning" style="width:83%;margin-top:5px;background-color:#5F9EA0;color:white;">Editar Complementos</button>

                   <?php "</a> "; ?> <?php } ?>
                    </td>
                  </tr>
                  <?php
    
  };
echo '</table>';

 ?>

 <?php $conn->close(); ?>