<!--<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> -->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
<script src="{{ url('quickadmin/js') }}/bootstrap.min.js"></script>
<script src="{{ url('quickadmin/js') }}/main.js"></script>-->

<!--<script src="http://hrms.recurringbillingsystem.com/assets/js/jquery-1.11.3.min.js"></script>-->

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/fixedcolumns/3.2.4/js/dataTables.fixedColumns.min.js"></script>
<script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
<script src="{{ url('quickadmin/js') }}/bootstrap.min.js"></script>
<script src="{{ url('scripts/third/summernote') }}/summernote.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>  
<script src="{{ url('quickadmin/js') }}/jquery.uploadfile.min.js"></script>
<script src="{{ url('quickadmin/js') }}/select2.min.js"></script>
<script src="{{ url('quickadmin/js') }}/main.js"></script>

<script>
    window._token = '{{ csrf_token() }}';
    var AttachmentPostUrl = "{{ route('attachments.store') }}";
    var AttachmentDeleteUrl = "{{ route('attachments.delete') }}";
    $.ajaxSetup({
	  headers: {
	    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	  }
	});
    @if(isset($assetTemplateForm) && $assetTemplateForm) load_asset_template_form(); @endif
    @if(isset($fileuploadable) && $fileuploadable) load_file_uploader(fu_inputs); @endif
</script>
@yield('javascript')