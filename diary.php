<?php 
	require_once('function_php/monitor.php'); 
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

		<link rel="stylesheet" href="stylesheet/diary.css">
		<link rel="stylesheet" herf="stylesheet/normalize.css">
    <link rel="icon" href="favicon.ico">
    
		<title>プレーンにっき</title>
	</head>
	<body class="d-flex" style="flex-direction:column; min-height:100vh;">
		<!-- ========== header ========== -->
		<?php require 'header.php'; ?>
		<!-- ========== /header ========== -->

		<!-- ========== モーダル ========== -->
		<?php require 'modal.php'; ?>
		<!-- ========== /モーダル ========== -->

		<div class="container">
			
			<!-- ========== 入力フォーム ========== -->
			<div class="main_bg rounded px-5 py-4 mb-4" style="background-color: rgba(255, 255, 255,0.8);">
				<form method="post" action="function_php/diary_post.php" onSubmit="double_click_button(this)">
					<!-- トークン認証 -->
					<input type="hidden" name="csrf_token" value="<?php echo $csrf_token?>">

					<!-- タイトルフォーム -->
					<div class="form-group">
						<label for="title">タイトル</label>
						<div class="container">
							<div class="row">
								<input type="text" class="form-control col-md-6 rounded-lg" id="title" name="title" required>
							</div>
						</div>
					</div><!-- /.form-group -->

					<!-- 内容フォーム -->
					<div class="form-group">
						<label for="message">内容</label>
						<textarea class="form-control rounded-lg" id="message" name="message" placeholder="どんなことをした？" required style="height:155px;"></textarea>
					</div><!-- /.foorm-group -->

					<div class="row ">
						<div class="col-md-2">
							<input type="submit" class="btn btn-primary rounded-lg w-100" value="投稿">
						</div>
					</div><!-- /.row -->
				</form>
			</div>
			<!-- ========== /入力フォーム ========== -->

			<!-- ========== ギャラリー ========== -->
			<div class="gallery main_bg rounded col px-sm-4 px-xs-2 py-4 mb-4" style="background-color: rgba(255, 255, 255,0.8);">
				<h2>ギャラリー</h2>
				<?php
					if($_SESSION['id']){
						// 日記情報取得
						$query = "SELECT * FROM diary WHERE user_id = '".mysqli_real_escape_string($link,$_SESSION['id'])."'";
						$result = mysqli_query($link,$query);
						while($row = mysqli_fetch_array($result)): ?>

						<!-- 繰り返し処理開始 -->
						<form method="post" action="function_php/diary_delete.php" onSubmit="return check_diary_delete();">

							<!-- トークン認証 -->
							<input type="hidden" name="csrf_token" value="<?php echo $csrf_token?>">

							<!-- diary_id -->
							<input type="hidden" name="diary_id" value="<?php echo $row['id'];?>">
							<a href="show.php?id=<?php echo $row['id'] ?>" class="d-block text-decoration-none">
								<div class="bg-white rounded-lg p-3 mb-3">
									<div class="d-flex justify-content-between my-1">

										<!-- 日付 -->
										<p class="text-muted my-auto"><?php echo $row['date']; ?></p>
										
										<!-- オプション -->
										<div class="option-menu">
											<!-- 編集ボタン -->
											<object><a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-success btn-sm">編集</a></object>
											<!-- 削除ボタン -->
											<input type="submit" value="削除" class="btn btn-danger btn-sm">
										<!-- /オプション -->
										</div><!-- /.option-menu -->

									</div><!-- d-flex -->

									<!-- タイトル -->
									<h5 class="text-dark border-bottom pb-1"><strong><?php echo $row['title']; ?></strong></h5>

									<!-- 内容 -->
									<p class="text-body overflow-hidden" style="max-height:4.2em;">
										<!-- エスケープ処理&改行処理 -->
										<?php echo nl2br(htmlspecialchars($row['message'], ENT_QUOTES, "UTF-8")); ?>
									</p>
								</div><!-- /.bg-white rounded-lg ... -->
							</a>
						</form>
						<!-- 繰り返し処理終了 -->
						
						<?php endwhile; 
						} ?>
			</div><!-- gallery -->
			<!-- ========== /ギャラリー ========== -->

		</div><!-- .container -->

    <!-- ========== footer ========== -->
    <?php require 'footer.php'; ?>
    <!-- ========== /footer ========== -->

		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
	</body>
</html>
