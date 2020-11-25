<?php
require_once('../business/ManageUser.php');
require_once('../business/ManageAdmin.php');
require_once('../persistence/util/Connection.php');
require_once('../business/User.php');
require_once('util.php');

if (isset($_POST['add'])) {
    $con = new Connection;
    $connection = $con->conectBD();
    $email = $_POST["email"];
    $password = $_POST["password"];
    $name = $_POST['name'];
    $tipo = $_POST['tipo'];
  
    if($tipo == 'admin'){
        ManageAdmin::setConnectionBD($connection);
        $validAdmin = ManageAdmin::consultByMail($email);

        if ($validAdmin->getId() != '') {
            echo printMessage("Error!!", "The mail is already registered", "error");
        } else {
            $admin = new Administrator();
            $admin->setEmail($email);
            $admin->setPassword($password);
            $admin->setName($name);
            $admin->setStatus('inactivo');
    
            ManageAdmin::createAdmin($admin);
    
            $admin = ManageAdmin::consultByMail($email);
            sendMail($email, $name, $admin->getId());
    
            echo printMessage("Congratulations", "your account was created successfully", "success");
        }
        $con->turnOffBD($connection);       
    }else if($tipo == 'user'){

        ManageUser::setConnectionBD($connection);
        $validUser = ManageUser::consultByMail($email);
        if ($validUser->getId() != '') {
            echo printMessage("Error!!", "The mail is already registered", "error");
        } else {
            $user = new User();
            $user->setEmail($email);
            $user->setPassword($password);
            $user->setName($name);
            $user->setStatus('inactivo');
    
            ManageUser::createUser($user);
    
            $user = ManageUser::consultByMail($email);
            sendMail($email, $name, $user->getId());
    
            echo printMessage("Congratulations", "your account was created successfully", "success");
        }
        $con->turnOffBD($connection);       
    }
}

?>
<style>
    
    .navbar-default .navbar-nav>.home>a,
    .navbar-default .navbar-nav>.home>a:hover,
    .navbar-default .navbar-nav>.home>a:focus {
        color: #ff7236;
        background-color: transparent;
    }

    .xd {
        background-color: transparent !important;
        height: 50px;
    }

    
</style>
<!-- Start: Page Banner -->
<section class="page-banner services-banner">
    <div class="container">
        <div class="banner-header">
            <h2>Create New User</h2>
            <span class="underline center"></span>
            <p class="lead">The administrator could create new users.</p>
        </div>
        <div class="breadcrumb">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li>Create New User</li>
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
                                <div class="col-md-5 border-dark new-user">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="company-detail new-account bg-light margin-right">
                                                <div class="new-user-head">
                                                    <h2>Create New User</h2>
                                                    <br>
                                                </div>
                                                <form class="login" method="post">
                                                    <input type="text" id="name" name="name" class="input-text" required placeholder="Name" style="margin-top:4%;">
                                                    <input type="text" id="email" name="email" class="input-text" required placeholder="Email">
                                                    <input type="password" id="password" name="password" class="input-text" required placeholder="Password">
                                                    <select id="tipo" name="tipo" class="tipo" style="width:100%;" required >
                                                        <option value="admin">Administrador</option>
                                                        <option value="user">Usuario</option>
                                                    </select>                                                          
                                                    <input type="submit" value="add" name="add" id="add" class="button btn btn-default">
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