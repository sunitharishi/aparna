@extends('layouts.app')

@section('content')
    <h3 class="page-title">Sites</h3>
    
    {!! Form::model($sites, ['method' => 'PUT', 'route' => ['sites.update', $sites->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            Edit
        </div> 

        <div class="panel-body sites-edit">
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('scode', 'Code', ['class' => 'control-label']) !!}
                    {!! Form::text('scode', old('scode'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('scode'))
                        <p class="help-block">
                            {{ $errors->first('scode') }}
                        </p>
                    @endif 
                </div> 
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div> 
            </div>
			 <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('flats_num', 'No.of Flats', ['class' => 'control-label']) !!}
                    {!! Form::text('flats_num', old('flats_num'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('flats_num'))
                        <p class="help-block">
                            {{ $errors->first('flats_num') }}
                        </p>
                    @endif
                </div> 
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('address', 'Address', ['class' => 'control-label']) !!}
                    {!! Form::text('address', old('address'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('address'))
                        <p class="help-block">
                            {{ $errors->first('address') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('assets_num', 'No.of Assets', ['class' => 'control-label']) !!}
                    {!! Form::text('assets_num', old('assets_num'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('assets_num'))
                        <p class="help-block">
                            {{ $errors->first('assets_num') }}
                        </p>
                    @endif
                </div>
            </div>
			 <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('blocks_num', 'No. of Blocks', ['class' => 'control-label']) !!}
                    {!! Form::text('blocks_num', old('blocks_num'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('blocks_num'))
                        <p class="help-block">
                            {{ $errors->first('blocks_num') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('logo', 'Logo', ['class' => 'control-label']) !!}
                    {!! Form::text('logo', old('logo'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('logo'))
                        <p class="help-block">
                            {{ $errors->first('logo') }}
                        </p>
                    @endif
                </div>
            </div>
           
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('total_site_area', 'Total Site Area', ['class' => 'control-label']) !!}
                    {!! Form::text('total_site_area', old('total_site_area'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('total_site_area'))
                        <p class="help-block">
                            {{ $errors->first('total_site_area') }}
                        </p>
                    @endif
                </div>
            </div>
	    <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('vendor_directory', 'Vendor Directory', ['class' => 'control-label']) !!}
                    {!! Form::text('vendor_directory', old('vendor_directory'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('vendor_directory'))
                        <p class="help-block">
                            {{ $errors->first('vendor_directory') }}
                        </p>
                    @endif
                </div>
            </div> 
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('built_up_area', 'Built Up Area', ['class' => 'control-label']) !!}
                    {!! Form::text('built_up_area', old('built_up_area'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('built_up_area'))
                        <p class="help-block">
                            {{ $errors->first('built_up_area') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('helipad_area', 'Helipad Area', ['class' => 'control-label']) !!}
                    {!! Form::text('helipad_area', old('helipad_area'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('helipad_area'))
                        <p class="help-block">
                            {{ $errors->first('helipad_area') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('apartments_num', 'No. Of Apartments', ['class' => 'control-label']) !!}
                    {!! Form::text('apartments_num', old('apartments_num'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('apartments_num'))
                        <p class="help-block">
                            {{ $errors->first('apartments_num') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('club_house', 'Club House', ['class' => 'control-label']) !!}
                    {!! Form::text('club_house', old('club_house'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('club_house'))
                        <p class="help-block">
                            {{ $errors->first('club_house') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('towers_num', 'Num Of Towers', ['class' => 'control-label']) !!}
                    {!! Form::text('towers_num', old('towers_num'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('towers_num'))
                        <p class="help-block">
                            {{ $errors->first('towers_num') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('bms_room', 'BMS Room', ['class' => 'control-label']) !!}
                    {!! Form::text('bms_room', old('bms_room'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('bms_room'))
                        <p class="help-block">
                            {{ $errors->first('bms_room') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('floors_num', 'No Of Floors', ['class' => 'control-label']) !!}
                    {!! Form::text('floors_num', old('floors_num'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('floors_num'))
                        <p class="help-block">
                            {{ $errors->first('floors_num') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('security_room', 'Security Room', ['class' => 'control-label']) !!}
                    {!! Form::text('security_room', old('security_room'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('security_room'))
                        <p class="help-block">
                            {{ $errors->first('security_room') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('color_codes', 'Color Codes', ['class' => 'control-label']) !!}
                    {!! Form::text('color_codes', old('color_codes'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('color_codes'))
                        <p class="help-block">
                            {{ $errors->first('color_codes') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('transformers', 'Transformers', ['class' => 'control-label']) !!}
                    {!! Form::text('transformers', old('transformers'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('transformers'))
                        <p class="help-block">
                            {{ $errors->first('transformers') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('tiles_identification', 'Tiles Identification', ['class' => 'control-label']) !!}
                    {!! Form::text('tiles_identification', old('tiles_identification'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('tiles_identification'))
                        <p class="help-block">
                            {{ $errors->first('tiles_identification') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('dgsets', 'DG sets', ['class' => 'control-label']) !!}
                    {!! Form::text('dgsets', old('dgsets'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('dgsets'))
                        <p class="help-block">
                            {{ $errors->first('dgsets') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('solar_power', 'Solar Power', ['class' => 'control-label']) !!}
                    {!! Form::text('solar_power', old('solar_power'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('solar_power'))
                        <p class="help-block">
                            {{ $errors->first('solar_power') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('exit_ramps', 'Exit Ramps', ['class' => 'control-label']) !!}
                    {!! Form::text('exit_ramps', old('exit_ramps'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('exit_ramps'))
                        <p class="help-block">
                            {{ $errors->first('exit_ramps') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('manjeera_water', 'Manjeera Water', ['class' => 'control-label']) !!}
                    {!! Form::text('manjeera_water', old('manjeera_water'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('manjeera_water'))
                        <p class="help-block">
                            {{ $errors->first('manjeera_water') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('mech_ventilation', 'Mechanical Ventilation', ['class' => 'control-label']) !!}
                    {!! Form::text('mech_ventilation', old('mech_ventilation'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('mech_ventilation'))
                        <p class="help-block">
                            {{ $errors->first('mech_ventilation') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('borewells', 'Borewells', ['class' => 'control-label']) !!}
                    {!! Form::text('borewells', old('borewells'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('borewells'))
                        <p class="help-block">
                            {{ $errors->first('borewells') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('oh_tanks', 'OH Tanks', ['class' => 'control-label']) !!}
                    {!! Form::text('oh_tanks', old('oh_tanks'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('oh_tanks'))
                        <p class="help-block">
                            {{ $errors->first('oh_tanks') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('wsp', 'WSP', ['class' => 'control-label']) !!}
                    {!! Form::text('wsp', old('wsp'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('wsp'))
                        <p class="help-block">
                            {{ $errors->first('wsp') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('rain_water_sumps', 'Rain Water Sumps', ['class' => 'control-label']) !!}
                    {!! Form::text('rain_water_sumps', old('rain_water_sumps'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('rain_water_sumps'))
                        <p class="help-block">
                            {{ $errors->first('rain_water_sumps') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('stp', 'STP', ['class' => 'control-label']) !!}
                    {!! Form::text('stp', old('stp'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('stp'))
                        <p class="help-block">
                            {{ $errors->first('stp') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('de_watering_sumps', 'De-Watering Sumps', ['class' => 'control-label']) !!}
                    {!! Form::text('de_watering_sumps', old('de_watering_sumps'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('de_watering_sumps'))
                        <p class="help-block">
                            {{ $errors->first('de_watering_sumps') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('gas_banks', 'Gas Banks', ['class' => 'control-label']) !!}
                    {!! Form::text('gas_banks', old('gas_banks'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('gas_banks'))
                        <p class="help-block">
                            {{ $errors->first('gas_banks') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('inigation_sumps', 'Inigation Sumps', ['class' => 'control-label']) !!}
                    {!! Form::text('inigation_sumps', old('inigation_sumps'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('inigation_sumps'))
                        <p class="help-block">
                            {{ $errors->first('inigation_sumps') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('fire_pump_rooms', 'Fire Pump Rooms', ['class' => 'control-label']) !!}
                    {!! Form::text('fire_pump_rooms', old('fire_pump_rooms'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('fire_pump_rooms'))
                        <p class="help-block">
                            {{ $errors->first('fire_pump_rooms') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('fire_sumps', 'Fire Sumps', ['class' => 'control-label']) !!}
                    {!! Form::text('fire_sumps', old('fire_sumps'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('fire_sumps'))
                        <p class="help-block">
                            {{ $errors->first('fire_sumps') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('lifts', 'Lifts', ['class' => 'control-label']) !!}
                    {!! Form::text('lifts', old('lifts'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('lifts'))
                        <p class="help-block">
                            {{ $errors->first('lifts') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('oozing_pits', 'Oozing Pits', ['class' => 'control-label']) !!}
                    {!! Form::text('oozing_pits', old('oozing_pits'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('oozing_pits'))
                        <p class="help-block">
                            {{ $errors->first('oozing_pits') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('solar_water_heaters', 'Solar Water Heaters', ['class' => 'control-label']) !!}
                    {!! Form::text('solar_water_heaters', old('solar_water_heaters'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('solar_water_heaters'))
                        <p class="help-block">
                            {{ $errors->first('solar_water_heaters') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('water_bodys', 'Water Bodys', ['class' => 'control-label']) !!}
                    {!! Form::text('water_bodys', old('water_bodys'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('water_bodys'))
                        <p class="help-block">
                            {{ $errors->first('water_bodys') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('prepaid_systems', 'Prepaid Systems', ['class' => 'control-label']) !!}
                    {!! Form::text('prepaid_systems', old('prepaid_systems'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('prepaid_systems'))
                        <p class="help-block">
                            {{ $errors->first('prepaid_systems') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('water_supply', 'Water Supply', ['class' => 'control-label']) !!}
                    {!! Form::text('water_supply', old('water_supply'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('water_supply'))
                        <p class="help-block">
                            {{ $errors->first('water_supply') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('entry_ramps', 'Entry Ramps', ['class' => 'control-label']) !!}
                    {!! Form::text('entry_ramps', old('entry_ramps'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('entry_ramps'))
                        <p class="help-block">
                            {{ $errors->first('entry_ramps') }}
                        </p>
                    @endif
                </div>
            </div>
		
            
        </div>
    </div>

    {!! Form::submit('Update', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

