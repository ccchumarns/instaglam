<?php

// Initialize
include_once('common.php');
$db = new DB();

$user_id = $_GET['user_id'];

// user_idが同じ投稿を日付でソートして取得
$sql = 'SELECT post.post_id, post.img_url, post.price, coupon.coupon_id, 
coupon.coupon_id, category.category_id, post.go_sum, post.time 
FROM post 
JOIN user ON post.user_id = user.user_id 
JOIN category ON post.category_id = category.category_id 
JOIN coupon ON post.coupon_id = coupon.coupon_id
WHERE post.user_id = '.$user_id.' ORDER BY post.time DESC';
$dataset = $db->select($sql);
$db_len = count($dataset);

foreach ($dataset as $key => $value){
    $data[] = array('post_id' => $value['post_id'],
    'category_id' => $value['category_id'],
    'img_url' => $value['img_url'],
    'coupon_id' => $value['coupon_id'],
    'go_sum' => $value['go_sum'],
    'price' => $value['price'],
    'date' => $value['time']);
}

Response::send($data);