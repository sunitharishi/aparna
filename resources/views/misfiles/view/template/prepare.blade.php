<style>
.unbelievable
{
    vertical-align: middle;
    border-radius: 3px;
    margin: 10px 20px;
    width: 208px;
    box-shadow: 2px 1px 1px 2px lightgrey;
}


</style>

@if (count($res) > 0)

@foreach ($res as $record)
  <div style="float: left;" id="image_<?php echo $record['id']; ?>">
  	<div style="width:200px; text-align:center;">
    <img class="unbelievable" src="<?php echo "/".$record['image_url'];  ?>" style="height:200px"><br/>
	</div>
    <div style="width:90%; text-align:center;" id="title_<?php echo $record['id']; ?>"><?php echo $record['title']; ?></div>
	<div>
		<div style="display:inline-block;cursor: pointer;">
			<button  type="button" class="btn btn-primary" onclick="editImage(<?php echo $record['id']; ?>, '<?php echo $record['title']; ?>');">Edit</button>
		</div>
		<div  style="display:inline-block;"> | </div>
		<div style="cursor: pointer;display:inline-block;">
			<button  type="button" class="btn btn-primary" onclick="imgDelete(<?php echo $record['id']; ?>);">Delete</button>
		</div>
	</div>
 </div>
                        
                        @endforeach   

                    @else
                    
                     <div>No entries in table</div>

                    @endif
 
    <?php //echo "<pre>"; print_r($res); echo "</pre>"; ?> 

  <?php /*?> <table width="100%" border="1" cellspacing="0">
                        <tbody>
                          <tr>
                           <th colspan="15" style="font-size:15px;text-align:center;background-color:#2f4050;color:#fff;"> Project Name : <?php echo $sitename; ?> &nbsp;&nbsp;&nbsp; <?php 
$monthName = date("F", mktime(0, 0, 0, $report_month, 10));
echo $monthName;?> - <?php echo $report_year;?>  </th>
                          </tr>
                      <tr style="background-color:#e9c085;"> 
                        <th >PR Nos</th>
                        <th >PR Date </th>
                        <th >Item Code</th>
                        <th >Item  Desc</th>
                        <th >UOM</th>
                        <th > PR Qty </th>
                        <th > PO No </th>
                        <th>PO Date</th>
                        <th > Lead Time of days </th>
                        <th > Date of Submission </th>
                        <th > Date Form Submission </th>
                        <th > Lagged Time Up to <?php echo $laaggeddate; ?></th>
                      </tr>
                             
						      @if (count($res) > 0)

                        @foreach ($res as $record)
                             <tr>
								<td><span><?php echo  $record['pr_nos'];?></span></td>
								<td><span><?php echo  $record['pr_date'];?></span></td>
								<td><span><?php echo  $record['item_code'];?></span></td>
								<td><span><?php echo  $record['item_desc'];?></span></td>
								<td><span><?php echo  $record['uom'];?></span></td>
								<td><span><?php echo  $record['pr_qty'];?></span></td>
								<td><span><?php echo  $record['po_no'];?></span></td>
								<td><span><?php echo  $record['po_date'];?></span></td>
								<td><span><?php echo  $record['lead_time_of_days'];?></span></td>
								<td><span><?php echo  $record['date_of_submission'];?></span></td>
								<td><span><?php echo  $record['days_from_submission'];?></span></td>
								<td><span><?php echo  $record['lagged_time_upto'];?></span></td>
                            </tr>
                          
						    @endforeach   

                    @else

                        <tr>

                            <td colspan="12">No entries in table</td>

                        </tr>

                    @endif
                            
                            
                          
                         </tbody>
                      </table><?php */?>
					  
	<div class="modal fade snag-modal" id="summary" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close btn-danger" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-print" aria-hidden="true"></i>  Edit Fire Safety Preparedness</h4>
        </div>
        <div class="modal-body" style="text-align: center;">
			  <input type="hidden" name="fire_id" id="fire_id" value="" class="form-control"/>		
			  <input type="text" name="title" style="border:1px solid #666;" id="title" value="" class="form-control"/>
			  <div style="text-align:center; margin-top:20px;"><input type="submit" class="btn btn-primary" value="Submit" onclick="submitFire();" /></div>
        </div>
      </div>
    </div>
  </div>
<script type="text/javascript">
        function imgDelete(dis)
        {
          var answer  = confirm("Are you sure you want to delete this Image");
          if(answer)
          {
            $.ajax({
            type: "get",
            cache:false,
            url: '{{ route('validation.preparedelete') }}',
            data: { imageId: dis},
            success: function( response ) {            
              $("#image_"+dis).remove();                   
            }  
           });  
          }
          else
          {
           
          }
        }
		function submitFire()
		{
			var title = $("#title").val();
			var fire_id = $("#fire_id").val();
			$.ajax({
			type: "get",
			cache:false,
			url: '{{ route('validation.prepareupdate') }}',
			data: { title: title, id: fire_id},
			success: function( response ) {            
			  $("#title_"+fire_id).html(title);
			  $('#summary').modal('hide');                   
			}  
		   });  
		}
		function editImage(id,title)
        {
		   $("#fire_id").val(id);
		   var poptitle = $("#title_"+id).html();
		   $("#title").val(poptitle);
           $('#summary').modal('show');
        }
</script>