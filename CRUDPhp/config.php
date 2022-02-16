<?php
$config= array(
    'database_dns' => 'mysql:dbname=person;host:localhost',
    'database_user'=>'root',
    'database_pass'=> null,
);

$conn = new PDO($config['database_dns'], $config['database_user'],$config['database_pass']);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql= "use person";
$conn -> exec($sql);

return $conn;
