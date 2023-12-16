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
    UPDATE
        gs_bm_books
    SET
        content = :book_memo
    WHERE
        id = :id
    )");

// 2-2. バインド変数を定義
$stmt->bindValue(':book_memo', $_POST["book_memo"], PDO::PARAM_STR);
$stmt->bindValue(':id', $_POST["book_id"], PDO::PARAM_INT);

// 2-3. 登録
$status = $stmt->execute();

// 3. 登録後の処理
// 3-1. 失敗時の処理
if ($status == false) {
    $error = $stmt->errorInfo();
    exit('ErrorMessage:' . $error[2]);
}

// 3-2. 成功時の処理
$id12 = str_pad($_POST["book_id"], 12, "0", STR_PAD_LEFT);
header("Location: ../books/$id12/");
