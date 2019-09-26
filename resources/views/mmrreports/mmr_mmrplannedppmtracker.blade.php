@extends('layouts.app')

@section('content')
  
<div class="panel panel-default critical-manpower">
    <div class="row">
        <div class="mmrpower-heading planned-ppm">
        	<h3><span>In-house Planned PPM Tracker</span></h3>
        </div>
    </div>      
    <div class="row">
        <div class="mmrpower-manpower">
            <table width="" border="1">
                <thead>
                    <tr>
                        <th>S.NO</th>
                        <th>Planned Schedule June'2018</th>
                        <th>Frequency</th>
                        <th>Status</th>
                    </tr>
                 </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>DG Sets - 400 KVA - 06 Nos</td>
                        <td>M</td>
                        <td>Planned</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Solar Fencing</td>
                        <td>M</td>
                        <td>Planned</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Common Supply Panels - 20 No's</td>
                        <td>G</td>
                        <td>Planned</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Bore wells Starters - 13 No's</td>
                        <td>G</td>
                        <td>Planned</td>
                    </tr>
                     <tr>
                        <td>5</td>
                        <td>STP -Hydro pneumatic pumps - 6 No's</td>
                        <td>M</td>
                        <td>Planned</td>
                    </tr>
                     <tr>
                        <td>6</td>
                        <td>WTP -Hydro pneumatic pumps - 09 No's</td>
                        <td>M</td>
                       <td>Planned</td>
                    </tr>
                     <tr>
                        <td>7</td>
                        <td>Hydrants points</td>
                        <td>M</td>
                        <td>81</td>
                    </tr>
                     <tr>
                        <td>8</td>
                        <td>STP- Final Tank</td>
                        <td>B</td>
                        <td>90</td>
                    </tr>
                   
                </tbody>
            </table>
        </div>
    </div>
</div>

   
    @include('partials.footer')
@stop

