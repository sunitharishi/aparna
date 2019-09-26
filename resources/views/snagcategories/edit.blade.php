@extends('layouts.app')

@section('content')
  <!--  <h3 class="page-title">Vendors</h3>-->
    
    {!! Form::model($vendors, ['files' => 'true','method' => 'PUT', 'route' => ['snagcategories.update', $vendors->id]]) !!}

    <div class="panel panel-default respositroy-view irresponibleees">
        <div class="panel-heading sub-menyheading">
            Snag Categories 
              <p class="ptag back-button">
            <a href="{{ route('snagcategories.index') }}" class="btn btn-back-list">Back</a>
            </p>
        </div>             
        <div class="panel-body items-creations items-edit class-ctration arrangememt">
         	<div class="row">  
                <div class="col-xs-12 form-group">
                    {!! Form::label('Category Name', 'Category Name', ['class' => 'control-label']) !!}
                    {!! Form::text('cattitle', old('cattitle'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('cattitle'))
                        <p class="help-block">
                            {{ $errors->first('cattitle') }}
                        </p>
                    @endif
                </div> 
            </div>
        </div>             
   
   <div class="update-button">
    {!! Form::submit('Update', ['class' => 'btn btn-danger btn-save']) !!}
   </div>
   
    </div>
    {!! Form::close() !!}
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

@include('partials.footer')
@stop

