<?php
require_once("../config.php");

if(isset($_POST['makhachhang']) && isset($_POST['money'])){
	$makhachhang = $_POST['makhachhang'];
	$money = $_POST['money'];

	$sqlFindCus = "SELECT * FROM khachhang WHERE makhachhang = $makhachhang";
	$runFindCus = mysqli_query($conn,$sqlFindCus);

	$rowFindCus = mysqli_fetch_assoc($runFindCus);

	$sotienno = $rowFindCus['sotienno'];

	$sotiensaukhitrano = $sotienno - $money;

	$sqlDK = "SELECT * FROM thamso";

	$runDK = mysqli_query($conn,$sqlDK);

	$rowDK = mysqli_fetch_assoc($runDK);

	if($sotiensaukhitrano > $rowDK['tongnotoida']){

		$updatePay = "UPDATE khachhang SET sotienno = '$sotiensaukhitrano' WHERE makhachhang = '$makhachhang'";

		$runupdatePay = mysqli_query($conn,$updatePay);

		$themvaothutien = "INSERT INTO phieuthutien(makhachhang,sotienthu) VALUES ('$makhachhang','$money')";

		$runthemvao = mysqli_query($conn,$themvaothutien);

		echo "Số tiền nợ của bạn còn lại là: ".number_format($sotiensaukhitrano, 0, '', ',')." VNĐ"." bạn phải trả tiếp để được mua sách | false";

	}else{

		$themvaothutien = "INSERT INTO phieuthutien(makhachhang,sotienthu) VALUES ('$makhachhang','$money')";

		$runthemvao = mysqli_query($conn,$themvaothutien);
		
		$updatePay = "UPDATE khachhang SET sotienno = '$sotiensaukhitrano' WHERE makhachhang = '$makhachhang'";

		$runupdatePay = mysqli_query($conn,$updatePay);
		
		echo "Bạn đã có thể mua sách | true";

	}

	

}

?>