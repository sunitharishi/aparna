<header>

      <!-- Fixed navbar -->

      <div class="top-bars">
      	<div class="top-bar bg-dark">

      		<div class="container">

                <div class="col-sm-6 float-left">

                    <a><i class="fa fa-phone" aria-hidden="true"></i> +9010 364 784</a> <a><i class="fa fa-envelope-o" aria-hidden="true"></i> info&copy;apmspl.com</a> 

                </div>

                <div class="col-sm-6 float-right">                	

                    <a href="#" class="float-right"><i class="fa fa-google-plus" aria-hidden="true"></i></a> <a href="#" class="float-right"><i class="fa fa-linkedin" aria-hidden="true"></i></a> <a href="#" class="float-right"><i class="fa fa-twitter" aria-hidden="true"></i></a> <a href="#" class="float-right"><i class="fa fa-facebook" aria-hidden="true"></i></a> <a href="#" class="float-right" style="color:#FFCC00;">Customer Login</a>  

                </div>

            </div>

      </div>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top">

      	<div class="container">
		 <a href="/"><img src="/images/logo-sml.png" /></a>
        <!--<a class="navbar-brand" href="#">Fixed navbar</a>-->

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">

          <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">

          <ul class="navbar-nav ml-auto">
				
                 <?php $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
             $uri_segments = explode('/', $uri_path); ?>
            
            <li class="nav-item">

			  <a class="nav-link <?php if($uri_segments[1] == 'whyaparna') echo 'active';?>" href="{{ route("whyaparna") }}">Why Aparna <span class="sr-only">(current)</span></a>

            </li>

            <li class="nav-item"> 

              <a class="nav-link disabled <?php if($uri_segments[1] == 'aboutus') echo 'active';?>" href="{{ route("aboutus") }}" >About Us</a>

            </li>

            <li class="nav-item">

              <a class="nav-link <?php if($uri_segments[1] == 'feature') echo 'active';?>" href="{{ route("feature") }}">Features</a>

            </li>

            <li class="nav-item">

              <a class="nav-link <?php if($uri_segments[1] == 'management') echo 'active';?>" href="{{ route("management") }}">Management</a>

            </li>

            <li class="nav-item">

              <a class="nav-link <?php if($uri_segments[1] == 'benfit') echo 'active';?>" href="{{ route("benfit") }}">Benefits</a>

            </li>

            <li class="nav-item">

              <a class="nav-link <?php if($uri_segments[1] == 'ourprojects') echo 'active';?>" href="{{ route("ourprojects") }}">Our Projects</a>

            </li> 

            <li class="nav-item">
            
           
 
			  <a class="nav-link <?php if($uri_segments[1] == 'contactus') echo 'active';?>" href="{{ route("contactus") }}">Contact Us</a>

            </li> 

          </ul>

        </div>

        </div>

      </nav>
      </div>

    </header>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js" type="text/javascript" ></script>
    <script>
    
    $(window).scroll(function() {    
    var scroll = $(window).scrollTop();

     //>=, not <=
    if (scroll >= 30) {
        //clearHeader, not clearheader - caps H
       $(".top-bars").addClass("scrollheader");
	   
	   //alert("testsetest");
    }
	else{
	 $(".top-bars").removeClass("scrollheader");
	}
}); //missing );

 </script>