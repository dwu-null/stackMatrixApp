<?php

require_once('database.php');
include "header.php";
$db = db_connect();

// Handle form values sent by new.php
if ($_SERVER['REQUEST_METHOD'] == 'POST') { //make sure we submit the data
  // $name = $_POST['name']; // access the form data
  // $address = $_POST['address'];
  $message = $_POST['message'];
  //prepare your query string
  $sql = "INSERT INTO THREADS (post_time, message) VALUES (CURRENT_TIME(), '$message')";
  $result = mysqli_query($db, $sql);
  // For INSERT statements, $result is true/false

  // $id = mysqli_insert_id($db); //the mysqli_insert_id() function returns the id (generated with AUTO_INCREMENT) 
  // //redirect to show page with generated id as a parameter
  // header("Location: show.php?id=$id");
  header("Location: home.php");
} else {
  header("Location:  new.php");
}
