@extends('layouts.app')

@section('content')
  
    <div class="panel panel-default critical-manpower">
        <div class="row">
        	<div class="enginnering-heading power-heading">
           		<h3><span>Power Consumption</span></h3>
           </div>
        </div>      
        <div class="row">
          <div id="container" class="power-linechart" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
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
                            	<td><hr  style="border-top:5px solid #ccc;"/> EB Power consumption</td>
                                <td>434444</td>
                                <td>480358</td>
                                <td>573958</td>
                            </tr>
                            <tr>
                            	<td><hr style="border-top:5px solid #585353;" /> Solar power Generated</td>
                                <td>7841</td>
                                <td>10531</td>
                                <td>10722</td>
                            </tr>
                            <tr>
                            	<td><hr style="border-top:5px solid #e0d5d5;" /> DG power Generated</td>
                                <td>7403</td>
                                <td>8764</td>
                                <td>8146</td>
                            </tr>
                        </tbody>
                    </thead>
                </table>
            </div>
        </div>
    </div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.js"></script>
<script src="https://momentjs.com/downloads/moment.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>

<script>
$(function () {
  $('#container').highcharts({
    title: {
      text: 'Everything seems fine',
    },
    xAxis: {
      type: 'datetime'
	 
    },
    series: [{
      name: 'A fine series',
      data: [
        [moment('2014-01-01').valueOf(), 200000],
        [moment('2014-02-01').valueOf(), 6.9],
        [moment('2014-03-01').valueOf(), 9.5]
      ]
    },{
      name: 'A fine series2',
      data: [
        [moment('2014-01-01').valueOf(), 4.0],
        [moment('2014-02-01').valueOf(), 200000],
        [moment('2014-03-01').valueOf(), 8.5]
      ]
    },{
      name: 'A fine series4',
      data: [
        [moment('2014-01-01').valueOf(), 6.0],
        [moment('2014-02-01').valueOf(), 2.9],
        [moment('2014-03-01').valueOf(), 200000]
      ]
    }]
  });
});
</script>
    @include('partials.footer')
@stop

