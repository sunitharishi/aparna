@extends('layouts.app')

@section('content')
  
<div class="panel panel-default critical-manpower">
    <div class="col-sm-12">
        <div class="enginnering-heading">
        	<h3><span>Soft Services</span></h3>
        </div>
    </div>      
    <div class="row eservices-page">
       <div class="col-sm-6">
       		<div class="list-services tickimage1">
            	<ul>
                	<li>HK Critical  machinery</li>
                    <li>Board Call Summary</li>
                    <li>H/K Consumables</li>
                    <li>Pest Control </li>
                    <li>Gardening</li>
                    <li>Major Works Carried Out</li>
                </ul>
            </div>
       </div>
       <div class="col-sm-6">
       		<img src="../images/cleaning-tools.png"  />
       </div>
    </div>
</div>

   
    @include('partials.footer')
@stop

