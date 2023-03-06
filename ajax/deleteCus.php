<?php
require_once("../config.php");
if(isset($_POST['makhachhang'])){

	$makhachhang = $_POST['makhachhang'];
	
	$sql = "DELETE FROM khachhang WHERE makhachhang = '$makhachhang'";

	$run = mysqli_query($conn,$sql);

}
?>