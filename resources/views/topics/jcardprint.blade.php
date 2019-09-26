<style>
 body
 {
  font-family: "Open Sans", sans-serif;
 }
 .jobcard-views tbody tr td
 {
  vertical-align:top;
 }
 .jobcard-views tbody tr td:nth-of-type(1)
 {
  font-weight:bold;
 }
 .jobcard-views tbody tr td:nth-of-type(1) span
 {
  float:right;
 }
</style>
<div class="panel-body breakdown-car jobcard-view">
            <div class="row">
            <div class="jobcard-viewdiv">
            <table width="100%" class="jobcard-views">
                 <tbody>
                   <tr>
                   
                      <td>{!! Form::label('refid', 'ID', ['class' => 'control-label']) !!}<span>:</span></td>
                      <td> {{ $jobcard->refid }}</td>
                   </tr>
                   <tr>
                      <td>{!! Form::label('site_id', 'Community', ['class' => 'control-label']) !!}<span>:</span></td>
                      <td> {{ $sitename }}</td>
                   </tr>
                    <tr>
                      <td>{!! Form::label('site_id', 'Jobcard Type', ['class' => 'control-label']) !!}<span>:</span></td>
                      <td>{{ $jbtypes[$jobcard->jctype] }}</td>
                    </tr>
                    <tr>
                      <td> @if($jobcard->jctype==1) {!! Form::label('site_id', 'Breakdown ID', ['class' => 'control-label']) !!}  @elseif($jobcard->jctype==2) {!! Form::label('site_id', 'Incident ID', ['class' => 'control-label']) !!}@endif <span>:</span></td>
                      <td> @if($jobcard->jctype==1) @if($jbref){{ $jbref->refid }} {{ $jbref->title }}  @endif @elseif($jobcard->jctype==2)  @if($jbref){{ $jbref->refid }}@endif @endif</td>
                   </tr>
                    <tr>
                        <td> {!! Form::label('title', 'Category', ['class' => 'control-label']) !!}<span>:</span></td>
                      <td> {{ $catgname }}</td>
                    </tr>
                    <tr>
                       <td> {!! Form::label('title', 'Sub Category', ['class' => 'control-label']) !!}<span>:</span></td>
                      <td> {{ $Subcatname }}</td>
                   
                   </tr>
                    <tr>
                     <?php if( $jobcard->emp_type == '2') { ?>
                      <td>{!! Form::label('site_id', 'Vendor', ['class' => 'control-label']) !!}<span>:</span></td>
                      <td>{{ getvendorname($jobcard->vendor) }} --> {{ $jobcard->vendor_name }} </td>   <?php }?>
                    </tr>
                    <tr>  
                      <td>{!! Form::label('status', 'Status', ['class' => 'control-label']) !!}<span>:</span></td>
                      <td> {{ $jobcard->status }}</td>
                     
                   </tr>
                    <tr>
                       <td>{!! Form::label('title', 'Asset', ['class' => 'control-label']) !!}<span>:</span></td>
                      <td> {{ $comasset?$comasset->code.' - '.$comasset->name:'' }}</td>
                   </tr>
                   <tr>
                      <td>{!! Form::label('bdate', 'Updated', ['class' => 'control-label']) !!}<span>:</span></td>
                      <td>{{ date("d.m.Y h:i A",strtotime($jobcard->updated_at)) }}</td>
                   
                   </tr>
                   <?php if(isset($jobcard->image)) { if($jobcard->image) { ?>
                     <tr>
                       <td>{!! Form::label('title', 'Image', ['class' => 'control-label']) !!}<span>:</span></td>
                      
                      <td>   <img src="/<?php echo  $jobcard->image; ?>"> </td>
                   
                   </tr>
                   <?php } } ?>
                 
                 </tbody>
                 
              </table>
              </div>
                @if ($jobcardusers)
                <div class="col-sm-12 form-group emplouyee"> 
                    <div class="emplouee-aname">
                        {!! Form::label('bdate', 'Employee', ['class' => 'control-label']) !!}<br>
                         <?php $sitenameval = ""; ?>
                        @foreach($jobcardusers as $tuval)
                        <div class="employeemame"><?php if($sitenameval != $tuval->sitename) { ?><div class="employeemame"><b>{{ $tuval->sitename }}</b> :</div> <?php } ?> <a href="#">{{ $tuval->username }}</a></div>
                         <?php $sitenameval = $tuval->sitename; ?>
                        @endforeach
                    </div>
                </div>
                @endif

              </div> 
                <div class="row form-group fckrarr">
                  <div class="col-sm-12 work-activity">
                    {!! Form::label('work_activity', 'Work Activity', ['class' => 'control-label']) !!}<br>
                    {!! $jobcard->work_activity !!}
                   </div>
                </div> 
                            
                 
        </div>