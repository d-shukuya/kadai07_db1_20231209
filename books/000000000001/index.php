<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>書籍詳細</title>
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
                    <label>：<input type="text" name="name"></label>
                    <label>リンク：<input type="text" name="url"></label>
                    <!-- <label><textArea name="content" rows="4" cols="40"></textArea></label><br> -->
                    <input type="submit" value="登録">
                </fieldset>
            </div>
        </form>
    </nav>

    書籍詳細
</body>

</html>