<?php
	require_once('monitor.php');
  
  $did = mysqli_real_escape_string($link, $_POST['diary_id']);

  // トークン認証
  if (isset($_POST['csrf_token']) && $_POST['csrf_token'] == $_SESSION['csrf_token']){
    // 指定の日記を削除
    $query = "DELETE FROM diary WHERE id = '$did'";
    $result = mysqli_query($link,$query);
    header("Location: ../diary.php");

  }else{
    echo "<a href='../index.php'>ログインフォームへ</a><br>";
    die ("不正なリクエストです。");
  }

?>