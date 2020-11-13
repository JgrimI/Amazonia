<?php
require_once('../business/ManageBook.php');
require_once('../business/ManagePresentation.php');
require_once('../business/ManageScienceArticle.php');
require_once('../persistence/util/Connection.php');


if ($_POST["mess"]) {
    $cod = $_POST["mess"];
    $type = $_POST["type"];
    $con = new Connection();
    $connection = $con->conectBD();
    if ($type == 0) {
        ManageBook::setConnectionBD($connection);
        $book = ManageBook::consult($cod);

        $name = $book->getTitle();
        $author = $book->getAuthors();
        $date = $book->getDatePublished();
        $isbn = $book->getIsbn();
        $publisher = $book->getEditorial();
        $pages = $book->getNumPages();
        $desciption = $book->getDescription();
        $cover = $book->getUrl();
        $lenght = "<p><strong>Lenght:</strong>$pages</p>";
        $isnn = "ISBN:";
        $icon = "yellow-icon";
    } elseif ($type == 1) {
        ManagePresentation::setConnectionBD($connection);
        $book = ManagePresentation::consult($cod);

        $name = $book->getTitle();
        $author = $book->getAuthors();
        $isbn = $book->getIsbn();
        $publisher = $book->getEditorial();
        $date = $book->getDatePublished();
        $congress = $book->getCongressName();
        $desciption = $book->getDescription();
        $cover = $book->getUrl();
        $lenght = "<p><strong>Congress Name:</strong>$congress</p>";
        $isnn = "ISBN:";
        $icon = "red-icon";
    } elseif ($type == 2) {
        ManageScienceArticle::setConnectionBD($connection);
        $book = ManageScienceArticle::consult($cod);

        $name = $book->getTitle();
        $author = $book->getAuthors();
        $date = $book->getDatePublished();
        $isbn = $book->getSSN();
        $publisher = $book->getEditorial();
        $desciption = $book->getDescription();
        $cover = $book->getUrl();

        $icon = "light-green-icon";
        $lenght = "";
        $isnn = "SNN:";
    }
} else {
    header('Location: user.php');
}

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
            <h2>Books & Media Listing</h2>
            <span class="underline center"></span>
            <p class="lead">Proin ac eros pellentesque dolor pharetra tempo.</p>
        </div>
        <div class="breadcrumb">
            <ul>
                <li><a href="?menu=home">Home</a></li>
                <li><a href="?menu=books">Books & Media</a></li>

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
                                    <div class="book-list-icon <?php echo $icon; ?>"></div>
                                    <img src="<?php echo $cover; ?>" alt="Book Image">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-7 col-md-6">

                                <div class="post-center-content">
                                    <h2><?php echo $name; ?></h2>
                                    <p><strong>Author: </strong><?php echo $author; ?> </p>
                                    <p><strong>Date Published: </strong><?php echo $date; ?> </p>
                                    <p><strong> <?php echo $isnn; ?></strong> <?php echo $isbn; ?></p>
                                    <p><strong>Publisher: </strong><?php echo $publisher; ?></p>
                                    <?php echo $lenght; ?>
                                    <div class="actions">
                                        <ul>
                                            <li>


                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-3 ">
                                <div class="post-right-content">
                                    <h4>Available now</h4>
                                    <p><strong>Holds:</strong> 01</p>
                                    <p><strong>On the shelves now at:</strong> Lawrence Public Library</p>
                                    <p><strong>Call #:</strong> 747 STRUTT C</p>
                                    <a href="#." class="btn btn-dark-gray">Place a Hold</a>
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