<style>
table
{
  border-collapse: collapse;
    width: 600px;
}
th
{

}
tr{

}
td
{
  padding: 10px 20px 10px 20px;
}
    select
    {
        padding: 10px 20px 10px 20px;
        margin: 10px;
        font-size: 18px;
        display: inline-block;
        
    }
    option 
    {
        padding: 10px 20px 10px 20px;
    }
    #ab
    {
        font-size: 18px;
        display: inline-block;
    }
</style>
<script src="jquery.js"></script>
<script>
    $(document).ready(function()
                     {
        $("#fetchval").on('change',function()
                         {
            var keyword = $(this).val();
            $.ajax(
            {
                url:'fetch.php',
                type:'POST',
                data:'request='+keyword,
                
                beforeSend:function()
                {
                    $("#table-container").html('Working...');
                    
                },
                success:function(data)
                {
                    $("#table-container").html(data);
                },
            });
        });
    });
    
</script>
<h1>Ajax Filter Table</h1>
<div id="ab">Fetch Results By:</div>


<div class="form-group col-md-4">
      <label for="inputPassword3" class="">Categoria</label>
      <div>
        <select class="form-control" id="fetchval" name="fetchby" required >
          <option value = "0"> Mostrar Tudo</option>
          <?php
           include_once("../../conexao.php");
      
              $resultado =mysqli_query($conn, "SELECT * FROM categoria_produtos");
            while($dados = mysqli_fetch_assoc($resultado)){
              ?>
                <option value="<?php echo $dados["id"]; ?>"><?php echo $dados["nome"];?></option>
              <?php
            }
          ?>
        </select>
      </div>
      </div>



<br>
<br>
<div id="table-container">
<?php
  include_once("../../conexao.php");
  $query="select * from produtos";
  $output=mysqli_query($conn,$query);
echo '<table border="1"';
    echo '<tr>
      <th>Nome do produto</th>
      <th>Last Name</th>
      <th>Roll No.</th>
      <th>Year</th>
    </tr>';
  while($fetch = mysqli_fetch_assoc($output))
  {
      echo '<tr>';
      echo '<td>'.$fetch['nome'].'</td>';
      echo '<td>'.$fetch['categoria_produtos_id'].'</td>';

      echo '</tr>';
  };
echo '</table>';
 ?>

</div>