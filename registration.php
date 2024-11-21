<!DOCTYPE html>
<!--
    Student Name: Di Wu
    Student No.: 041-165-211
    Lab: CST8285 311
    Assignment: Lab Exercise 04
    Date: November-01-2024
    Professor: Hala Own

    File Name: registration.html
    Page Description: Introduce form validation for web development.
-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="introduction of form validation">
    <meta name="keyword" content="JavaScript, form validation, form, Selector">
    <meta name="author" content="Di Wu">
    <title>Sign Up for EchoMatrix</title>

    <link rel="stylesheet" href="style.css">
    <script src="js/script.js" defer></script>
</head>
<body>
    <div class="formcontainer">
        <h1>EchoMatrix</h1>
        <hr>
        <form action="register.php" method="POST" onsubmit="return validate();">

            <div class="textfield">
                <label for="email">Email Address</label>
                <input class="input-size" type="text" name="email" id="email" placeholder="Email">
            </div>

            <div class="textfield">
                <label for="login">User Name</label>
                <input class="input-size" type="text" name="login" id="login" placeholder="User name">
            </div>

            <div class="textfield">
                <label for="pass">Password</label>
                <input class="input-size" type="password" name="pass" id="pass" placeholder="Password">
            </div>
        
            <div class="textfield">
                <label for="pass2">Re-type Password</label>
                <input class="input-size" type="password" id="pass2" placeholder="Password">
            </div>

            <div class="checkbox">
                <input type="checkbox" name="newsletter" id="newsletter" value="TRUE">
                <label for="newsletter">I agree to receive EchoMatrix newsletters</label>
            </div>

            <div class="checkbox">
                <input type="checkbox" name="terms" id="terms">
                <label for="terms">I agree to the terms and conditions</label>
            </div>

            <button class="input-size" id="sign-up" type="submit">Sign-Up</button>
            <button class="input-size" id="reset" type="reset">Reset</button>

            <p><a href="index.html">Already have an account?</a></p>

        </form>
    </div>

</body>
</html>