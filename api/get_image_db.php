<?php

// Initialize
include_once('common.php');
$db = new DB();

$user_post = $_GET['user_post'];
$category_id = $_GET['category_id'];

if(isset($category_id) && is_numeric($category_id)){
    $sql = 'SELECT post.post_id, post.img_url, post.price, coupon.coupon_id, 
    coupon.coupon_id, category.category_id, post.go_sum, 
    GLength(GeomFromText(CONCAT("LineString('.$user_post.', " ,X(post.geometry), " ", Y(post.geometry), ")" ) )) AS distance 
    FROM post 
    JOIN user ON post.user_id = user.user_id 
    JOIN category ON post.category_id = category.category_id 
    JOIN coupon ON post.coupon_id = coupon.coupon_id 
    WHERE post.category_id = '.$category_id.' AND GLength(GeomFromText(CONCAT("LineString('.$user_post.', " ,X(post.geometry), " ", Y(post.geometry), ")" ) )) <= 0.5
    ORDER BY post.go_sum DESC';
    $dataset = $db->select($sql);
    $db_len = count($dataset);
    
    foreach ($dataset as $key => $value){
        $data[] = array('post_id' => $value['post_id'],
        'category_id' => $value['category_id'],
        'img_url' => $value['img_url'],
        'coupon_id' => $value['coupon_id'],
        'go_sum' => $value['go_sum'],
        'price' => $value['price']);
    }
    
    Response::send($data);
} else {
    $sql = 'SELECT post.post_id, post.img_url, post.price, coupon.coupon_id, 
    coupon.coupon_id, category.category_id, post.go_sum, 
    GLength(GeomFromText(CONCAT("LineString('.$user_post.', " ,X(post.geometry), " ", Y(post.geometry), ")" ) )) AS distance 
    FROM post 
    JOIN user ON post.user_id = user.user_id 
    JOIN category ON post.category_id = category.category_id 
    JOIN coupon ON post.coupon_id = coupon.coupon_id 
    WHERE GLength(GeomFromText(CONCAT("LineString('.$user_post.', " ,X(post.geometry), " ", Y(post.geometry), ")" ) )) <= 0.5
    ORDER BY post.go_sum DESC';
    $dataset = $db->select($sql);
    $db_len = count($dataset);
    
    foreach ($dataset as $key => $value){
        $data[] = array('post_id' => $value['post_id'],
        'category_id' => $value['category_id'],
        'img_url' => $value['img_url'],
        'coupon_id' => $value['coupon_id'],
        'go_sum' => $value['go_sum'],
        'price' => $value['price']);
    }
    
    Response::send($data);
}
