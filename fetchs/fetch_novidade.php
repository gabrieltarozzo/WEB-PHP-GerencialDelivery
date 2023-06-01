<?php
  
  include_once("../conexao.php");
  $request=$_POST['request'];
        $result_novidades = "SELECT * FROM novidades where situacao_id='$request";
    

  //$resultado_produtos = mysqli_query($conn, $result_produtos);
  //$query="select * from produtos where categoria_produtos_id='$request'";
  if($request == '0'){
    $result_novidades="SELECT * FROM novidades ORDER BY (situacao_id) ASC, (nome) ASC";
  }
  
  $resultado_novidades = mysqli_query($conn, $result_novidades); ?>
 <table class="table table-striped table-hover table" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th class="col-sm-2">Nome da Novidade:</th>
                         <th class="col-sm-3">Descricao:</th>
                        <th class="col-sm-2">Situacao</th>
                        <th class="col-sm-3">Imagem da novidade</th>
                        <th class="actions"  >Botões</th>
                    </tr>
                </thead>
        <?php
  while($rows_novidades = mysqli_fetch_assoc($resultado_novidades))
  { ?>
    
      <tr>
                                        <td><?php echo $rows_novidades['id']; ?></td>
                                        <td><?php echo $rows_novidades['nome']; ?></td>
                                        <td class="col-md-4"><?php echo $rows_novidades['descricao']; ?></td>
                                           <?php
                                        $id_doidi = $rows_novidades['situacao_id'];
                                        $nome_situacao = ("SELECT nome FROM situacoes WHERE id = '$id_doidi'  ");
                                        $resultado_situacao = mysqli_query($conn, $nome_situacao);
                                        $roww = mysqli_fetch_assoc($resultado_situacao);
                                        $n_sit = $roww['nome'];
                                         ?>
                                         <td><?php echo $n_sit; ?></td>
                                         <td> <?php echo "<img class='teste' src='../imagens_novidades/".$rows_novidades['imagens']."' >" ?> </td>

                                        <!--<td><?php // echo $rows_categorias['created']; ?></td> pensar em adicionar imagem -->
                                        <td>
                                            <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal<?php echo $rows_novidades['id']; ?>">Visualizar</button>

                                            <button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#exampleModal" 
                                            data-whateverdescricao="<?php echo $rows_novidades['descricao']; ?>" 
                                            data-whatever="<?php echo $rows_novidades['id']; ?>" 
                                            data-whatevernome="<?php echo $rows_novidades['nome']; ?>"
                                            data-whateversituacao_id="<?php echo $rows_novidades['situacao_id']; ?>"
                                            data-whateverimagens="<?php echo $rows_novidades['imagens']; ?>">
                                             Editar</button>

                                            <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete-modal" data-whatever="<?php echo $rows_novidades['id']; ?>">Excluir</button>
                                        </td>
                                    </tr>
                  <?php
    
  };
echo '</table>';

 ?>