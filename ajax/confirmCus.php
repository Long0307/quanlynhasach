<?php
require_once("../config.php");
if(isset($_POST['makhachhang'])){
	$makhachhang = $_POST['makhachhang'];
	
	$sql = "SELECT * FROM khachhang WHERE makhachhang = '$makhachhang'";
	$run = mysqli_query($conn,$sql);

  $sql_kta_theo_qd = "SELECT * FROM thamso";
  $run_kta_theo_qd = mysqli_query($conn,$sql_kta_theo_qd);

  $row_kta_theo_qd = mysqli_fetch_assoc($run_kta_theo_qd);

	$rowkhachhang = mysqli_fetch_array($run);

  if($rowkhachhang['sotienno'] < $row_kta_theo_qd['tongnotoida']){
    

  ?>
  
  <thead>
        <tr>
          <th scope="col"><b>Mã khách hàng:</b><span style="margin-left: 20px;"><?php echo $rowkhachhang['makhachhang']; ?></span></th>
        </tr>
        <tr>
          <th scope="col"><b>Tên khách hàng:</b><span style="margin-left: 20px;"><?php echo $rowkhachhang['hotenkhachhang']; ?></span></th>
        </tr>
        <tr>
          <th scope="col"><b>Số điện thoại:</b><span style="margin-left: 20px;"><?php echo $rowkhachhang['sodienthoai']; ?></span></th>
        </tr>
        <tr>
          <th scope="col"><b>Email:</b><span style="margin-left: 20px;"><?php echo $rowkhachhang['email']; ?></span></th>
        </tr>
        <tr>
          <th scope="col"><b>Địa chỉ:</b><span style="margin-left: 20px;"><?php echo $rowkhachhang['diachi']; ?></span></th>
        </tr>
        <tr>
          <th scope="col"><b>Tổng nợ:</b><span style="margin-left: 20px;"><?php echo $rowkhachhang['sotienno']; ?></span></th>
        </tr>
      </thead>

  <?php

  }else{
    $sotienno = number_format($rowkhachhang['sotienno']-$row_kta_theo_qd['tongnotoida'], 0, '', ',')." VNĐ";
    echo "<p style='color:red;'>Khách hàng này nợ quá số tiền cho phép là $sotienno (Không được phép mua hàng)<p>";
  }


}

?>