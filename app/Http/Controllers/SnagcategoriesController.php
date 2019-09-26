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
use App\Snagcategory; 



class SnagcategoriesController extends Controller

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
		 
		 $vendors = Snagcategory::select("snagcategories.*")->get();
						
	//$vendors = Item::get();
        return view('snagcategories.index', compact('vendors'));

    }
  


    /**

     * Show the form for creating new Client.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {  
        return view('snagcategories.create');

    }

    public function store(Request $request)

    {
	
	 $edata = $request->all();
	 if(isset($edata['cattitle']) && $edata['cattitle']=="") 
	 $etempdata = $request->all();
	 $iemrw = Snagcategory::create($edata);
     return redirect()->route('snagcategories.index');

    } 
    public function edit($id)

    {

        $vendors = Snagcategory::findOrFail($id);
        return view('snagcategories.edit', compact('vendors'));

    }

    public function update(Request $request, $id)

    {

        $client = Snagcategory::findOrFail($id);

        $client->update($request->all());
		
		
		 $edata = $request->all();

		 $last_insert_id = $id;
        return redirect()->route('snagcategories.index');

    }
    public function destroy($id)
    {

        $client = Snagcategory::findOrFail($id);
        $client->delete();
        return redirect()->route('snagcategories.index');

    }

}

