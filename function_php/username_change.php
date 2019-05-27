<?php
  require_once 'monitor.php';

  $new_name = mysqli_real_escape_string( $link, $_POST['new_username'] );
  $pass     = mysqli_real_escape_string( $link, $_POST['password'] );

  // トークン認証
if ( isset( $_POST['csrf_token'] ) && $_POST['csrf_token'] == $_SESSION['csrf_token'] ) {

	// ========== ユーザー名変更 ========== //
	// 「テスター」は変更しない
	if ( $_SESSION['name'] != 'テスター' ) {

		// パスワード認証
		$hashed_pass_check = password_verify( $pass, $row['password'] );
		if ( $hashed_pass_check == true ) {

			// 現在のユーザー名から変更されているか判定
			if ( ! ( $row['name'] == $new_username ) ) {

				// すでにユーザー名が使用されていないか検索
				$query  = "SELECT name FROM users WHERE name = '$new_name'";
				$result = mysqli_query( $link, $query );
				$num    = mysqli_num_rows( $result );

				if ( ! ( $num > 0 ) ) {

					// 新しい名前を更新
					$query  = "UPDATE users SET name = '$new_name' WHERE id = '" . mysqli_real_escape_string( $link, $_SESSION['id'] ) . "'";
					$result = mysqli_query( $link, $query );

					$_SESSION['name'] = $new_name;
					header( 'Location: ../diary.php' );

				} else {
					echo 'すでにそのユーザー名は使用されています。';
					echo "<br><a href='#' onclick=history.back()>プレーンにっきへ</a>";
				}
			} else {
				echo 'ユーザー名が同じです。';
				echo "<br><a href='../diary.php'>プレーンにっきへ</a>";
			}
		} else {
			echo 'パスワードが間違っています。';
			echo "<br><a href='../diary.php'>プレーンにっきへ</a>";
		}
	} else {
		echo 'テスターは変更できません。';
		echo "<br><a href='../diary.php'>プレーンにっきへ</a>";
	}
	// ========== /ユーザー名変更 ========== //
} else {
	echo "<a href='../index.php'>ログインフォームへ</a><br>";
	die( '不正なリクエストです。' );
}

