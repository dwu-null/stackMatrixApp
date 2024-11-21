<?php

require_once('database.php');
include "header.php";
$db = db_connect();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userName = $_POST['login'];
    $password = $_POST['pass'];

    $sql = "SELECT * FROM USERS";
    $result_set = mysqli_query($db, $sql);
    while ($results = mysqli_fetch_assoc($result_set)) {
        if ($results['user_name'] == $userName) {
            if ($results['password'] == $password) {
                header("Location: home.php");
                return;
            }
        }
    }
    header("Location: sign-in.php");

} else {
    header("Location:  sign-in.php");
}
