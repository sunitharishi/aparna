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
          AUDIT -> FMS - DIESEL STOCK
          <p class="pull-right audit-backbutton">
             <a href="/audit" class="">Back</a> 
          </p>
        </div>
         <div class="panel-body">
            <div class="fma-areport">
                <table  border="1" class="afms-reporttable">
                    <thead>
                       <tr>
                          <th>S.No</th>
                          <th>Project Name</th>
                          <th>Date</th>
                          <th>Diesel Stock</th>
                       </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>Aparna County</td>
                        <td>1 to 31st Mar'18</td>
                        <td>20</td>
                      </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>  
   
   
 @include('partials.footer')

@stop

