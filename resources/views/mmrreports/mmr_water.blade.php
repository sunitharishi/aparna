
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

	   font-family:Arial, Helvetica, sans-serif;

	  }

.aparna-logo
{

 background-color:#0157a4;

 position:absolute;

 right:0px;

 top:-20px;

 padding:4px;

 width:120px;

 height:auto;

}
.enginnering-heading
{
    margin-bottom:20px;
}
.enginnering-heading h2

{

 font-size: 18px;

    font-weight: 600;

    color: #666262;

    text-align: center;

	margin-bottom:0px;
	margin-top:-8px;

text-transform:uppercase;

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

 bottom:-30px;

 right:0px;

}

	h4

{

 margin-bottom:10px;

 margin-top:5px;

 line-height:19px;

 padding:0px;

font-size:17px;

}

  .mmrpower-consumption table

	  {

	   border-collapse:collapse;

	   width:auto;

	   margin:0 auto;

	  }
	  .mmrpower-consumption table tbody tr:nth-of-type(odd)
	  {
	      background-color:#F2F2F2;
	      color:#000;
	  }

	  .mmrpower-consumption table thead tr th

	  {

	   padding:8px;

           font-size:12.6px;
           border:1px solid #000;

	  }

	  .mmrpower-consumption table tbody tr td

	  {

	   padding:8px;

           font-size:12.6px;
           color:#000;
           border:1px solid #000;

	  }


     .images-section
     {
         text-align:center;
         margin-bottom:20px;
     }

	</style>

  </head>





    <div class="panel panel-default critical-manpower">

        <div class="row">

        	<div class="enginnering-heading power-heading">

           		    <h2>MMR REPORT FOR THE MONTH OF {{ $monthname }}-{{ $year }}</h2>

                 <img src="images/apms-logo.png" class="aparna-logo" >

           </div>

        </div>      

        <div class="row">

            <h4><span>Water Consumption Analysis</span></h4>

        	<?php if(isset($ebgraph) && $ebgraph!="") { ?>
             <div class="images-section"><img src="http://testing.rreg.in/<?php echo $ebgraph; ?>" ></div>
             <?php } ?>
             	<div class="mmrpower-consumption">

            	<table width="" border="1">

                	<thead>

                    	<tr>

                        	

                            <th style="background-color:#115D8C;color:#fff;font-weight:bold;">Units</th>

                            <th style="background-color:#1DB2F5;color:#fff;font-weight:bold;"><?php echo $bmonthname;  ?></th>

                            <th style="background-color:#F5564A;color:#fff;font-weight:bold;"><?php echo $pmonthname;  ?></th>

                             <th style="background-color:#97C95C;color:#fff;font-weight:bold;"><?php echo $cmonthname;  ?></th>

                        </tr>

                        <tbody>

                        	

                            <tr>

                            	

                                <td style="color:#fff;font-weight:700;background-color:#86A5A4;">Metro in KL</td>

                                <td style="color:#000;font-weight:500;"><?php echo $Wsp_Metro3; ?></td>

                                <td style="color:#000;font-weight:500;"><?php echo $Wsp_Metro2; ?></td>

                                <td style="color:#000;font-weight:500;"><?php echo $Wsp_Metro1; ?></td>

                            </tr>
                            
                            <tr>

                            

                                <td style="color:#fff;font-weight:700;background-color:#86A5A4;">Bores in KL</td>

                                <td style="color:#000;font-weight:500;"><?php echo $Wsp_Bores3; ?></td>

                                <td style="color:#000;font-weight:500;"><?php echo $Wsp_Bores2; ?></td>

                                <td style="color:#000;font-weight:500;"><?php echo $Wsp_Bores1; ?></td>

                            </tr>

                            <tr>

                            

                                <td style="color:#fff;font-weight:700;background-color:#86A5A4;">Tankers in KL</td>

                                <td style="color:#000;font-weight:500;"><?php echo $Wsp_Tankers3; ?></td>

                                <td style="color:#000;font-weight:500;"><?php echo $Wsp_Tankers2; ?></td>

                                <td style="color:#000;font-weight:500;"><?php echo $Wsp_Tankers1; ?></td>

                            </tr>
                            
                            
                             <tr>

                            

                                <td style="color:#fff;font-weight:700;background-color:#86A5A4;">STP Treated in KL</td>

                                <td style="color:#000;font-weight:500;"><?php echo $Wsp_Treatwater3; ?></td>

                                <td style="color:#000;font-weight:500;"><?php echo $Wsp_Treatwater2; ?></td>

                                <td style="color:#000;font-weight:500;"><?php echo $Wsp_Treatwater1; ?></td>

                            </tr>

                        </tbody>

                    </thead>

                </table>
              </div>
        </div>

         <p class="footer">Aparna Property Management Services Pvt.Ltd.,</p>	

    </div>   

	

 </html>




 



