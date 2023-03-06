<?php
session_start();
require_once("../config.php");
if(isset($_POST['masach']) && isset($_POST['soluongban']) && isset($_POST['dongiaban'])){

		$sql_kta_theo_qd = "SELECT * FROM thamso";
		$run_kta_theo_qd = mysqli_query($conn,$sql_kta_theo_qd);
		$row_kta_theo_qd = mysqli_fetch_assoc($run_kta_theo_qd);

		$sql = "SELECT * FROM sach WHERE sach.masach = ".$_POST['masach'];
		$run = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($run);

		$dongiaban = $_POST['dongiaban'];

		$soluongban = $_POST['soluongban'];

		$soluongton = $row['soluongton'];

		$ktrasoluong = $soluongton - $soluongban;

		$soluongmuaqua = $row_kta_theo_qd['soluongtontoithieusaukhiban'] - $ktrasoluong;

		if($ktrasoluong < $row_kta_theo_qd['soluongtontoithieusaukhiban']){

			$false = "Bạn đã mua quá số lượng tồn là ".$soluongmuaqua." sản phẩm bạn có đồng ý bớt ".$soluongmuaqua." để mua tiếp không";

			$soluongthucte = $soluongban - $soluongmuaqua;

			$total = $soluongthucte * $dongiaban;

			$_SESSION['sachban'][$_POST['masach']]['tongcong'] = $total;	

			$_SESSION['sachban'][$_POST['masach']]['soluongban'] = $soluongthucte;	

			$kta = "false";

			echo $false . "+" . $kta . "+" . $soluongmuaqua ."+". $soluongthucte ."+". number_format($total, 0, '', ',')." VNĐ";

		}else{
			
			$total = $dongiaban * $soluongban;

			$_SESSION['sachban'][$_POST['masach']]['tongcong'] = $total;	
			
			$_SESSION['sachban'][$_POST['masach']]['soluongban'] = $soluongban;

			echo number_format($total, 0, '', ',')." VNĐ";

		}

}
?>
