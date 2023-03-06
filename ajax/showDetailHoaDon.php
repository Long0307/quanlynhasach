<?php
require_once("../config.php");
if(isset($_POST['makhachhang'])){
	$makhachhang = $_POST['makhachhang'];
	
	$sql = "SELECT * FROM khachhang WHERE makhachhang = '$makhachhang'";

	$run = mysqli_query($conn,$sql);

	$row = mysqli_fetch_array($run);

	?>
	<label for="uname"><b>Tên phiếu nhập sách</b></label>
	<input type="text" placeholder="Thêm phiếu nhập sách" name="uname" required>

	<label for="uname"><b>Năm sinh</b></label>
	<input type="text" placeholder="Thêm năm sinh" name="uname" required>

	<?php
}

?>