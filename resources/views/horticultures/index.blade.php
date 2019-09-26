@extends('layouts.app')

@section('content')
   <!-- <h3 class="page-title">Sites</h3>-->

   
    <div class="panel panel-default panelmar tsas-crseations wordst-best">
        <div class="panel-heading japan-sheriya">
            Horticultures
        
         <p  class="addd-new-sitess">
        <a href="{{ route('horticultures.create') }}" class="btn btn-new">Add</a>
       </p>
     </div>

        <div class="panel-body communities-index-page">
            <div class="table-responsive community-index-table">
            <table class="table table-bordered table-striped sitess-vieew {{ count($horticultures) > 0 ? 'datatable' : '' }} dt-select">
                <thead class="head-color">
                    <tr>
                        <th style="text-align:center;width:20px;"><input type="checkbox" id="select-all" /></th>
                        <th style="width:200px;text-align:left;">Site Name</th>
						<th style="width:35px;text-align:left;">Block</th>
                        <th>Location</th>
						<th>Plant Name</th>						
                        <th>No Of Plants</th>					
                        <th>Soil Type</th>						
                        <th>Soil Depth</th>					
                        <th>Type</th>				
                        <th>Image</th>
                        <th>Action</th>
                    </tr> 
                </thead>
                
                <tbody>
                    @if (count($horticultures) > 0)
                        @foreach ($horticultures as $client)
                            <tr data-entry-id="<?php echo $client['id'] ?>">
                                <td></td>
                                <td><?php echo $client['sname'] ?></td>
								<td><?php echo $client['bname'] ?></td>
                                <td><?php echo $client['sub_location'] ?></td>
								<td><?php echo $client['plant_name'] ?></td> 								
                                <td><?php echo $client['no_plants'] ?></td> 
								<td><?php echo $client['soil_type'] ?></td> 
								<td><?php echo $client['soil_depth'] ?></td> 
								<td><?php echo $client['type'] ?></td> 
								<td>
								<?php if($client['block_image']!=""){ ?>
								<img src="/uploads/horticulture/<?php echo $client['block_image'] ?>"
								 class="img-responsive" style="max-width:150px; width:150px; height:150px;">
								 <?php } ?>
								</td> 
                                <td>
								<a href="http://testing.rreg.in/horticultures/<?php echo $client['id']; ?>/edit" class="btn btn-xs btn-inverse">Edit</a>
								<form method="POST" action="http://testing.rreg.in/horticultures/<?php echo $client['id']; ?>" accept-charset="UTF-8" style="display: inline-block;" onsubmit="return confirm('Are you sure?');"><input name="_method" type="hidden" value="DELETE"><input name="_token" type="hidden" value="To8rnMkvunOON3Lh28jEKJcfK9thXbqzH7xsexeR">
    <input class="btn btn-xs btn-danger" type="submit" value="Delete">
    </form>
								</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="11">No entries in table</td>
                        </tr>
                    @endif
                </tbody>
            </table>
           </div>
        </div>
    </div>
   @include('partials.footer')
@stop 

@section('javascript')
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('horticultures.mass_destroy') }}';
    </script>
@endsection