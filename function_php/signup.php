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
    
    // ========== 新規登録処理 ========== //
    // 同じユーザー名が存在しないか検索
    $query = "SELECT name FROM users WHERE name = '$name'";
    $result = mysqli_query($link,$query);
    $num = mysqli_num_rows($result);

    if(!($num > 0)){

      // パスワードの入力値が有効か判定
      if(preg_match("/^[A-Za-z\d\-]+$/",$pass)){

        // パスワードのハッシュ化 //
        $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);
  
        // アカウントを新規作成
        $query = "INSERT INTO users (name,password) VALUES ('$name','$hashed_pass')";
        $result = mysqli_query($link,$query);
        // アカウント情報を取得
        $query = "SELECT id FROM users WHERE name = '$name'";
        $result = mysqli_query($link,$query);
        $row = mysqli_fetch_array($result);
        
        $_SESSION['name'] = $name;
        $_SESSION['id'] = $row['id'];
        echo "登録しました！";
        echo "<br><a href='../diary.php'>プレーンにっきへ</a>";
        
      }else{
        echo "パスワードに記号、空白などは使用できません。";
        echo "<br><a href='#' onclick=history.back()>ログインフォームへ</a>";
      }
    }else{
      echo "すでにそのユーザー名は使用されています。";
      echo "<br><a href='#' onclick=history.back()>ログインフォームへ</a>";
    }
    // ========== /新規登録処理 ========== //
  }else{
    echo "<a href='../index.php'>ログインフォームへ</a><br>";
    die ("不正なリクエストです。");
  }
?>
