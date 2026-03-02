<?php

$db_user = 'root';
$db_password = 'root';
$db_name = 'erd exercise';

//PDO = PHP Data Objects
//Used for Object Oriented Programming
//Creating am 'object' makes our code more organised

$db = new PDO(
    'mysql:host=127.0.0.1;dbname'.$db_name,';charset=ut8',
    $db_user,
    $db_password
);

// set some db attributes

$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
$db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY,true);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>
