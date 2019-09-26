
<table class="table-striped1 table dieselreport-table">
    <thead class="thead-dark head-color">
    	<tr>
             <th rowspan="2">S.NO</th>
        	 <th rowspan="2">DG NAME</th>
             <th rowspan="2">DG CAPACITY (KVA)</th>
        	 <th rowspan="2">LOCATION</th>
             <th colspan="2">CONSUMED DIESEL COST</th>
             <th>INR 72,300.00</th>
             <th rowspan="2">DIESEL CONSUMED (LTRS.)</th>
             <th colspan="2">RUNNING HOURS</th>
             <th rowspan="2">RUNNING HOURS</th>
             <th colspan="2">KWh HOURS</th>
             <th rowspan="2"> UNITS GENERATED (KWh)</th>
        </tr>
        <tr>
            <th>OPENING BALANCE</th>
            <th>DIESEL FILLED</th>
            <th>CLOSING BALANCE</th>
            <th>PRESENT READING</th>
            <th>PREVIOUS READING</th>
            <th>PRESENT READING</th>
            <th>PREVIOUS READING</th>
        </tr>
    </thead>
    <tbody>
       <tr>
       		<td>1</td>
            <td>C - DG1</td>
            <td>500</td>
            <td>C -BLOCK T/F YARD</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>363.1</td>
            <td>357.6</td>
            <td>5.5</td>
            <td>40004</td>
            <td>39113</td>
            <td>891</td>
       </tr>
       <tr>
       		<td>2</td>
            <td>C - DG2</td>
            <td>500</td>
            <td>C -BLOCK T/F YARD</td>
            <td></td>
            <td>400</td>
            <td></td>
            <td>400</td>
            <td>88.8</td>
            <td>83.6</td>
            <td>5.2</td>
            <td>5131</td>
            <td>4753</td>
            <td>378</td>
       </tr>
      <?php /*?>  @if (count($dieselreports) > 0)
        @foreach ($dieselreports as $sk => $client)
        <tr>
            <td>{{ $client->dgblock }}</td>
            <td>{{ $client->present_dg_runtm }}</td>
            <td>{{ $client->prev_dg_runtm }}</td>
            <td>{{ $client->dg_run_difference }}</td>
            <td>{{ $client->present_dg_units }}</td>
            <td>{{ $client->prev_dg_units }}</td>
            <td>{{ $client->dg_units_difference }}</td>
            <td>{{ $client->dg_diesel_op_con }}</td>
            <td>{{ $client->dg_diesel_clos_con }}</td>
            <td>{{ $client->dg_diesel_diff_con }}</td>
            <td>{{ $client->dg_diesel_diff_con }}</td>
        </tr>
        @endforeach
        @endif<?php */?>
    </tbody>
</table>