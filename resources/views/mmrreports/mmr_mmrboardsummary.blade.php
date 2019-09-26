@extends('layouts.app')

@section('content')
  
<div class="panel panel-default critical-manpower">
    <div class="row">
        <div class="mmrpower-heading board-heading">
        	<h3><span>Board Call Summary</span></h3>
        </div>
    </div>      
    <div class="row">
        <div class="mmrpower-manpower boardsummary">
            <table width="" border="1">
                <thead>
                    <tr>
                    	<th colspan="10">Board Call Summary  </th>
                    </tr>
                    <tr>
                        <th rowspan="2">Nature Of Complaint </th>
                        <th colspan="3">March' 18</th>
                        <th colspan="3">April' 18 </th>
                        <th colspan="3">May' 18</th>
                    </tr>
                    <tr>
                    	<th>Received </th>
                        <th>Closed </th>
                        <th>Total Outstanding</th>
                        <th>Received </th>
                        <th>Closed </th>
                        <th>Total Outstanding</th>
                        <th>Received </th>
                        <th>Closed </th>
                        <th>Total Outstanding</th>
                    </tr>
                 </thead>
                <tbody>
                    <tr>
                        <td>Carpentry</td>
                        <td>106</td>
                        <td>104</td>
                        <td>6</td>
                        <td>106</td>
                        <td>104</td>
                        <td>6</td>
                        <td>106</td>
                        <td>104</td>
                        <td>6</td>
                    </tr>
                    <tr>
                        <td>Civil  </td>
                        <td>106</td>
                        <td>104</td>
                        <td>6</td>
                        <td>106</td>
                        <td>104</td>
                        <td>6</td>
                        <td>106</td>
                        <td>104</td>
                        <td>6</td>
                    </tr>
                    <tr>
                       <td>Electrical</td>
                        <td>106</td>
                        <td>104</td>
                        <td>6</td>
                        <td>106</td>
                        <td>104</td>
                        <td>6</td>
                        <td>106</td>
                        <td>104</td>
                        <td>6</td>
                    </tr>
                    <tr>
                        <td>Gas </td>
                        <td>106</td>
                        <td>104</td>
                        <td>6</td>
                        <td>106</td>
                        <td>104</td>
                        <td>6</td>
                        <td>106</td>
                        <td>104</td>
                        <td>6</td>
                    </tr>
                     <tr>
                        <td>Plumbing </td>
                        <td>106</td>
                        <td>104</td>
                        <td>6</td>
                        <td>106</td>
                        <td>104</td>
                        <td>6</td>
                        <td>106</td>
                        <td>104</td>
                        <td>6</td>
                    </tr>
                     <tr>
                       <td>Total</td>
                        <td>106</td>
                        <td>104</td>
                        <td>6</td>
                        <td>106</td>
                        <td>104</td>
                        <td>6</td>
                        <td>106</td>
                        <td>104</td>
                        <td>6</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

   
    @include('partials.footer')
@stop

