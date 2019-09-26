<?php

namespace App\Http\Controllers;

use App\AssetcatType;
use App\AssetType;
use Illuminate\Http\Request;
use App\Http\Requests\AssetcattypeRequest;

class AssetcattypeController extends Controller
{

    /** 
     * Display a listing of ClientStatus.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$category = AssetcatType::orderBy('id','desc')->get();
		$category = AssetcatType::select("assetcat_types.*",'asset_types.name as asstypename')
                        ->leftJoin('asset_types','asset_types.id','=','assetcat_types.category')->get();

        return view('assetcat_type.index', compact('category'));
    } 
  
    /**
     * Show the form for creating new ClientStatus.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	
	   $relations = [
			'category' => \App\AssetType::get()->pluck('name', 'id')->prepend('Please select', ''),
        ];
        return view('assetcat_type.create',  $relations);
    }

    /**
     * Store a newly created ClientStatus in storage.
     *
     * @param  \App\Http\Requests\StoreClientStatusesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AssetcattypeRequest $request)
    {
        AssetcatType::create($request->all());

        return redirect()->route('assetcat-types.index');
    }

    /**
     * Show the form for editing ClientStatus.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       // $category  = AssetcatType::findOrFail($id);
		
		  $relations = [
			'maincategory' => \App\AssetType::get()->pluck('name', 'id')->prepend('Please select', ''),
			'category' =>  AssetcatType::findOrFail($id),
        ];
        return view('assetcat_type.edit',  $relations);

     //   return view('assetcat_type.edit', compact('category'));
    }

    /**
     * Update ClientStatus in storage.
     *
     * @param  \App\Http\Requests\UpdateClientStatusesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AssetcattypeRequest $request, $id)
    {
        $category = AssetcatType::findOrFail($id);
        $category->update($request->all());

        return redirect()->route('assetcat-types.index');
    }

    /**
     * Remove ClientStatus from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client_status = AssetcatType::findOrFail($id);
        $client_status->delete();

        return redirect()->route('assetcat-types.index');
    }

    /**
     * Delete all selected ClientStatus at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = AssetcatType::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
