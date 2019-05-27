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
				<a href="https://twitter.com/hinonoir64" class="d-block col sm-ml-auto text-white p-2 p-sm-1"><i class="fab fa-twitter text-info mr-1" style="font-size:30px;"></i>Twitter</a>
			</li>
			<li class="nav-item">
				<a href="https://yuto-hino.sakura.ne.jp/portfolio/" class="d-block col sm-ml-3 text-white p-2 p-sm-1"><i class="far fa-window-maximize text-secondary mr-1" style="font-size:30px;"></i>ポートフォリオサイト</a>
			</li>
		  <li class="nav-item">
			<a href="function_php/logout.php" class="btn btn-info nav-link col my-2 m-sm-0">ログアウト</a>
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
