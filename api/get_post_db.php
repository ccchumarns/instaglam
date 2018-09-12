<?php

// Initialize
include_once('common.php');
$db = new DB();

$id = $_GET['post_id'];

$sql = 'SELECT post.post_id, user.name, post.title, post.img_url, post.price, 
coupon.discount, category.category_name, post.description, post.latitude, 
post.longitude, post.go_sum
FROM `post`
JOIN `user` ON post.user_id = user.user_id
JOIN `category` ON post.category_id = category.category_id
JOIN `coupon` ON post.coupon_id = coupon.coupon_id 
WHERE post.post_id = '.$id;
$dataset = $db->select($sql);

$data = $dataset[0];

$a = [
  'post_id'=> $data['post_id'],
  'category'=> $data['category_name'],
  'title'=> $data['title'],
  'user_name'=> $data['name'],
  'img_url'=> $data['img_url'],
  'description'=> $data['description'],
  'coupon_discount'=> $data['discount'],
  'address'=> 'Japan',
  'go_sum'=> $data['go_sum'],
  'price'=> $data['price'],
  'latitude'=> $data['latitude'],
  'longitude'=> $data['longitude']
];

Response::send($a);