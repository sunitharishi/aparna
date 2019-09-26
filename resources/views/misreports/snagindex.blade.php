@extends('layouts.app')











@section('content')







<style type="text/css">



  .empids .commoncom{clear: both;padding: 4px;margin: 4px;}



    .empids .empbox{float: left;padding: 4px;border: 1px solid #cccccc;margin: 4px;}



    .empids .empbox i{color:red; font-size:20px;}



    

	.table.table-bordered thead > tr > th {
		border-bottom: 0;
		vertical-align: top !important;
		font-size: 13px !important;
		text-align:center !Important;
	}
	table.dataTable tbody th
	{
		font-size: 13px !important;
		text-align:center !Important;
	}
	table.dataTable tbody td
	{
		vertical-align:middle !Important;
		text-align:left !Important;
		font-size: 13px !important;
	}
	
	table.dataTable thead .sorting {
		background-position: right 9px !Important;
	}
    


	.btn
	{
		padding:7px 9px;
	}
    



</style>







 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>







   <!-- <h3 class="page-title">Tasks</h3>-->



   







    <div class="panel panel-default panelmar tsas-crseations ssnag-reportss">



        <div class="panel-heading">



         <div style="float:left;">Snag Reports</div>
		 <div style="float:right;">
             <a  href="/snagcategories" class="btn btn-primary">Categories</a>
             <a  href="/getsnagreportcreate" class="btn btn-primary">Add Snag Report</a>
        </div>

		</div>

         <div class="panel-body snag-body-section">



             <div class="pms-areport">



             



              <div class="selection-pmsreport">

                  <div class="individual-reportsites">



            <label class="label-individual-site">Sites<span>:</span></label>



               {!! Form::select('sites', $sitenames, old('category'), ['class' => 'form-control pms-auditreport', 'onchange' => 'selectSites()', 'id' => 'site']) !!}  

				
			 <input type="hidden" name="status" value="1" id="status" />

             <?php  $year = date("Y");



              $month = date("m");



            ?>



             </div>

               <div class="individual-reportsites">



            <label class="label-individual-site">Categories<span>:</span></label>



              <?php //echo "<pre>"; print_r($categories); echo "</pre>"; ?>



               {!! Form::select('categories', $categories, old('category'), ['multiple'=>'multiple', 'size'=>4, 'class' => 'form-control pms-auditreport', 'id' => 'category']) !!} 



             </div>











          



             
			 

			<div class="individual-reportto" style="margin-right:10px;">
				  <button onclick="statusChange()" class="btn btn-primary" id="changeText">Closed Status</button>
			</div>


              <div class="individual-reportfrom">



                <label class="label-individual-from">From<span>:</span></label>



               <input type="text" name="fromdate" id="fromdate" value="<?php echo date("d-m-Y") ?>" class="hasDatePicker form-control index-date1">



            </div>



            



             <div class="individual-reportto">



               <label class="label-individual-to">To<span>:</span></label>



               <input type="text" name="todate" id="todate"  value="<?php echo date("d-m-Y") ?>" class="hasDatePicker form-control index-date1">



            </div>


            <div class="individual-buttons">



                <button onclick="getsnagreports()" class="btn btn-primary">Go..</button>

                <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Download</button>
				
				<button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#myImport">Import</button>
				
				<button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#summary">Summary</button>



             </div>

			
			
			

                    </div> 



                      <div id="validresponse">


              <div class="table-responsive">
                 <table id="dTableColSearch" class="table datatable table-bordered table-striped emploiyee-table {{ count($auditresult) > 0 ? 'dTableColSearch' : '' }} dt-select">  



                    <thead class="head-color">



                       <tr>



                          <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>

						  <th>S.NO</th>

                          <th>Site</th>



                          <th>Category</th>



                          <th>Observation</th>



                          <th>Location</th>



                          <th>Picture</th>



                          <th>Recommendations</th>
						  
						  
						   <th>Snag Report Date</th>



                          <th>Timeline given by Projects team</th>



                          <th>Status</th>



                          <th style="text-align:center; width:130px;">Action</th>
						


                          



                       </tr>



                    </thead>
					
					 <thead>   
							<tr class="plachelolder">
								<td style="border-bottom:0px;"></td>
								 <td style="border-bottom:0px;">&nbsp;</td>
								<td class="wkkdd"><input type="text" placeholder="Search" data-index="2" class="reposnsciefe1" /></td>
								<td class="wkkdd"><input type="text" placeholder="Search" data-index="3" class="reposnsciefe1" /></td>
								<td class="wkkdd"><input type="text" placeholder="Search" data-index="4" class="reposnsciefe1" /></td>
								<td class="wkkdd"><input type="text" placeholder="Search" data-index="5" class="reposnsciefe1" /></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr> 
						</thead>



                       <tbody>



                         <?php  $i = 1; ?>



                         @if (count($auditresult) > 0)



                        @foreach ($auditresult as $kk => $client)



                          @if (count($client) > 0)



                           @foreach ($client as $tt)



                           <?php $site_id = $tt->sid; //echo "asda";
						   //echo "<pre>"; print_r($tt); echo "</pre>"; exit; ?>



                      <tr data-entry-id="{{ $tt->id }}" id="record_{{ $tt->id }}">



                        <td></td>
						
						<td><?php echo $i; ?></td>



                        <td><?php echo $sites[$tt->sid]; ?></td>



                        <td class="category_col{{ $tt->id }}">{{ $categories[$tt->cid] }}</td>



                        <td class="observation_col{{ $tt->id }}"><?php echo $tt->observation; ?></td>



                        <td class="location_col{{ $tt->id }}"><?php echo $tt->location; ?></td>



                        <td  class="snagimage_col{{ $tt->id }}">



                            <?php if($tt->imagepath!="") { ?>



                         



                                
								<div   id="image_pic">
                                <a href="/uploads/snag/<?php echo $tt->imagepath; ?>" style="width:500px;" class="open-lightbox"><img src="/uploads/snag/thumb/<?php echo $tt->imagepath; ?>" class="img-responsive" style="max-width:150px; width:150px; height:150px;"></a>



                             <div style="position: absolute;margin-left: 127px;margin-top: -150px;">
							 	 <a href="javascript:void(0)" onclick="imgDelete(<?php echo $tt->id; ?>);" style="color: #FF0000;font-size: 22px;font-weight: bold;">X</a>
							 </div>
							 </div>



                          <?php } ?>



                        </td>



                        <td class="recommendation_col{{ $tt->id }}">
							<?php 
							//echo $tt->recommendation;
							if($tt->rectype=='image') 
							{
								if($tt->recimagepath!="") { ?>
                                
								<div id="rimage_pic">
                                <a href="/uploads/snag/rec/<?php echo $tt->recimagepath; ?>" style="width:500px;" class="open-lightbox"><img src="/uploads/snag/rec/<?php echo $tt->recimagepath; ?>" class="img-responsive" style="max-width:150px; width:150px; height:150px;"></a>
                             <div style="position: absolute;margin-left: 127px;margin-top: -150px;">
							 	 <a href="javascript:void(0)" onclick="recimgDelete(<?php echo $tt->id; ?>);" style="color: #FF0000;font-size: 22px;font-weight: bold;">X</a>
							 </div>
							 </div>
                          <?php } 
							} else if($tt->rectype=='text') {  
								if($tt->recommendation!="") 
								echo $tt->recommendation; 
							}  
						  ?>
						</td>



                        <td class="reporton_col{{ $tt->id }}" width="82px" style="text-align:center !important;"><?php echo date("d-m-Y",strtotime($tt->reporton)); ?></td>
						
						

						<td class="timeline_col{{ $tt->id }}" width="82px" style="text-align:center !important;">
                        	<?php
								$year = date('Y',strtotime($tt->timeline));
								if($year!='1970' || $year!='0000' || $year!='0001' || $year!='-0001') $timeline = date("d-m-Y",strtotime($tt->timeline));
				 				else  $timeline = ""; 
							?>
                        </td>



                        <td class="status_col{{ $tt->id }}"><?php if($tt->status==1) echo "Open"; else echo "Closed"; ?></td>



                        <td style="text-align:center; width:130px;">
                            <?php /*?><a target="_blank" href="/getsnagreportedit?sid=<?php echo $tt->id; ?>" class="btn btn-xs btn-inverse">Edit</a><?php */?>
							<a href="javascript:void(0);" onclick="snagEdit(<?php echo $tt->id; ?>);" class="btn btn-xs btn-inverse">Edit</a> 
                            <a href="#" onclick="deleteSnag(<?php echo $tt->id; ?>)" class="btn btn-xs btn-danger">Delete</a></td>



                      <?php $i = $i + 1; ?>



                       @endforeach



                       @endif



                        @endforeach



                          



                    @else 



                        <tr>



                            <td colspan="11">No entries in table</td>



                        </tr>



                    @endif



                    </tbody>



                </table>

                </div>

                   </div>



                 </div>



            </div>



        </div>



   



   



   



 @include('partials.footer')



 



  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>



<script type="text/javascript"> 



function deleteSnag(sid)
{
	var r = confirm("Are you sure you want to delete this report?");	
	if (r == true) {
		$.ajax({
        type: "get",
        cache:false,
        url: '{{ route('auditreport.deletesnagreport') }}',
        data: { sid: sid},
        success: function( response ) {
			$("#record_"+sid).remove();
        }  
	 });
	 
	} else {
	  return false;
	}
}

function imgDelete(dis)
	{
	  var answer  = confirm("Are you sure you want to delete this Image");
	  if(answer)
	  {
		$.ajax({
		type: "get",
		cache:false,
		url: '{{ route('auditreport.snagpicdelete') }}',
		data: { imageId: dis},
		success: function( response ) 
		{
			$("#image_pic").remove();            
		}  
	   });  
	  }
	  else
	  {
		
	  }
	}
	
function recimgDelete(dis)
	{
	  var answer  = confirm("Are you sure you want to delete this Image");
	  if(answer)
	  {
		$.ajax({
		type: "get",
		cache:false,
		url: '{{ route('auditreport.snagpicrdelete') }}',
		data: { imageId: dis},
		success: function( response ) 
		{
			$("#rimage_pic").remove();            
		}  
	   });  
	  }
	  else
	  {
		
	  }
	}

$( document ).ready(function() {





$("#checkedAll").change(function(){

    if(this.checked){

      $(".checkSingle").each(function(){

        this.checked=true;

      })              

    }else{

      $(".checkSingle").each(function(){

        this.checked=false;

      })              

    }

  });



  $(".checkSingle").click(function () {

    if ($(this).is(":checked")){

      var isAllChecked = 0;

      $(".checkSingle").each(function(){

        if(!this.checked)

           isAllChecked = 1;

      })              

      if(isAllChecked == 0){ $("#checkedAll").prop("checked", true); }     

    }else {

      $("#checkedAll").prop("checked", false);

    }

  });

//STATUS REPORTS







$('#fromdate').datepicker({ dateFormat: "dd-mm-yy" });



$('#todate').datepicker({ dateFormat: "dd-mm-yy" });



$('#sfromdate').datepicker({ dateFormat: "dd-mm-yy" });


$('#stodate').datepicker({ dateFormat: "dd-mm-yy" });

  });



  
  function statusChange()
  {
  	var status = $("#status").val()
	if(status==1)
	{
		$("#status").val(0);
		$("#changeText").html("Open Status");
	}
	else
	{
		$("#status").val(1);
		$("#changeText").html("Closed Status");
	}
	
	var fromdate = $("#fromdate").val();



   var todate = $("#todate").val();



   var site = $("#site").val();



   var category = $("#category").val();



   var status = $("#status").val();







      $.ajax({



        type: "get",



        cache:false,



        url: '{{ route('auditreport.getsnagreports') }}',

        data: { fromdate: fromdate, todate: todate, site: site, category: category, status: status},
		
        success: function( response ) {		  

        $("#validresponse").html(response);
		$("#dTableColSearch").DataTable(); 
        } 
	});
	
  }


  function getsnagreports(){



   var fromdate = $("#fromdate").val();



   var todate = $("#todate").val();



   var site = $("#site").val();



   var category = $("#category").val();


   var status = $("#status").val();








      $.ajax({



        type: "get",



        cache:false,



        url: '{{ route('auditreport.getsnagreports') }}',



        data: { fromdate: fromdate, todate: todate, site: site, category: category, status: status},



        success: function( response ) {



         //var obj = jQuery.parseJSON( response);



                   //alert(obj.status);



       //  alert(response[0]);

		  

           $("#validresponse").html(response);


			 $("#dTableColSearch").DataTable(); 
      



        }  



        });

        

        

        // Gallery image hover



$( ".img-wrapper1" ).hover(



  function() {



    $(this).find(".img-overlay1").animate({opacity: 1}, 600);



  }, function() {



    $(this).find(".img-overlay1").animate({opacity: 0}, 600);



  }



);







// Lightbox



var $overlay1 = $('<div id="overlay1"></div>');



var $image1 = $("<img style='width:500px;'>");



var $prevButton1 = $('<div id="prevButton1"></div>');



var $nextButton1 = $('<div id="nextButton1"></div>');



var $exitButton1 = $('<div id="exitButton1"><i class="fa fa-times"></i></div>');







// Add overlay



$overlay1.append($image1).prepend($prevButton1).append($nextButton1).append($exitButton1);



$("#gallery1").append($overlay1);







// Hide overlay on default



$overlay1.hide();







// When an image is clicked



$(".img-overlay1").click(function(event) {



  // Prevents default behavior



  event.preventDefault();



  // Adds href attribute to variable



  var imageLocation = $(this).prev().attr("href");



  // Add the image src to $image



  $image1.attr("src", imageLocation);



  // Fade in the overlay



  $overlay1.fadeIn("slow");



});







// When the overlay is clicked



$overlay1.click(function() {



  // Fade out the overlay



  $(this).fadeOut("slow");



});







// When next button is clicked



$nextButton1.click(function(event) {



  // Hide the current image



  $("#overlay1 img").hide();



  // Overlay image location



  var $currentImgSrc = $("#overlay1 img").attr("src");



  // Image with matching location of the overlay image



  var $currentImg = $('#image-gallery1 img[src="' + $currentImgSrc + '"]');



  // Finds the next image



  var $nextImg = $($currentImg.closest(".image1").next().find("img"));



  // All of the images in the gallery



  var $images = $("#image-gallery1 img");



  // If there is a next image



  if ($nextImg.length > 0) { 



    // Fade in the next image



    $("#overlay1 img").attr("src", $nextImg.attr("src")).fadeIn(800);



  } else {



    // Otherwise fade in the first image



    $("#overlay1 img").attr("src", $($images[0]).attr("src")).fadeIn(800);



  }



  // Prevents overlay from being hidden



  event.stopPropagation();



});







// When previous button is clicked



$prevButton1.click(function(event) {



  // Hide the current image



  $("#overlay1 img").hide();



  // Overlay image location



  var $currentImgSrc = $("#overlay1 img").attr("src");



  // Image with matching location of the overlay image



  var $currentImg = $('#image-gallery1 img[src="' + $currentImgSrc + '"]');



  // Finds the next image



  var $nextImg = $($currentImg.closest(".image1").prev().find("img"));



  // Fade in the next image



  $("#overlay1 img").attr("src", $nextImg.attr("src")).fadeIn(800);



  // Prevents overlay from being hidden



  event.stopPropagation();



});







// When the exit button is clicked



$exitButton1.click(function() {



  // Fade out the overlay



  $("#overlay1").fadeOut("slow");



});



  }
  
  
     

     function getpdfreport(dis)

     {

        

           var fromdate = $("#fromdate").val();

    

           var todate = $("#todate").val();

        

           var site = $("#site").val();   

        

           var category = $("#category").val();
		   
		   
		   var status = $("#status").val();

           

           var checkbox_value = "";

            $(":checkbox").each(function () {

                var ischecked = $(this).is(":checked");

                if (ischecked) {

                    checkbox_value += $(this).val() + ",";

                }

            });

            

            window.location.href = "/getsnagreportpdf?fromdate="+fromdate+"&todate="+todate+"&site="+site+"&category="+category+"&status="+status+"&sfileds="+checkbox_value;

         

            return false;

        

        }



	 function getexcelreport(dis)

     {

        

           var fromdate = $("#fromdate").val();

    

           var todate = $("#todate").val();

        

           var site = $("#site").val();   

        

           var category = $("#category").val();
		   
		   
		   var status = $("#status").val();

           

           var checkbox_value = "";

            $(":checkbox").each(function () {

                var ischecked = $(this).is(":checked");

                if (ischecked) {

                    checkbox_value += $(this).val() + ",";

                }

            });

            

            window.location.href = "/getsnagreportexport?fromdate="+fromdate+"&todate="+todate+"&site="+site+"&category="+category+"&status="+status+"&sfileds="+checkbox_value;

         

            return false;

        

        }
		
		
		function getsummaryreport()

     {

        

           var sfromdate = $("#sfromdate").val();

    

           var stodate = $("#stodate").val();

        

           var ssite = $("#ssite").val();  

            

            window.location.href = "/getsummaryreport?fromdate="+sfromdate+"&todate="+stodate+"&site="+ssite;

         

            return false;

        

        }


  </script>











<script>





(function($) {

  

  // Open Lightbox

  $('.open-lightbox').on('click', function(e) {

    e.preventDefault();

    var image = $(this).attr('href');

    $('html').addClass('no-scroll');

    $('body').append('<div class="lightbox-opened"><img src="' + image + '" style="width:500px;" ></div>');

  });

  

  // Close Lightbox

    $('body').on('click', '.lightbox-opened', function() {

    $('html').removeClass('no-scroll');

    $('.lightbox-opened').remove();

  });

  

})(jQuery);



</script>



 <div class="modal fade snag-modal" id="myModal" role="dialog">



    <div class="modal-dialog">



    



      <!-- Modal content-->



      <div class="modal-content">



        <div class="modal-header">

          



          <button type="button" class="close btn-danger" data-dismiss="modal">&times;</button>



          <h4 class="modal-title"><i class="fa fa-print" aria-hidden="true"></i>  Options for printing</h4>



        </div>

       



        <div class="modal-body" style="text-align: center;">

            <div class="modallisting">

           

            <ul>

                <li>

                    <input type="checkbox" value="all" name="options[]" id="checkedAll" checked="checked" /> <span>All Fileds</span>

                </li>

                <li>

                    <input type="checkbox" value="sname" name="options[]" class="checkSingle" checked="checked" /> <span>Site Name</span>

                </li>

                <li>

                    <input type="checkbox" value="cname" name="options[]" class="checkSingle" checked="checked" /> <span>Category Name</span>

                </li>

                <li>

                    <input type="checkbox" value="observation" name="options[]" class="checkSingle" checked="checked" /> <span>Observation</span>

                </li>

                <li>

                    <input type="checkbox" value="location" name="options[]" class="checkSingle" checked="checked" /> <span>Location</span>

                </li>

                <li>

                    <input type="checkbox" value="picture" name="options[]" class="checkSingle" checked="checked" /> <span>Picture</span>

                </li>

                <li>

                    <input type="checkbox" value="recommendations" name="options[]" class="checkSingle" checked="checked" /> <span>Recommendations</span>

                </li>

                <li>

                    <input type="checkbox" value="snagdate" name="options[]" class="checkSingle" checked="checked" /> <span>Snag Date</span>

                </li>

                <li>

                    <input type="checkbox" value="timeline" name="options[]" class="checkSingle"checked="checked"  /> <span>Timeline given by project team</span>

                </li>

                <li>

                    <input type="checkbox" value="status" name="options[]" class="checkSingle" checked="checked" /> <span>Status</span>

                </li>

            </ul>

        </div>

           <div class="modal-fo">

          <button  type="button" class="btn btn-primary"  onclick="getpdfreport()" data-toggle="modal" data-target="#myModal">PDF Download</button>

		  <button  type="button" class="btn btn-primary"  onclick="getexcelreport()" data-toggle="modal" data-target="#myModal">Excel Download</button>
          </div>

        </div>





      </div>



      



    </div>



  </div>



  
<div class="modal fade snag-modal" id="myImport" role="dialog">



    <div class="modal-dialog">



    



      <!-- Modal content-->



      <div class="modal-content">



        <div class="modal-header">

          



          <button type="button" class="close btn-danger" data-dismiss="modal">&times;</button>



          <h4 class="modal-title"><i class="fa fa-print" aria-hidden="true"></i>  Import Snag Entries</h4>



        </div>

       



        <div class="modal-body" style="text-align: center;">

            {!! Form::open(['files' => 'true','route' => 'uploadexcel.savesnaguploadfile','role' => 'form', 'class'=>'form-inline upload-attendance-form', 'onsubmit' =>"return subform()"]) !!}
			
			 <div class="form-group tran">
				<label class="sr-only" for="file">Upload File</label>
				<input type="file" name="file" id="file" class="btn btn-info" title="Select File">
			  </div>
			  <div class="desibtn">
			  		<button type="submit" class="btn btn-default">Upload file</button>
			  </div>
	
				  <div class="help-block"><strong>Note!</strong> <b>Only xls or xlsx file is allowed!!</b> <a href="{!! URL::to('/uploads/snag_sample.xlsx') !!}">Click here for Sample File.</a></div>
	
				{!! Form::close() !!}


           

        </div>





      </div>



      



    </div>



  </div>


<div class="modal fade snag-modal" id="editSnag" role="dialog">
	<div class="modal-dialog" style="width:900px !Important; top:0% !important;">
	  <div class="modal-content">
		<div class="modal-header">
		  <button type="button" class="close btn-danger" data-dismiss="modal">&times;</button>
		  <h4 class="modal-title"><i class="fa fa-print" aria-hidden="true"></i>  Summary Snag Report</h4>
		</div>
		<div class="modal-body" style="text-align: center; padding:15px 0px;">		
			
			
		</div>
	  </div>
	</div>
</div>
  
  
<div class="modal fade snag-modal" id="summary" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close btn-danger" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-print" aria-hidden="true"></i>  Summary Snag Report</h4>
        </div>
        <div class="modal-body" style="text-align: center;">		
			 <div class="form-group tran" style="width:100%;">
			 	<div class="individual-reportfrom" style="width:33%; float:left;">
					<label class="label-individual-from" style="float:left;">Sites<span>:</span></label>
					<div style="float:left; width:135px;">{!! Form::select('sites', $sitenames, old('category'), ['class' => 'form-control pms-auditreport', 'id' => 'ssite']) !!}</div>
				</div>
				<div class="individual-reportfrom" style="width:33%; float:left;">
					<label class="label-individual-from" style="float:left;">From<span>:</span></label>
					<input type="text" name="sfromdate" id="sfromdate" value="<?php  echo date("d-m-Y"); ?>" 
					class="hasDatePicker form-control index-date1" style="float:left; width:135px;"/>
				</div>
				<div class="individual-reportto" style="width:33%; float:left;">
				   <label class="label-individual-to"  style="float:left;">To<span>:</span></label>
				   <input type="text" name="stodate" id="stodate" value="<?php  echo date("d-m-Y"); ?>" 
				   class="hasDatePicker form-control index-date1" style="float:left; width:135px;"/>
				</div>
			</div>
			<div class="desibtn" style="margin-top:20px;">
			  	<button  type="button" class="btn btn-primary"  onclick="getsummaryreport()">
					Excel Download
				</button>
			</div>
        </div>
      </div>
    </div>
  </div>
@stop
@section('javascript')
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script> 
    <script type="text/javascript">
		function loadScripts()
		{
			
			var bar = $('.bar');
			var percent = $('.percent');

		   $('form').ajaxForm({
				beforeSend: function() {
					var percentVal = '0%';
					bar.width(percentVal)
					percent.html(percentVal);
				},
				uploadProgress: function(event, position, total, percentComplete) {
					var percentVal = percentComplete + '%';
					bar.width(percentVal)
					percent.html(percentVal);
					
				},
				complete: function(xhr) 
				{
					var str = xhr.responseText;
					var res = str.split("type");
					var first = res[0]; //"1234"
					var finalPath = first.split("path");
					var second = res[1]; //"56789"
					if(res[1]=='snagupload') $("#image_path").val(finalPath[1]);
					else if(res[1]=='rec') $("#rec_image_path").val( finalPath[1]);
					alert("File Uploaded Successfully");
				}
			  });
			  
			   $('#example1').datepicker({ dateFormat: "dd-mm-yy" });
			   $('#example2').datepicker({ dateFormat: "dd-mm-yy" });
				   $("input[name$='rectype']").click(function() {
					var inputValue = $(this).attr("value");
					if(inputValue=='image')
					{
						$(".image").show();
						$(".text").hide();
					}
					else
					{
						$(".image").hide();
						$(".text").show();
					}
				});
					   
		}
		
		
		function selectSites()
		{
			var site = $("#site").val();
			console.log(site);
			$.ajax({
			type: "get",
			cache:false,
			url: '{{ route('audit.snagsiteselect') }}',
			data: { site: site},
			success: function( response ) 
			{	
				 $("#validresponse").html(response);
				 $("#dTableColSearch").DataTable(); 
			}}); 
		}
		
		function snagEdit(id)
		{
			
			$.ajax({
			type: "get",
			cache:false,
			url: '{{ route('audit.snagedit') }}',
			data: { sangId: id},
			success: function( response ) {				
				//console.log(response);
				$('#editSnag .modal-body').html(response);
				$('#editSnag').modal('show');
				loadScripts();
			}}); 
		}
		 $('.datatable').each(function() {
			var options = {
				retrieve: true,
				dom: 'frtip<"actions">',
				columnDefs: [],
				"iDisplayLength": 10,
				"aaSorting": []
			};
	
			if ($(this).hasClass('dt-select')) {
				options.select = {
					style: 'multi',
					selector: 'td:first-child'
				};
	
				options.columnDefs.push({
					orderable: false,
					className: 'select-checkbox',
					targets: 0
				});
			}
	
			$(this).dataTable(options);
		});
        window.route_mass_crud_entries_destroy = '{{ route('snag.mass_destroy') }}';
    </script>
@endsection


