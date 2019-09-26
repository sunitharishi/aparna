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

 right:-20px;

 top:-20px;

 padding:4px;

 width:110px;

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

	  .mmrpower-consumption table thead tr th

	  {

	   padding:8px;

	    background-color:#e6e2e2;

           font-size:12.6px;

	  }

	  .mmrpower-consumption table tbody tr td

	  {

	   padding:8px;

           font-size:12.6px;

	  }


     .images-section
     {
         text-align:center;
         margin-bottom:20px;
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
	</style>

  </head>





    <div class="panel panel-default critical-manpower">

        <div class="row">

        	<div class="enginnering-heading power-heading">

           		    <h2 class="main-heading">MMR REPORT FOR THE MONTH OF XXXX-XXXX</h2>

                 <img src="images/apms-logo.png" class="aparna-logo" >

           </div>

        </div>      

        <div class="row">
              <?php if($MICount == 0 && $EQPCOunt == 0 && $AMCCount == 0 && $PPCount == 0 && $PConCount == 0 && $powFailureCount == 0 && $dggeneratedCount == 0) { ?>
	 <div class="soft-services">TECHNICAL SERVICES</div>
	 <?php } ?>
            <h4><span>10. Monthly Water Consumption (metro ,borewell, tankers)</span></h4>
 
            
               <div class="images-section"><img src="images/power-graph.jpg" ></div>
           	<div class="mmrpower-consumption">

            	<table width="" border="1">

                	<thead>

                    	<tr>

                        	<th style="width:40px;border-right:0px;">&nbsp;</th>

                            <th style="border-left:0px solid #fff;">&nbsp;</th>

                            <th>December></th>

                            <th>January</th>

                             <th>Februrary</th>

                        </tr>

                        <tbody>

                        	<tr>

                            	<td style="width:40px;border-right:0px;"><hr  style="border-top:5px solid #ccc;width:25px;float:left;"/></td>

                                <td style="border-left:0px solid #fff;"> EB Power consumption</td>

                                <td>434444</td>

                                <td>480358</td>

                                <td>573958</td>

                            </tr>

                            <tr>

                            	<td style="width:40px;border-right:0px;"><hr style="border-top:5px solid #585353;width:25px;float:left;" /></td>

                                <td style="border-left:0px solid #fff;">Solar power Generated</td>

                                <td>434444</td>

                                <td>200000</td>

                                <td>56744</td>

                            </tr>

                            <tr>

                            	<td style="width:40px;border-right:0px;"><hr style="border-top:5px solid #e0d5d5;width:25px;float:left;" /> </td>

                                <td style="border-left:0px solid #fff;">DG power Generated</td>

                                <td>34899</td>

                                <td>56789</td>

                                <td>65777</td>

                            </tr>

                        </tbody>

                    </thead>

                </table>
              </div>
        

        </div>

         <p class="footer">Aparna Property Management Services Pvt.Ltd.,</p>	

    </div>   

	

 </html>




 



