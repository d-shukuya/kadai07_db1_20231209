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
    gs_bm_books(id, name, url, content, created_date, update_date)
  VALUES(
    NULL, :name, :url, '', sysdate(), sysdate()
  )");

// 2-2. バインド変数を定義
$stmt->bindValue(':name', $_POST["name"], PDO::PARAM_STR);
$stmt->bindValue(':url', $_POST["url"], PDO::PARAM_STR);

// 2-3. 登録
$status = $stmt->execute();

// 3. 登録後の処理
// 3-1. 失敗時の処理
if ($status == false) {
    $error = $stmt->errorInfo();
    exit('ErrorMessage:' . $error[2]);
}

// 3-2. 成功時の処理
// 3-2-1. ディレクトリの生成
$id12 = str_pad($pdo->lastInsertId(), 12, "0", STR_PAD_LEFT);
echo $id12;
$dir = "./books/" . $id12;
if (!file_exists($dir)) {
    mkdir($dir, 0777, true);
} else {
    echo "Failed to make directory";
}

// 3-2-2. 画像ファイルの保管
if ($_FILES["book_cover_img"]["error"] == UPLOAD_ERR_OK) {
    // 既存のファイルを削除
    $files = glob("$dir/book_cover.*");
    foreach ($files as $file) {
        if (is_file($file)) {
            unlink($file);
        }
    }
    // 新しいファイルを保管
    $tmp_name = $_FILES["book_cover_img"]["tmp_name"];
    $name = basename($_FILES["book_cover_img"]["name"]);
    $extension = pathinfo($name, PATHINFO_EXTENSION);
    $new_name = "book_cover." . $extension;
    move_uploaded_file($tmp_name, "$dir/$new_name");
} else {
    echo "Failed to save img file";
}

// 3-2-3. books/############/index.php ファイルの生成
$file = fopen($dir . "/index.php", "w");
if ($file) {
    fwrite(
        $file,
        "
    <?php\n
        \$currentBookId = \"$id12\";\n
        include(\"../../template/template_index.php\");\n
    ?>
    "
    );
    fclose($file);
} else {
    echo "Failed to open file";
}

// 3-2-4. index.php に遷移
header('Location: ./');
