<?php
  require_once('monitor.php');

  $current_pass = mysqli_real_escape_string($link, $_POST['current_password']);
  $new_pass = mysqli_real_escape_string($link, $_POST['new_password']);
  
  // トークン認証
  if (isset($_POST['csrf_token']) && $_POST['csrf_token'] == $_SESSION['csrf_token']){
    
    // ========== パスワード変更 ========== //
    // 「テスター」は変更しない
    if($_SESSION['name'] != "テスター"){

      // パスワード認証
      $hashed_pass_check = password_verify($current_pass, $row['password']);
      if($hashed_pass_check == true){

        // パスワードの入力値が有効か判定
        if(preg_match("/^[A-Za-z\d\-]+$/",$new_pass)){

          // 新しいパスワードを更新
          // パスワードのハッシュ化
          $hashed_pass = password_hash($new_pass, PASSWORD_DEFAULT);
          if(!($row['password'] == $hashed_pass)){
            $query = "UPDATE users SET password = '$hashed_pass' WHERE id = '".mysqli_real_escape_string($link, $_SESSION['id'])."'";
            $result = mysqli_query($link,$query);

            header("Location: ../diary.php");

          }else{
          echo "パスワードが同じです。";
          echo "<br><a href='../diary.php'>プレーンにっきへ</a>";
          }
        }else{
          echo "パスワードに記号、空白などは使用できません。";
          echo "<br><a href='../diary.php'>ログインフォームへ</a>";
        }
      }else{
        echo "パスワードが間違っています。";
        echo "<br><a href='../diary.php'>プレーンにっきへ</a>";
      }
    }else{
      echo "テスターは変更できません。";
      echo "<br><a href='../diary.php'>プレーンにっきへ</a>";
    }
    // ========== /パスワード変更 ========== //
  }else{
    echo "<a href='../index.php'>ログインフォームへ</a><br>";
    die ("不正なリクエストです。");
  }
?>