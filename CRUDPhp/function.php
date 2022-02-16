<?php
function get_people($limit = null)
{
    $pdo = require 'config.php';

    $query = 'SELECT * FROM person order by id';
    if ($limit) {
        $query = $query .' LIMIT :resultLimit';
    }
    $stmt = $pdo->prepare($query);
    $stmt->bindParam('resultLimit', $limit, PDO::PARAM_INT);
    $stmt->execute();
    $people = $stmt->fetchAll();

    return $people;


}
function save_peop($peop){
    $json = json_encode($peop, JSON_PRETTY_PRINT);
    file_put_contents("peopledata.json",$json);
}
