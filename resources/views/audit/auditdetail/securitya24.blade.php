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
          AUDIT -> SECURITY - EMPLOYED PERSONS WITHOUT SHOES
           <p class="pull-right audit-backbutton">
             <a href="/audit" class="">Back</a> 
          </p>  
        </div>
         <div class="panel-body">
            <div class="security-areport">
                <table   border="1" class="asecurity-reporttable">
                     <thead>
                       <tr>
                          <th>S.No</th>
                          <th>Project Name</th>
                          <th>Date</th>
                          <th>No.of Persons Without shoes</th>
                          <th>Designation(Guard/Lady Guard/Head Guard/ Sec Supervisor/ASO/SO)</th>
                       </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>Aura</td>
                        <td>21-Jun-18</td>
                        <td>1</td>
                        <td>A.S.O</td>
                      </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>  
   
   
 @include('partials.footer')

@stop

