<?php
	require_once("config.php");

	function compacts($view,array $data = [])
	{
		return require($view.".php");	
	}

	function insert($table,$truong,$value,$conn){
		$sql = "INSERT INTO $table($truong) VALUES ($value)";
		$run = mysqli_query($conn,$sql);

		if($run){

			return true;
		}else{
			return false;
		}
	}

	function selectAll($table,$id,$conn){
		$sql = "SELECT * FROM $table ORDER BY $id DESC";
		$run = mysqli_query($conn,$sql);
		$selectAll = array();

		while ($row = mysqli_fetch_array($run)) {
			$selectAll[] = $row;
		}
		return $selectAll;
	}

	function selectJoin2($table1,$table2,$pointCommant,$id,$conn){

		$sql = "SELECT * FROM $table1
                INNER JOIN $table2 ON $table1.$pointCommant = $table2.$pointCommant
                ORDER BY $table1.$id DESC
                ";
        $run = mysqli_query($conn,$sql);
		$selectAll = array();

		while ($row = mysqli_fetch_array($run)) {
			$selectAll[] = $row;
		}
		return $selectAll;
	}

	function selectJoin3($table1,$table2,$table3,$id,$conn){
		$sql = "SELECT * FROM $table1
				INNER JOIN $table2 ON $table1.id_theloai = $table2.id
				INNER JOIN $table3 ON $table1.id_tacgia = $table3.id
				ORDER BY $table1.$id DESC
				";
		$run = mysqli_query($conn,$sql);
		$selectAll = array();

		while ($row = mysqli_fetch_array($run)) {
			$selectAll[] = $row;
		}
		return $selectAll;
	}

	// $table1 = "phieuhoadon";
	// $idtable1 = "maphieuhoadon";
	// $id2table1 = "makhachhang";

	// $table2 = "chitietphieuhoadon";
	// $idtable2 = "maphieuhoadon";

	// $table3 = "khachhang";
	// $idtable3 = "makhachhang";

	function selectJoin3New($table1,$idtable1,$id2table1,$table2,$table3,$conn){
		$sql = "SELECT * FROM $table1 
				INNER JOIN $table2 ON $table1.$idtable1 = $table2.$idtable1
				INNER JOIN $table3 ON $table1.$id2table1 = $table3.$id2table1
				";
		$run = mysqli_query($conn,$sql);
		$selectAll = array();

		while ($row = mysqli_fetch_array($run)) {
			$selectAll[] = $row;
		}
		return $selectAll;
	}

	function selectJoin3NewDetails($table1,$idtable1,$id2table1,$table2,$table3,$conn,$id){
		$sql = "SELECT * FROM $table1 
				INNER JOIN $table2 ON $table1.$idtable1 = $table2.$idtable1
				INNER JOIN $table3 ON $table1.$id2table1 = $table3.$id2table1
				WHERE $table1.$idtable1 = $id;
				";
		$run = mysqli_query($conn,$sql);
		$selectAll = array();

		while ($row = mysqli_fetch_array($run)) {
			$selectAll[] = $row;
		}
		return $selectAll;
	}

	function deleteId($table,$dk,$id,$conn){
		$sql = "DELETE FROM $table WHERE $table.$dk = $id";
		return mysqli_query($conn,$sql);
	}


?>