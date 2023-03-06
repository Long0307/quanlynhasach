<?php
require_once("../config.php");
	if(isset($_POST['makhachhang'])){
		$makhachhang = $_POST['makhachhang'];

		$sqlSoluongton = "SELECT * FROM khachhang WHERE makhachhang = $makhachhang";

		$runSoluongton = mysqli_query($conn,$sqlSoluongton);

		$rowSoluongton = mysqli_fetch_assoc($runSoluongton);

		$sotienno = $rowSoluongton['sotienno'];

		$sqlDK = "SELECT * FROM thamso";

		$runDK = mysqli_query($conn,$sqlDK);

		$rowDK = mysqli_fetch_assoc($runDK);

		$tongnotoida = $rowDK['tongnotoida'];

		if($sotienno > $tongnotoida){

			$sotiennoqua = $sotienno - $tongnotoida;

			echo "Số tiền nợ là: ".$sotienno." | ";
			echo "Nợ quá cho phép là: ".$sotiennoqua." | ";
			echo "Phải trả nợ để được mua sách";

		}else if(($sotienno <= $tongnotoida) && ($sotienno > 0)){

			echo "Số tiền nợ là: ".number_format($sotienno, 0, '', ',')." VNĐ"." không nợ quá cho phép được mua sách";

		}else{

			echo "Không nợ được phép mua sách";

		}

	}	
?>