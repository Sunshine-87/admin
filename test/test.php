<?php
	$connect = mysqli_connect('115.159.185.248','root','sdofijsng','shiyi');
	mysqli_query($connect,'set names utf8');
	$date = date('Y-m-d');
	$rs = mysqli_query($connect, 'SELECT count(0) from userinfo WHERE last_login = \''.$date.'\'');
	$result = mysqli_fetch_row($rs);
	
	$cunzai = mysqli_query($connect, 'SELECT count(0) from rihuo WHERE date = \''.$date.'\'');
	$cunzai = mysqli_fetch_row($cunzai);
	if ($cunzai[0] == 0) {
		$sql = 'INSERT INTO rihuo SET date = \''.$date.'\',login_num = '.$result[0];
		$rs = mysqli_query($connect, $sql);
	} else {
		$sql = 'UPDATE rihuo SET login_num = '.$result[0].' WHERE date = \''.$date.'\'';
		$rs = mysqli_query($connect, $sql);
	}
	// if ($rs) {
	// 	echo 'success';
	// } else {
	// 	echo 'failed';
	// }
?>