<?php

require_once('database.php');
include 'header.php'; 
$db = db_connect();

?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') { //make sure we submit the data
  $login = $_POST['login']; // access the form data
  $pass = $_POST['pass'];
  $pass2 = $_POST['pass2'];
  //prepare your query string
  $sql = "INSERT INTO users (login, password) VALUES ('$login','$pass')";
  $result = mysqli_query($db, $sql);
  // For INSERT statements, $result is true/false

  $id = mysqli_insert_id($db); //the mysqli_insert_id() function returns the id (generated with AUTO_INCREMENT) 
  //redirect to show page with generated id as a parameter
  header("Location: registration.php?id=$id");
} else {
  header("Location:  new.php");
}
?>


<body>
    <div class="formcontainer">
        <div class="title">
        <h1>Register for a new account</h1>
        </div>
        <hr>
        <form action="registration.php"
        method="post" 
         > 

            <div class="textfield">
                <label for="login">User Name</label>
                <input type="text" name="login" id="login" placeholder="User name">
            </div>

            <div class="textfield">
                <label for="pass">Password</label>
                <input type="password" name="pass" id="pass" placeholder="Password">
            </div>
        
            <div class="textfield">
                <label for="pass2">Re-type Password</label>
                <input type="password" id="pass2" placeholder="Password">
            </div>

            <div class="checkbox">
               
                <label for="terms">I agree to the terms and conditions</label>
                <input type="checkbox" name="terms" id="terms">
            </div>

            <button type="submit">Sign-Up</button>
            <button type="reset">Reset</button>

        </form>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>