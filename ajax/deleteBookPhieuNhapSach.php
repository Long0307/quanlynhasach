<?php
session_start();
if(isset($_POST['masach'])){

	print_r($_SESSION['upandins_pns']);

	foreach ($_SESSION['upandins_pns'] as $key => $value) {

		if($_POST['masach'] == $key){
			unset($_SESSION['upandins_pns'][$key]);
		}


	}	
	print_r($_SESSION['upandins_pns']);
}
?>