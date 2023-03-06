<?php

	session_start();

	$total = 0;	

	// print_r($_SESSION['sachban']);
	
	foreach ($_SESSION['sachban'] as $key => $value) {

		$total += $value['tongcong'];

	}	

	// echo $total;
	$_SESSION['tongtien'] = $total;

	echo number_format($_SESSION['tongtien'], 0, '', ',')." VNĐ";

?>