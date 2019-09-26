<style>
 body
 {
  font-family: "Open Sans", sans-serif;
 }
 .incidentview-table tbody tr td
 {
  vertical-align:top;
 }
 .incidentview-table tbody tr td:nth-of-type(1)
 {
  font-weight:bold;
 }
 .incidentview-table tbody tr td:nth-of-type(1) span
 {
  float:right;
 }
</style>
<div class="panel-body breakdown-car">
            <div class="row">
            <div class="incidentview-table1">
              <table width="100%" class="incidentview-table">
                <tbody>
                   <tr>
                      <td>{!! Form::label('refid', 'ID', ['class' => 'control-label']) !!}<span>:</span></td>
                      <td> {{ $incident->refid }}</td>
                    </tr>
                    <tr>
                      <td>{!! Form::label('site_id', 'Community', ['class' => 'control-label']) !!}<span>:</span></td>
                      <td>{{ $sitename }}</td>
                   </tr>
                   <tr>
                     <td>{!! Form::label('catg', 'Category', ['class' => 'control-label']) !!}<span>:</span></td>
                     <td> {{ $catgname }}</td>
                  </tr>
                  <tr>
                     <td>{!! Form::label('title', 'Asset', ['class' => 'control-label']) !!}<span>:</span></td>
                     <td> {{ $comasset?$comasset->code.' - '.$comasset->name:'' }}</td>
                   </tr>
                   <tr>
                     <td>{!! Form::label('idate', 'Date', ['class' => 'control-label']) !!}<span>:</span></td>
                     <td>{{ date("d.m.Y h:i A",strtotime($incident->idate)) }}</td>
                  </tr>
                  <tr>
                     <td>{!! Form::label('failure_reason', 'Failure Reason', ['class' => 'control-label']) !!}<span>:</span></td>
                     <td>{!! $incident->failure_reason !!}</td>
                   </tr>
                   <tr>
                     <td>{!! Form::label('required_spares', 'Required Spares', ['class' => 'control-label']) !!}<span>:</span></td>
                     <td>{!! $incident->required_spares !!}</td>
                   </tr>
                   <tr>
                     <td> {!! Form::label('process_work', 'Process of work', ['class' => 'control-label']) !!}<span>:</span></td>
                     <td> {!! $incident->process_work !!}</td>
                   </tr>
                </tbody>
              </table>
                @if ($attachments) 
                <div class="row">
                   <div class="col-sm-12">
                    {!! Form::label('action', 'Attachments', ['class' => 'control-label']) !!}<br>
                    <div>
                        @foreach($attachments as $taval)
                        <div class="image-files-path"><img src="{{ '/uploads/'.$taval->atype.'/'.$taval->file }}" width="54px"  /><a href="{{ '/uploads/'.$taval->atype.'/'.$taval->file }}" target="_blank">{{ $taval->title }}</a>
                        </div>
                        @endforeach
                    </div>
                    </div>
                </div>
                    @endif              
               </div>   
        </div>
    </div>