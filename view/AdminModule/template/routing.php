<?php 
	if(isset($_GET['menu'])){
		if ($_GET['menu']=='home'){
			include_once('AdminModule/home.php');
		}
        if ($_GET['menu']=='books'){
			include_once('AdminModule/bookList.php');
		}
		if ($_GET['menu']=='details'){
			include_once('AdminModule/bookDetails.php');
		}
		if ($_GET['menu']=='newBook'){
			include_once('AdminModule/newBook.php');
		}
	} else {
		include_once('AdminModule/home.php');
	}
 ?>

