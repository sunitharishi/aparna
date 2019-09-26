@extends('layouts.app')

@section('content')
  
<div class="panel panel-default critical-manpower">
    <div class="row">
        <div class="mmrpower-heading completed-ppmtracker">
        	<h3><span>In-house completed PPM Tracker</span></h3>
        </div>
    </div>      
    <div class="row">
        <div class="mmrpower-manpower">
            <table width="" border="1">
                <thead>
                    <tr>
                        <th>S.NO</th>
                        <th>Completed Schedule May'2018</th>
                        <th>Frequency</th>
                        <th>Status</th>
                    </tr>
                 </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>DG Sets - 400 KVA - 06 Nos</td>
                        <td>M</td>
                        <td>Completed</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Boom Barriers - 5 Nos</td>
                        <td>Q</td>
                        <td>Completed</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Solar Fencing</td>
                        <td>M</td>
                        <td>Completed</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Fire Panels - 20 Nos</td>
                        <td>A</td>
                        <td>Completed</td>
                    </tr>
                     <tr>
                        <td>5</td>
                        <td>STP Panel - 01 Nos</td>
                        <td>G</td>
                       <td>Completed</td>
                    </tr>
                     <tr>
                        <td>6</td>
                        <td>Bus Ducts Raiser </td>
                        <td>A</td>
                        <td>Completed</td>
                    </tr>
                     <tr>
                        <td>7</td>
                        <td>STP -Hydro pneumatic pumps - 6 No's</td>
                        <td>M</td>
                       <td>Completed</td>
                    </tr>
                     <tr>
                        <td>8</td>
                        <td>STP - Sludge Transfer Pumps - 10  No's</td>
                        <td>G</td>
                        <td>Completed</td>
                    </tr>
                     <tr>
                        <td>9</td>
                        <td>WTP -Hydro pneumatic pumps - 09 No's</td>
                        <td>M</td>
                        <td>Completed</td>
                    </tr>
                     <tr>
                        <td>10</td>
                        <td>WTP - Filter feed pumps - 04 Nos</td>
                        <td>H</td>
                        <td>Completed</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

   
    @include('partials.footer')
@stop

