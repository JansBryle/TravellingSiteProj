<?php

if (isset($_POST["Lsubmit"])){

    $uid= $_POST["uid"];
    $Usrpwd = $_POST["Usrpwd"];

    require_once 'dbhandler.php';
    require_once 'functions.pp.php';
    
    if (emptyInputLogin($uid, $Usrpwd) !== false){ //check na nu empty jy form
        header("location: ../index.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $uid, $Usrpwd);
}
else {
    header("location: ../index.php?error=nones");
    exit();
}