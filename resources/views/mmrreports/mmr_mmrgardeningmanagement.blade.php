@extends('layouts.app')

@section('content')
  
<div class="panel panel-default critical-manpower">
    <div class="row">
        <div class="mmrpower-heading consumables-heading">
        	<h3><span>Gardening Management</span></h3>
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
                        <td>Pruning</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Cutting</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>General Pesticide</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Weeding in Lawn Area</td>
                    </tr>
                     <tr>
                        <td>5</td>
                        <td>Mulching</td>
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
                        <th>Pruning</th>
                        <th>Cutting  </th>
                        <th>Mulching</th>
                        <th>Weeding</th>
                        <th>Pesticide </th>
                        <th>Total</th>
                    </tr>
                 </thead>
                <tbody>
                    <tr>
                        <td>Feb' 18</td>
                        <td>1</td>
                        <td>1</td>
                        <td>2</td>
                        <td>2</td>
                        <td>2</td>
                        <td>8</td>
                    </tr>
                    <tr>
                        <td>Mar' 18</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>2</td>
                        <td>2</td>
                        <td>8</td>
                    </tr>
                    <tr>
                        <td>Apr' 18</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>2</td>
                        <td>2</td>
                        <td>8</td>
                    </tr>
                    <tr>
                        <td>May' 18</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>2</td>
                        <td>2</td>
                        <td>8</td>
                    </tr>
                     <tr>
                        <td>Total</td>
                        <td>4</td>
                        <td>4</td>
                        <td>5</td>
                        <td>8</td>
                        <td>8</td>
                        <td>32</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

   
    @include('partials.footer')
@stop

