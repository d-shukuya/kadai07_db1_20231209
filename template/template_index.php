<?php
// 1. funcs.php を呼び出す
include("../../funcs.php");

// 2. DB接続
try {
    $pdo_books = new PDO('mysql:dbname=gs_bm_db;charset=utf8;host=localhost', 'root', '');
} catch (PDOException $e) {
    exit('DBConnectError:' . $e->getMessage());
}

try {
    $pdo_dog_ear = new PDO('mysql:dbname=gs_bm_db;charset=utf8;host=localhost', 'root', '');
} catch (PDOException $e) {
    exit('DBConnectError:' . $e->getMessage());
}

// 3. データ取得
$stmt_books = $pdo_books->prepare(
    "SELECT * FROM gs_bm_books WHERE id = " . $currentBookId
);
$status_books = $stmt_books->execute();

$stmt_dog_ear = $pdo_dog_ear->prepare(
    "SELECT * FROM gs_bm_dog_ear WHERE book_id = " . $currentBookId . " ORDER BY page_number ASC"
);
$status_dog_ear = $stmt_dog_ear->execute();

// 4. データ表示
$bookMemo = "";
$createdDateBooks = "";
$updateDateBooks = "";
if ($status_books == false) {
    $error = $stmt_books->errorInfo();
    exit("ErrorQuery:" . $error[2]);
} else {
    while ($resultBooks = $stmt_books->fetch(PDO::FETCH_ASSOC)) {
        $bookMemo = $resultBooks['content'];
        $createdDateBooks = $resultBooks['created_date'];
        $updateDateBooks = $resultBooks['update_date'];
    }
}

$files = glob('./book_cover.*');
$img_path = (count($files) > 0) ? $files[0] : '../sample_cover.png';

$view = "";
if ($status_dog_ear == false) {
    $error = $stmt_dog_ear->errorInfo();
    exit("ErrorQuery:" . $error[2]);
} else {
    while ($result = $stmt_dog_ear->fetch(PDO::FETCH_ASSOC)) {
        $id12 = str_pad($result['id'], 12, "0", STR_PAD_LEFT);
        $createdDate = substr($result['created_date'], 0, 10);
        $updateDate = substr($result['update_date'], 0, 10);

        $view .= "<li class='dog_ear_item'>";
        $view .=    "<div class='left_block'>";
        $view .=        "<div class='input_fmt'>";
        $view .=            "<label>ページ：</label>";
        $view .=            "<input type='text' name='page_number' value='" . h($result['page_number']) . "'>";
        $view .=        "</div>";
        $view .=        "<div class='input_fmt'>";
        $view .=            "<label>行：</label>";
        $view .=            "<input type='text' name='line_number' value='" . h($result['line_number']) . "'>";
        $view .=        "</div>";
        $view .=        "<div class='dog_ear_date_info'>";
        $view .=            "<p>登録日： " . h($createdDate) . "</p>";
        $view .=            "<p>更新日： " . h($updateDate) . "</p>";
        $view .=        "</div>";
        $view .=    "</div>";
        $view .=    "<div class='dog_ear_memo_box'>";
        $view .=        "<label>メモ：</label>";
        $view .=        "<textarea name='dog_ear_memo'>" . h($result['content']) . "</textarea>";
        $view .=    "</div>";
        $view .=    "<div class='delete_dog_ear' data-dog_ear_id='" . h($id12) . "'>削除</div>";
        $view .= "</li>";
    }
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>テスト1</title>
    <link rel="stylesheet" href="../../css/reset.css">
    <link rel="stylesheet" href="../../css/style_dog_ear.css">
</head>

<body>
    <header>
        <h1>書籍名</h1>
        <div id="book_cover_box"><img src="<?= h($img_path) ?>" alt=""></div>
        <a href=>外部リンク</a>
        <h2>書籍のメモ</h2>
        <textarea id="book_memo" name="book_memo" data-book_id=<?= h($currentBookId) ?>><?= h($bookMemo) ?></textarea>
        <div id='book_date_info'>
            <p>登録日： <?= h($createdDate) ?></p>
            <p>更新日： <?= h($updateDate) ?></p>
        </div>
    </header>

    <nav>
        <form action="../insert_dog_ear.php" method="post">
            <fieldset>
                <input type="hidden" name="book_id" value=<?= h($currentBookId) ?>></input>
                <input id="add_dog_ear_btn" type="submit" value="ドッグイヤー追加">
            </fieldset>
        </form>
    </nav>

    <main>
        <ul id="dog_ear_list"><?= $view ?></ul>
    </main>

    <!-- JSの読み込み -->
    <script src="../../js/jquery-2.1.3.min.js"></script>
    <script src="../../js/script_dog_ear.js"></script>
</body>

</html>