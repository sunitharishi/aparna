@extends('layouts.app')

@section('content')
    <h3 class="page-title">Sites</h3>
    
    <div class="panel panel-default">
        <div class="panel-heading">
            View
        </div>
        
      <div class="panel-body sites-view">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-bordered table-striped">
                        <tr><th>Name</th><td>{{ $site->name }}</td><th>Code</th><td>{{ $site->scode }}</td></tr> 
						<tr></tr>
						<tr><th>No.of Flats</th><td>{{ $site->flats_num }}</td><th>Address</th><td>{{ $site->address }}</td></tr>
						<tr></tr>
						<tr><th>No.of Assets</th><td>{{ $site->assets_num }}</td><th>No. of Blocks</th><td>{{ $site->blocks_num }}</td></tr>
						<tr></tr>
						<tr><th>Total Site Area</th><td>{{ $site->total_site_area }}</td><th>Vendor Directory</th><td>{{ $site->vendor_directory }}</td></tr>
					    <tr></tr>
						<tr><th>Built Up Area</th><td>{{ $site->built_up_area }}</td><th>Helipad Area</th><td>{{ $site->helipad_area }}</td></tr>
						<tr></tr>
						<tr><th>No. Of Apartments</th><td>{{ $site->apartments_num }}</td><th>Club House</th><td>{{ $site->club_house }}</td></tr>
						<tr></tr>
						<tr><th>Num Of Towers</th><td>{{ $site->towers_num }}</td><th>BMS Room</th><td>{{ $site->bms_room }}</td></tr>
						<tr></tr>
						<tr><th>No Of Floors</th><td>{{ $site->floors_num }}</td><th>Security Room</th><td>{{ $site->security_room }}</td></tr>
						<tr></tr>
						<tr><th>Color Codes</th><td>{{ $site->color_codes }}</td><th>Transformers</th><td>{{ $site->transformers }}</td></tr>
						<tr></tr>
						<tr><th>Tiles Identification</th><td>{{ $site->tiles_identification }}</td><th>DG sets</th><td>{{ $site->dgsets }}</td></tr>
						<tr></tr>
						<tr><th>Solar Power</th><td>{{ $site->solar_power }}</td><th>Exit Ramps</th><td>{{ $site->exit_ramps }}</td></tr>
						<tr></tr>
						<tr><th>Manjeera Water</th><td>{{ $site->manjeera_water }}</td><th>Mechanical Ventilation</th><td>{{ $site->mech_ventilation }}</td></tr>
						<tr></tr>
						<tr><th>Borewells</th><td>{{ $site->borewells }}</td><th>OH Tanks</th><td>{{ $site->oh_tanks }}</td></tr>
						<tr></tr>
						<tr><th>Rain Water Sumps</th><td>{{ $site->rain_water_sumps }}</td><th>STP</th><td>{{ $site->stp }}</td></tr>
						<tr></tr>
						<tr><th>De-Watering Sumps</th><td>{{ $site->de_watering_sumps }}</td><th>Gas Banks</th><td>{{ $site->gas_banks }}</td></tr>
						<tr></tr>
						<tr><th>Inigation Sumps</th><td>{{ $site->inigation_sumps }}</td><th>Fire Pump Rooms</th><td>{{ $site->fire_pump_rooms }}</td></tr>
						<tr></tr>
						<tr><th>Fire Sumps</th><td>{{ $site->fire_sumps }}</td><th>Lifts</th><td>{{ $site->lifts }}</td></tr>
						<tr></tr>
						<tr><th>Oozing Pits</th><td>{{ $site->oozing_pits }}</td><th>Solar Water Heaters</th><td>{{ $site->solar_water_heaters }}</td></tr>
						<tr></tr>
						<tr><th>Water Bodys</th><td>{{ $site->water_bodys }}</td><th> Prepaid Systems</th><td>{{ $site->prepaid_systems }}</td></tr>
						<tr></tr>
						<tr><th> Water Supply</th><td>{{ $site->water_supply }}</td><th>Entry Ramps</th><td>{{ $site->entry_ramps }}</td></tr>
						<tr></tr>
					
					
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

          <a href="{{ route('sites.index') }}" class="btn btn-default">Back to list</a>        </div>
    </div>
@stop