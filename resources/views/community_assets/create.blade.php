@extends('layouts.app')

@section('content')
    <!--<h3 class="page-title">Community Assets</h3>-->
    {!! Form::open(['method' => 'POST', 'route' => ['commassets.store'],'id'=>'frmcommAsset','onsubmit'=>'return community_assets_save()']) !!}


  <div class="community-assets-create">
    <div class="panel panel-default smoonity-asstess ttel-parked">
        <p class="help-block" id="frmerror"></p>
        <div class="panel-heading">
            Community Assets
            <p class="ptag">
               <a href="{{ route('commassets.index') }}" class="btn green-back">Back</a>
            </p>
        </div>
        
        <div class="panel-body communities-assets-create">
            <div class="row class-ctration">
                <div class="col-sm-4 form-group cateresss catergrouies1">
                    {!! Form::label('site_id', 'Community', ['class' => 'control-label']) !!}
                    {!! Form::select('site_id', $communities, old('site_id'), ['class' => 'form-control select2mes erequired']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('site_id'))
                        <p class="help-block">
                            {{ $errors->first('site_id') }}
                        </p>
                    @endif
                </div>
                <div class="col-sm-4 form-group cateresss catergrouies1">
                    {!! Form::label('category_id', 'Category', ['class' => 'control-label']) !!}
                    {!! Form::select('category_id', $categories, old('category_id'), ['class' => 'form-control select2mes erequired','onchange'=>'getCatgAssets(this)']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('category_id'))
                        <p class="help-block">
                            {{ $errors->first('category_id') }}
                        </p>
                    @endif
                </div>
                <div class="col-sm-3 form-group catergrouies1 asset-selections" id="asset_id_box">
                    {!! Form::label('asset_id', 'Asset', ['class' => 'control-label']) !!} <br />
                    {!! Form::select('asset_id', $assets, '', ['class' => 'form-control select2mes erequired']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('asset_id'))
                        <p class="help-block">
                            {{ $errors->first('asset_id') }}
                        </p>
                    @endif
                </div>                
            </div>    
            <div class="row add-creosl">
                <div class="col-sm-12 adding-asset-code">
                    <span class="names-codessd">Adding  Asset <span style="color:#ce3b41;">Code</span> and <span style="color:#ce3b41;">Location</span> Individually <i class="fa fa-arrow-right" aria-hidden="true"></i>  </span> {!! Form::button('Add', ['class' => 'btn btn-new','onclick'=>'addAsset()']) !!}
                </div>
                <div class="col-sm-12 assetsList"></div>
            </div>        
        </div>
   
    <span class="loader"></span>
    <div class="btn-save1"> {!! Form::submit('Submit', ['class' => 'btn btn-danger btn-submitt']) !!}
    <a href="{{ route('commassets.index') }}" class="btn aturl btn-cancell">Cancel</a>
    {!! Form::close() !!}
    </div>
 </div>
 </div>
<div class="hide asset_clone">
    <div class="row assetbox spwecial-somethinet">
        <div class="col-sm-2 form-group">
            {!! Form::label('code', 'Code*', ['class' => 'control-label']) !!}
            {!! Form::text('asset[code][]', '', ['class' => 'form-control erequired', 'placeholder' => '']) !!}
            <p class="help-block"></p>
        </div>
        <div class="col-sm-3 form-group">
            {!! Form::label('name', 'Location*', ['class' => 'control-label']) !!}
            {!! Form::text('asset[name][]', '', ['class' => 'form-control erequired', 'placeholder' => '']) !!}
            <p class="help-block"></p>
        </div>
        <div class="col-sm-1 closebuton-clename">
            <a onclick="asset_delete(this)"><i class="fa fa-close"></i></a>
        </div>
    </div>
</div>
@include('partials.footer')

@stop

