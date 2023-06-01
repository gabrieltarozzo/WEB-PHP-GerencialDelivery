<?php

header("Access-Control-Allow-Origin:http://localhost:8100");
header("Content-Type: application/x-www-form-urlencoded");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

    $data = file_get_contents("php://input");
    $id = json_decode($data);

    $id = trim($id); 

    echo json_encode($id);

?>