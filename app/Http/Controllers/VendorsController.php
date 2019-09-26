<?php



namespace App\Http\Controllers;



use App\Vendor;

use App\Vendorcontact;

use Illuminate\Http\Request;

use App\Http\Requests\StoreVendorsRequest;

use App\Http\Requests\UpdateVendorsRequest;

use DB;


class VendorsController extends Controller

{


  
    /** 

     * Display a listing of Client.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    { 

        $vendors = Vendor::orderBy('name','asc')->get();



        return view('vendors.index', compact('vendors'));

    }



    /**

     * Show the form for creating new Client.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        $relations = [

            'client_statuses' => \App\ClientStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
			 'category' => \App\AssetType::get()->pluck('name', 'id')->prepend('Please select', ''),
			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', ''),
			'sites_attr_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id'),

        ];

        return view('vendors.create', $relations);

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
	$sitedata = "";
	   if(isset($edata['site'])){
			$sitedata = implode(",",$edata['site']);
	   }
	
	   $edata['site'] = $sitedata;
	   
	   if(!isset($edata['poimage'])) { $edata['poimage'] = "";}
	   if(!isset($edata['warothertxt'])) { $edata['warothertxt'] = "";}
	    if(!isset($edata['pothetext'])) { $edata['pothetext'] = "";}
	   $edata['pothetext'] = "";
	   
       $insert =  Vendor::create($edata); 
		
		$last_insert_id = $insert->id;
		$filename = uniqid();
	    if(isset($edata['poimage']))	{
		 if($edata['poimage'] != ""){
		        $filerow = $request->file('poimage');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('vendorfiles',$filename."_"."po".$last_insert_id.".".$extension);
		  $filename_extension = 'vendorfiles/'.$filename."_"."po".$last_insert_id.".".$extension;
		  $req_array =  array("poimage"=> $filename_extension);
		  $report = Vendor::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("poimage"=> "");
		   $report = Vendor::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}

        DB::table('vendorcontacts')->where('vendor_id', '=', $last_insert_id)->delete();
		  /*echo "<pre>";
			     print_r($edata);
			   echo "</pre>"; */
			   
			  // exit;
		foreach($edata['conname'] as $ckey => $consuption){
			   $data = array('conname' => $consuption, 'condesignation' => $edata['condesignation'][$ckey],'contactnumber' => $edata['contactnumber'][$ckey],'mail' => $edata['mail'][$ckey],'location' => $edata['location'][$ckey],'vendor_id' => $last_insert_id);
			  
			$insert =  Vendorcontact::create($data); 

			   }
		
        return redirect()->route('vendors.index');

    }



    /**

     * Show the form for editing Client.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {
	
	   $sites = Vendor::findOrFail($id);
		$dgconsumparray = array();
		 $match_dg_fields =  ['vendor_id' => $id];
		  
		  $dgconsumparray_cn = \App\Vendorcontact::where($match_dg_fields)->count();
         if($dgconsumparray_cn > 0){
		     $dgconsumparray = \App\Vendorcontact::where($match_dg_fields)->get();
		 }

        $relations = [

              'client_statuses' => \App\ClientStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
			 'category' => \App\AssetType::get()->pluck('name', 'id')->prepend('Please select', ''),
			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', ''),
			'sites_attr_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id'),
			'contactdata' =>  $dgconsumparray,

        ];
		
		

        $vendors = Vendor::findOrFail($id);
        return view('vendors.edit', compact('vendors') + $relations);

    }



    /**

     * Update Client in storage.

     *

     * @param  \App\Http\Requests\UpdateClientsRequest  $request

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */ 

    public function update(Request $request, $id)

    {

        $client = Vendor::findOrFail($id);

       
		
		$edata = $request->all();	
	$sitedata = "";
	   if(isset($edata['site'])){
			$sitedata = implode(",",$edata['site']);
	   }
	
	   $edata['site'] = $sitedata;
	  
	    $client->update($edata);
			
		$last_insert_id = $id; 
		$filename = uniqid();
	    if(isset($edata['poimage']))	{
		 if($edata['poimage'] != ""){
		        $filerow = $request->file('poimage');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('vendorfiles',$filename."_"."po".$last_insert_id.".".$extension);
		  $filename_extension = 'vendorfiles/'.$filename."_"."po".$last_insert_id.".".$extension;
		  $req_array =  array("poimage"=> $filename_extension);
		  $report = Vendor::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("poimage"=> "");
		   $report = Vendor::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		 DB::table('vendorcontacts')->where('vendor_id', '=', $last_insert_id)->delete();
		
		foreach($edata['conname'] as $ckey => $consuption){
			   $data = array('conname' => $consuption, 'condesignation' => $edata['condesignation'][$ckey],'contactnumber' => $edata['contactnumber'][$ckey],'mail' => $edata['mail'][$ckey],'location' => $edata['location'][$ckey],'vendor_id' => $last_insert_id);
			  
			$insert =  Vendorcontact::create($data); 

			   }
		
        return redirect()->route('vendors.index');

    }

  

    /**

     * Display Client.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {

       

        $client = Vendor::findOrFail($id); 
		$catarray = array();
		
		$dgconsumparray = array();
		 $match_dg_fields =  ['vendor_id' => $id];
		  
		  $dgconsumparray_cn = \App\Vendorcontact::where($match_dg_fields)->count();
         if($dgconsumparray_cn > 0){
		     $dgconsumparray = \App\Vendorcontact::where($match_dg_fields)->get();
		 }
		  $category = "";
		 if(isset($client->category)){
		  $match_dg_fields =  ['id' => $client->category];
		  
		  $cat_cn = \App\AssetType::where($match_dg_fields)->count();
         if($cat_cn > 0){
		     $catarray = \App\AssetType::where($match_dg_fields)->first();
		 }
		 }
		 
		  $relations = [

            'client_statuses' => \App\ClientStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
			'contact' => $dgconsumparray,
			'category' => $catarray,

        ];





        return view('vendors.show', compact('client') + $relations);

    }



    /**

     * Remove Client from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {

        $client = Vendor::findOrFail($id);

        $client->delete();



        return redirect()->route('vendors.index');

    }



    /**

     * Delete all selected Client at once.

     *

     * @param Request $request

     */

    public function massDestroy(Request $request)

    {

        if ($request->input('ids')) {

            $entries = Vendor::whereIn('id', $request->input('ids'))->get();



            foreach ($entries as $entry) {

                $entry->delete();

            }

        }

    }



}

