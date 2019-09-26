@extends('layouts.app')

@section('content')

    
    <div class="panel panel-default panelmar indentview-table">
    
       
        <div class="panel-heading task-header1">
            <div class="selection"><span class="page-title task-manager">Indent : </span>
             
             <span class="taskkk-number">{{ $task->title }} </span></div>
              <a href="{{ route('indents.index') }}" class="btn btn-back-list backto-to-list">Back</a> </div>  
              <div class="table-responsive"> 
			  <table class="table table-bordered table-striped tble-emolossoos">
				 <tr>
				 	<th>Item Code</th><td>{{ $task->item_code }}</td>
				 	<th>Title</th><td>{{ $task->title }}</td>       
					<th>Description</th><td>{{ $task->description }}</td>
					<th>Priority</th><td>{{ $task->priority }}</td></tr>
					<tr><th>Requested By</th><td>{{ getlogeedname($task->user_id) }}</td>
					<th>Requested Date Time</th><td>{{ $task->created_at }}</td>
					<th>Approve Status</th><td>{{ $task->item_status }}</td>
					<th>Approved By</th><td>{{ getlogeedname($task->approved_by) }}</td></tr>
					<tr><th>Request Status</th><td>{{ $task->request_status }}</td>
					<th>Request Description</th><td>{{ $task->request_description }}</td>
					<th>Closed By</th><td>{{ getlogeedname($task->closed_by) }}</td>
                 
				 </tr>
             </table>   
            </div>
        
        <!--  <div class="task-sescription"></div>
          <div class="descrioption-clode"></div>-->
           
        
    </div>
<script type="text/javascript">
    fu_inputs = {};
    fu_inputs['refid']=0;
    fu_inputs['multiple']=true;
    fu_inputs['ufilename']='task_file';
</script>    
  @include('partials.footer')
@stop