<?php



namespace App\Http\Controllers;



use App\Item;
use App\Asset;
use Auth;
use DB;

use Illuminate\Http\Request;

use App\Http\Requests\StoreItemsRequest;
use App\AssetcatType;

use App\Http\Requests\UpdateItemsRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Site;
use App\Snaglocation; 



class SnaglocationsController extends Controller

{



    /** 

     * Display a listing of Client.

     *

     * @return \Illuminate\Http\Response

     */ 

    public function index()

    { 
	
	// $vendors = Item::select("items.*",'assets.name as assetname')
         //               ->leftJoin('assets','assets.id','=','items.asset')->get();
		 
	$vendors = Snaglocation::select("snaglocations.*",'sites.name as sitename')->leftJoin('sites','sites.id','=','snaglocations.site_id')->get();
						
	//$vendors = Item::get();
        return view('snaglocations.index', compact('vendors'));

    }
  


    /**

     * Show the form for creating new Client.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {  
		 
		  if(Auth::user()->id == 1){
			  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
			  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  }     
		 
          return view('snaglocations.create', compact('siteattrname'));

    }

    public function store(Request $request)

    {
	
	 $edata = $request->all();
	 $diconsumptn = array("site_id"=>$edata['site_id'],"location_name"=>$edata['location_name']);   
	 $insertcon = Snaglocation::create($diconsumptn); 
	 $last_insert_id = $insertcon->id;
						
     return redirect()->route('snaglocations.index');

    } 
    public function edit($id)

    {

		if(Auth::user()->id == 1){
			  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
			  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  }else{
			$role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  }     
		  
        $vendors = Snaglocation::findOrFail($id);
        return view('snaglocations.edit', compact('vendors', 'siteattrname'));

    }

    public function update(Request $request, $id)

    {

        $client = Snaglocation::findOrFail($id);
        $client->update($request->all());
		$edata = $request->all();
		$last_insert_id = $id;
        return redirect()->route('snaglocations.index');

    }
    public function destroy($id)
    {

        $client = Snaglocation::findOrFail($id);
        $client->delete();
        return redirect()->route('snaglocations.index');

    }

}

