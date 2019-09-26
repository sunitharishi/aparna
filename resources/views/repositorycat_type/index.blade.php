@extends('layouts.app')

@section('content')
   <!-- <h3 class="page-title">Categories</h3>-->

   	 <style type="text/css">
   		.js-delete-selected
		{
			display:none;
		}
		.respositroy-view.repositorycat-type
		{
			width:80%;
		}
		.respositroy-view .panel-heading {
			font-size: 16px  !important;
			padding: 11px 15px 0px  !important;
		}
    </style>

    <div class="panel panel-default respositroy-view repositorycat-type">
        <div class="panel-heading repository-subfolderlist">
            Repository > <a href="/repository-types">All Folders</a> > <?php echo $cat_name; ?>
            
            <p class="ptag">
               <a href="/repositorycat_types/<?php echo $id; ?>/create" class="btn btn-new">Add</a>
            </p>
        </div>
        <div class="panel-body assets-category-type">
            <table class="table table-bordered table-striped hall-maekee {{ count($sfolders) > 0 ? 'datatable' : '' }}">
                <thead class="head-color">
                    <tr>
                        <th style="text-align:center;">S.No</th>
                        <th style="width:50%;">Subfolder Name</th>
                        <th>No.of Files</th>
                        <th>Action</th>
                    </tr>
                </thead>
                   
                <tbody>
                	 @if (count($sfolders) > 0)
                    	<?php $i=0; ?>
                       @foreach ($sfolders as $sfolder)
                        	<?php $i++; ?>
                            <tr data-entry-id="{{ $sfolder['id'] }}">
                                <td align="center" align="center" style="width:50px;"><?php echo $i; ?></td>
                                <td>{{ $sfolder['name'] }} <a href="/repositorycat_types/<?php echo $sfolder['id']; ?>"></a></td>
                                <td><a href="/repository/<?php echo $sfolder['cid']; ?>/<?php echo $sfolder['id']; ?>"><?php echo $sfolder['fcount']; ?></a></td>
                                <td style="width:100px; text-align:center;">
                                	<a href="{{ route('repositorycat-types.edit',[$sfolder['id']]) }}" class="btn btn-xs btn-inverse">Edit</a>
                                    @if(getlogperms('delete_task')){!! Form::open(array(
                                    'style' => 'display: inline-block;',
                                    'method' => 'DELETE', 
                                    'onsubmit' => "return confirm('".trans("Are you sure?")."');",
                                    'route' => ['repositorycat-types.destroy', $sfolder['id']])) !!}
                                    {{ Form::button('Delete', array('class' => 'btn btn-xs btn-danger btn-delste', 'type' => 'submit')) }}
                                    {!! Form::close() !!}@endif
                                </td> 
                            </tr>
                        @endforeach
                    @else
                        <tr>  
                            <td colspan="4">No entries in table</td>
                        </tr>
                    @endif
                </tbody> 
            </table>
        </div>
    </div>
     @include('partials.footer')
@stop
<!--@section('javascript')
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('repository-types.mass_destroy') }}';
    </script>
@endsection-->