<?php
require_once("../config.php");
	if(isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['address']) && isset($_POST['email']) && isset($_POST['makhachhang'])){
		
		echo $makhachhang = $_POST['makhachhang'];
		echo $name = $_POST['name'];
		echo $phone = $_POST['phone'];
		echo $address = $_POST['address'];
		echo $email = $_POST['email'];

		echo $sql = "UPDATE khachhang SET hotenkhachhang = '$name',diachi = '$address',email = '$email',sodienthoai = '$phone' WHERE makhachhang = '$makhachhang'";

		$run = mysqli_query($conn,$sql);

	}
?>