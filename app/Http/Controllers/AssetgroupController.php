<?php

namespace App\Http\Controllers;

use App\Assetgroup;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Breakdown;
use Auth;
use Config;
use App\Incident;
use App\Jobcard;
use App\CommunityAsset; 
use App\JobcardUser;
use App\Asset;
use App\Template;
use App\TemplateSection;
use App\TemplateField;
use App\AssetTemplateValue;
use Maatwebsite\Excel\Facades\Excel;
use App\Historycard;
use App\Site;

class AssetgroupController extends Controller
{

    /** 
     * Display a listing of ClientStatus.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Assetgroup::all();

        return view('assetgroups.index', compact('category'));
    }
 
    /**
     * Show the form for creating new ClientStatus.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('assetgroups.create');
    }

    /**
     * Store a newly created ClientStatus in storage.
     *
     * @param  \App\Http\Requests\StoreClientStatusesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        Assetgroup::create($request->all());

        return redirect()->route('assetgroup.index');
    }

    /**
     * Show the form for editing ClientStatus.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category  = Assetgroup::findOrFail($id);

        return view('assetgroups.edit', compact('category'));
    }

    /**
     * Update ClientStatus in storage.
     *
     * @param  \App\Http\Requests\UpdateClientStatusesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        $category = Assetgroup::findOrFail($id);
        $category->update($request->all());

        return redirect()->route('assetgroup.index');
    }

    /**
     * Remove ClientStatus from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client_status = Assetgroup::findOrFail($id);
        $client_status->delete();

        return redirect()->route('assetgroup.index');
    }

    /**
     * Delete all selected ClientStatus at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = Assetgroup::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
	
	
	 public function assignassetgroup(Request $request)
    {
        $categories = \App\AssetType::get()->pluck('name', 'id')->prepend('Asset Type', '');
        //$communities = \App\Site::get()->pluck('name', 'id')->prepend('Community', '');
		$communities = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Community', '');

        $ast = $request->input('ast', 0);
        $c = $request->input('c', 0);

        $assets = \App\CommunityAsset::select("community_assets.*",'sites.name as sitename','sites.prefix as sprefix','asset_types.prefix as aprefix','asset_types.name as catgname','assetgroups.name as asgname','templates.code as tcode','templates.name as tname','assets.name as assetname')
                        ->leftJoin('sites','sites.id','=','community_assets.site_id')
                        ->leftJoin('asset_types','asset_types.id','=','community_assets.category_id')
                        ->leftJoin('assets','assets.id','=','community_assets.asset_id')
						->leftJoin('assetgroups','assetgroups.id','=','community_assets.asset_group')
                        ->leftJoin('templates','templates.id','=','assets.template_id');
						
        if($c) $assets = $assets->where('community_assets.site_id', $c);
        if($ast) $assets = $assets->where('community_assets.category_id', $ast);
        $assets = $assets->orderBy('community_assets.id','desc')->get();
		 $assetsgroups =  \App\Assetgroup::get()->pluck('name', 'id')->prepend('Individual', '0');

        $sno=1;
        return view('commassetgroups.index', compact('assets','sno','categories','communities','assetsgroups'));
    }  

}
