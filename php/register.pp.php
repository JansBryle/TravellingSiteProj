<?php

if (isset($_POST["Rsubmit"])){
    $name = $_POST["name"];
    $uid = $_POST["uid"];
    $email = $_POST["email"];
    $Usrpwd = $_POST["Usrpwd"];
    $Usrpwdrepeat = $_POST["Usrpwdrepeat"];

    require_once 'dbhandler.php';
    require_once 'functions.pp.php';
   
    if(emptyInputSignup($name, $uid, $email, $Usrpwd, $Usrpwdrepeat) !== false){ //check na nu empty jy form
        header("location: ../index.php?error=emptyinput");
        exit();
    }
    if(InvalidUser($uid) !== false){ //check na nu invalid jy user
        header("location: ../index.php?error=invaidUser");
        exit();
    }
    if(InvalidEmail($email) !== false){ //check na nu awn @ na jy email
        header("location: ../index.php?error=invalidemail");
        exit();
    }
    if(Pwdmatch($Usrpwd, $Usrpwdrepeat) !== false){ //check na nu ag match jy pass
        header("location: ../index.php?error=passworddoesntmatch");
        exit();
    }
    if(UserExists($conn, $uid, $email) !== false){ //check na nu exisitng jy user
        header("location: ../index.php?error=usernametaken");
        exit();
    }

    createUser($conn, $name, $uid, $email, $Usrpwd);
    

} else {
    header("location: ../index.php");
}