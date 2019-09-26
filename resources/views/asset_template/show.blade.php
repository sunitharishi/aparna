@extends('layouts.app')

@section('content')
   <!-- <h3 class="page-title">Template</h3>-->
    
    <div class="panel panel-default smoonity-asstess assets-template-viewpage">
        <div class="panel-heading">
            Template
            <span class="pull-right">
                <a href="{{ route('asset-templates.index') }}" class="btn btn-back-list">Back</a> 
            <a href="{{ route('asset-templates.edit',[$template->id]) }}" class="btn btn-inverse">Edit</a>
            </span>
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                   <div class="table-responsive">
                    <table class="table table-bordered table-striped busssyy-olor">
                        <tr><th>Template Name</th><td>{{ $template->name }}</td></tr>
                        <tr><th>Template Code</th><td>{{ $template->code }}</td></tr>
                    </table>
                   </div>
                </div>
            </div>
        </div>

        <div class="panel-heading">
            Form
        </div>

        <div class="panel-body">
           <div class="table-responsive">
            <table class="table table-bordered table-striped algebric-ecopreesin">
                <thead>
                    <tr style="background-color:#334454;color:#fff;">
                        <th>S.No</th>
                        <th>Label</th>
                        <th>Input Type</th>
                        <th>Required</th>
                        <th>Input Validation</th>
                        <th>Order</th>
                        <th>Default</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
            <?php 
            if($sections) {
                foreach($sections as $sv) {
                    $n=1;
            ?>
                @if($sv['head'])
                <tr>
                    <th colspan="7">{{ $sv['head'] }}</th>
                    <th>Cols: {{ $sv['cols'] }}</th>
                </tr>
                @endif                
                    
                @if($sv['fields']) 
                    @foreach($sv['fields'] as $fval)
                    <tr>
                        <td>{{ $n++ }}</td>
                        <td>{{ $fval->label }}</td>
                        <td>{{ $field_types[$fval->itype] }}</td>
                        <td>{{ $fval->required }}</td>
                        <td>{{ $field_valids[$fval->ivalids] }}</td>
                        <td>{{ $fval->sort }}</td>
                        <td>{{ $fval->idefault }}</td>
                        <td>{!! str_replace("\n","<br />",$fval->ioptions) !!}</td>
                    </tr>
                    @endforeach
                @endif                                        
                
            <?php 
                }
            }
            ?>
                </tbody>
            </table>
           </div>
        </div>
    </div>
    @include('partials.footer')  
@stop