

<div class="row mmr-index-page">  

     



{!! Form::hidden('year',$year, ['class' => 'larev', 'placeholder' => '','id' => 'year']) !!}



{!! Form::hidden('site',$site, ['class' => 'larev', 'placeholder' => '','id' => 'site']) !!}



{!! Form::hidden('month',$month, ['class' => 'larev', 'placeholder' => '','id' =>'month']) !!}



<div class="col-sm-12 showing-month-details form-group">



	 <h3>{{  $monthname }} - {{ $year }} - {{ $sitename }}

	 

	<?php /*?> <button id="stastistics" class="btn btn-secondary">Statistics</button><?php */?></h3>



</div>



<div class="mmr-indexpage-table">



<table width="100%" border="1">



    <thead>



        <tr>



            <th>Report</th>



            <th>Action</th>



        </tr>



    </thead>



    <tbody>



         <tr>



            <td>Man Power</td>



            <td><button id="manpower" class="btn btn-inverse btn-xs">Edit</button></td>



        </tr>



         <tr>



            <td>Service Level Agreement(SLA) adherence Report</td>



            <td><button id="slaedit" class="btn btn-inverse btn-xs">Edit</button></td>



        </tr>



         <tr>



            <td>Major Incidents summary</td>



            <td><button id="major_incident" class="btn btn-inverse btn-xs">Edit</button></td>



        </tr>



         <tr>



            <td>Planned Preventives Maintenance</td>



            <td><button id="ppm_mmr" class="btn btn-inverse btn-xs">Edit</button></td>



        </tr>



                



      <!--  <tr>



            <td>Power Consumption</td>



            <td><button id="eb_poweredit" class="btn btn-inverse btn-xs">Edit</button></td>



        </tr>



           <tr>



            <td>Water Consumption</td>



            <td><button id="metrowater" class="btn btn-inverse btn-xs">Edit</button></td>



        </tr>-->


        



        <tr>



            <td>Technical Activities</td>



            <td><button id="techActivities" class="btn btn-inverse btn-xs">Edit</button></td>



        </tr>

		

		<tr>



                        <td>Water Test Reports (WSP - Inlet)</td>



                        <td><button id="winlet" class="btn btn-inverse btn-xs">Edit</button></td>



                    </tr>

					

					<tr>



                        <td>Water Test Reports (WSP - Outlet)</td>



                        <td><button id="woutlet" class="btn btn-inverse btn-xs">Edit</button></td>



                    </tr>

					

					<tr>



                        <td>Water Test Reports (STP - Inlet)</td>



                        <td><button id="sinlet" class="btn btn-inverse btn-xs">Edit</button></td>



                    </tr>

					

					<tr>



                        <td>Water Test Reports (STP - Outlet)</td>



                        <td><button id="soutlet" class="btn btn-inverse btn-xs">Edit</button></td>



                    </tr>



         <tr>



            <td>Initiative taken / Proactive </td>



            <td><button id="initiative_take" class="btn btn-inverse btn-xs">Edit</button></td>



        </tr>



        



        



        <tr>



            <td>Housekeeping Activities</td>



            <td><button id="hskp_activity" class="btn btn-inverse btn-xs">Edit</button></td>



        </tr>



        <tr>



            <td>Housekeeping Consumables</td>



            <td> <button id="hskp_consumable" class="btn btn-inverse btn-xs">Edit</button></td>



        </tr>

        

        

        <tr>



            <td>HouseKeeping Critical Machinery</td>



            <td> <button id="hkcm" class="btn btn-inverse btn-xs">Edit</button></td>



        </tr>

		

		 <tr>



            <td>Horticulture Critical Machinery</td>



            <td> <button id="hocm" class="btn btn-inverse btn-xs">Edit</button></td>



        </tr>

        

        

         <tr>



            <td>Pest Control</td>



            <td> <button id="pets_control" class="btn btn-inverse btn-xs">Edit</button></td>



        </tr>





        <tr>



            <td>Horticulture Activities</td>



            <td><button id="horticul_activity" class="btn btn-inverse btn-xs">Edit</button></td>



        </tr>

		

		 <tr>



            <td>Warranty</td>



            <td><button id="waranty" class="btn btn-inverse btn-xs">Edit</button></td>



        </tr>



      <!--  <tr>



            <td>Horticulture Consumables</td>



            <td><button id="horticul_consumable" class="btn btn-inverse btn-xs">Edit</button></td>



        </tr>

-->

       



        



         <tr>



            <td>Violations</td>



            <td><button id="violation" class="btn btn-inverse btn-xs">Edit</button></td>



        </tr>



        



         <tr>



            <td>Value Adds</td>



            <td><button id="valueadds" class="btn btn-inverse btn-xs">Edit</button></td>



        </tr>



        



         <tr>



            <td>Suggestions</td>



            <td><button id="suggestion" class="btn btn-inverse btn-xs">Edit</button></td>



        </tr>



        



         <tr>



            <td>Indents and Requisition</td>



            <td><button id="indesntreq" class="btn btn-inverse btn-xs">Edit</button></td>



        </tr>



        <tr>



            <td>Upload Charts</td>



            <td><button id="uploadcharts" class="btn btn-inverse btn-xs">Edit</button></td>



        </tr>
		
		<tr>



            <td>Events</td>



            <td><button id="events" class="btn btn-inverse btn-xs">Edit</button></td>



        </tr>




		 



    </tbody>



</table>



 </div>



</div> 



<script type="text/javascript">







$( document ).ready(function() {







//STATUS REPORTS







var year = $("#mis_year").val();



var month = $("#mis_month").val();



 $('#reasontext').summernote({







              height:300,







            });







$('#example1').datepicker({ dateFormat: "dd-mm-yy" });







$( "#eb_poweredit" ).click(function() {



		var year = $("#year").val();



		var month = $("#month").val();



		var site = $("#site").val();



		



		if(year == "" || month == "" || site == "") { 



		var href = window.location.href;



		//window.location = href.replace(/getdailyreport\/.*$/, "");



		window.location.href = "/updatemmr?year="+year+"&month="+month+"&site="+site;



		} else {



		window.location.href = "/editmmr/1/"+year+"/"+month+"/"+site; 



		



		}



	});



	



	



	$( "#hskp_activity" ).click(function() {



		var year = $("#year").val();



		var month = $("#month").val();



		var site = $("#site").val();



		



		if(year == "" || month == "" || site == "") { 



		var href = window.location.href;



		//window.location = href.replace(/getdailyreport\/.*$/, "");



		window.location.href = "/updatemmr?year="+year+"&month="+month+"&site="+site;



		} else {



		window.location.href = "/editmmr/2/"+year+"/"+month+"/"+site; 



		}



	});



	



	



	$( "#hskp_consumable" ).click(function() {



		var year = $("#year").val();



		var month = $("#month").val();



		var site = $("#site").val();



		



		if(year == "" || month == "" || site == "") { 



		var href = window.location.href;



		//window.location = href.replace(/getdailyreport\/.*$/, "");



		window.location.href = "/updatemmr?year="+year+"&month="+month+"&site="+site;



		} else {



		window.location.href = "/editmmr/3/"+year+"/"+month+"/"+site; 



		}



	});



	



	$( "#manpower" ).click(function() {



		var year = $("#year").val();



		var month = $("#month").val();



		var site = $("#site").val();



		



		if(year == "" || month == "" || site == "") { 



		var href = window.location.href;



		//window.location = href.replace(/getdailyreport\/.*$/, "");



		window.location.href = "/updatemmr?year="+year+"&month="+month+"&site="+site;



		} else {



		window.location.href = "/editmmr/7/"+year+"/"+month+"/"+site; 



		}



	});



	



	



	



	



	$( "#pets_control" ).click(function() {



		var year = $("#year").val();



		var month = $("#month").val();



		var site = $("#site").val();



		



		if(year == "" || month == "" || site == "") { 



		var href = window.location.href;



		//window.location = href.replace(/getdailyreport\/.*$/, "");



		window.location.href = "/updatemmr?year="+year+"&month="+month+"&site="+site;



		} else {



		window.location.href = "/editmmr/22/"+year+"/"+month+"/"+site; 



		}



	});

	

	

	$( "#hkcm" ).click(function() {



		var year = $("#year").val();



		var month = $("#month").val();



		var site = $("#site").val();



		



		if(year == "" || month == "" || site == "") { 



		var href = window.location.href;



		//window.location = href.replace(/getdailyreport\/.*$/, "");



		window.location.href = "/updatemmr?year="+year+"&month="+month+"&site="+site;



		} else {



		window.location.href = "/editmmr/21/"+year+"/"+month+"/"+site; 



		}



	});

	

	$( "#hocm" ).click(function() {



		var year = $("#year").val();



		var month = $("#month").val();



		var site = $("#site").val();



		



		if(year == "" || month == "" || site == "") { 



		var href = window.location.href;



		//window.location = href.replace(/getdailyreport\/.*$/, "");



		window.location.href = "/updatemmr?year="+year+"&month="+month+"&site="+site;



		} else {



		window.location.href = "/editmmr/25/"+year+"/"+month+"/"+site; 



		}



	});

	

	

	$( "#uploadcharts" ).click(function() {



		var year = $("#year").val();



		var month = $("#month").val();



		var site = $("#site").val();



		



		if(year == "" || month == "" || site == "") { 



		var href = window.location.href;



		//window.location = href.replace(/getdailyreport\/.*$/, "");



		window.location.href = "/updatemmr?year="+year+"&month="+month+"&site="+site;



		} else {



		window.location.href = "/editmmr/23/"+year+"/"+month+"/"+site; 



		}



	});


	$( "#events" ).click(function() {



		var year = $("#year").val();



		var month = $("#month").val();



		var site = $("#site").val();



		



		if(year == "" || month == "" || site == "") { 



		var href = window.location.href;



		//window.location = href.replace(/getdailyreport\/.*$/, "");



		window.location.href = "/updatemmr?year="+year+"&month="+month+"&site="+site;



		} else {



		window.location.href = "/editmmr/26/"+year+"/"+month+"/"+site; 



		}



	});




	$( "#techActivities" ).click(function() {



		var year = $("#year").val();



		var month = $("#month").val();



		var site = $("#site").val();



		



		if(year == "" || month == "" || site == "") { 



		var href = window.location.href;



		//window.location = href.replace(/getdailyreport\/.*$/, "");



		window.location.href = "/updatemmr?year="+year+"&month="+month+"&site="+site;



		} else {



		window.location.href = "/editmmr/27/"+year+"/"+month+"/"+site; 



		}



	});
	

	

	$( "#horticul_activity" ).click(function() {



		var year = $("#year").val();



		var month = $("#month").val();



		var site = $("#site").val();



		



		if(year == "" || month == "" || site == "") { 



		var href = window.location.href;



		//window.location = href.replace(/getdailyreport\/.*$/, "");



		window.location.href = "/updatemmr?year="+year+"&month="+month+"&site="+site;



		} else {



		window.location.href = "/editmmr/4/"+year+"/"+month+"/"+site; 



		}



	});

	

	$( "#waranty" ).click(function() {



		var year = $("#year").val();



		var month = $("#month").val();



		var site = $("#site").val();



		



		if(year == "" || month == "" || site == "") { 



		var href = window.location.href;



		//window.location = href.replace(/getdailyreport\/.*$/, "");



		window.location.href = "/updatemmr?year="+year+"&month="+month+"&site="+site;



		} else {



		window.location.href = "/editmmr/24/"+year+"/"+month+"/"+site; 



		}



	});



	



	$( "#horticul_consumable" ).click(function() {



		var year = $("#year").val();



		var month = $("#month").val();



		var site = $("#site").val();



		



		if(year == "" || month == "" || site == "") { 



		var href = window.location.href;



		//window.location = href.replace(/getdailyreport\/.*$/, "");



		window.location.href = "/updatemmr?year="+year+"&month="+month+"&site="+site;



		} else {



		window.location.href = "/editmmr/5/"+year+"/"+month+"/"+site; 



		}



	});



	



	$( "#initiative_take" ).click(function() {



		var year = $("#year").val();



		var month = $("#month").val();



		var site = $("#site").val();



		



		if(year == "" || month == "" || site == "") { 



		var href = window.location.href;



		//window.location = href.replace(/getdailyreport\/.*$/, "");



		window.location.href = "/updatemmr?year="+year+"&month="+month+"&site="+site;



		} else {



		window.location.href = "/editmmr/6/"+year+"/"+month+"/"+site; 



		}



	});



	



	



	$( "#major_incident" ).click(function() {



		var year = $("#year").val();



		var month = $("#month").val();



		var site = $("#site").val();



		



		if(year == "" || month == "" || site == "") { 



		var href = window.location.href;



		//window.location = href.replace(/getdailyreport\/.*$/, "");



		window.location.href = "/updatemmr?year="+year+"&month="+month+"&site="+site;



		} else {



		window.location.href = "/editmmr/8/"+year+"/"+month+"/"+site; 



		}



	});



	



	$( "#ppm_mmr" ).click(function() {



		var year = $("#year").val();



		var month = $("#month").val();



		var site = $("#site").val();



		



		if(year == "" || month == "" || site == "") { 



		var href = window.location.href;



		//window.location = href.replace(/getdailyreport\/.*$/, "");



		window.location.href = "/updatemmr?year="+year+"&month="+month+"&site="+site;



		} else {



		window.location.href = "/editmmr/9/"+year+"/"+month+"/"+site; 



		}



	});

	

	

	

	



	



	$( "#violation" ).click(function() {



		var year = $("#year").val();



		var month = $("#month").val();



		var site = $("#site").val();



		



		if(year == "" || month == "" || site == "") { 



		var href = window.location.href;



		//window.location = href.replace(/getdailyreport\/.*$/, "");



		window.location.href = "/updatemmr?year="+year+"&month="+month+"&site="+site;



		} else {



		window.location.href = "/editmmr/10/"+year+"/"+month+"/"+site; 



		}



	});



	



	$( "#valueadds" ).click(function() {



		var year = $("#year").val();



		var month = $("#month").val();



		var site = $("#site").val();



		



		if(year == "" || month == "" || site == "") { 



		var href = window.location.href;



		//window.location = href.replace(/getdailyreport\/.*$/, "");



		window.location.href = "/updatemmr?year="+year+"&month="+month+"&site="+site;



		} else {



		window.location.href = "/editmmr/11/"+year+"/"+month+"/"+site; 



		}



	});



	



	$( "#suggestion" ).click(function() {



		var year = $("#year").val();



		var month = $("#month").val();



		var site = $("#site").val();



		



		if(year == "" || month == "" || site == "") { 



		var href = window.location.href;



		//window.location = href.replace(/getdailyreport\/.*$/, "");



		window.location.href = "/updatemmr?year="+year+"&month="+month+"&site="+site;



		} else {



		window.location.href = "/editmmr/12/"+year+"/"+month+"/"+site; 



		}



	});



	



	$( "#indesntreq" ).click(function() {



		var year = $("#year").val();



		var month = $("#month").val();



		var site = $("#site").val();



		



		if(year == "" || month == "" || site == "") { 



		var href = window.location.href;



		//window.location = href.replace(/getdailyreport\/.*$/, "");



		window.location.href = "/updatemmr?year="+year+"&month="+month+"&site="+site;



		} else {



		window.location.href = "/editmmr/13/"+year+"/"+month+"/"+site; 



		}



	});



	



		



	$( "#metrowater" ).click(function() {



		var year = $("#year").val();



		var month = $("#month").val();



		var site = $("#site").val();



		



		if(year == "" || month == "" || site == "") { 



		var href = window.location.href;



		//window.location = href.replace(/getdailyreport\/.*$/, "");



		window.location.href = "/updatemmr?year="+year+"&month="+month+"&site="+site;



		} else {



		window.location.href = "/editmmr/14/"+year+"/"+month+"/"+site; 



		}



	});

	

	

	

	$( "#winlet" ).click(function() {



		var year = $("#year").val();



		var month = $("#month").val();



		var site = $("#site").val();



		



		if(year == "" || month == "" || site == "") { 



		var href = window.location.href;



		//window.location = href.replace(/getdailyreport\/.*$/, "");



		window.location.href = "/updatemmr?year="+year+"&month="+month+"&site="+site;



		} else {



		window.location.href = "/editmmr/16/"+year+"/"+month+"/"+site; 



		}



	});

	

	

	$( "#woutlet" ).click(function() {



		var year = $("#year").val();



		var month = $("#month").val();



		var site = $("#site").val();



		



		if(year == "" || month == "" || site == "") { 



		var href = window.location.href;



		//window.location = href.replace(/getdailyreport\/.*$/, "");



		window.location.href = "/updatemmr?year="+year+"&month="+month+"&site="+site;



		} else {



		window.location.href = "/editmmr/17/"+year+"/"+month+"/"+site; 



		}



	});

	

	

	$( "#sinlet" ).click(function() {



		var year = $("#year").val();



		var month = $("#month").val();



		var site = $("#site").val();



		



		if(year == "" || month == "" || site == "") { 



		var href = window.location.href;



		//window.location = href.replace(/getdailyreport\/.*$/, "");



		window.location.href = "/updatemmr?year="+year+"&month="+month+"&site="+site;



		} else {



		window.location.href = "/editmmr/18/"+year+"/"+month+"/"+site; 



		}



	});

	

	

	$( "#soutlet" ).click(function() {



		var year = $("#year").val();



		var month = $("#month").val();



		var site = $("#site").val();



		



		if(year == "" || month == "" || site == "") { 



		var href = window.location.href;



		//window.location = href.replace(/getdailyreport\/.*$/, "");



		window.location.href = "/updatemmr?year="+year+"&month="+month+"&site="+site;



		} else {



		window.location.href = "/editmmr/19/"+year+"/"+month+"/"+site; 



		}



	});



	



		$( "#slaedit" ).click(function() {



		var year = $("#year").val();



		var month = $("#month").val();



		var site = $("#site").val();



		



		if(year == "" || month == "" || site == "") { 



		var href = window.location.href;



		//window.location = href.replace(/getdailyreport\/.*$/, "");



		window.location.href = "/updatemmr?year="+year+"&month="+month+"&site="+site;



		} else {



		window.location.href = "/editmmr/15/"+year+"/"+month+"/"+site; 



		}



	}); 



	



	$( "#stastistics" ).click(function() {



		var year = $("#year").val();



		var month = $("#month").val();



		var site = $("#site").val();



		



		if(year == "" || month == "" || site == "") { 



		var href = window.location.href;



		//window.location = href.replace(/getdailyreport\/.*$/, "");



		window.location.href = "/updatemmr?year="+year+"&month="+month+"&site="+site;



		} else {



			window.location.href = "/editmmr/20/"+year+"/"+month+"/"+site; 



		}



	}); 



		



	$( "#download_mis" ).click(function() {



		var year = $("#mis_year").val();



		var month = $("#mis_month").val();



		var site = $("#site").val();



		



		if(year == "" || month == "" || site == "") { 



		var href = window.location.href;



		//window.location = href.replace(/getdailyreport\/.*$/, "");



		window.location.href = "/mmr/main";  



		} else {



		window.location.href = "/downloadoverallmmr/"+year+"/"+month+"/"+site; 



		}



	});







	



	



	



	$( "#get_editview" ).click(function() {



	    var year = $("#mis_year").val();



		var month = $("#mis_month").val();



		var site = $("#site").val();



		



		if(year == "" || month == "" || site == "") { 



		var href = window.location.href;



		//window.location = href.replace(/getdailyreport\/.*$/, "");



		window.location.href = "/mmr/main";  



		} else {



		window.location.href = "/updatemmr/"+year+"/"+month+"/"+site; 



		}



		



	});



 



});











function getmmreditform(val){







var year = $("#year").val();



var month = $("#month").val();



var site = $("#site").val();



var mmr_type = $("#mmr_type").val();







if(val == ""){} else { 



      $.ajax({



				type: "get",



				cache:false,



				url: '{{ route('mmr.mmreditform') }}',



				data: { year: year, month: month, site: site, mmr_type: mmr_type},



				success: function( response ) {



				 //var obj = jQuery.parseJSON( response);



                   //alert(obj.status);



			 //  alert(response[0]);



			     $("#validresponse").html(response);



				  $('#reasontext').summernote({







              height:300,







            });



				 



				}  



        });



   



}



}



</script>

