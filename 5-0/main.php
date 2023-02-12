<?php
// セッション開始
session_start();
// セッションにuser_nameの値がなければlogin.phpにリダイレクト
if (empty($_SESSION["user_name"])) {
    header("Location: login.php");
    exit;
}

require_once("db_connect.php");
$pdo = db_connect(); //データベースとの接続完了
try {
    // SQL文の準備 FILL_IN
    $sql = "SELECT * FROM posts ORDER BY id DESC"; 
    
      // プリペアドステートメントの作成 FILL_IN 
      $stmt = $pdo->prepare($sql);
  
    // 実行 FILL_IN
    $stmt->execute();
    // 登録完了メッセージ出力
    }catch (PDOException $e) {
    // エラーメッセージの出力 FILL_IN 
    echo 'Error :' . $e->getMessage();
    // 終了 FILL_IN
    die();
    }

?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>メイン</title>
</head>
<body>
    <h1>メインページ</h1>
    <p>ようこそ<?php echo $_SESSION["user_name"]; ?>さん</p>
    <a href="logout.php">ログアウト</a>
    <table class="table">
            <tr class="list_title">
                <th>記事ID</th>
                <th>タイトル</th>
                <th>本文</th>
                <th>投稿日</th>
            </tr><br>

            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['content']; ?></td>
                    <td><?php echo $row['time']; ?></td>
                </tr>
            <?php } ?>
        </table>
</body>
</html>