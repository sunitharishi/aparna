<?php



namespace App\Http\Controllers;



use App\Emp;
use DB;

use Illuminate\Http\Request;

use App\Http\Requests\StoreEmpsRequest;

use App\Http\Requests\UpdateEmpsRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Site;
use App\Category;



class EmpsController extends Controller

{



    /**

     * Display a listing of Client.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    { 

        $emps = Emp::all(); 

        return view('emps.index', compact('emps'));

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
			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get(),
        ];

        return view('emps.create', $relations);

    }
	
	  
	
	



    /**

     * Store a newly created Client in storage.

     *

     * @param  \App\Http\Requests\StoreClientsRequest  $request

     * @return \Illuminate\Http\Response

     */

    public function store(StoreEmpsRequest $request)

    {

      /*  Emp::create($request->all());



        return redirect()->route('emps.index'); */
		
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
          Emp::create($savearr);  

        return redirect()->route('emps.index'); 
 
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
			'cat_names' => \App\Category::get()->pluck('name', 'id')->prepend('Please select', ''),
			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get(),
        ];



        $asset = Emp::findOrFail($id);



        return view('emps.edit', compact('asset') + $relations);

    }



    /**

     * Update Client in storage.

     *

     * @param  \App\Http\Requests\UpdateClientsRequest  $request

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function update(UpdateEmpsRequest $request, $id)

    {

        $asset = Emp::findOrFail($id);

        //$asset->update($request->all());
		
		
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

       
	    $asset->update($savearr);
        return redirect()->route('emps.index');

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



        $emp = Emp::findOrFail($id);



        return view('emps.show', compact('emp') + $relations);

    }



    /**

     * Remove Client from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {

        $asset = Emp::findOrFail($id);

        $asset->delete();



        return redirect()->route('emps.index');

    }



    /**

     * Delete all selected Client at once.

     *

     * @param Request $request

     */

    public function massDestroy(Request $request)

    {

        if ($request->input('ids')) {

            $entries = Emp::whereIn('id', $request->input('ids'))->get();



            foreach ($entries as $entry) {

                $entry->delete();

            }

        }

    }


    //Employee Import
    public function empimport(Request $request)
    {        
        //Save excel employees
        if ($request->isMethod('post')) {

            $edata = $request->all();
            //Check excel
            if(!isset($edata['file'])) return redirect()->route('emps.eimport')->withErrors('Employee excel not found');

            $filename = 'emp-'.uniqid();
            $extension = $request->file('file')->getClientOriginalExtension();
            $extension = strtolower($extension);
            //check extentions  xls or xlsx 
            if($extension<>"xls" && $extension<>"xlsx") return redirect()->route('emps.eimport')->withErrors('Only xls or xlsx file is allowed!!');            

            $file = $request->file('file')->move('tmp',$filename.".".$extension);
            $filename_extension = 'tmp/'.$filename.'.'.$extension;

            //$filename_extension = 'tmp/emp-5a8bfc2b9f690.xls';
            //$filename_extension = 'tmp/emp-sample.xlsx';
            $updated = 0;
            $xls_datas = Excel::load($filename_extension, function($reader) { })->toArray();

            $cms = array();

            if(count($xls_datas) > 0) 
            {
                //echo "<pre>";print_r($xls_datas);echo "</pre>";
                $months = array('jan'=>1,'feb'=>2,'mar'=>3,'apr'=>4,'may'=>5,'jun'=>6,'jul'=>7,'aug'=>8,'sep'=>9,'oct'=>10,'nov'=>11,'dec'=>12);

                /*
                    0 - S.No
                    1 - Emp ID
                    2 - Employee Name
                    3 - Father Name
                    4 - Spouse Name
                    5 - Marital Status
                    6 - Department
                    7 - Designation
                    8 - Community name
                    9 - Gender
                    10 - DOB
                    11 - DOJ
                    12 - Address
                    13 - Email ID
                    14 - Mobile Number
                    15 - Reference Mobile Number
                    16 - PF Number
                    17 - UAN Number
                    18 - ESI Number
                    19 - Account No
                    20 - Bank Name
                */
                $n=0;
                $indx=0;
                if($xls_datas[0]) $indx=0;
                else if($xls_datas[1]) $indx=1;
                //loop excel
                foreach($xls_datas[$indx] as $xi=>$xval)
                {  
                    $n++;
                    //echo "1. <pre>";print_r($xval);echo "</pre>";
                    //if($n==10) break;
                    //continue;

                    $xval = array_values($xval);
                    //echo "2. <pre>$n";print_r($xval);echo "</pre>";
                    //if($n>=10) break;                    

                    if(empty($xval[1]) || empty($xval[8])) continue;
                    $community = Site::where('name',trim($xval[8]))->first();
                    if(!$community) {
                        $cms[] = $xval[8];
                        continue;
                    }

                    $dept_id = 0;
                    $department = Category::where('name',$xval[6])->first();
                    if($department) $dept_id = $department->id;

                    //Date of birth
                    $dob = '';
                    $dt = $xval[10];
                    if($dt) {
                        if(is_object($dt)) { //date object
                            if(isset($dt->date)) {
                                $dt = $dt->date;
                                $dt = explode(" ", $dt);
                                $dob = $dt[0];    
                            }                        
                        } else {
                            //dd-mmm-yyyy
                            $dt = strtolower($dt);
                            $dt = explode("-", $dt);
                            if(count($dt)==3) {
                                $m = isset($months[$dt[1]])?$months[$dt[1]]:1;
                                $dob = $dt[2].'-'.$m.'-'.$dt[0];                        
                            }
                        }    
                    }
                    

                    //Date of Joining
                    $doj = '';
                    $dt = $xval[11];
                    if($dt) {
                        if(is_object($dt)) { //date object
                            if(isset($dt->date)) {
                                $dt = $dt->date;
                                $dt = explode(" ", $dt);
                                $doj = $dt[0];    
                            }                        
                        } else {
                            //dd-mmm-yyyy
                            $dt = strtolower($dt);
                            $dt = explode("-", $dt);
                            if(count($dt)==3) {
                                $m = isset($months[$dt[1]])?$months[$dt[1]]:1;
                                $doj = $dt[2].'-'.$m.'-'.$dt[0];                            
                            }
                            
                        }
                    }

                    $age = '';
                    if($dob) {
                        $dt1 = date_create($dob);
                        $dt2 = date_create(date("Y-m-d"));
                        $diff=date_diff($dt1,$dt2);
                        $age = $diff->format("%y");
                    }

                    $einfo = array(
                                'name'=>$xval[2],
                                'refname'=>$xval[3],
                                'spouse'=>$xval[4],
                                'maritalstatus'=>$xval[5]=='Married'?'0':'1',
                                'category'=>$dept_id,
                                'designation'=>$xval[7],
                                'community'=>$community->id,
                                'gender'=>$xval[9]=="F"?1:0,
                                'permanent_address'=>$xval[12],
                                'email'=>$xval[13],
                                'phone'=>$xval[14],
                                'alterphone'=>$xval[15],
                                'pf'=>$xval[16],
                                'uan'=>$xval[17],
                                'esi'=>$xval[18],
                                'acno'=>$xval[19],
                                'bank'=>$xval[20]
                                );
                    if($dob) $einfo['dob'] = $dob;
                    if($doj) $einfo['doj'] = $doj;
                    if($age) $einfo['age'] = $age;

                    //echo "3. <pre>";print_r($einfo);echo "</pre>";    
                    $emp = Emp::where('ecode',$xval[1])->first();
                    if($emp) {
                        //update
                        $emp->update($einfo);
                    } else {
                        //insert
                        $einfo['ecode']=$xval[1];
                        Emp::create($einfo);
                    }  
                    $updated++;
                    //echo "3. <pre>";print_r($einfo);echo "</pre>";    
                    //break;          
                }
            }
            //delete file
            $excelfile = public_path().'/'.$filename_extension;
            if(file_exists($excelfile)) @unlink($excelfile);
            return redirect('emps')->withSuccess('Uploaded employees count: '.$updated);
            /*echo 'Uploaded employees count: '.$updated;
            if($cms) {
                $cms = array_unique($cms);
                print_r($cms);
            }*/
        }
        //end import
        return view('emps.import');
    }

    //Get community employees
    public function getCommunityUsers(Request $request)
    {
        $empList = array();
        $edata = $request->all();
        if(isset($edata['site_id']) && $edata['site_id']) {
            $empList = \App\Emp::where('community',$edata['site_id'])->get()->pluck('name', 'id')->prepend('Please select', '');
        }
        return view('emps.emp_selectbox', compact('empList'));
    }




}

