<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once("config.php");
$sql = "SELECT imagens FROM produtos ORDER BY id DESC";
$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
$total_records = '';
while($record = mysqli_fetch_array($resultset)) {
$total_records[] = $record;
}
echo json_encode($total_records);
 $conn->close();
?>
