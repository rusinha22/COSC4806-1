<?php

require_once ('database.php');

Class User {

public function get_all_users () {
$db = db_connection();
  $statement = $db->prepare("select * from users;");
  $statement->execute();
  $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
  return $rows;
  }

  
  
}