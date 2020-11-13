<?php
require_once('../business/ManageBook.php');
require_once('../business/ManagePresentation.php');
require_once('../business/ManageScienceArticle.php');
require_once('../persistence/util/Connection.php');

$con = new Connection();
$connection = $con->conectBD();

ManageBook::setConnectionBD($connection);
$books = ManageBook::listAll();
$table='<table class="table" id="myTable"><thead><th>Title</th><th>Authors</th><th>DatePublished</th><th>Document type</th><th>Status</th></thead><tbody>';
foreach($books as $book){
    $ico=($book->getAvailable()=='Y') ? '<i class="fa fa-check" style="color:green;"></i>' : '<i class="fa fa-times" style="color:red;"></i>';
    $table.='<tr><td>'.$book->getTitle().'</td><td>'.$book->getAuthors().'</td><td>'.$book->getDatePublished().'</td><td>Book</td><td>'.$ico.'</td></tr>';
}


ManagePresentation::setConnectionBD($connection);
$books = ManagePresentation::listAll();

foreach($books as $book){
    $ico=($book->getAvailable()=='Y') ? '<i class="fa fa-check" style="color:green;"></i>' : '<i class="fa fa-times" style="color:red;"></i>';
    $table.='<tr><td>'.$book->getTitle().'</td><td>'.$book->getAuthors().'</td><td>'.$book->getDatePublished().'</td><td>Paper</td><td>'.$ico.'</td></tr>';
}

ManageScienceArticle::setConnectionBD($connection);
$book = ManageScienceArticle::listAll();
foreach($books as $book){
    $ico=($book->getAvailable()=='Y') ? '<i class="fa fa-check" style="color:green;"></i>' : '<i class="fa fa-times" style="color:red;"></i>';
    $table.='<tr><td>'.$book->getTitle().'</td><td>'.$book->getAuthors().'</td><td>'.$book->getDatePublished().'</td><td>Science Article</td><td>'.$ico.'</td></tr>';
}
$table.='</tbody></table>';


?>
<style>
    .navbar-default .navbar-nav>.books>a,
    .navbar-default .navbar-nav>.books>a:hover,
    .navbar-default .navbar-nav>.books>a:focus {
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
            <h2>Documents</h2>
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
            <div class="booksmedia-detail-main">
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