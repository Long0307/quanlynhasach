<?php
require_once("../config.php");
	if(isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['address']) && isset($_POST['email'])){
		
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$email = $_POST['email'];

		echo $sql = "INSERT INTO khachhang(hotenkhachhang,diachi,email,sodienthoai) VALUES ('$name','$address','$email','$phone')";

		$run = mysqli_query($conn,$sql);
	}
?>