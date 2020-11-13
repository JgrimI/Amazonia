<?php
require_once('../business/ManageBook.php');
require_once('../persistence/util/Connection.php');

$cod = $_POST["mess"];

$con = new Connection();
$connection = $con->conectBD();

ManageBook::setConnectionBD($connection);
$book = ManageBook::consult($cod);

$name = $book->getTitle();
$author = $book->getAuthors();
$isbn = $book->getIsbn();
$publisher = $book->getEditorial();
$pages = $book->getNumPages();
$desciption = $book->getDescription();
$cover = $book->getUrl();
?>
<style>
    .navbar-default .navbar-nav>.books>a,
    .navbar-default .navbar-nav>.books>a:hover,
    .navbar-default .navbar-nav>.books>a:focus {
        color: #ff7236;
        background-color: transparent;
    }
</style>
<!-- Start: Page Banner -->
<section class="page-banner services-banner">
    <div class="container">
        <div class="banner-header">
            <h2>Books & Media Listing</h2>
            <span class="underline center"></span>
            <p class="lead">Proin ac eros pellentesque dolor pharetra tempo.</p>
        </div>
        <div class="breadcrumb">
            <ul>
                <li><a href="?menu=home">Home</a></li>
                <li><a href="?menu=home">Books & Media</a></li>

                <li><?php echo $name; ?></li>
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
                    <div class="row">
                        <!-- Start: Search Section -->
                        <section class="search-filters">
                            <div class="container">
                                <div class="filter-box">
                                    <h3>What are you looking for at the library?</h3>
                                    <form action="http://libraria.demo.presstigers.com/index.html" method="get">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label class="sr-only" for="keywords">Search</label>
                                                <input class="form-control" placeholder="Search by Keyword" id="keywords" name="keywords" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <div class="form-group">
                                                <select name="catalog" id="catalog" class="form-control">
                                                    <option>Search the Catalog</option>
                                                    <option>Books</option>
                                                    <option>Lectures</option>
                                                    <option>Scientific Articles</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-6">
                                            <div class="form-group">
                                                <input class="form-control" type="submit" value="Search">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </section>
                        <!-- End: Search Section -->
                    </div>
                    <div class="booksmedia-detail-box">
                        <div class="detailed-box">
                            <div class="col-xs-12 col-sm-5 col-md-3">
                                <div class="post-thumbnail">
                                    <div class="book-list-icon red-icon"></div>
                                    <img src="<?php echo $cover; ?>" alt="Book Image">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-7 col-md-6">

                                <div class="post-center-content">
                                    <h2><?php echo $name; ?></h2>
                                    <p><strong>Author:</strong><?php echo $author; ?> </p>
                                    <p><strong>ISBN:</strong> <?php echo $isbn; ?></p>
                                    <p><strong>Publisher:</strong><?php echo $publisher; ?></p>
                                    <p><strong>Length:</strong><?php echo $pages; ?></p>
                                    <div class="actions">
                                        <ul>
                                            <li>
                                                <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="" data-original-title="Add To Cart">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </a>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-3 ">
                                <div class="post-right-content">
                                    <h4>Available now</h4>
                                    <p><strong>Total Copies:</strong> 01</p>
                                    <p><strong>Available:</strong> 019780062419385</p>
                                    <p><strong>Holds:</strong> 01</p>
                                    <p><strong>On the shelves now at:</strong> Lawrence Public Library</p>
                                    <p><strong>Call #:</strong> 747 STRUTT C</p>
                                    <a href="#." class="available-location">Availability by Location <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                                    <a href="#." class="btn btn-dark-gray">Place a Hold</a>
                                    <a href="#." class="btn btn-dark-gray">View sample</a>
                                    <a href="#." class="btn btn-dark-gray">Find Similar Titles</a>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                        <p><strong>Summary:</strong><?php echo $desciption; ?> </p>


                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<!-- End: Products Section -->

<!-- Start: Social Network -->
<section class="social-network section-padding">
</section>