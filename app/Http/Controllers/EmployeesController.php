<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Site;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEmployeesRequest;
use App\Http\Requests\UpdateEmployeesRequest;

class EmployeesController extends Controller
{

    /** 
     * Display a listing of Client.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()  
    { 
        $employees = Employee::all();
		
		$sites = Site::all(); 
		
		print_r($employees); exit;    
 
        return view('employees.index', compact('employees'));
    } 

    /**
     * Show the form for creating new Client. 
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $relations = [
            'client_statuses' => \App\ClientStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
			'cat_names' => \App\Category::get()->pluck('name', 'id')->prepend('Please select', ''),
			'sites_names' => \App\Sites::get(),
        ];

        return view('employees.create', $relations);
    }
 
    /** 
     * Store a newly created Client in storage.
     *
     * @param  \App\Http\Requests\StoreClientsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeesRequest $request)
    {
	    
        //Employee::create($request->all());
		
		$edata = $request->all();
	//	echo "<pre>"; print_r($edata); echo "</pre>"; exit;
		
		 
		if(isset($edata['community'])){
		$per_status_arr = $edata['community'];
		 
		 $per_status_str = implode(",",$per_status_arr);
		 }
		 else {
		   $per_status_str = "";
		 }
		  
		 
		 $savearr = array('ecode' => $edata['ecode'], 'community' =>$per_status_str,'category' =>$edata['category'],'name' =>$edata['name'],'surname' =>$edata['surname'],'age' =>$edata['age'],'maritalstatus' =>$edata['maritalstatus'],'gender' =>$edata['gender'],'refname' =>$edata['refname'],'aadhar_num' =>$edata['aadhar_num'],'phone' =>$edata['phone'],'alterphone' =>$edata['alterphone'],'homephone' =>$edata['homephone'],'email' =>$edata['email'],'temp_address' =>$edata['temp_address'],'permanent_address' =>$edata['permanent_address'],'other' =>$edata['other']); 
			 
         // echo "<pre>"; print_r($savearr); echo "</pre>"; exit;
          Employee::create($savearr);  

        return redirect()->route('employees.index'); 
    }

    /**
     * Show the form for editing Client.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $relations = [
            'client_statuses' => \App\ClientStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
        ];

        $employees = Employee::findOrFail($id);

        return view('employees.edit', compact('employees') + $relations);
    }

    /**
     * Update Client in storage.
     *
     * @param  \App\Http\Requests\UpdateClientsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeesRequest $request, $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->update($request->all());
        return redirect()->route('employees.index');
    }

    /**
     * Display Client.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $relations = [
            'client_statuses' => \App\ClientStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
        ];

        $site = Employee::findOrFail($id);

        return view('employees.show', compact('site') + $relations);
    }

    /**
     * Remove Client from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('employees.index');
    }

    /**
     * Delete all selected Client at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = Employee::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
