<?php
require_once "../config.php";

if(isset($_POST['date'])){	

	$date = $_POST['date'];

	$arrDateYear = explode("-", $date);

	$year = $arrDateYear[0];

	$month = $arrDateYear[1];

	$sqlGetCalendar = "SELECT * FROM baocaocongno

	INNER JOIN khachhang ON baocaocongno.makhachhang = khachhang.makhachhang

	WHERE baocaocongno.thang = $month
	";

	$runGetCalendar = mysqli_query($conn,$sqlGetCalendar);

	while ($rownguoiNo = mysqli_fetch_array($runGetCalendar)) {
		?>

		<tr>
			<th>
				<?php echo $rownguoiNo['makhachhang']; ?>
			</th>
			<th>
				<?php echo $rownguoiNo['hotenkhachhang']; ?>
			</th>
			<td>  
				<?php echo "0".$rownguoiNo['sodienthoai']; ?>
			</td>
			<td>  
				<?php echo $rownguoiNo['thang']; ?>
			</td>
			<td>  
				<?php echo number_format($rownguoiNo['nodau'], 0, '', ',')." VNĐ"; ?>
			</td>
			<td>  
				<?php echo number_format($rownguoiNo['tongtienmua'], 0, '', ',')." VNĐ"; ?>
			</td>
			<td>  
				<?php echo number_format($rownguoiNo['tongtientra'], 0, '', ',')." VNĐ"; ?>
			</td>
			<td>  
				<?php echo number_format($rownguoiNo['nocuoi'], 0, '', ',')." VNĐ"; ?>
			</td>
		</tr>

		<?php
	}
}
?>