@extends('layouts.app')

@section('content')
   <!-- <h3 class="page-title">Categories</h3>-->
    
    {!! Form::model($category, ['method' => 'PUT', 'route' => ['repositorycat-types.update', $category->id]]) !!}

    <div class="panel panel-default respositroy-view">
        <div class="panel-heading repository-subfolder">
             Repository > <a href="/repository-types">All Folders</a> > <a href="/repositorycat_types/<?php echo $category->category;?>"><?php echo $cname;?></a>
             <p class="ptag">
                 <a href="/repositorycat_types/<?php echo $category->category;?>" class="btn btn-back-list">Back</a> 
             </p>
        </div> 

        <div class="panel-body impossinble-mission asset-category-type-page">
        
         
        <div class="class-ctration repository">
            <div class="row">
                <div class="col-xs-3 form-group">
                	<input type="hidden" name="category" value="<?php echo $category->category; ?>" />
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
            
            
            
			
			
            
      

    {!! Form::submit('Update', ['class' => 'btn btn-danger btn-save']) !!}
    {!! Form::close() !!}
    
      </div>
    </div>
    
     @include('partials.footer')
@stop

