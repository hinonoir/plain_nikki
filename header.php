<header class="sticky-top mb-5">
  <div class="container">
    <nav class="navbar navbar-expand-md">

      <!-- ヘッダーロゴ -->
      <h1 class="header-logo d-inline" style="margin-top:-12px;">
        <a href="diary.php" class="text-white navbar-brand">
          <i class="fas fa-pencil-alt"></i> プレーンにっき
        </a>
      </h1>

      <!-- メニューボタン -->   
      <button class="navbar-toggler border-white text-white rounded-lg" data-toggle="collapse" data-target="#collapse_target">
        <i class="fas fa-bars"></i>
      </button>
      
      <!-- メニュー一覧 -->
      <div class="collapse navbar-collapse" id="collapse_target">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a href="function_php/logout.php" class="btn btn-info nav-link">ログアウト</a>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->

    </nav>
    <!-- ユーザー名表示&ドロップダウン -->
    <div class="dropdown">
      <button class="btn dropdown-toggle text-white p-0 ml-3 mb-1" id="dropdownMenuButton" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-user-circle" style="margin-right:3px;"></i><?php echo $_SESSION['name']; ?>
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a href="#" class="dropdown-item" data-toggle="modal" data-target="#username_change">ユーザー名変更</a>
        <a href="#" class="dropdown-item" data-toggle="modal" data-target="#password_change">パスワード変更</a>
        <a href="#" class="dropdown-item" data-toggle="modal" data-target="#account_delete">アカウント削除</a>
      </div>
    </div>

  </div><!-- .container -->
</header>
