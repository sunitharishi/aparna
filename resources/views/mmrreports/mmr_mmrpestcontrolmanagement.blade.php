@extends('layouts.app')

@section('content')
  
<div class="panel panel-default critical-manpower">
    <div class="row">
        <div class="mmrpower-heading consumables-heading">
        	<h3><span>Pest Control Management</span></h3>
        </div>
    </div>      
    <div class="row housekeeping-consumables">
        <div class="col-sm-4">
            <table width="100%" border="1">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Activity</th>
                    </tr>
                 </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Rat trap checking</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Gel Bait station checking in Common Area</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>General Pesticide</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Avenging operation in External Area</td>
                    </tr>
                     <tr>
                        <td>5</td>
                        <td>Fogging of common area</td>
                    </tr>
                   
                </tbody>
            </table>
        </div>
        <div class="col-sm-8">
            <table width="100%" border="1">
               <thead>
                    <tr>
                        <th>Trend </th>
                        <th colspan="5">Common Areas </th>
                        <th>All</th>
                    </tr>
                    <tr>
                    	<th>Month </th>
                        <th>Fogging </th>
                        <th>Rat catching </th>
                        <th>Snake Catching </th>
                        <th>Cobweb  </th>
                        <th>Lizard </th>
                        <th>Total pest </th>
                    </tr>
                 </thead>
                <tbody>
                    <tr>
                        <td>Feb' 18</td>
                        <td>12</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>12</td>
                    </tr>
                    <tr>
                        <td>Mar' 18</td>
                        <td>12</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>12</td>
                    </tr>
                    <tr>
                        <td>Apr' 18</td>
                        <td>12</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>12</td>
                    </tr>
                    <tr>
                        <td>May' 18</td>
                        <td>12</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>12</td>
                    </tr>
                     <tr>
                        <td>Total</td>
                        <td>12</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>12</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

   
    @include('partials.footer')
@stop

