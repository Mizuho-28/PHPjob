<?php
// db_connect.phpの読み込みFILL_IN
require_once("db_connect.php");
// POSTで送られていれば処理実行 送りたい場所のname属性を入れる
if (isset($_POST["signUp"])) {
    // ユーザー名が未入力の場合 name属性を入れる
    if (empty($_POST['name'])) {
        echo 'ユーザー名が未入力です。';
    // パスワードが未入力の場合
    } 
    if (empty($_POST['password'])) {
        echo 'パスワードが未入力です。';
    }

    // データとして入るユーザー名、パスワードがあるか確認
    if (!empty($_POST['name']) && !empty($_POST['password'])) {
        // どちらもあった場合のみ変数に代入

        $name = htmlspecialchars($_POST['name'],ENT_QUOTES);
        $password = htmlspecialchars($_POST['password'],ENT_QUOTES);
   

// nameとpassword両方送られてきたら処理実行 ★送られたデータをデータベースに保存？
// PDOのインスタンスを取得FILL_IN
$pdo = db_connect();
try {
  // SQL文の準備 FILL_IN
  $sql = "INSERT INTO users (name, password) VALUES (:name, :password)";
  // パスワードをハッシュ化
  $password_hash = password_hash($password, PASSWORD_DEFAULT);
    // プリペアドステートメントの作成 FILL_IN 
    $stmt = $pdo->prepare($sql);
  // :passwordにバインドする場合は、$password_hashを使用する
  $stmt->bindParam(':password', $password_hash);

  
  // 値をセット FILL_IN
  $stmt->bindParam(':name', $name);


  // 実行 FILL_IN
  $stmt->execute();
    echo '登録が完了しました';
  // 登録完了メッセージ出力
  }catch (PDOException $e) {
  // エラーメッセージの出力 FILL_IN 
  echo 'Error :' . $e->getMessage();
  // 終了 FILL_IN
  die();
  }
} }
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
    <h1>新規登録</h1>
    <form method="POST" action="">
        user:<br>
        <input type="text" name="name" id="name">
        <br>
        password:<br>
        <input type="password" name="password" id="password"><br>
        <input type="submit" value="submit" id="signUp" name="signUp">
    </form>
</body>
</html>