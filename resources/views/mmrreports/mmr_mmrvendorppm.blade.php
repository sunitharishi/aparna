@extends('layouts.app')

@section('content')
  
<div class="panel panel-default critical-manpower">
    <div class="row">
        <div class="mmrpower-heading">
        	<h3><span>Vendor PPM</span></h3>
        </div>
    </div>      
    <div class="row">
        <div class="mmrpower-manpower">
            <table width="" border="1">
                <thead>
                    <tr>
                    	<th>MONTH</th>
                        <th colspan="3">April' 2018</th>
                        <th colspan="3">May' 2018</th>
                    </tr>
                    <tr>
                        <th>Trend </th>
                        <th>Planned</th>
                        <th>Completed </th>
                        <th>Pending </th>
                        <th>Planned</th>
                        <th>Completed </th>
                        <th>Pending </th>
                    </tr>
                 </thead>
                <tbody>
                    <tr>
                        <td>Lifts</td>
                        <td>Yes</td>
                        <td>Yes</td>
                        <td>-</td>
                        <td>Yes</td>
                        <td>Yes</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td> Hydro pneumatic Pumps</td>
                        <td>Yes</td>
                        <td>Yes</td>
                        <td>-</td>
                        <td>Yes</td>
                        <td>Yes</td>
                        <td>-</td>
                    </tr>
                   
                </tbody>
            </table>
        </div>
    </div>
</div>

   
    @include('partials.footer')
@stop

