
    <link href="/vendors1/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">  
    <!-- Font Awesome -->
    <link href="/vendors1/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
   <!-- <link href="vendors1/nprogress/nprogress.css" rel="stylesheet">-->
    <!-- iCheck -->
    <!--<link href="vendors1/iCheck/skins/flat/green.css" rel="stylesheet">-->
	
    <!-- bootstrap-progressbar -->
    <link href="/vendors1/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
   <!-- <link href="vendors1/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>-->
    <!-- bootstrap-daterangepicker -->
    <!--<link href="vendors1/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">-->

    <!-- Custom Theme Style -->
    <link href="/build/css/custom.css" rel="stylesheet">

	<link rel="stylesheet" href="/dist/tablesaw.css">
	<link rel="stylesheet" href="/demo/demo.css">
	<link rel="stylesheet" href="//filamentgroup.github.io/demo-head/demohead.css">
    <style>
	.manjeera table tr th 
	{
	padding:5px;
	text-align:center;
	}
	.manjeera table tr td 
	{
	padding:5px;
	text-align:center;
	}
 	.manjeera
	{
	font-size:12px;
	}
	.x_title
	{
	border-bottom:none;
	padding:0px;
	margin:0px;
	}
	.borewell
	{
	margin-left:30px;
	}
	.docs-main
	{
	max-width:100%;
		 margin:0px;
	}
	.tablesaw-bar
	{
	height: 30px;
    display: block;
    padding-bottom: 11px;
    margin-bottom: 10px;
	}
	.communityinpu tr td input 
	{
	width:100%;
	 font-size:12px;

	}
	.tablesaw-bar
	{
	height:30px;
	}
	.x_panel
	{
	border:0px solid white;
	}
	</style><title>Fire Saftey</title>
@extends('layouts.app')


@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel tile fixed_height_400">
                <div class="x_title">
                   <!--<h3>Metro Water Supply details from  01.12.2017 to 31.12.2017</h3>-->
                </div>
                <div class="x_content">
    
    
	<div class="docs-main">
	    
          <h3>  Fire Safety Equipment Status as on 01- 01- 2018</h3>    
   
		<table class="tablesaw tablesaw-swipe" data-tablesaw-mode="swipe" data-tablesaw-minimap width="100%" border="1" cellspacing="1">
         <!-- <tr>
            <th colspan="10">Daily Security Data </th>
          </tr>-->
			<thead class="tablcomu">
            
            
				<tr>
                
					<th class="title" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist" rowspan="2">S.No</th>
				    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" rowspan="2">Description</th>
					<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" colspan="2">Sarovar</th>
					<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1" rowspan="2">Fire pumps Status<br>A/M/O  </th>
                    
  				</tr>
             
                <tr>
                   <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">Total</th>
                   <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">Not Working</th>
                 </tr>
                 
                
			</thead>
			<tbody class="communityinpu">
            
 				       <tr>
                         <td>1</td>
                        <td>Jockey Pump</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                             </tr>
                          
                           <tr>
                         <td>2</td>
                        <td>Main Pump</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                             </tr>
                          
                          
                             <tr>
                         <td>3</td>
                        <td>DG Pump</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                             </tr>
                          
                              <tr>
                         <td>4</td>
                        <td> Booster Pumps</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                             </tr>
                          
                         
                         <tr>
                         <td>5</td>
                         <td>Dewatering Pumps</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                             </tr>
                          
                           <tr>
                         <td>6</td>
                        <td> Yard Hydrant Points</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                             </tr>
                             
                        <tr>
                         <td>6</td>
                         <td> Yard Hydrant Points</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        </tr>
                        
                        <tr>
                         <td>7</td>
                         <td> Cellar Hydrant Points</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        </tr>
                          
                         <tr>
                         <td>8</td>
                         <td> Sub Cellar Hydrant Points</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        </tr>

                           
                         <tr>
                         <td>9</td>
                         <td> Fire Hose Reel Drums</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        </tr>
                          
                           
                         <tr>
                         <td>10</td>
                         <td>Fire Alarm System</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        </tr>
                          
                            <tr>
                         <td>11</td>
                         <td>Public Addressing System</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        </tr>
                        
                        <tr>
                         <td>12</td>
                         <td>Fire Extinguishers</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        </tr>
                        
                        <tr>
                         <td>13</td>
                         <td>Carbon Emission System</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        </tr>
                        
                        <tr>
                         <td>14</td>
                         <td>Flow Meter Paneles - Fire Sprinkler</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        </tr>
                        
                        <tr>
                         <td>15</td>
                         <td>CP Hoses</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        </tr>
                        
                        <tr>
                         <td>16</td>
                         <td>Repeater Panels</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        </tr>
                        
                        <tr>
                         <td>17</td>
                        <td> Sprinkler Charged (floor wise)</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        </tr>
                        
                        <tr>
                         <td>18</td>
                         <td>Fire Mock Drill & Emergency Evacuation </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        </tr>
                        
                        <tr>
                         <td>19</td>
                         <td>False Fire Alarms</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        </tr>
                        
                        <tr>
                        <td>20</td>
                         <td> Wet Raisers</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        
                        </tr>  
                          
			</tbody>
		</table>

		

	
	</div>
    
                        
                </div>
              </div>
            </div>
			
    <script src="/build/js/custom.min.js"></script>	
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
@stop