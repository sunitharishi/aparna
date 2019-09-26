@extends('layouts.appgraph')
@section('content')

<?php //echo "<pre>"; print_r($assets); echo "</pre>"; ?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Extend FullCalendar Events with Bootstrap Modal</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.6.1/fullcalendar.min.css" type="text/css" rel="stylesheet" />
<style>
.modal-dialog
{
    margin:19% auto;
}
</style>    
</head>
<body>
<?php /*?> <?php if(count($sites) > 0){	 ?>
 <select name="sites" id="sites" onChange="getCalView(this.value);">
 <option value="all">All</option>
<?php
    foreach($sites as $k => $site){ ?>
	   <option value="<?php echo $k; ?>"><?php echo $site; ?></option>
	<?php }
 ?>
 </select>
 <?php }
 ?><?php */?>
  <a href="{{ route('tasks.index') }}" class="btn btn-primary task-calendar" title="Calendar" style="float:left;">Task</a> 
  <a href="{{ route('meetups.index') }}" class="btn btn-primary task-calendar" title="Calendar" style="float:left;">MOM</a> 
  <!--<a href="{{ route('tasks.create') }}" class="btn btn-new" style="float:left;">Add</a>-->
 
    <div class="count-calender">
        <div class="row">
            <div class="col-xs-12 tasks-calendar">
                <div id="bootstrapModalFullCalendar"></div>
            </div>
        </div>
    </div>

    <div id="fullCalModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">�</span> <span class="sr-only">close</span></button>
                    <h4 id="modalTitle" class="modal-title"></h4>
                </div>
                <div id="modalBody" class="modal-body"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a class="btn btn-primary" id="eventUrl" target="_blank">Details</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.2/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.6.1/fullcalendar.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#bootstrapModalFullCalendar').fullCalendar({
                header: {
                    left: '',
                    center: 'prev title next',
                    right: ''
                },
               /* eventClick:  function(event, jsEvent, view) {
                    $('#modalTitle').html(event.title);
                    $('#modalBody').html(event.description);
                    $('#eventUrl').attr('href',event.url);
                    //$('#fullCalModal').modal();
                    return false;
                },*/
				eventClick: function(event) {
					if (event.url) {
						window.open(event.url, "_blank");
						return false;
					}
				},
                events:
                [<?php  $k = count($assets);
				  foreach( $assets as $ke => $asset) {  ?>
                   {
                      "title":"<?php echo $asset['title']; ?>",
                      "allday":"false",
                      "description":"<p><?php //echo $asset['description']; ?></p>",
                      "start":'<?php $da = $asset['task_create_date']; $datearr = explode(" ",$da); echo $datearr[0];?>',
                      "end":'<?php $da = $asset['task_create_date']; $datearr = explode(" ",$da); echo $datearr[0];?>',
                      "url":"/tasks/<?php echo $asset['id'] ?>"
                   },
                   <?php }?>
                ]
            });
        });
		
		
    </script>
</body>
</html>
@include('partials.footer')
@endsection