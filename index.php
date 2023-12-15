<?php
// 1. funcs.php を呼び出す
include("./funcs.php");

// 2. DB接続
try {
    $pdo = new PDO('mysql:dbname=gs_bm_db;charset=utf8;host=localhost', 'root', '');
} catch (PDOException $e) {
    exit('DBConnectError:' . $e->getMessage());
}

// 3. データ取得
$stmt = $pdo->prepare("
    SELECT * FROM gs_bm_books
");
$status = $stmt->execute();

// 4. データ表示
$view = "";
if ($status == false) {
    $error = $stmt->errorInfo();
    exit("ErrorQuery:" . $error[2]);
} else {
    $i = 1;
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {

        // echo "<pre>";
        // var_dump($result);
        // echo "</pre>";

        $view .= "<li class='book_item' data-book_id='" . h(str_pad($result['id'], 12, "0", STR_PAD_LEFT)) . "'>";
        $view .= "<h3>" . $i . "</h3>";
        $view .=
            "書籍名：" . h($result['name']) . "<br>"
            . "リンク：" . "<a href='" . h($result['url']) . "'>" . h($result['url']) . "</a><br>"
            . "登録日：" . h($result['created_date']);
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
    <title>DogEarApp</title>
</head>

<body>
    <header>
        <h1>DogEarApp</h1>
    </header>

    <nav>
        <form action="./insert_book.php" method="post">
            <div>
                <fieldset>
                    <legend>書籍の登録</legend>
                    <label>書籍名：<input type="text" name="name"></label>
                    <label>リンク：<input type="text" name="url"></label>
                    <!-- <label><textArea name="content" rows="4" cols="40"></textArea></label><br> -->
                    <input type="submit" value="登録">
                </fieldset>
            </div>
        </form>
    </nav>

    <main>
        <ul id="book_list">
            <?= $view ?>
        </ul>
    </main>

    <!-- JSの読み込み -->
    <script src="./js/jquery-2.1.3.min.js"></script>
    <script src="./js/script_book.js"></script>
</body>

</html>