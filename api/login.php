<?php

//session_start();
//$_SESSION["loginname"] = $_POST["username"];
//$_SESSION["pass"] = $_POST["pass"];

$username = $_GET['username'];
$password = $_GET['password'];

// Initialize
include_once('common.php');
$db = new DB();
$sql = 'SELECT COUNT(*) FROM user WHERE name = "'.$username.'" AND password = "'.$password.'"';
$countset = $db->select($sql);
$count = $countset[0];
$num = $count['COUNT(*)'];

if($num == 0){
    // ログイン失敗
    echo "false";
} else {
    // "ログイン成功"
    echo "true";
}

// if(isset($_POST["username"])) setcookie("username", $_POST["username"], time()+120);
