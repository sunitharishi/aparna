 @if (count($jobcards) > 0)
    
            @foreach ($jobcards as $row)
       <tr data-entry-id="{{ $row->id }}">
         <td></td>
         <td>{{ $sno++ }}</td>
          <td><span class='hide'>{{ date("Ymd",strtotime($row->jdate)) }}</span>{{ date("d/m/Y",strtotime($row->jdate)) }}</td>
          <td>{{ $jbtypes[$row->jctype] }}</td>
          <td>{{ $row->sitename }}</td>
          <td>{{ $row->cname }}</td>
          <td>{{ $row->status }}</td>
          <td><span class='hide'>{{ date("Ymd",strtotime($row->updated_at)) }}</span>{{ date("d/m/Y",strtotime($row->updated_at)) }}</td>
          <td><a href="{{ route('jobcard.view',[$row->id]) }}" class="btn btn-xs btn-success">View</a>
            <a href="{{ route('jobcard.edit',[$row->id]) }}" class="btn btn-xs btn-inverse">Edit</a>{!! Form::open(array(
            'style' => 'display: inline-block;',
    
            'method' => 'DELETE',
    
            'onsubmit' => "return confirm('".trans("Are you sure?")."');",
    
            'route' => ['jobcard.delete', $row->id])) !!}
    
            {!! Form::submit('Delete', array('class' => 'btn btn-xs btn-danger')) !!}
        
            {!! Form::close() !!}
            <a href="javascript:void(0);" onclick="printview(<?php echo $row->id;?>)" class="btn btn-xs btn-print">Print</a>
            <a href="javascript:void(0);" onclick="pdfdownload(<?php echo $row->id;?>)" class="btn btn-xs btn-download">Download</a>
          </td>
        </tr>
        @endforeach
    
        @else
    
            <tr>
    
                <td colspan="9">No entries in table</td>
    
            </tr>
    
        @endif