<link rel="stylesheet" href="css/style.css">

<?php
//[question.php]から送られてきた名前の変数、選択した回答、問題の答えの変数を作成
//選択した回答と正解が一致していれば「正解！」、一致していなければ「残念・・・」と出力される処理を組んだ関数を作成する
$text = $_POST['text'];

$ports_correct = $_POST['ports_correct'];
$languages_correct = $_POST['languages_correct'];
$commands_correct = $_POST['commands_correct'];


$ports = $_POST['ports'];
$languages = $_POST['languages'];
$commands = $_POST['commands'];

function getCorrect($answer , $correct){
  if($answer ==$correct){
    echo "正解！";
  } else {
    echo "残念…";
  }
}

?>

<p><!--POST通信で送られてきた名前を表示--><?php echo $text;?>さんの結果は・・・？</p>
<p>①の答え</p>
<!--作成した関数を呼び出して結果を表示-->
<?php getCorrect($ports,$ports_correct); ?>

<p>②の答え</p>
<!--作成した関数を呼び出して結果を表示-->
<?php getCorrect($languages,$languages_correct); ?>

<p>③の答え</p>
<!--作成した関数を呼び出して結果を表示-->
<?php getCorrect($commands,$commands_correct); ?>
