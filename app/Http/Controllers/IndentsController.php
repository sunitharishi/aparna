<?php



namespace App\Http\Controllers;



use App\Task;
use App\Indent;
use App\TaskUser;
use App\TaskAttachment;
use App\TaskReply;
use App\Emp;
use App\User;
use DB;
use Auth;
use Config;
use App\CommunityAsset;
use App\Indentitem;
use App\Dailylockpermission;
use App\Dailylockdayspermission;

use Illuminate\Http\Request;

use App\Http\Requests\StoreIndentsRequest;

use App\Http\Requests\UpdateIndentsRequest;



class IndentsController extends Controller

{



    /**

     * Display a listing of Client.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    { 
	   
	   
	   
        $assets = Indent::all();
		
        return view('indents.index', compact('assets'));

    }  
 
 
  
    /**

     * Show the form for creating new Client.
 
     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    { 
        $fileuploadable = 1;
        $priorities = array('Low'=>'Low','Medium'=>'Medium','High'=>'High');
        $statuses = array('New'=>'New','Pending'=>'Pending','Inprocess'=>'Inprocess','Completed'=>'Completed');
        $empList = array('Please select'=>'');
		$category = \App\AssetType::get()->pluck('name', 'id')->prepend('Please select', '');
		$subcategory = \App\AssetcatType::get()->pluck('name', 'id')->prepend('Please select', '');

        $relations = [

            'categories' => \App\Category::get()->pluck('name', 'id')->prepend('Please select', ''),
            'sites' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', ''),
            'priorities' => $priorities,
            'fileuploadable' => $fileuploadable,
            'empList' => $empList,
            'statuses' => $statuses,
			'categories' => $category,
			'subcategories' => $subcategory,

        ]; 

 

        return view('indents.create', $relations);

    }
	
		
   public function getsubcatItems(Request $request)
    {
        $items_List = array();
        $edata = $request->all();
		
        if($edata['subcat'] > 0) {
			$items_cn =  \App\Item::where('itemsubcategory', $edata['subcat'])->count();
			if($items_cn > 0){
			 	$items_List = \App\Item::where('itemsubcategory', $edata['subcat'])->get()->pluck('itemcode', 'id')->prepend('Please select', '');
			}
            //$edata['site_id']=$eRow?$eRow->site_id:0;
        } 
		
        return view('indents.indent_item_selectbox', compact('items_List'));
    }
	
	/* TASK CALENDER VIEW */

    public function calview()

    { 

        return view('taskcalendar');

    } 
	
	/* MOM CALENDER VIEW */

    public function momview()

    { 

        return view('momcalendar');

    }  
    

    /**

     * Store a newly created Client in storage.

     *

     * @param  \App\Http\Requests\StoreClientsRequest  $request

     * @return \Illuminate\Http\Response

     */

    public function store(StoreIndentsRequest $request)

    {

        $edata = $request->all();

        /*$taskRow = Task::where('tcode', trim($edata['tcode']))->first();        
        if($taskRow) return redirect()->back()->withErrors('Task code already exists');*/        

      /*  $etinfo = [
                        'item_code' => $edata['item_code'],
						'site' => $edata['site'],
                        'title' => $edata['title'],
                        'user_id' => Auth::user()->id,
						'priority' => $edata['priority'],
                        'description' => $edata['description'],
                        'created_at' => date('Y-m-d H:i:s')
                    ]; */
					
					 $etinfo = [
						'site' => $edata['site'],
                        'title' => $edata['title'],
                        'user_id' => Auth::user()->id,
						'priority' => $edata['priority'],
                        'description' => $edata['description'],
                        'created_at' => date('Y-m-d H:i:s')
                    ];
        $id = Indent::insertGetId($etinfo);
		
		if(isset($edata['category_id'])){
		    foreach($edata['category_id'] as $key => $val){
				  $eitemdata = [
						'category_id' => $val,
                        'sub_category_id' => $edata['sub_category_id'][$key],
						'item_code' => $edata['item_code'][$key],
                        'ref_id' => $id,
                        'created_at' => date('Y-m-d H:i:s')
                    ];
					$idi = Indentitem::insertGetId($eitemdata);
				 
			}
		
		}  

        return redirect()->route('indents.index');

    }



    /**

     * Show the form for editing Client.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    { 
         
		 //Existing
		 $indent_item = array();
		 $match_trans_fields =  ['ref_id' => $id];
		 $stpval = array();
		 $ident_item_cn = \App\Indentitem::where($match_trans_fields)->count();
         if($ident_item_cn > 0){
		     $indent_item = \App\Indentitem::where($match_trans_fields)->get();
		 }
		 
		 $category = \App\AssetType::get()->pluck('name', 'id')->prepend('Please select', '');
		$subcategory = \App\AssetcatType::get()->pluck('name', 'id')->prepend('Please select', '');
         
        $relations = [
			'categories' => $category,
			'subcategories' => $subcategory,
			'indentItem' =>  $indent_item,
			 'sites' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', ''),
          
        ];

        $task = Indent::findOrFail($id);

        return view('indents.edit', compact('task') + $relations);

    }



    /**

     * Update Client in storage.

     *

     * @param  \App\Http\Requests\UpdateClientsRequest  $request

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function update(UpdateIndentsRequest $request, $id)

    {

        $task = Indent::findOrFail($id);

        $edata = $request->all();
	
        /*$etinfo = [
                       'item_code' => $edata['item_code'],
                        'title' => $edata['title'],
						'site' => $edata['site'],
                        'user_id' => Auth::user()->id,
                        'description' => $edata['description']
                    ]; */
					
					$etinfo = [
                        'title' => $edata['title'],
						'site' => $edata['site'],
                        'user_id' => Auth::user()->id,
                        'description' => $edata['description']
                    ];

        $task->update($etinfo);

      DB::table('indentitems')->where('ref_id', '=', $id)->delete();
	  
	  if(isset($edata['category_id'])){
		    foreach($edata['category_id'] as $key => $val){
				  $eitemdata = [
						'category_id' => $val,
                        'sub_category_id' => $edata['sub_category_id'][$key],
						'item_code' => $edata['item_code'][$key],
                        'ref_id' => $id,
                        'created_at' => date('Y-m-d H:i:s')
                    ];
					$idi = Indentitem::insertGetId($eitemdata);
				 
			}
		
		}  


        return redirect()->route('indents.index'); 

    }



    /**

     * Display Client.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {        
        $task = Indent::findOrFail($id);
        if(!$task) return redirect()->route('indents.index')->withErrors('Indent not found');
        $relations = [
           
            'task' => $task
          
        ]; 

        return view('indents.show', $relations);

    }

    //Save comment
    public function saveTaskComment(Request $request){
        $edata = $request->all();
        $emsg = "";
        $task_id = isset($edata['task_id'])?(int)$edata['task_id']:0;
        if($task_id) {
            $task = Task::findOrFail($task_id);    
            if(!$task) $emsg = "Task not found";
        } else $emsg = "Task not found";
        if($emsg) return redirect()->back()->withErrors($emsg);

        //Verify task view by user
        $uid = Auth::user()->id;
        if($uid<>1) {
            $taskUser = TaskUser::select("task_users.user_id")
                ->leftJoin('users','users.emp_id','=','task_users.user_id')
                ->where('task_users.task_id',$task_id)
                ->where('users.id',$uid)
                ->first();
            if(!$taskUser) return redirect()->back()->withErrors('You dont have access to view task: '.$task->tcode);
        }

        //Save comment
        if(isset($edata['comment_id']) && $edata['comment_id']) {
            $comment_id = $edata['comment_id'];
            $ecomment = TaskReply::where('id',$comment_id)->first();
            $etrData = [
                'reply' => $edata['comment']
            ];
            $ecomment->update($etrData);
        } else {
            $etrData = [
                'task_id' => $task_id,
                'reply' => $edata['comment'],
                'user_id' => $uid,
                'created_at' => date('Y-m-d H:i:s')
            ];
            $comment_id = TaskReply::insertGetId($etrData);
            if(!$comment_id) return redirect()->back()->withErrors("Unable to save comment, please try again.");
        }

        //Comment attachments
        if(isset($edata['ufilepath']) && $edata['ufilepath']) {
            $fnames = $edata['ufilename'];
            $task_dir = public_path().'/uploads/tasks/'.$task_id;
            if(!file_exists($task_dir)) {
                mkdir($task_dir, 0777, true);
            }
            foreach($edata['ufilepath'] as $fi=>$fv) {
                if(empty($fv)) continue;
                if(!file_exists($fv)) continue;
                $old = public_path().'/'.$fv;
                $sfile = basename($fv);
                $new = $task_dir.'/'.$sfile;
                if(rename($old,$new)) {
                    $fname = $fnames[$fi];
                    if(empty($fname)) $fname = basename($fv);
                    $fv = $task_id.'/'.$sfile;
                    $etfdata = [
                            'task_id' => $task_id,
                            'reply_id' => $comment_id,
                            'file' => $fv,
                            'title' => $fname
                        ];
                    TaskAttachment::create($etfdata); 
                }                
            }
        }

        return redirect()->route('indents.show',[$task_id]);
    }


    public function approveIndent($comment_id) {
        $comment = Indent::findOrFail($comment_id);
		
		 $etinfo = [
                       'item_status' => 'Approved',
					   'approved_by' =>  Auth::user()->id,
					   'approve_date' => date('Y-m-d H:i:s')
                    ]; 

        $comment->update($etinfo);

       
        return redirect()->route('indents.index');         
    }
	
	 //Delete task comment
    public function rejectIndent($comment_id) {
        $comment = Indent::findOrFail($comment_id);
		
		 $etinfo = [
                       'item_status' => 'Rejected',
					    'approved_by' =>  Auth::user()->id,
					   'approve_date' => date('Y-m-d H:i:s')
                    ];

        $comment->update($etinfo);
        
        return redirect()->route('indents.index');         
    }
	
	
	 //Update Request Status
    public function requeststatus($comment_id) {
	
        $comment = Indent::findOrFail($comment_id);
		
		 $etinfo = [
                       'item_status' => 'Rejected',
					    'approved_by' =>  Auth::user()->id,
					   'approve_date' => date('Y-m-d H:i:s')
                    ];

        $comment->update($etinfo);
        
        return redirect()->route('indents.index');         
    }
	
	  
	   public function getindentrequest(Request $request) {
	   
	   $response = array();
	    $comment_id= $request->id;
	 $comment = Indent::findOrFail($comment_id);

	   	$response['editstatus'] = "0"; 
	   if($comment->closed_by > 0 && $comment->request_status != ''){
	   		$response['editstatus'] = "1"; 
			$response['request_description'] = $comment->request_description; 
			$response['request_status'] = $comment->request_status; 
			$response['closed_by'] = $comment->closed_by; 
	   }
	    else{
		    $response['editstatus'] = "0"; 
			$response['request_description'] = ""; 
			$response['request_status'] = ""; 
			$response['closed_by'] = ""; 
	   }
		
	  
		  print json_encode($response);
	   exit;
        $comment = Indent::findOrFail($comment_id);
		
		 $etinfo = [
                       'item_status' => 'Rejected',
					    'approved_by' =>  Auth::user()->id,
					   'approve_date' => date('Y-m-d H:i:s')
                    ];

        $comment->update($etinfo);
        
        return redirect()->route('indents.index');         
    }
	
	
	public function updateindentrequest(Request $request) {
	   
	   $response = array(); 
	    $comment_id= $request->id;
		$request_status= 'Closed';
		$request_description= $request->request_description;
        $comment = Indent::findOrFail($comment_id);
		
		 $etinfo = [ 
					   'request_status' => $request_status,
					   'request_description' => $request_description,
					    'closed_by' =>  Auth::user()->id,
					   'closed_date' => date('Y-m-d H:i:s')
                    ];

        $comment->update($etinfo);  
        $response['close'] = "suc";    
         print json_encode($response);
	   exit;      
    }
	



    /**

     * Remove Client from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {

        $task = Indent::findOrFail($id);
        if($task) {
            $task->delete();
            
        }

        return redirect()->route('indents.index');

    }



    /**

     * Delete all selected Client at once.

     *

     * @param Request $request

     */
	 
	 
	 
	 
	 
	 
 public function massApprove(Request $request)

    {
	
	  if ($request->input('ids')) {

            $entries = Indent::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
			
			 $comment = Indent::findOrFail($entry->id);
		
		 $etinfo = [
                       'item_status' => 'Approved',
					   'approved_by' =>  Auth::user()->id,
					   'approve_date' => date('Y-m-d H:i:s')
                    ]; 

          $comment->update($etinfo);

            }

        }

    }
	
	
  public function massReject(Request $request)

    {
	  
	   if ($request->input('ids')) {

            $entries = Indent::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
			
			 $comment = Indent::findOrFail($entry->id);
		
		 $etinfo = [
                       'item_status' => 'Rejected',
					   'request_status' => 'Closed',
					    'approved_by' =>  Auth::user()->id,
					   'approve_date' => date('Y-m-d H:i:s')
                    ];

          $comment->update($etinfo);

            }

        }

    }
	
	 public function massRejectpermission(Request $request)

    {
	
	  if ($request->input('ids')) {

            $entries = User::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
			
		
		
			$perdate = date("Y-m-d");
			$dailypermission_cn = Dailylockpermission::
				//where('permissiondate', '=', $perdate)
				where('user_id', '=', $entry->id)
				->count();
				
				
			if($dailypermission_cn > 0){
			
			$dailypermission_res = Dailylockpermission::
				//where('permissiondate', '=', $perdate)
				where('user_id', '=', $entry->id)
				->first();
			
			
			
			$comment = Dailylockpermission::findOrFail($dailypermission_res->id);
		
		   $etinfo = [
                       'lockstatus' => 'rejected'
                    ];

          $comment->update($etinfo);
		  
		   }else{
		   
		   $etinfo = array( 
                       'user_id' => $entry->id,
					   'permissiondate' => date('Y-m-d'),
					   'lockstatus' => 'rejected'
                    );
					
					$insert = Dailylockpermission::create($etinfo);
					} 
		   
            }

        } 

    } 
	
	
	
	
	
	 public function massgroupassign(Request $request)

    {
	
	  if ($request->input('ids')) {
	   
	       $group =  $request->input('group');
		  if((int)$group > 0){
		     
		  } else $group = 0;
	   
			$entries = CommunityAsset::whereIn('id', $request->input('ids'))->get();
             foreach ($entries as $entry) {
			        if($group == 0) {
					   $groupn = ($entry->id)."_".$group;
					} else {
					  $groupn = $group;
					}
			        $comment = CommunityAsset::findOrFail($entry->id);
					$etinfo = [
					  'asset_group' => $groupn
					];
					
					$comment->update($etinfo);
			 }
        } 

    }
	
	
	
	 public function massApprovepermission(Request $request)

    {
	
	  if ($request->input('ids')) {

            $entries = User::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
			
			// $comment = User::findOrFail($entry->id);
			// $comment = User::findOrFail($entry->id);
		
			$perdate = date("Y-m-d");
			$dailypermission_cn = Dailylockpermission::
				//where('permissiondate', '=', $perdate)
				where('user_id', '=', $entry->id)
				->count();
				
			if($dailypermission_cn > 0){
			
			$dailypermission_res = Dailylockpermission::
				//where('permissiondate', '=', $perdate)
				where('user_id', '=', $entry->id)
				->first();
			
			
			$comment = Dailylockpermission::findOrFail($dailypermission_res->id);
		
		   $etinfo = [
                       'lockstatus' => 'approved'
                    ];

          $comment->update($etinfo);
		  
		   }else{
		   
		   $etinfo = array( 
                       'user_id' => $entry->id,
					   'permissiondate' => date('Y-m-d'),
					   'lockstatus' => 'approved'
                    );
					
					$insert = Dailylockpermission::create($etinfo);
					} 
		      
		   }
			
			/* $perdate = date("Y-m-d");
			$dailypermission_res = Dailylockpermission::
				//where('permissiondate', '=', $perdate)
				where('user_id', '=', $entry->id)
				->first();
				$rid = $dailypermission_res->id;
				
				 $client = Dailylockpermission::findOrFail($rid);
                 $client->delete();
				
			
			} */
			

        } 

    }
	
	
	
	 public function drlsystem(Request $request)

    {
	
	  

			$entries = User::whereNotIn('role_id', [1,17])->get();

            foreach ($entries as $entry) {
			
			$perdate = date("Y-m-d");
			$dailypermission_cn = Dailylockdayspermission::
				where('user_id', '=', $entry->id)
				->count();
				
			if($dailypermission_cn > 0){
			
			$dailypermission_res = Dailylockdayspermission::
				where('user_id', '=', $entry->id)
				->first();
			
			
			$comment = Dailylockdayspermission::findOrFail($dailypermission_res->id);
		
		   $etinfo = [
                       'lockstatus' => 'rejected'
                    ];

          $comment->update($etinfo);
		  
		   }else{
		   
		   $etinfo = array( 
                       'user_id' => $entry->id,
					   'permissiondate' => date('Y-m-d'),
					   'lockstatus' => 'rejected'
                    );
					
					$insert = Dailylockdayspermission::create($etinfo);
					} 
		      
		   }

        

    }


    public function massDestroy(Request $request)

    {

        if ($request->input('ids')) {

            $entries = Indent::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {

                $entry->delete();
     

            }

        }

    }



}

