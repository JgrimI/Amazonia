<div class="container">
    <div class="row">
        <nav class="navbar navbar-default">
            <div class="row">
                <div class="col-md-3">
                    <div class="navbar-header">
                        <div class="navbar-brand" style="margin-top: -65px;">
                            <h1>
                                <a href="?menu=home">
                                    <img src="images/logov1.png" alt="AMAZONÍA EN LINEA" />
                                </a>
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <!-- Header Topbar -->
                    <div class="header-topbar hidden-sm hidden-xs">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="topbar-info">
                                    <a href="tel:+61-3-8376-6284"><i class="fa fa-phone"></i>+123-123-123 </a>
                                    <span>/</span>
                                    <a href="mailto:support@example.com"><i class="fa fa-envelope"></i>support@example.com</a>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="topbar-links">
                                    <span>Bienvenido <?php echo $_SESSION['name_user']; ?></span>
                                    <span>|</span>
                                    <a class="dropdown-grid" href="logout.php">Cerrar sesión</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="navbar-collapse hidden-sm hidden-xs">
                        <ul class="nav navbar-nav">
                            <li class="dropdown home">
                                <a data-toggle="dropdown" class="dropdown-toggle disabled" href="?menu=home">Home</a>
                            </li>
                            <li class="dropdown books">
                                <a data-toggle="dropdown" class="dropdown-toggle disabled" href="?menu=books">Books &amp; Media</a>
                                <ul class="dropdown-menu">
                                    <li><a href="?menu=books">Books &amp; Media</a></li>
                                    <li><a href="?menu=newBook">Register New Book</a></li>
                                    <li><a href="?menu=details">Books &amp; Media Detail</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle disabled" href="#">Pages</a>
                                <ul class="dropdown-menu">
                                    <li><a href="cart.html">Cart</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="404.html">404/Error</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>