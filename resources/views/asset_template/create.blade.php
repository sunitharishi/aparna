@extends('layouts.app')

@section('content')
<style>
hr
{
	margin:10px 0px;
	border-top:1px solid #e0e0e0 !important;
}
.assetstemplt-pg .sectionFields{padding-top:0px; padding-bottom:0px;}
.assetstemplt-pg .addfield{color:green; font-size:20px;}
.assetstemplt-pg .addfield i{font-size:20px;}
.assetstemplt-pg .deletefield{color:red; font-size:20px;}
.assetstemplt-pg .deletefield i{font-size:20px;}
.assetstemplt-pg .secarrow{color:red; font-size:20px;}
.assetstemplt-pg .secarrow i{font-size:20px;}
.assetstemplt-pg .foptions{display: none; margin-bottom:0px;}
.assetstemplt-pg .csetion{display: none;}
.assetstemplt-pg .FieldBoxes{display: none;}
.assetstemplt-pg .sectionedit{display: none;}
#sortable { list-style-type: none; margin: 0; padding: 0;  }
#sortable li { margin: 0 3px 3px 3px; padding: 0.4em; font-size: 1.4em; }
</style>
    <h3 class="page-title asser-template">Asset Templates</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['asset-templates.store'],'id'=>'frmTemplate']) !!}
    {!! Form::hidden('id', isset($template)?$template->id:0) !!}
    {!! Form::hidden('section_delete','',['id'=>'section_delete']) !!}
    {!! Form::hidden('field_delete','',['id'=>'field_delete']) !!}
    <div class="panel panel-default assetstemplt-pg poigletrt">
        <p class="help-block" id="frmerror"></p>
        <div class="panel-heading" style="margin-bottom:10px; font-size:20px;">
            @if(isset($template))
                Edit
            @else
                Create
            @endif
            
            <p class="ptag">
               <a href="{{ route('asset-templates.index') }}" class="btn btn-back-list">Back</a> 
            </p>
            
        </div>
    	<div>        
        <div class="panel-body" style="padding-top:0px; padding-bottom:0px;">
            <div class="row class-ctration avowis-a">
                <div class="col-sm-2 form-group tempalae">
                    {!! Form::label('code', 'Template Code*', ['class' => 'control-label']) !!}
                    {!! Form::text('template[code]', isset($template)?$template->code:'', ['class' => 'form-control erequired', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                </div> 
                <div class="col-sm-3 form-group templaeea-run">
                    {!! Form::label('name', 'Template Name*', ['class' => 'control-label']) !!}
                    {!! Form::text('template[name]', isset($template)?$template->name:'', ['class' => 'form-control erequired', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                </div>   
                <div class="col-sm-3 form-group aovdslera">
                	<label class="col-sm-12 col-xs-12">&nbsp;</label>
                    {!! Form::select('field_all_sections', $field_all_sections, '', ['class' => 'form-control hide','id'=>'field_all_sections','onchange'=>'field_change_section(this)']) !!}
                    <button type="button" class="btn btn-primary" onclick="Section_new()">New Section</button>
                </div>
            </div>     
        </div>
        </div>
        <div class="panel-body attendeesass">  
            <ul class="sectionFields bucket-sortinf" id="sortable">                      
            @if(isset($sections) && $sections)
                @foreach($sections as $si=>$sval)
                <li class="ui-state-default">
                    <fieldset class="fs{{ $si }}" data-value="{{ $si }}">
                        <legend><span>{{ $sval['head'] }}</span> 
                            <a onclick="field_add(this)" title="Add field" class="addfield"><i class="fa fa-plus-circle"></i></a> 
                            @if($si>0)
                            <a onclick="Section_edit(this)" title="Edit section" class="addfield"><i class="fa fa-pencil"></i></a>
                            <a onclick="Section_delete(this)" title="Delete section" class="deletefield"><i class="fa fa-close"></i></a>
                            @endif  
                            <a onclick="field_visibility(this)" title="Show/Hide section" class="secarrow"><i class="fbof fa fa-angle-down"></i></a> 
                        </legend>
                        @if($si>0)
                        <div class="sectionedit">
                            <div class="col-xs-6 form-group">
                                {!! Form::label('sectiontitle', 'Title*', ['class' => 'control-label']) !!}
                                {!! Form::text('section[title][]', $sval['head'], ['class' => 'form-control stitle', 'placeholder' => '','onchange'=>'sectiontitlechange(this)']) !!}
                                {!! Form::hidden('section[id][]', $si,['class'=>'sid']) !!}
                                {!! Form::hidden('section[sno][]', ($secCount++),['class'=>'ssno']) !!}
                                {!! Form::hidden('section[sort][]', $sval['order'],['class'=>'ssort']) !!}
                                <p class="help-block"></p>
                                <div class="hide esections"></div>
                            </div>
                            <div class="col-xs-4 form-group">
                                {!! Form::label('inputs_per_row', 'Number of inputs per row', ['class' => 'control-label']) !!}
                                {!! Form::select('section[inputs_per_row][]', $field_section_inputs,$sval['cols'], ['class' => 'form-control scols']) !!}
                                <p class="help-block"></p>
                            </div>
                        </div>
                        @endif
                        <div class="FieldBoxes">
                        @if($sval['fields']) 
                            @foreach($sval['fields'] as $fval)
                            <div class="row fieldbox">        
                                <div class="col-xs-12 files-measure">
                                    <div class="col-xs-3 form-group clabel">
                                        {!! Form::hidden('field[fid][]', $fval->id,['class'=>'efid']) !!}
                                        {!! Form::label('', 'Label*', ['class' => 'control-label']) !!}
                                        {!! Form::text('field[label][]', $fval->label, ['class' => 'form-control erequired', 'placeholder' => '']) !!}
                                        <p class="help-block"></p>
                                    </div>
                                    <div class="col-xs-2 form-group ctype">
                                        {!! Form::label('', 'Type', ['class' => 'control-label']) !!}
                                        {!! Form::select('field[itype][]', $field_types, $fval->itype, ['class' => 'form-control','onchange'=>'field_show_options(this)']) !!}
                                        <p class="help-block"></p>
                                        <div class="form-group csetion">
                                            {!! Form::label('', 'Section', ['class' => 'control-label']) !!}
                                            {!! Form::select('field[section_id][]', $field_sections, $fval->section_id, ['class' => 'form-control esection']) !!}
                                            <p class="help-block"></p>
                                        </div>  
                                    </div>                            
                                    <div class="col-xs-1 form-group crequired">
                                        {!! Form::label('', 'Required', ['class' => 'control-label']) !!}
                                        {!! Form::select('field[required][]', $field_required, $fval->required, ['class' => 'form-control']) !!}
                                        <p class="help-block"></p>
                                    </div>
                                    <div class="col-xs-2 form-group cinputvalid">
                                        {!! Form::label('', 'Input Validation', ['class' => 'control-label']) !!}
                                        {!! Form::select('field[ivalids][]', $field_valids, $fval->ivalids, ['class' => 'form-control']) !!}
                                        <p class="help-block"></p>
                                    </div>
                                    <div class="col-xs-1 form-group corder">
                                        {!! Form::label('', 'Order', ['class' => 'control-label']) !!}
                                        {!! Form::text('field[sort][]', $fval->sort, ['class' => 'form-control', 'placeholder' => '']) !!}
                                        <p class="help-block"></p>
                                    </div>
                                    <div class="col-xs-2 form-group cdefault">
                                        {!! Form::label('', 'Default', ['class' => 'control-label']) !!}
                                        {!! Form::text('field[idefault][]', $fval->idefault, ['class' => 'form-control', 'placeholder' => '']) !!}
                                        <p class="help-block"></p>
                                    </div>
                                    <div class="col-xs-1 form-group cclose">
                                        <a onclick="field_delete(this)" class="deletefield"><i class="fa fa-close"></i></a>
                                    </div>
                                     
                                </div>
                                <div class="col-xs-4 dynamically-adding-textarea">
                                    <div class="col-xs-12 form-group foptions" @if($fval->itype=='2' || $fval->itype=='3' || $fval->itype=='4') style="display:block;"@endif >
                                        {!! Form::label('', 'Options [ press enter key to seperate options ]', ['class' => 'control-label']) !!}
                                        {!! Form::textarea('field[ioptions][]', $fval->ioptions, ['class' => 'form-control foption', 'placeholder' => '','size' => '100x5']) !!}
                                        <p class="help-block"></p>
                                    </div>    
                                </div> 
                                <br clear="all" /><hr />              
                                
                            </div>    
                            @endforeach
                        @endif      
                        </div>
                               
                    </fieldset> 
                </li>               
                @endforeach
            @endif
            </ul>
        </div>
   
	<div style="float:right;">
        <span class="loader"></span>
    {!! Form::button('Submit', ['class' => 'btn btn-danger btn-submitt','onclick'=>'template_save()']) !!}
    <a href="{{ route('asset-templates.index') }}" class="btn aturl btn-cancell">Cancel</a>
    {!! Form::close() !!}
    </div>


<div class="hide section_clone">
    <li class="ui-state-default">
        <fieldset class="fsNNNN" data-value="SECTIONID">
            <legend><span>SECTIONLABEL</span> 
                <a onclick="field_add(this)" class="addfield"><i class="fa fa-plus-circle"></i></a> 
                <a onclick="Section_edit(this)" class="addfield"><i class="fa fa-pencil"></i></a> 
                <a onclick="Section_delete(this)" title="Delete section" class="deletefield"><i class="fa fa-close"></i></a>
                <a onclick="field_visibility(this)" class="secarrow"><i class="fbof fa fa-angle-down"></i></a> 
            </legend>
            <div class="sectionedit">
                <div class="col-xs-6 form-group">
                    {!! Form::label('sectiontitle', 'Title*', ['class' => 'control-label']) !!}
                    {!! Form::text('section[title][]', 'SECTIONLABEL', ['class' => 'form-control stitle', 'placeholder' => '','onchange'=>'sectiontitlechange(this)']) !!}
                    {!! Form::hidden('section[id][]', 0,['class'=>'sid']) !!}
                    {!! Form::hidden('section[sno][]', 'NNNN',['class'=>'ssno']) !!}
                    {!! Form::hidden('section[sort][]', 1,['class'=>'ssort']) !!}
                    <p class="help-block"></p>
                    <div class="hide esections"></div>
                </div>
                <div class="col-xs-4 form-group">
                    {!! Form::label('inputs_per_row', 'Number of inputs per row', ['class' => 'control-label']) !!}
                    {!! Form::select('section[inputs_per_row][]', $field_section_inputs,2, ['class' => 'form-control scols']) !!}
                    <p class="help-block"></p>
                </div>
            </div>
            <div class="FieldBoxes"></div>
        </fieldset>
    </li>
</div>    
<div class="hide field_clone">
    <div class="row fieldbox">        
        <div class="col-xs-12 asset-template-edit">
            <div class="col-xs-3 form-group clabel">
                {!! Form::hidden('field[fid][]', 0,['class'=>'efid']) !!}
                {!! Form::label('', 'Label*', ['class' => 'control-label']) !!}
                {!! Form::text('field[label][]', '', ['class' => 'form-control erequired', 'placeholder' => '']) !!}
                <p class="help-block"></p>
            </div>
            <div class="col-xs-2 form-group ctype">
                {!! Form::label('', 'Type', ['class' => 'control-label']) !!}
                {!! Form::select('field[itype][]', $field_types, '', ['class' => 'form-control','onchange'=>'field_show_options(this)']) !!}
                <p class="help-block"></p>
                <div class="form-group csetion">
                    {!! Form::label('', 'Section', ['class' => 'control-label']) !!}
                    {!! Form::select('field[section_id][]', $field_sections, '', ['class' => 'form-control esection']) !!}
                    <p class="help-block"></p>
                </div>  
            </div>            
            <div class="col-xs-1 form-group crequired">
                {!! Form::label('', 'Required', ['class' => 'control-label']) !!}
                {!! Form::select('field[required][]', $field_required, '', ['class' => 'form-control']) !!}
                <p class="help-block"></p>
            </div>
            <div class="col-xs-2 form-group cinputvalid">
                {!! Form::label('', 'Input Validation', ['class' => 'control-label']) !!}
                {!! Form::select('field[ivalids][]', $field_valids, '', ['class' => 'form-control']) !!}
                <p class="help-block"></p>
            </div>
            <div class="col-xs-1 form-group corder">
                {!! Form::label('', 'Order', ['class' => 'control-label']) !!}
                {!! Form::text('field[sort][]', '1', ['class' => 'form-control', 'placeholder' => '']) !!}
                <p class="help-block"></p>
            </div>
            <div class="col-xs-2 form-group cdefault">
                {!! Form::label('', 'Default', ['class' => 'control-label']) !!}
                {!! Form::text('field[idefault][]', '', ['class' => 'form-control', 'placeholder' => '']) !!}
                <p class="help-block"></p>
            </div>
            <div class="col-xs-1 form-group cclose">
                <a onclick="field_delete(this)" class="deletefield"><i class="fa fa-close"></i></a>
            </div>
             
        </div>
        <div class="col-xs-4 dynamically-adding-textarea">
            <div class="col-xs-12 form-group foptions">
                {!! Form::label('', 'Options [ press enter key to seperate options ]', ['class' => 'control-label']) !!}
                {!! Form::textarea('field[ioptions][]', '', ['class' => 'form-control foption', 'placeholder' => '','size' => '100x5']) !!}
                <p class="help-block"></p>
            </div>    
        </div> 
        <br clear="all" /><hr />              
        
    </div>
</div>

<div class="modal fade" id="sectionModal" 
     tabindex="-1" role="dialog" 
     aria-labelledby="favoritesModalLabel">
    <div class="modal-dialog tempcreat-popbox" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" 
              data-dismiss="modal" 
              aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" 
            id="favoritesModalLabel">Section</h4>
          </div>
          <div class="modal-body">
            {!! Form::open(['method' => 'POST', 'route' => ['asset-templates.savesection'],'id'=>'frmSection']) !!}
            <div class="row">
                <div class="col-xs-6 form-group">
                    {!! Form::label('title', 'Section Title*', ['class' => 'control-label']) !!}
                    {!! Form::text('title', '', ['class' => 'form-control', 'placeholder' => '']) !!}
                    {!! Form::hidden('scid', '0',['id'=>'scid']) !!}
                    {!! Form::hidden('secCount', '', array('id' => 'secCount')) !!}
                    {!! Form::hidden('secAction', 'save', array('id' => 'secAction')) !!}
                    <p class="help-block"></p>
                    <div class="hide esections"></div>
                </div>
                <div class="col-xs-4 form-group">
                    {!! Form::label('inputs_per_row', 'Number of inputs per row', ['class' => 'control-label']) !!}
                    {!! Form::select('inputs_per_row', $field_section_inputs, '', ['class' => 'form-control']) !!}
                    <p class="help-block"></p>
                </div>
                <div class="col-xs-2 form-group hide">
                    {!! Form::label('sort', 'Order', ['class' => 'control-label']) !!}
                    {!! Form::text('sort', '', ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                </div>
            </div> 
            {!! Form::close() !!}       
          </div>
          <div class="modal-footer">
            <button type="button" 
              class="btn btn-default" data-dismiss="modal" style="margin-right:10px;">Close</button>
              <span class="pull-right">
                  <button type="button" class="btn btn-primary secsave" onclick="field_save_section('save')">Save</button>
                  <button type="button" class="btn btn-danger secdelete" onclick="field_save_section('delete')">Delete</button>
             </span>
          </div>
        </div>
    </div>
</div>
 </div>
<script type="text/javascript">var sectionCount={{ $secCount }}</script>

@include('partials.footer')
@stop