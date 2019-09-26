<?php
namespace App\Http\Controllers;
use PDF;
use Illuminate\Http\Request;
use App\Http\Requests\BreakdownRequest;
use App\Http\Requests\IncidentRequest;
use App\Breakdown;
use App\Site;
use App\Incident;
use App\Jobcard;
use App\Item;
use App\CommunityAsset;
use App\OtherAsset;
use App\JobcardUser;
use App\Historycard;
use App\Jobcarditem;
use Auth;

class TopicsController extends Controller
{
	//Break Down
	public function breakdown(Request $request)
    {
		$communities = \App\Site::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');	
        $userid = Auth::user()->id;
        $site_id = 0;
        $c = $request->input('c', 0);
        if($userid>1) {       
            $emprow = \App\Emp::where('id', '=', (int)Auth::user()->emp_id)->first();
            if($emprow) $site_id = (int)$emprow->community;
        }
        if($userid>1)
		{
            $breakdowns = Breakdown::select('breakdowns.*','sites.name as sitename','community_assets.name as comasset','other_assets.name as otherasset')->leftJoin('sites','sites.id','=','breakdowns.site_id')->leftJoin('community_assets','community_assets.id','=','breakdowns.asset_id')->leftJoin('other_assets','other_assets.id','=','breakdowns.asset_id');
			if($c) $breakdowns = $breakdowns->where('breakdowns.site_id', $c);
			$breakdowns = $breakdowns->orderBy('breakdowns.id','desc')->get();
		}
        else
		{
            $breakdowns = Breakdown::select('breakdowns.*','sites.name as sitename','community_assets.name as comasset','other_assets.name as otherasset')->leftJoin('sites','sites.id','=','breakdowns.site_id')->leftJoin('community_assets','community_assets.id','=','breakdowns.asset_id')->leftJoin('other_assets','other_assets.id','=','breakdowns.asset_id');			
			if($c) $breakdowns = $breakdowns->where('breakdowns.site_id', $c);
			$breakdowns = $breakdowns->orderBy('breakdowns.id','desc')->get();
		}
        $sno=1;
        return view('topics.breakdown', compact('breakdowns','sno', 'communities'));
    }
    public function breakdownEdit()
    {
        $userid = Auth::user()->id;
        $site_id = 0;
        if($userid>1) {       
            $emprow = \App\Emp::where('id', '=', (int)Auth::user()->emp_id)->first();
            if($emprow) $site_id = (int)$emprow->community;
        }
        $communities = \App\Site::get()->pluck('name', 'id')->prepend('Please select', '');
       //assets
        $comm_assets = array();
		$other_assets = array();
        $categories = \App\AssetType::get()->pluck('name', 'id')->prepend('Please select', '');
		$subcategories = \App\AssetcatType::get()->pluck('name', 'id')->prepend('Please select', '');
        $fileuploadable = 1;
        return view('topics.breakdown-edit', compact('communities','comm_assets','other_assets', 'userid','site_id','categories','subcategories','fileuploadable'));
    } 
	
	  public function breakdowndaily()
    {
	  $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); 

	   $site_id = $uriSegments[3];
	   
        $userid = Auth::user()->id;
        $site_id = 0;
        if($userid>1) {       
            $emprow = \App\Emp::where('id', '=', (int)Auth::user()->emp_id)->first();
            if($emprow) $site_id = (int)$emprow->community;
        }
		$site_id = $uriSegments[3]; 
        $communities = \App\Site::get()->pluck('name', 'id')->prepend('Please select', '');
       //assets
        $comm_assets = array();
        $categories = \App\AssetType::get()->pluck('name', 'id')->prepend('Please select', '');
		$subcategories = \App\AssetcatType::get()->pluck('name', 'id')->prepend('Please select', '');
        $fileuploadable = 1;
        return view('topics.breakdowndaily-edit', compact('communities','comm_assets','userid','site_id','categories','subcategories','fileuploadable'));
    } 
    public function breakdownUpdate($id)
    {
        $userid = Auth::user()->id;
        $breakdown = Breakdown::findOrFail($id);
        $site_id = $breakdown->site_id;
        $comasset = CommunityAsset::where('id', $breakdown->asset_id)->first();
        $communities = \App\Site::get()->pluck('name', 'id')->prepend('Please select', '');
        $comm_assets = CommunityAsset::select('id','code','name')->where('site_id', $site_id)->orderBy('code','asc')->get();
		$other_assets = \App\OtherAsset::select('id','code','name')->where('site_id', $site_id)->orderBy('code','asc')->get();
        $categories = \App\AssetType::get()->pluck('name', 'id')->prepend('Please select', '');
		$subcategories = \App\AssetcatType::get()->pluck('name', 'id')->prepend('Please select', '');
        $fileuploadable = 1;
        $attachments = \App\Attachment::select('id','title','file','atype')->where('atype','breakdown')->where('main_id',$id)->orderBy('title','asc')->get();

        return view('topics.breakdown-edit', compact('communities','breakdown','comm_assets','other_assets','userid','site_id','fileuploadable','attachments','categories','subcategories','comasset'));

    }
    public function breakdownView($id)
    {
        $breakdown = Breakdown::findOrFail($id);
        if(!$breakdown) return redirect('/topics/breakdown')->withErrors('Breakdown not found');
        $site = \App\Site::where('id',$breakdown->site_id)->first();
        $sitename = "";
        if($site) $sitename = $site->name;
        $comasset = CommunityAsset::where('id', $breakdown->asset_id)->first();
        $category = \App\AssetType::where('id',$comasset?$comasset->category_id:0)->first();
        $catgname = "";
        if($category) $catgname = $category->name;

        $attachments = \App\Attachment::select('id','title','file','atype')->where('atype','breakdown')->where('main_id',$id)->orderBy('title','asc')->get();
        return view('topics.breakdown-view', compact('breakdown','sitename','comasset','attachments','catgname'));
    }
	
	
	public function getbreakdownprint(Request $request)
    {
		$edata = $request->all();
		$id = $edata['jcardid'];
		
        $breakdown = Breakdown::findOrFail($id);
        if(!$breakdown) return redirect('/topics/breakdown')->withErrors('Breakdown not found');
        $site = \App\Site::where('id',$breakdown->site_id)->first();
        $sitename = "";
        if($site) $sitename = $site->name;
        $comasset = CommunityAsset::where('id', $breakdown->asset_id)->first();
        $category = \App\AssetType::where('id',$comasset?$comasset->category_id:0)->first();
        $catgname = "";
        if($category) $catgname = $category->name;

        $attachments = \App\Attachment::select('id','title','file','atype')->where('atype','breakdown')->where('main_id',$id)->orderBy('title','asc')->get();
        return view('topics.breakdownprint', compact('breakdown','sitename','comasset','attachments','catgname'));
    }
	
	
	public function getbreakdowndownload(Request $request)
    {
		$edata = $request->all();
		$id = $edata['jcardid'];
		
        $breakdown = Breakdown::findOrFail($id);
        if(!$breakdown) return redirect('/topics/breakdown')->withErrors('Breakdown not found');
        $site = \App\Site::where('id',$breakdown->site_id)->first();
        $sitename = "";
        if($site) $sitename = $site->name;
        $comasset = CommunityAsset::where('id', $breakdown->asset_id)->first();
        $category = \App\AssetType::where('id',$comasset?$comasset->category_id:0)->first();
        $catgname = "";
        if($category) $catgname = $category->name;

        $attachments = \App\Attachment::select('id','title','file','atype')->where('atype','breakdown')->where('main_id',$id)->orderBy('title','asc')->get();
		
		ini_set('max_execution_time', 300);
		ini_set('mbstring.encoding_translation', 'On');
		
		$pdf = PDF::loadView('topics.breakpdfReport',  compact('breakdown','sitename','comasset','attachments','catgname'));
		
		// $pdf->setPaper('A4', 'landscape');
		 
		date_default_timezone_set('Asia/Kolkata');
		$today_date = date('d-m-Y H:i:s');
		
		
		// return $pdf->download('metrowater.pdf'); //Download    
		return $pdf->download('breakdownreports_'.$today_date.'.pdf');
    }
	
	
    public function breakdownDelete($id)
    {
        $asset = Breakdown::findOrFail($id);

        $asset->delete();
        //attachments
        $this->topic_delete_attachments($id,'breakdown');

        return redirect('/topics/breakdown');

    }
    public function breakdownSave(BreakdownRequest $request)
    {
        //echo "NO";
        $userid = Auth::user()->id;
        $edata = $request->all();
		$other_code = "";
       // print_r($edata);
		//exit; 
        if($edata['taction']=="save") {
            $refid = '';
            /*$eRow = CommunityAsset::where('id', $edata['asset_id'])->first();
            $site_id = $eRow?$eRow->site_id:0;
            $edata['site_id'] = $site_id;
            if($edata['site_id']) {
                $eRow = Site::where('id', $edata['site_id'])->first();
                if($eRow) $refid .= $eRow->prefix.'_';
            }*/
            $dt1 = $edata['bdate'];
            $dt = explode("-", $edata['bdate']);//d-m-y
            $edata['bdate'] = $dt[2].'-'.$dt[1].'-'.$dt[0].' '.$edata['bdtime'].':00';
            if($edata['id']) {
                $eRow = Breakdown::where('id', $edata['id'])->first();
                $etData = [
                    'asset_id' => $edata['asset_id'],
                    'site_id' => $edata['site_id'],
                    'title' => $edata['title'],
                    'bdate' => $edata['bdate'],
                    'info' => $edata['info'],
					'category_id' => $edata['category_id'],
					'sub_category_id' => (int)$edata['itemsubcategory'],
                    'action' => $edata['action']
                ];
                $eRow->update($etData);
                $bid = $edata['id'];
            } else {
				if(isset($edata['asset_id']) && $edata['asset_id']=='other')
				{
					if(isset($edata['other_text']) && $edata['other_text']!="")
					{
					
						$esRow = Site::where('id', $edata['site_id'])->first();
						$siteprefix=$esRow?$esRow->prefix:'';	
						$other_code = "A".str_replace("_","",$siteprefix);
						
						$category = \App\AssetType::where('id',$edata['category_id']?$edata['category_id']:0)->first();
						$catgname = "";
						if($category) $catgname = $category->name;
						$k = strtolower(substr($catgname,0,3));
						$other_code .= "_".$k."_".$edata['other_text'];
						
						 
						 $etData = [
							'name' => $edata['other_text'],
							'code' => $other_code,
							'category_id' => $edata['category_id'],
							'site_id' => $edata['site_id'],
							'user_id' => Auth::user()->id,
							'created_at' => date('Y-m-d H:i:s')
						];	
						
						$oid = OtherAsset::insertGetId($etData);
						$e_matchRow = \App\OtherAsset::where('id',$oid)->orderBy('id', 'DESC')->first();
						$resmatch_cn=  $e_matchRow['code']."_".$oid;
						$etauData = [
							'code' => $resmatch_cn
							];
						$e_matchRow->update($etauData);
					}
					else
					{
						$oid = $edata['oasset_dropdown'];
					}
				
				}
				
				if($edata['asset_id']=='other')
				{ 
					$asId = $oid;
					$other = 1;
				}
				else {
					$asId = $edata['asset_id'];
					$other = 0;
				}
				
                $etData = [
                    'refid' => '',
                    'asset_id' => $asId,
                    'site_id' => $edata['site_id'],
                    'title' => $edata['title'],
                    'bdate' => $edata['bdate'],
                    'info' => $edata['info'],
					'category_id' => $edata['category_id'],
					'sub_category_id' => (int)$edata['itemsubcategory'],
                    'action' => $edata['action'],
                    'user_id' => Auth::user()->id,
					'other' => $other,
                    'created_at' => date('Y-m-d H:i:s')
                ];
                $bid = Breakdown::insertGetId($etData);
                $eRow = Breakdown::where('id', $bid)->first();
            }
			
			// SITE BASE LAST INSERT ID
			      $resmatch_cn = 1;
						$match_last_site_f =  ['site_id' => $edata['site_id'], 'type' => 'br'];
						$match_count = \App\Auditsum::where($match_last_site_f)->count(); 
						if($match_count > 0){
						$e_matchRow = \App\Auditsum::where($match_last_site_f)->orderBy('id', 'DESC')->first();
						$resmatch_cn=  (int)$e_matchRow['count'] + 1;
						$etauData = [
							'count' => $resmatch_cn
							];
						$e_matchRow->update($etauData);
						}
						else{
							$etauData = [
							'count' => 1,
							'type' => 'br',
							'site_id' => $edata['site_id']
							];
							 $match_cnr_id = \App\Auditsum::insertGetId($etauData);
						}
					
			 // ED GET LAST BASE INSERTED ID
			
			
            $refid .= 'bd_asid_';
            $refid .= str_replace("-", "_", $dt1);
            //ss// $refid .= '_'.str_pad($bid,5,"0",STR_PAD_LEFT);;
			$refid .= '_'.str_pad($resmatch_cn,5,"0",STR_PAD_LEFT);
			
			// Ref Code
			
			$ref_code = "";
			$esRow = Site::where('id', $edata['site_id'])->first();
            $siteprefix=$esRow?$esRow->prefix:'';	
			$ref_code .= $siteprefix;
			$title = str_replace(" ",'_',$eRow->title); 
			
			$ref_code .= '_'.$bid.'_'.$title;    
			// End Ref Code
			 
            $etData = [
                    'refid' => $ref_code,
					'ref_code' => $refid
                ];
            $eRow->update($etData);
            //History card
            $etData = [
                'htype' => '1',
                'ref_idno' => $ref_code,
                'refid' => $bid,
                'site_id' => $edata['site_id']
            ];
            Historycard::create($etData);
            //attachments
            $this->topic_attachments($edata,$bid,'breakdown');
            return redirect('/topics/breakdown');
        }
        return redirect()->back()->withErrors('Incompleted details.');
    }

    //Topics attachments
    function topic_attachments($edata,$id,$atype) {
        //attachments delete
        $attachment_deletes = $edata['attachment_delete'];
        if($attachment_deletes) $attachment_deletes = explode(",", $attachment_deletes);
        if($attachment_deletes) {
            foreach ($attachment_deletes as $aid) {
                if(!is_numeric($aid)) continue;
                $attachment = \App\Attachment::where('atype',$atype)->where('id',$aid)->first();
                if($attachment) {
                    $attachment->delete();
                    $task_file = public_path().'/uploads/'.$atype.'/'.$attachment->file;
                    if(file_exists($task_file)) @unlink($task_file);
                }
            }
        }
        //Task attachments
        if(isset($edata['ufilepath']) && $edata['ufilepath']) {
            $fnames = $edata['ufilename'];
            $task_dir = public_path().'/uploads/'.$atype.'/'.$id;
            if(!file_exists($task_dir)) {
                mkdir($task_dir, 0777, true);
            }
            foreach($edata['ufilepath'] as $fi=>$fv) {
                if(empty($fv)) continue;
                if(!file_exists($fv)) continue;
                $old = public_path().'/'.$fv;
                $sfile = basename($fv);
                $new = $task_dir.'/'.$sfile;
                if(rename($old,$new)) {
                    $fname = $fnames[$fi];
                    if(empty($fname)) $fname = basename($fv);
                    $fv = $id.'/'.$sfile;
                    $etfdata = [
                            'main_id' => $id,
                            'atype' => $atype,
                            'file' => $fv,
                            'title' => $fname
                        ];
                    \App\Attachment::create($etfdata);    
                }                
            }
        }
    }
    //Delete topic attachments
    function topic_delete_attachments($id,$atype) {
        $taskfiles = \App\Attachment::where('main_id',$id)->where('atype',$atype);
        if($taskfiles->count()) {
            $task_files = $taskfiles->get();
            foreach ($task_files as $tfval) {
                $task_file = public_path().'/uploads/'.$atype.'/'.$tfval->file;
                if(file_exists($task_file)) @unlink($task_file);
            }
            $taskfiles->delete();
            $task_dir = public_path().'/uploads/'.$atype.'/'.$id;
            @rmdir($task_dir);
        }
    }

    //Incident
    public function incident(Request $request)
    {
		$communities = \App\Site::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');	
		
        $userid = Auth::user()->id;
        $site_id = 0;
		 $c = $request->input('c', 0);
        if($userid>1) {       
            $emprow = \App\Emp::where('id', '=', (int)Auth::user()->emp_id)->first();
            if($emprow) $site_id = (int)$emprow->community;
        }
        if($userid>1)
		{
            $incidents = Incident::select('incidents.*','sites.name as sitename','community_assets.name as comasset','other_assets.name as otherasset')->leftJoin('sites','sites.id','=','incidents.site_id')->leftJoin('community_assets','community_assets.id','=','incidents.asset_id')->leftJoin('other_assets','other_assets.id','=','incidents.asset_id');
			if($c) $incidents = $incidents->where('incidents.site_id', $c);
			$incidents = $incidents->orderBy('incidents.id','desc')->get();		
			
		}
        else
		{
            $incidents = Incident::select('incidents.*','sites.name as sitename','community_assets.name as comasset','other_assets.name as otherasset')->leftJoin('sites','sites.id','=','incidents.site_id')->leftJoin('community_assets','community_assets.id','=','incidents.asset_id')->leftJoin('other_assets','other_assets.id','=','incidents.asset_id');			
			if($c) $incidents = $incidents->where('incidents.site_id', $c);
			$incidents = $incidents->orderBy('incidents.id','desc')->get();
		}
        $sno=1;
        return view('topics.incident', compact('incidents','sno','communities'));
    }
	
	
	
	//Incident
    public function incidentSites(Request $request)
    {
		$edata = $request->all();
		$jsite_id = $edata['siteid'];
		$communities = \App\Site::get()->pluck('name', 'id')->prepend('All', '');
        $userid = Auth::user()->id;
        $site_id = 0;
        if($userid>1) {       
            $emprow = \App\Emp::where('id', '=', (int)Auth::user()->emp_id)->first();
            if($emprow) $site_id = (int)$emprow->community;
        }
        if($userid>1)
            $incidents = Incident::select('incidents.*','sites.name as sitename','community_assets.name as comasset')->leftJoin('sites','sites.id','=','incidents.site_id')->leftJoin('community_assets','community_assets.id','=','incidents.asset_id')->where('incidents.site_id','=',$jsite_id)->orderBy('id','desc')->get();
        else
            $incidents = Incident::select('incidents.*','sites.name as sitename','community_assets.name as comasset')->leftJoin('sites','sites.id','=','incidents.site_id')->leftJoin('community_assets','community_assets.id','=','incidents.asset_id')->where('incidents.site_id','=',$jsite_id)->orderBy('id','desc')->get();

        $sno=1;
        return view('topics.incident-sites', compact('incidents','sno','communities'));
    }
	
	
	
	
    public function incidentEdit()
    {
        $userid = Auth::user()->id;
        $site_id = 0;
        if($userid>1) {       
            $emprow = \App\Emp::where('id', '=', (int)Auth::user()->emp_id)->first();
            if($emprow) $site_id = (int)$emprow->community;
        }
        $communities = \App\Site::get()->pluck('name', 'id')->prepend('Please select', '');
       //assets
        $comm_assets = array();
		$other_assets = array();
        $categories = \App\AssetType::get()->pluck('name', 'id')->prepend('Please select', '');
		$subcategories = \App\AssetcatType::get()->pluck('name', 'id')->prepend('Please select', '');
        $fileuploadable = 1;
        return view('topics.incident-edit', compact('communities','comm_assets','other_assets','userid','site_id','categories','fileuploadable','subcategories'));
    }
	 public function incidentdaily()
    {
	   $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); 
        $userid = Auth::user()->id;
        $site_id = 0;
        if($userid>1) {       
            $emprow = \App\Emp::where('id', '=', (int)Auth::user()->emp_id)->first();
            if($emprow) $site_id = (int)$emprow->community;
        }
		 $site_id = $uriSegments[3];
        $communities = \App\Site::get()->pluck('name', 'id')->prepend('Please select', '');
       //assets
        $comm_assets = array();
        $categories = \App\AssetType::get()->pluck('name', 'id')->prepend('Please select', '');
		$subcategories = \App\AssetcatType::get()->pluck('name', 'id')->prepend('Please select', '');
        $fileuploadable = 1;
        return view('topics.incidentdaily-edit', compact('communities','comm_assets','userid','site_id','categories','fileuploadable','subcategories'));
    }
    public function incidentUpdate($id)
    {
       
        $incident = Incident::findOrFail($id);
        $userid = Auth::user()->id;
        $site_id = $incident->site_id;
        $comasset = CommunityAsset::where('id', $incident->asset_id)->first();
        $communities = \App\Site::get()->pluck('name', 'id')->prepend('Please select', '');
        $comm_assets = CommunityAsset::select('id','code','name')->where('site_id', $site_id)->orderBy('code','asc')->get();
         $other_assets = \App\OtherAsset::select('id','code','name')->where('site_id', $site_id)->orderBy('code','asc')->get();
        $categories = \App\AssetType::get()->pluck('name', 'id')->prepend('Please select', '');
        $fileuploadable = 1;
		$subcategories = \App\AssetcatType::get()->pluck('name', 'id')->prepend('Please select', '');
        $attachments = \App\Attachment::select('id','title','file','atype')->where('atype','incident')->where('main_id',$id)->orderBy('title','asc')->get();
        return view('topics.incident-edit', compact('communities','incident','comm_assets','other_assets','userid','site_id','fileuploadable','attachments','categories','comasset','subcategories'));

    }
   
    public function incidentView($id)
    {
        $incident = Incident::findOrFail($id);
        if(!$incident) return redirect('/topics/incident')->withErrors('Incident not found');
        $site = \App\Site::where('id',$incident->site_id)->first();
        $sitename = "";
        if($site) $sitename = $site->name;
        $comasset = CommunityAsset::where('id', $incident->asset_id)->first();
        $category = \App\AssetType::where('id',$comasset?$comasset->category_id:0)->first();
        $catgname = "";
        if($category) $catgname = $category->name;

        $attachments = \App\Attachment::select('id','title','file','atype')->where('atype','incident')->where('main_id',$id)->orderBy('title','asc')->get();
        return view('topics.incident-view', compact('incident','sitename','comasset','attachments','catgname'));
    }
	
	
	 public function getincidentcardprint(Request $request)
     {
	 	$edata = $request->all();
		$id = $edata['jcardid'];
		
        $incident = Incident::findOrFail($id);
        if(!$incident) return redirect('/topics/incident')->withErrors('Incident not found');
        $site = \App\Site::where('id',$incident->site_id)->first();
        $sitename = "";
        if($site) $sitename = $site->name;
        $comasset = CommunityAsset::where('id', $incident->asset_id)->first();
        $category = \App\AssetType::where('id',$comasset?$comasset->category_id:0)->first();
        $catgname = "";
        if($category) $catgname = $category->name;

        $attachments = \App\Attachment::select('id','title','file','atype')->where('atype','incident')->where('main_id',$id)->orderBy('title','asc')->get();		
        return view('topics.incidentprint', compact('incident','sitename','comasset','attachments','catgname'));
    }
	
    public function incidentDelete($id)
    {

        $asset = Incident::findOrFail($id);

        $asset->delete();
        //attachments
        $this->topic_delete_attachments($id,'incident');

        return redirect('/topics/incident');

    }
    public function incidentSave(IncidentRequest $request)
    {
        //echo "NO";
        $edata = $request->all();
        //print_r($edata);
        if($edata['taction']=="save") {
            $refid = '';
            $eRow = CommunityAsset::where('id', $edata['asset_id'])->first();
           /* $site_id = $eRow?$eRow->site_id:0;
            $edata['site_id'] = $site_id;
            if($edata['site_id']) {
                $eRow = Site::where('id', $edata['site_id'])->first();
                if($eRow) $refid .= $eRow->prefix.'_';
            }*/
            $dt1 = $edata['idate'];
            $dt = explode("-", $edata['idate']);//d-m-y
            $edata['idate'] = $dt[2].'-'.$dt[1].'-'.$dt[0].' '.$edata['bdtime'].':00';
            if($edata['id']) {
                if(isset($edata['title']) && $edata['title']!="") $title = $edata['title'];
                else $title = "";

                if(isset($edata['category_id']) && $edata['category_id']!="") $cid = $edata['category_id'];
                else $cid = 0;

                if(isset($edata['itemsubcategory']) && $edata['itemsubcategory']!="") $sid = $edata['itemsubcategory'];
                else $sid = 0;

                $eRow = Incident::where('id', $edata['id'])->first();
                $etData = [
                    'asset_id' => $edata['asset_id'],
                    'site_id' => $edata['site_id'],
                    'title' => $title,
                    'category_id' => $cid,
                    'sub_category_id' => $sid,
                    'idate' => $edata['idate'],
                    'failure_reason' => $edata['failure_reason'],
                    'required_spares' => $edata['required_spares'],
                    'process_work' => $edata['process_work']
                ];
                $eRow->update($etData);
                $bid = $edata['id'];
            } else {
				if(isset($edata['asset_id']) && $edata['asset_id']=='other')
				{
					if(isset($edata['other_text']) && $edata['other_text']!="")
					{
					$esRow = Site::where('id', $edata['site_id'])->first();
					$siteprefix=$esRow?$esRow->prefix:'';	
					$other_code = "A".str_replace("_","",$siteprefix);
					
					$category = \App\AssetType::where('id',$edata['category_id']?$edata['category_id']:0)->first();
					$catgname = "";
					if($category) $catgname = $category->name;
					$k = strtolower(substr($catgname,0,3));
					$other_code .= "_".$k."_".$edata['other_text'];
					
					 
					 $etData = [
						'name' => $edata['other_text'],
						'code' => $other_code,
						'category_id' => $edata['category_id'],
						'site_id' => $edata['site_id'],
						'user_id' => Auth::user()->id,
						'created_at' => date('Y-m-d H:i:s')
					];	
					
					$oid = OtherAsset::insertGetId($etData);
					
					$e_matchRow = \App\OtherAsset::where('id',$oid)->orderBy('id', 'DESC')->first();
					$resmatch_cn=  $e_matchRow['code']."_".$oid;
					$etauData = [
						'code' => $resmatch_cn
						];
					$e_matchRow->update($etauData);
				  }				  
				  else
				  {
					$oid = $edata['oasset_dropdown'];
				  }
				}
				
				
				
				if($edata['asset_id']=='other')
				{ 
					$asId = $oid;
					$other = 1;
				}
				else {
					$asId = $edata['asset_id'];
					$other = 0;
				}
                if(isset($edata['title']) && $edata['title']!="") $title = $edata['title'];
                else $title = "";

                if(isset($edata['category_id']) && $edata['category_id']!="") $cid = $edata['category_id'];
                else $cid = 0;

                if(isset($edata['itemsubcategory']) && $edata['itemsubcategory']!="") $sid = $edata['itemsubcategory'];
                else $sid = 0;


                $etData = [
                    'refid' => '',
                    'asset_id' => $asId,
                    'site_id' => $edata['site_id'],
                    'idate' => $edata['idate'],
                    'title' => $title,
                    'category_id' => $cid,
                    'sub_category_id' => $sid,
                    'failure_reason' => $edata['failure_reason'],
                    'required_spares' => $edata['required_spares'],
                    'process_work' => $edata['process_work'],
                    'user_id' => Auth::user()->id,
					'other' => $other,
                    'created_at' => date('Y-m-d H:i:s')
                ];
                $bid = Incident::insertGetId($etData);
                $eRow = Incident::where('id', $bid)->first();
            }
			
			
			// SITE BASE LAST INSERT ID
			      $resmatch_cn = 1;
						$match_last_site_f =  ['site_id' => $edata['site_id'], 'type' => 'inc'];
						$match_count = \App\Auditsum::where($match_last_site_f)->count(); 
						if($match_count > 0){
						$e_matchRow = \App\Auditsum::where($match_last_site_f)->orderBy('id', 'DESC')->first();
						$resmatch_cn=  (int)$e_matchRow['count'] + 1;
						$etauData = [
							'count' => $resmatch_cn
							];
						$e_matchRow->update($etauData);
						}
						else{
							$etauData = [
							'count' => 1,
							'type' => 'inc',
							'site_id' => $edata['site_id']
							];
							 $match_cnr_id = \App\Auditsum::insertGetId($etauData);
						}
					
			 // ED GET LAST BASE INSERTED ID
			 
            $refid .= 'inr_asid_';
            $refid .= str_replace("-", "_", $dt1);
            //$refid .= '_'.str_pad($bid,5,"0",STR_PAD_LEFT);
			$refid .= '_'.str_pad($resmatch_cn,5,"0",STR_PAD_LEFT);
            $etData = [
                    'refid' => $refid
                ];
            $eRow->update($etData);
            //History card
            $etData = [
                'htype' => '2',
                'ref_idno' => $refid,
                'refid' => $bid,
                'site_id' => $edata['site_id']
            ];
            Historycard::create($etData);
            //attachments
            $this->topic_attachments($edata,$bid,'incident');
            return redirect('/topics/incident');
        }
        return redirect()->back()->withErrors('Incompleted details.');
    }

    //jobcard
    public function jobcard(Request $request)
    {
        $userid = Auth::user()->id;
		$communities = \App\Site::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');	
        $site_id = 0;
        $c = $request->input('c', 0);
		
		
        if($userid>1) {       
            $emprow = \App\Emp::where('id', '=', (int)Auth::user()->emp_id)->first();
            if($emprow) $site_id = (int)$emprow->community;
            $jobcards = Jobcard::select("jobcards.*",'sites.name as sitename','asset_types.name as cname')
			->leftJoin('sites','sites.id','=','jobcards.site_id')
			->leftJoin('asset_types','asset_types.id','=','jobcards.category_id');
			if($c) $jobcards = $jobcards->where('jobcards.site_id', $c);
			$jobcards = $jobcards->orderBy('jobcards.id','desc')->get();
		}
        else
		{
            $jobcards = Jobcard::select("jobcards.*",'sites.name as sitename','asset_types.name as cname')
            ->leftJoin('sites','sites.id','=','jobcards.site_id')
			->leftJoin('asset_types','asset_types.id','=','jobcards.category_id');
			if($c) $jobcards = $jobcards->where('jobcards.site_id', $c);
			$jobcards = $jobcards->orderBy('jobcards.id','desc')->get();
		}
        $sno=1;
        $jbtypes = array(''=>'Please select',1=>'Break Down',2=>'Incident Report',3=>'AMC',4=>'New');
        return view('topics.jobcard', compact('jobcards','sno','jbtypes','communities'));
    }
	
	public function getjcardprint(Request $request)
	{
		$edata = $request->all();
		$id = $edata['jcardid'];
		
		 $jobcard = Jobcard::findOrFail($id);
        if(!$jobcard) return redirect('/topics/jobcard')->withErrors('Jobcard not found');
        $site = \App\Site::where('id',$jobcard->site_id)->first();
        $sitename = "";
        if($site) $sitename = $site->name;
        $jbtypes = array(''=>'Please select',1=>'Break Down',2=>'Incident Report',3=>'AMC',4=>'New');
        $comasset=array();
        if($jobcard->jctype=="1") {
            $jbref = Breakdown::where('id', $jobcard->jcref)->first();
            $comasset = CommunityAsset::where('id', $jbref->asset_id)->first();
        } else if($jobcard->jctype=="2"){
            $jbref = Incident::where('id', $jobcard->jcref)->first();
            $comasset = CommunityAsset::where('id', $jbref->asset_id)->first();
        } else {
            $jbref = \App\CommunityAsset::where('id', $jobcard->jcref)->first();
            $comasset = $jbref;
        }

        $category = \App\AssetType::where('id',$comasset?$comasset->category_id:0)->first();
	
        $catgname = "";
        if($category) $catgname = $category->name;

        $vendor = \App\Vendor::where('id',$comasset?$comasset->vendor:0)->first();
        $vendorname = "";
		if($jobcard['emp_type'] == 2){
        if($vendor) $vendorname = $vendor->name;
		}
		$Subcatname = "";
		if($jobcard['jctype'] == 1){
         $jbref_sub = Breakdown::where('id', $jobcard->jcref)->first();
		 $subcatid = $jbref_sub['sub_category_id'];
		 $sub_category = \App\AssetcatType::where('id',$subcatid?$subcatid:0)->first();
		 $Subcatname =  $sub_category['name'];
		}
		

        $jobcardusers = JobcardUser::select('user_id','emps.name as username','sites.name as sitename','sites.id as siteid')
                        ->where('jobcard_id',$id)
                        ->leftJoin('emps','emps.id','=','jobcard_users.user_id')
                        ->leftJoin('sites','sites.id','=','emps.community')
                        ->orderBy('sites.name','asc')
                        ->orderBy('emps.name','asc')
                        ->get();
        return view('topics.jcardprint', compact('jobcard','sitename','jbtypes','vendorname','jobcardusers','jbref','comasset','catgname','Subcatname'));
	}
	
	
	public function getjcarddownload(Request $request)
	{
		$edata = $request->all();
		$id = $edata['jcardid'];
		
		 $jobcard = Jobcard::findOrFail($id);
        if(!$jobcard) return redirect('/topics/jobcard')->withErrors('Jobcard not found');
        $site = \App\Site::where('id',$jobcard->site_id)->first();
        $sitename = "";
        if($site) $sitename = $site->name;
        $jbtypes = array(''=>'Please select',1=>'Break Down',2=>'Incident Report',3=>'AMC',4=>'New');
        $comasset=array();
        if($jobcard->jctype=="1") {
            $jbref = Breakdown::where('id', $jobcard->jcref)->first();
            $comasset = CommunityAsset::where('id', $jbref->asset_id)->first();
        } else if($jobcard->jctype=="2"){
            $jbref = Incident::where('id', $jobcard->jcref)->first();
            $comasset = CommunityAsset::where('id', $jbref->asset_id)->first();
        } else {
            $jbref = \App\CommunityAsset::where('id', $jobcard->jcref)->first();
            $comasset = $jbref;
        }

        $category = \App\AssetType::where('id',$comasset?$comasset->category_id:0)->first();
	
        $catgname = "";
        if($category) $catgname = $category->name;

        $vendor = \App\Vendor::where('id',$comasset?$comasset->vendor:0)->first();
        $vendorname = "";
		if($jobcard['emp_type'] == 2){
        if($vendor) $vendorname = $vendor->name;
		}
		$Subcatname = "";
		if($jobcard['jctype'] == 1){
         $jbref_sub = Breakdown::where('id', $jobcard->jcref)->first();
		 $subcatid = $jbref_sub['sub_category_id'];
		 $sub_category = \App\AssetcatType::where('id',$subcatid?$subcatid:0)->first();
		 $Subcatname =  $sub_category['name'];
		}
		

        $jobcardusers = JobcardUser::select('user_id','emps.name as username','sites.name as sitename','sites.id as siteid')
                        ->where('jobcard_id',$id)
                        ->leftJoin('emps','emps.id','=','jobcard_users.user_id')
                        ->leftJoin('sites','sites.id','=','emps.community')
                        ->orderBy('sites.name','asc')
                        ->orderBy('emps.name','asc')
                        ->get();
       
		
		ini_set('max_execution_time', 300);
		ini_set('mbstring.encoding_translation', 'On');
		
		$pdf = PDF::loadView('topics.pdfReport', compact('jobcard','sitename','jbtypes','vendorname','jobcardusers','jbref','comasset','catgname','Subcatname'));
		
		// $pdf->setPaper('A4', 'landscape');
		 
		date_default_timezone_set('Asia/Kolkata');
		$today_date = date('d-m-Y H:i:s');
		
		
		// return $pdf->download('metrowater.pdf'); //Download    
		return $pdf->download('jobcardreports_'.$today_date.'.pdf');
	}
	
	
	
	public function getincidentdownload(Request $request)
	{
		$edata = $request->all();
		$id = $edata['jcardid'];
		
        $incident = Incident::findOrFail($id);
        if(!$incident) return redirect('/topics/incident')->withErrors('Incident not found');
        $site = \App\Site::where('id',$incident->site_id)->first();
        $sitename = "";
        if($site) $sitename = $site->name;
        $comasset = CommunityAsset::where('id', $incident->asset_id)->first();
        $category = \App\AssetType::where('id',$comasset?$comasset->category_id:0)->first();
        $catgname = "";
        if($category) $catgname = $category->name;

        $attachments = \App\Attachment::select('id','title','file','atype')->where('atype','incident')->where('main_id',$id)->orderBy('title','asc')->get();	
		ini_set('max_execution_time', 300);
		ini_set('mbstring.encoding_translation', 'On');
		
		$pdf = PDF::loadView('topics.incidentpdfReport',  compact('incident','sitename','comasset','attachments','catgname'));
		
		// $pdf->setPaper('A4', 'landscape');
		 
		date_default_timezone_set('Asia/Kolkata');
		$today_date = date('d-m-Y H:i:s');
		
		
		// return $pdf->download('metrowater.pdf'); //Download    
		return $pdf->download('incidentcardreports_'.$today_date.'.pdf');
	}
	
	
    public function jobcardEdit()
    {
        $userid = Auth::user()->id;
		$jobcard_spares = array(); 
        $site_id = 0;
        if($userid>1) {       
            $emprow = \App\Emp::where('id', '=', (int)Auth::user()->emp_id)->first();
            if($emprow) $site_id = (int)$emprow->community;
        }
        $communities = \App\Site::get()->pluck('name', 'id')->prepend('Please select', '');
       //assets
        if($userid>1) {
            $comm_assets = CommunityAsset::select('id','code','name')->where('site_id', $site_id)->orderBy('code','asc')->get();
        }
        else {
            //$comm_assets = \App\CommunityAsset::select('id','code','name')->get();
            $comm_assets = array();
        }
		$spares_List = array();
        $jbtypes = array(''=>'Please select',1=>'Break Down',2=>'Incident Report',3=>'AMC',4=>'New');
        $sparestypes = array(''=>'Please select',"Spare 1"=>'Spare 1',"Spare 2"=>'Spare 2',"Spare 3"=>'Spare 3');
		$spares_list = \App\Item::orderBy('description','asc')->get()->pluck('description', 'id')->prepend('Please select', '');
        $statuses = array("Inprocess"=>'Inprocess',"Hold"=>'Hold',"Completed"=>'Completed');
        $vendors = \App\Vendor::orderBy('name','asc')->get()->pluck('name', 'id')->prepend('Please select', '');
        $categories = \App\AssetType::get()->pluck('name', 'id')->prepend('Please select', '');
        $jobcardusers = array();
		$jobcard = array();
        return view('topics.jobcard-edit', compact('comm_assets','jbtypes','sparestypes','vendors','statuses','jobcardusers','communities','userid','site_id','categories','spares_List','spares_list','jobcard_spares'));
    }
	
	 public function jobcarddaily()
    {
	
	    $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); 
		 $site_id = $uriSegments[3]; 
        $userid = Auth::user()->id;
        $site_id = 0;
        if($userid>1) {       
            $emprow = \App\Emp::where('id', '=', (int)Auth::user()->emp_id)->first();
            if($emprow) $site_id = (int)$emprow->community;
        }
        $communities = \App\Site::get()->pluck('name', 'id')->prepend('Please select', '');
       //assets
        if($userid>1) {
            $comm_assets = CommunityAsset::select('id','code','name')->where('site_id', $site_id)->orderBy('code','asc')->get();
        }
        else {
            //$comm_assets = \App\CommunityAsset::select('id','code','name')->get();
            $comm_assets = array();
        }
		 $site_id = $uriSegments[3]; 
		$spares_List = array();
        $jbtypes = array(''=>'Please select',1=>'Break Down',2=>'Incident Report',3=>'AMC',4=>'New');
        $sparestypes = array(''=>'Please select',"Spare 1"=>'Spare 1',"Spare 2"=>'Spare 2',"Spare 3"=>'Spare 3');
        $statuses = array("Inprocess"=>'Inprocess',"Hold"=>'Hold',"Completed"=>'Completed');
        $vendors = \App\Vendor::orderBy('name','asc')->get()->pluck('name', 'id')->prepend('Please select', '');
        $categories = \App\AssetType::get()->pluck('name', 'id')->prepend('Please select', '');
        $jobcardusers = array();
		$jobcard = array();
        return view('topics.jobcarddaily-edit', compact('comm_assets','jbtypes','sparestypes','vendors','statuses','jobcardusers','communities','userid','site_id','categories','spares_List'));
    }
	
    public function jobcardUpdate($id)
    {
        $userid = Auth::user()->id;
        $jobcard = Jobcard::findOrFail($id);
        $site_id = $jobcard->site_id;
        $communities = \App\Site::get()->pluck('name', 'id')->prepend('Please select', '');
        $comm_assets = CommunityAsset::select('id','code','name')->where('site_id', $site_id)->orderBy('code','asc')->get();
		//echo $jobcard->spares;
		$selected_spares = array();
		$itemsarr=explode(",",$jobcard->spares); 
		/*echo "<pre>";
			   print_r($itemsarr);
			echo "</pre>";*/
		 if($jobcard->spares) {
				//$selected_spares = DB::table('items')->whereIn('id', array($jobcard->spares))->get();
				$selected_spares = Item::whereIn('id', $itemsarr)->pluck('id'); 
			}
			
		$jobcard_spares = Jobcarditem::where('jobcard_id', $id)->get();
			
			
			/*echo "<pre>";
			   print_r($selected_spares);
			echo "</pre>";
			  
			exit; */

        
        $jbtypes = array(''=>'Please select',1=>'Break Down',2=>'Incident Report',3=>'AMC',4=>'New');
        $sparestypes = array(''=>'Please select',"Spare 1"=>'Spare 1',"Spare 2"=>'Spare 2',"Spare 3"=>'Spare 3');
		$spares_list = \App\Item::orderBy('description','asc')->get()->pluck('description', 'id')->prepend('Please select', '');
        $statuses = array("Inprocess"=>'Inprocess',"Hold"=>'Hold',"Completed"=>'Completed');
        $vendors = \App\Vendor::orderBy('name','asc')->get()->pluck('name', 'id')->prepend('Please select', '');
        $jobcardusers = JobcardUser::select('user_id','emps.name as username','sites.name as sitename','sites.id as siteid')
                        ->where('jobcard_id',$id)
                        ->leftJoin('emps','emps.id','=','jobcard_users.user_id')
                        ->leftJoin('sites','sites.id','=','emps.community')
                        ->orderBy('sites.name','asc')
                        ->orderBy('emps.name','asc')
                        ->get();
        $jcoptions = array();
  
        $comasset=array();
		$spares_List = array();
        if($jobcard->jctype=="1") {
            //$jcoptions = Breakdown::get()->pluck('refid', 'id')->prepend('Please select', ''); 
            $jcoptions[] = 'Please select';
            $jcoptionQuery = Breakdown::orderBy('id','desc')->get();
            if(count($jcoptionQuery)>0)
            {
                foreach($jcoptionQuery as $break)
                {
                        $jcoptions[$break['id']] = "Break_".$break['id']."_".$break['title'];
                }
            }

            $jbref = Breakdown::where('id', $jobcard->jcref)->first();
            //$comasset = CommunityAsset::where('id', $jbref->asset_id)->first();
			$mcat =  $jbref['category_id'];
			$subcat =  $jbref['sub_category_id'];
			$items_cn = Item::where('itemcategory', $mcat)->where('itemsubcategory',$subcat)->count();
			if($items_cn > 0){
			 	$spares_List = Item::where('itemcategory', $mcat)->where('itemsubcategory', $subcat)->get()->pluck('itemname', 'id')->prepend('Please select', '');
			}
			
        } else if($jobcard->jctype=="2") {
            //$jcoptions = Incident::get()->pluck('refid', 'id')->prepend('Please select', '');
            $jcoptions[] = 'Please select';
            $jcoptionQuery = Incident::orderBy('id','desc')->get();
            if(count($jcoptionQuery)>0)
            {
                foreach($jcoptionQuery as $incident)
                {
                        if($incident['title'])
                        {
                            $jcoptions[$incident['id']] = "Incident_".$incident['id']."_".$incident['title'];
                        }
                        else
                        {
                            $jcoptions[$incident['id']] = "Incident_".$incident['id']."_".$incident['refid'];
                        }
                }
            }
            $jbref = Incident::where('id', $jobcard->jcref)->first();
            //$comasset = CommunityAsset::where('id', $jbref->asset_id)->first();
        } else {
            $comasset = \App\CommunityAsset::where('id', $jobcard->jcref)->first();
        }
        $categories = \App\AssetType::get()->pluck('name', 'id')->prepend('Please select', '');
		
	
		
		
		/*echo "<pre>";
		   print_r($jobcard);
		echo "</pre>";
		exit;

        echo $jobcard->refid;     
		exit;*/
		
                
        return view('topics.jobcard-edit', compact('comm_assets','jbtypes','sparestypes','vendors','statuses','jobcard','jobcardusers','jcoptions','userid','communities','site_id','categories','comasset','spares_List','spares_list','selected_spares','jobcard_spares'));

    }
    public function jobcardView($id)
    {
        $jobcard = Jobcard::findOrFail($id);
        if(!$jobcard) return redirect('/topics/jobcard')->withErrors('Jobcard not found');
        $site = \App\Site::where('id',$jobcard->site_id)->first();
        $sitename = "";
        if($site) $sitename = $site->name;
        $jbtypes = array(''=>'Please select',1=>'Break Down',2=>'Incident Report',3=>'AMC',4=>'New');
        $comasset=array();
        if($jobcard->jctype=="1") {
            $jbref = Breakdown::where('id', $jobcard->jcref)->first();
            $comasset = CommunityAsset::where('id', $jbref->asset_id)->first();
        } else if($jobcard->jctype=="2"){
            $jbref = Incident::where('id', $jobcard->jcref)->first();
            $comasset = CommunityAsset::where('id', $jbref->asset_id)->first();
        } else {
            $jbref = \App\CommunityAsset::where('id', $jobcard->jcref)->first();
            $comasset = $jbref;
        }

        $category = \App\AssetType::where('id',$comasset?$comasset->category_id:0)->first();
	
        $catgname = "";
        if($category) $catgname = $category->name;

        $vendor = \App\Vendor::where('id',$comasset?$comasset->vendor:0)->first();
        $vendorname = "";
		if($jobcard['emp_type'] == 2){
        if($vendor) $vendorname = $vendor->name;
		}
		$Subcatname = "";
		if($jobcard['jctype'] == 1){
         $jbref_sub = Breakdown::where('id', $jobcard->jcref)->first();
		 $subcatid = $jbref_sub['sub_category_id'];
		 $sub_category = \App\AssetcatType::where('id',$subcatid?$subcatid:0)->first();
		 $Subcatname =  $sub_category['name'];
		}
		

        $jobcardusers = JobcardUser::select('user_id','emps.name as username','sites.name as sitename','sites.id as siteid')
                        ->where('jobcard_id',$id)
                        ->leftJoin('emps','emps.id','=','jobcard_users.user_id')
                        ->leftJoin('sites','sites.id','=','emps.community')
                        ->orderBy('sites.name','asc')
                        ->orderBy('emps.name','asc')
                        ->get();
        return view('topics.jobcard-view', compact('jobcard','sitename','jbtypes','vendorname','jobcardusers','jbref','comasset','catgname','Subcatname'));
    }
    public function jobcardDelete($id)
    {

        $asset = Jobcard::findOrFail($id);

        $asset->delete();
        JobcardUser::where('jobcard_id',$id)->delete();

        return redirect('/topics/jobcard');

    }
    public function jobcardSave(Request $request)
    {
        //echo "NO";
        $edata = $request->all();
		//echo '<pre>'; print_r($edata); echo '</pre>'; exit;
		if($edata['id']){
			Jobcarditem::where('jobcard_id',$edata['id'])->delete();
		}
	
		
	/*	if(!isset($edata['spares'])) $edata['spares'] = 0;
        //echo "<pre>"; print_r($edata); echo "</pre>";
		//exit;    
		if(isset($edata['spares'])) {
		  if(count( $edata['spares']) > 0){
		   $edata['spares'] =  implode(",",$edata['spares']);
		   }
		}else {
		  $edata['spares'] = 0; 
		} */
		
        if($edata['taction']=="save") {
            $refid = '';
            /*if($edata['site_id']) {
                $eRow = Site::where('id', $edata['site_id'])->first();
                if($eRow) $refid .= $eRow->prefix.'_';
            }*/
            //$dt1 = $edata['idate'];
            //$dt = explode("-", $edata['idate']);//d-m-y
            //$edata['idate'] = $dt[2].'-'.$dt[1].'-'.$dt[0];
            $jdate = '';
            $jcrefid= '';
            $site_id = $edata['site_id'];
            if(isset($edata['jenddate']) && $edata['jenddate']!="")
            {
                     $dt2 = explode("-", $edata['jenddate']);   
                     $jenddate = $dt2[2].'-'.$dt2[1].'-'.$dt2[0];   
            } 
            else
            {
               
                $k = date("d-m-Y");
                $dt2 = explode("-", $k); 
                $edate = $dt2[0]+1;  
                $jenddate = $dt2[2].'-'.$dt2[1].'-'.$edate;
            }

			if(isset($edata['jctype12']) && $edata['jctype12']!="") $jctype12 = $edata['jctype12'];
			else $jctype12 = "";
			
			if(isset($edata['jctype'])  && $edata['jctype']!="") $jctypen = $edata['jctype'];
			else $jctypen = "";
			
            if($jctypen=="1") {
                $eRow = Breakdown::where('id', $jctype12)->first();
                if($eRow) {
                    $jdate = $eRow->bdate;
                    $jcrefid = $jctype12;
                    $site_id = $eRow->site_id;
					$edata['category_id'] = $eRow->category_id;
                }
            } else if($jctypen=="2") {
                $eRow = Incident::where('id', $jctype12)->first();
                if($eRow) {
                    $jdate = $eRow->idate;
                    $jcrefid = $jctype12;
                    $site_id = $eRow->site_id;
                    $edata['category_id'] = $eRow->category_id;
                }
            } else if($jctypen=="3") {
                if($edata['id']) {

                } else {
                    $jdate = date("Y-m-d H:i:s");        
                }  


                //site
                $eRow = CommunityAsset::where('id', $edata['asset_id'])->first();
                $site_id = $eRow?$eRow->site_id:$edata['site_id'];
                $jcrefid = $edata['asset_id'];
                //$edata['vendor'] = $eRow?$eRow->vendor:0; 
            } else {
                
                $dt1 = $edata['jdate'];
				$dt2 = $edata['jenddate'];
                $dt = explode("-", $edata['jdate']);//d-m-y
				$dt2 = explode("-", $edata['jenddate']);//d-m-y
                $jdate = $dt[2].'-'.$dt[1].'-'.$dt[0].' '.$edata['bdtime'].':00';
				$jenddate = $dt2[2].'-'.$dt2[1].'-'.$dt2[0];

                if(isset($edata['jdate']) && $edata['jdate']!="")
                {
                         $dt2 = explode("-", $edata['jdate']);   
                         $jenddate = $dt2[2].'-'.$dt2[1].'-'.$dt2[0];   
                } 
                else
                {
                   
                    $k = date("d-m-Y");
                    $dt2 = explode("-", $k); 
                    $edate = $dt2[0];  
                    $jdate = $dt2[2].'-'.$dt2[1].'-'.$edate;
                }


                if(isset($edata['jenddate']) && $edata['jenddate']!="")
                {
                         $dt2 = explode("-", $edata['jenddate']);   
                         $jenddate = $dt2[2].'-'.$dt2[1].'-'.$dt2[0];   
                } 
                else
                {
                   
                    $k = date("d-m-Y");
                    $dt2 = explode("-", $k); 
                    $edate = $dt2[0]+1;  
                    $jenddate = $dt2[2].'-'.$dt2[1].'-'.$edate;
                }

                //site
                $eRow = CommunityAsset::where('id', $edata['asset_id'])->first();
                $site_id = $eRow?$eRow->site_id:$edata['site_id'];
                $jcrefid = $edata['asset_id'];
                
            }   
			  
			if(isset($edata['other_text'])) $other = $edata['other_text'];
			else  $other =  "";

            $etData = [
                'jctype' => $edata['jctype'],
				//'jcref' => isset($edata['asset_id'])?$edata['asset_id']:"",
				'jcref' => $jcrefid,
                'category_id' => $edata['category_id'],
                'vendor' => (int)$edata['vendor'],
				'vendor_name' => $edata['vendor_name'], 
                'spares' => $edata['sparesreq'],
				'emp_type' => $edata['emp_type'],
                'status' => $edata['status'],
                'site_id' => $site_id,
                'work_activity' => $edata['work_activity'],
				'other_text' =>  $other
            ]; 

            if($jdate) $etData['jdate'] = $jdate;
			 if($jenddate) $etData['jenddate'] = $jenddate;

            if($edata['id']) {
                $eRow = Jobcard::where('id', $edata['id'])->first();                
                $eRow->update($etData);
                $bid = $edata['id'];
            } else {
                $etData['refid'] = '';
                $etData['user_id'] = Auth::user()->id;
                $etData['created_at'] = date('Y-m-d H:i:s');
                $bid = Jobcard::insertGetId($etData);
                $eRow = Jobcard::where('id', $bid)->first();
	
            }
			
			//SPARES
				if(count($edata['spares']) > 0){
		    foreach($edata['spares'] as $ke => $va){
			    $eidata = array("jobcard_id" =>$bid,"item_id"=>$va,"quantity"=>$edata['quantity'][$ke]);
				 $eid = Jobcarditem::insertGetId($eidata);
			}
		}
			
			// END SPARES
            $esRow = Site::where('id', $site_id)->first();
            $siteprefix=$esRow?$esRow->prefix:'';

            $jdate = date("Y-m-d",strtotime($eRow->jdate));

            $refid = '';
            if($siteprefix) {
                $refid .= $siteprefix.'_';
            }
			
				// SITE BASE LAST INSERT ID
			      $resmatch_cn = 1;
						$match_last_site_f =  ['site_id' => $edata['site_id'], 'type' => 'jbc'];
						$match_count = \App\Auditsum::where($match_last_site_f)->count(); 
						if($match_count > 0){
						$e_matchRow = \App\Auditsum::where($match_last_site_f)->orderBy('id', 'DESC')->first();
						$resmatch_cn=  (int)$e_matchRow['count'] + 1;
						$etauData = [
							'count' => $resmatch_cn
							];
						$e_matchRow->update($etauData);
						}
						else{
							$etauData = [
							'count' => 1,
							'type' => 'jbc',
							'site_id' => $edata['site_id']
							];
							 $match_cnr_id = \App\Auditsum::insertGetId($etauData);
						}
					
			 // ED GET LAST BASE INSERTED ID
			 
            $refid .= 'jc_asid_';
            $refid .= str_replace("-", "_", $jdate);
          //ss//  $refid .= '_'.str_pad($bid,5,"0",STR_PAD_LEFT);
		  $refid .= '_'.str_pad($resmatch_cn,5,"0",STR_PAD_LEFT);
            $etnewData = [
                    'refid' => $refid
                ];
            $eRow->update($etnewData);
			
			// UPDATE IMAGE
			
			
			if(!isset($edata['image'])) {
			$edata['image'] = "";
			}
			
			$filename = uniqid();
	     if(isset($edata['image']))	{
		 if($edata['image'] != ""){
		  $filerow = $request->file('image');
				 
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('jcfiles',$filename."_"."jcbrowse".$bid.".".$extension);
		  $filename_extension = 'jcfiles/'.$filename."_"."jcbrowse".$bid.".".$extension;
		  $req_array =  array("image"=> $filename_extension);
		  $report = Jobcard::findOrFail($bid);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("image"=> "");
		   $report = Jobcard::findOrFail($bid);
		  $report->update($req_array);
		   }
		}
			 
			// END UPDATE IMAGE
            //Jobcard users
            JobcardUser::where('jobcard_id',$bid)->delete();
            if(isset($edata['empid']) && $edata['empid']) {
                foreach($edata['empid'] as $emid) {
                    if(!is_numeric($emid)) continue;
                    $etudata = [
                            'jobcard_id' => $bid,
                            'user_id' => $emid
                        ];
                    JobcardUser::create($etudata);
                }
            }
            //History card
            $etData = [
                'htype' => (int)$edata['jctype']+2,
                'ref_idno' => $refid,
                'refid' => $bid,
                'site_id' => $site_id,
            ];
            Historycard::create($etData);
            return redirect('/topics/jobcard');
        }
        return redirect()->back()->withErrors('Incompleted details.');
    }
    public function jobcardOptions(Request $request)
    {
        $edata = $request->all();
        $jctype = $edata['jctype']?$edata['jctype']:0;
        $site_id = $edata['siteid']?$edata['siteid']:0;
        $jcoptions = array();
        if($edata['jctype']=="1") {
            $jcoptions[] = 'Please select';
            $jcoptionQuery = Breakdown::where('site_id',$site_id)->orderBy('id','desc')->get();
            if(count($jcoptionQuery)>0)
            {
                foreach($jcoptionQuery as $break)
                {
                        $jcoptions[$break['id']] = "Break_".$break['id']."_".$break['title'];
                }
            }
            //$jcoptions = Breakdown::where('site_id',$site_id)->orderBy('id','desc')->get()->pluck('id.title', 'id')->prepend('Please select', '');    
        } else if($edata['jctype']=="2") 
           // $jcoptions = Incident::where('site_id',$site_id)->get()->pluck('refid', 'id')->prepend('Please select', '');   
			$jcoptions[] = 'Please select';
            $jcoptionQuery = Incident::where('site_id',$site_id)->orderBy('id','desc')->get();
            if(count($jcoptionQuery)>0)
            {
                foreach($jcoptionQuery as $incident)
                {
                        if($incident['title'])
                        {
                            $jcoptions[$incident['id']] = "Incident_".$incident['id']."_".$incident['title'];
                        }
                        else
                        {
                            $jcoptions[$incident['id']] = "Incident_".$incident['id']."_".$incident['refid'];
                        }
                }
            } 
		if($edata['jctype']=="1") {
		  return view('topics.jobcard_selectbox_break', compact('jcoptions','jctype'));
		 }	
        return view('topics.jobcard_selectbox', compact('jcoptions','jctype'));
       // return view('topics.jobcard_selectbox', compact('jcoptions','jctype'));
    }
    //Get Jobcard community employees based on Breakdown/Incident
    public function getJobcardUsers(Request $request)
    {
        $empList = array();
        $edata = $request->all();
        if($edata['jctype']=="1") {
            $eRow = Breakdown::where('id', $edata['jctrefid'])->first();
            $edata['site_id']=$eRow?$eRow->site_id:0;
        } else {
            $eRow = Incident::where('id', $edata['jctrefid'])->first();
            $edata['site_id']=$eRow?$eRow->site_id:0;
        }
        $sitename = '';
        if(isset($edata['site_id']) && $edata['site_id']) {
            $eRow = Site::where('id', $edata['site_id'])->first();
            $sitename=$eRow?$eRow->name:'';
            $empList = \App\Emp::where('community',$edata['site_id'])->get()->pluck('name', 'id')->prepend('Please select', '');
        }
		
        return view('topics.jobcard_emp_selectbox', compact('empList','sitename'));
    }
	  //Get Jobcard Items  based on Breakdown/Incident
    public function getJobcardItems(Request $request)
    {
        $items_List = array();
        $edata = $request->all();
		$items_List = Item::get()->pluck('itemname', 'id')->prepend('Please select', '');
      /*  if($edata['jctype']=="1") {
            $eRow = Breakdown::where('id', $edata['jctrefid'])->first();
			$items_cn = Item::where('itemcategory', $eRow->category_id)->where('itemsubcategory', $eRow->sub_category_id)->count();
			if($items_cn > 0){
			 	$items_List = Item::where('itemcategory', $eRow->category_id)->where('itemsubcategory', $eRow->sub_category_id)->get()->pluck('itemname', 'id')->prepend('Please select', '');
			}
            //$edata['site_id']=$eRow?$eRow->site_id:0;
        }*/ 
		
        return view('topics.jobcard_item_selectbox', compact('items_List','sitename'));
    }
    //Get Jobcard community employees based on Asset
    public function getJobcardAssetUsers(Request $request)
    {
        $empList = array();
        $edata = $request->all();
        
        $eRow = CommunityAsset::where('id', $edata['jctrefid'])->first();
        $edata['site_id']=$eRow?$eRow->site_id:0;
        $sitename = '';
        if(isset($edata['site_id']) && $edata['site_id']) {
            $eRow = Site::where('id', $edata['site_id'])->first();
            $sitename=$eRow?$eRow->name:'';
            $empList = \App\Emp::where('community',$edata['site_id'])->get()->pluck('name', 'id')->prepend('Please select', '');
        }
        return view('topics.jobcard_emp_selectbox', compact('empList','sitename'));
    }
    //Get community Asseta
    public function getCommunityAssets(Request $request)
    {
        $edata = $request->all();
        $site_id = $edata['site_id']?$edata['site_id']:0;
        $category_id = $edata['category_id']?$edata['category_id']:0;
        $comm_assets = CommunityAsset::select('id','code','name')->where('site_id', $site_id)->where('category_id', $category_id)->orderBy('code','asc')->get();
		$other_assets = OtherAsset::select('id','code','name')->where('site_id', $site_id)->where('category_id', $category_id)->orderBy('code','asc')->get();
        return view('topics.topics_assets_selectbox', compact('comm_assets','other_assets'));
    }

    //historycard
    public function historycard(Request $request)
    {
		$communities = \App\Site::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');	
        $userid = Auth::user()->id;
        $site_id = 0;
		$c = $request->input('c', 0);
		if($c)  $site_id = $c; 
		else $site_id = $site_id;
        if($userid>1) {       
            $emprow = \App\Emp::where('id', '=', (int)Auth::user()->emp_id)->first();
            if($emprow) $site_id = (int)$emprow->community;
        }
    	$ht = $request->input('ht', 0);
		
		if($userid>1)
		{
            $historycards = Historycard::select('historycards.*','sites.name as sitename','community_assets.name as comasset')->leftJoin('sites','sites.id','=','historycards.site_id')->leftJoin('community_assets','community_assets.id','=','historycards.asset_id');
			if($c) $historycards = $historycards->where('historycards.site_id', $c);
			$historycards = $historycards->orderBy('historycards.id','desc')->get();
		}
        else
		{
            $historycards = Historycard::select('historycards.*','sites.name as sitename','community_assets.name as comasset')->leftJoin('sites','sites.id','=','historycards.site_id')->leftJoin('community_assets','community_assets.id','=','historycards.asset_id');			
			if($c) $historycards = $historycards->where('historycards.site_id', $c);
			$historycards = $historycards->orderBy('historycards.id','desc')->get();
		}
		
       /* if($userid>1) {
            if($ht==1) 
                $historycards = Historycard::where('site_id','=',$site_id)->whereIn('htype', array(1,3))->orderBy('updated_at','desc')->get();
            else if($ht==2) 
                $historycards = Historycard::where('site_id','=',$site_id)->whereIn('htype', array(2,4))->orderBy('updated_at','desc')->get();
            else if($ht)
                $historycards = Historycard::where('site_id','=',$site_id)->where('htype', $ht)->orderBy('updated_at','desc')->get();
            else $historycards = Historycard::where('site_id','=',$site_id)->orderBy('updated_at','desc')->get();
        } else {
            if($ht==1) 
                $historycards = Historycard::where('site_id','=',$site_id)->whereIn('htype', array(1,3))->orderBy('updated_at','desc')->get();
            else if($ht==2) 
                $historycards = Historycard::where('site_id','=',$site_id)->whereIn('htype', array(2,4))->orderBy('updated_at','desc')->get();
            else if($ht)
                $historycards = Historycard::where('site_id','=',$site_id)->where('htype', $ht)->orderBy('updated_at','desc')->get();
            else $historycards = Historycard::where('site_id','=',$site_id)->orderBy('updated_at','desc')->get();
        }*/

    	
        $hctypes = array(1=>'Break Down',2=>'Incident Report',3=>'Break Down',4=>'Incident Report',5=>'AMC',6=>'New');
        $ddhctypes = array(0=>'Select',1=>'Break Down',2=>'Incident Report',5=>'AMC',6=>'New');
        return view('topics.historycard', compact('historycards','hctypes','ddhctypes','communities'));
    }
    public function historycardDelete($id)
    {

        $asset = Historycard::findOrFail($id);

        $asset->delete();

        return redirect('/topics/historycard');

    }
    public function historycardmassDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = Historycard::whereIn('id', $request->input('ids'))->get();
            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

    public function jobcard_massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = Jobcard::whereIn('id', $request->input('ids'))->get();
            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

    public function breakdown_massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = Breakdown::whereIn('id', $request->input('ids'))->get();
            foreach ($entries as $entry) {
                $jobcard = Jobcard::where('jctype', '1')->where('jcref', $entry->id)->count();
                if($jobcard) continue;
                $entry->delete();
                //attachments
                $this->topic_delete_attachments($entry->id,'breakdown');
            }
        }
    }

    public function incident_massDestroy(Request $request)
    {
		
        if ($request->input('ids')) {
            $entries = Incident::whereIn('id', $request->input('ids'))->get();
            foreach ($entries as $entry) {
                $jobcard = Jobcard::where('jctype', '2')->where('jcref', $entry->id)->count();
                if($jobcard) continue;
                $entry->delete();
                //attachments
                $this->topic_delete_attachments($entry->id,'incident');
            }
        }
    }
	
	// TESTING
	// JOB CARD UPDATE
	
	public function updatebreakdownId(Request $request)
    {
       /* if ($request->input('ids')) {
            $entries = Incident::whereIn('id', $request->input('ids'))->get();
            foreach ($entries as $entry) {
                $jobcard = Jobcard::where('jctype', '2')->where('jcref', $entry->id)->count();
                if($jobcard) continue;
                $entry->delete();
                //attachments
                $this->topic_delete_attachments($entry->id,'incident');
            }
        } */
		
		$breakdown = Breakdown::get();
	
		foreach( $breakdown as $break){
		    $ref_code = "";
			$eRow = Breakdown::where('id', $break->id)->first();
			$site_id = $break->site_id; 
			$esRow = Site::where('id', $site_id)->first();
            $siteprefix=$esRow?$esRow->prefix:'';	
			$ref_code .= $siteprefix;
			$title = str_replace(" ",'_',$break->title); 
			
			$ref_code .= '_'.$break->id.'_'.$title;
			$etData = [
			'ref_code' => $ref_code
			];
			/*echo  $ref_code."<br>";
			echo $break->id."<br>";
			echo "<br>";*/
			//$eRow->update($etData);		
		}
		  
    }  
	
	// END TSTING
	
	
	
}