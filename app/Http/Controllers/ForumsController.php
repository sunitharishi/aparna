<?php



namespace App\Http\Controllers;



use App\Forum;
use App\ForumCommentLike;
use App\ForumLike;
use App\ForumCommentreply;
use App\TaskUser;
use App\ForumAttachment;
use App\ForumReply;
use App\Emp;
use App\User;
use DB;
use Auth; 
use Config;



use Illuminate\Http\Request;

use App\Http\Requests\StoreTasksRequest;

use App\Http\Requests\UpdateTasksRequest;



class ForumsController extends Controller

{
 


    /**

     * Display a listing of Client.

     *

     * @return \Illuminate\Http\Response

     */
 
    public function index()

    {
        $uid = Auth::user()->id;
      /*  if($uid==1) 
            $assets = Forum::select("forums.*",'categories.name as catgname')
                        ->leftJoin('categories','categories.id','=','tasks.category')->get();
        else {
            //$assets = Task::join('task_users','tasks.id','=','task_users.task_id')->where('task_users.user_id',$uid)->get();
            $assets = TaskUser::select("tasks.*",'categories.name as catgname')
                ->leftJoin('tasks','tasks.id','=','task_users.task_id')
                ->leftJoin('users','users.emp_id','=','task_users.user_id')
                ->leftJoin('categories','categories.id','=','tasks.category')
                ->where('users.id',$uid)->get();
        } */
		
		 
		
		 $assets =  $assets = Forum::select("forums.*",'categories.name as catgname')
                        ->leftJoin('categories','categories.id','=','forums.category')->get(); 
						
		$relations = [
            //'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
			'assets' => $assets,
			'categories' => \App\Category::get()->pluck('name', 'id')->prepend('All', ''),
        ]; 
		
      //  return view('forums.index', compact('assets'));
		return view('forums.index', $relations);

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

        $relations = [

            'categories' => \App\Category::get()->pluck('name', 'id')->prepend('Please select', ''),
            'sites' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', ''),
            'priorities' => $priorities,
            'fileuploadable' => $fileuploadable,
            'empList' => $empList,
            'statuses' => $statuses

        ]; 

        return view('forums.create', $relations);

    }



    /**

     * Store a newly created Client in storage.

     *

     * @param  \App\Http\Requests\StoreClientsRequest  $request

     * @return \Illuminate\Http\Response

     */

    public function store(StoreTasksRequest $request)

    {

        $edata = $request->all();

        /*$taskRow = Task::where('tcode', trim($edata['tcode']))->first();        
        if($taskRow) return redirect()->back()->withErrors('Task code already exists');*/        

        $etinfo = [
                        'category' => $edata['category'],
                        'title' => $edata['title'],
                        'user_id' => Auth::user()->id,
                        'description' => $edata['description'],
                        'created_at' => date('Y-m-d H:i:s')
                    ];
        $id = Forum::insertGetId($etinfo);
        if(!$id) return redirect()->back()->withErrors('Unable to create forum, please try again');

        //Generate Forum Code
        $tcode = str_pad($id,4,"0",STR_PAD_LEFT);
        $task = Forum::findOrFail($id);
        $etinfo = ['frcode' => $tcode];
        $task->update($etinfo);
		  

        //Forum attachments
        if(isset($edata['ufilepath']) && $edata['ufilepath']) {
            $fnames = $edata['ufilename'];
            $task_dir = public_path().'/uploads/forums/'.$id;
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
                            'forum_id' => $id,
                            'file' => $fv,
                            'title' => $fname
                        ];
                    ForumAttachment::create($etfdata);    
                }                
            }
        }
 
        return redirect()->route('forums.index');

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
		
		

        $taskfiles = ForumAttachment::select('id','title','file')->where('forum_id',$id)->where('reply_id',0)->orderBy('title','asc')->get();
		
        $relations = [
            'categories' => \App\Category::get()->pluck('name', 'id')->prepend('Please select', ''),
            'sites' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', ''),
            'priorities' => $priorities,
            'fileuploadable' => $fileuploadable,
            'taskfiles' => $taskfiles,
            'task_files_path' => Config::get('constants.FORUM_FILES')
        ];

        $task = Forum::findOrFail($id);

        return view('forums.edit', compact('task') + $relations);

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

        $task = Forum::findOrFail($id);

        $edata = $request->all();

        $etinfo = [
                        'category' => $edata['category'],
                        'title' => $edata['title'],
                        'description' => $edata['description']
                    ];

        $task->update($etinfo);

        //attachments delete
        $attachment_deletes = $edata['attachment_delete'];
        if($attachment_deletes) $attachment_deletes = explode(",", $attachment_deletes);
        if($attachment_deletes) {
            foreach ($attachment_deletes as $aid) {
                if(!is_numeric($aid)) continue;
                $attachment = ForumAttachment::where('forum_id',$id)->where('id',$aid)->first();
                if($attachment) {
                    $attachment->delete();
                    $task_file = public_path().'/uploads/forums/'.$attachment->file;
                    if(file_exists($task_file)) @unlink($task_file);
                }
            }
        } 
 
        //Task attachments
        if(isset($edata['ufilepath']) && $edata['ufilepath']) {
            $fnames = $edata['ufilename'];
            $task_dir = public_path().'/uploads/forums/'.$id;
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
                            'forum_id' => $id,
                            'file' => $fv,
                            'title' => $fname
                        ];
                    ForumAttachment::create($etfdata);    
                }                
            }
        }

        return redirect()->route('forums.index');

    }



    /**
 
     * Display Client.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {        
        $task = Forum::findOrFail($id);
        if(!$task) return redirect()->route('forums.index')->withErrors('Forum not found');

        //Verify task view by user
        $uid = Auth::user()->id;
       /* if($uid<>1) {
            $taskUser = TaskUser::select("task_users.user_id")
                ->leftJoin('users','users.emp_id','=','task_users.user_id')
                ->where('task_users.task_id',$id)
                ->where('users.id',$uid)
                ->first();
            if(!$taskUser) return redirect()->route('tasks.index')->withErrors('You dont have access to view task: '.$task->tcode);
        } */

        $taskownername = '';
        $taskowner = User::findOrFail($task->user_id);
        if($taskowner) $taskownername = $taskowner->name;

        $taskfiles = ForumAttachment::select('title','file')->where('forum_id',$id)->where('reply_id',0)->orderBy('title','asc')->get();

        /*$taskusers = TaskUser::select('emps.name as username','sites.name as sitename')
                        ->where('task_id',$id)
                        ->leftJoin('emps','emps.id','=','task_users.user_id')
                        ->leftJoin('sites','sites.id','=','emps.community')
                        ->orderBy('sites.name','asc')
                        ->orderBy('emps.name','asc')
                        ->get();*/

        $catg = \App\Category::where('id',$task->category)->first();
        $fileuploadable = 1;
        $commentReply = array();
		$likecountarr = array();
        $taskcomments = ForumReply::where('forum_id',$id)->orderBy('created_at','asc')->get();
		$taskcommentCn = ForumReply::where('forum_id',$id)->orderBy('created_at','asc')->count();
		if($taskcommentCn > 0)
		{
		   foreach( $taskcomments as $tk => $tcomment){
		     $taskcommentsreplies = ForumCommentreply::where('forum_id',$id)->where('reply_id',$tcomment->id)->orderBy('created_at','asc')->get(); 
		     $commentReply[$tcomment->id] = $taskcommentsreplies;
			 foreach($taskcommentsreplies as $lk => $cmlreply){
			 
				$match_like_fields = ['forum_id' => $id,'reply_id'=>$tcomment->id,'comment_id'=>$cmlreply->id,'likestatus'=>'1'];
				$match_dis_like_fields = ['forum_id' => $id,'reply_id'=>$tcomment->id,'comment_id'=>$cmlreply->id,'likestatus'=>'0'];
				$likecount_tot = ForumCommentLike::where($match_like_fields)->count();
				$dis_likecount_tot = ForumCommentLike::where($match_dis_like_fields)->count();
			    $likecountarr[$cmlreply->id] = array("likes"=> $likecount_tot ,"dislikes" =>$dis_likecount_tot);
			 }
		   }
		
		}
		


        $task_CommentFiles = array();
        $commentfiles = ForumAttachment::select('reply_id','title','file')->where('forum_id',$id)->where('reply_id','>',0)->orderBy('reply_id','asc')->orderBy('title','asc')->get();
        if($commentfiles) {
            foreach ($commentfiles as $cval) {
                if(!isset($task_CommentFiles[$cval->id])) $task_CommentFiles[$cval->id] = array();
                $task_CommentFiles[$cval->reply_id][] = array('title'=>$cval->title,'file'=>$cval->file);
            }
        }

        $relations = [
            'taskfiles' => $taskfiles,
            //'taskusers' => $taskusers,
            'catg' => $catg,
            'task' => $task,
            'taskcomments' => $taskcomments,
            'task_CommentFiles' => $task_CommentFiles,
            'fileuploadable' => $fileuploadable,
            'taskownername' => $taskownername,
            'current_userid' => $uid,
			'commentReply' => $commentReply,
			'commentlikesres' => $likecountarr, 
            'task_files_path' => Config::get('constants.FORUM_FILES')
        ];

        return view('forums.show', $relations);

    }

    //Save comment
    public function saveTaskComment(Request $request){ 
        $edata = $request->all();
        $emsg = "";
        $task_id = isset($edata['task_id'])?(int)$edata['task_id']:0;
        if($task_id) {
            $task = Forum::findOrFail($task_id);    
            if(!$task) $emsg = "Task not found";
        } else $emsg = "Task not found";
        if($emsg) return redirect()->back()->withErrors($emsg);

        //Verify task view by user
       /* $uid = Auth::user()->id;
        if($uid<>1) {
            $taskUser = TaskUser::select("task_users.user_id")
                ->leftJoin('users','users.emp_id','=','task_users.user_id')
                ->where('task_users.task_id',$task_id)
                ->where('users.id',$uid)
                ->first();
            if(!$taskUser) return redirect()->back()->withErrors('You dont have access to view task: '.$task->tcode);
        }*/
         $uid = Auth::user()->id;
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
                'forum_id' => $task_id,
                'reply' => $edata['comment'],
                'user_id' => $uid,
                'created_at' => date('Y-m-d H:i:s')
            ];
            $comment_id = ForumReply::insertGetId($etrData);
            if(!$comment_id) return redirect()->back()->withErrors("Unable to save comment, please try again.");
        } 

        //Comment attachments
        if(isset($edata['ufilepath']) && $edata['ufilepath']) {
            $fnames = $edata['ufilename'];
            $task_dir = public_path().'/uploads/forums/'.$task_id;
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
                            'forum_id' => $task_id,
                            'reply_id' => $comment_id,
                            'file' => $fv,
                            'title' => $fname
                        ];
                    ForumAttachment::create($etfdata);
                }                
            }
        }

        return redirect()->route('forums.show',[$task_id]);
    }
	
	
	
	// GET CATEGORY BASED RESULTS
	
	
	
	
	   public function getselectedcatresults(Request $request){ 
	   
	   $cat= $request->cat;
	   
	    $matchfields = ['category' => $cat]; 
	   
	   	 $assets =  $assets = Forum::select("forums.*",'categories.name as catgname')
                        ->leftJoin('categories','categories.id','=','forums.category')->where($matchfields)->get(); 
		/*if($cat = 'all') {
		 $assets =  $assets = Forum::select("forums.*",'categories.name as catgname')
                        ->leftJoin('categories','categories.id','=','forums.category')->get(); 
		} */ 				
						
		$relations = [
            //'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
			'assets' => $assets,
			'categories' => \App\Category::get()->pluck('name', 'id')->prepend('All', ''),
        ]; 
		
		/*echo count($assets)."<br>";  
		
		echo "<pre>";
		   print_r($assets);
		echo "</pre>";
		exit; */
		
		return view('forums.showsearchlist', $relations);
	   
	  // exit;
                  
    }
	    
	
	// SET COMMENT LIKE
	
	  public function likecomment(Request $request){ 
	
	 
	   $frid = $request->forum;
	   $replyid = $request->reply;
	   $commentreplyid = $request->commentreply;
	   $uid = Auth::user()->id;
	   $status = $request->status;
	   
	   $totallikes = "0";
	   $totaldislikes = "0";
	   
	   
	   if($status == 'like'){
	    $matchfields = ['forum_id' => $frid,'user_id' =>$uid,'reply_id'=>$replyid,'comment_id'=>$commentreplyid];  
	   	 $lcn  = ForumCommentLike::where($matchfields)->count();
		 if($lcn > 0){
		     $lcres  = ForumCommentLike::where($matchfields)->first();
			 $current_staus = $lcres['likestatus'];
			 if($current_staus == "1"){
			   
			 }
			  $likereplycm = ForumCommentLike::findOrFail($lcres->id);
			  if($current_staus == "0"){
			     $etrData = [
                'likestatus' => "1"
              ];
               $likereplycm->update($etrData);
			 }
		 }
		 
		 else{
		 
		  	 $etfdata = [
                            'forum_id' => $frid,
                            'reply_id' => $replyid,
							'comment_id' => $commentreplyid,
							'user_id' => $uid,
                            'likestatus' => '1',
                        ];
                    ForumCommentLike::create($etfdata);
		   
		 }
		 }
		 if($status == 'dislike'){
	    $matchfields = ['forum_id' => $frid,'user_id' =>$uid,'reply_id'=>$replyid,'comment_id'=>$commentreplyid];  
	   	 $lcn  = ForumCommentLike::where($matchfields)->count();
		 if($lcn > 0){
		     $lcres  = ForumCommentLike::where($matchfields)->first();
			 $current_staus = $lcres['likestatus'];
			 $likereplycm = ForumCommentLike::findOrFail($lcres->id);
			 if($current_staus == "1"){
			    $etrData = [
                'likestatus' => "0"
              ];
               $likereplycm->update($etrData);
			 }
			  
			  if($current_staus == "0"){
			    
			 }
		 }
		 
		 else{
		 
		  	 $etfdata = [
                            'forum_id' => $frid,
                            'reply_id' => $replyid,
							'comment_id' => $commentreplyid,
							'user_id' => $uid,
                            'likestatus' => '0',
                        ];
                    ForumCommentLike::create($etfdata);
		   
		 }
		 } 
		 
		 $match_like_fields = ['forum_id' => $frid,'reply_id'=>$replyid,'comment_id'=>$commentreplyid,'likestatus'=>'1'];
		 $match_dis_like_fields = ['forum_id' => $frid,'reply_id'=>$replyid,'comment_id'=>$commentreplyid,'likestatus'=>'0'];
		 $likecount_tot = ForumCommentLike::where($match_like_fields)->count();
		 $dis_likecount_tot = ForumCommentLike::where($match_dis_like_fields)->count();
		 
		  

	   $response = array();
	   $totallikes = $likecount_tot;
	   $totaldislikes =  $dis_likecount_tot;
	   
	    $response['likes'] =  $totallikes;
		 $response['dislikes'] =  $totaldislikes;
		
		print json_encode($response);
	   
	  // exit;
              
    }
	
	
	
    //Save comment
    public function savecommentreply(Request $request){ 
        $edata = $request->all();
		
		//echo "<pre>"; print_r($edata); echo "</pre>"; exit; 
        $emsg = "";
        $task_id = isset($edata['forum_id'])?(int)$edata['forum_id']:0;
		$reply_id = isset($edata['reply_id'])?(int)$edata['reply_id']:0;
        if($task_id) {
            $task = Forum::findOrFail($task_id);    
            if(!$task) $emsg = "Forum not found";
        } else $emsg = "Task not found";
        if($emsg) return redirect()->back()->withErrors($emsg);

        //Verify task view by user
       /* $uid = Auth::user()->id;
        if($uid<>1) {
            $taskUser = TaskUser::select("task_users.user_id")
                ->leftJoin('users','users.emp_id','=','task_users.user_id')
                ->where('task_users.task_id',$task_id)
                ->where('users.id',$uid)
                ->first();
            if(!$taskUser) return redirect()->back()->withErrors('You dont have access to view task: '.$task->tcode);
        }*/
         $uid = Auth::user()->id;
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
                'forum_id' => $task_id,
				'reply_id' => $reply_id,
                'commentreply' => $edata['commentreply'],
                'user_id' => $uid,
                'created_at' => date('Y-m-d H:i:s')
            ];
            $comment_id = ForumCommentreply::insertGetId($etrData);
            if(!$comment_id) return redirect()->back()->withErrors("Unable to save comment, please try again.");
        } 

        //Comment attachments
       /* if(isset($edata['ufilepath']) && $edata['ufilepath']) {
            $fnames = $edata['ufilename'];
            $task_dir = public_path().'/uploads/forums/'.$task_id;
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
        }*/

        return redirect()->route('forums.show',[$task_id]);
    }
	
	
	

    //Delete task comment
    public function delTaskComment($comment_id) {
        $comment = ForumReply::findOrFail($comment_id);
        if(!$comment) return redirect()->route('forums.index')->withErrors('Comment not found');
        $task_id = $comment->task_id;

        //Verify task view by user
        $uid = Auth::user()->id;
        if($uid<>1 && $comment->user_id<>$uid) 
            return redirect()->route('forums.index')->withErrors('You dont have access to delete comment');

        //Delete comment 
        $comment->delete();
        $commentfiles = ForumAttachment::where('reply_id',$comment_id);
        if($commentfiles->count()) {
            $comment_files = $commentfiles->get();
            foreach ($comment_files as $tfval) {
                $task_file = public_path().'/uploads/forums/'.$tfval->file;
                if(file_exists($task_file)) @unlink($task_file);
            }
            $commentfiles->delete();
        }
        return redirect()->route('forums.show',[$task_id]);        
    }
	
	
	 public function delreplyTaskComment($comment_id) {
	 
        $comment = ForumCommentreply::findOrFail($comment_id);
        if(!$comment) return redirect()->route('forums.index')->withErrors('Reply not found');
        $task_id = $comment->task_id;

        //Verify task view by user
        $uid = Auth::user()->id;
        if($uid<>1 && $comment->user_id<>$uid) 
            return redirect()->route('forums.index')->withErrors('You dont have access to delete Reply');

        //Delete comment 
        $comment->delete();
       /* $commentfiles = ForumAttachment::where('reply_id',$comment_id);
        if($commentfiles->count()) {
            $comment_files = $commentfiles->get();
            foreach ($comment_files as $tfval) {
                $task_file = public_path().'/uploads/forums/'.$tfval->file;
                if(file_exists($task_file)) @unlink($task_file);
            }
            $commentfiles->delete();
        } */
        return redirect()->route('forums.show',[$task_id]);        
    }

 
 
    // LIKE POSTED TASK
	
	  public function likeforumTask($comment_id) {
	  
        $comment = Forum::findOrFail($comment_id);
        if(!$comment) return redirect()->route('forums.index')->withErrors('Forum not found');
        $task_id = $comment->task_id;

        //Verify task view by user
        $uid = Auth::user()->id;
       // if($uid<>1 && $comment->user_id<>$uid) 
        //    return redirect()->route('forums.index')->withErrors('You dont have access to raise forum');

        //Delete comment 
       
		
		
		
		 $etfdata = [
                            'forum_id' => $comment_id,
                            'user_id' => $uid,
                            'type' => 'raise',
                        ];
                    ForumLike::create($etfdata);
     
        return redirect()->route('forums.show',[$task_id]);        
    }
	
	  // LIKE POSTED TASK
	
	  public function dislikeforumTask($comment_id) {
	  
        $comment = Forum::findOrFail($comment_id);
        if(!$comment) return redirect()->route('forums.index')->withErrors('Forum not found');
        $task_id = $comment->task_id;

        //Verify task view by user
        $uid = Auth::user()->id;
       // if($uid<>1 && $comment->user_id<>$uid) 
        //    return redirect()->route('forums.index')->withErrors('You dont have access to raise forum');

        //Delete comment 
       
		
		
		
		 $etfdata = [
                            'forum_id' => $comment_id,
                            'user_id' => $uid,
                            'type' => 'down',
                        ];
                    ForumLike::create($etfdata);
     
        return redirect()->route('forums.show',[$task_id]);        
    }



    /**

     * Remove Client from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */


    public function destroy($id)

    {    

        $task = Forum::findOrFail($id);
        if($task) {
            $task->delete();
          
            ForumReply::where('forum_id',$id)->delete();
			ForumCommentreply::where('forum_id',$id)->delete();
			ForumCommentLike::where('forum_id',$id)->delete();
			ForumLike::where('forum_id',$id)->delete();
            $taskfiles = ForumAttachment::where('forum_id',$id);
            if($taskfiles->count()) {
                $task_files = $taskfiles->get();
                foreach ($task_files as $tfval) {
                    $task_file = public_path().'/uploads/forums/'.$tfval->file;
                    if(file_exists($task_file)) @unlink($task_file);
                }
                $taskfiles->delete();
                $task_dir = public_path().'/uploads/forums/'.$id;
                @rmdir($task_dir);
            }            
        }

        return redirect()->route('forums.index');

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
                        $task_file = public_path().'/uploads/forums/'.$tfval->file;
                        if(file_exists($task_file)) @unlink($task_file);
                    }
                    $taskfiles->delete();
                    $task_dir = public_path().'/uploads/forums/'.$entry->id;
                    @rmdir($task_dir);
                }            
 
            }

        }

    }



}

