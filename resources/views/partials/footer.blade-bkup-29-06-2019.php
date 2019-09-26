<footer id="footer" class="footer-main footer-slide stickyFooter bottom-foot">
    <div class="container">
        <ul class="footer-links">
            <!--<li class="ft_logo"><a class="link" href="#"><img src="/images/icon-a.png"></a></li>-->
             <li><a class="link" href="#">© 2018 APMSPL.com</a></li>
             <li>|</li>
            <li><a class="link" href="#">Privacy Policy</a></li>
            <li>|</li>
            <li><a class="link" href="#">Terms of Use</a></li>
            <!--<li><a class="link" href="#">Affiliate Program</a></li>-->
           
            <li class="social-links">
            <div class="head-datetime"><b style="margin:0px 10px 0px 0px;">IP Address:</b> <?php   echo $_SERVER['REMOTE_ADDR'];  ?></div> <a href="http://zonup.com/" target="_blank" class="ext-link footerCopyright">Developed by <strong id="dogstudio"><span>Zonup</span></strong></a>
                <!--<a href="#" class="fb">fb</a>
                <a href="#" class="tw">tw</a>
                <a href="#" class="gp">gp</a>
                <a href="#" class="in">in</a>-->
            </li>
        </ul>                 
    </div>            
</footer>
<?php /*?><script type="text/ecmascript">
   if ( $(window).width() < 990)
   {
	$(function () {
	   var position = $(window).scrollTop();
		$(window).scroll(function () {
			var scroll1 		= $(window).scrollTop();
			var height		= $(window).height();	
			var docHeight	= $(document).height();
			
			if(scroll1 + height == docHeight)  	{ $('.bottom-foot').addClass('stickyFooter1'); }
			else if (scroll1 > position) 		{   $('.bottom-foot').removeClass('stickyFooter1'); } 	//down
			else {		$('.bottom-foot').addClass('stickyFooter1'); }						//up
			position = scroll1;
		});
	});
	}
</script> <?php */?>