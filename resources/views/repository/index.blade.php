@extends('layouts.app')

@section('content')
    <!--<h3 class="page-title">Tasks</h3>-->
  
 	<style type="text/css">
		.respositroy-view.repository-firstpage
		{
			width:80%;
		}
		.respositroy-view .panel-heading {
			font-size: 16px  !important;
			padding: 11px 15px 0px  !important;
		}
   </style>
    <div class="panel panel-default panelmar  respositroy-view repository-firstpage">
        <div class="panel-heading">
            Repository > <a href="/repository-types">All Folders</a>  
			<?php if($cid) { ?> > <a href="/repositorycat_types/<?php echo $cid;?>"><?php echo $cat_name;  } ?></a> 
			<?php if($sid) { ?> > <?php echo $scat_name;  } ?>
            @if(getlogperms('add_task'))
            <p class="under-ptagh">
                <a href="/repository/<?php echo $cid; ?>/<?php echo $sid; ?>/create" class="btn btn-new">Add</a>
            </p>     
            @endif
        </div> 
          
        <div class="panel-body repositoryu-views table-responsive">
            <table id="dTableColSearch" class="table table-bordered table-striped ckient-serever  {{ count($data) > 0 ? 'dTableColSearch' : '' }}">  
                <thead class="head-color">
                    <tr>
                    	<th>S.No</th>
                        <th style="width:30%;">Title</th>
                        <th>Folder</th>
                        <th>Subfolder</th>                     
                        <th style="width:226px;">Action</th>
                    </tr>
                </thead><?php /*?>
                <thead>
                    <tr class="plachelolder">
                        <td><input type="text" placeholder="Search" data-index="1" /></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr> 
                </thead><?php */?>
                <tbody> 
                    @if (count($data) > 0)
                    	<?php $i=0; ?>
                        @foreach ($data as $client)
                        	<?php $i++; ?>
                            <tr data-entry-id="<?php echo $client['id']; ?>">
                                <td align="center" align="center" style="width:50px;"><?php echo $i; ?></td>
								<?php if($client['file']!="") { ?>
                                <td><a href="{{ $task_files_path.$client['file']}}" target="_blank" class="view-linkkk" ><?php echo $client['title']; ?></a></td>
								<?php } else { ?>
								<td><?php echo $client['title']; ?></a></td>
								<?php } ?>
                                <td><?php echo $client['cat_name']; ?></td>
                                <td><?php echo $client['scat_name']; ?></td>
                                <td class="show-efittt">
                                    @if(getlogperms('view_task'))<a href="{{ $task_files_path.$client['file']}}" class="btn btn-xs  btn-download" download>Download</a>@endif
                                    @if(getlogperms('edit_task'))<a href="{{ route('repository.edit',[$client['id']]) }}" class="btn btn-xs btn-inverse">Edit</a>@endif
                                   <?php /*?> @if(getlogperms('edit_task'))<a href="{{ route('repository.enable',[$client->id,$client->status]) }}" class="btn btn-xs  btn-disable">{{ ($client->status == 1 ?'Disable':'Enable') }} </a>@endif<?php */?>
                                    @if(getlogperms('delete_task')){!! Form::open(array(
                                    'style' => 'display: inline-block;',
                                    'method' => 'DELETE', 
                                    'onsubmit' => "return confirm('".trans("Are you sure?")."');",
                                    'route' => ['repository.destroy', $client['id']])) !!}
                                    {{ Form::button('Delete', array('class' => 'btn btn-xs btn-danger btn-delste', 'type' => 'submit')) }}
                                    {!! Form::close() !!}@endif
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5">No entries in table</td>
                        </tr>
                    @endif
                </tbody>
            </table>
 
 
            
        </div>
    </div>
   @include('partials.footer')
@stop 

@section('javascript')
  <!--  <script>
        window.route_mass_crud_entries_destroy = '{{ route('sites.mass_destroy') }}';
    </script>-->
@endsection