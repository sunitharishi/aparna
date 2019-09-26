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
				
               
            
            <li class="nav-item">

			  <a class="nav-link " href="">Why Aparna <span class="sr-only">(current)</span></a>

            </li>

            <li class="nav-item"> 

              <a class="nav-link disabled " href="" >About Us</a>

            </li>

            <li class="nav-item">

              <a class="nav-link " href="">Features</a>

            </li>

            <li class="nav-item">

              <a class="nav-link " href="#">Services</a>

            </li>

            <li class="nav-item">

              <a class="nav-link " href="">Our Projects</a>

            </li> 

            <li class="nav-item">
            
           
 
			  <a class="nav-link " href="">Contact Us</a>

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