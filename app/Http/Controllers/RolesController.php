<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRolesRequest;
use App\Http\Requests\UpdateRolesRequest;

class RolesController extends Controller
{
    public function __construct() {
        $this->middleware(function($request, $next) {
            if(\Auth::user()->role_id != 1){
                return abort(404);
            }
            return $next($request);
        });
    }
    /**
     * Display a listing of Role.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();

        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating new Role.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$relations = [
            'permissionsList' => \App\Permission::get(),
        ]; 
		  return view('roles.create', $relations);
    }

    /**
     * Store a newly created Role in storage.
     *
     * @param  \App\Http\Requests\StoreRolesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRolesRequest $request)
    {
       
		
		 $edata = $request->all();
      //  Reportvalidation::create($request->all());
	 
		//echo "<pre>"; print_r($edata); echo "</pre>"; exit;
		 
		 if(isset($edata['permisstatus'])){
		$per_status_arr = $edata['permisstatus'];
		 
		 $per_status_str = implode(",",$per_status_arr);
		 }
		 else {
		   $per_status_str = "";
		 }
		  
		 
		 $savearr = array('title' => $edata['title'], 'permisstatus' =>$per_status_str);
			
         // echo "<pre>"; print_r($savearr); echo "</pre>"; exit;
          Role::create($savearr);  
		  
        return redirect()->route('roles.index'); 
    }
 
    /**
     * Show the form for editing Role.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);
		$myRow = Role::where('id', $id)->first();
		//echo "<pre>"; print_r($myRow); echo "</pre>";
		
		
		$relations = [
            'permissionsList' => \App\Permission::get(),
			'role' =>  $role,
			'perstatus' => $myRow->permisstatus,
			
        ]; 
        return view('roles.edit', $relations);
		
		
		
    }

    /**
     * Update Role in storage.
     *
     * @param  \App\Http\Requests\UpdateRolesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRolesRequest $request, $id)
    {
	
		$edata = $request->all();
		//$per_status_arr = $edata['permisstatus'];
		 if(isset($edata['permisstatus'])){
		  $per_status_arr = $edata['permisstatus'];
		 
		 $per_status_str = implode(",",$per_status_arr);
		 }
		 else {
		   $per_status_str = "";
		 }
		  
		//$per_status_str = implode(",",$per_status_arr);
		$savearr = array('title' => $edata['title'], 'permisstatus' =>$per_status_str);
		
		$role = Role::findOrFail($id);
		// $role->update($request->all());
		$role->update($savearr);

        return redirect()->route('roles.index');
    }

    /** 
     * Display Role.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::findOrFail($id);

        return view('roles.show', compact('role'));
    }

    /**
     * Remove Role from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->route('roles.index');
    }

    /**
     * Delete all selected Role at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = Role::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
