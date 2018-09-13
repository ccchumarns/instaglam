<?php

//クッキーの名前
$iCkeName     =    'user_id';
//クッキーが有効なサイト上のパス
$sPath =           '/';
//クッキーが有効なドメイン
$sDomain =         '';

//クッキーの削除
if(isset($_COOKIE['user_id'])){
    //クッキーの値 空に設定
    $sCkeValue = '';
    //有効期限は7日間
    $iCkeTimeOut  = time()-1800;
    //クッキー削除 時間を-にすると削除できる
    setcookie($iCkeName, $sCkeValue, $iCkeTimeOut, $sPath, $sDomain);
    //削除後このページにジャンプ クッキーが削除後の状態になる
    // header('Location: https://d59e4bb1248746c2bb74c27542e9b238.vfs.cloud9.ap-southeast-1.amazonaws.com/instaglam/list_screen.html');
    
    $url = 'https://ccchumarns.github.io/instaglam/';
    header('Location: '.$url);
} else {
    $url = '/instaglam/login_screen.html';
    header('Location: '.$url.'?lat='.$_GET['lat'].'&lon='.$_GET['lon']);
}
