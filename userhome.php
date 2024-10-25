<?php
session_start();
include("include/dbconnect.php");
extract($_REQUEST);
$uname=$_SESSION['uname'];

$q1=mysqli_query($connect,"select * from rt_customer where uname='$uname'");
$r1=mysqli_fetch_array($q1);

$qry=mysqli_query($connect,"select * from rt_product");


?>
<html>

<head>
    <meta charset="utf-8">
    <title><?php include("include/title.php"); ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="static/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="static/lib/animate/animate.min.css" rel="stylesheet">
    <link href="static/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="static/css/style.css" rel="stylesheet">
    <style>
.product-container {
    position: relative;
    display: inline-block; /* Ensure the container expands to fit its contents */
}

.product-details {
    display: none;
    position: absolute;
    top: 0;
    right: 100%; /* Position the details to the right of the link */
    background-color: white;
    border: 1px solid #ccc;
    padding: 10px;
    z-index: 999;
}

.product-link:hover + .product-details {
    display: block;
}

    </style>
   
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-1 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center h-100">
                    Customer: <?php echo $r1['name']; ?>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">My Account</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="logout.php">Logout</a>
                        </div>
                    </div>
                    
                </div>
                <div class="d-inline-flex align-items-center d-block d-lg-none">
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-heart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-shopping-cart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-6">
            <?php include("include/heading.php"); ?>

            </div>
            <div class="col-lg-3 col-6 text-left">
                <form action="userhome.php?act=search" method="post">
                    <div class="input-group">
                        <input type="text" name="getval" class="form-control" placeholder="Search for products">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <button type="submit" name="bt" value="bt"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-6 text-right">
                <p class="m-0">Customer Service</p>
                <h5 class="m-0">+012 345 6789</h5>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                    <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                    <div class="navbar-nav w-100">
					
						<?php
						$qs1=mysqli_query($connect,"select * from rt_product ");
						while($rs1=mysqli_fetch_array($qs1))
						{
						?>
                        <div class="nav-item dropdown dropright">
                            <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                            </div>
                        </div>
						<?php
						}
						?>
						
						<!--<a href="" class="nav-item nav-link">Shirts</a>-->
                        
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <span class="h1 text-uppercase text-dark bg-light px-2">Agro</span>
                        <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">culture</span>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="userhome.php" class="nav-item nav-link">Home</a>
                            <a href="cart.php" class="nav-item nav-link">Cart</a>
                            <a href="purchase.php" class="nav-item nav-link">Purchased</a>
							<a href="logout.php" class="nav-item nav-link">Logout</a>
                            <!--<div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages <i class="fa fa-angle-down mt-1"></i></a>
                                <div class="dropdown-menu bg-primary rounded-0 border-0 m-0">
                                    <a href="cart.html" class="dropdown-item">Shopping Cart</a>
                                    <a href="checkout.html" class="dropdown-item">Checkout</a>
                                </div>
                            </div>
                            <a href="contact.html" class="nav-item nav-link">Contact</a>-->
                        </div>
                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                            <!--<a href="" class="btn px-0">
                                <i class="fas fa-heart text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">0</span>
                            </a>-->
                            <a href="purchase.php" class="btn px-0 ml-3" title="Cart">
                                <i class="fas fa-shopping-cart text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;"></span>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    
    <?php
$act="";
 if($act=="search")
{
    if(isset($_POST['bt']))
    {
    $getval=$_POST['getval'];

    $s=mysqli_query($connect,"select * from rt_product where product like '$getval%'")
    ?>
    <div class="container-fluid pt-4 pb-2">
        
        <h2 class="section-title position-relative text-uppercase mx-xl-2 mb-2"><span class="bg-secondary pr-3">Featured Products</span></h2>
        <div class="row">
        <?php 
    while($r2=mysqli_fetch_array($s))
    {
        ?>
       

		            <div class="col-md-4">
                    
                 
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        
                        <img class="" src="upload/<?php echo $r2['photo'];?>" height="100px" width="100px" alt="">
                        <?php
if(isset($act) && $act == 1){
    $q111=mysqli_query($connect,"select * from rt_product where id='".$r1['id']."' ");
$r111=mysqli_fetch_array($q111);

?>
<div class="product-action">
                            <ul>
                            <li><strong>Farming Date:</strong> <?php echo $r111['farming_date']; ?></li>
                            <li><strong>Packing Date:</strong> <?php echo $r111['packing_date']; ?></li>
                            <li><strong>Type:</strong> <?php echo $r111['Type']; ?></li>   
                            </ul>
                        </div>
                      
                        <br>
<br><br><br><br><br> <br><br>  

<?php 
}
else{
    
}
?>



                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href=""><?php echo $r2['product'];?></a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5> Rs. <?php echo $r2['price'];?></h5><h6 class="text-muted ml-2"><del></del></h6>
                        </div>
						<span>Quantity <?php echo $r2['quantity'];?></span><br>
						<a href="cart.php?pid=<?php echo $r1['id'];?>">Add to Cart</a>
						<br>by <?php echo $r2['retailer'];?>
                            <div class="d-flex align-items-center justify-content-center mb-1">
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small><br>

                        </div>
                        <a href="allreview.php?pid=<?php echo $r2['id'];?>">Reviews</a>

                    </div>
                </div>

            </div>
          


          
            <?php
    }
}
}


else{
?>
    <div class="container-fluid pt-4 pb-2">
        
        <h2 class="section-title position-relative text-uppercase mx-xl-2 mb-2"><span class="bg-secondary pr-3">Featured Products</span></h2>
       
        <div class="row">
        <?php 
    while($r1=mysqli_fetch_array($qry))
    {
        ?>
       
        
		            <div class="col-md-4">
                    
                 
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        
                        <img class="" src="upload/<?php echo $r1['photo'];?>" height="100px" width="100px" alt="">
                        <?php
if(isset($act) && $act == 1){
    $q111=mysqli_query($connect,"select * from rt_product where id='".$r1['id']."' ");
$r111=mysqli_fetch_array($q111);

?>
<div class="product-action">
                            <ul>
                            <li><strong>Farming Date:</strong> <?php echo $r111['farming_date']; ?></li>
                            <li><strong>Packing Date:</strong> <?php echo $r111['packing_date']; ?></li>
                            <li><strong>Type:</strong> <?php echo $r111['Type']; ?></li>
                            
                            

                                <!-- Add more details as needed -->
                            </ul>
                        </div>
                      
                        <br>
<br><br><br><br><br> <br><br>               

<?php
}
else {
echo "";
}
?>
                     
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href=""><?php echo $r1['product'];?></a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5> Rs. <?php echo $r1['price'];?></h5><h6 class="text-muted ml-2"><del></del></h6>
                        </div>
						<span>Quantity <?php echo $r1['quantity'];?></span><br>
						<a href="cart.php?pid=<?php echo $r1['id'];?>">Add to Cart</a>
						<br>by <?php echo $r1['retailer'];?>
                            <div class="d-flex align-items-center justify-content-center mb-1">
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small><br>

                        </div>
                        <a href="allreview.php?pid=<?php echo $r1['id'];?>">Reviews</a>


</div>
</div>

</div>


          
            <?php
    }
    ?>

    <?php
}
    ?>
			
            
        </div>
       
    
   
    </div>
<br><br><br><br><br><br><br>
    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-secondary mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <h5 class="text-secondary text-uppercase mb-4">Get In Touch</h5>
                <p class="mb-4">Digital Farming is the process of ensuring you carry merchandise that Farmers want, with neither too little nor too much on hand.</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Agriculture, Tamilnadu, India</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>agri@info.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Quick Shop</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="/userhome"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-secondary mb-2" href="/cart"><i class="fa fa-angle-right mr-2"></i>Cart</a>
                            <a class="text-secondary mb-2" href="/logout"><i class="fa fa-angle-right mr-2"></i>Logout</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">My Account</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                            <a class="text-secondary" href="#"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <!--<h5 class="text-secondary text-uppercase mb-4">Newsletter</h5>
                        <p>Duo stet tempor ipsum sit amet magna ipsum tempor est</p>
                        <form action="">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Your Email Address">
                                <div class="input-group-append">
                                    <button class="btn btn-primary">Sign Up</button>
                                </div>
                            </div>
                        </form>-->
                        <h6 class="text-secondary text-uppercase mt-4 mb-3">Follow Us</h6>
                        <div class="d-flex">
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-primary btn-square" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-secondary">
                  Digital Farming <a class="text-primary" href="#"></a>
                   
                    <a class="text-primary" href="https://htmlcodex.com"></a>
                    <br> <a href="https://themewagon.com" target="_blank"></a>
                </p>
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid" src="static/img/payments.png" alt="">
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="templates/lib/easing/easing.min.js"></script>
    <script src="templates/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="templates/mail/jqBootstrapValidation.min.js"></script>
    <script src="templates/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="templates/js/main.js"></script>
    <script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>

</html>