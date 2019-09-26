@extends('layouts.app')

@section('content')
  
<div class="panel panel-default critical-manpower">
    <div class="row">
        <div class="mmrpower-heading">
        	<h3><span>Statutory Compliances</span></h3>
            <h5 class="license-renewal">License Renewal - Site Operations </h5>
        </div>
    </div>      
    <div class="row">
        <div class="mmrpower-manpower">
            <table width="" border="1">
                <thead>
                    <tr>
                    	<th>Sr.No</th>
                        <th>Description</th>
                        <th>Expiry</th>
                        <th>Frequency</th>
                    </tr>
                 </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Fire NOC Inspection & Renewal</td>
                        <td>02-02-2021</td>
                        <td>-</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

   
    @include('partials.footer')
@stop

