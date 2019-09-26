@extends('layouts.app')

@section('content')
  
    <div class="panel panel-default critical-manpower">
        <div class="row">
        	<div class="enginnering-heading power-heading">
           		<h3><span>Water Consumption</span></h3>
           </div>
        </div>      
        <div class="row">
        	<div class="mmrpower-consumption">
            	<table width="" border="1">
                	<thead>
                    	<tr>
                        	<th></th>
                            <th>Mar-18</th>
                            <th>Apr-18</th>
                            <th>May-18</th>
                        </tr>
                        <tbody>
                        	<tr>
                            	<td><hr  style="border-top:5px solid #ccc;"/>HMWS</td>
                                <td>18020</td>
                                <td>20490</td>
                                <td>12460</td>
                            </tr>
                            <tr>
                            	<td><hr style="border-top:5px solid #585353;" /> Borewell</td>
                                <td>3939</td>
                                <td>3370</td>
                                <td>775</td>
                            </tr>
                            <tr>
                            	<td><hr style="border-top:5px solid #e0d5d5;" /> Tankers</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                            <tr>
                            	<td><hr style="border-top:5px solid #756d6d;" /> STP Treated</td>
                                <td>24052</td>
                                <td>23817</td>
                                <td>24977</td>
                            </tr>
                        </tbody>
                    </thead>
                </table>
                
                <p class="mmrwater-note">Due to HMWS meter problem consumption is low in may month</p>
            </div>
        </div>
   
    </div>

   
    @include('partials.footer')
@stop

