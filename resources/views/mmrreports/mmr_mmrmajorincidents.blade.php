<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MMR Index</title>
    <style>
	  *
	  {
	   font-family:open sans;
	  }
	  .enginnering-heading h3
	  {
	   font-size:26px;
	  }
	  .list-services ul
	  {
	   list-style:none;
	   padding-left:0px;
	  }
	   .list-services ul li
	   {
	    font-size:20px;
		line-height:30px;
		padding-left:30px;
		position:relative;
	   }
	   .list-services ul li:before
	   {
	    content:'';
		position:absolute;
		background:url("/images/blacktick12.png");
		top:15px;
		left:0px;
		width:20px;
		height:20px;
		background-size:cover;
	   }
	</style>
  </head>
  
<div class="panel panel-default critical-manpower">
    <div class="col-sm-12">
        <div class="enginnering-heading">
        	<h3><span>Major Incidents/Break Downs</span></h3>
        </div>
    </div>      
    <div class="row eservices-page">
       <div class="col-sm-12">
       		<div class="list-services">
            	<ul>
               @if (count($break_down_txt) > 0)
                @foreach ($break_down_txt as $brdtxt)
                	<li>{{ $brdtxt }}</li>
                    @endforeach
               @endif     
                </ul>
            </div>
       </div>
    </div>
</div>

 </html>
