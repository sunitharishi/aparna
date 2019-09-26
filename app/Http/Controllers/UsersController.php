<?php

namespace App\Http\Controllers;

use App\User;
use DB;
use Excel;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUsersRequest;
use App\Http\Requests\UpdateUsersRequest;

class UsersController extends Controller
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
     * Display a listing of User.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		//$users = User::where('id','!=',1)->get();
		$users = User::get();
			//echo '<pre>'; print_r($users); echo '</pre>';
			$perarray = array();
			$lstatus = array();
			if(count($users) > 0){
			   foreach($users as $user){
			      $user_id = $user->id;
				   //$perdate = date("Y-m-d");
			        $dailypermission_cn = \App\Dailylockpermission::where('user_id','=',$user_id)->count();
					if($dailypermission_cn > 0){
					  $dailypermission_res = \App\Dailylockpermission::where('user_id','=',$user_id)->first();
					  $perarray[$user->id] =  $user->id;
					  $lstatus[$user->id]['lockstatus'] = $dailypermission_res->lockstatus;
					}
					else{ 
					  $perarray[$user->id] = 0;
					}
				}
			}
 		//echo '<pre>'; print_r($perarray); echo '</pre>';
        return view('users.index', compact('users','perarray','lstatus'));
    }   
 
    /**
     * Show the form for creating new User.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	
		$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
		$uri_segments = explode('/', $uri_path);
		 $emailerror = "";
		//print_r($uri_segments);
		//$data = array();
		$emailval ="";
		$empnameval = "";
		if(isset($uri_segments[3])){
		if($uri_segments[3] > 0) {
		
			$data = \DB::table("emps")
       ->whereRaw("find_in_set($uri_segments[3],community)")
       ->get()->pluck('name', 'id')->prepend('Please select', '');
	   
	   $emailval = getempemail($uri_segments[4]);
	   $empnameval = getempname($uri_segments[4]);
	   
	   
	   $relations = [
            'roles' => \App\Role::get()->pluck('title', 'id')->prepend('Please select', ''),
			'cat_names' => \App\Category::get()->pluck('name', 'id')->prepend('Please select', ''),
			'sites_names' => \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', ''),
			'emp_names' => $data,
			'emailv' => $emailval,
			'empname' => $empnameval,
			'emailerror' => $emailerror,
			
        ]; 
	   
		return view('users.create', $relations);
		}
		}
		
	/*	$data = \DB::table("emps")
       ->whereRaw("find_in_set($uri_segments[2],community)")
       ->get()->pluck('name', 'id')->prepend('Please select', ''); */
		
		if($uri_segments[2] > 0) {
		
		$data = \DB::table("emps")
       ->whereRaw("find_in_set($uri_segments[2],community)")
       ->get()->pluck('name', 'id')->prepend('Please select', '');
	   
	 /*  $query = DB::table("emps")
         ->whereRaw("FIND_IN_SET($uri_segments[2],community)", [$colname])
         ->get(); */
	   
	  /* echo "<pre>"; print_r($data); echo "</pre>"; 
	   
	   $rl= \App\Role::get()->pluck('title', 'id')->prepend('Please select', '');
	   
	    echo "<pre>"; print_r($rl); echo "</pre>"; exit;  */
	   }  
		
		if($uri_segments[2] > 0) {
		
		 $relations = [
            'roles' => \App\Role::get()->pluck('title', 'id')->prepend('Please select', ''),
			'cat_names' => \App\Category::get()->pluck('name', 'id')->prepend('Please select', ''),
			'sites_names' => \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', ''),
			'emp_names' => $data,
			'emailv' => $emailval,
			'empname' => $empnameval,
			'emailerror' => $emailerror,
        ];
		  
		}else{
	
        $relations = [
            'roles' => \App\Role::get()->pluck('title', 'id')->prepend('Please select', ''),
			'cat_names' => \App\Category::get()->pluck('name', 'id')->prepend('Please select', ''),
			'sites_names' => \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', ''),
			'emp_names' => array("" =>'Please Select'),
			'emailv' => $emailval,
			'empname' => $empnameval,
			'emailerror' => $emailerror,
        ];
		}
 
        return view('users.create', $relations);
    }
	
	 public function getcommunity()

    {
		 $relations = [
            'client_statuses' => \App\ClientStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
			'cat_names' => \App\Category::get()->pluck('name', 'id')->prepend('Please select', ''),
			'sites_names' => \App\Sites::where('status', '=', '1')->get(),
			
        ];

        return view('users.create', $relations);

    }
	
	
    /**
     * Store a newly created User in storage.
     *
     * @param  \App\Http\Requests\StoreUsersRequest  $request 
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsersRequest $request)
    {
	  $edata = $request->all();
	  $emailerror = "";
	  	$emailval ="";
		$empnameval = "";
	  
			 $rescoun = User::
			where('email', '=', $edata['email'])
			->whereNull('deleted_at')->count();
			/*echo $rescoun = User::
			where('email', '=', $edata['email'])->count();	 
			     */    
				/* $rescounva = User::
			where('email', '=', $edata['email'])->first();
			echo "<pre>"; print_r($rescounva); echo "</pre>"; exit;
			echo    $rescoun; */
			
	
		 if($rescoun > 0){
		   
		   $emailerror = "Email address already exists";
		   	$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
		$uri_segments = explode('/', $uri_path);
		//print_r($uri_segments);
		//$data = array();
		
	   
	   
	   $relations = [
           'roles' => \App\Role::get()->pluck('title', 'id')->prepend('Please select', ''),
			'cat_names' => \App\Category::get()->pluck('name', 'id')->prepend('Please select', ''),
			'sites_names' => \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', ''),
			'emp_names' => array("" =>'Please Select'),
			'emailv' => $emailval,
			'empname' => $empnameval,
			'emailerror' => $emailerror,
			
        ]; 
	   
	
		

 
        return view('users.create', $relations);
		 }
		
		
			
	    else   {       
        User::create($request->all());

        return redirect()->route('users.index');
		}
    }

    /**
     * Show the form for editing User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	
	   	$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
		$uri_segments = explode('/', $uri_path);
		$commu = "";
		 $user = User::findOrFail($id);
		 $commu = get_sitename($user['community']);
		
		   $relations = [
            'roles' => \App\Role::get()->pluck('title', 'id')->prepend('Please select', ''),
			'cat_names' => \App\Category::get()->pluck('name', 'id')->prepend('Please select', ''),
			'empcommunity' => $commu,
			
        ];
		
		
 // echo "<pre>"; print_r($user);echo "</pre>"; exit;
        return view('users.edit', compact('user') + $relations);
    }  

    /**
     * Update User in storage.
     *
     * @param  \App\Http\Requests\UpdateUsersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsersRequest $request, $id)
    {
	
	   
        $user = User::findOrFail($id);
		

		
        $user->update($request->all());

        return redirect()->route('users.index');
    }

    /**
     * Display User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $relations = [
            'roles' => \App\Role::get()->pluck('title', 'id')->prepend('Please select', ''),
        ];

        $user = User::findOrFail($id);

        return view('users.show', compact('user') + $relations);
    }

    /**
     * Remove User from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index');
    }

    /**
     * Delete all selected User at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = User::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
	
		 public function getusersexcel(Request $request)
    {
	
	 $users = User::where('id','!=',1)->get();
	  $usrsArray = []; 
	   $paymentsArray[] = ['id', 'name','email'];
	   
	   foreach ($users as $payment) {
	     $resrow = array();
		 $resrow['id'] = $payment['id'];
		 $resrow['name'] = $payment['name'];
		 $resrow['idemail'] = $payment['email'];
		 
		   
        $paymentsArray[] =  $resrow;
    }
	
	// Generate and return the spreadsheet
    Excel::create('users', function($excel) use ($paymentsArray) {

        // Set the spreadsheet title, creator, and description
        $excel->setTitle('Users');
        $excel->setCreator('Laravel')->setCompany('WJ Gilmore, LLC');
        $excel->setDescription('users file');

        // Build the spreadsheet, passing in the payments array
        $excel->sheet('sheet1', function($sheet) use ($paymentsArray) {
            $sheet->fromArray($paymentsArray, null, 'A1', false, false);
        });

    })->download('xlsx');
 
	
	}

}
