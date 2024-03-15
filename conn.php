<?php

require_once 'var.php';

$conn = mysqli_connect($mysql_server, $mysql_user, $mysql_password, $mysql_database);
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

?>
