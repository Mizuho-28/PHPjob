<?php
$text = $_POST['text'];
$substr = substr($text,-mt_rand(1,strlen($text)),1);
?>
<p><?php echo date("Y/m/d")?>の運勢は</p>
<p>選ばれた数字は<?php echo $substr ?></p>


<?php
  if($substr==0){
 echo "凶";
} elseif($substr==1 ||$substr==2 || $substr==3){
 echo "小吉";
} elseif($substr==4 ||$substr==5 || $substr==6){
  echo "中吉";
} elseif($substr==7 ||$substr==8 ){
  echo "吉";
} elseif($substr ==9){
  echo "大吉";
}
?>

