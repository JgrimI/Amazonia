<?php 
	if(isset($_GET['menu'])){
		if ($_GET['menu']=='home'){
			include_once('AdminModule/home.php');
		}
        if ($_GET['menu']=='edit'){
			include_once('AdminModule/edit.php');
		}
	} else {
		include_once('AdminModule/home.php');
	}
 ?>

