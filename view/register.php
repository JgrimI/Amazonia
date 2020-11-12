<?php
session_start();

require_once('../business/ManageUser.php');
require_once('../business/User.php');

require_once('../persistence/util/Connection.php');
$con= new Connection;
$connection=$con->conectBD();
$email=$_POST["email"];
$password=$_POST["password"];
$name=$_POST['name'];

if($connection->connect_error){
	die("Problema de conexión con la base de datos: ".$connection->connect_error);
}
ManageUser::setConnectionBD($connection);
$validUser=ManageUser::consultByMail($email);
if($validUser->getId()!=''){
	echo '<script language="javascript">alert("The mail is already registered");
			window.location.href="signin.html"
			</script>';
}else{
	$user=new User();
	$user->setEmail($email);
	$user->setPassword($password);
	$user->setName($name);
	$user->setStatus('activo');
	
	ManageUser::createUser($user);

	echo '<script language="javascript">alert("Congratulations, your account was created successfully");
			window.location.href="index-2.html"
			</script>';
}



mysqli_close($connection);


?>
