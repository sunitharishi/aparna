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
          AUDIT -> PMS - IMPREST AMOUNT 
           <p class="pull-right audit-backbutton">
             <a href="/audit" class="">Back</a> 
          </p>
        </div>
         <div class="panel-body">
             <div class="pms-areport">
                <table   border="1" class="apms-reporttable">
                    <thead>
                       <tr>
                          <th>S.No</th>
                          <th>Project Name</th>
                          <th>Date</th>
                          <th>Cash on Hand</th>
                          <th>Bills on Hand</th>
                          <th>Bill Submitted</th>
                          <th>Total</th>
                          <th>Petty Cash Imprest </th>
                          <th>1/3rd of site limit</th>
                          <th>Bills on hand more than 1/3rd of site limit</th>
                           <th>Variance</th>
                          <th>Observation</th>
                          <th>Bill submitted Date</th>
                       </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>Kanopy</td>
                        <td><p class="singleline">01-Mar-18</p></td>
                        <td>0</td>
                        <td>4,000</td>
                        <td>0</td>
                        <td>4,000</td>
                        <td>7500</td>
                        <td>2500</td>
                        <td>TRUE</td>
                        <td>3500</td>
                        <td>Cash Varience</td>
                        <td>Not Submitted to HO</td>
                      </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>  
   
   
 @include('partials.footer')

@stop

