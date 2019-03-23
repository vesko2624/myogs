<?php
$err_return_path = $success_return_path = "../index.php";
function do_error($message, ...$params){
    global $err_return_path;
    header("Location: $err_return_path?error=$message");
    exit();
}
function do_success($message, ...$params){
    global $success_return_path;
    header("Location: $success_return_path?$message=success");
    exit();
}
function do_href(){
    global $err_return_path;
    header("Location: $err_return_path");
    exit();
}