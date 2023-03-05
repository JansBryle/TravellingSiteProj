<?php

function emptyInputSignup($name, $uid, $email, $Usrpwd, $Usrpwdrepeat){

    $result;
    if (empty($name) || empty($uid) || empty($email) || empty($Usrpwd) || empty($Usrpwdrepeat)) { //function nga ag check nu empty jy inputs

        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function InvalidUser($uid) {

    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $uid)) { //check na nu usto lng jy username
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function InvalidEmail($email) {
    $result;

    if (!filter_var($email, FILTER_VALIDATE_EMAIL )) { //check na nu usto lng jy username
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function Pwdmatch($Usrpwd, $Usrpwdrepeat) {
    $result;

    if ($Usrpwd !== $Usrpwdrepeat) { //check na nu usto lng jy username
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function UserExists($conn, $uid, $email) { //check na nu adan ti same nga user or email

    $sql = "SELECT * FROM register WHERE Usruid = ? OR email =?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../index.php?error=istmtfailed1");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $uid, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
 
    }else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);

}

function createUser($conn, $name, $uid, $email, $Usrpwd){ //check na nu adan ti same nga user or email
    $sql = "INSERT INTO register (Usrname ,Usruid, email, Usrpwd) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../index.php?error=istmtfailed2");
        exit();
    }

    $hashedpwd = password_hash($Usrpwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $name, $uid, $email, $hashedpwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../index.php?error=none");
    exit();

}

function emptyInputLogin($uid, $Usrpwd) {
    $result;
    if (empty($uid) || empty($Usrpwd)) { //function nga ag check nu empty jy inputs
        
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function loginUser($conn, $uid, $Usrpwd) {
    $UserExists = UserExists($conn, $uid, $uid);

    if ($UserExists === false) {
        header("location: ../index.php?error=wrongLogin");
        exit();
    }

    $pwdHashed = $UserExists["Usrpwd"];
    $checkPass = password_verify($Usrpwd, $pwdHashed);

    if ($checkPass === false){
        header("location: ../index.php?error=wrongLogin");
        exit();
    }
    else if ($checkPass === true) {
        session_start();
        $_SESSION["id"] = $UserExists["id"];
        $_SESSION["Usruid"] = $UserExists["Usruid"];
        header("location: ../index.php");
        exit();
    }
}