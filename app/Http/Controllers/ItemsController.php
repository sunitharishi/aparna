<?php



namespace App\Http\Controllers;



use App\Item;
use App\Asset;
use DB;

use Illuminate\Http\Request;

use App\Http\Requests\StoreItemsRequest;
use App\AssetcatType;

use App\Http\Requests\UpdateItemsRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Site;
use App\Category;



class ItemsController extends Controller

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
		 
		 $vendors = Item::select("items.*",'asset_types.name as asstypename','assetcat_types.name as asstcatypename')
                        ->leftJoin('asset_types','asset_types.id','=','items.itemcategory')->leftJoin('assetcat_types','assetcat_types.id','=','items.itemsubcategory')->get();
						
	//$vendors = Item::get();
        return view('items.index', compact('vendors'));

    }
  


    /**

     * Show the form for creating new Client.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        $relations = [

            'asset' => \App\Asset::get()->pluck('name', 'id')->prepend('Please select', ''),
			'category' => \App\AssetType::get()->pluck('name', 'id')->prepend('Please select', ''),
			'subcategory' => \App\AssetcatType::get()->pluck('name', 'id')->prepend('Please select', ''),
  
        ]; 


  
        return view('items.create', $relations);

    }
	
	public function itemimport()

    {

        $relations = [

            'asset' => \App\Asset::get()->pluck('name', 'id')->prepend('Please select', ''),
  
        ];
 
        return view('items.itemimport', $relations);

    }
	
	
	 //Get Subcategories
    public function getSubcategories(Request $request)
    {
        $edata = $request->all();
        $category_id = $edata['category_id']?$edata['category_id']:0;
       // $sub_cats = AssetcatType::select('id','name')->where('category', $category_id)->orderBy('name','asc')->get();
		$catList = \App\AssetcatType::where('category', $category_id)->orderBy('name','asc')->get()->pluck('name', 'id')->prepend('Please select', '');
       // return view('items.items_subcategory_selectbox', compact('sub_cats'));
		 return view('items.items_subcategory_selectbox', compact('catList'));
    }


 //Get Subcategoriesfor Indent
    public function getIndentSubcategories(Request $request)
    {
        $edata = $request->all();
        $category_id = $edata['category_id']?$edata['category_id']:0;
       // $sub_cats = AssetcatType::select('id','name')->where('category', $category_id)->orderBy('name','asc')->get();
		$catList = \App\AssetcatType::where('category', $category_id)->orderBy('name','asc')->get()->pluck('name', 'id')->prepend('Please select', '');
       // return view('items.items_subcategory_selectbox', compact('sub_cats'));
		 return view('items.items_indentsubcategory_selectbox', compact('catList'));
    }
	
	
	 public function getIndentInSubcategories(Request $request)
    {
        $edata = $request->all(); 
		
		$sub_id = $edata['subid']?$edata['subid']:0;
        $category_id = $edata['category_id']?$edata['category_id']:0;
       // $sub_cats = AssetcatType::select('id','name')->where('category', $category_id)->orderBy('name','asc')->get();
		$catList = \App\AssetcatType::where('category', $category_id)->orderBy('name','asc')->get()->pluck('name', 'id')->prepend('Please select', '');
       // return view('items.items_subcategory_selectbox', compact('sub_cats'));
		 return view('items.items_indentinsubcategory_selectbox', compact('catList','sub_id'));
		 
    }


    /**

     * Store a newly created Client in storage.

     *

     * @param  \App\Http\Requests\StoreClientsRequest  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {
	
	 $edata = $request->all();
	 $etempdata = $request->all();
	 
	//echo "<pre>"; print_r($edata); echo "</pre>"; exit;
	// $edata['browse'] = "";
	    if(!isset($edata['browse'])) {
		 $edata['browse'] = "";
		}
        $iemrw = Item::create($edata);
		 $last_insert_id = $iemrw->id;
		 $edata = $etempdata;
			$filename = uniqid();
	    if(isset($edata['browse']))	{
		 if($edata['browse'] != ""){
		  $filerow = $request->file('browse');
				 
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('itemfiles',$filename."_"."itembrowse".$last_insert_id.".".$extension);
		  $filename_extension = 'itemfiles/'.$filename."_"."itembrowse".$last_insert_id.".".$extension;
		  $req_array =  array("browse"=> $filename_extension);
		  $report = Item::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("browse"=> "");
		   $report = Item::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
        return redirect()->route('items.index');

    } 



    /**

     * Show the form for editing Client.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {

          $relations = [

            'asset' => \App\Asset::get()->pluck('name', 'id')->prepend('Please select', ''),
			'category' => \App\AssetType::get()->pluck('name', 'id')->prepend('Please select', ''),
			'subcategory' => \App\AssetcatType::get()->pluck('name', 'id')->prepend('Please select', ''),
  
  
        ];

 

        $vendors = Item::findOrFail($id);



        return view('items.edit', compact('vendors') + $relations);

    }



    /**

     * Update Client in storage.

     *

     * @param  \App\Http\Requests\UpdateClientsRequest  $request

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function update(UpdateItemsRequest $request, $id)

    {

        $client = Item::findOrFail($id);

        $client->update($request->all());
		
		
		 $edata = $request->all();

		 $last_insert_id = $id;

			$filename = uniqid();
	    if(isset($edata['browse']))	{
		 if($edata['browse'] != ""){
		  $filerow = $request->file('browse');
				 
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('itemfiles',$filename."_"."itembrowse".$last_insert_id.".".$extension);
		  $filename_extension = 'itemfiles/'.$filename."_"."itembrowse".$last_insert_id.".".$extension;
		  $req_array =  array("browse"=> $filename_extension);
		  $report = Item::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("browse"=> "");
		   $report = Item::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
        return redirect()->route('items.index');

    }



    /**

     * Display Client.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {

		$reowres = Item::select("items.*",'asset_types.name as asstypename','assetcat_types.name as asstcatypename')
                        ->leftJoin('asset_types','asset_types.id','=','items.itemcategory')->leftJoin('assetcat_types','assetcat_types.id','=','items.itemsubcategory')->where('items.id',$id)->first();
						
						//$reowres = Item::where('items.id',$id)->first();
						
	$relations = [
            'reowres' => $reowres,

        ];
		
        $client = Item::findOrFail($id);

        return view('items.show', compact('client') + $relations);

    }



    /**

     * Remove Client from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {

        $client = Item::findOrFail($id);

        $client->delete();
 


        return redirect()->route('items.index');

    }



    /**

     * Delete all selected Client at once.

     *
 
     * @param Request $request

     */

    public function massDestroy(Request $request)

    {
        if ($request->input('ids')) {

            $entries = Item::whereIn('id', $request->input('ids'))->get();



            foreach ($entries as $entry) {

                $entry->delete();

            }

        }

    }
 


}

