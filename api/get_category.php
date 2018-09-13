<?php

// Initialize
include_once('common.php');
$db = new DB();

$sql = 'SELECT * FROM category';
$dataset = $db->select($sql);

$db_len = count($dataset);

foreach ($dataset as $key => $value){
    $data[] = array(
        'category_id' => $value['category_id'],
        'category_name' => $value['category_name']
    );
}

Response::send($data);