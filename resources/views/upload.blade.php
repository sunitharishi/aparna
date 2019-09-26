

						{!! Form::open(['files' => 'true','route' => 'uploadexcel.saveuploadfile','role' => 'form', 'class'=>'form-inline upload-attendance-form']) !!}

						  <div class="form-group">

							<label class="sr-only" for="file">Upload File</label>

							<input type="file" name="file" id="file" class="btn btn-info" title="Select File">

						  </div>

						  <button type="submit" class="btn btn-default">Upload file</button>

						  <div class="help-block"><strong>Note!</strong> Only xls or xlsx file is allowed!! <a href="{!! URL::to('/sample.xlsx') !!}">Click here for Sample File.</a></div>

						{!! Form::close() !!}

		