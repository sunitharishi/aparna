 
   <table class="table table-bordered foeeemmeme table-striped {{ count($assets) > 0 ? 'datatable' : '' }}" id="datatablesearch" >  
                <thead class="head-color">
                    <tr>
                       
                        <th>Title</th> 
					
                            @if(getlogperms('edit_task') || getlogperms('delete_task')) <th>&nbsp;</th>  @endif
                    </tr> 
                </thead>
                   
                <tbody id="">
                    @if (count($assets) > 0)
                        @foreach ($assets as $client)
                            <tr>
                              
                                 <td>@if(getlogperms('view_task'))<a href="{{ route('forums.show',[$client->id]) }}" class="btn btn-xs puirpose">{{ $client->title }}@endif</a></td>
								<!-- <td>{{ $client->frcode }}</td>
                                  
                                <td>{{ (isset($client->catgname)?$client->catgname:'') }}</td>-->
                                  @if(getlogperms('edit_task') || getlogperms('delete_task'))  <td> 
                                    <!--@if(getlogperms('view_task'))<a href="{{ route('forums.show',[$client->id]) }}" class="btn btn-xs btn-primary">View</a>@endif-->
                                    @if(getlogperms('edit_task'))<a href="{{ route('forums.edit',[$client->id]) }}" class="btn btn-xs btn-info">Edit</a>@endif
                                    @if(getlogperms('delete_task')){!! Form::open(array(
                                                'style' => 'display: inline-block;',
                                                'method' => 'DELETE', 
                                                'onsubmit' => "return confirm('".trans("Are you sure?")."');",
                                                'route' => ['forums.destroy', $client->id])) !!}
                                    {!! Form::submit('Delete', array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}@endif</td> @endif
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="11">No entries in table</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            
