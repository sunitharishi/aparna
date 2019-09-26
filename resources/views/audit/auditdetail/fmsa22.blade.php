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
          AUDIT -> FMS - METRO WATER
            <span class="pull-right">
          		<a href="{{ route('audit.index') }}" class="btn green-back">Back</a>
          </span>
        </div>
         <div class="panel-body">
            <div class="fma-areport">
                <table  border="1" class="afms-reporttable">
                    <thead>
                       <tr>
                          <th>S.No</th>
                          <th>Project Name</th>
                          <th>Occupancy</th>
                          <th>MTD Consumption</th>
                          <th>Occupancy</th>
                          <th>MTD Consumption</th>
                          <th>Contracted Demand per month</th>
                          <th>60% of Site limit</th>
                       </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>Aura</td>
                        <td>1124</td>
                        <td>2367</td>
                        <td>1126</td>
                        <td>2467</td>
                        <td>2010</td>
                        <td>1206</td>
                      </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>  
   
   
 @include('partials.footer')

@stop

