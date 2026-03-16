<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");

header("Access-Control-Allow-Headers: Access-Control-Allow-Origin, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With");


include_once("../../includes/initialize.php");

$user = new User($db);

// Read submitted json fata from request body
$data = json_decode(file_get_contents("php://input"));

// Fill in user instance properties with decoded valued from request
$user->username = $data->username;
$user->firstName = $data->firstName;
$user->lastName = $data->lastName;
$user->age = $data->age;

if($user->create()){
    echo json_encode(array("message" => "User Created."));
}
else{
    echo json_encode(array("message" => "User Not Created."));
}

?>