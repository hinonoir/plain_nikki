<?php
  session_start();
  require_once('function_php/token.php');
?>

<!doctype html>
<html lang="ja">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Kosugi+Maru" rel="stylesheet">

    <link rel="stylesheet" href="stylesheet/index.css">
    <link rel="stylesheet" href="stylesheet/normalize.css">
    <link rel="icon" href="favicon.ico">
    
    <title>プレーンにっき ログイン</title>
  </head>
  <body class="d-flex" style="flex-direction:column; min-height:100vh;">
		<!-- ========== header ========== -->
		<header class="mb-5">
			<div class="container">
				<nav class="navbar navbar-expand-md">
					<!-- ヘッダーロゴ -->
					<h1 class="header-logo d-inline mb-0" style="margin-top:-4px;">
						<a href="diary.php" class="text-light navbar-brand">
							<i class="fas fa-pencil-alt"></i> プレーンにっき
						</a>
          </h1>
        </nav>
			</div><!-- .container -->
		</header>
		<!-- ========== /header ========== -->

    <div class="container">
      <div class="mx-auto mb-4 row">
        <!-- ========== ログインフォーム ========== -->
        <div class="col-md-6 border rounded px-5 py-4 login-form">
          <h2 class="text-center" style="font-family: 'Kosugi Maru', sans-serif;">ログイン</h2>
          <form method="post" action="function_php/login_validation.php" onSubmit="double_click_button(this)">

            <!-- トークン認証 -->
            <input type="hidden" name="csrf_token" value="<?php echo $csrf_token?>">

            <div class="form-group">
              <label for="name1">ユーザー名</label>
              <input id="name1" type="name" class="form-control rounded-lg" name="name" required placeholder="ユーザー名" onInput="name_limit(this)">
            </div>
            <div class="form-group">
              <label for="pass1">パスワード</label>
              <input id="pass1" type="password" class="form-control rounded-lg" name="password" required placeholder=" 半角英数字"  onInput="pass_limit(this)">
            </div>
            <label>
              <input type="checkbox" id="pass1-visi">
              パスワードを表示する
            </label>
            
            <p><input type="submit" value="ログイン" class="btn btn-primary rounded-lg"></p>
          </form>
        </div><!-- /ログインフォーム -->
        <!-- ========== /ログインフォーム ========== -->

        <!-- ========== 登録フォーム ========== -->
        <div class="col-md-6 border rounded px-5 py-4 signup-form">
          <h2 class="text-center" style="font-family: 'Kosugi Maru', sans-serif;">登録</h2>
          <form method="post" action="function_php/signup.php" onSubmit="return double_click_alert()">
            <!-- トークン認証 -->
            <input type="hidden" name="csrf_token" value="<?php echo $csrf_token?>">
            
            <div class="form-group">
              <label for="name2">ユーザー名</label>
              <input type="name" class="form-control rounded-lg" id="name2" name="name" required placeholder="20文字以内" onInput="name_limit(this)">
            </div>
            <div class="form-group">
              <label for="pass2-visi">パスワード
                <span style="font-size:13px;">（大文字、小文字、-のみ）</span>
              </label>
              <input type="password" class="form-control rounded-lg" id="pass2" name="password" required placeholder=" 半角英数字（8~16文字以内）" onInput="pass_limit(this)">
            </div>
            <label>
              <input type="checkbox" id="pass2-visi">
              パスワードを表示する
            </label>
            
            <p><input type="submit" value="登録" class="btn btn-success rounded-lg"></p>
          </form>
        </div><!-- /登録フォーム -->
        <!-- ========== /登録フォーム ========== -->
        
      </div><!-- mx-auto row -->
      
      <!-- ========== テスト用ユーザー名・パスワード ========== -->
      <div class="row justify-content-center mx-auto">
        <div class="col-sm-5 col-xs-12 rounded py-2 mb-5 text-center" style="background-color: rgba(255, 255, 255, 0.8);">
        
          <h5 class="text-center">
            <i class="fas fa-long-arrow-alt-down"></i>
            こちらでログインできます
          </h5>
          <p class="m-0">クリックで自動入力</p>
          <button class="btn btn-info mb-3" onClick="return copy_paste()">
            <i class="fas fa-paste"> コピー&ペースト</i>
          </button>

          <div class="form-group d-flex justify-content-center mx-auto">
            <p class="col-sm-4 my-auto">ユーザー名</p>
            <input id="copy_username" type="text" class="bg-white form-control border-0 col-sm-6 col-xs-5" value="テスター" readonly>
          </div><!-- form-group -->
            
          <div class="form-group d-flex justify-content-center">
            <p class="col-sm-4 my-auto">パスワード</p>
            <input id="copy_password" type="text" class="bg-white form-control border-0 col-sm-6 col-xs-5" value="diary-tester" readonly>
          </div><!-- form-group -->
          
          <!-- 注意書き -->
          <div class="warning-note text-muted text-left">
            <h5>※注意※</h5>
            <p>こちらでログインする場合は、ユーザー名・パスワードの変更およびアカウントの削除は出来ません。<br>
            ご自身のアカウントで行ってください。</p>
          </div>
        </div><!-- /.col-sm-5 col-xs-12 -->
      </div><!-- /.row -->
      <!-- ========== /テスト用ユーザー名・パスワード ========== -->

    </div><!-- container -->
    
    <!-- ========== footer ========== -->
    <?php require 'footer.php'; ?>
    <!-- ========== /footer ========== -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
  </body>
</html>
