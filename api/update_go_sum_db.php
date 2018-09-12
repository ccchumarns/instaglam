<?php

$id = $_GET['post_id'];

include_once('common.php');
$db = new DB();
$sql = 'UPDATE post SET go_sum = go_sum + 1 WHERE post_id = '.$id;
$db->update($sql);
$db->close();

$url = $_GET['url'];
if( isset($url) ){
    header('Location: '.$url);
    exit();
}
