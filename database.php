<?php

define("DB_SERVER", "localhost");
define("DB_USER", "appuser");
define("DB_PASS", "password");
define("DB_NAME", "assignment2");

function db_connect()
{
  $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
  if (mysqli_connect_errno()) {
    $msg = "Database connection failed: ";
    $msg .= mysqli_connect_error();
    $msg .= " (" . mysqli_connect_errno() . ")";
    exit($msg);
  }

  return $connection;
}

function db_disconnect($connection)
{
  if (isset($connection)) {
    mysqli_close($connection);
  }
}


?>