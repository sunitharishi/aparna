<table class="table table-bordered table-striped communities-assetss incident-page {{ count($incidents) > 0 ? 'datatable' : '' }} dt-select">

                <thead class="head-color">

                    <tr>

                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>S.No</th>
                        <th>Date</th>
                         <th>ID.No</th>
                        <th>Community</th>
                        <th>Asset</th>
                        <th>Action</th>

                    </tr>

                </thead>
                <tbody id="incidents_sites">
                   @if (count($incidents) > 0)

                        @foreach ($incidents as $row)
                   <tr data-entry-id="{{ $row->id }}">
                     <td></td>
                     <td>{{ $sno++ }}</td>
                      <td>{{ date("d-m-Y h:i A",strtotime($row->idate)) }}</td>
                       <td>{{ $row->refid }}</td>
                     <td>{{ $row->sitename }}</td>
                      <td>{{ $row->comasset }}</td>
                    
                     
                      <td><a href="{{ route('incident.view',[$row->id]) }}" class="btn btn-xs btn-success">View</a>
                        <a href="{{ route('incident.edit',[$row->id]) }}" class="btn btn-xs btn-inverse">Edit</a>{!! Form::open(array(
                            

                'style' => 'display: inline-block;',

                'method' => 'DELETE',

                'onsubmit' => "return confirm('".trans("Are you sure?")."');",

                'route' => ['incident.delete', $row->id])) !!}

    {!! Form::submit('Delete', array('class' => 'btn btn-xs btn-danger')) !!}

    {!! Form::close() !!}
    					<a href="javascript:void(0);" onclick="printview(<?php echo $row->id;?>)" class="btn btn-xs btn-print">Print</a>
                        <a href="javascript:void(0);" onclick="pdfdownload(<?php echo $row->id;?>)" class="btn btn-xs btn-download">Download</a>
                      </td>
                    </tr>
                    @endforeach

                    @else

                        <tr>

                            <td colspan="7">No entries in table</td>

                        </tr>

                    @endif
                    

                </tbody>

            </table>