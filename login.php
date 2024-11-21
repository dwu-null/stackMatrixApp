<?php
session_start();
require_once('database.php');
include 'header.php'; 
$db = db_connect();
?>

<?php


//$users = array("Hala" => "xxxx", "Mia" => "yyyy", "Orange" => "zzzz"); //use database
$users = array();
$sql = "SELECT login, password FROM users";
$result_set = $db->query($sql);
while ($row = $result_set->fetch_assoc()) {
    $users[$row['login']] = $row['password'];
}

if (isset($_POST['userid']) && isset($_POST['password'])) {
    // If the user has just tried to log in

    $userid = $_POST['userid'];
    $password = $_POST['password'];

    // Validate the existence of the user and password in the associative array
    if (isset($users[$userid]) && $users[$userid] === $password) {
        $_SESSION['valid_user'] = $userid; // Create session variable
        $_SESSION['valid_pass'] = $password; // Create another session variable
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Home Page</title>
    <link rel="stylesheet" href="style.css">



</head>

<body>
    <h1>Home Page</h1>
    <?php
    if (isset($_SESSION['valid_user'])) {
        echo '<p>You are logged in as: ' . $_SESSION['valid_user'] . ' <br />';
        echo '<p><a href="individual.php">Go to your individual page</a></p>';
        echo '<p><a href="logout.php">Logout</a></p>';
    } else {
        if (isset($userid)) {
            // if they've tried and failed to log in
            echo '<p>Could not log you in.</p>';
            echo '<p><a href="register.php">please register first. </a></p>';
        } else {
            // they have not tried to log in yet or have logged out
            echo '<p>You are not logged in.</p>';
            echo '<p><a href="register.php">please register first. </a></p>';
      

          
        }
    }
    ?>
    <!-- provide form to log in -->
    
        <form action="login.php" method="post">

            <fieldset>
                <legend>Login Now!</legend>
                <p><label for="userid">UserID:</label>
                    <input type="text" name="userid" id="userid" size="30" />
                </p>
                <p><label for="password">Password:</label>
                    <input type="password" name="password" id="password" size="30" />
                </p>
            </fieldset>
            <button type="submit" name="login">Login</button>
        </form>
    
        <p><a href="individual.php">Go to your individual page</a></p>
        <p><a href="logout.php">Back to Home Page</a></p>
            
    <?php include 'footer.php'; ?>
</body>

</html>