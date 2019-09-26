@extends('layouts.app')

@section('content')
    <!--<h3 class="page-title">Vendors</h3>-->
    
    <div class="panel panel-default respositroy-view irrgamechanger min-phone-height">
        <div class="panel-heading">
           Items
           <p class="ptag back-button">
            <a href="{{ route('items.index') }}" class="btn btn-back-list">Back</a>
            </p>
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-12 items-viewpage">
                    <table class="table table-bordered table-striped table-dfalas">
                    
                     <tr>
                           <th>Category</th>
                           <td>{{ $reowres->asstypename }}</td>
                           <th>Sub Category</th>
                           <td>{{ $reowres->asstcatypename }}</td>
                        </tr>
                        <tr>
                           <th>Code</th>
                           <td>{{ $reowres->itemcode }}</td>
                           <th>Name</th>
                           <td>{{ $reowres->itemname }}</td>
                        </tr>
                         <tr>
                            <th>UOM</th>
                           <td>{{ $reowres->uom }}</td>
                           <th>Browse</th>
                           <td><?php if(isset($reowres['browse'])) { ?> <a href="/<?php echo $reowres['browse']; ?>" target="_blank">View</a> <?php } ?></td>
                        </tr>
                         <tr>
                           <th>Description</th>
                           <td colspan="3">{{ $reowres->description }}</td>
                          
                        </tr>
                        
                        
						
						  
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

           
        </div>
    </div>
    @include('partials.footer')
@stop 