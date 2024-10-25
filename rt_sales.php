<?php
session_start();
include("include/dbconnect.php");
extract($_REQUEST);
$uname=$_SESSION['uname'];

$q1=mysqli_query($connect,"select * from rt_retailer where uname='$uname'");
$r1=mysqli_fetch_array($q1);



$qry=mysqli_query($connect,"select * from rt_cart where retailer='$uname' and d_status='0'");
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
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-1 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center h-100">
				Farmer: <?php echo $r1['name']. "[".$r1['uname']."]"; ?>
                    <!--<a class="text-body mr-3" href="">About</a>
                    <a class="text-body mr-3" href="">Contact</a>
                    <a class="text-body mr-3" href="">Help</a>
                    <a class="text-body mr-3" href="">FAQs</a>-->
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">My Account</button>
                        <div class="dropdown-menu dropdown-menu-right">
							<a class="dropdown-item" href="logout.php">Logout</a>
                            <!--<button class="dropdown-item" type="button">Sign in</button>
                            <button class="dropdown-item" type="button">Logout</button>-->
                        </div>
                    </div>
                    <!--<div class="btn-group mx-2">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">USD</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item" type="button">EUR</button>
                            <button class="dropdown-item" type="button">GBP</button>
                            <button class="dropdown-item" type="button">CAD</button>
                        </div>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">EN</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item" type="button">FR</button>
                            <button class="dropdown-item" type="button">AR</button>
                            <button class="dropdown-item" type="button">RU</button>
                        </div>
                    </div>-->
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
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for products">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
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
                        <div class="nav-item dropdown dropright">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Rice <i class="fa fa-angle-right float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                                <a href="" class="dropdown-item">Basmati rice</a>
                                <a href="" class="dropdown-item">Brown rice</a>
                            </div>
                        </div>
                        <a href="" class="nav-item nav-link">Wheat</a>
                        <a href="" class="nav-item nav-link">Fruits</a>
                        <a href="" class="nav-item nav-link">Vegitables</a>
                      
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <span class="h1 text-uppercase text-dark bg-light px-2">Retailer</span>
                        <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">Inventory</span>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="rt_home.php" class="nav-item nav-link">Home</a>
							<div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Products <i class="fa fa-angle-down mt-1"></i></a>
                                <div class="dropdown-menu bg-primary rounded-0 border-0 m-0">
                                    <a href="add_cat.php" class="dropdown-item">Category</a>
                                    <a href="add_product.php" class="dropdown-item">New Products</a>
									<a href="rt_sales.php" class="dropdown-item">Sales</a>
                                </div>
                            </div>
                            <a href="forum.php" class="nav-item nav-link">Forum</a>
                            <a href="logout.php" class="nav-item nav-link">Logout</a>
                            
                        </div>
                        <!--<div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                            <a href="" class="btn px-0" title="Low Quantity">
                                <i class="fas fa-heart text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">0</span>
                            </a>
                            <a href="" class="btn px-0 ml-3" title="Orders">
                                <i class="fas fa-shopping-cart text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">0</span>
                            </a>
                        </div>-->
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="rt_home.php">Home</a>
                    <span class="breadcrumb-item"><a href="add_cat.php">Category</a></span>
					<span class="breadcrumb-item "><a href="add_product.php">Product</a></span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
							<th>#</th>
                            <th>User</th>
                            <th>Category</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Delivery Mode</th>
                            <th>Review</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
						<?php
						$i=0;
						while($row=mysqli_fetch_array($qry))
						{
						$i++;
						?>
<?php
$q1e=mysqli_query($connect,"select * from rt_product where id='".$row['pid']."'");
$r1e=mysqli_fetch_array($q1e);
?>

                        <tr>
                            <td class="align-middle"><?php echo $i; ?></td>
                            <td class="align-middle"><?php echo $row['uname']; ?></td>
                            <td class="align-middle"><?php echo $row['category']; ?></td>
                            <td class="align-middle"><?php echo $row['pname'];?></td>
                            <td class="align-middle"><?php echo $row['price']; ?></td>
                            <td class="align-middle"><?php echo $row['uqut']; ?>
                                <?php
							
							if($row['status']=="1" and $r1e['quantity']=='0')
							{
                                ?>
                                <?php
							echo '<span style="color:#FF0000">[Low]</span>';
							}
							else
							{
								if($row['status']=='1')
								{
								echo '<span style="color:#FF0000">[available '.$r1e['quantity'].']</span>';
								}
							}
							?>
							</td>
                            <td class="align-middle"><?php echo $row['deli_mode']; ?>
                            <td class="align-middle"><a href="allrev1.php?pid=<?php echo $row['pid'];?>">click</a></td>
							<td class="align-middle">
								<a href="rt_sales.php?act=dev&deid=<?php echo $row['id']; ?>">Home Delivery</a>|<br>
								<a href="rt_sales.php?act=go&deid=<?php echo $row['id']; ?>">Go Farm</a><br><br>
                                <a href="rt_sales.php?issue=not_in_quantity&deid=<?php echo $row['id']; ?>">Issue 1: Not in Quantity</a> | <br>
                                <a href="customer_delivery_status.php?issue_id=<?php echo $row['id']; ?>">Issue 2: Delivery Problem</a>
								
							</td>
                        </tr>
                     	<?php
						}
						?>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                
                <img src="static/img/sh1.jpg" class="img-fluid">
                
            </div>
        </div>
    </div>
    <?php
$act='';
 if($act=="dev")
{
    $deid=$_REQUEST['deid'];
    $mq=mysqli_query($connect,"select * from rt_cart where id='$deid'");
	$mr=mysqli_fetch_array($mq);
    $uqut=$mr['uqut'];
    $pid=$mr['pid'];

    $mq1=mysqli_query($connect,"select * from rt_product where id='$pid'");
	$mr1=mysqli_fetch_array($mq1);
    $quantity=$mr1['quantity'];

    $finalqty=$quantity-$uqut;


    mysqli_query($connect,"update rt_cart set d_status='1' where id=$deid");
    mysqli_query($connect,"update rt_product set quantity='$finalqty' where id='".$mr1['id']."'");

    ?>
<script language="javascript">
    alert("Home delivered Success");
window.location.href="rt_sales.php";
</script>
<?php
}
?>
<?php
 if($act=="go")
{
    $deid=$_REQUEST['deid'];
    $mq=mysqli_query($connect,"select * from rt_cart where id='$deid'");
	$mr=mysqli_fetch_array($mq);
    $uqut=$mr['uqut'];
    $pid=$mr['pid'];

    $mq1=mysqli_query($connect,"select * from rt_product where id='$pid'");
	$mr1=mysqli_fetch_array($mq1);
    $quantity=$mr1['quantity'];

    $finalqty=$quantity-$uqut;


    mysqli_query($connect,"update rt_cart set d_status='2' where id=$deid");
    mysqli_query($connect,"update rt_product set quantity='$finalqty' where id='".$mr1['id']."'");

?>
<script language="javascript">
    alert("Successfully added to Farm's shopping list");
window.location.href="rt_sales.php";
</script>
<?php
}
?>


<?php
$issue='';
 if($issue=="not_in_quantity")
{
    $deid=$_REQUEST['deid'];
    
$q11=mysqli_query($connect,"select * from rt_cart where id='$deid'");
$r11=mysqli_fetch_array($q11);
$user=$r11['uname'];
$ret=$r11['retailer'];
$pname=$r11['pname'];
$uqut=$r11['uqut'];
 
$q1122=mysqli_query($connect,"select * from rt_product where id='".$r11['pid']."'");
$r1122=mysqli_fetch_array($q1122);
$qtyy=$r1122['quantity'];



$q111=mysqli_query($connect,"select * from rt_retailer where uname='$ret'");
$r111=mysqli_fetch_array($q111);
$mobile=$r111['mobile'];
$ee=$r111['email'];

$q111=mysqli_query($connect,"select * from rt_customer where uname='$user'");
$r111=mysqli_fetch_array($q111);
$email=$r111['email'];

$message = "Dear {$user},<br>";
$message .= "This is to inform you that the item is not in quantity<br>";
$message .= "Product Name: {$pname}<br>";
$message .= "Available Quantity: {$qtyy}<br>";
$message .= "Your Quantity: {$uqut}<br>";
$message .= "Farmer Name: {$ret}<br>";
$message .= "Farmer Mobile: {$mobile}<br>";
$message .= "Farmer email: {$ee}<br>";

$messageEncoded = urlencode($message);

echo '<iframe src="http://iotcloud.co.in/testmail/testmail1.php?message='.$messageEncoded.'&email='.$email.'&subject=Alert: Item Not in Quantity" frameborder="0" style="display:none"></iframe>';

 
}
?>
    <span style="color:black">Home Delivery</span>;

  
    <?php

     $i=mysqli_query($connect,"select * from rt_cart where retailer='$uname' and d_status='1'");
   if(mysqli_num_rows($i)>0){
    $cnt=1;


?>  
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
							<th>#</th>
                            <th>User</th>
                            <th>Category</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Shipping Address</th>

                        </tr>
                    </thead>
                    <tbody class="align-middle">
						<?php


						while($r1=mysqli_fetch_array($i))
						{
                            
						?>
                        <tr>
                        <?php
$q1e=mysqli_query($connect,"select * from rt_product where id='".$r1['pid']."'");
$r1e=mysqli_fetch_array($q1e);
?>
                            <td class="align-middle"><?php echo $r1['id']; ?></td>
                            <td class="align-middle"><?php echo $r1['uname']; ?></td>
                            <td class="align-middle"><?php echo $r1['category']; ?></td>
                            <td class="align-middle"><?php echo $r1['pname'];?></td>
                            <td class="align-middle"><?php echo $r1['price']; ?></td>
                            <td class="align-middle"><?php echo $r1['uqut'];
							
							if($r1['status']=="1" and $r1e['quantity']=='0')
							{
							echo '<span style="color:#FF0000">[Low]</span>';
							}
							else
							{
								if($r1['status']=='1')
								{
								echo '<span style="color:#FF0000">[available '.$r1e['quantity'].']</span>';
								}
							}
							?>
							</td>

							<td class="align-middle"><?php echo $r1['shipping_address'];?></td>

                        </tr>
                     	
                        <?php 
                       $cnt=$cnt+1; } } else { ?>
                          <tr>
                            <td colspan="8"> No record found</td>
                        
                          </tr>
                           
                        
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                
                
            </div>
        </div>
    </div>
    
    <span style="color:black">Farm Delivery</span>;
    

    <?php

     $i=mysqli_query($connect,"select * from rt_cart where retailer='$uname' and d_status='2'");
   if(mysqli_num_rows($i)>0){

    $cnt=1;

?>  
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
							<th>#</th>
                            <th>User</th>
                            <th>Category</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Customer Address</th>

                        </tr>
                    </thead>
                    <tbody class="align-middle">
						<?php
						while($row=mysqli_fetch_array($i))
						{
						?>
                        <tr>
                        <?php
$q1e=mysqli_query($connect,"select * from rt_product where id='".$row['pid']."'");
$r1e=mysqli_fetch_array($q1e);
?>
                            <td class="align-middle"><?php echo $row['id']; ?></td>
                            <td class="align-middle"><?php echo $row['uname']; ?></td>
                            <td class="align-middle"><?php echo $row['category']; ?></td>
                            <td class="align-middle"><?php echo $row['pname'];?></td>
                            <td class="align-middle"><?php echo $row['price']; ?></td>
                            <td class="align-middle"><?php echo $row['uqut'];
							
							if($row['status']=="1" and $r1e['quantity']=='0')
							{
							echo '<span style="color:#FF0000">[Low]</span>';
							}
							else
							{
								if($row['status']=='1')
								{
								echo '<span style="color:#FF0000">[Available '.$r1e['quantity'].']</span>';
								}
							}
							?>
							</td>
                            <td class="align-middle"><?php echo $row['shipping_address'];?></td>

							
                        </tr>
                     	
                        <?php 
                        $cnt=$cnt+1;} } else { ?>
                          <tr>
                            <td colspan="8"> No record found</td>
                        
                          </tr>
                           
                        
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                
                
            </div>
        </div>
    </div>
    <!-- Cart End -->
   
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
                            <a class="text-secondary mb-2" href="/"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-secondary mb-2" href="/login"><i class="fa fa-angle-right mr-2"></i>Farmer</a>
                            <a class="text-secondary mb-2" href="/login_cus"><i class="fa fa-angle-right mr-2"></i>Customer</a>
                            <a class="text-secondary mb-2" href="/login_admin"><i class="fa fa-angle-right mr-2"></i>Admin</a>
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
                   <?php include("include/title.php"); ?><a class="text-primary" href="#"></a>
                   
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