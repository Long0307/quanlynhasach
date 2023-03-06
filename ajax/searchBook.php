<?php
require_once("../config.php");

	if(isset($_POST['keyword'])){
		$keyword = $_POST['keyword'];

		$sql = "SELECT * FROM sach
				INNER JOIN theloai ON sach.id_theloai = theloai.id
				INNER JOIN tacgia ON sach.id_tacgia = tacgia.id
				WHERE sach.tensach LIKE '$keyword'
				OR tacgia.tentacgia LIKE '$keyword' 
				OR theloai.tentheloai LIKE '$keyword'
				OR sach.nhaxuatban LIKE '$keyword'
				OR sach.namxuatban LIKE '$keyword'
				";
		$run = mysqli_query($conn,$sql);
		$selectAll = array();
		$i = 0;
		while ($row = mysqli_fetch_array($run)) {
			$i++;
			?>
			 <tr>
        <th scope="row"><?php echo $i; ?></th>
        <td>  
          <?php echo $row['tensach']; ?>
        </td>
        <td>  
          <?php echo $row['tentheloai']; ?>
        </td>
        <td>  
          <?php echo $row['tentacgia']; ?>
        </td>
         <td>  
          <?php echo $row['nhaxuatban']; ?>
        </td>
        <td>  
          <?php echo $row['namxuatban']; ?>
        </td>
        <td>  
          <?php echo $row['soluongton']; ?>
        </td>
        <td>  
          <?php echo number_format($row['dongia'], 0, '', ',')." VNĐ"; ?>
        </td>
      </tr>
			<?php
		}
	}
?>