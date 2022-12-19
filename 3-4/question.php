<link rel="stylesheet" href="css/style.css">
<?php
//POST送信で送られてきた名前を受け取って変数を作成
$text = $_POST['text'];
//①画像を参考に問題文の選択肢の配列を作成してください。

//★② ①で作成した、配列から正解の選択肢の変数を作成してください
$ports_correct = 80;
$languages_correct = "HTML";
$commands_correct = "select";
?>

<form action="answer.php" method="post">
  <p>お疲れ様です<?php echo $text;?><!--POST通信で送られてきた名前を出力-->さん</p>
  <!--フォームの作成 通信はPOST通信で-->
  <h2>①ネットワークのポート番号は何番？</h2>
<!--③ 問題のradioボタンを「foreach」を使って作成する-->

<?php
$ports = [80,22,20,21];
foreach($ports as $value){ ?>
  <input type="radio" name="ports">
       <?php echo $value;
      }?>     

<h2>②Webページを作成するための言語は？</h2>
<!--③ 問題のradioボタンを「foreach」を使って作成する-->

<?php
$languages = ["PHP","Python","JAVA","HTML"];
foreach($languages as $value){ ?>
  <input type="radio" name="languages">
 <?php echo $value;
}
?>

<h2>③MySQLで情報を取得するためのコマンドは？</h2>
<!--③ 問題のradioボタンを「foreach」を使って作成する-->
<?php
$commands = ["join","select","insert","update"];
foreach($commands as $value){ ?>
  <input type="radio" name="commands">
 <?php echo $value;
}
?> 
<!--問題の正解の変数と名前の変数を[answer.php]に送る-->
<input type="hidden" name="ports_correct" value="<?php echo $ports_correct; ?>">
<input type="hidden" name="ports_correct" value="<?php echo $languages_correct; ?>">
<input type="hidden" name="ports_correct" value="<?php echo $commands_correct; ?>">
<input type="hidden" name="text" value="<?php echo $text; ?>"><br>
<input type="submit" value="回答する" />
</form>