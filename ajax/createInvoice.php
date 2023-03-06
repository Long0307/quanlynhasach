<?php
session_start();

require_once "../config.php";

if(isset($_POST['makhachhang'])){

	$makhachhang = $_POST['makhachhang'];

	$sql = "SELECT * FROM phieuhoadon WHERE makhachhang = $makhachhang";

	$run = mysqli_query($conn,$sql);

	// 2021-02-28 17:50:33
	// 2021-03-29 18:01:14
	// 2021-03-30 18:05:18
	// 2021-03-28 13:17:28

	$nodau = 0;

	while ($row = mysqli_fetch_array($run)) {

		$getMonthDB = explode(" ", $row['ngaylaphoadon']);

		$getMonthDB = explode("-", $getMonthDB[0]);

		$monthDB = $getMonthDB[1];

		$monthReal = Date("m");

		if($monthReal == $monthDB){

			break;

		}

		$nodau += $row['sotienno'];
	}

	$sqlKiemtraNoDau = "SELECT * FROM baocaocongno WHERE makhachhang = $makhachhang AND thang = $monthReal";

	$runKiemtraNoDau = mysqli_query($conn,$sqlKiemtraNoDau);

	$rowKiemtraNoDau = mysqli_fetch_assoc($runKiemtraNoDau);

	if($rowKiemtraNoDau['nodau'] > 0){

		$deleteRowOld = "DELETE FROM baocaocongno WHERE makhachhang = $makhachhang AND thang = $monthReal";

		$rundeleteRowOld = mysqli_query($conn,$deleteRowOld);

		$sqlInsertNodau = "INSERT INTO baocaocongno(thang,makhachhang,nodau) VALUES ($monthReal,$makhachhang,$nodau)";

		$runInsertNodau = mysqli_query($conn,$sqlInsertNodau);

	}

	$sql = "INSERT INTO phieuhoadon(makhachhang) VALUES ('$makhachhang')";

	if(mysqli_query($conn,$sql)){
		$getMaPhieuHoadon = mysqli_insert_id($conn); 
	}else {
		echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
	}

	foreach ($_SESSION['sachban'] as $key => $value) {

		$bodauphay = str_replace(",","",$value);

		$soluongban = $value['soluongban'];

		$tongcong = $value['tongcong'];

		$tongtien = $_SESSION['tongtien']; 

		$sotientra = $_SESSION['totaldebt'];

		$no = $_SESSION['no']; 

		$sqlChiTiet = "INSERT INTO chitietphieuhoadon( maphieuhoadon,soluongban,masach,tongtiennhap ) VALUES ('$getMaPhieuHoadon','$soluongban','$key','$tongcong')";

		$runChiTiet = mysqli_query($conn,$sqlChiTiet);

		if($runChiTiet){

			$getSoLuongTon = "SELECT * FROM sach WHERE masach = $key";
			$runSoLuongTon = mysqli_query($conn,$getSoLuongTon);

			if($runSoLuongTon){

				$rowSoLuongTon = mysqli_fetch_assoc($runSoLuongTon);

				$soluongton = $rowSoLuongTon['soluongton'] - $soluongban;

				$tongtienbanra = $soluongton * $rowSoLuongTon['dongia'];

				$sqlupdatesoluongton = "UPDATE sach SET soluongton = '$soluongton', tongtien = '$tongtienbanra' WHERE masach = $key";
				
				$runupdatesoluongton = mysqli_query($conn,$sqlupdatesoluongton);

				if($runupdatesoluongton){

					$updatePhieuHoaDon = "UPDATE phieuhoadon SET sotientra = '$sotientra', sotienno = '$no', tongcong = '$tongtien' WHERE makhachhang = '$makhachhang'";

					$runupdatePhieuHoaDon = mysqli_query($conn,$updatePhieuHoaDon);

					if($runupdatePhieuHoaDon){

						$sqlKhachhangNo = "SELECT * FROM khachhang WHERE makhachhang = $makhachhang";
						$runKhachhangNo = mysqli_query($conn,$sqlKhachhangNo);

						$rowKhachhangNo = mysqli_fetch_array($runKhachhangNo);

						$updateSoTienNo = $rowKhachhangNo['sotienno'] + $no;	

						$sqlKhachhangNo = "UPDATE khachhang SET sotienno = '$updateSoTienNo' WHERE makhachhang = $makhachhang";
						$runKhachhangNo = mysqli_query($conn,$sqlKhachhangNo);

						if($runKhachhangNo){
							echo "Thành công";
						}

					}

				}
			}
		}
	}	

	$sql = "SELECT * FROM phieuhoadon WHERE makhachhang = $makhachhang";

	$run = mysqli_query($conn,$sql);

	// 2021-02-28 17:50:33
	// 2021-03-29 18:01:14
	// 2021-03-30 18:05:18
	// 2021-03-28 13:17:28

	$tongtienmua = 0;
	$tongtientra = 0;
	$nocuoi = 0;

	while ($row = mysqli_fetch_array($run)) {

		$monthReal = Date("m");

		$tongtienmua += $row['tongcong'];

		$tongtientra += $row['sotientra'];

		$nocuoi += $row['sotienno'];	

	}	

	$sqlKiemtraNoDau = "SELECT * FROM baocaocongno WHERE makhachhang = $makhachhang AND thang = $monthReal";

	$runKiemtraNoDau = mysqli_query($conn,$sqlKiemtraNoDau);

	$rowKiemtraNoDau = mysqli_fetch_assoc($runKiemtraNoDau);

	if($rowKiemtraNoDau['nodau'] >= 0){

		$updateNocuoi = "UPDATE baocaocongno SET nocuoi = '$nocuoi', tongtienmua = '$tongtienmua', tongtientra = '$tongtientra' WHERE makhachhang = $makhachhang AND thang = $monthReal";

		$runupdateNocuoi = mysqli_query($conn,$updateNocuoi);

	}else{

		$sqlInsertNodau = "INSERT INTO baocaocongno(thang,makhachhang,nodau,nocuoi,tongtienmua,tongtientra) VALUES ($monthReal,$makhachhang,0,$nocuoi,$tongtienmua,$tongtientra)";

		$runInsertNodau = mysqli_query($conn,$sqlInsertNodau);

	}

	
}
?>