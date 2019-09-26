
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
	
	.errval
   {
	border-color: red !important;
	border-width: 1.5px !important;
   } 
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
	.docs-main h3
	{
	text-align:left;
	margin-top:10px;
	margin-bottom:25px;
	}
	.tablesaw-bar
	{
	height:30px;
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
                <div class="x_title">
                   <!--<h3>Metro Water Supply details from  01.12.2017 to 31.12.2017</h3>-->
                </div>
                <div class="x_content housesco212">
    
	<div class="docs-main ">
	    
          <h3> Occupancy & Rental Details as on <?php echo $report_on; ?></h3>    
   
		<table class="tablesaw tablesaw-swipe" data-tablesaw-mode="swipe" data-tablesaw-minimap width="100%" border="1" cellspacing="1">
         <!-- <tr>
            <th colspan="10">Daily Security Data </th>
          </tr>-->
			<thead class="tablcomu">
            
            
				<tr>
                
					<th class="title" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist" rowspan="2">Community</th>
				    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" rowspan="2">Total No. of Flats  </th>
					<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" rowspan="2">Total Occupied</th>
					<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1" rowspan="2">Owners</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1" rowspan="2">Tenants</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1" rowspan="2">Vacant</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1" ></th>
                    
                       
 				</tr>
             
               
                 
                
			</thead> 
			<tbody class="communityinpu">
			
		{!! Form::open(['method' => 'POST', 'route' => ['misreports.storeoccupancy'], 'class' => 'for-labelling' ,'onsubmit' =>"return subform()"]) !!}
            {!! Form::hidden('user_id','1', ['class' => 'larev', 'placeholder' => '']) !!}
			{!! Form::hidden('month',$report_month, ['class' => 'larev', 'placeholder' => '']) !!}
			{!! Form::hidden('year',$report_year, ['class' => 'larev', 'placeholder' => '']) !!}
 				      @if (count($sites) > 0)
                        @foreach ($sites as $key => $site)
                              <tr>
                         <td><?php  echo $site;   ?></td>
                        <td> <?php   echo  $flats[$key]; 
						 
						?></td> 
						
						<!--{!! Form::text('ctptmin[]','', ['class' => 'larev', 'placeholder' => 'minimum']) !!}-->
						 {!! Form::hidden('id[]',$existing[$key]['id'], ['class' => 'larev', 'placeholder' => '']) !!}
                        {{ Form::hidden('site[]', $key) }}
						{!! Form::hidden('flats[]',$flats[$key], ['class' => '', 'placeholder' => '', 'id' => 'flats_'.$key]) !!}
						<td>{!! Form::text('occupied[]',$existing[$key]['owners'] + $existing[$key]['tenants'], ['class' => '', 'placeholder' => '', 'id' => 'occupied_'.$key,'onchange' => 'getvalidVal(this.value,'.$key.')','readonly' => 'true']) !!} </td>
						<td>{!! Form::text('owners[]',$existing[$key]['owners'], ['class' => '', 'placeholder' => '', 'id' => 'owners_'.$key,'onchange' => 'getvalidSum(this.value,'.$key.')']) !!} </td>
						<td>{!! Form::text('tenants[]',$existing[$key]['tenants'], ['class' => '', 'placeholder' => '', 'id' => 'tenants_'.$key,'onchange' => 'getvalidSum(this.value,'.$key.')']) !!} </td>
						<td>{!! Form::text('vacant[]',$existing[$key]['vacant'], ['class' => '', 'placeholder' => '', 'id' => 'vacant_'.$key,'onchange' => 'getvalidSum(this.value,'.$key.')']) !!} </td>
                        <!-- {!! Form::text('ctptmax[]', '', ['class' => 'larev2', 'placeholder' => '']) !!}-->
                        </tr>  
							  
							 @endforeach
							   
							 @endif
                          
						  
			</tbody>
		</table>
		
		 <input type="checkbox" value="correct" class="confirmed" name="confirmdata">Confirm The data
		  <input type="checkbox" value="1" class=""  name="report_status">I accept given data period of overall month
		
		   <div class="col-sm-12 col-xs-12 submit-button">

                            	{!! Form::submit('Save', ['class' => 'btn btn-danger']) !!}

								{!! Form::close() !!}

                            </div>
	</div>
    
                        
                </div>
              </div>  
            </div>
			
			<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
			
    <script src="/build/js/custom.min.js"></script>	
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
	

	
<script>	
 $( document ).ready(function() {
  
 function getvalidVal(dis,id)
 {
   
}
 
 
 });
 
 function getvalidSum(dis,id)
 {
 
  
  var resocc = 0;
  var totfl = 0;

  
var   owners = $("#owners_"+id).val();
 var  tenants = $("#tenants_"+id).val();
  var flats = $("#flats_"+id).val();
  var vacant = $("#vacant_"+id).val();
 
  if(parseFloat(flats) > 0)
  {
  if(owners == "") { owners = 0;}
  if(tenants == "") { tenants = 0;}
   if(vacant == "") { vacant = 0;}

  
    if(owners == "" && owners == "") { resocc = 0;}
   
  resocc = parseFloat(owners) + parseFloat(tenants);
  
//  alert(parseFloat(resocc));
  
   $("#occupied_"+id).val(parseFloat(resocc));
   
   totfl = parseFloat(owners) + parseFloat(tenants) + parseFloat(vacant);
   
   if(parseFloat(totfl) !=  parseFloat(flats)){
      $("#owners_"+id).addClass('errval');
	  $("#tenants_"+id).addClass('errval');
	  $("#vacant_"+id).addClass('errval'); 
   }
    else{
	  $("#owners_"+id).removeClass('errval');
	  $("#tenants_"+id).removeClass('errval');
	  $("#vacant_"+id).removeClass('errval'); 
	}
	}
	else{
	
	    $("#owners_"+id).val('0');
	  $("#tenants_"+id).val('0');
	  $("#vacant_"+id).val('0'); 
	}

} 

	
function subform()



 {



	var flag = true;

	$( ".number" ).each(function() {

		if(($( this ).val().length <= 0)){


		}

		else{
		 if(isNaN($( this ).val())){

			     flag = false;


				 $(this).addClass("numerror");

			 }

			 else{

			    $(this).removeClass("numerror"); 
			 }

		}

	});  
	
	if ($('.confirmed:checked').length == 0) {

	

	 alert("Please confirm given data period of overall month")

	 flag = false;

	} 


if(flag == true){

  return true; 

}

else{
return false;    
}

 }


  </script> 	
	

@stop