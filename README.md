# instaglam
fake instaglam

## api
* http://~/api/get_image_db.php?user_post={位置情報（緯度/経度}  
指定されたuser_postの投稿データ群をjson形式で返す  

* http://~/api/get_food_image_db.php?user_post={位置情報（緯度/経度}  
指定されたuser_postのcategory_id=1(フード）の投稿データ群をjson形式で返す  

* http://~/api/get_leisure_image_db.php?user_post={位置情報（緯度/経度}  
指定されたuser_postのcategory_id=2(レジャー）の投稿データ群をjson形式で返す

* http://~/api/get_myimage_db.php?user_id={ログインユーザーのID}  
指定されたuser_idの投稿データ群をjson形式で返す  

* http://~/api/get_post_db.php?post_id={表示する投稿のID}  
指定されたpost_idの投稿データをjson形式で返す  

* http://~/api/update_go_sum_db.php?post_id={go_sumをカウントアップする投稿のID}&url={マップのURL}  
アクセスされたら投稿のgo_sumをカウントアップしマップにリダイレクトする  

* http://~/api/update_post_db.php?lat={緯度}&lon={経度}  
アクセスされたら投稿のgo_sumをカウントアップしマップにリダイレクトする  

* http://~/api/login.php?username={ユーザーネーム}&password={パスワード}  
ユーザーネームとパスワードを受け取りDBにアカウントがあればTrueを返す（なければFalse）  
