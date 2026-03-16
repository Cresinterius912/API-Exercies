<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET");

header("Access-Control-Allow-Headers: Access-Control-Allow-Origin, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With");


include_once("../../includes/initialize.php");

// Create a new instance of the Post class
// This allows us to use its structure and functions
$post = new Post($db);

$post->id = isset($_GET["id"]) ? $_GET["id"] : die();

$result = $post->readSingle();
$num = $result->rowCount();

if($num > 0){
    
    $post_info = array(
        'id'            => $post->id,
        'title'      => $post->title,
        'content'     => $post->content,
        'userID'      => $post->userID,
    );
    print_r(json_encode($post_info));
}
else{
    echo json_encode(array("message"=>"No posts found."));
}


?>