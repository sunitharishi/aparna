<?php

namespace App\Http\Controllers;

use App\RepositorycatType;
use App\RepositoryType;
use Illuminate\Http\Request; 
use Auth;
use Config;
use App\Repository;
use App\Http\Requests\RepositorycatTypeRequest; 
 
class RepositorycattypeController extends Controller
{

    /** 
     * Display a listing of ClientStatus.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    { 
		$cat_name = "";
		$cid = ""; 
		
		if($id )
		{
			$cid = $id;
			$category = RepositorycatType::select("repositorycat_types.*",'repository_types.name as asstypename')->leftJoin('repository_types','repository_types.id','=','repositorycat_types.category')->where("category",$id)->get();
			$cat_res = RepositoryType::where('id',$id)->first();
			$cat_name = $cat_res->name;
		}
		else
		{
			$cid = "";
			$category = RepositorycatType::select("repositorycat_types.*",'repository_types.name as asstypename')->leftJoin('repository_types','repository_types.id','=','repositorycat_types.category')->get();
		}
		
		$fcount = "";
		$data = array();
		if(count($category) > 0)
		{
			foreach($category as $key=>$cat)
			{
				$sid = $cat->id;
				$fcount = Repository::select("repositories.*")->where("itemsubcategory",$sid)->count();
				$data[$key]['cid'] = $cid;
				$data[$key]['id'] = $sid;
				$data[$key]['name'] = $cat->name;
				$data[$key]['fcount'] = $fcount;
			}
		}
		$relations = ['sfolders' => $data];			
        return view('repositorycat_type.index', compact('id','cat_name'), $relations);
    } 
  
    /**
     * Show the form for creating new ClientStatus.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
	
	   $scat_res =  RepositoryType::where('id',$id)->first();
	   if($scat_res)
	   {
	   		$name = $scat_res->name;
	   }
	   $relations = [
			'cname' => $name,
			'cid' => $id,
        ];
        return view('repositorycat_type.create',  $relations);
    }

    /**
     * Store a newly created ClientStatus in storage.
     *
     * @param  \App\Http\Requests\StoreClientStatusesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RepositorycatTypeRequest $request)
    {
		$edata = $request->all();
		$id = $edata['category'];
        RepositorycatType::create($request->all());
        //return redirect()->route('repositorycat-types.index',  $relations);
		return redirect('/repositorycat_types/'.$id);
    }

    /**
     * Show the form for editing ClientStatus.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$cat = RepositorycatType::findOrFail($id);
		$cid = $cat->category;
		$cat_query = RepositoryType::where('id',$cid)->first();
		$cat_name  =  $cat_query->name;
		$relations = [
			'category' => $cat,
			'cname' => $cat_name
        ];
        return view('repositorycat_type.edit',  $relations);

     //   return view('assetcat_type.edit', compact('category'));
    }

    /**
     * Update ClientStatus in storage.
     *
     * @param  \App\Http\Requests\UpdateClientStatusesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RepositorycatTypeRequest $request, $id)
    {
		$edata = $request->all();
		$cid = $edata['category'];
        $category = RepositorycatType::findOrFail($id);
        $category->update($request->all());

        return redirect('/repositorycat_types/'.$cid);
    }
	
	
	public function show($cid,$sid)

    {

		$uid = Auth::user()->id;
		$scat_name = "";
		$cat_name = "";/*
		if($sid==0) $assets = Repository::where('category',$cid)->get();
		else $assets = Repository::where('category',$cid)->where('itemsubcategory',$sid)->get();*/
		if($sid==0) $assets =  Repository::select('repositories.*','repositorycat_types.name')->leftJoin('repositorycat_types','repositorycat_types.category','=','repositories.category')->where('repositories.category',$cid)->groupBy('repositories.id')->get();
		else $assets =  Repository::select('repositories.*','repositorycat_types.name')->leftJoin('repositorycat_types','repositorycat_types.category','=','repositories.category')->where('repositories.category',$cid)->where('repositories.itemsubcategory',$sid)->groupBy('repositories.id')->get();
		 
		if($sid>0)
		{
			$scat_res =  RepositorycatType::where('id',$sid)->first();
			$scat_name = $scat_res->name;
			$scat_id = $scat_res->id;
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
		$cat_id = 0;
		$scat_id = 0;
		$cat_name = "";
		$scat_name = "";
		$data = array();
		if(count($assets)>0)
		{
			foreach($assets as $key=>$asset)
			{
				$cat_res =  RepositoryType::where('id',$asset->category)->first();
				if($cat_res) {
				 	$cat_name = $cat_res->name;
					$cat_id = $cat_res->id;
				}
				$scat_res =  RepositorycatType::where('id',$asset->itemsubcategory)->first();
				if($scat_res) {
				 	$scat_name = $scat_res->name;
					$scat_id = $scat_res->id;
				}
				$data[$key]['id'] = $asset->id;
				$data[$key]['title'] = $asset->title;
				$data[$key]['cat_name'] = $cat_name;
				$data[$key]['cat_id'] = $cat_id;
				$data[$key]['scat_name'] = $scat_name;
				$data[$key]['scat_id'] = $scat_id;
				$data[$key]['nfiles'] = $scat_id;
				$data[$key]['file'] = $asset->file;
			}
		}
		
		$relations = ['task_files_path' => Config::get('constants.REPOSITORY_FILES')];
		return view('repository.index', compact('data','cat_name','scat_name', 'sid', 'cid') + $relations);

    }

    /**
     * Remove ClientStatus from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		
		$res_count = Repository::where('itemsubcategory',$id)->count();
		if($res_count > 0)
		{
			$repos = Repository::where('itemsubcategory',$id)->get();
			foreach($repos as $repo)
			{
				$rid = $repo->id;
				$task = Repository::findOrFail($rid);				
				$fstatus = '0';
				$etinfo = ['status' => $fstatus];
				$task->update($etinfo);  
				$task = Repository::findOrFail($rid);
				if($task) {
					$task->delete();
						$task_file = public_path().'/uploads/repository/'.$task->file;
						if(file_exists($task_file)) @unlink($task_file);
						$task_dir = public_path().'/uploads/repository/'.$rid;
						@rmdir($task_dir);
							  
				}
			}
		}
        $client_status = RepositorycatType::findOrFail($id);
        $client_status->delete();

        return redirect('/repositorycat_types/'.$id);
    }

    /**
     * Delete all selected ClientStatus at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = RepositorycatType::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
