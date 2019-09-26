@extends('layouts.app')


@section('content')

<style type="text/css">
	.empids .commoncom{clear: both;padding: 4px;margin: 4px;}
    .empids .empbox{float: left;padding: 4px;border: 1px solid #cccccc;margin: 4px;}
    .empids .empbox i{color:red; font-size:20px;}
</style>

 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

   <!-- <h3 class="page-title">Tasks</h3>-->
   

    <div class="panel panel-default panelmar tsas-crseations">
        <div class="panel-heading">
            AUDIT -> PMS -  DELAY IN SENDING DAR
        </div>
        <div class="panel-body">
            <div class="pms-areport">
                <table   border="1" class="apms-reporttable">
                    <thead>
                       <tr>
                          <th>S.No</th>
                          <th>Project Name</th>
                          <th>Date</th>
                          <th> Observation</th>
                       </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>Cyberzon</td>
                        <td>15-Mar-18</td>
                        <td>DAR not received</td>
                      </tr>
                    </tbody>
                </table>
            </div>
        </div> 
    </div>  
    
   
 @include('partials.footer')

@stop

