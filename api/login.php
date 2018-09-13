<?php

//session_start();
//$_SESSION["loginname"] = $_POST["username"];
//$_SESSION["pass"] = $_POST["pass"];

$username = $_GET['username'];
$password = $_GET['password'];

//クッキーの名前
$iCkeName     =    'userID';
//クッキーが有効なサイト上のパス
$sPath =           '/';
//クッキーが有効なドメイン
$sDomain =         '';

// Initialize
include_once('common.php');
$db = new DB();
$sql = 'SELECT user_id, COUNT(*) FROM user WHERE name = "'.$username.'" AND password = "'.$password.'"';
$userSet = $db->select($sql);
$user = $userSet[0];
$num = $user['COUNT(*)'];

if($num == 0){
    // ログイン失敗
    echo "false";
} else {
    // "ログイン成功"
    
    //クッキーがない場合セットする
    if(!isset($_COOKIE['userID'])){
        //クッキーの値
        $sCkeValue     =   $user['user_id'];
        //有効期限は7日間
        $iCkeTimeOut  =    0;
        //クッキーセット
        setcookie($iCkeName, $sCkeValue, $iCkeTimeOut, $sPath, $sDomain);
    }
    
    echo $_COOKIE['userID'];
}

// if(isset($_POST["username"])) setcookie("username", $_POST["username"], time()+120);
