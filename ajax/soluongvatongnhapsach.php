<?php
session_start();
require_once("../config.php");
if(isset($_POST['masach']) && isset($_POST['soluong'])){
	if(isset($_POST['dongia'])){

		// if(isset($_SESSION['upandins_pns'][$_POST['masach']])){
		// 	unset($_SESSION['upandins_pns'][$_POST['masach']]);
		// }

		$soluong = $_POST['soluong'];

		$id = $_POST['masach'];

		$dongia = $_POST['dongia'];

		$sqlkiemtraton = "SELECT * FROM sach WHERE masach = $id";
		$runkiemtraton = mysqli_query($conn,$sqlkiemtraton);
		$rowkiemtraton = mysqli_fetch_assoc($runkiemtraton);

		$sql_kta_theo_qd = "SELECT * FROM thamso";
		$run_kta_theo_qd = mysqli_query($conn,$sql_kta_theo_qd);
		$row_kta_theo_qd = mysqli_fetch_assoc($run_kta_theo_qd);

		$error = [];

		if($soluong == 0){

			$error[] = "Bạn chưa nhập sách này";

			if(isset($_SESSION['upandins_pns'][$_POST['masach']])){
				unset($_SESSION['upandins_pns'][$_POST['masach']]);
			}

		}else if($soluong > 0){

			if($soluong < $row_kta_theo_qd['soluongnhaptoithieu']){

				$error[] = "số lượng nhập tối thiểu là " . $row_kta_theo_qd['soluongnhaptoithieu'];

				if(isset($_SESSION['upandins_pns'][$_POST['masach']])){
					unset($_SESSION['upandins_pns'][$_POST['masach']]);
				}

			}else{

				if($rowkiemtraton['soluongton'] < $row_kta_theo_qd['soluongtontoithieutruockhinhap']){

					if($id == $rowkiemtraton['masach']){

						$total = $dongia * $soluong;

						$_SESSION['upandins_pns'][$_POST['masach']]['total'] = $total;

						$_SESSION['upandins_pns'][$_POST['masach']]['dongia'] = $dongia;

						$_SESSION['upandins_pns'][$_POST['masach']]['soluong'] = $soluong;

					}

				}else{
					$error[] = "Sách này có số lượng tồn nhiều hơn ".$row_kta_theo_qd['soluongtontoithieutruockhinhap'];
					if(isset($_SESSION['upandins_pns'][$_POST['masach']])){
						unset($_SESSION['upandins_pns'][$_POST['masach']]);
					}
				}
			}
		}

		if(isset($error[0])){
			echo $error[0];
			if(isset($_SESSION['upandins_pns'][$_POST['masach']])){
				unset($_SESSION['upandins_pns'][$_POST['masach']]);
			}

		}else{
			echo number_format($_SESSION['upandins_pns'][$_POST['masach']]['total'], 0, '', ',')." VNĐ";	

			// echo "|";
			// print_r($_SESSION['upandins_pns']);
		}
	}
}

?>