@extends('layouts.app')

@section('content')
   <!-- <h3 class="page-title">Assets</h3>-->
    
    <div class="panel panel-default smoonity-asstess min-phone-height">
        <div class="panel-heading">
           Assets
           <p class="ptag">
              <a href="{{ route('assets.index') }}" class="btn green-back">Back</a>
           </p>
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-12">
                  <div class="asset-overview-showpage table-responsive">
                    <table class="table table-bordered table-striped alternaleee">
        					 <tr><th>Name</th><td>{{ $asset->name }}</td><th>Code</th><td>{{ $asset->acode }}</td></tr>
        					 <tr><th>Category</th><td>{{ $catgname }}</td><th>Template</th><td>{{ $templatename }}</td></tr>
                    </table>
                  </div>
                </div>
            </div>

            <p>&nbsp;</p>

           
        </div>
    </div>
    @include('partials.footer')

@stop