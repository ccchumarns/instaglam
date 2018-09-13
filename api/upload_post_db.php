<?php

if(empty($_POST['title']) || empty($_FILES['upload_file']['size']) || empty($_POST['description']) || empty($_POST['category_id'])){
    $url = '/instaglam/post_screen.html';
    header('Location: '.$url.'?lat='.$_POST['lat'].'&lon='.$_POST['lon'].'&error=1');
} else {
    //HTMLから画像の受け取り
    $file = $_FILES['upload_file'];
    //一字ファイルができているか（アップロードされているか）チェック
    if(is_uploaded_file($_FILES['upload_file']['tmp_name'])){
        
        //ファイル名を変更
        $newfilename = $_COOKIE['user_id']."-".date("YmdHis")."-".$_FILES['upload_file']['name'];
        $filePath = '/instaglam/img/photo/'.$newfilename;
    
        //一字ファイルを保存ファイルにコピーできたか
        if(move_uploaded_file($_FILES['upload_file']['tmp_name'],"/home/ec2-user/environment".$filePath)){
    
    
        }else{
    
            //コピーに失敗（だいたい、ディレクトリがないか、パーミッションエラー）
            echo "error while saving.";
        }
    
    }else{
    
        //そもそもファイルが来ていない。
        echo "file not uploaded.";
    
    }
    
    $geometry = 'GeomFromText(\'POINT('.$_POST['lon'].' '.$_POST['lat'].')\')';
    
    $coupon_id = rand ( 1 , 6 );
    
    // Initialize
    include_once('common.php');
    $db = new DB();
    
    // It's better to use prepared statement for security.
    $sql = 'INSERT INTO `post` 
            (`user_id`, `title`, `img_url`, `price`, `coupon_id`, `description`, `category_id`, `latitude`, `longitude`, `go_sum`, `geometry`) 
            VALUES ('
            .$_COOKIE['user_id'].
            ', "'
            .$_POST['title'].
            '", "'
            .$filePath.
            '", '
            .$_POST['price'].
            ', '
            .$coupon_id.
            ', "'
            .$_POST['description'].
            '", '
            .$_POST['category_id'].
            ', '
            .$_POST['lat'].
            ', '
            .$_POST['lon'].
            ', 0, '
            .$geometry.
            ')';
            
    $db->insert($sql);
    $db->close();
    
    $url = 'https://ccchumarns.github.io/instaglam/';
    header('Location: '.$url);
}
