<style>
 body
 {
  font-family: "Open Sans", sans-serif;
 }
 .breakdown-table tbody tr td
 {
  vertical-align:top;
 }
 .breakdown-table tbody tr td:nth-of-type(1)
 {
  font-weight:bold;
 }
 .breakdown-table tbody tr td:nth-of-type(1) span
 {
  float:right;
 }
</style>
<div class="panel-body breakdown-car">
            <div class="row breakdown-viewtable">
             
              <table width="100%" class="breakdown-table">
                 <tbody>
                   <tr>
                      <td>{!! Form::label('refid', 'ID', ['class' => 'control-label']) !!}<span>:</span></td>
                      <td>{{ $breakdown->refid }}</td>
                   </tr>
                   <tr>
                      <td> {!! Form::label('site_id', 'Community', ['class' => 'control-label']) !!}<span>:</span></td>
                      <td> {{ $sitename }}</td>
                   </tr>
                   <tr>
                      <td> {!! Form::label('catg', 'Category', ['class' => 'control-label']) !!}<span>:</span></td>
                      <td> {{ $catgname }}</td>
                   </tr>
                   <tr>
                      <td>{!! Form::label('title', 'Asset', ['class' => 'control-label']) !!}<span>:</span></td>
                      <td> {{ $comasset?$comasset->code.' - '.$comasset->name:'' }}</td>
                   </tr>
                   <tr>
                      <td>{!! Form::label('title', 'Title', ['class' => 'control-label']) !!}<span>:</span></td>
                      <td> {{ $breakdown->title }}</td>
                  </tr>
                  <tr>
                      <td> {!! Form::label('bdate', 'Date', ['class' => 'control-label']) !!}<span>:</span></td>
                      <td>{{ date("d.m.Y h:i A",strtotime($breakdown->bdate)) }}</td>
                   </tr>
                   <tr>
                      <td>{!! Form::label('info', 'Description', ['class' => 'control-label']) !!}<span>:</span></td>
                      <td colspan="3"> {!! $breakdown->info !!}</td>
                   </tr>
                   <tr>
                      <td>{!! Form::label('action', 'Action to be taken', ['class' => 'control-label']) !!}<span>:</span></td>
                      <td colspan="3"> {!! $breakdown->action !!}</td>
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