<?php
require_once('../business/ManageBook.php');
require_once('../business/ManagePresentation.php');
require_once('../business/ManageScienceArticle.php');
require_once('../persistence/util/Connection.php');

$con = new Connection();
$connection = $con->conectBD();

ManageBook::setConnectionBD($connection);
$books = ManageBook::listAll();
$countbook = 0; 
$table='<table class="table" id="myTable"><thead><th>Title</th><th>Authors</th><th>DatePublished</th><th>Document type</th><th>Status</th></thead><tbody>';
foreach($books as $book){
    $ico=($book->getAvailable()=='Y') ? '<button class="btn1" id="btn'.$countbook.'" onclick="setColor(this.id)"><i class="fa fa-check" style="color:green;"></i></button>' : '<button class="btn2" id="btn'.$countbook.'" onclick="setColor(this.id)"><i class="fa fa-times" style="color:red;"></i></button>';
    $table.='<tr><td>'.$book->getTitle().'</td><td>'.$book->getAuthors().'</td><td>'.$book->getDatePublished().'</td><td>Book</td><td>'.$ico.'</td></tr>';
    $countbook++;
}


ManagePresentation::setConnectionBD($connection);
$books = ManagePresentation::listAll();

foreach($books as $book){
    $ico=($book->getAvailable()=='Y') ? '<button class="btn1" id="btn'.$countbook.'" onclick="setColor(this.id)"><i class="fa fa-check" style="color:green;"></i></button>' : '<button class="btn2" id="btn'.$countbook.'" onclick="setColor(this.id)"><i class="fa fa-times" style="color:red;"></i></button>';
    $table.='<tr><td>'.$book->getTitle().'</td><td>'.$book->getAuthors().'</td><td>'.$book->getDatePublished().'</td><td>Book</td><td>'.$ico.'</td></tr>';
    $countbook++;
}

ManageScienceArticle::setConnectionBD($connection);
$book = ManageScienceArticle::listAll();
foreach($books as $book){
    $ico=($book->getAvailable()=='Y') ? '<button class="btn1" id="btn'.$countbook.'" onclick="setColor(this.id)"><i class="fa fa-check" style="color:green;"></i></button>' : '<button class="btn2" id="btn'.$countbook.'" onclick="setColor(this.id)"><i class="fa fa-times" style="color:red;"></i></button>';
    $table.='<tr><td>'.$book->getTitle().'</td><td>'.$book->getAuthors().'</td><td>'.$book->getDatePublished().'</td><td>Book</td><td>'.$ico.'</td></tr>';
    $countbook++;
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

    function setColor(b) {
        var bu = document.getElementById(b);
        if(bu.className == "btn1") {
            bu.className = "btn2";
            bu.innerHTML = "<i class=\"fa fa-times\" style=\"color:red;\"></i>";
       }
       else if(bu.className == "btn2"){
            bu.className = "btn1";
            bu.innerHTML = "<i class=\"fa fa-check\" style=\"color:green;\"></i>";  
       }
            
    }
</script>
<!-- End: Products Section -->

<!-- Start: Social Network -->
<section class="social-network section-padding">
</section>