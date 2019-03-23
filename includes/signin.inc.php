<?php

require 'errh.inc.php';
$err_return_path = "../index.php";
$success_return_path = "../MainMenu.php";
if(isset($_POST['signin-submit'])){
    require 'dbh.inc.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $fields_empty = empty($username) || empty($password);

    if($fields_empty) do_error("emptyfields");
    else {
        $sql = "SELECT * FROM users WHERE privateName=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)) do_error("sqlerror");
        else{
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)){
                $pwdCheck = password_verify($password, $row['pwd']);
                if($pwdCheck){
                    session_start();
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['pName'] = $row['privateName'];
                    header("Location: $success_return_path");
                }else{
                    do_error("wrongpwd");
                }
            }else do_error("wrongpwd");
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
}else{
    do_href();
}