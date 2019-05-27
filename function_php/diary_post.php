<?php
require_once 'monitor.php';

// トークン認証
if ( isset( $_POST['csrf_token'] ) && $_POST['csrf_token'] == $_SESSION['csrf_token'] ) {

	// ========== 日記投稿処理 ========== //
	// 日付処理
	$timestamp = time();
	$week      = array( '日', '月', '火', '水', '木', '金', '土' );
	$w         = date( 'w' );
	$date_raw  = date( 'Y年m月d日', $timestamp ) . '（' . $week[ $w ] . '）';
	$date      = mysqli_real_escape_string( $link, $date_raw );

	// 日記タイトル
	$title = mysqli_real_escape_string( $link, $_POST['title'] );

	// 日記内容
	$message = mysqli_real_escape_string( $link, $_POST['message'] );

	// データベースに保存
	$query  = "INSERT INTO diary (title,message,date,user_id) VALUES ('$title','$message','$date','" . mysqli_real_escape_string( $link, $_SESSION['id'] ) . "')";
	$result = mysqli_query( $link, $query );

	// 日記の投稿処理をしてdiary.phpに戻る
	header( 'Location: ../diary.php' );
	// ========== /日記投稿処理 ========== //
} else {
	echo "<a href='../index.php'>ログインフォームへ</a>";
	die( '不正なリクエストです。' );
}


