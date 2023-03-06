<?php
require_once("function.php");
require_once "config.php";

$controller = "";
if(!empty($_GET['controller'])){

	$action = "";

	if(isset($_GET['action'])){
		$action = $_GET['action'];
	}

	$id = "";

	if(isset($_GET['id'])){
		$id = $_GET['id'];
	}

	$controller = $_GET['controller'];

	if($controller == "phieunhapsach"){

		require_once("phieunhapsach.php");

	}else if($controller == "hoadon"){

		if(isset($_GET['maphieuhoadon'])){
			$maphieuhoadon = $_GET['maphieuhoadon'];
			$sql = "DELETE FROM phieuhoadon WHERE maphieuhoadon = $maphieuhoadon";
			mysqli_query($conn,$sql);
		}

		require_once("hoadon.php");

	}else if($controller == "detailhoadon"){

		require_once("detailhoadon.php");

	}else if($controller == "tracuusach"){

		require_once("danhsachsach.php");

	}else if($controller == "phieuthutien"){

		if(isset($_GET['maphieuthu'])){
			$maphieuthu = $_GET['maphieuthu'];
			$sql = "DELETE FROM phieuthutien WHERE maphieuthu = $maphieuthu";
			mysqli_query($conn,$sql);
		}	

		require_once("phieuthutien.php");

	}else if($controller == "baocaoton"){

		require_once("baocaoton.php");

	}else if($controller == "baocaocongno"){

		require_once("baocaocongno.php");

	}else if($controller == "dausach"){

		if(isset($_POST['addBook'])){

			if(($_POST['theloai'] > 0) && ($_POST['tacgia'] > 0)){

				$value = "'".$_POST['namebook']."'".","."'".$_POST['theloai']."'".","."'".$_POST['tacgia']."'".","."'".$_POST['publis_h']."'".","."'".$_POST['publis_y']."'".","."'".$_POST['price']."'";

				$result = [];

				if(insert('sach','tensach,id_theloai,id_tacgia,nhaxuatban,namxuatban,dongia',$value,$conn) == true){
					$result['success'] = "Thêm thành công";
				}else{
					$result['error'] = "Thêm thất bại";
				}
			}else{
				$result['error'] = "Thêm thất bại bạn chưa chọn thể loại hay tác giả";
			}

		}

		if(($action == "delete") && $id){
			deleteId('sach','masach',$id,$conn);

		}

		require_once("dausach.php");

	}else if($controller == "infogroup"){

		require_once("infogroup.php");

	}else if($controller == "tacgia"){

		if(isset($_POST['addauthor'])){

			$value = "'".$_POST['name']."'";
			$result = [];

			if(insert($controller,'tentacgia',$value,$conn) == true){
				$result['success'] = "Thêm thành công";
			}else{
				$result['error'] = "Thêm thất bại";
			}

		}

		if(($action == "delete") && $id){
			deleteId($controller,'id',$id,$conn);

		}

		require_once("tacgia.php");

	}else if($controller == "theloaisach"){

		if(isset($_POST['addtheloai'])){

			$value = "'".$_POST['theloai']."'";
			$result = [];

			if(insert('theloai','tentheloai',$value,$conn) == true){
				$result['success'] = "Thêm thành công";
			}else{
				$result['error'] = "Thêm thất bại";
			}

		}

		if(($action == "delete") && $id){
			deleteId('theloai','id',$id,$conn);

		}

		require_once("theloaisach.php");

	}else if($controller == "khachhang"){

		require_once("khachhang.php");

	}else if($controller == "thaydoiquydinh"){

		if(isset($_POST['change'])){
			
			$soluongnhaptoithieu = $_POST['soluongnhaptoithieu'];

			$soluongtontoithieutruockhinhap = $_POST['soluongtontoithieutruockhinhap'];

			$tongnotoida = $_POST['tongnotoida'];

			$soluongtontoithieusaukhiban = $_POST['soluongtontoithieusaukhiban'];

			$sudungquydinh4 = $_POST['sudungquydinh4'];

			$sql = "UPDATE thamso SET
			soluongnhaptoithieu = '$soluongnhaptoithieu',
			soluongtontoithieutruockhinhap = '$soluongtontoithieutruockhinhap', 
			tongnotoida = '$tongnotoida',
			soluongtontoithieusaukhiban = '$soluongtontoithieusaukhiban',
			sudungquydinh4 = '$sudungquydinh4'";
			mysqli_query($conn,$sql);
		}

		require_once("thaydoiquydinh.php");

	}



}else{
	require_once("content.php");
}
?>