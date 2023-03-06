<?php
	require_once "../config.php";

	if(isset($_POST['maphieunhap'])){

		$delete = $_POST['maphieunhap'];

		$sql = "DELETE FROM phieunhap WHERE maphieunhap = $delete";
		$run = mysqli_query($conn,$sql); 

		if($run){
			echo "Xoá thành công";
		}
	}
?>