<?php



namespace App\Http\Controllers;



use App\Repository;
use App\RepositorycatType;
use App\Task;
use App\TaskUser;
use App\TaskAttachment;
use App\RepositoryType;
use App\TaskReply;
use App\Emp;
use App\User;
use DB;
use Auth;
use Config;


use Illuminate\Http\Request;

use App\Http\Requests\StoreRepositoryRequest;

use App\Http\Requests\UpdateRepositoryRequest;



class RepositoryController extends Controller

{



    /**

     * Display a listing of Client.

     *

     * @return \Illuminate\Http\Response

     */ 

    public function index($cid,$sid)

    {   
		
        $uid = Auth::user()->id;
       
            $assets = Repository::get();
			  $relations = [
            'task_files_path' => Config::get('constants.REPOSITORY_FILES')
        ];
			
	  
		
        return view('repository.index', compact('assets','cid','sid') + $relations);

    }  
 
 
    /**

     * Show the form for creating new Client.
 
     *

     * @return \Illuminate\Http\Response

     */

    public function create($id,$cid)

    { 
	
        $fileuploadable = 1;
        $priorities = array('Low'=>'Low','Medium'=>'Medium','High'=>'High');
        $statuses = array('New'=>'New','Pending'=>'Pending','Inprocess'=>'Inprocess','Completed'=>'Completed');
        $empList = array('Please select'=>'');
		$cat_name = "";
		$scat_name = "";
		if($cid>0)
		{
			$scat_res =  RepositorycatType::where('id',$cid)->first();
			$scat_name = $scat_res->name;
			$scat_id = $scat_res->id;
		}
		if($id>0)
		{
			$cat_res =  RepositoryType::where('id',$id)->first();
			$cat_name = $cat_res->name;
			$cat_id = $cat_res->id;
		}

        $relations = [

            'sites' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', 'All'),
            'priorities' => $priorities,
            'fileuploadable' => $fileuploadable,
            'empList' => $empList,
            'statuses' => $statuses,
			'cid' => $id,
			'sid' => $cid,
			'cat_name' => $cat_name,
			'scat_name' => $scat_name,
			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get(),

        ]; 
 
		
       
        return view('repository.create', $relations);


    }



    /**

     * Store a newly created Client in storage.

     *

     * @param  \App\Http\Requests\StoreClientsRequest  $request

     * @return \Illuminate\Http\Response

     */

    public function store(StoreRepositoryRequest $request)

    {  
        $edata = $request->all();
		
		//echo "<pre>"; print_r($edata); echo "</pre>"; exit;

        /*$taskRow = Task::where('tcode', trim($edata['tcode']))->first();        
        if($taskRow) return redirect()->back()->withErrors('Task code already exists');*/      

		 
		if(isset($edata['site'])){
		$per_status_arr = $edata['site'];
		 
		 $per_status_str = implode(",",$per_status_arr);
		 }
		 else {
		   $per_status_str = "";
		 }  
		 
		 
		 $cid = $edata['category'];
		 $sid = $edata['itemsubcategory'];
		 
		 $scat_name = "";
		 $cat_name = "";

        $etinfo = [
						'category' => $edata['category'],
						'itemsubcategory' => $edata['itemsubcategory'],
                        'title' => $edata['title'],
                        'site' => $per_status_str,
                        'user_id' => Auth::user()->id,
                        'created_at' => date('Y-m-d H:i:s')
                    ];
        $id = Repository::insertGetId($etinfo);
        if(!$id) return redirect()->back()->withErrors('Unable to create reopsitory, please try again');


        //Task attachments
        if(isset($edata['ufilepath']) && $edata['ufilepath']) {
            $fnames = $edata['ufilename'];
            $task_dir = public_path().'/uploads/repository/'.$id;
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
                    $fv = $id.'/'.$sfile;
                    $etfdata = [
                            'file' => $fv
                        ];
						$repo = Repository::findOrFail($id);
						$repo->update($etfdata);
                }                
            }
        }
		
		$uid = Auth::user()->id;
       
            $assets = Repository::get();
			  $relations = [
            'task_files_path' => Config::get('constants.REPOSITORY_FILES')
        ];
			
	   //return redirect()->route('repository.index');
		
      // return view('repository.index', compact('assets','cat_name','scat_name', 'sid', 'cid') + $relations);
	   
	   return redirect('/repository/'.$cid.'/'.$sid);


    }



    /**

     * Show the form for editing Client.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {
	   $fileuploadable = 1;
      
    	
		  
		  $repos = Repository::select("repositories.*")->where("id",$id)->first();
		  
		  //echo '<pre>'; print_r($repos); echo '</pre>';
		  
		  $cid = $repos->category;
		  $sid = $repos->itemsubcategory;
			
          $taskfiles = Repository::select('file','title')->where('id',$id)->orderBy('title','asc')->get();
		 
		 if($sid>0)
		{
			$scat_res =  RepositorycatType::where('id',$cid)->first();
			$scat_name = $scat_res['name'];
			$scat_id = $scat_res['id'];
		}
		if($cid>0)
		{
			$mcat = $cid;
			if($mcat)
			{
				$cat_res =  RepositoryType::where('id',$mcat)->first();
				if($cat_res)
				{
					$cat_name = $cat_res->name;
					$cat_id = $cat_res->id;
				}
			}
		}

		$scat_name = "";

        $relations = [
		
			'category' => \App\RepositoryType::get()->pluck('name', 'id')->prepend('Please select', ''),
			'subcategory' => \App\RepositorycatType::get()->pluck('name', 'id')->prepend('Please select', ''),
			
			
            'sites' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', 'All'),
            'fileuploadable' => $fileuploadable,
            'taskfiles' => $taskfiles,
			'cat_name' => $cat_name,
			'scat_name' => $scat_name,
			'cid' => $cid,
			'sid' => $sid,
			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get(),
            'task_files_path' => Config::get('constants.REPOSITORY_FILES')
        ];

        $task = Repository::findOrFail($id);
		
		//echo $task->site; exit;

        return view('repository.edit', compact('task') + $relations);

    }



    /**

     * Update Client in storage.

     *

     * @param  \App\Http\Requests\UpdateClientsRequest  $request

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function update(UpdateRepositoryRequest $request, $id)
    {
	   		
        $task = Repository::findOrFail($id);

        $edata = $request->all();
		
		$cid = $edata['category'];
		$sid = $edata['itemsubcategory'];
		 
		 
		if(isset($edata['community'])){
		$per_status_arr = $edata['community'];
		 
		 $per_status_str = implode(",",$per_status_arr);
		 }
		 else {
		   $per_status_str = "";
		 }  
		 

        $etinfo = [
                       'site' => $per_status_str,
                        'title' => $edata['title']
                    ];

        $task->update($etinfo);

     

        //attachments delete
      /*  $attachment_deletes = $edata['attachment_delete'];
        if($attachment_deletes) $attachment_deletes = explode(",", $attachment_deletes);
        if($attachment_deletes) {
            foreach ($attachment_deletes as $aid) {
                if(!is_numeric($aid)) continue;
                $attachment = TaskAttachment::where('task_id',$id)->where('id',$aid)->first();
                if($attachment) {
                    $attachment->delete();
                    $task_file = public_path().'/uploads/tasks/'.$attachment->file;
                    if(file_exists($task_file)) @unlink($task_file);
                }
            }
        }*/

        //Task attachments
        if(isset($edata['ufilepath']) && $edata['ufilepath']) {
            $fnames = $edata['ufilename'];
            $task_dir = public_path().'/uploads/repository/'.$id;
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
                    $fv = $id.'/'.$sfile;
                    $etfdata = [
                            'file' => $fv
                        ];
						$repo = Repository::findOrFail($id);
						$repo->update($etfdata);
                }                
            }
        }
		
		

        return redirect('/repository/'.$cid.'/'.$sid);

    }



    /**

     * Display Client.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {        
	   
        $task = Task::findOrFail($id);
        if(!$task) return redirect()->route('tasks.index')->withErrors('Task not found');

        //Verify task view by user
        $uid = Auth::user()->id;
        if($uid<>1) {
            $taskUser = TaskUser::select("task_users.user_id")
                ->leftJoin('users','users.emp_id','=','task_users.user_id')
                ->where('task_users.task_id',$id)
                ->where('users.id',$uid)
                ->first();
            if(!$taskUser) return redirect()->route('tasks.index')->withErrors('You dont have access to view task: '.$task->tcode);
        }

        $taskownername = '';
        $taskowner = User::findOrFail($task->user_id);
        if($taskowner) $taskownername = $taskowner->name;

        $taskfiles = TaskAttachment::select('title','file')->where('task_id',$id)->where('reply_id',0)->orderBy('title','asc')->get();

        $taskusers = TaskUser::select('emps.name as username','sites.name as sitename')
                        ->where('task_id',$id)
                        ->leftJoin('emps','emps.id','=','task_users.user_id')
                        ->leftJoin('sites','sites.id','=','emps.community')
                        ->orderBy('sites.name','asc')
                        ->orderBy('emps.name','asc')
                        ->get();

        $catg = \App\Category::where('id',$task->category)->first();
        $fileuploadable = 1;

        $taskcomments = TaskReply::where('task_id',$id)->orderBy('created_at','asc')->get();

        $task_CommentFiles = array();
        $commentfiles = TaskAttachment::select('reply_id','title','file')->where('task_id',$id)->where('reply_id','>',0)->orderBy('reply_id','asc')->orderBy('title','asc')->get();
        if($commentfiles) {
            foreach ($commentfiles as $cval) {
                if(!isset($task_CommentFiles[$cval->id])) $task_CommentFiles[$cval->id] = array();
                $task_CommentFiles[$cval->reply_id][] = array('title'=>$cval->title,'file'=>$cval->file);
            }
        }

        $relations = [
            'taskfiles' => $taskfiles,
            'taskusers' => $taskusers,
            'catg' => $catg,
            'task' => $task,
            'taskcomments' => $taskcomments,
            'task_CommentFiles' => $task_CommentFiles,
            'fileuploadable' => $fileuploadable,
            'taskownername' => $taskownername,
            'current_userid' => $uid,
            'task_files_path' => Config::get('constants.REPOSITORY_FILES')
        ];

        return view('tasks.show', $relations);

    }





    /**

     * Remove Client from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {
	
		$res = Repository::where('id',$id)->first();
		$sid = $res->itemsubcategory;
		$cid = $res->category;
		
	   $task = Repository::findOrFail($id);
		
		 $fstatus = '0';
        $etinfo = [
                       'status' => $fstatus
                    ];

        $task->update($etinfo);  
        $task = Repository::findOrFail($id);
        if($task) {
            $task->delete();
                $task_file = public_path().'/uploads/repository/'.$task->file;
                if(file_exists($task_file)) @unlink($task_file);
                $task_dir = public_path().'/uploads/repository/'.$id;
                @rmdir($task_dir);
                      
        }
		
		

        return redirect('/repository/'.$cid.'/'.$sid);

    }
	
	
	public function getSubcategories(Request $request)
    {
        $edata = $request->all();
        $category_id = $edata['category_id']?$edata['category_id']:0;
       // $sub_cats = AssetcatType::select('id','name')->where('category', $category_id)->orderBy('name','asc')->get();
		$catList = \App\RepositorycatType::where('category', $category_id)->orderBy('name','asc')->get()->pluck('name', 'id')->prepend('Please select', '');
       // return view('items.items_subcategory_selectbox', compact('sub_cats'));
		 return view('repository.repository_subcategory_selectbox', compact('catList'));
    }
	
	 public function enable(Request $request, $rep_id, $status)

    {  

        $task = Repository::findOrFail($rep_id);
		
		if($status == '0') $fstatus = '1';
		if($status == '1') $fstatus = '0';
 
        $etinfo = [
                       'status' => $fstatus
                    ];
					

        $task->update($etinfo);
		return redirect()->route('repository.index');

    }
	
	
	public function rsub(Request $request, $rsid)

    {  

        $task = Repository::findOrFail($rep_id);
		
		if($status == '0') $fstatus = '1';
		if($status == '1') $fstatus = '0';
 
        $etinfo = [
                       'status' => $fstatus
                    ];
					

        $task->update($etinfo);
		return redirect()->route('repository.index');

    }
  

  
    /**

     * Delete all selected Client at once.

     *

     * @param Request $request

     */

    public function massDestroy(Request $request)

    {

        if ($request->input('ids')) {

            $entries = Task::whereIn('id', $request->input('ids'))->get();



            foreach ($entries as $entry) {

                $entry->delete();

                TaskUser::where('task_id',$entry->id)->delete();
                TaskReply::where('task_id',$entry->id)->delete();
                $taskfiles = TaskAttachment::where('task_id',$entry->id);
                if($taskfiles->count()) {
                    $task_files = $taskfiles->get();
                    foreach ($task_files as $tfval) {
                        $task_file = public_path().'/uploads/tasks/'.$tfval->file;
                        if(file_exists($task_file)) @unlink($task_file);
                    }
                    $taskfiles->delete();
                    $task_dir = public_path().'/uploads/tasks/'.$entry->id;
                    @rmdir($task_dir);
                }            

            }

        }

    }



}

