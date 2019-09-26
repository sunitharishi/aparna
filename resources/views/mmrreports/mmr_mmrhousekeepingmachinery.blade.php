@extends('layouts.app')

@section('content')
  
<div class="panel panel-default critical-manpower">
    <div class="row">
        <div class="mmrpower-heading housekeeping-heading">
        	<h3><span>Housekeeping Critical Machinery</span></h3>
        </div>
    </div>      
    <div class="row">
        <div class="mmrpower-manpower housekeeping-machinery">
            <table width="" border="1">
                <thead>
                    <tr>
                        <th>S.NO</th>
                        <th>NAME OF EQUIPMENT</th>
                        <th>QTY</th>
                        <th>PURPOSE OF USE</th>
                        <th>AVAILABILITY OF EQUIPMENT</th>
                    </tr>
                 </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>WET AND DRY VACUUM MACHINES</td>
                        <td>1</td>
                        <td>CLEANING OF WET CARPET AREA, CAFETERIA FLOOR, AND DRAINAGE CLEANING</td>
                        <td>100%</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>FLOOR SCRUBBING MACHINE</td>
                        <td>3</td>
                        <td>SCRUBBING OF  TILES AND HARD FLOORS, SCRUBBING OF TOILET FLOORS</td>
                        <td>33%</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>MANUAL FLIPPERS</td>
                        <td>5</td>
                        <td>CLEANING OF FLOOR</td>
                        <td>100%</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>MOP TROLLEYS</td>
                        <td>21</td>
                        <td>FOR WET MOPPING OF FLOOR & CAFETERIA</td>
                        <td>100%</td>
                    </tr>
                     <tr>
                        <td>5</td>
                        <td>GARBAGE BINS</td>
                        <td>1</td>
                        <td>FOR WET & DRY GARBAGE REMOVING  </td>
                        <td>100</td>
                    </tr>
                     <tr>
                        <td>6</td>
                        <td>Fire Safety Supervisor</td>
                        <td>40</td>
                        <td>FOR WET & DRY GARBAGE REMOVING </td>
                        <td>100%</td>
                    </tr>
                     <tr>
                        <td>7</td>
                        <td>PRESSURE JET MACHINE (Shared)</td>
                        <td>1</td>
                        <td>TO CLEAN THE HARD  SURFACES & REMOVES HARD STAINS FROM THE FLOOR</td>
                        <td>Once in every 3 Months</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

   
    @include('partials.footer')
@stop

