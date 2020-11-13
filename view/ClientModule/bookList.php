<?php

require_once('../business/ManageBook.php');
require_once('../persistence/util/Connection.php');

$con = new Connection();
$connection = $con->conectBD();

ManageBook::setConnectionBD($connection);
$books = ManageBook::listAll();

?>
<style>
    .navbar-default .navbar-nav>.books>a,
    .navbar-default .navbar-nav>.books>a:hover,
    .navbar-default .navbar-nav>.books>a:focus {
        color: #ff7236;
        background-color: transparent;
    }

    .pagination {
        margin: 20px 0;
        overflow: hidden;
        position: relative;
    }

    .pagination li {
        float: left;
    }

    .pagination ul {
        float: left;
        left: 50%;
        position: relative;
    }

    .pagination ul>li {
        left: -50%;
        position: relative;
    }

    .light-theme .current {
        background: #ff7236;
        color: #FFF;
        border-color: #ff7236;
    }

    .light-theme a,
    .light-theme span {
        float: left;
        color: #666;
        font-size: 20px;
        line-height: 34px;
        font-weight: bolder;
        text-align: center;
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
                <li><a href="index-2.html">Home</a></li>
                <li>Books & Media</li>
            </ul>
        </div>
    </div>
</section>
<!-- End: Page Banner -->

<!-- Start: Products Section -->
<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <div class="books-full-width">
                <div class="container">
                    <!-- Start: Search Section -->
                    <section class="search-filters">
                        <div class="filter-box">
                            <h3>What are you looking for at the library?</h3>
                            <form action="bookList.php" method="get">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
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
                        <div class="clear"></div>
                    </section>
                    <!-- End: Search Section -->
                    <div class="pagination">
                        <div id="page-nav" class="page-nav"></div>
                    </div>
                    <div class="booksmedia-fullwidth">
                        <ul>
                            <?php
                          
                            if (count($books) == 0) {
                            } else {
                                $no = 1;
                                foreach ($books as $b) {
                                    echo '<li class="paginate">
                                                <div class="book-list-icon red-icon"></div>
                                                <figure>
                                                <form id="form1" target="_blank" action="?menu=details" method="post">
                                                    <a href="javascript:;" onclick="document.getElementById('."'form1'".').submit();">
                                                     <img src="' . $b->getUrl() . '" alt="Book"></a>
                                                    <input type="hidden" name="mess" value="'.$b->getId().'"/>
                                                   
                                                </form>
                                                    <figcaption>
                                                        <header>
                                                            <h4><a href="books-media-detail-v2.html">' . $b->getTitle() . '</a></h4>
                                                            <p><strong>Author:</strong> ' . $b->getAuthors() . '</p>
                                                            <p><strong>ISBN:</strong>' . $b->getISBN() . '</p>
                                                        </header>
                                                        <p>' . $b->getDescription() . '</p>
                                                        <div class="actions">
                                                            <ul>
                                                                <li>
                                                                    <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="Add TO CART">
                                                                        <i class="fa fa-shopping-cart"></i>
                                                                    </a>
                                                                </li>
        
                                                            </ul>
                                                        </div>
                                                    </figcaption>
                                                </figure>
                                            </li>';
                                }
                            }
                            ?>
                        </ul>
                    </div>

                    <div class="pagination">
                        <div id="page-nav" class="page-nav"></div>
                    </div>
                </div>
                <!-- Start: Staff Picks -->
                <!-- End: Staff Picks -->
            </div>
        </main>
    </div>
</div>
<!-- End: Products Section -->
<section class="social-network section-padding">
</section>
<script type="text/javascript" src="jquery.simplePagination.js"></script>
<script type="text/javascript">
    jQuery(function($) {
        // Grab whatever we need to paginate
        var pageParts = $(".paginate");

        // How many parts do we have?
        var numPages = pageParts.length;
        // How many parts do we want per page?
        var perPage = 9;

        // When the document loads we're on page 1
        // So to start with... hide everything else
        pageParts.slice(perPage).hide();
        // Apply simplePagination to our placeholder
        $(".page-nav").pagination({
            items: numPages,
            itemsOnPage: perPage,
            // We implement the actual pagination
            //   in this next function. It runs on
            //   the event that a user changes page
            onPageClick: function(pageNum) {
                // Which page parts do we show?
                var start = perPage * (pageNum - 1);
                var end = start + perPage;

                // First hide all page parts
                // Then show those just for our page
                pageParts.hide()
                    .slice(start, end).show();
            }
        });
    });
</script>