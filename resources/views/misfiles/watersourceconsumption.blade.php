
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
    <link href="/build/css/components.css" rel="stylesheet">

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
	width:100%;
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
	.communityinpu tr td
	{
	text-align:center;
	}
	.tablesaw-bar
	{
	height:30px;
	}
	.tablesaw tr th 
	{
	text-align:center;
	}
	.docs-main h2
	{
	text-align: left;
    margin-bottom: 20px;
	}
	.x_panel
	{
	border:0px solid white;
	}
	</style>
@extends('layouts.app')


@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel tile fixed_height_400">
                 <div class="x_content housesco212">
    
	<div class="docs-main">
	
        <h2>Community Wise Water Source & Consumption for April-17</h2> 
		<table class="tablesaw tablesaw-swipe" data-tablesaw-mode="swipe" data-tablesaw-minimap width="100%" border="1" cellspacing="1">
			<thead>
            
            
				<tr>
                
					<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" rowspan="2">S.No</th>
				    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" rowspan="2">Community</th>
					<!--<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" rowspan="3">Total<br> Units</th>-->
					<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1" colspan="3">Occupancy (Avg) </th>
					<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4"   colspan="2">Borewells</th>
  				</tr>
                 
                
                  <tr>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">Old</th>
					<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1" class="waterwi">New</th>
					<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">Finally</th>
					<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">Total</th>
					<th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="3"  >No.of Bores: Not Working</th>
 				</tr>
                
                
			</thead>
			<tbody class="communityinpu">
            
 				 <tr>
                        <th>1</th>
                        <td>Sarovar</td>
                        <td>1120</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td>1000 </td>
                        <td>13 </td>
                        <td><input type="text" name="fname" value=""> </td>
                           </tr>
 				<tr>
                        <th>2</th>
                        <td>Grande</td>
                        <td>720</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td>1000 </td>
                        <td>6</td>
                        <td><input type="text" name="fname" value=""> </td>
<!--                        <td><input type="text" name="fname" value=""> </td>
                        <td>360</td>
                        <td><input type="text" name="fname" value="">  </td>
                        <td><input type="text" name="fname" value="">  </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td>-</td>
                        <td>-</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
-->                          </tr>
                          
                          
                             <tr>
                        <th>3</th>
                        <td>CyberZon</td>
                        <td>1529</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td>1000</td>
                        <td>13 </td>
                        <td><input type="text" name="fname" value=""> </td>
<!--                        <td><input type="text" name="fname" value=""> </td>
                        <td>765</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td>-</td>
                        <td>-</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
-->                          </tr>
                          
                          
                          
                             <tr>
                        <th>4</th>
                        <td>Aura</td>
                        <td>135</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td>1000 </td>
                        <td>3</td>
                        <td><input type="text" name="fname" value=""> </td>
<!--                        <td><input type="text" name="fname" value=""> </td>
                        <td>67</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td>-</td>
                        <td>-</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
-->                          </tr>
                          
                          
                         
                             <tr>
                        <th>5</th>
                        <td>Boulevard</td>
                        <td>95</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td>1000 </td>
                        <td>5 </td>
                        <td><input type="text" name="fname" value="">  </td>
<!--                        <td><input type="text" name="fname" value=""> </td>
                        <td>50</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td>-</td>
                        <td>-</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
-->                          </tr>
                          
                           <tr>  
                        <th>6</th>
                        <td>Avenues</td>
                        <td>707</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td>1000 </td>
                        <td>6 </td>
                        <td><input type="text" name="fname" value="">  </td>
<!--                        <td><input type="text" name="fname" value=""> </td>
                        <td>350</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td>-</td>
                        <td>-</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
-->                          </tr>
                          
                           <tr>
                        <th>7</th>
                        <td>LakeBreeze</td>
                        <td>943</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td>1000 </td>
                        <td>6 </td>
                        <td><input type="text" name="fname" value="">  </td>
<!--                        <td><input type="text" name="fname" value=""> </td>
                        <td>472</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td>0.77</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
-->                          </tr>

                          
                           <tr>
                        <th>8</th>
                        <td>Gardenia</td>
                        <td>116</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td>1000 </td>
                        <td>5 </td>
                        <td><input type="text" name="fname" value=""> </td>
<!--                        <td><input type="text" name="fname" value=""> </td>
                        <td>58</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td>-</td>
                        <td>-</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
-->                          </tr>

                           
                           <tr>
                        <th>9</th>
                        <td>Kanopy Tulip</td>
                        <td>360</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td>1000 </td>
                        <td>4 </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <!--<td><input type="text" name="fname" value=""> </td>
                        <td>189</td>-->
<!--                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td>-</td>
                        <td>-</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
-->                          </tr>
                          
                           
                           <tr>
                        <th>10</th>
                        <td>Kanopy <br>Lotus</td>
                        <td>30</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td>1000 </td>
                        <td>3 </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <!--<td><input type="text" name="fname" value=""> </td>
                        <td>44</td>-->
<!--                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td>-</td>
                        <td>-</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
-->                          </tr>
                          
                           <tr>
                        <th>11</th>
                        <td>Oosman's <br>Everest</td>
                        <td>59</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td>1000 </td>
                        <td>2 </td>
                        <td><input type="text" name="fname" value=""> </td>
<!--                        <td><input type="text" name="fname" value=""> </td>
                        <td>-</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td>-</td>
                        <td>-</td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
-->                          </tr>
			</tbody>
		</table>

		

	
	</div>
    
                        
                </div>
              </div>
            </div>
			
    <script src="/build/js/custom.min.js"></script>	
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
@stop