@extends('layouts.app')

@section('content')
   <!-- <h3 class="page-title">Categories</h3>-->

   <style type="text/css">
   		.actions
		{
			display:none;
		}
		
		
   </style>

    <div class="panel panel-default panelmar add-nnnewww respositroy-view">
        <div class="panel-heading repository-folderlist">
            Repository > List
             <p class="ptag">
              <a href="{{ route('repository-types.create') }}" class="btn btn-new">Add Folder</a>
            </p>
        </div>

        <div class="panel-body asset-type repository-table">
            <table class="table table-bordered table-striped hall-maekee {{ count($folders) > 0 ? 'datatable' : '' }} dt-select">
                <thead class="head-color">
                    <tr>
                    	<th>S.No</th>
                         <th style="width:50%;">Folder Name</th>
                        <th>No.of Sub Folders</th>
                        <th>No.of Files</th>
                        <th>Action</th>
                    </tr>
                </thead>
                  
                <tbody>
                    @if (count($folders) > 0)
                    	<?php $i=0; ?>
                       @foreach ($folders as $folder)
                        	<?php $i++; ?>
                            <tr data-entry-id="{{ $folder['id'] }}">
                                <td align="center" style="width:50px;"><?php echo $i; ?></td>
                                <td>{{ $folder['name'] }}</td>
                                <td><a href="/repositorycat_types/<?php echo $folder['id']; ?>"><?php echo $folder['scount']; ?></a></td>
                                <td><a href="/repository/<?php echo $folder['id']; ?>/0"><?php echo $folder['fcount']; ?></a></td>
                                <td style="width:100px; text-align:center;">
                                <a href="{{ route('repository-types.edit',[$folder['id']]) }}" class="btn btn-xs btn-inverse">Edit</a></td> 
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