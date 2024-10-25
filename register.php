<?php
session_start();
include("include/dbconnect.php");
extract($_REQUEST);
$msg="";
$rdate=date("d-m-Y");
if(isset($btn))
{
	 $mq=mysqli_query($connect,"select max(id) from rt_customer");
	 $mr=mysqli_fetch_array($mq);
	 $id=$mr['max(id)']+1;
	 
	 
	
	 $ins=mysqli_query($connect,"insert into rt_customer(id,name,address,city,mobile,email,uname,pass,create_date) values($id,'$name','$address','$city','$mobile','$email','$uname','$pass','$rdate')");
	 if($ins)
	 {
	 ?>
	 <script language="javascript">
	 window.location.href="register.php?msg=ok";
	 </script>
	 <?php
	 }
	 else
	 {
	 $msg="Already Exist!";
	 }

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
    <link href="templates/img/favicon.ico" rel="icon">

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
<script language="javascript">
function validate()
{
	if(document.form1.name.value=="")
	{
	alert("Enter the Name");
	document.form1.name.focus();
	return false;
	}
	if(document.form1.address.value=="")
	{
	alert("Enter the Address");
	document.form1.address.focus();
	return false;
	}
	if(document.form1.city.value=="")
	{
	alert("Enter the City");
	document.form1.city.focus();
	return false;
	}
	if(document.form1.mobile.value=="")
	{
	alert("Enter the Mobile No.");
	document.form1.mobile.focus();
	return false;
	}
	if(isNaN(document.form1.mobile.value))
	{
	alert("Invalid Mobile No.");
	document.form1.mobile.select();
	return false;
	}
	if(document.form1.mobile.value.length!=10)
	{
	alert("Mobile No. must be 10 digits!");
	document.form1.mobile.select();
	return false;
	}
	if(document.form1.email.value=="")
	{
	alert("Enter the Email");
	document.form1.email.focus();
	return false;
	}
	if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.form1.email.value))  
	{
	
	}
	else
	{
	alert("Invalid E-mail!");
	document.form1.email.select();
	return false;
	}
	if(document.form1.uname.value=="")
	{
	alert("Enter the Username");
	document.form1.uname.focus();
	return false;
	}
	if(document.form1.pass.value=="")
	{
	alert("Enter the Password");
	document.form1.pass.focus();
	return false;
	}
	if(document.form1.cpass.value=="")
	{
	alert("Enter the Confirm Password");
	document.form1.cpass.focus();
	return false;
	}
	if(document.form1.pass.value!=document.form1.cpass.value)
	{
	alert("Password does not match!");
	document.form1.cpass.select();
	return false;
	}
return true;
}
</script>
</head>

<body>
<?php include("include/homelink.php"); ?>

    <!-- Navbar End -->


    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="index.php">Home</a>
                    <span class="breadcrumb-item active"><a href="reg_retailer.php">Signup</a></span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Contact Start -->
    <div class="container-fluid">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Customer - Signup</span></h2>
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5">
                <div class="contact-form bg-light p-30">
                    <div id="success"></div>
					<?php
					if($msg=="ok")
					{
					?><span style="color:#006633">Registered Success</span>
					
					<script>
//Using setTimeout to execute a function after 5 seconds.
setTimeout(function () {
   //Redirect with JavaScript
   window.location.href= 'login_cus.php';
}, 2000);
</script>
					
					<?php
					}
					else
					{
					?><span style="color:#FF0000"><?php echo $msg; ?></span><?php
					}
					?>
                    <form name="form1" method="post">
						<div class="row">
							<div class="col-md-6 form-group">
								<label>Name</label>
								<input class="form-control" type="text" name="name">
							</div>
							<div class="col-md-6 form-group">
								<label>Address</label>
								<input class="form-control" type="text" name="address">
							</div>
							<div class="col-md-6 form-group">
								<label>City</label>
								<input class="form-control" type="text" name="city">
							</div>
							<div class="col-md-6 form-group">
								<label>Mobile No.</label>
								<input class="form-control" type="text" name="mobile" maxlength="10">
							</div>
							<div class="col-md-6 form-group">
								<label>E-mail ID</label>
								<input class="form-control" type="text" name="email">
							</div>
							<div class="col-md-6 form-group">
								<label>Username</label>
								<input class="form-control" type="text" name="uname">
							</div>
							<div class="col-md-6 form-group">
								<label>Password</label>
								<input class="form-control" type="password" name="pass">
							</div>
							<div class="col-md-6 form-group">
								<label>Confirm Pasword</label>
								<input class="form-control" type="password" name="cpass">
							</div>
						</div>
                        
                        <p></p>
                        <div>
                            <button class="btn btn-primary py-2 px-4" type="submit" name="btn" onClick="return validate()">Signup</button>
                        </div>
                    </form>
					
                </div>
            </div>
            <div class="col-lg-5 mb-5">
                <div class="bg-light p-30 mb-30">
                 <img src="static/img/sh2.jpg" class="img-fluid">
                </div>
                <div class="bg-light p-30 mb-3">
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Multi Shop, Tamilnadu, India</p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@multishop.com</p>
                    <p class="mb-2"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


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