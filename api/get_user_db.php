<?php
// Initialize
include_once('common.php');
$db = new DB();
$user_id = $_COOKIE['user_id'];
// var_dump($_COOKIE);
// echo $user_id;
// user_idが同じ投稿を日付でソートして取得
$sql = 'SELECT user_id, name FROM user WHERE user_id = '.$user_id;
// echo $sql;
$dataset = $db->select($sql);
Response::send($dataset[0]);