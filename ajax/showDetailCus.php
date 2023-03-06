<?php
require_once("../config.php");
if(isset($_POST['makhachhang'])){
	$makhachhang = $_POST['makhachhang'];
	
	$sql = "SELECT * FROM khachhang WHERE makhachhang = '$makhachhang'";

	$run = mysqli_query($conn,$sql);

	$row = mysqli_fetch_array($run);

	?>
	<input type="hidden" name="makhachhang" id="makhachhang" value="<?php echo $row['makhachhang']; ?>">

	<label for="uname"><b>Tên khách hàng</b></label>
	<input type="text" name="name" id="name-up" value="<?php echo $row['hotenkhachhang']; ?>">

	<label for="uname"><b>Số điện thoại</b></label>
	<input type="text" name="phone" id="phone-up" value="<?php echo $row['sodienthoai']; ?>">

	<label for="uname"><b>Địa chỉ</b></label>
	<input type="text" name="address" id="address-up" value="<?php echo $row['diachi']; ?>">

	<label for="uname"><b>Email</b></label>
	<input type="text" name="email" id="email-up" value="<?php echo $row['email']; ?>">

	<?php
}

?>