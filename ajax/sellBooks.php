<?php

	require_once("../config.php");

	if(isset($_POST['masach'])){

		$sql = "SELECT * FROM sach 
		INNER JOIN theloai ON sach.id_theloai = theloai.id
		INNER JOIN tacgia ON sach.id_tacgia = tacgia.id
		WHERE sach.masach = ".$_POST['masach'];

		$run = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($run);

		$dongiaban = (105/100) *$row[6];
		$dongiabanFm = number_format($dongiaban, 0, '', ',')." VNĐ";

		$_SESSION['khachhangmuahang']['masach'] = $row[0];

		$_SESSION['khachhangmuahang']['dongiaban'] = $dongiaban;

		echo $row[0] ."+". $row[1] ."+". $row[10] ."+". $row[12] ."+". $row[4] ."+". $row[5] ."+". $dongiaban ."+". $dongiabanFm;

		
	}

	
?>