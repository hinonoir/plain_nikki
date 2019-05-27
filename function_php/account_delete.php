<?php
require_once 'monitor.php';

$pass = mysqli_real_escape_string( $link, $_POST['password_delete'] );

  // トークン認証
if ( isset( $_POST['csrf_token'] ) && $_POST['csrf_token'] == $_SESSION['csrf_token'] ) {

	// ========== アカウント削除 ========== //
	// 「テスター」は削除しない
	if ( $_SESSION['name'] != 'テスター' ) {

		// パスワード認証
		$hashed_pass_check = password_verify( $pass, $row['password'] );
		if ( $hashed_pass_check == true ) {
			// アカウントを削除
			$query  = "DELETE FROM users WHERE id = '" . mysqli_real_escape_string( $link, $_SESSION['id'] ) . "'";
			$result = mysqli_query( $link, $query );

			// 日記を削除
			$query  = "DELETE FROM diary WHERE user_id = '" . mysqli_real_escape_string( $link, $_SESSION['id'] ) . "'";
			$result = mysqli_query( $link, $query );

			// セッションを破棄してログインページへ
			session_destroy();
			header( 'Location: ../index.php' );

		} else {
			echo 'パスワードが間違っています。';
			echo "<br><a href='../diary.php'>プレーンにっきへ</a>";
		}
	} else {
		echo 'テスターは削除できません。';
		echo "<br><a href='../diary.php'>プレーンにっきへ</a>";
	}
	// ========== /アカウント削除 ========== //
} else {
	echo "<a href='../index.php'>ログインフォームへ</a><br>";
	die( '不正なリクエストです。' );
}


