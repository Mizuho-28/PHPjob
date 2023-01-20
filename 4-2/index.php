<?php
require_once("getData.php");

$data = new getData(); 
$user_data = $data->getUserData(); 
$post_data = $data->getPostData(); 

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>
<body>



  <div class="up">
     <div class="up-left">
        <img src="img/1599315827_logo.png" alt="">
     </div>
     <div class="up-right">
      <div class="up-right1">
        ようこそ <?php echo $user_data['last_name'].$user_data['first_name'];  ?>  さん
      </div>
      
      <div class="up-right2">
        最終ログイン日： <?php    echo $user_data['last_login'];     ?>   
      </div> 
    </div>
  </div>
  <div class="main">
    <table>
      <tr class="title">
        <th>記事ID</th>
        <th>タイトル</th>
        <th>カテゴリ</th>
        <th>本文</th>
        <th>投稿日</th>
      </tr>
      <?php foreach($post_data as $post ){ 
      ?>
      
      <tr class="mid">
        <td><?php echo $post['id']; ?></td>
        <td><?php echo $post['title']; ?></td>
        <td><?php 
        if($post['category_no']==1){
         echo "食事";
       } elseif($post['category_no']==2){
         echo "旅行";
       } else{
         echo "その他";
       }
       ;?></td>
        <td><?php echo $post['comment']; ?></td>
        <td><?php echo $post['created']; ?></td>

      </tr>
      <?php }; 
      ?>

    </table>
  </div>
  <footer>Y&I group.inc</footer>
</body>
</html>