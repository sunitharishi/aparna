@extends('layouts.app')

@section('content')
    <!--<h3 class="page-title">Vendors</h3>-->
    
    <div class="panel panel-default respositroy-view irrgamechanger">
        <div class="panel-heading">
           Items
           <p class="ptag back-button">
            <a href="{{ route('items.index') }}" class="btn btn-back-list">Back</a>
            </p>
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-bordered table-striped table-dfalas">
                        <tr>
                           <th>Item Code</th>
                           <td>{{ $reowres->itemcode }}</td>
                           <th>Title</th>
                           <td>{{ $reowres->title }}</td>
                        </tr>
						<tr>
						  <?php if($reowres->typeofasset == 'asset') { ?><th>Asset</th><td>{{ $reowres->assetname }}</td>
                          <?php } ?><?php if($reowres->typeofasset == 'other') { ?><th>Other</th><td>{{ $reowres->other }}</td>
                          <?php } ?><th>Description</th><td>{{ $reowres->description }}</td>
                       </tr>
						 
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

           
        </div>
    </div>
    @include('partials.footer')
@stop 