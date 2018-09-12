<?php

// Initialize
include_once('common.php');
$db = new DB();

// $post = Param::get('post');
$post = ['2', 
    'イオンシネマ 福島', 
    'https://c-sf.smule.com/sf/s78/arr/97/26/665e9169-decd-4589-b62c-91965c1da3c9.jpg', 
    '1400', 
    '2', 
    '2018-05-04 12:13:40', 
    '地元の映画館より色々こちらのほうが良いので専らイオンシネマ福島を利用しています。', 
    '2', 
    '37.75869', 
    '140.460105', 
    '8', 
    'GeomFromText(\'POINT(140.460105 37.75869)\')'
    ];
    
$postValues[] = "(NULL, '{$post[0]}', '{$post[1]}', '{$post[2]}', '{$post[3]}', '{$post[4]}', '{$post[5]}', '{$post[6]}', '{$post[7]}', '{$post[8]}', '{$post[9]}', '{$post[10]}', {$post[11]})";

$inserted = false;
if ($post !== null) {
    // It's better to use prepared statement for security.
    $sql = "INSERT INTO `post` 
    (`post_id`, `user_id`, `title`, `img_url`, `price`, `coupon_id`, `time`, `description`, `category_id`, `latitude`, `longitude`, `go_sum`, `geometry`) 
    VALUES " .join(",", $postValues);
    $db->insert($sql);
    $db->close();
    $inserted = true;
}

Response::send(['inserted' => $inserted]);
