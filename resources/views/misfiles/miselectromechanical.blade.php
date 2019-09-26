
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
	.rotate
	{
	transform: rotate(270deg) ;
-webkit-transform: rotate(270deg) ;
-moz-transform: rotate(270deg) ;
-o-transform: rotate(270deg) ;
-ms-transform: rotate(270deg) ;
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
	</style>
@extends('layouts.app')


@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel tile fixed_height_400">
                <div class="x_title">
                   <!--<h3>Metro Water Supply details from  01.12.2017 to 31.12.2017</h3>-->
                </div>
                <div class="x_content">
    
		<div class="docs-main">
	    
          <h3> Equipment Status as on 01-05-2017</h3>    
   
		<table class="tablesaw tablesaw-swipe" data-tablesaw-mode="swipe" data-tablesaw-minimap width="100%" border="1" cellspacing="1">
         <!-- <tr>
            <th colspan="10">Daily Security Data </th>
          </tr>-->
			<thead class="tablcomu">
            
            
				<tr>
                
					<th class="title" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist" rowspan="2">Category</th>
				    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" rowspan="2">S.No</th>
					<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" rowspan="2">Description</th>
					
                    
  				</tr>
             
                <tr>
                   <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">Total</th>
                   <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">Not Working</th>
				    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">Total downtime (Hrs.) of Equipment</th>
				   
				   
                 
                </tr>
                 
                
			</thead>
			<tbody class="communityinpu">
            
 				
                         <tr>
                         <th rowspan="3">Electrical Distribution System (HT)</th>
                        <td>1</td>
                        <td><span>3 Panel</span> </td>
                        <td><span>1</span> </td>
                        <td><input type="text" name="fname" value=""> </td>
                       
                             </tr>
                          
                           <tr>
                        <td>2</td>
                        <td><span>CTPT</span> </td>
                        <td><span>1</span> </td>
                        <td><input type="text" name="fname" value=""> </td>
                             </tr>
                            <tr>
                        <td>3</td>
                        <td><span>5 Panel</span> </td>
                        <td><span>1</span> </td>
                        <td><input type="text" name="fname" value=""> </td>
                             </tr>
                          
                             <tr>
                             <th rowspan="12">Electrical Distribution System(LT)</th>
                           <td>4</td>
                        <td><span>Transformers</span> </td>
                        <td><span>4</span> </td>
                        <td><input type="text" name="fname" value=""> </td>
                          </tr>
                          
                              <tr>
                              <td>5</td>
                        <td>Main Pcc Panel</td>
                        <td><span>8</span> </td>
                        <td><input type="text" name="fname" value=""> </td>
                          </tr>
                          
                          
                         
                             <tr>
                             <td>6</td>
                         <td>APFCR</td>
                        
                        <td><span>4</span> </td>
                        <td><input type="text" name="fname" value=""> </td>
                          </tr>
                          
                           <tr>
                         <td>7</td>
                        <td>Common Supply Panel</td>
                        <td><span>7</span> </td>
                        <td><input type="text" name="fname" value=""> </td>
                          </tr>
                          
                           <tr>
                         <td>8</td>
                        <td>Bus Duct</td>
                        <td><span>28</span> </td>
                        <td><input type="text" name="fname" value=""> </td>
                          </tr>
                          
                           <tr>
                         <td>9</td>
                        <td>Distrbution Board</td>
                        <td><span>25</span> </td>
                        <td><input type="text" name="fname" value=""> </td>
                          </tr>

                           
                           <tr>
                         <td>10</td>
                        <td>VCB</td>
                        <td><span>13</span> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        
                          </tr>
                          
                           
                           <tr>
                         <td>11</td>
                        <td>ACB</td>
                        <td><span>4</span> </td>
                        <td><input type="text" name="fname" value=""> </td>
                       
                          </tr>
                          
                           <tr>
                         <td>12</td>
                        <td>Landscape Lighting Panel</td>
                        <td><span>7</span> </td>
                        <td><span>-</span> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                          </tr>
                           <tr>
                         <td>13</td>
                        <td>Club House Panel</td>
                        <td><span>2</span> </td>
                        <td><span>-</span> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                          </tr>
                           <tr>
                         <td>14</td>
                        <td>Lighting Arrestor</td>
                        <td><span>7</span> </td>
                        <td><span>-</span> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                          </tr>
                           <tr>
                         <td>15</td>
                        <td>Total No. Of Lights</td>
                        <td><span>3350</span> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                          </tr>
                          <tr>
                          <th rowspan="4">Elevators & Backup Power</th>
                         <td>16</td>
                        <td>Lifts</td>
                        <td><span>43</span> </td>
                        <td><span>-</span> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                          </tr>
                          <tr>
                          <td>17</td>
                        <td>DG Sets</td>
                        <td><span>16</span> </td>
                        <td><span>-</span> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                          </tr>
                          <tr>
                          <td>18</td>
                        <td>Full Backup</td>
                        <td><span>100%</span> </td>
                        <td><span>-</span> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                          </tr>
                          <tr>
                          <td>19/td>
                        <td>Partial Backup</td>
                        <td><span>-</span> </td>
                        <td><span>-</span> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                      </tr>
                          <tr>
                          <th>Ground Water Source</th>
                          <td>20</td>
                        <td>Ground Water Source</td>
                        <td><span>9</span> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                          </tr>
                           <tr>
                          <th>Metro Water Supply</th>
                          <td>21</td>
                        <td>HMWS&SB Meter</td>
                        <td><span>1</span> </td>
                        <td><span>-</span> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                          </tr>
                          <tr>
                          <th rowspan="4">Water Distribution System</th>
                          <td>22</td>
                        <td>Water Distribution System</td>
                        <td><span>YES</span> </td>
                        <td><span>-</span> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                          </tr>
                          <tr>
                          <td>23</td>
                        <td>FWS</td>
                        <td><span>YES</span> </td>
                        <td><span>-</span> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                          </tr>
                           <tr>
                          <td>24</td>
                        <td>PRV's</td>
                        <td><span>784</span> </td>
                        <td><span>-</span> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                          </tr>
                           <tr>
                          <td>25</td>
                        <td>Sewerage System</td>
                        <td><span>YES</span> </td>
                        <td><span>-</span> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                          </tr>
                           <tr>
                           <th rowspan="3">Landscape Water Distribution</th>
                          <td>26</td>
                        <td>Irrigation Pumps</td>
                        <td><span>14</span> </td>
                        <td><span>-</span> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                          </tr>
                          <tr>
                          <td>27</td>
                        <td>Irrigation Pump Panels</td>
                        <td><span>8</span> </td>
                        <td><span>-</span> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                          </tr>
                          <tr>
                          <td>28</td>
                        <td>Irrigation Sprinkler Automation System</td>
                        <td><span>Auto</span> </td>
                        <td><span>-</span> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                          </tr>
                          <tr>
                          <th rowspan="2">Water Features </th>
                          <td>29</td>
                        <td>Water Body Pumps</td>
                        <td><span>5</span> </td>
                        <td><span>-</span> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                          </tr>
                           <tr>
                          <td>30</td>
                        <td>Mist Fountain</td>
                        <td><span>1</span> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                          </tr>
                           <tr>
                           <th rowspan="2">De-watering System</th>
                          <td>31</td>
                        <td>Storm Water Pump</td>
                        <td><span>12</span> </td>
                        <td><span>-</span> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                          </tr>
                          <tr>
                          <td>32</td>
                        <td>Oozing Pumps</td>
                        <td><span>-</span> </td>
                        <td><span>-</span> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                          </tr>
                          <tr>
                          <th rowspan="2">Rain Water System</th>
                          <td>33</td>
                        <td>Rain Water System</td>
                        <td><span>1</span> </td>
                        <td><span>-</span> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                          </tr>
                           <tr>
                          <td>34</td>
                        <td>Rain Water System</td>
                        <td><span>18</span> </td>
                        <td><span>-</span> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                          </tr>
                          <tr>
                          <th rowspan="3">Swimming Pool</th>
                          <td>35</td>
                        <td>Indoor Pool</td>
                        <td><span>YES</span> </td>
                        <td><span>-</span> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                          </tr>
                          <tr>
                          <td>36</td>
                        <td>Outdoor Pool</td>
                        <td><span>YES</span> </td>
                        <td><span>-</span> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                          </tr>
                          <tr>
                          <td>37</td>
                        <td>Baby Pool</td>
                        <td><span>YES</span> </td>
                        <td><span>-</span> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                          </tr>
                           <tr>
                           <th rowspan="3">Security</th>
                          <td>38</td>
                        <td>Baby Pool</td>
                        <td><span>6</span> </td>
                        <td><span>-</span> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                          </tr>
                           <tr>
                          <td>39</td>
                        <td>Solar Fencing</td>
                        <td><span>4 Zones</span> </td>
                        <td><span>-</span> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                          </tr>
                           <tr>
                          <td>40</td>
                        <td>CCTV</td>
                        <td><span>40</span> </td>
                        <td><span>-</span> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                          </tr>
                           <tr>
                           <th>Reticulated Piped Gas</th>
                          <td>41</td>
                        <td>Gas Bank & Chambers</td>
                        <td><span>7*4=28</span> </td>
                        <td><span>-</span> </td>
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