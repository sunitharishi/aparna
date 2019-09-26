<?php



namespace App\Http\Controllers;


use App\Site;
use App\Block;
use App\Horticulture;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Http\Request;

use App\Http\Requests\StoreSitesRequest;

use App\Http\Requests\UpdateSitesRequest;

use DB; 



class HorticultureController extends Controller
{
    public function index()
    { 
        $horticultures = Horticulture::all();
		$data =array();
		if(count($horticultures)>0)
		{
			foreach($horticultures as $key=>$horticulture)
			{
				$checkflats = Site::where('id', $horticulture->community_id)->first();
				$checkblocks = Block::where('id', $horticulture->block_id)->first();
				$data[$key]['id'] = $horticulture->id;
				$data[$key]['sname'] = $checkflats->name;
				$data[$key]['bname'] =  $checkblocks['block_name'];
				$data[$key]['sub_location'] = $horticulture->sub_location;
				$data[$key]['plant_name'] = $horticulture->plant_name;
				$data[$key]['no_plants'] = $horticulture->no_plants;
				$data[$key]['soil_type'] = $horticulture->soil_type;
				$data[$key]['soil_depth'] = $horticulture->soil_depth;
				$data[$key]['block_image'] = $horticulture->block_image;
				$data[$key]['type'] = $horticulture->type;
			}
		}
		$relations = [
            'horticultures' => $data,
        ];
        return view('horticultures.index', $relations);
    }

    public function create()
    {
		$blocks = array();
        $relations = [
			'blocks' => $blocks,
            'communities' => \App\Site::where('status', '=', '1')->orderBy('name', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', ''),
			
        ];
        return view('horticultures.create', $relations);

    }
	
	
	public function getbloacksforsite(Request $request)
    { 
		$data = array();
		$site= $request->site;
		$checkflats = Site::where('id', $site)->first();
		if($checkflats)
		{
			$flatstype = $checkflats['flat_type'];
			if($flatstype=='flats')
			{
				$blocks = Block::whereIn('coomunity_id', [$site,0])->get();
				$data = array();
				if(count($blocks)>0)
				{
					foreach($blocks as $key=>$value)
					{
						$data[$key]['block_id'] = $value->id;
						$data[$key]['block_name'] = $value->block_name;
					}
				}
			}
			else $data = array();
		} 
		$relations = [
            'blocks' => $data,
        ];
	    return view('horticultures.getbloacksforsite', $relations);
    }
	
	
	public function gethoslocations(Request $request)
    { 
	
		$data = array();
		$block_id= $request->block_id;
		$checklocations = Horticulture::where('block_id', $block_id)->groupBy('sub_location')->get();
		if(count($checklocations)>0)
		{
			foreach($checklocations as $key=>$location)
			{
				$data[$key]['location_id'] = $location->location_id;
				$data[$key]['location_name'] = $location->sub_location;
			};
		} 
		$relations = [
            'blocks' => $data,
        ];
	    return view('horticultures.gethoslocations', $relations);
    }
	
	public function horticultureimport(Request $request)
	{
			 return view('horticultures.import');
	}
	
	public function savehskhorticultureimport(Request $request)
    {
	
        $filename = uniqid();

		$extension = $request->file('file')->getClientOriginalExtension();

	 	$file = $request->file('file')->move('uploadreports/mmrupload',$filename.".".$extension);

	 	$filename_extension = 'uploadreports/mmrupload/'.$filename.'.'.$extension;

		$xls_datas = Excel::load($filename_extension, function($reader) { })->toArray();
		 
	    $edata = $request->all();
		if(count($xls_datas) > 0) 

		{
		    $data = array();
			$attendance_export="";
			$attenance_list = array();
			$excel_import = 1;
			$n=1;
			$rec_data =array();
		    foreach($xls_datas as $ckey=>$xls_data)
		    {  	
				foreach($xls_data as $hkey=>$data)
				{
					
					$xls_data['type'] = $data['type']?$data['type']:'';
					$xls_data['community_id'] = $data['community_id']?$data['community_id']:'';
					$xls_data['block_id'] = $data['block_id']?$data['block_id']:'';
					$xls_data['sub_location'] = $data['sub_location']?$data['sub_location']:'';
					$xls_data['plant_name'] = $data['plant_name']?$data['plant_name']:'';
					$xls_data['soil_type'] = $data['soil_type']?$data['soil_type']:'';
					$xls_data['soil_depth'] = $data['soil_depth']?$data['soil_depth']:'';
					$rec_data = array('type'=>$data['type'],'community_id'=>$data['community_id'],'block_id'=>$xls_data['block_id'],'sub_location'=>$xls_data['sub_location'],'plant_name'=>$xls_data['plant_name'],'soil_type'=>$xls_data['soil_type'],'soil_depth'=>$xls_data['soil_depth']);				
					$insert = Horticulture::create($rec_data);			 
					$last_insert_id = $insert->id;				
					if($xls_data['type']=='Initial') 
					{
						$location_val  = array('location_id'=>$last_insert_id);	
						$report = Horticulture::where('id', '=', $last_insert_id)->update($location_val);
					}				
			  }  
			} 
		  	return view('horticultures.create', $relations);
		} 

	}

	public function  store(Request $request)
    {
 
        $edata = $request->all();
		
		if(isset($edata['man_power_nos']) && $edata['man_power_nos']>0) $manpower = $edata['man_power_nos']; else $manpower="";
		if(isset($edata['no_of_hrs']) && $edata['no_of_hrs']!="") $no_of_hrs = $edata['no_of_hrs']; else $no_of_hrs="";
		if(isset($edata['reason']) && $edata['reason']!="") $reason = $edata['reason']; else $reason="";
		if(isset($edata['report_on']) && $edata['report_on']!="") $report_on = date("Y-m-d",strtotime($edata['reason'])); else $report_on="";
		
		
		$req_array =  array("community_id"=> $edata['community_id'], "block_id"=> $edata['block_id'], "sub_location"=> $edata['sub_location'], "plant_name"=> $edata['plant_name'], "no_plants"=> $edata['no_plants'], "soil_type"=> $edata['soil_type'], "block_image"=> "", "type"=>  $edata['type'] , "man_power_nos"=> $manpower, "no_of_hrs"=> $no_of_hrs, "reason"=> $reason, "report_on"=> $report_on);
		$insert = Horticulture::create($req_array);			 
		$last_insert_id = $insert->id;
		
		if($edata['type']=='Initial') 
		{
			$location_val  = array('location_id'=>$last_insert_id);	
			$report = Horticulture::where('id', '=', $last_insert_id)->update($location_val);
		}
		else
		{
			$location_res = Horticulture::where('location_id', $edata['sub_location'])->first();
			$location_val  = array('sub_location'=>$location_res['sub_location'], 'location_id'=>$edata['sub_location']);
			$report = Horticulture::where('id', '=', $last_insert_id)->update($location_val);
		}
		
		$filename = uniqid();
	    if(isset($edata['himage']) && $edata['himage'] != "")	
		{
		 	$filename = uniqid();			
			$req = $edata['himage'];
			$extension = $req->getClientOriginalExtension();
			$file = $req->move('uploads/horticulture/',$filename."_".$last_insert_id.".".$extension);
			$filename_extension = $filename."_".$last_insert_id.".".$extension;
			$w=150; 
			$h=150; 
			$filename_extension1 = public_path().'/uploads/horticulture/'.$filename_extension;
			$newfilename= public_path().'/uploads/horticulture/'.$filename_extension;
			resize_byratio($filename_extension1, $w, $h, $newfilename);				
			$imagepath = $filename_extension;
			$store_val  = array('block_image'=>$imagepath);	 
			$report = Horticulture::where('id', '=', $last_insert_id)->update($store_val);
		}
		return redirect()->route('horticultures.index');
    }
	public function edit($id)
    {
        $horticultures = Horticulture::findOrFail($id);
		$relations = [
			'horticultures' => $horticultures, 
			'communities' => \App\Site::where('status', '=', '1')->orderBy('name', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', ''),
        ];
        return view('horticultures.edit', $relations);

    }
    public function update(Request $request, $id)

    {

        $horticulture = Horticulture::findOrFail($id);

        $horticulture->update($request->all());
		
		$edata = $request->all();	
		
		$filename = uniqid();
	    if(isset($edata['himage']) && $edata['himage'] != "")	
		{
		 	$filename = uniqid();			
			$req = $edata['himage'];
			$extension = $req->getClientOriginalExtension();
			$file = $req->move('uploads/horticulture/',$filename."_".$id.".".$extension);
			$filename_extension = $filename."_".$id.".".$extension;
			$w=150; 
			$h=150; 
			$filename_extension1 = public_path().'/uploads/horticulture/'.$filename_extension;
			$newfilename= public_path().'/uploads/horticulture/'.$filename_extension;
			resize_byratio($filename_extension1, $w, $h, $newfilename);				
			$imagepath = $filename_extension;
			$store_val  = array('block_image'=>$imagepath);	 
			$report = Horticulture::where('id', '=', $id)->update($store_val);
		}
		
        return redirect()->route('horticultures.index');

    }
	
	
    
    public function destroy($id)

    { 

        $horticulture = Horticulture::findOrFail($id);

        $horticulture->delete();



        return redirect()->route('horticultures.index');

    }



    /**

     * Delete all selected Client at once.

     *

     * @param Request $request

     */

    public function massDestroy(Request $request)

    {

        if ($request->input('ids')) {

            $entries = Horticulture::whereIn('id', $request->input('ids'))->get();



            foreach ($entries as $entry) {

                $entry->delete();

            }

        }

    }



}

