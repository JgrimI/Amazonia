<?php
require_once('../business/ManageUser.php');
require_once('../persistence/util/Connection.php');

$con = new Connection();
$connection = $con->conectBD();

ManageUser::setConnectionBD($connection);

if(isset($_POST["cod"])){
    $php=$_POST['cod'];
        $aux = ManageUser::consult($php);
        if($aux->getStatus()=='activo'){
            $aux->setStatus('inactivo');
            ManageUser::modify($aux);
        }
        else{
            $aux->setStatus('activo');
            ManageUser::modify($aux);   
        }
    }
    



$users = ManageUser::listAll();
$table='<table class="table" id="myTable"><thead><th>Name</th><th>Email</th><th>Status</th></thead><tbody>';
foreach($users as $user){
    $ico=($user->getStatus()=='activo') ? '<form method="POST" ><input type="hidden" name="cod" value="'.$user->getId().'"><input type="hidden" name="tipo" value="book"><button class="btn1" type="submit"><i style="color:green;">Enabled</i></button></form>' : '<form method="POST" ><input type="hidden" name="cod" value="'.$user->getId().'"><input type="hidden" name="tipo" value="book"><button class="btn2" type="submit"><i style="color:red;">Disabled</i></button></form>';;
    $table.='<tr><td>'.$user->getName().'</td><td>'.$user->getEmail().'</td><td>'.$ico.'</td></tr>';
}
$table.='</tbody></table>';


?>
<style>
    .navbar-default .navbar-nav>.users>a,
    .navbar-default .navbar-nav>.users>a:hover,
    .navbar-default .navbar-nav>.users>a:focus {
        color: #ff7236;
        background-color: transparent;
    }

    .detailed-box .post-thumbnail {
        display: inline-block;
        float: left;
        margin: 0px -15px 0px -15px;
        position: relative;
        padding: 0px;
        vertical-align: top;
    }

    .col-md-3 {
        width: 22%;
    }
    .button {
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}

.btn1 {
  background-color: white; 
  color: black; 
  border: 2px solid #1bcc00;
}

.btn1:hover {
  background-color: #1bcc00;
  color: white;
}

.btn2 {
  background-color: white; 
  color: black; 
  border: 2px solid #ff4040;
}

.btn2:hover {
  background-color: #ff4040;
  color: white;
}
</style>
<!-- Start: Page Banner -->
<section class="page-banner services-banner">
    <div class="container">
        <div class="banner-header">
            <h2>Users</h2>
            <span class="underline center"></span>
        </div>
        <div class="breadcrumb">
            <ul>
                <li><a href="?menu=home">Home</a></li>
            </ul>
        </div>
    </div>
</section>
<!-- End: Page Banner -->

<!-- Start: Products Section -->
<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <div class="usersmedia-detail-main">
                <div class="container">
                    <br><br>
                    <?php echo $table; ?>
                </div>
            </div>
        </main>
    </div>
</div>
<script>
$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
<!-- End: Products Section -->

<!-- Start: Social Network -->
<section class="social-network section-padding">
</section>