<?php



namespace App\Http\Controllers;



use App\Task;
use App\TaskUser;
use App\TaskAttachment;
use App\TaskReply;
use App\Emp;
use App\User;
use DB;
use Auth;
use Config;


use Illuminate\Http\Request;

use App\Http\Requests\StoreTasksRequest;

use App\Http\Requests\UpdateTasksRequest;



class TasksController extends Controller

{



    /**

     * Display a listing of Client.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {
        $uid = Auth::user()->id;
        if($uid==1) 
            $assets = Task::select("tasks.*",'categories.name as catgname')
                        ->leftJoin('categories','categories.id','=','tasks.category')->get();
        else {
            //$assets = Task::join('task_users','tasks.id','=','task_users.task_id')->where('task_users.user_id',$uid)->get();
            $assets = TaskUser::select("tasks.*",'categories.name as catgname')
                ->leftJoin('tasks','tasks.id','=','task_users.task_id')
                ->leftJoin('users','users.emp_id','=','task_users.user_id')
                ->leftJoin('categories','categories.id','=','tasks.category')
                ->where('users.id',$uid)->get();
        }
		
        return view('tasks.index', compact('assets'));

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
	    $tasknature = array('Request'=>'Request','Suggestion'=>'Suggestion','Order'=>'Order','Others'=>'Others');
		$tasktype  = array('Individual'=>'Individual','Group'=>'Group');
        $statuses = array('New'=>'New','Pending'=>'Pending','Inprocess'=>'Inprocess','Completed'=>'Completed');
        $empList = array('Please select'=>'');

        $relations = [

            'categories' => \App\Category::get()->pluck('name', 'id')->prepend('Please select', ''),
            'sites' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', ''),
            'priorities' => $priorities,
            'fileuploadable' => $fileuploadable,
            'empList' => $empList,
            'statuses' => $statuses,
			'tasknature' => $tasknature,
			'tasktype' => $tasktype

        ]; 



        return view('tasks.create', $relations);

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

    public function store(StoreTasksRequest $request)

    {
	
		$edata['task_create_date'] = "";

        $edata = $request->all();
		$cdate = "";
		//echo '<pre>'; print_r($edata); echo '</pre>';
		if(isset($edata['task_create_date'])) $cdate = date("Y-m-d",strtotime($edata['task_create_date']));
		else $cdate = "";
		//echo $cdate;
		//exit;

        /*$taskRow = Task::where('tcode', trim($edata['tcode']))->first();        
        if($taskRow) return redirect()->back()->withErrors('Task code already exists');*/        

        $etinfo = [
                        'category' => $edata['category'],
						'site' => $edata['site'],
                        'title' => $edata['title'],
                        'priority' => $edata['priority'],
                        'status' => $edata['status'],
                        'user_id' => Auth::user()->id,
                        'description' => $edata['description'],
                        'task_create_date' => $cdate,
                        'created_at' => date('Y-m-d H:i:s')
                    ];
        $id = Task::insertGetId($etinfo);
        if(!$id) return redirect()->back()->withErrors('Unable to create task, please try again');

        //Generate Task Code
        $tcode = str_pad($id,4,"0",STR_PAD_LEFT);
        $task = Task::findOrFail($id);
        $etinfo = ['tcode' => $tcode];
        $task->update($etinfo);

        //Task users
        if(isset($edata['empid']) && $edata['empid']) {
            foreach($edata['empid'] as $emid) {
                if(!is_numeric($emid)) continue;
                $etudata = [
                        'task_id' => $id,
                        'user_id' => $emid
                    ];
                TaskUser::create($etudata);
            }
        }

        //Task attachments
        if(isset($edata['ufilepath']) && $edata['ufilepath']) {
            $fnames = $edata['ufilename'];
            $task_dir = public_path().'/uploads/tasks/'.$id;
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
                            'task_id' => $id,
                            'file' => $fv,
                            'title' => $fname
                        ];
                    TaskAttachment::create($etfdata);    
                }                
            }
        }

        return redirect()->route('tasks.index');

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
        $priorities = array('Low'=>'Low','Medium'=>'Medium','High'=>'High');
        $statuses = array('New'=>'New','Pending'=>'Pending','Inprocess'=>'Inprocess','Completed'=>'Completed');
        $empList = array('Please select'=>'');
		$tasknature = array('Request'=>'Request','Suggestion'=>'Suggestion','Order'=>'Order','Others'=>'Others');
		$tasktype  = array('Individual'=>'Individual','Group'=>'Group');

        $taskfiles = TaskAttachment::select('id','title','file')->where('task_id',$id)->where('reply_id',0)->orderBy('title','asc')->get();

        $taskusers = TaskUser::select('user_id','emps.name as username','sites.name as sitename','sites.id as siteid')
                        ->where('task_id',$id)
                        ->leftJoin('emps','emps.id','=','task_users.user_id')
                        ->leftJoin('sites','sites.id','=','emps.community')
                        ->orderBy('sites.name','asc')
                        ->orderBy('emps.name','asc')
                        ->get();

		$task = Task::findOrFail($id);
		 
        $relations = [
            'categories' => \App\Category::get()->pluck('name', 'id')->prepend('Please select', ''),
            'sites' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', ''),
            'priorities' => $priorities,
            'fileuploadable' => $fileuploadable,
			'tasknature' => $tasknature,
			'tasktype' => $tasktype,
            'empList' =>  \App\Emp::where('community', '=', $task->site)->get()->pluck('name', 'id')->prepend('Please select', ''),
            'taskusers' => $taskusers,
            'taskfiles' => $taskfiles,
            'statuses' => $statuses,
            'task_files_path' => Config::get('constants.TASK_FILES')
        ];

       

        return view('tasks.edit', compact('task') + $relations);

    }



    /**

     * Update Client in storage.

     *

     * @param  \App\Http\Requests\UpdateClientsRequest  $request

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function update(UpdateTasksRequest $request, $id)

    {

        $task = Task::findOrFail($id);

        $edata = $request->all();
		
		$cdate = "";
		//echo '<pre>'; print_r($edata); echo '</pre>';
		if(isset($edata['task_create_date'])){
			$cdate = date("Y-m-d",strtotime($edata['task_create_date']));
		}

        $etinfo = [
                        'category' => $edata['category'],
						'site' => $edata['site'],
                        'title' => $edata['title'],
                        'priority' => $edata['priority'],
                        'status' => $edata['status'],						
                        'task_create_date' => $cdate,
                        'description' => $edata['description']
                    ];

        $task->update($etinfo);

        //Task users
        TaskUser::where('task_id',$id)->delete();
        if(isset($edata['empid']) && $edata['empid']) {
            foreach($edata['empid'] as $emid) {
                if(!is_numeric($emid)) continue;
                $etudata = [
                        'task_id' => $id,
                        'user_id' => $emid
                    ];
                TaskUser::create($etudata);
            }
        }

        //attachments delete
        $attachment_deletes = $edata['attachment_delete'];
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
        }

        //Task attachments
        if(isset($edata['ufilepath']) && $edata['ufilepath']) {
            $fnames = $edata['ufilename'];
            $task_dir = public_path().'/uploads/tasks/'.$id;
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
                            'task_id' => $id,
                            'file' => $fv,
                            'title' => $fname
                        ];
                    TaskAttachment::create($etfdata);    
                }                
            }
        }

        return redirect()->route('tasks.index');

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
            'task_files_path' => Config::get('constants.TASK_FILES')
        ];

        return view('tasks.show', $relations);

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

        return redirect()->route('tasks.show',[$task_id]);
    }

    //Delete task comment
    public function delTaskComment($comment_id) {
        $comment = TaskReply::findOrFail($comment_id);
        if(!$comment) return redirect()->route('tasks.index')->withErrors('Comment not found');
        $task_id = $comment->task_id;

        //Verify task view by user
        $uid = Auth::user()->id;
        if($uid<>1 && $comment->user_id<>$uid) 
            return redirect()->route('tasks.index')->withErrors('You dont have access to delete comment');

        //Delete comment
        $comment->delete();
        $commentfiles = TaskAttachment::where('reply_id',$comment_id);
        if($commentfiles->count()) {
            $comment_files = $commentfiles->get();
            foreach ($comment_files as $tfval) {
                $task_file = public_path().'/uploads/tasks/'.$tfval->file;
                if(file_exists($task_file)) @unlink($task_file);
            }
            $commentfiles->delete();
        }
        return redirect()->route('tasks.show',[$task_id]);        
    }



    /**

     * Remove Client from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {

        $task = Task::findOrFail($id);
        if($task) {
            $task->delete();
            TaskUser::where('task_id',$id)->delete();
            TaskReply::where('task_id',$id)->delete();
            $taskfiles = TaskAttachment::where('task_id',$id);
            if($taskfiles->count()) {
                $task_files = $taskfiles->get();
                foreach ($task_files as $tfval) {
                    $task_file = public_path().'/uploads/tasks/'.$tfval->file;
                    if(file_exists($task_file)) @unlink($task_file);
                }
                $taskfiles->delete();
                $task_dir = public_path().'/uploads/tasks/'.$id;
                @rmdir($task_dir);
            }            
        }

        return redirect()->route('tasks.index');

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

