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


<?PHP

// ini_set("display_errors", 1);
// error_reporting(E_ALL);

// DB接続格納済
include("funcs.php");

$shop_category = $_POST['shop_category'];
$prefecture = $_POST['prefecture'];

echo $shop_category ;

//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table ");
$status = $stmt->execute();

// WHERE prefecture = $prefecture →絞り込んで検索させたい→エラー
// WHERE prefecture IN(".$prefecture.") →エラー
// WHERE (prefecture , shop_name)in($prefecture,$shop_name)→複数検索→エラー

//３．データ表示
$view = ""; 
if ($status == false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("ErrorQuery:" . $error[2]);
} else {
    //Selectデータの数だけ自動でループしてくれる
    //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
  

        // $view .= "<div class='sarch_flex'>";
        // $view .= "<img src='img/kari.jpeg' alt='shop' class='img'>";
        $view .= "<span class='s'>" ;
        $view .= h($result['shop_name']);
        $view .= "</span>";
        // $view .= "<span class='s'>" ; 複数行にすると500エラー
        // $view .= h(h($result['prefecture']);
        // $view .= "</span>";

        // $view .= "</div>";

        // cssがきいてない。なぜだ？？
    }
}

?>


<div class="sarch">

<?php echo $view ?>

</div>






    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>