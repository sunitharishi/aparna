@extends('layouts.app')

@section('content')
  
<div class="panel panel-default critical-manpower">
    <div class="row">
        <div class="mmrpower-heading availability-heading">
        	<h3><span>Critical Equipment Availability</span></h3>
        </div>
    </div>      
    <div class="row">
        <div class="mmrpower-manpower equipmentavailability">
            <table width="" border="1">
                <thead>
                    <tr>
                    	<th colspan="6">EQUIPMENT's</th>
                    </tr>
                    <tr>
                        <th>S.No </th>
                        <th>Equipment's </th>
                        <th>Rating </th>
                        <th>Make/Supplier</th>
                        <th>No of Break Down</th>
                        <th>Availability in % </th>
                    </tr>
                 </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Transformers(3) </td>
                        <td>1600 *3 KVA </td>
                        <td>Pete</td>
                        <td>-</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>DG's (6) </td>
                        <td>400 *6 KVA </td>
                        <td>Kirloskar </td>
                        <td>-</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td rowspan="2">3</td>
                        <td rowspan="2">Lifts (49)</td>
                        <td>Passenger -30 (680 kgs, 10 persons) </td>
                        <td rowspan="2">Johnson Lifts </td>
                        <td rowspan="2">-</td>
                        <td rowspan="2">100</td>
                    </tr>
                    <tr>
                    	<td>Service -19 (1000 kgs, 16 persons) </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>STP</td>
                        <td>1500 KLD</td>
                        <td>Revolve Engineers </td>
                        <td>-</td>
                        <td>100</td>
                    </tr>
                     <tr>
                        <td>5</td>
                        <td>WSP</td>
                        <td>360*2 KLD </td>
                        <td>Revolve Engineers </td>
                        <td>-</td>
                        <td>100</td>
                    </tr>
                     <tr>
                        <td>6</td>
                        <td>Fire - Booster Pump </td>
                        <td>15*20 HP </td>
                        <td>Grundfos </td>
                        <td>-</td>
                        <td>100</td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>

   
    @include('partials.footer')
@stop

