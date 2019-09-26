<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BreakdownRequest;
use App\Http\Requests\IncidentRequest;
use App\Breakdown;
use Auth;
use Config;
use App\Incident;
use App\Jobcard;
use App\CommunityAsset; 
use App\OtherAsset; 
use App\JobcardUser;
use App\Asset;
use App\Template;
use App\TemplateSection;
use App\TemplateField;
use App\AssetTemplateValue;
use Maatwebsite\Excel\Facades\Excel;
use App\Historycard;
use App\Site;

class OtherAssetsController extends Controller
{

    /**
     * Display a listing of Asset Templates.
     *
     * @return \Illuminate\Http\Response 
     */
    public function index(Request $request)
    {
        $categories = \App\AssetType::get()->pluck('name', 'id')->prepend('Asset Type', '');
        //$communities = \App\Site::get()->pluck('name', 'id')->prepend('Community', '');
		$communities = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Community', '');

        $ast = $request->input('ast', 0);
        $c = $request->input('c', 0);

        $assets = \App\OtherAsset::select("other_assets.*",'sites.name as sitename','sites.prefix as sprefix','asset_types.prefix as aprefix','asset_types.name as catgname')
                        ->leftJoin('sites','sites.id','=','other_assets.site_id')
                        ->leftJoin('asset_types','asset_types.id','=','other_assets.category_id');
        if($c) $assets = $assets->where('other_assets.site_id', $c);
        if($ast) $assets = $assets->where('other_assets.category_id', $ast);
        $assets = $assets->orderBy('other_assets.id','desc')->get();

        $sno=1;
        return view('other_assets.index', compact('assets','sno','categories','communities'));
    }

    
	
}
