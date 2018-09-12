<?php

// Initialize
include_once('common.php');
$db = new DB();

 
//$db->insert('Insert into memo values (NULL, "ほげ")');
//$memo = $db->select('SELECT id, text FROM memo');
//Response::send($memo);


// kywordのLIKE検索
$sql = 'SELECT id, text FROM memo WHERE text LIKE "%メモ%"';
$memo = $db->select($sql);

Response::send($memo);