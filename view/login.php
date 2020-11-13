<?php
if(isset($_POST['login'])){

    require_once('../business/ManageUser.php');
    require_once('../business/ManageAdmin.php');
    require_once('../persistence/util/Connection.php');
    require_once('util.php');

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
        echo printMessageWithRedirect("Welcome to Amazonia en Linea ".$validUser->getName(),"","success","user.php");

    }
    if(!isset($_SESSION['cod_user'])){
        ManageAdmin::setConnectionBD($connection);
        $validUser=ManageAdmin::login($email, $password);

        if ($validUser != '') {
            $_SESSION['email_user']=$email;
            $_SESSION['cod_user'] = $validUser->getId();
            $_SESSION['name_user'] = $validUser->getName();
            $_SESSION['redirect']='admin.php';
            echo printMessageWithRedirect("Welcome to Amazonia en Linea ".$validUser->getName(),"","success","admin.php");
            
        }else {
            echo printMessageWithRedirect("Invalid User","","error","?menu=signin");
        }
    }

    mysqli_close($connection);
}
?>
<!-- Start: Page Banner -->
<section class="page-banner services-banner">
    <div class="container">
        <div class="banner-header">
            <h2>Signin</h2>
            <span class="underline center"></span>
            <p class="lead">Proin ac eros pellentesque dolor pharetra tempo.</p>
        </div>
        <div class="breadcrumb">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li>Signin</li>
            </ul>
        </div>
    </div>
</section>
<!-- End: Page Banner -->
<!-- Start: Cart Section -->
<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <div class="signin-main">
                <div class="container">
                    <div class="woocommerce">
                        <div class="woocommerce-login">
                            <div class="company-info signin-register">
                                <div class="col-md-5 col-md-offset-1 border-dark-left">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="company-detail bg-dark margin-left">
                                                <div class="signin-head">
                                                    <h2>Sign in</h2>
                                                    <span class="underline left"></span>
                                                </div>
                                                <form class="login" method="post">
                                                    <input type="text" id="email" name="email" class="input-text" required placeholder="Email">
                                                    <input type="password" id="password" name="password" class="input-text" required placeholder="Password">
                                                    <div class="password-form-row">
                                                        <br>
                                                        <p class="lost_password">
                                                            <a href="#">Lost your Password?</a>
                                                        </p>
                                                    </div>
                                                    <input type="submit" value="Login" style="margin-top: 1%;" name="login" class="button btn btn-default">
                                                </form>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5 border-dark new-user">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="company-detail new-account bg-light margin-right">
                                                <div class="new-user-head">
                                                    <h2>Create New Account</h2>
                                                    <br>
                                                </div>
                                                <form class="login" method="post" action="register.php">
                                                    <input type="text" id="name" name="name" class="input-text" required placeholder="Name" style="margin-top:4%;">
                                                    <input type="text" id="email" name="email" class="input-text" required placeholder="Email">
                                                    <input type="password" id="password" name="password" class="input-text" required placeholder="Password" >
                                                    <div class="clear"></div>
                                                    <input type="submit" value="Signup" name="signup" class="button btn btn-default">
                                                    <div class="clear"></div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<!-- End: Cart Section -->

<!-- Start: Social Network -->
<section class="social-network section-padding">
</section>
<!-- End: Social Network -->