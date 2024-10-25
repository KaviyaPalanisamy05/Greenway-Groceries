<?php
session_start();
include("include/dbconnect.php");
extract($_REQUEST);
$msg="";
$rdate=date("d-m-Y");

$q1=mysqli_query($connect,"select * from rt_retailer order by id desc");
$n1=mysqli_num_rows($q1);
$act = isset($_GET['act']) ? $_GET['act'] : '';
$did = isset($_GET['did']) ? intval($_GET['did']) : 0; // Cast to integer to prevent SQL injection

if ($act == "yes" && $did > 0) {
    // Sanitize and perform update
    $query = "UPDATE rt_retailer SET status=1 WHERE id=?";
    $stmt = mysqli_prepare($connect, $query);
    mysqli_stmt_bind_param($stmt, 'i', $did);
    mysqli_stmt_execute($stmt);

    // Redirect to admin.php
    echo '<script language="javascript">
            window.location.href="admin.php";
          </script>';
}
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
   

<?php include("include/admin_link.php");?>
    <!-- Navbar End -->


    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
               <h3>Farmer Information</h3>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
			<?php
			if($n1>0)
			{
			?>
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
							<th>#</th>
                            <th>Retailer</th>
                            <th>Location</th>
                            <th>Contact</th>
							<th>Proof</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
						<?php
						$i=0;
						while($r1=mysqli_fetch_array($q1))
						{
						$i++;
						?>
                        <tr>
                            <td class="align-middle"><?php echo $i; ?></td>
                            <td class="align-middle">{<?php echo $r1['name']; ?>} [<?php echo $r1['uname']; ?>]</td>
                            <td class="align-middle"><?php echo $r1['address'].", ".$r1['city']; ?></td>
                            <td class="align-middle"><?php echo $r1['mobile']; ?><br><?php echo $r1['email']; ?></td>
                            <td class="align-middle"><?php echo '<a href="proof/'.$r1['proof'].'" target="_blank">'.$r1['proof'].'</a>'; ?></td>
							<td class="align-middle"><?php echo $r1['create_date']; ?></td>
							<td class="align-middle">
                             
								<?php
								if($r1['status']=="1")
								{
								echo "Approved";
								}
								else
								{
								
								echo '<a href="admin.php?act=yes&did='.$r1['id'].'">Approval</a>';
								}
								?>
							</td>
                        </tr>
                     	<?php
						}
						?>
                    </tbody>
                </table>
				<?php
				}
				else
				{
				
				}
				?>
            </div>
            <div class="col-lg-4">
                
                <img src="static/img/sh1.jpg" class="img-fluid">
                
            </div>
        </div>
    </div>
    <!-- Cart End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-secondary mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <h5 class="text-secondary text-uppercase mb-4">Get In Touch</h5>
                <p class="mb-4">Agro Farming is the process of ensuring you carry merchandise that Farmers want, with neither too little nor too much on hand.</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Agriculture, Tamilnadu, India</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>agri@info.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Quick Shop</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="admin.php"><i class="fa fa-angle-right mr-2"></i>Home</a>
                           
                            <a class="text-secondary mb-2" href="logout.php"><i class="fa fa-angle-right mr-2"></i>Logout</a>
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
                   <?php include("include/title.php"); ?> <a class="text-primary" href="#"></a>
                   
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
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

</body>

</html>