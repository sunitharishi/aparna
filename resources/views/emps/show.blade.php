@extends('layouts.app')

@section('content')
   <!-- <h3 class="page-title">Employees</h3>-->
    
    <div class="panel panel-default respositroy-view">
        <div class="panel-heading">
            Employee
            <p class="importa-ptag">
             <a href="{{ route('emps.index') }}" class="btn btn-back-list">Back</a>
             </p>
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-12 employee-roles-views table-responsive">
                    <table class="table table-bordered table-striped tble-emolossoos">
					  <?php $sitenames_arr = explode(",",$emp->community);
					         $sitenaems_str ="";
					        foreach($sitenames_arr as $siteid){
							 if($sitenaems_str) $sitenaems_str .=",";
								  $sitenaems_str .=" ".get_sitename($siteid);
							}
							$catname = get_catname($emp->category);
							
							if($emp->gender == 0) $genderval = 'Male';
							if($emp->gender == 1) $genderval = 'Female';
							if($emp->maritalstatus == 0) $maritalval = 'Yes';
							if($emp->maritalstatus == 1) $maritalval = 'No';
							
					    ?>  
					
					 <tr><th>Name</th><td>{{ $emp->name }}</td><th>Code</th><td>{{ $emp->ecode }}</td></tr>
					 <tr><th>Site</th><td>{{ $sitenaems_str }}</td><th>Category</th><td>{{ $catname }}</td></tr>
					 <tr><th>Surname</th><td>{{ $emp->surname }}</td><th>Father / Husband Name</th><td>{{ $emp->refname }}</td></tr>
					 <tr><th>DOB</th><td>{{ ((int)$emp->dob?$emp->dob:'') }}</td><th>Age</th><td>{{ ($emp->age?$emp->age:'') }}</td></tr>
					 <tr><th>DOJ</th><td>{{ ((int)$emp->doj?$emp->doj:'') }}</td><th>Gender</th><td>{{ $genderval }}</td></tr>
					 <tr><th>Marital Status</th><td>{{ $maritalval }}</td><th>Spouse</th><td>{{ $emp->spouse }}</td></tr>					 
					 <tr><th>Phone</th><td>{{ $emp->phone }}</td><th>Phone 2</th><td>{{ $emp->alterphone }}</td></tr>
					 <tr><th>Home Phone</th><td>{{ $emp->homephone }}</td><th>Email</th><td>{{ $emp->email }}</td></tr>
					 <tr><th>Temporary Address</th><td>{{ $emp->temp_address }}</td><th>Permanent Address</th><td>{{ $emp->permanent_address }}</td></tr>
					 <tr><th>Aadhar Number</th><td>{{ $emp->aadhar_num }}</td><th>PF Number</th><td>{{ $emp->pf }}</td></tr>
					 <tr><th>UAN Number</th><td>{{ $emp->uan }}</td><th>ESI Number</th><td>{{ $emp->esi }}</td></tr>
					 <tr><th>Bank Name</th><td>{{ $emp->bank }}</td><th>Account No</th><td>{{ $emp->acno }}</td></tr>
					 <tr><th>Notes</th><td colspan="3">{{ $emp->other }}</td></tr>
                       
                    </table>
                </div>
            </div>
  
            <p>&nbsp;</p>

           
        </div>
    </div>
    @include('partials.footer')
@stop