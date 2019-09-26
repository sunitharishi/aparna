

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
  .incident-summary
    {
 position:relative;
 font-size: 17px;
vertical-align:top;
font-weight:600;
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



           		    <h2 class="main-heading">MMR REPORT FOR THE MONTH OF {{ $monthname }}-{{ $report_year }}</h2>



                 <img src="images/apms-logo.png" class="aparna-logo" >



           </div>



        </div>      



        <div class="row">
           <div class="incident-summary">WSP-Inlet  Water Test Report </span></div>

         

        <div class="metro-test-reports">

             <div class="test-reports">

             	<h5>TEST REPORT</h5>

                <table class="test-report">

                	<thead>

                    	<tr>

                        	<th colspan="2">Customer Name & Address</th>

                            <th>Test Report No.<?php if(isset($pbasys['test_report_no']) && $pbasys['test_report_no']!="") echo $pbasys['test_report_no']; ?></th>
                            <th>VCR-<?php if(isset($pbasys['vcr']) && $pbasys['vcr']!="") echo $pbasys['vcr']; ?></th>

                        </tr>

                    </thead>

                    <tbody>

                    	<tr>

                        	<td rowspan="4" colspan="2" align="center">M/s. Aparna Property Management Services, <br /> Hyderabad.</td>

                            <td>Report Issue Date</td>

                            <td><?php if(isset($pbasys['report_idate']) && $pbasys['report_idate']!="") echo date("d-m-Y",strtotime($pbasys['report_idate'])); ?></td>

                        </tr>

                        <tr>

                            <td>Registration No.</td>

                            <td><?php if(isset($pbasys['regis_no']) && $pbasys['regis_no']!="") echo $pbasys['regis_no']; ?></td>

                        </tr>

                        <tr>

                            <td>Registration Date</td>

                            <td><?php if(isset($pbasys['regis_date']) && $pbasys['regis_date']!="") echo date("d-m-Y",strtotime($pbasys['regis_date']));?></td>

                        </tr>

                         <tr>

                            <td>Customer Reference</td>

                            <td><?php if(isset($pbasys['cus_ref']) && $pbasys['cus_ref']!="") echo $pbasys['cus_ref']; ?></td>

                        </tr>

                        <tr>

                        	<td rowspan="2">Sample Description</td>

                            <td rowspan="2">WSP - Inlet</td>

                            <td>Reference Date</td>

                            <td><?php if(isset($pbasys['ref_date']) && $pbasys['ref_date']!="") echo $pbasys['ref_date'];?></td>

                        </tr>

                        <tr>

                        	<td>Analysis Starting Date</td>

                            <td><?php if(isset($pbasys['analy_startdate']) && $pbasys['analy_startdate']!="") echo date("d-m-Y",strtotime($pbasys['analy_startdate'])); ?></td>

                        </tr>

                          <tr>

                        	<td rowspan="3">Sample Site</td>

                            <td rowspan="3"><?php echo $sitename; ?></td>

                            <td>Analysis Completion Date</td>

                            <td><?php if(isset($pbasys['analy_compdate']) && $pbasys['analy_compdate']!="") echo date("d-m-Y",strtotime($pbasys['analy_compdate'])); ?></td>

                        </tr>

                          <tr>

                        	<td>Storage Condition</td>

                            <td><?php if(isset($pbasys['stor_cond']) && $pbasys['stor_cond']!="") echo $pbasys['stor_cond']; ?></td>

                        </tr>

                         <tr>

                        	<td>Condition Upon Receipt</td>

                            <td><?php if(isset($pbasys['cond_rec']) && $pbasys['cond_rec']!="") echo $pbasys['cond_rec']; ?></td>

                        </tr>

                        <tr>

                        	<td colspan="2">Quantity Received</td>

                            <td colspan="2"><?php if(isset($pbasys['qua_rec']) && $pbasys['qua_rec']!="") echo $pbasys['qua_rec']; ?></td>

                        </tr>

                         <tr>

                        	<td colspan="2">Sample Collected or Submitted</td>

                            <td colspan="2"><?php if(isset($pbasys['sam_coll']) && $pbasys['sam_coll']!="") echo $pbasys['sam_coll']; ?></td>

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

                           <td><?php if(isset($pbasys['ph']) && $pbasys['ph']!="") echo $pbasys['ph']; ?></td>
                           
                           <td>6.50-8.50</td>

                        </tr>

                        <tr>

                           <td>2</td>

                           <td>Conductivity</td>

                           <td>ps/cm</td>

                           <td> APHA</td>

                           <td><?php if(isset($pbasys['conductivity']) && $pbasys['conductivity']!="") echo $pbasys['conductivity']; ?></td>
                           
                            <td>Not Specified</td>

                        </tr>

                         <tr>

                           <td>3</td>

                           <td>Colour</td>

                           <td>Hazen</td>

                           <td>IS 3025 P-4</td>

                           <td><?php if(isset($pbasys['colour']) && $pbasys['colour']!="") echo $pbasys['colour']; ?></td>
                           
                           <td>&lt;5</td>

                        </tr>

                        <tr>

                           <td>4</td>

                           <td>Turbiditv</td>

                           <td>NTU</td>

                           <td>IS 302s P-10</td>

                           <td><?php if(isset($pbasys['turbidity']) && $pbasys['turbidity']!="") echo $pbasys['turbidity']; ?></td>
                           
                           <td>&lt;1</td>

                        </tr>

                        <tr>

                           <td>5</td>

                           <td>Total Dissolved Solids</td>

                           <td>mg / l</td>

                           <td>IS 3025 P-16</td>

                           <td><?php if(isset($pbasys['solids']) && $pbasys['solids']!="") echo $pbasys['solids']; ?></td>
                           
                           <td>&lt;500</td>

                        </tr>

                         <tr>

                           <td>6</td>

                           <td>Alkalinity to Phenolphthalein as CaCO<sub>3</sub></td>

                           <td>mg / l</td>

                           <td>IS 3025 P-23</td>

                           <td><?php if(isset($pbasys['phenocaco']) && $pbasys['phenocaco']!="") echo $pbasys['phenocaco']; ?></td>
                           
                           <td>Not Specified</td>

                        </tr>

                          <tr>

                           <td>7</td>

                           <td>Aikalinity to methyl orange as CaCO<sub>3</sub></td>

                           <td>mg / l</td>

                           <td>IS 3025 P-23</td>

                           <td><?php if(isset($pbasys['orangecaco']) && $pbasys['orangecaco']!="") echo $pbasys['orangecaco']; ?></td>
                           
                           <td>&lt;200</td>

                        </tr>

                         <tr>

                           <td>8</td>

                           <td>Total Hardness as CaCO<sub>3</sub></td>

                           <td>mg / l</td>

                           <td>IS 3025 P-21</td>

                           <td><?php if(isset($pbasys['hardnesscaco']) && $pbasys['hardnesscaco']!="") echo $pbasys['hardnesscaco']; ?></td>
                           
                           <td>&lt;200</td>

                        </tr>

                        <tr>

                           <td>9</td>

                           <td>Non carbonate l-lardness as CaCO<sub>3</sub></td>

                           <td>mg / l</td>

                           <td>IS 3025 P-21</td>

                           <td><?php if(isset($pbasys['lardnesscaco']) && $pbasys['lardnesscaco']!="") echo $pbasys['lardnesscaco']; ?></td>
                           
                           <td>Not Specified</td>

                        </tr>

                         <tr>

                           <td>10</td>

                           <td>Calcium as Ca</td>

                           <td>mg / l</td>

                           <td>IS 3025 P-40</td>

                           <td><?php if(isset($pbasys['calciumca']) && $pbasys['calciumca']!="") echo $pbasys['calciumca']; ?></td>
                           
                           <td>&lt;75</td>

                        </tr>

                          <tr>

                           <td>11</td>

                           <td>Maqneslum as Mg</td>

                           <td>mg / l</td>

                           <td>IS 3025 P-46</td>

                           <td><?php if(isset($pbasys['magneslummg']) && $pbasys['magneslummg']!="") echo $pbasys['magneslummg']; ?></td>
                           
                           <td>&lt;30</td>

                        </tr>

                        <tr>

                           <td>12</td>

                           <td>Sodium as Na</td>

                           <td>mg / l</td>

                           <td>IS 3025 P-45</td>

                           <td><?php if(isset($pbasys['sodiumna']) && $pbasys['sodiumna']!="") echo $pbasys['sodiumna']; ?></td>
                           
                           <td>Not Specified</td>

                        </tr>

                         <tr>

                           <td>13</td>

                           <td>Pctassiurn as K</td>

                           <td>mg / l</td>

                           <td>IS 3025 P-45</td>

                           <td><?php if(isset($pbasys['pctassiurnk']) && $pbasys['pctassiurnk']!="") echo $pbasys['pctassiurnk']; ?></td>
                           
                           <td>Not Specified</td>

                        </tr>

                        <tr>

                           <td>14</td>

                           <td>lron as Fe</td>

                           <td>mg / l</td>

                           <td>IS 3025 P-53</td>

                           <td><?php if(isset($pbasys['ironfe']) && $pbasys['ironfe']!="") echo $pbasys['ironfe']; ?></td>
                           
                           <td>&lt;0.3</td>

                        </tr>

                        <tr>

                           <td>15</td>

                           <td>Silica as SiO<sub>2</sub></td>

                           <td>mg / l</td>

                           <td>APHA</td>

                           <td><?php if(isset($pbasys['silicasio']) && $pbasys['silicasio']!="") echo $pbasys['silicasio']; ?></td>
                           
                           <td>Not Specified</td>

                        </tr>

                         <tr>

                           <td>16</td>

                           <td>Fluoride as F</td>

                           <td>mg / l</td>

                           <td>APHA</td>

                           <td><?php if(isset($pbasys['fluoridef']) && $pbasys['fluoridef']!="") echo $pbasys['fluoridef']; ?></td>
                           
                           <td>&lt;1.0</td>

                        </tr>

                          <tr>

                           <td>17</td>

                           <td>Chlorides as Cl </td>

                           <td>mg / l</td>

                           <td>IS 3025 P-32</td>

                           <td><?php if(isset($pbasys['chloridesci']) && $pbasys['chloridesci']!="") echo $pbasys['chloridesci']; ?></td>
                           
                           <td>&lt;250</td>

                        </tr>

                         <tr>

                           <td>18</td>

                           <td>Sulphates as SO<sub>4</sub></td>

                           <td>mg / l</td>

                           <td>IS 3025 P-24</td>

                           <td><?php if(isset($pbasys['sulphatesso']) && $pbasys['sulphatesso']!="") echo $pbasys['sulphatesso']; ?></td>
                           
                            <td>&lt;200</td>

                        </tr>

                        <tr>

                           <td>19</td>

                           <td>Nitrates as NO<sub>3</sub></td>

                           <td>mg / l</td>

                           <td>IS 3025 P-34</td>

                           <td><?php if(isset($pbasys['nitratesno']) && $pbasys['nitratesno']!="") echo $pbasys['nitratesno']; ?></td>
                           
                            <td>&lt;45</td>

                        </tr>

                         <tr>

                           <td>20</td>

                           <td>Chlorine demand</td>

                           <td>mg / l</td>

                           <td>APHA</td>

                           <td><?php if(isset($pbasys['chlorinede']) && $pbasys['chlorinede']!="") echo $pbasys['chlorinede']; ?></td>
                           
                            <td>&lt;1.0</td>

                        </tr>

                    </tbody>

                </table>

             </div>
             
             
         	 <?php /*?><div class="table-responsive" style="width:660px; margin:15px auto; text-align:center;">
              <?php if(isset($pbasys['wspinlet_pic']) && $pbasys['wspinlet_pic']!="") { ?>
					<img src="<?php  echo url('/')."/".$pbasys['wspinlet_pic']; ?>" border="0"/>
               <?php } ?>
            </div><?php */?>

           

           </div>  

             

          

        </div>



         <p class="footer">Aparna Property Management Services Pvt.Ltd.,</p>	



    </div>   



	



 </html>









 







