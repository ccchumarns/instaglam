<?php

// Initialize
include_once('common.php');
$db = new DB();

 
$a = [
  'post_id'=> 1,
  'category'=> 'フード',
  'title'=> 'サイゼリヤ',
  'user_name'=> 'test',
  'img_url'=> 'https::imgfp.hotp.jp/IMGH/23/13/P027762313/P027762313_480.jpg',
  'description'=> 'とっても美味しかった',
  'coupon_discount'=> '今なら半額！',
  'address'=> 'Japan',
  'go_sum'=> 200,
  'price'=> 100,
  'latitude'=> 35.360556,
  'longitude'=> 138.727778
];



Response::send($a);