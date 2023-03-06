<?php
	require_once("../config.php");

	if(isset($_POST['makhachhang']) && isset($_POST['money'])){
		$makhachhang = $_POST['makhachhang'];
		$money = $_POST['money'];

		$themvaothutien = "INSERT INTO phieuthutien(makhachhang,sotienthu) VALUES ('$makhachhang','$money')";

		$runthemvao = mysqli_query($conn,$themvaothutien);

		if($runthemvao){
			echo "Thành công";
		}

	}
?>