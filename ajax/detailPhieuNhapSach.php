<?php
	
	require_once("../config.php");

	if(isset($_POST['maphieunhap'])){

		$maphieunhap = $_POST['maphieunhap'];

		$sql = "SELECT * FROM chitietphieunhap 
		INNER JOIN phieunhap ON chitietphieunhap.maphieunhap = phieunhap.maphieunhap
		INNER JOIN sach ON chitietphieunhap.masach = sach.masach
		WHERE chitietphieunhap.maphieunhap = $maphieunhap";

		$run = mysqli_query($conn,$sql) or die(mysqli_error($conn));

	while ($row = mysqli_fetch_array($run)) {

		?>
		<tr id="sach">
		<td id="maphieunhap">  
          	<?php echo $row['maphieunhap']; ?>
          </td>
          <td id="tensach">  
          	<?php echo $row['masach']; ?>
          </td>
          <td id="soluongnhap">  
          	<?php echo $row['tensach']; ?>
          </td>
          <td id="gianhap">  
          	<?php echo $row['soluongnhap']; ?>
          </td>
          <td id="tongtien">  
          	<?php echo $row['dongia']; ?>
          </td>
          <td id="tongtien">  
          	<?php echo $row['soluongnhap']*$row['dongia']; ?>
          </td>
        </tr>

		<?php

		}


	}
?>