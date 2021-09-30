<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
    <title>LoM 会員登録</title>

    <link rel="icon" href="">
    <link rel="stylesheet" href="css/post.css">
    <link rel="stylesheet" href="css/reset.css">

</head>
<body>

<?php

// DB接続格納
include("funcs.php");

$shop_name = $_POST['shop_name'];
$shop_category = $_POST['shop_category'];
$prefecture = $_POST['prefecture'];
$address = $_POST['address'];
$item = $_POST['item'];
$info = $_POST['info'];
$holiday = $_POST['holiday'];
$insta = $_POST['insta'];
$tw = $_POST['tw'];
$img = $_POST['img'];

// 登録日
date_default_timezone_set('Asia/Tokyo');
$date = date("Y/m/d");

// echo $date;
// echo $shop_name;
// echo $holiday;


// DB接続はfunc
//３．データ登録SQL作成
// 1. SQL文を用意
$stmt = $pdo->prepare("INSERT INTO gs_bm_table(id, shop_name, prefecture, address, shop_category, item, info, holiday, insta, tw, img, indate)
                                         VALUES(NULL, :shop_name, :prefecture, :address, :shop_category, :item, :info, :holiday, :insta, :tw, :img, sysdate())");




// $stmt = $pdo->prepare("INSERT INTO gs_bm_table(id, name, email, content, date)
//                                         VALUES(NULL, :name, :email, :content, sysdate())");

// RAND()*1000000
//  2. バインド変数を用意
$stmt->bindValue(':shop_name', $shop_name, PDO::PARAM_STR);
$stmt->bindValue(':prefecture', $prefecture, PDO::PARAM_STR);
$stmt->bindValue(':address', $address, PDO::PARAM_STR);
$stmt->bindValue(':shop_category', $shop_category, PDO::PARAM_STR);
$stmt->bindValue(':item', $item, PDO::PARAM_STR);
$stmt->bindValue(':info', $info, PDO::PARAM_STR);
$stmt->bindValue(':holiday', $holiday, PDO::PARAM_STR);
$stmt->bindValue(':insta', $insta, PDO::PARAM_STR);
$stmt->bindValue(':tw', $tw, PDO::PARAM_STR);
$stmt->bindValue(':img', $img, PDO::PARAM_STR);

//  3. 実行
$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("ErrorMessage:" . $error[2]);
} 



?>


<div id="wapper">

<p id="title">下記内容で登録いたしました。</p>

<!-- <form method="POST" action="kakunin.php"> -->

<!-- imgもセット -->
    <div class="flex">
        <p>お名前 :</p><p class=input ><?= h($shop_name); ?></p>
    </div >
    <div class="flex">
        <p>住所 :</p><p class=input ><?= h($prefecture). h($address); ?></p>
    </div>
    <div class="flex">
        <p>店舗形態 :</p><p class=input ><?= h($shop_category); ?></p>
    </div>
    <div class="flex">
        <p>取扱商品 :</p><p class=input ><?= h($item); ?></p>
    </div>
    <div class="flex">
        <p>店舗情報 :</p><p class=input ><?= h($info); ?></p>
    </div>
    <div class="flex">
        <p>定休日 :</p><p class=input ><?= h($holiday); ?></p>
    </div>
    <div class="flex">
        <p>instagram :</p><p class=input ><?= h($insta); ?></p>
    </div>
    <div class="flex">
        <p>Twitter :</p><p class=input ><?= h($tw); ?></p>
    </div>
   
    <div class="flex2">
        <div><input type="submit" value="TOP" class="button" name="sarch" onclick="location.href='index.php'"></div>
        
    </div>

<!-- </form> -->
</div>
    



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>