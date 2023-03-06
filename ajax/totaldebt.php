<?php
	session_start();

	if(isset($_POST['totaldebt'])){

		$_SESSION['totaldebt'] = $_POST['totaldebt'];

	 	$debt = $_SESSION['tongtien'] - $_SESSION['totaldebt'];

	}

	

	$_SESSION['no'] = $debt;

	if($debt == 0){
		echo "Trả hết";
	}else{
		echo number_format($debt, 0, '', ',')." VNĐ";
	}
?>