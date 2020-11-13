<?php
require_once('../business/ManageUser.php');
require_once('../persistence/util/Connection.php');

$con = new Connection();
$connection = $con->conectBD();

ManageUser::setConnectionBD($connection);
$users = ManageUser::listAll();
$table='<table class="table" id="myTable"><thead><th>Name</th><th>Email</th><th>Status</th><th>Actions</th></thead><tbody>';
foreach($users as $user){
    $ico=($user->getStatus()=='activo') ? 'Active <i class="fa fa-check" style="color:green;"></i>' : 'Inactive <i class="fa fa-times"></i>';
    $table.='<tr><td>'.$user->getName().'</td><td>'.$user->getEmail().'</td><td><center>'.$ico.'</center></td><td><center><button class="btn btn-primary" style="width:30%;height:12px;">Disabled</button></center></td></tr>';
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