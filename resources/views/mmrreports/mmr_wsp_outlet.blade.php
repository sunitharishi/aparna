

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



	margin-bottom:0px;



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



 bottom:-40px;



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

.test-results

{

 clear:both;

}

.test-reports h5, .test-results h5

{

 margin:6px 0px 6px 0px;

 text-align:center;

}

.test-reports table, .test-results table

{

 border:1px solid #000;

 width:100%;

 border-collapse:collapse;

}

.test-reports table tr th, .test-reports table tr td, .test-results tr th, .test-results tr td

{

 border:1px solid #000;

 padding:2.5px;

 font-size:13px;

 vertical-align:middle;

}

.note

{

 width:100%;

 clear:both;

 font-size:13px;

 display:block;

 margin-top:6px;

}

.note .note-heading

{

 width:5%;

 float:left;

 font-weight:bold;

 margin=-right:10px;

 vertical-align:middle;

 overflow:hidden;

}

.note .note-content

{

 width:94%;

 float:left;

 vertical-align:top;

 overflow:hidden;
 margin-top:0px;
  padding-top:0px;

}

.note .note-content, .note .note-content *

{

 padding:0px;

 margin:0px;

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

/*#pageFooter:after {
    counter-increment: page;
    content:"Page " counter(5);
    left: 0; 
    top: 100%;
    white-space: nowrap; 
    z-index: 20;
    -moz-border-radius: 5px; 
    -moz-box-shadow: 0px 0px 4px #222;  
    background-image: -moz-linear-gradient(top, #eeeeee, #cccccc);  
  }*/
  
  
	</style>



  </head>











    <div class="panel panel-default critical-manpower">



        <div class="row">



        	<div class="enginnering-heading power-heading">



           		    <h2 class="main-heading">MMR REPORT FOR THE MONTH OF {{ $monthname }}-{{ $report_year }}</h2>



                 <img src="images/apms-logo.png" class="aparna-logo" >



           </div>



        </div>      



        <div class="row">

            <h4><span>WSP-Outlet Water Test Report</span></h4>

         
 

             

          <div class="metro-test-reports"> 

              <div class="test-reports">

             	<h5>TEST REPORT</h5>

                <table class="test-report">

                	<thead>

                    	<tr>

                        	<th colspan="2">Customer Name & Address</th>

                           <th>Test Report No.<?php if(isset($pbasys1['test_report_no']) && $pbasys1['test_report_no']!="") echo $pbasys1['test_report_no']; ?></th>
                           <th>VCR-<?php if(isset($pbasys1['vcr']) && $pbasys1['vcr']!="") echo $pbasys1['vcr']; ?></th>

                        </tr>

                    </thead>

                    <tbody>

                    	<tr>

                        	<td rowspan="4" colspan="2" align="center">M/s. Aparna Property Management Services, <br /> Hyderabad.</td>

                            <td>Report Issue Date</td>

                            <td><?php if(isset($pbasys1['report_idate']) && $pbasys1['report_idate']!="") echo date("d-m-Y",strtotime($pbasys1['report_idate'])); ?></td>

                        </tr>

                        <tr>

                            <td>Registration No.</td>

                            <td><?php if(isset($pbasys1['regis_no']) && $pbasys1['regis_no']!="") echo $pbasys1['regis_no']; ?></td>

                        </tr>

                        <tr>

                            <td>Registration Date</td>

                            <td><?php if(isset($pbasys1['regis_date']) && $pbasys1['regis_date']!="") echo $pbasys['regis_date'];?></td>

                        </tr>

                         <tr>

                            <td>Customer Reference</td>

                            <td><?php if(isset($pbasys1['cus_ref']) && $pbasys1['cus_ref']!="") echo $pbasys1['cus_ref']; ?></td>

                        </tr>

                        <tr>

                        	<td rowspan="2">Sample Description</td>

                            <td rowspan="2">WSP - Outlet</td>

                            <td>Reference Date</td>

                            <td><?php if(isset($pbasys1['ref_date']) && $pbasys1['ref_date']!="") echo $pbasys['ref_date'];?></td>

                        </tr>

                        <tr>

                        	<td>Analysis Starting Date</td>

                            <td><?php if(isset($pbasys1['analy_startdate']) && $pbasys1['analy_startdate']!="") echo date("d-m-Y",strtotime($pbasys1['analy_startdate'])); ?></td>

                        </tr>

                          <tr>

                        	<td rowspan="3">Sample Site</td>

                            <td rowspan="3"><?php echo $sitename; ?></td>

                            <td>Analysis Completion Date</td>

                            <td><?php if(isset($pbasys1['analy_compdate']) && $pbasys1['analy_compdate']!="") echo date("d-m-Y",strtotime($pbasys1['analy_compdate'])); ?></td>

                        </tr>

                          <tr>

                        	<td>Storage Condition</td>

                            <td><?php if(isset($pbasys1['stor_cond']) && $pbasys1['stor_cond']!="") echo $pbasys1['stor_cond']; ?></td>

                        </tr>

                         <tr>

                        	<td>Condition Upon Receipt</td>

                            <td><?php if(isset($pbasys1['cond_rec']) && $pbasys1['cond_rec']!="") echo $pbasys1['cond_rec']; ?></td>

                        </tr>

                        <tr>

                        	<td colspan="2">Quantity Received</td>

                            <td colspan="2"><?php if(isset($pbasys1['qua_rec']) && $pbasys1['qua_rec']!="") echo $pbasys1['qua_rec']; ?></td>

                        </tr>

                         <tr>

                        	<td colspan="2">Sample Collected or Submitted</td>

                            <td colspan="2"><?php if(isset($pbasys1['sam_coll']) && $pbasys1['sam_coll']!="") echo $pbasys1['sam_coll']; ?></td>

                        </tr>

                    </tbody>

                </table>

             </div>

             

              <div class="test-results">

             	<h5>TEST RESULT</h5>

                <table class="test-report">

                	<thead>

                    	<tr>

                        	<th>S.No</th>

                            <th>Parameters</th>

                            <th>Units</th>

                            <th>Test Method</th>

                            <th>Results</th>

                            <th>LIMITS</th>

                        </tr>

                    </thead>

                    <tbody>

                    	

                        <tr>

                        	<td colspan="6">Physical & chemical Parameters</td>

                        </tr>

                        <tr>

                           <td>1</td>

                           <td>pH</td>

                           <td>-</td>

                           <td>IS 3025 P-11</td>

                           <td><?php if(isset($pbasys1['ph']) && $pbasys1['ph']!="") echo $pbasys1['ph']; ?></td>
                           
                           <td>6.50-8.50</td>

                        </tr>

                        <tr>

                           <td>2</td>

                           <td>Conductivity</td>

                           <td>ps/cm</td>

                           <td> APHA</td>

                           <td><?php if(isset($pbasys1['conductivity']) && $pbasys1['conductivity']!="") echo $pbasys1['conductivity']; ?></td>
                           
                           <td>Not Specified</td>

                        </tr>

                         <tr>

                           <td>3</td>

                           <td>Colour</td>

                           <td>Hazen</td>

                           <td>IS 3025 P-4</td>

                           <td><?php if(isset($pbasys1['colour']) && $pbasys1['colour']!="") echo $pbasys1['colour']; ?></td>
                           
                           <td>&lt;5</td>

                        </tr>

                        <tr>

                           <td>4</td>

                           <td>Turbiditv</td>

                           <td>NTU</td>

                           <td>IS 302s P-10</td>

                           <td><?php if(isset($pbasys1['turbidity']) && $pbasys1['turbidity']!="") echo $pbasys1['turbidity']; ?></td>
                           
                           <td>&lt;1</td>

                        </tr>

                        <tr>

                           <td>5</td>

                           <td>Total Dissolved Solids</td>

                           <td>mg / l</td>

                           <td>IS 3025 P-16</td>

                           <td><?php if(isset($pbasys1['solids']) && $pbasys1['solids']!="") echo $pbasys1['solids']; ?></td>
                           
                           <td>&lt;500</td>

                        </tr>

                         <tr>

                           <td>6</td>

                           <td>Alkalinity to Phenolphthalein as CaCO<sub>3</sub></td>

                           <td>mg / l</td>

                           <td>IS 3025 P-23</td>

                           <td><?php if(isset($pbasys1['phenocaco']) && $pbasys1['phenocaco']!="") echo $pbasys1['phenocaco']; ?></td>
                           
                           <td>Not Specified</td>

                        </tr>

                          <tr>

                           <td>7</td>

                           <td>Aikalinity to methyl orange as CaCO<sub>3</sub></td>

                           <td>mg / l</td>

                           <td>IS 3025 P-23</td>

                           <td><?php if(isset($pbasys1['orangecaco']) && $pbasys1['orangecaco']!="") echo $pbasys1['orangecaco']; ?></td>
                           
                           <td>&lt;200</td>

                        </tr>

                         <tr>

                           <td>8</td>

                           <td>Total Hardness as CaCO<sub>3</sub></td>

                           <td>mg / l</td>

                           <td>IS 3025 P-21</td>

                           <td><?php if(isset($pbasys1['hardnesscaco']) && $pbasys1['hardnesscaco']!="") echo $pbasys1['hardnesscaco']; ?></td>
                           
                           <td>&lt;200</td>

                        </tr>

                        <tr>

                           <td>9</td>

                           <td>Non carbonate l-lardness as CaCO<sub>3</sub></td>

                           <td>mg / l</td>

                           <td>IS 3025 P-21</td>

                           <td><?php if(isset($pbasys1['lardnesscaco']) && $pbasys1['lardnesscaco']!="") echo $pbasys1['lardnesscaco']; ?></td>
                           
                           <td>Not Specified</td>

                        </tr>

                         <tr>

                           <td>10</td>

                           <td>Calcium as Ca</td>

                           <td>mg / l</td>

                           <td>IS 3025 P-40</td>

                           <td><?php if(isset($pbasys1['calciumca']) && $pbasys1['calciumca']!="") echo $pbasys1['calciumca']; ?></td>
                           
                           <td>&lt;75</td>

                        </tr>

                          <tr>

                           <td>11</td>

                           <td>Maqneslum as Mg</td>

                           <td>mg / l</td>

                           <td>IS 3025 P-46</td>

                           <td><?php if(isset($pbasys1['magneslummg']) && $pbasys1['magneslummg']!="") echo $pbasys1['magneslummg']; ?></td>
                           
                           <td>&lt;30</td>

                        </tr>

                        <tr>

                           <td>12</td>

                           <td>Sodium as Na</td>

                           <td>mg / l</td>

                           <td>IS 3025 P-45</td>

                           <td><?php if(isset($pbasys1['sodiumna']) && $pbasys1['sodiumna']!="") echo $pbasys1['sodiumna']; ?></td>
                           
                           <td>Not Specified</td>


                        </tr>

                         <tr>

                           <td>13</td>

                           <td>Pctassiurn as K</td>

                           <td>mg / l</td>

                           <td>IS 3025 P-45</td>

                           <td><?php if(isset($pbasys1['pctassiurnk']) && $pbasys1['pctassiurnk']!="") echo $pbasys1['pctassiurnk']; ?></td>
                                                      
                           <td>Not Specified</td>
                        </tr>

                        <tr>

                           <td>14</td>

                           <td>lron as Fe</td>

                           <td>mg / l</td>

                           <td>IS 3025 P-53</td>

                           <td><?php if(isset($pbasys1['ironfe']) && $pbasys1['ironfe']!="") echo $pbasys1['ironfe']; ?></td>
                           
                           <td>&lt;0.3</td>

                        </tr>

                        <tr>

                           <td>15</td>

                           <td>Silica as SiO<sub>2</sub></td>

                           <td>mg / l</td>

                           <td>APHA</td>

                           <td><?php if(isset($pbasys1['silicasio']) && $pbasys1['silicasio']!="") echo $pbasys1['silicasio']; ?></td>
                           
                           <td>Not Specified</td>

                        </tr>

                         <tr>

                           <td>16</td>

                           <td>Fluoride as F</td>

                           <td>mg / l</td>

                           <td>APHA</td>

                           <td><?php if(isset($pbasys1['fluoridef']) && $pbasys1['fluoridef']!="") echo $pbasys1['fluoridef']; ?></td>
                           
                           <td>&lt;1.0</td>

                        </tr>

                          <tr>

                           <td>17</td>

                           <td>Chlorides as Cl </td>

                           <td>mg / l</td>

                           <td>IS 3025 P-32</td>

                           <td><?php if(isset($pbasys1['chloridesci']) && $pbasys1['chloridesci']!="") echo $pbasys1['chloridesci']; ?></td>
                           
                           <td>&lt;250</td>

                        </tr>

                         <tr>

                           <td>18</td>

                           <td>Sulphates as SO<sub>4</sub></td>

                           <td>mg / l</td>

                           <td>IS 3025 P-24</td>

                           <td><?php if(isset($pbasys1['sulphatesso']) && $pbasys1['sulphatesso']!="") echo $pbasys1['sulphatesso']; ?></td>
                           
                            <td>&lt;200</td>

                        </tr>

                        <tr>

                           <td>19</td>

                           <td>Nitrates as NO<sub>3</sub></td>

                           <td>mg / l</td>

                           <td>IS 3025 P-34</td>

                           <td><?php if(isset($pbasys1['nitratesno']) && $pbasys1['nitratesno']!="") echo $pbasys1['nitratesno']; ?></td>
                           
                          <td>&lt;45</td>

                        </tr>

                         <tr>

                           <td>20</td>

                           <td>Chlorine demand</td>

                           <td>mg / l</td>

                           <td>APHA</td>

                           <td><?php if(isset($pbasys1['chlorinede']) && $pbasys1['chlorinede']!="") echo $pbasys1['chlorinede']; ?></td>
                           
                           <td>&lt;1.0</td>

                        </tr>

                    </tbody>

                </table>

             </div>
             
             <?php /*?><div class="table-responsive" style="width:660px; margin:15px auto; text-align:center;">
				<?php if(isset($pbasys1['wspoutlet_pic']) && $pbasys1['wspoutlet_pic']!="") { ?>
					<img src="<?php  echo url('/')."/".$pbasys1['wspoutlet_pic']; ?>" border="0"/>
               <?php } ?>
            </div>
<?php */?>

           

             

          </div>

          

        </div>



         <p class="footer">Aparna Property Management Services Pvt.Ltd.,</p>	
		 
		 
		<?php /*?> <div id="content">
		  <div id="pageFooter"></div>
		</div><?php */?>



    </div>   



	



 </html>









 







