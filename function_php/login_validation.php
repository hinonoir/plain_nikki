<?php
  session_start();

  // $link = mysqli_connect("localhost","root","excelsus48273","memberapp");
  
  if(mysqli_connect_error()){
    die("データベースへの接続に失敗しました。");
  }

  $name = mysqli_real_escape_string($link, $_POST['name']);
  $pass = mysqli_real_escape_string($link, $_POST['password']);
  
  // トークン認証
  if (isset($_POST['csrf_token']) && $_POST['csrf_token'] == $_SESSION['csrf_token']){
    
    // ========== ログイン処理 ========== //
    //入力されたユーザー名を検索
    $query = "SELECT * FROM users WHERE name = '$name'";
    $result = mysqli_query($link,$query);
    $row = mysqli_fetch_array($result);
    $num = mysqli_num_rows($result);
    
    // パスワード認証
    $hashed_pass_check = password_verify($pass, $row['password']);

    // ユーザー名とパスワード認証
    if($num > 0 && $hashed_pass_check == true){
      $_SESSION['name'] = $name;
      $_SESSION['id'] = $row['id'];
      header("Location: ../diary.php");

    }else{
      echo "ユーザー名かパスワードが間違っています。";
      echo "<br><a href='#' onclick=history.back()>ログインフォームへ</a>";
    }
    // ========== /ログイン処理 ========== //
  }else{
    echo "<a href='../index.php'>ログイン画面へ</a><br>";
    die ("不正なリクエストです。");
  }
?>
