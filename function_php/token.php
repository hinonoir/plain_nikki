<?php
  // トークン生成
	$toke_byte = openssl_random_pseudo_bytes(16);
	$csrf_token = bin2hex($toke_byte);
	$_SESSION['csrf_token'] = $csrf_token;
?>