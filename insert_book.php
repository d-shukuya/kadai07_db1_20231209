<?php
// 1. DB接続
try {
    $pdo = new PDO('mysql:dbname=gs_bm_db;charset=utf8;host=localhost', 'root', '');
} catch (PDOException $e) {
    exit('DBConnectError:' . $e->getMessage());
}

// 2．データ登録
// 2-1. SQL文
$stmt = $pdo->prepare("
  INSERT INTO
    gs_bm_books(id, name, url, content, cover_img_name, created_date, update_date)
  VALUES(
    NULL, :name, :url, :content, NULL, sysdate(), sysdate()
  )");

// 2-2. バインド変数を定義
$stmt->bindValue(':name', $_POST["name"], PDO::PARAM_STR);
$stmt->bindValue(':url', $_POST["url"], PDO::PARAM_STR);
$stmt->bindValue(':content', $_POST["content"], PDO::PARAM_STR);

// 2-3. 登録
$status = $stmt->execute();

// 3. 登録後の処理
if ($status == false) {
    $error = $stmt->errorInfo();
    exit('ErrorMessage:' . $error[2]);
} else {
    header('Location: ./index.php');
}
