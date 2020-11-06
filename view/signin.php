<?php
session_start();

require_once('../business/ManageUser.php');

require_once('../persistence/util/Connection.php');
$con= new Connection;
$connection=$con->conectBD();
$email=$_POST["email"];
$password=$_POST["password"];

if($connection->connect_error){
	die("Problema de conexión con la base de datos: ".$connection->connect_error);
}
ManageUser::setConnectionBD($connection);
$validUser=ManageUser::login($email, $password);

if ($validUser != '') {
	$_SESSION['email_user']=$email;
	$_SESSION['cod_user'] = $validUser->getId();
	$_SESSION['name_user'] = $validUser->getName();
	$_SESSION['status'] = $validUser->getStatus();
	$_SESSION['permits'] = $validUser->getPermits();
	echo '<script language="javascript">alert("Welcome to Amazonia en Linea");
			window.location.href="index-2.html"
			</script>';
}else {
	echo '<script language="javascript">alert("Invalid User");
	window.location.href="signin.html"
	</script>';
}

mysqli_close($connection);


?>
