@extends('layouts.app')

@section('content')
	<div class="forums-indexpg">
       
        
 
    <div class="panel panel-default panelmar foeums-front">
        <div class="panel-heading mwasssss" style="width:100%;">
            <h3 class="page-title formssss">Forums</h3>
          <div class="pagefoemsclass">
            <div class="col-sm-4 form-group" style="position:relative;">
            {!! Form::label('category', 'Category', ['class' => 'control-label']) !!}
            {!! Form::select('category', $categories, old('category'), ['class' => 'form-control select2mes', 'id' => 'getcat']) !!}
            <p class="help-block"></p>
            @if($errors->has('category'))
                <p class="help-block">
                    {{ $errors->first('category') }}
                </p>
            @endif
              </div>
             @if(getlogperms('add_task'))        
            <div class="addnew-btn"><a href="{{ route('forums.create') }}" class="btn btn-new">Add</a></div>
            @endif
           
        </div>
        </div>

        <div class="panel-body forums-section">        
        
           <div id="validresponse">
            <table class="table table-bordered table-striped foeeemmeme {{ count($assets) > 0 ? 'datatable' : '' }}" >  
                <thead class="head-color">
                    <tr>
                       <th>S.No</th>
                   
                        <th>Title</th>
					
                            @if(getlogperms('edit_task') || getlogperms('delete_task')) <th>Action</th>  @endif
                    </tr> 
                </thead>
                   
                <tbody id="validresponse">
                    @if (count($assets) > 0)
					   <?php $i = 0;
					     
					    ?>
                        @foreach ($assets as $client)
						<?php $i = $i + 1; ?>
                            <tr>
                               <td>{{ $i }}</td>
                               
                              
                                 <td>@if(getlogperms('view_task'))<a href="{{ route('forums.show',[$client->id]) }}" class="btn btn-xs puirpose">{{ $client->title }}@endif</a></td>
								<!-- <td>{{ $client->frcode }}</td>
                                  
                                <td>{{ (isset($client->catgname)?$client->catgname:'') }}</td>-->
                                  @if(getlogperms('edit_task') || getlogperms('delete_task'))  <td> 
                                    <!--@if(getlogperms('view_task'))<a href="{{ route('forums.show',[$client->id]) }}" class="btn btn-xs btn-primary">View</a>@endif-->
                                    @if(getlogperms('edit_task'))<a href="{{ route('forums.edit',[$client->id]) }}" class="btn btn-xs btn-inverse">Edit</a>@endif
                                    @if(getlogperms('delete_task')){!! Form::open(array(
                                                'style' => 'display: inline-block;',
                                                'method' => 'DELETE', 
                                                'onsubmit' => "return confirm('".trans("Are you sure?")."');",
                                                'route' => ['forums.destroy', $client->id])) !!}
                                    {!! Form::submit('Delete', array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}@endif</td> @endif
                            </tr>
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
   @include('partials.footer')
@stop 



<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
$( document ).ready(function() {

var oTable = $('#dtable').DataTable();  
    console.log( "ready!" );
	  $('select[name="category"]').on('change', function(){  
	  var val = $(this).val();
	    if(val == "") {
	  
	   $("#reportblock").css("display", "none");
	   
	      
	   
	  } else{  
	  
	    $.ajax({
				type: "get",
				cache:false,
				url: '{{ route('forums.getselectedcatresults') }}',
				data: { cat: val},
				success: function( response ) {
                 
				$("#validresponse").html(response);
				 $('#datatablesearch').DataTable(); 
				  
				}  
        }); 
			//oTable.ajax.reload();
		}
	  });
	  
	  
});
</script>