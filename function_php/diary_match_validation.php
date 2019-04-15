<?php
  // URLからid取得
  $did = mysqli_real_escape_string($link, $_GET['id']);
  $query = "SELECT * FROM diary WHERE id = $did";
  $result = mysqli_query($link,$query);
  $row = mysqli_fetch_array($result);
  
  // ログインユーザーの日記であるか$_SESSION['id']で確認
  if(!($row['user_id'] == $_SESSION['id'])){
    echo "不正な操作です。";
    die("<br><a href='#' onclick=history.back()>前に戻る</a>");
  }
?>