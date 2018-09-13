<?php

$user_name = $_POST['user_name'];
$password = $_POST['password'];

$lat = $_GET['lat'];
$lon = $_GET['lon'];

//クッキーの名前
$iCkeName     =    'user_id';
//クッキーが有効なサイト上のパス
$sPath =           '/';
//クッキーが有効なドメイン
$sDomain =         '';

// Initialize
include_once('common.php');
$db = new DB();
$sql = 'SELECT user_id, COUNT(*) FROM user WHERE name = "'.$user_name.'" AND password = "'.$password.'"';
$userSet = $db->select($sql);
$user = $userSet[0];
$num = $user['COUNT(*)'];

if($num == 0){
    // ログイン失敗
    $url = '/instaglam/login_screen.html';
    header('Location: '.$url.'?lat='.$lat.'&lon='.$lon.'&error=1');
} else {
    // "ログイン成功"
    //クッキーがない場合セットする
    if(!isset($_COOKIE['user_id'])){
        //クッキーの値
        $sCkeValue     =   $user['user_id'];
        //有効期限は7日間
        $iCkeTimeOut  =    0;
        //クッキーセット
        setcookie($iCkeName, $sCkeValue, $iCkeTimeOut, $sPath, $sDomain);
    }
    
    $url = '/instaglam/my_screen.html';
    header('Location: '.$url.'?lat='.$lat.'&lon='.$lon);
}

