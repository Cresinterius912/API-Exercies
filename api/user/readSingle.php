<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET");

header("Access-Control-Allow-Headers: Access-Control-Allow-Origin, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With");


include_once("../../includes/initialize.php");

// Create a new instance of the User class
// This allows us to use its structure and functions
$user = new User($db);

$user->id = isset($_GET["id"]) ? $_GET["id"] : die();

$result = $user->readSingle();
$num = $result->rowCount();

if($num > 0){
    $user_info = array(
        'id'            => $user->id,
        'username'      => $user->username,
        'firstName'     => $user->firstName,
        'lastName'      => $user->lastName,
        'age'           => $user->age,
    );
    print_r(json_encode($user_info));
}
else{
    echo json_encode(array("message"=>"No users found."));
}


?>