@extends('layouts.app')

@section('content')
  
<div class="panel panel-default critical-manpower">
    <div class="row">
        <div class="mmrpower-heading amc-tracker">
        	<h3><span>AMC Tracker</span></h3>
        </div>
    </div>      
    <div class="row">
        <div class="mmrpower-manpower amc-table">
            <table width="" border="1">
                <thead>
                    <tr>
                        <th>S.NO</th>
                        <th>Equipment Details </th>
                        <th> Vendor Name </th>
                        <th>Type of AMC </th>
                        <th>Start Date </th>
                        <th> End Date </th>
                        <th>Status</th>
                    </tr>
                 </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>STP</td>
                        <td>Revolve Engineers</td>
                        <td>Non Comprehensive </td>
                        <td>1-Mar-18</td>
                        <td>28-Feb-19</td>
                        <td>AMC</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>WSP Hydro-Pneumatic system</td>
                        <td>Revolve Engineers</td>
                        <td>Non Comprehensive </td>
                        <td>1-Nov-17</td>
                        <td>31-Oct-19</td>
                        <td>AMC</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>DG Set's (2 sets)</td>
                        <td>Bhagya Nagar Diesel's</td>
                        <td>Comprehensive</td>
                        <td>4-Oct-16</td>
                        <td>4-Oct-18</td>
                        <td>Warranty</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Automatic Hydraulic Boom Barrier</td>
                        <td>V&S Technologies</td>
                        <td>Comprehensive</td>
                        <td>7-Aug-16</td>
                        <td>7-Aug-18</td>
                        <td>Warranty</td>
                    </tr>
                     <tr>
                        <td>5</td>
                        <td>CCTV</td>
                        <td>Protocol India Pvt.Ltd</td>
                        <td>Comprehensive</td>
                        <td>17-Oct-16</td>
                        <td>17-Oct-18</td>
                        <td>Warranty</td>
                    </tr>
                     <tr>
                        <td>6</td>
                        <td>Swimming Pool , Main Gate fountain,Fountain Near Sampoorna, GH podium fountain.</td>
                        <td>Living waters international Solutions</td>
                        <td>Comprehensive</td>
                        <td>1-Jun-17</td>
                        <td>30-Jun-18</td>
                        <td>AMC</td>
                    </tr>
                     <tr>
                        <td>7</td>
                        <td>E to L Block solar power system</td>
                        <td>Energy Exchange India Pvt Ltd</td>
                        <td>Comprehensive</td>
                        <td>15-Jun-16</td>
                        <td>15-Jun-21</td>
                        <td>Warranty</td>
                    </tr>
                     <tr>
                        <td>8</td>
                        <td>Club house VRV Units</td>
                        <td>Daikin Air Condition</td>
                        <td>Non Comprehensive </td>
                         <td>1-Mar-18</td>
                        <td>30-Jun-18</td>
                        <td>AMC</td>
                    </tr>
                     <tr>
                        <td>9</td>
                        <td>Solar Spring System (AB to K block)</td>
                        <td>VK Engineers</td>
                        <td>Non Comprehensive </td>
                         <td>10-Sep-16</td>
                        <td>10-Sep-18</td>
                        <td>Warranty</td>
                    </tr>
                     <tr>
                        <td>10</td>
                        <td>Solar Spring System (L to U block)</td>
                       <td>VK Engineers</td>
                        <td>Non Comprehensive </td>
                        <td>24-Sep-16</td>
                        <td>24-Sep-18</td>
                        <td>Warranty</td>
                    </tr>
               </tbody>
            </table>
        </div>
    </div>
</div>

   
    @include('partials.footer')
@stop

