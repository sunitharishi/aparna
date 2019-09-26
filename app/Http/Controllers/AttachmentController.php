<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreClientStatusesRequest;
use App\Http\Requests\UpdateClientStatusesRequest;

class AttachmentController extends Controller
{

    /**
     * Display a listing of Asset Templates.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return;
    }

    /**
     * Show the form for creating new Asset Templates.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return;
    }

    /**
     * Store a newly created Asset Templates in storage.
     *
     * @param  \App\Http\Requests\StoreClientStatusesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    
        $ufiles = array();
        //$edata = $request->all();
        //print_r($edata);
        //Topic attachements
        if ($request->hasFile('topic_file')) {
            $efile = $request->file('topic_file');
            $fileNameOrg = $efile->getClientOriginalName();
            $fileNameOrg = str_replace(" ", "-", $fileNameOrg);
            $filename = 'topic-'.uniqid()."_".$fileNameOrg;
            //$extension = $efile->getClientOriginalExtension();
            //$extension = strtolower($extension);
            //$file = $request->file('task_file')->move('tmp/task/',$filename.".".$extension);
            $file = $efile->move('tmp/topics/',$filename);
            $ufiles[] = array('fullpath'=>'tmp/topics/'.$filename,'filename'=>$fileNameOrg);
            //print_r($file);
        }
        else if ($request->hasFile('task_file')) {
            $efile = $request->file('task_file');
            $fileNameOrg = $efile->getClientOriginalName();
            $fileNameOrg = str_replace(" ", "-", $fileNameOrg);
            $filename = 'task-'.uniqid()."_".$fileNameOrg;
            //$extension = $efile->getClientOriginalExtension();
            //$extension = strtolower($extension);
            //$file = $request->file('task_file')->move('tmp/task/',$filename.".".$extension);
            $file = $efile->move('tmp/task/',$filename);
            $ufiles[] = array('fullpath'=>'tmp/task/'.$filename,'filename'=>$fileNameOrg);
            //print_r($file);
        }        
        //$efiles = $_FILES["ufilename"];
        
        //print_r($edata);
        return view('attachments.files', compact('ufiles'));
    }

    /**
     * Show the form for editing ClientStatus.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return;
    }

    /**
     * Update ClientStatus in storage.
     *
     * @param  \App\Http\Requests\UpdateClientStatusesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClientStatusesRequest $request, $id)
    {
        return;
    }

    /**
     * Remove ClientStatus from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id=null,Request $request)
    {      
        return;
    }

    //delete attachment
    public function delattach(Request $request)
    {        
        $edata = $request->all();
        if(isset($edata['filepath']) && $edata['filepath']) {
            $ufile = public_path().'/'.$edata['filepath'];
            @unlink($ufile);
        }
        return;
    }
}
