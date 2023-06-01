<?php
  
  include_once("../../conexao.php");
  $request=$_POST['request'];
  $query="select * from produtos where categoria_produtos_id='$request'";
  if($request == '0'){
    $query="select * from produtos";
  }
  $output=mysqli_query($conn,$query);
echo '<table border="1"';
    echo '<tr>
      <th>First Name</th>
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