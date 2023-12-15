<?php
// 0. 変数定義
$currentBookId = "000000000001";

// 1. funcs.php を呼び出す
include("../../funcs.php");

// 2. DB接続
try {
    $pdo = new PDO('mysql:dbname=gs_bm_db;charset=utf8;host=localhost', 'root', '');
} catch (PDOException $e) {
    exit('DBConnectError:' . $e->getMessage());
}

// 3. データ取得
$stmt = $pdo->prepare(
    "SELECT * FROM gs_bm_dog_ear WHERE book_id = " . $currentBookId . " ORDER BY page_number ASC"
);
$status = $stmt->execute();

// 4. データ表示
$view = "";
if ($status == false) {
    $error = $stmt->errorInfo();
    exit("ErrorQuery:" . $error[2]);
} else {
    $i = 1;
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .= "<li class='dog_ear_item' data-dog_ear_id='" . h(str_pad($result['id'], 12, "0", STR_PAD_LEFT)) . "'>";
        $view .= "<h3>" . $i . "</h3>";
        $view .=
            "ページ：" . h($result['page_number']) . "<br>"
            . "行：" . h($result['line_number']) . "<br>"
            . "メモ：<textArea name='content' rows='4' cols='40'>" . h($result['content']) . "</textArea><br>"
            . "<label>登録日：<p>" . h($result['created_date']) . "</p></label>"
            . "<label>更新日：<p>" . h($result['update_date']) . "</p></label>";
        $view .= "</li>";

        $i++;
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
        <img src="./book_cover.jpg" alt="">
        <a href=>リンク</a>
        <textarea name="book_memo" id="book_memo" cols="30" rows="10"></textarea>
        <label>登録日：<p></p></label>
        <label>更新日：<p></p></label>
    </header>

    <nav>
        <form action="../insert_dog_ear.php" method="post">
            <div>
                <fieldset>
                    <legend>ドッグイヤーの登録</legend>
                    <label>ページ：<input type="text" name="page_num"></label><br>
                    <label>行：<input type="text" name="line_num"></label><br>
                    <label>メモ：<textArea name="content" rows="4" cols="40"></textArea></label><br>
                    <input type="hidden" name="book_id" value=<?= h($currentBookId) ?>></input>
                    <input type="submit" value="登録">
                </fieldset>
            </div>
        </form>
    </nav>

    <main>
        <ul id="dog_ear_list">
            <?= $view ?>
        </ul>
    </main>

    <!-- JSの読み込み -->
    <script src="../../js/jquery-2.1.3.min.js"></script>
    <script src="../../js/script_dog_ear.js"></script>
</body>

</html>