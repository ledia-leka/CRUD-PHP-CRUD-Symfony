<?php

$id = $_GET['id'];


    $pdo = require 'config.php';
    $query = 'Delete FROM person where id = :id order by id';

        $result = $pdo ->prepare($query);
        $result -> bindParam('id', $id, PDO::PARAM_INT );
        $result->execute();
        $pdo = null;

  header("Location: list.php");
