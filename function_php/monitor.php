<?php
  session_start();

  // $link = mysqli_connect("localhost","root","excelsus48273","memberapp");
  $link = mysqli_connect("mysql1017.db.sakura.ne.jp","yuto-hino","excelsus48273","yuto-hino_plain_nikki");
  
  if(mysqli_connect_error()){
    die("データベースへの接続に失敗しました。");
  }

  //ログイン状態管理
  if($_SESSION['name']){
  } else {
    header("Location: index.php");
  }

  // ユーザー情報取得
  $query = "SELECT * FROM users WHERE id = '".mysqli_real_escape_string($link, $_SESSION['id'])."'";
  $result = mysqli_query($link,$query);
  $row = mysqli_fetch_array($result);
?>