
<?php
include("funtion/main_funtion.php");
include("config/enum.php");
?>
<title>Share Group</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="stylesheet" type="text/css" href="css/vendor.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- script
    ================================================== -->
    <script src="js/modernizr.js"></script>
  </head>
<header id="header" class="site-header bg-white">
      <nav id="header-nav" class="navbar navbar-expand-lg px-3">
        <div class="container">
          <a class="navbar-brand d-lg-none" href="index.php">
            <img src="images/main-logo.png" class="logo">
          </a>
          <button class="navbar-toggler d-flex d-lg-none order-3 p-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#bdNavbar" aria-controls="bdNavbar" aria-expanded="false" aria-label="Toggle navigation">Menu</button>
          <div class="offcanvas offcanvas-end" tabindex="-1" id="bdNavbar" aria-labelledby="bdNavbarOffcanvasLabel">
            <div class="offcanvas-header px-4 pb-0">
              <a class="navbar-brand" href="index.php">
                <img src="images/main-logo.png" class="logo">
              </a>
              <button type="button" class="btn-close btn-close-black" data-bs-dismiss="offcanvas" aria-label="Close" data-bs-target="#bdNavbar"></button>
            </div>
            <div class="offcanvas-body">
              <ul id="navbar" class="navbar-nav w-100 d-flex justify-content-between align-items-center">
                
                <ul class="list-unstyled d-lg-flex justify-content-md-between align-items-center">
                  <li class="nav-item">
                    <a class="nav-link text-uppercase ms-0" href="about.php">About</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-uppercase ms-0" href="group.php">Share Group</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link text-uppercase dropdown-toggle ms-0" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Pages<svg class="bi" width="18" height="18"><use xlink:href="#chevron-down"></use></svg></a>
                    <ul class="dropdown-menu">
                      <li>
                        <a href="index.php" class="dropdown-item active fs-5 fw-medium">Home</a>
                      </li>
                      <li>
                        <a href="about.php" class="dropdown-item fs-5 fw-medium">About <span class="text-primary">(PRO)</span></a>
                      </li>
                      <li>
                        <a href="shop.php" class="dropdown-item fs-5 fw-medium">Shop <span class="text-primary">(PRO)</span></a>
                      </li>
                      <li>
                        <a href="single-product.php" class="dropdown-item fs-5 fw-medium">Single Product <span class="text-primary">(PRO)</span></a>
                      </li>
                      <li>
                        <a href="author.php" class="dropdown-item fs-5 fw-medium">Author <span class="text-primary">(PRO)</span></a>
                      </li>
                      <li>
                        <a href="login.php" class="dropdown-item fs-5 fw-medium">Account <span class="text-primary">(PRO)</span></a>
                      </li>
                      <li>
                        <a href="cart.php" class="dropdown-item fs-5 fw-medium">Cart <span class="text-primary">(PRO)</span></a>
                      </li>
                      <li>
                        <a href="checkout.php" class="dropdown-item fs-5 fw-medium">Checkout <span class="text-primary">(PRO)</span></a>
                      </li>
                      <li>
                        <a href="blog.php" class="dropdown-item fs-5 fw-medium">Blog <span class="text-primary">(PRO)</span></a>
                      </li>
                      <li>
                        <a href="single-post.php" class="dropdown-item fs-5 fw-medium">Single Post <span class="text-primary">(PRO)</span></a>
                      </li>
                      <li>
                        <a href="contact.php" class="dropdown-item fs-5 fw-medium">Contact <span class="text-primary">(PRO)</span></a>
                      </li>
                    </ul>
                  </li>                  
                </ul>
                
                <a class="navbar-brand d-none d-lg-block me-0" href="index.php">
                  <img src="images/main-logo.png" class="logo">
                </a>

                <ul class="list-unstyled d-lg-flex justify-content-between align-items-center">
                  <li class="nav-item search-item">
                    <div id="search-bar" class="border-right d-none d-lg-block">
                      <form action="" autocomplete="on">
                        <input id="search" class="text-dark" name="search" type="text" placeholder="Search Here...">
                        <a type="submit" class="nav-link text-uppercase me-0" href="#">Search</a>
                      </form>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-uppercase me-0" href="login.php">Account</a>
                  </li>
                  <li class="cart-dropdown nav-item dropdown">
                    <a class="nav-link text-uppercase dropdown-toggle me-0" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Cart(2)</a>
                    <div class="dropdown-menu dropdown-menu-end p-3">
                      <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-primary">Your cart</span>
                        <span class="badge bg-primary rounded-pill">2</span>
                      </h4>
                      <ul class="list-group mb-3">
                        <li class="list-group-item bg-transparent border-gray d-flex justify-content-between lh-sm">
                          <div>
                            <h5 class="card-title fs-3 text-uppercase mb-0">
                              <a href="single-product.php">Life lesson</a>
                            </h5>
                            <small class="text-body-secondary">This book is about life.</small>
                          </div>
                          <span class="text-primary">$90</span>
                        </li>
                        <li class="list-group-item bg-transparent border-gray d-flex justify-content-between lh-sm">
                          <div>
                            <h5 class="card-title fs-3 text-uppercase mb-0">
                              <a href="single-product.php">Money making</a>
                            </h5>
                            <small class="text-body-secondary">It will teach you money making.</small>
                          </div>
                          <span class="text-primary">$60</span>
                        </li>
                        <li class="list-group-item bg-transparent border-gray d-flex justify-content-between">
                          <span class="text-uppercase"><b>Total (USD)</b></span>
                          <strong>$150</strong>
                        </li>
                      </ul>
                      <div class="d-flex flex-wrap justify-content-center">
                        <a href="cart.php" class="w-100 btn btn-dark mb-1" type="submit">View Cart</a>
                        <a href="checkout.php" class="w-100 btn btn-primary" type="submit">Go to checkout</a>
                      </div>
                    </div>
                  </li>
                </ul>
              </ul>
            </div>
          </div>
        </div>
      </nav>
    </header>