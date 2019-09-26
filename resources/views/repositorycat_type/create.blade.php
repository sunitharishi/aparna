@extends('layouts.app')

@section('content')
   <!-- <h3 class="page-title">Categories</h3>-->
    {!! Form::open(['method' => 'POST', 'route' => ['repositorycat-types.store']]) !!}

    <div class="panel panel-default respositroy-view maalajljd">
        <div class="panel-heading repository-subfolder">
           Repository > <?php echo $cname; ?>
            <p class="ptag">
             <a href="/repositorycat_types/<?php echo $cid; ?>" class="btn btn-back-list">Back</a> 
           </p>
        </div> 
        
        <div class="panel-body impossinble-mission">
        
         
        <div class="class-ctration repository">
              <div class="row">
              		<input type="hidden"  name="category" value="<?php echo $cid; ?>"/>
                    <div class="col-xs-3 form-group">
                        {!! Form::label('name', 'Subfolder Name', ['class' => 'control-label']) !!}
                        {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('name'))
                            <p class="help-block">
                                {{ $errors->first('name') }}
                            </p>
                        @endif
                    </div>
                </div>
            
            </div>

    {!! Form::submit('Submit', ['class' => 'btn btn-danger btn-save']) !!}
    {!! Form::close() !!}
    
      </div>
    </div>
    
    @include('partials.footer')
@stop

