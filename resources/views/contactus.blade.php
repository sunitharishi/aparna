<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/icon.png">
    <title>APARNA - Lead the future</title>
    <!-- Bootstrap core CSS -->
    <link href="css1/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css1/sticky-footer-navbar.css" rel="stylesheet">
    <link href="css1/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css1/responsive.css">
  </head>
  <body class="inner-pages">
    <div class="inner-banner">
     @include('fragments.header')	
    	<div class="banner" style="background:url(images/cont-banner.jpg);">
        	<div class="container">
	        	<h1>Contact <span>Us</span></h1>
            </div>
        </div>
    </div>
    <div class="keepintouch">
    	<div class="container">
        	<h2>Keep in <span>Touch</span></h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, </p>
            <div class="col-sm-12">
        	<div class="col-sm-4 float-left">
            	<i class="fa fa-phone" aria-hidden="true"></i><br />+91 123-1234
            </div>
        	<div class="col-sm-4 float-left">
            	<i class="fa fa-map-marker" aria-hidden="true"></i><br />123 Main Street, Medchal<br />Hyderabad
            </div>
        	<div class="col-sm-4 float-left">
            	<i class="fa fa-envelope" aria-hidden="true"></i><br />info@apmspl.com
            </div>
        </div>
        </div>        
        <div class="map">
        	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3806.7071447239787!2d78.44806531487686!3d17.42583638805559!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb97352d32f5e5%3A0x4e94990d182dba2c!2sAparna+Constructions!5e0!3m2!1sen!2s!4v1499173742402" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen=""></iframe>
        </div>
        <div class="contactform">
        	<div class="container">
            	<div class="form-title">
                	<b>Get in Touch</b>
                    <p>Nullam dictum felis eu pede mollis pretium</p>                    
                </div>
                <div class="form">
                    <form>
                       <div class="form-groupfloat-left">
                          <div class="form-group">
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Your Name">
                          </div>
                          <div class="form-group">
                            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Email">
                          </div>
                          <div class="form-group">
                            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Subject">
                          </div>
                       </div>	
                      <div class="form-groupfloat-right">
                        <textarea class="form-control" placeholder="Subject"></textarea>
                      </div><br />
                      <div class="form-group submitbtn">
                      	<button type="button" class="btn btn-dark">Submit</button>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Begin page content -->
   <!-- <main role="main" class="container">
    </main>-->

    @include('fragments.footer')

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js" type="text/javascript" ></script>
    
    <script src="js1/popper.min.js"></script>
    <script src="js1/bootstrap.min.js"></script>
</body>
</html>