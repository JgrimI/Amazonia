<div data-ride="carousel" class="carousel slide" id="home-v1-header-carousel">
<?php
include_once('graphics.php');
?>
<script>
   window.onload=function(){
    graf();
  };
</script>

    <!-- Carousel slides -->
    <div class="carousel-inner">
        <div class="item active">
        
            <figure>
                <img alt="Home Slide" src="https://trello-backgrounds.s3.amazonaws.com/SharedBackground/2400x1600/f83251a75f09041fa31badbdf2cab8d4/photo-1604213410393-89f141bb96b8.jpg" />
            </figure>
            <div class="container">
                <div class="carousel-caption">
                    <h3>Amazonias</h3>
                    <h2>Libraries and bookstores:</h2>
                    <p>between inheritances and future</p>

                </div>
            </div>
        </div>
        <div class="item">
            <figure>
                    <img alt="Home Slide" src="https://trello-backgrounds.s3.amazonaws.com/SharedBackground/2400x1600/f83251a75f09041fa31badbdf2cab8d4/photo-1604213410393-89f141bb96b8.jpg" />
                </figure>
                <div class="container">
                    <div class="carousel-caption">
                        <h3>Amazonias</h3>
                        <h2>Libraries and bookstores:</h2>
                        <p>between inheritances and future</p>
    
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#home-v1-header-carousel" data-slide="prev"></a>
    <a class="right carousel-control" href="#home-v1-header-carousel" data-slide="next"></a>
</div>
<!-- End: Slider Section -->

<!-- Start: Search Section -->
<section class="search-filters">
    <div class="container">
        <div class="filter-box">
            <h3>What are you looking for at the library?</h3>
            <form action="?menu=books" method="post">
                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <input class="form-control" placeholder="Search by Keyword" id="keywords" name="keywords" type="text">
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="form-group">
                        <select name="t" id="t" class="form-control">
                            <option>Search the Catalog</option>
                            <option value="book">Books</option>
                            <option value="presentation">Lectures</option>
                            <option value="sa">Scientific Articles</option>
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

<!-- Start: Welcome Section -->
<section class="welcome-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="welcome-wrap">
                <div class="container">
            
              <div class="col-md-6">
                <div class="grid">
                  <div class="grid-body">
                    <h3>Active Users graphic </h3>
                    <div class="item-wrapper">
                      <canvas id="donut-graphic1" width="600" height="400"></canvas>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="grid">
                  <div class="grid-body">
                    <h3>Documents number graphic</h3>
                    <div class="item-wrapper">
                      <canvas id="bar-graphic1" width="600" height="400"></canvas>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="col-md-6">
                <div class="grid">
                  <div class="grid-body">
                    <h3>Bookings Graphic </h3>
                    <div class="item-wrapper">
                      <canvas id="bar-graphic2" width="600" height="400"></canvas>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="grid">
                  <div class="grid-body">
                    <h3>Documents number graphic</h3>
                    <div class="item-wrapper">
                      <canvas id="hartjs-staked-area-chart" width="600" height="400"></canvas>
                    </div>
                  </div>
                </div>
              </div>


            </div>
        </div>
</section>
<!-- End: Welcome Section -->

<!-- Start: Features -->
<section class="features">
    <div class="container">
        <ul>
        <li class="bg-yellow">
                <div class="feature-box">
                    <i class="yellow"></i>
                    <h3>Books</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dolor turpis,
                        pulvinar varius dui id, convallis iaculis eros.</p>
                    <form action="?menu=books" method="post" id="form1">
                    <input type="hidden" name="t" id="t" value="book">
                    <input type="hidden" name="keywords" id="keywords">
                    <a href="javascript:void(0);" class="yellow" onclick="document.getElementById('form1').submit();">View Selection <i class="fa fa-long-arrow-right"></i></a>
                    </form>

                </div>
            </li>
            <li class="bg-light-green">
                <div class="feature-box">
                    <i class="light-green"></i>
                    <h3>Lectures</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dolor turpis,
                        pulvinar varius dui id, convallis iaculis eros.</p>
                    <form action="?menu=books" method="post" id="form2">
                        <input type="hidden" name="t" id="t" value="presentation">
                        <input type="hidden" name="keywords" id="keywords">
                        <a href="javascript:void(0);" class="yellow" onclick="document.getElementById('form2').submit();">View Selection <i class="fa fa-long-arrow-right"></i></a>
                    </form>
                </div>
            </li>
            <li class="bg-red">
                <div class="feature-box">
                    <i class="red"></i>
                    <h3>Scientific Articles</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dolor turpis,
                        pulvinar varius dui id, convallis iaculis eros.</p>
                    <form action="?menu=books" method="post" id="form3">
                        <input type="hidden" name="t" id="t" value="sa">
                        <input type="hidden" name="keywords" id="keywords">
                        <a href="javascript:void(0);" class="yellow" onclick="document.getElementById('form3').submit();">View Selection <i class="fa fa-long-arrow-right"></i></a>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</section>
<!-- End: Features -->