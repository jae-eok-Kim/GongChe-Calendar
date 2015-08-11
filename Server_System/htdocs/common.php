<?php
	$db_host = "localhost";
	$db_user = "gongche";
	$db_passwd = "1q2w3e4r5t";
	$db_name = "gongche";
	$conn = mysqli_connect($db_host,$db_user,$db_passwd,$db_name);

	if (mysqli_connect_errno($conn)) {
	echo "데이터베이스 연결 실패: " . mysqli_connect_error();
	} else {
	}
?>