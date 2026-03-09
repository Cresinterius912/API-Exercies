<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET");

header("Access-Control-Allow-Headers: Access-ControlAllow-Origin, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With");

include_once("../../includes/initialize.php");

// Create a bew instance of the USer class
// This allows us to use the structure and functions
$user = new User($db);

$result = $user->read();
$num = $result->rowCount();

if($num > 0){
    $users_list = array();
    $users_list['data'] = array();
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $user_item = array(
            "id"        => $id,
            "username"  => $username,
            "firstName" => $firstName,
            "lastName"  => $lastName,
            "age"       => $age,
        );
        array_push($users_list['data'], $user_item);
    }
    echo json_encode($users_list);
}
else{
    echo json_encode(array("message"=>"No Users Found."));
}

?>