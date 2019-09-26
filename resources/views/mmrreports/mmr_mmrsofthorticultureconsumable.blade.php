 <!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MMR Index</title>
    <!-- Bootstrap -->
    <link rel="icon" href="images/ICON.png">
   <!-- <link href="/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">-->
     <!--<link href="/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">-->

    <!-- Custom Theme Style -->
    <link href="/build/css/custom.css" rel="stylesheet">
 <link media="all" type="text/css" rel="stylesheet" href="{{ url('scripts/third/summernote') }}/summernote.css">
<style>
*
{
 font-family:Arial, Helvetica, sans-serif;
}
.mmrreport-eading
{
    margin-bottom:0px;
}
.mmrreport-eading h2
{
 font-size: 18px;
    font-weight: 600;
    color: #666262;
    text-align: center;
text-transform:uppercase;
}
table
{
 margin:10px 0px;
 border-collapse:collapse;
}
table  tr th, table tbody tr td
{
 padding:4px;
font-size:12.6px;
}
table tbody tr td
{
 vertical-align:top;
}
table tbody tr td div.list
{
    clear:both;
}
table tbody tr td p
{
    width:auto;
    clear:both;
}
table tbody tr td hr
{
    margin:0px 0px;
}


.incident-summary
{
 font-size:17px;
 clear:both;
font-weight:600;
padding-top:20px;
}
.soft-services
{
 font-weight:600;
 font-size:17px;
 text-decoration:underline;
}
.aparna-logo
{
 background-color:#0157a4;
 position:absolute;
 right:0px;
 top:-20px;
 padding:4px;
 width:110px;
 height:auto;
}
.body-tage
{
 position:relative;
}
.footer
{
 font-weight:100;
 font-size:16px !important;
 text-align:right;
 position:absolute;
 bottom:-40px;
 right:0px;
}
.soft-services
{
 font-weight:600;
 font-size:17px;
 text-decoration:underline;
}
.main-heading
{
    margin:-8px 0px 10px 0px;
}
img.img-thumbnail
{
    padding:4px;
    border:1px solid #000;
    border-radius:3px;
}
</style>

<div class="mmrreport-eading">
    <h2 class="main-heading">MMR REPORT FOR THE MONTH OF {{ $monthname }}-{{ $year }}</h2>
     <img src="images/apms-logo.png" class="aparna-logo" >
</div>


<div class="row">  
    <div class="scope-nature">
          <?php if($HKCount == 0 && $HKCoCount == 0 && $HKMCount == 0 && $PetsCount == 0 && $HCCount == 0 && $HOMCount == 0) { ?>
        	<div class="soft-services">SOFT SERVICES</div>
        	<?php } ?>      
       <div class="incident-summary"><?php echo $sCount; ?>.	Horticulture Consumables</div>
        <?php /*?><table width="100%" border="1">
        	<thead>
            	<tr>
                	<th>S.no</th>
                    <th>Category</th>
                    <th>Location</th>
                    <th>Descriptionk</th>
                 
                    <th><p>Date & Time</p></th>
                    <th>Remarks</th>
                </tr>
            </thead>
            <tbody>
               <?php $i = 0; ?> 
            @if(count($resvalconsume) > 0)
             @foreach($resvalconsume as $k => $val)
            	<tr>
                     <?php $i = $i + 1; ?>
                    <td><?php echo $i; ?></td>
                	<td><?php if(isset($val->category)) echo $val->category; ?></td>
                 
                    <td><?php if(isset($val->location)) echo $val->location; ?></td>
                     <td><?php if(isset($val->description)) echo $val->description; ?></td>
                    
                    <td style="width:80px;"><p><?php if(isset($val->report_on)) echo date("d-m-Y",strtotime($val->report_on)); ?></p></td>
                    <td><?php if(isset($val->remarks)) echo $val->remarks; ?></td>
                </tr>
                @endforeach
            @endif   
           
            </tbody>
        </table><?php */?>
		<?php 
			foreach($resvalconsume as $res)
			{
				$h1 =  $res['varmicompost'];
				$h2 =  $res['chloropyriphos'];
				$h3 =  $res['monocrotophos'];
				$h4 =  $res['imidaclopride'];
				$h5 =  $res['bavistin'];
				$h6 =  $res['dhanvit'];
				$h7 =  $res['multiplex'];
				$h8 =  $res['furadon'];
				$h9 =  $res['phorate'];
				$h10 =  $res['nineteenkgs'];
				$h11 =  $res['nineteenkgssoluble'];
				$h12 =  $res['acephate'];
				$h13 =  $res['seventeenkgs'];
				$h14 =  $res['urea'];
				$h15 =  $res['potash'];
				$h16 =  $res['rogar'];
				$h17 =  $res['malathian'];
				$h18 =  $res['fouate'];
				$h19 =  $res['fifteenkgs'];
				$h20 =  $res['twofourdkgs'];
				$h21 =  $res['glycil'];
				$h22 =  $res['sixteenkgs'];
				$h23 =  $res['arrowltrs'];
				$h24 =  $res['biowetltrs'];
				$h25 =  $res['blitaxkgs'];
				$h26 =  $res['twentykgs'];
				$h27 =  $res['cyhalothrinltrs'];
			} 
			//exit;
		?>
		
		<table width="100%" border="1" cellspacing="0"  class="nile-chikle">
            <tbody>
                <tr>
                	<th style="font-size:14px;padding:6px 0px;text-align:center;" colspan="4">Horticulture - Pesticides / Fertilizers and Fungicides Consumption Report for  </th>
                </tr>
                <tr>
                    <th style="width:50px;">S.No</th>
                    <th>Pesticides / Fertilizers and Fungicides </th>
					<th style="width:80px;">UOM</th>
                    <th style="width:120px;">Qty</th>
                </tr>
                
                <tr>
                    <td class="text-center">1</td>
                    <td>Varmicompost (organic manure)</td>
					<td>Kgs</td>
					
                    <td><?php if(isset($h1) && $h1!="") echo $h1; else echo "-"; ?></td>
                    
                </tr>
                
                <tr>
                    <td class="text-center">2</td>
                    <td>Chloropyriphos</td>
                    <td>Ltrs</td>
                    <td><?php if(isset($h2) && $h2!="") echo $h2; else echo "-"; ?></td>
                    
                </tr>
                
                
                <tr>
                    <td class="text-center">3</td>
                    <td>Monocrotophos</td>
                    <td>Ltrs</td>
                    <td><?php if(isset($h3) && $h3!="") echo $h3; else echo "-"; ?></td>
                    
                </tr>
                
                
                
                <tr>
                    <td class="text-center">4</td>
                    <td>Imidaclopride</td>
                    <td>Ltrs</td>
                    <td><?php if(isset($h4) && $h4!="") echo $h4; else echo "-"; ?></td>
                    
                </tr>
                
                
                
                <tr>
                    <td class="text-center">5</td>
                    <td>Carbendazim</td>
                    <td>Kgs</td>
                    <td><?php if(isset($h5) && $h5!="") echo $h5; else echo "-"; ?></td>
                </tr>
                
                <tr>
                    <td class="text-center">6</td>
                    <td>Dhanvit</td>
                    <td>Ltrs</td>
                    <td><?php if(isset($h6) && $h6!="") echo $h6; else echo "-"; ?></td>
                    
                </tr>
                
                <tr>
                    <td class="text-center">7</td>
                    <td>Multinutrient Solution</td>
                    <td>Ltrs</td>
                    <td><?php if(isset($h7) && $h7!="") echo $h7; else echo "-"; ?></td>
                
                </tr>
                
                <tr>
                    <td class="text-center">8</td>
                    <td>Furadon (G)</td>
                     <td>Kgs</td>
                    <td><?php if(isset($h8) && $h8!="") echo $h8; else echo "-"; ?></td>
                    
                </tr>
                
                
                <tr>
                    <td class="text-center">9</td>
                    <td>Phorate (G)</td>
                    <td>Kgs</td>
                    <td><?php if(isset($h9) && $h9!="") echo $h9; else echo "-"; ?></td>
                    
                </tr>
                
                <tr>
                    <td class="text-center">10</td>
                    <td>NPK 19-19-19 </td>
                    <td>Kgs</td>
                    <td><?php if(isset($h10) && $h10!="") echo $h10; else echo "-"; ?></td>
                    
                </tr>
                
                
                <tr style="display:none;">
                    <td class="text-center">11</td>
                    <td>19-19-19 (Soluble)</td>
                    <td>Kgs </td>
                    <td><?php if(isset($h11) && $h11!="") echo $h11; else echo "-"; ?></td>
                    
                </tr>
                
                
                
                <tr>
                    <td class="text-center">11</td>
                    <td>Acephate(75 SP)</td>
                    <td>Kgs</td>
                    <td><?php if(isset($h12) && $h12!="") echo $h12; else echo "-"; ?></td>
                    
                </tr>
                
                
                
                <tr>
                    <td class="text-center">12</td>
                    <td>17-17-17</td>
                     <td>Kgs</td>
                    <td><?php if(isset($h13) && $h13!="") echo $h13; else echo "-"; ?></td>
                
                </tr>
                
                <tr>
                    <td class="text-center">13</td>
                    <td>Urea</td>
                    <td>Kgs</td>
                    <td><?php if(isset($h14) && $h14!="") echo $h14; else echo "-"; ?></td>
                    
                </tr>
                
                <tr>
                    <td class="text-center">14</td>
                    <td>Potash</td>
                    <td>-</td>
                    <td><?php if(isset($h15) && $h15!="") echo $h15; else echo "-"; ?></td>
                    
                </tr>
                
                <tr>
                    <td class="text-center">15</td>
                    <td>Dimethoate</td>
                     <td>Ltrs</td>
                    <td><?php if(isset($h16) && $h16!="") echo $h16; else echo "-"; ?></td>
                    
                </tr>
                
                
                
                <tr>
                    <td class="text-center">16</td>
                    <td>Malathian</td>
                     <td>Ltrs</td>
                    <td><?php if(isset($h17) && $h17!="") echo $h17; else echo "-"; ?></td>
                    
                </tr>
                
                
                
               <tr style="display:none;">
                    <td class="text-center">18</td>
                    <td>Fouate</td>
                    <td>Kgs</td>
                    <td><?php if(isset($h18) && $h18!="") echo $h18; else echo "-"; ?></td>
                    
                
                </tr>
                
                <tr>
                    <td class="text-center">18</td>
                    <td>NPK 15-15-15</td>
                    <td>Kgs</td>
                    <td><?php if(isset($h19) && $h19!="") echo $h19; else echo "-"; ?></td>
                    
                </tr>
                
                <tr>
                    <td class="text-center">19</td>
                    <td>2-4 D</td>
                     <td>Kgs</td>
                    <td><?php if(isset($h20) && $h20!="") echo $h20; else echo "-"; ?></td>
                    
                </tr>
                
                <tr>
                    <td class="text-center">20</td>
                    <td>Glycil</td>
                    <td>Ltrs</td>
                    <td><?php if(isset($h21) && $h21!="") echo $h21; else echo "-"; ?></td>
                    
                </tr>
                
                <tr>
                    <td class="text-center">21</td>
                    <td>NPK 16-16-16</td>
                      <td>Kgs</td>
                    <td><?php if(isset($h22) && $h22!="") echo $h22; else echo "-"; ?></td>
                    
                </tr>
                
                
                
                <tr>
                    <td class="text-center">22</td>
                    <td>Thiomethaxion</td>
                    <td>Ltrs</td>
                    <td><?php if(isset($h23) && $h23!="") echo $h23; else echo "-"; ?></td>
                    
                </tr>
                
                
                
                <tr style="display:none;">
                    <td class="text-center">23</td>
                    <td>Biowet</td>
                     <td>Ltrs</td>
                    <td><?php if(isset($h24) && $h24!="") echo $h24; else echo "-"; ?></td>
                    
                
                </tr>
                
                <tr>
                    <td class="text-center">24</td>
                    <td>Copper Oxychloride</td>
                     <td>Kgs</td>
                    <td><?php if(isset($h25) && $h25!="") echo $h25; else echo "-"; ?></td>
                    
                </tr>
                
                <tr>
                    <td class="text-center">25</td>
                    <td>NPK 20-20-20 </td>
                     <td>Kgs</td>
                    <td><?php if(isset($h26) && $h26!="") echo $h26; else echo "-"; ?></td>
                    
                </tr>
                
                <tr>
                    <td class="text-center">26</td>
                    <td>Lambda cyhalothrin </td>
                    <td>Ltrs</td>
                    <td><?php if(isset($h27) && $h27!="") echo $h27; else echo "-"; ?></td>                    
                </tr>
            </tbody>
        </table>
      
      
    </div>	
     <p class="footer">Aparna Property Management Services Pvt.Ltd.,</p>	 		 
</div>
</html>
					   
					


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
