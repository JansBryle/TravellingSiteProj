<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <!-- https://localhost/website_Project/ -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Register kan lods
    </title>
    <link rel="stylesheet" href="css/Loginstyle.css">
</head>

<body>
      
      <header>
        <h2 class="logo">Cultural Connect</h2>
        <nav class="navigation">
            <a href="index.php">Home</a>
            <a href="#">Journey</a>
            <a href="#">About</a>
            <a href="#">Contact</a>
            <?php
        if (isset($_SESSION["Usruid"])) {
            echo "<a href='profile.php'>Profile</a>";
            echo "<a href='logout.php'>Logout</a>";
            } 
            else{
                echo " <button class=\"btnLogin-popup\">Login</button> ";
            } 
      ?>
        </nav>
        
      </header>
      <div class="wrapper">
        <span class="icon-close"><ion-icon name="close-outline"></ion-icon></span> <!--para lng ti icon dyty. do not touch*/-->

        <div class="form-box login">
            <h2>Login</h2>
            <form action="php/login.pp.php" method="post">
                <div class="input-box">
                    <span class="icon"><ion-icon name="people-circle-outline"></ion-icon></span> <!-- Username */-->
                    <input type="text" id="LogUsername" name="uid">
                    <label>Username</label>
            </div>
            <div class = "input-box">
                <span class="icon"><ion-icon name="lock-closed"></ion-icon></span> <!--para lng ti icon dyty. do not touch*/-->
                <input type="password" id="regpass" name="Usrpwd">
                <label>Password</label>
            </div>
            <div class = "remember-forgot">
                <label><input type = "checkbox"> Remember me</label>
                <a href="#" > Forgot Password? </a>
            </div>
                <button type ="submit" class="btn" name="Lsubmit">Login</button> 
                <div class = "login-register">
                    <p>Don't have an account?<a href = "#"
                    class="register-link"> Register</a></p>
                </div>
            </form>
            <?php
        if (isset($_GET["error"])) {
            if($_GET["error"] == "emptyinput"){
                echo "<p> Fill in all fields! </p>";
            } 
            else if($_GET["error"] == "wrongLogin"){
                echo "<p> Incorrect Login information! </p>";
            } 
    }
      ?>
        </div>

        

        <div class="form-box register">
            <h2>Registration</h2>
            <form action="php/register.pp.php" method="post">
                <div class="input-box">
                    <span class="icon"><ion-icon name="people-circle-outline"></ion-icon></span> <!--Full name*/-->
                    <input type="text" id="Fullname" name="name">
                    <label>Full Name</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="people-circle-outline"></ion-icon></span> <!-- Username */-->
                    <input type="text" id="RegUsername" name="uid">
                    <label>Username</label>
            </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span> <!-- email */-->
                    <input type="email" id="regemail" name="email">
                    <label>Email</label>
            </div>
            <div class = "input-box">
                <span class="icon"><ion-icon name="lock-closed"></ion-icon></span> <!-- Password */-->
                <input type="password" id="regpass" name="Usrpwd">
                <label>Password</label>
            </div>
            <div class = "input-box">
                <span class="icon"><ion-icon name="lock-closed"></ion-icon></span> <!-- Confirm Password */-->
                <input type="password" id="comfirmpass" name="Usrpwdrepeat">
                <label>Confirm Password</label>
            </div>
                <div class = "remember-forgot">
                    <label><input type = "checkbox"> I agree to the terms and conditions</label>
                
                </div>
                <button type ="submit" class="btn" name="Rsubmit">Register</button> 
                <div class = "login-register">
                    <p>Already have an account?<a href = "#"
                    class="login-link"> Login</a></p>

                </div>
            </form>
        </div>

        <?php
        if (isset($_GET["error"])) {
            if($_GET["error"] == "emptyinput"){
                echo "<p> Fill in all fields! </p>";
            } 
            else if($_GET["error"] == "InvalidUser"){
                echo "<p> Choose a proper username! </p>";
            } 
            else if($_GET["error"] == "Invalidemail"){
                echo "<p> Choose a proper email! </p>";
            }
            else if($_GET["error"] == "passworddoesntmatch"){
                echo "<p> Password doesnt match! </p>";
            }
            else if($_GET["error"] == "stmtfailed"){
                echo "<p> Something went wrong, try again! </p>";
            }
            else if($_GET["error"] == "usernametaken"){
                echo "<p> Username already taken! </p>";
            }
            else if($_GET["error"] == "none"){
                echo "<p> You have signed up! </p>";
            }
        }
      ?>
      </div>