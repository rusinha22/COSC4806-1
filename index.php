<?php

session_start();

//check if the user is authenticated
// if not , send them to lohgin.php... headr()...
?>

<!DOCTYPE html>
<html>
 <head>
  <title>Page Title</title>
 </head>
  
 <body>

   <h1>Assignment 1</h1>

   <p> Welcome, <?=$_SESSION['username'] ?></p>


</body>
</html>
