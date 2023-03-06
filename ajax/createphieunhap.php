<?php
session_start();
require_once("../config.php");
// print_r($_SESSION['upandins_pns']);
$time = date("d:m:y");

$sqlPhieuNhap = "INSERT INTO phieunhap(ngaynhap) VALUES ('$time')";
$runPhieuNhap = mysqli_query($conn,$sqlPhieuNhap);
$getMaPhieuNhap = mysqli_insert_id($conn); 	

$tongtiennhap = 0;		

$sosachnhap = 0;

foreach ($_SESSION['upandins_pns'] as $key => $value) {

	$sqlGetMaPhieu = "SELECT * FROM chitietphieunhap WHERE masach = $key";

	$runGetMaPhieu= mysqli_query($conn,$sqlGetMaPhieu);

	while ($rowGetMaPhieu = mysqli_fetch_array($runGetMaPhieu)) {

		$maphieunhap = $rowGetMaPhieu['maphieunhap'];

		$sqlNgayNhap = "SELECT * FROM phieunhap WHERE maphieunhap = $maphieunhap";

		$runNgayNhap = mysqli_query($conn,$sqlNgayNhap);

		$rowNgayNhap = mysqli_fetch_assoc($runNgayNhap);

		$ngaynhap = $rowNgayNhap['ngaynhap'];

		$monthReal = Date("m");

		$getMonthDB = explode(" ", $ngaynhap);

		$getMonthDB = explode("-", $getMonthDB[0]);

		$monthDB = $getMonthDB[1];

		if($monthReal == $monthDB){
			break;
		}

		$maphieunhapcuathangtruoc = $rowNgayNhap['maphieunhap'];

		$sqlGetMaSach = "SELECT * FROM chitietphieunhap WHERE maphieunhap = $maphieunhapcuathangtruoc AND masach = $key";

		$runGetMaSach = mysqli_query($conn,$sqlGetMaSach);

		$rowGetMaSach = mysqli_fetch_assoc($runGetMaSach);

		$sosachnhap += $rowGetMaSach['soluongnhap'];

	}

	// Số sách nhập

	$sosachnhap;

	$sqlGetNgayLap = "SELECT * FROM phieuhoadon";

	$runGetNgayLap = mysqli_query($conn,$sqlGetNgayLap);

	$sosachban = 0;

	while ($rowGetNgayLap = mysqli_fetch_array($runGetNgayLap)) {

		$getMonthDB = explode(" ", $rowGetNgayLap['ngaylaphoadon']);

		$getMonthDB = explode("-", $getMonthDB[0]);

		$monthDB = $getMonthDB[1];

		$monthReal = Date("m");

		if($monthReal == $monthDB){

			break;

		}

		$maphieuhoadon = $rowGetNgayLap['maphieuhoadon'];

		$sqlGetSoLuongBanTheoSach = "SELECT * FROM chitietphieuhoadon WHERE maphieuhoadon = $maphieuhoadon AND masach = $key";

		$runGetSoLuongBanTheoSach = mysqli_query($conn,$sqlGetSoLuongBanTheoSach);

		$rowGetSoLuongBanTheoSach = mysqli_fetch_assoc($runGetSoLuongBanTheoSach);

		$sosachban += $rowGetSoLuongBanTheoSach['soluongban'];
	}

	$TonDau = $sosachnhap - $sosachban;

	$monthReal = Date("m");

	$sqlKiemtraTonDau = "SELECT * FROM baocaoton WHERE masach = $key AND thang = $monthReal";

	$runKiemtraTonDau = mysqli_query($conn,$sqlKiemtraTonDau);

	$rowKiemtraTonDau = mysqli_fetch_assoc($runKiemtraTonDau);	

	if($rowKiemtraTonDau['tondau'] > 0){

		$deleteRowOld = "DELETE FROM baocaoton WHERE masach = $key AND thang = $monthReal";

		$rundeleteRowOld = mysqli_query($conn,$deleteRowOld);

		$sqlInsertTondau = "INSERT INTO baocaoton(thang,masach,tondau) VALUES ($monthReal,$key,$TonDau)";

		$runInsertTondau = mysqli_query($conn,$sqlInsertTondau);

	}	

	// Xong tồn đầu

	if($key == 0){
		unset($_SESSION['upandins_pns'][0]);
	}

	$soluongnhap = $value['soluong'];

	$total = $value['total'];

	$sqlkiemtraton = "SELECT * FROM sach WHERE masach = $key";
	$runkiemtraton = mysqli_query($conn,$sqlkiemtraton);
	$rowkiemtraton = mysqli_fetch_assoc($runkiemtraton);

	$soluongton = $rowkiemtraton['soluongton'] + $soluongnhap;
	$tongtien = $soluongton * $rowkiemtraton['dongia'];


	$sql = "UPDATE sach SET soluongton = $soluongton,tongtien = $tongtien WHERE masach = $key";
	$run = mysqli_query($conn,$sql);

	if($run){

		if($getMaPhieuNhap){

			$tongtiennhap += $total;

			$sqltongtiennhap = "UPDATE phieunhap SET tongtiennhap = $tongtiennhap WHERE maphieunhap = $getMaPhieuNhap";
			$runtongtiennhap = mysqli_query($conn,$sqltongtiennhap);

			if($runtongtiennhap){

				$sqlChiTietPhieuNhap = "INSERT INTO chitietphieunhap(maphieunhap,soluongnhap,masach) VALUES ('$getMaPhieuNhap','$soluongnhap','$key')";
				$runChiTietPhieuNhap = mysqli_query($conn,$sqlChiTietPhieuNhap);

				if($runPhieuNhap){

					echo $sqlChiTietPhieuNhap;
					unset($_SESSION['upandins_pns']);
				}
			}
		}

	}

	$sqlGetNgayLap = "SELECT * FROM phieunhap";

	$runGetNgayLap = mysqli_query($conn,$sqlGetNgayLap);

	$phatsinhnhap = 0;

	$phatsinhxuat = 0;

	while ($rowGetNgayLap = mysqli_fetch_array($runGetNgayLap)) {

		$getMonthDB = explode(" ", $rowGetNgayLap['ngaynhap']);

		$getMonthDB = explode("-", $getMonthDB[0]);

		$monthDB = $getMonthDB[1];

		$monthReal = Date("m");

		if($monthReal == $monthDB){

			$maphieunhap = $rowGetNgayLap['maphieunhap'];

			$sqlGetMaSach = "SELECT * FROM chitietphieunhap WHERE maphieunhap = $maphieunhap AND masach = $key";

			$runGetMaSach = mysqli_query($conn,$sqlGetMaSach);

			$rowGetMaSach = mysqli_fetch_assoc($runGetMaSach);

			$soluongnhap = $rowGetMaSach['soluongnhap'];

			$phatsinhnhap += $soluongnhap;

		}
	}

	$phatsinhnhap;

	$sqlGetNgayLap = "SELECT * FROM phieuhoadon";

	$runGetNgayLap = mysqli_query($conn,$sqlGetNgayLap);

	$phatsinhxuat = 0;

	while ($rowGetNgayLap = mysqli_fetch_array($runGetNgayLap)) {

		$getMonthDB = explode(" ", $rowGetNgayLap['ngaylaphoadon']);

		$getMonthDB = explode("-", $getMonthDB[0]);

		$monthDB = $getMonthDB[1];

		$monthReal = Date("m");

		if($monthReal == $monthDB){

			$maphieuhoadon = $rowGetNgayLap['maphieuhoadon'];

			$sqlGetSoLuongBanTheoSach = "SELECT * FROM chitietphieuhoadon WHERE maphieuhoadon = $maphieuhoadon AND masach = $key";

			$runGetSoLuongBanTheoSach = mysqli_query($conn,$sqlGetSoLuongBanTheoSach);

			$rowGetSoLuongBanTheoSach = mysqli_fetch_assoc($runGetSoLuongBanTheoSach);

			$phatsinhxuat += $rowGetSoLuongBanTheoSach['soluongban'];

		}
	}

	$monthReal = Date("m");

	$phatsinhxuat;

	$toncuoi = $TonDau + $phatsinhnhap - $phatsinhxuat;

	$sqlKiemtraTonDau = "SELECT * FROM baocaoton WHERE masach = $key AND thang = $monthReal";

	$runKiemtraTonDau = mysqli_query($conn,$sqlKiemtraTonDau);

	$rowKiemtraTonDau = mysqli_fetch_assoc($runKiemtraTonDau);

	if($rowKiemtraTonDau['tondau'] >= 0){

		$updateTonCuoi = "UPDATE baocaoton SET toncuoi = '$toncuoi', phatsinhnhap = '$phatsinhnhap', phatsinhxuat = '$phatsinhxuat' WHERE masach = $key AND thang = $monthReal";

		$runupdateTonCuoi = mysqli_query($conn,$updateTonCuoi);

	}else{

		$sqlInsertTonDau = "INSERT INTO baocaoton(thang,masach,tondau,toncuoi,phatsinhnhap,phatsinhxuat) VALUES ($monthReal,$key,0,$toncuoi,$phatsinhnhap,$phatsinhxuat)";

		$runInsertTonDau = mysqli_query($conn,$sqlInsertTonDau);

	}
}
?>