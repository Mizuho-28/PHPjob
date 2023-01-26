<?php
// DBの接続情報を記述したファイルを読み込む
require_once('db_connect.php');
// 関数をまとめたファイルを読み込む
require_once('function.php');

// ログインチェック関数実行
check_user_logged_in();
// PDOのインスタンスを取得 データベースに接続
$pdo = db_connect();

try {
    // booksの全レコードを、id降順で取得するクエリを設定
    $sql = "SELECT * FROM books ORDER BY id DESC ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
} catch (PDOException $e) {
    echo 'Error :' . $e->getMessage();
    die();
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>在庫一覧画面</title>
</head>
<body>
    <h2>在庫一覧画面</h2>
    <div >
        <button class="new" onclick="location.href='create_book.php'" style="background-color:rgba(7, 41, 235, 0.844); border-radius: 2px;border:none; color:white; font-size:12px;padding:5px;">新規登録</button>
        <button class="btn2" onclick="location.href='logout.php'" style=" font-size:12px;padding:5px;border-radius: 2px;border:none; color:white;background-color:grey ">ログアウト</button><br>
    </div>
        <table class="table">
            <tr class="list_title">
                <th>タイトル</th>
                <th>発売日</th>
                <th>在庫数</th>
                <th> </th>
            </tr><br>

            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td><?php echo $row['stock']; ?></td>
                    <td><button class="btn3"><a href="delete_post.php?id=<?php echo $row['id'] ?>">削除</a></button></td>
                </tr>
            <?php } ?>
        </table>
</body>
</html>