@extends('layouts.app')

@section('content')
  
<div class="panel panel-default critical-manpower">
    <div class="row">
        <div class="mmrpower-heading">
        	<h3><span>Key Critical Manpower</span></h3>
        </div>
    </div>      
    <div class="row">
        <div class="mmrpower-manpower">
            <table width="" border="1">
                <thead>
                    <tr>
                    	<th colspan="3">MONTH</th>
                        <th>May' 2018</th>
                    </tr>
                    <tr>
                        <th>S.NO</th>
                        <th>DESIGNATION</th>
                        <th>APPROVED STAFF</th>
                        <th>AVAILABLE In %</th>
                    </tr>
                 </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Site In-charge - (PMS)</td>
                        <td>1</td>
                        <td>90</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Site In-charge - (FMS) </td>
                        <td>1</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Facility Engineer</td>
                        <td>1</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Helpdesk</td>
                        <td>2</td>
                        <td>100</td>
                    </tr>
                     <tr>
                        <td>5</td>
                        <td>Stores</td>
                        <td>1</td>
                        <td>100</td>
                    </tr>
                     <tr>
                        <td>6</td>
                        <td>Fire Safety Supervisor</td>
                        <td>1</td>
                        <td>100</td>
                    </tr>
                     <tr>
                        <td>7</td>
                        <td>Stewards</td>
                        <td>5</td>
                        <td>81</td>
                    </tr>
                     <tr>
                        <td>8</td>
                        <td>Electricians</td>
                        <td>7</td>
                        <td>90</td>
                    </tr>
                     <tr>
                        <td>9</td>
                        <td>Sr.Technician</td>
                        <td>1</td>
                        <td>41</td>
                    </tr>
                     <tr>
                        <td>10</td>
                        <td>Plumbers</td>
                        <td>2</td>
                        <td>100</td>
                    </tr>
                     <tr>
                        <td>11</td>
                        <td>Carpenter</td>
                        <td>1</td>
                        <td>100</td>
                    </tr>
                     <tr>
                        <td>12</td>
                        <td>STP Supervisor</td>
                        <td>1</td>
                        <td>100</td>
                    </tr>
                     <tr>
                        <td>13</td>
                        <td>STP Operators</td>
                        <td>3</td>
                        <td>100</td>
                    </tr>
                     <tr>
                        <td>14</td>
                        <td>Lift Care Taker </td>
                        <td>2</td>
                        <td>100</td>
                    </tr>
                     <tr>
                        <td>15</td>
                        <td>Gas technicians</td>
                        <td>2</td>
                        <td>95</td>
                    </tr>
                     <tr>
                        <td>16</td>
                        <td>Gym Coach</td>
                        <td>1</td>
                        <td>100</td>
                    </tr>
                     <tr>
                        <td>17</td>
                        <td>Swimming Pool Coach</td>
                        <td>1</td>
                        <td>100</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

   
    @include('partials.footer')
@stop

