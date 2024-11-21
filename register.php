<?php

require_once('database.php');
include "header.php";
$db = db_connect();

// Handle form values sent by new.php
if ($_SERVER['REQUEST_METHOD'] == 'POST') { //make sure we submit the data
    $email = $_POST['email'];
    $userName = $_POST['login'];
    $password = $_POST['pass'];
    $newsletter = $_POST['newsletter'];
    //prepare your query string
    $sql = "INSERT INTO USERS (email, user_name, password, newsletter, sign_up_time) VALUES ('$email', '$userName', '$password', '$newsletter', CURRENT_TIME())";
    $result = mysqli_query($db, $sql);
    // For INSERT statements, $result is true/false

    // $id = mysqli_insert_id($db); //the mysqli_insert_id() function returns the id (generated with AUTO_INCREMENT) 
    // //redirect to show page with generated id as a parameter
    // header("Location: show.php?id=$id");
    header("Location: sign-in.php");
} else {
    header("Location:  registration.php");
}
