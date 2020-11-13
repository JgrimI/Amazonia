<?php
session_start();

require_once('../business/ManageUser.php');
require_once('../business/ManageAdmin.php');
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
	$_SESSION['redirect']='user.php';
	echo '<script language="javascript">alert("Welcome to Amazonia en Linea");
			window.location.href="user.php"
		  </script>';
}

ManageAdmin::setConnectionBD($connection);
$validUser=ManageAdmin::login($email, $password);

if ($validUser != '') {
	$_SESSION['email_user']=$email;
	$_SESSION['cod_user'] = $validUser->getId();
	$_SESSION['name_user'] = $validUser->getName();
	$_SESSION['redirect']='admin.php';
	echo '<script language="javascript">alert("Welcome to Amazonia en Linea");
			window.location.href="admin.php"
		  </script>';
}else {
	echo '<script language="javascript">alert("Invalid User");
	window.location.href="?menu=signin"
	</script>';
}

mysqli_close($connection);

?>
