<?php

require 'errh.inc.php';
$err_return_path = "../register.php";
$success_return_path = "../index.php";
if(isset($_POST['signup-submit'])){
    
    require 'dbh.inc.php';

    $private_name = $_POST['private_name'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $confirm_pwd = $_POST['confirm_pwd'];
    $fields_empty = empty($private_name) || empty($first_name) || empty($last_name) || empty($email) || empty($pwd) || empty($confirm_pwd);

    $invalid_mail = !filter_var($email, FILTER_VALIDATE_EMAIL);
    $invalid_pname = !preg_match("/^[a-zA-Z0-9]*$/", $private_name);
    $invalid_both = $invalid_mail && $invalid_pname;

    if($fields_empty) do_error("emptyfields");
    else if($invalid_both) do_error("invalidmailpname");
    else if($invalid_mail) do_error("invalidmail");
    else if($invalid_pname) do_error("invalidpname");
    else if($pwd !== $confirm_pwd) do_error("passwordcheck");
    else{
        $sql = "SELECT privateName FROM users WHERE privateName=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)) do_error("sqlerror");
        else{
            mysqli_stmt_bind_param($stmt, "s", $private_name);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if($resultCheck > 0) do_error("pnametaken");
            else{
                $sql = "INSERT INTO users (privateName, firstName, lastName, email, pwd) VALUES (?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)) do_error("sqlerror");
                else{
                    $hashed_pwd = password_hash($pwd, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "sssss", $private_name, $first_name, $last_name, $email, $hashed_pwd);
                    mysqli_stmt_execute($stmt);
                    do_success("signup");
                }
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
}else{
    do_href();
}

