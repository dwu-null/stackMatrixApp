<?php

require_once('database.php');
include "header.php";
$db = db_connect();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $thread_id = $_POST['thread_id'];
  $message = $_POST['reply'];

  $sql = "INSERT INTO COMMENTS (message, reply_time, thread_id) VALUES ('$message', CURRENT_TIME(), '$thread_id')";

  header("Location: view.php?id=$thread_id");
} else {
  header("Location:  new.php");
}

db_disconnect($db);
