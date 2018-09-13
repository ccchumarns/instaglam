<?php

if(isset($_COOKIE['userID'])){
    echo $_COOKIE['userID'];
} else {
    echo 'ログインしてないよ';
}