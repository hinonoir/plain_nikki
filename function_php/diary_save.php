<?php
require_once 'monitor.php';

// トークン認証
if ( isset( $_POST['csrf_token'] ) && $_POST['csrf_token'] == $_SESSION['csrf_token'] ) {

	// ========== 日記編集保存処理 ========== //
	// 日記ID
	$id = mysqli_real_escape_string( $link, $_POST['diary_id'] );
	// 日記タイトル
	$title = mysqli_real_escape_string( $link, $_POST['title'] );

	// 日記内容
	$message = mysqli_real_escape_string( $link, $_POST['message'] );

	// 日記タイトル・内容更新
	$query  = "UPDATE diary SET title = '$title', message = '$message' WHERE id = '$id'";
	$result = mysqli_query( $link, $query );

	header( 'Location: ../show.php?id=' . $id );
	// ========== /日記編集保存処理 ========== //
} else {
	echo "<a href='../index.php'>ログインフォームへ</a>";
	die( '不正なリクエストです。' );
}

