<?php

require_once ('config.php');

function db_connection() {
  try {
    $dbh = new PDO('mysql:host='.DB_HOST.';port='.DB_PORT .';dbname='.DB_DATABASE, DB_USER, $_ENV['DB_PASS']);
    return $dbh;
  }
    catch (PDOException $e){
      // we should set a global variable here so we know the DB is down
    }
}



?>