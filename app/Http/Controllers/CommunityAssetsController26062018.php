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
use App\JobcardUser;
use App\Asset;
use App\Template;
use App\TemplateSection;
use App\TemplateField;
use App\AssetTemplateValue;
use Maatwebsite\Excel\Facades\Excel;
use App\Historycard;
use App\Site;

class CommunityAssetsController extends Controller
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

        $assets = \App\CommunityAsset::select("community_assets.*",'sites.name as sitename','sites.prefix as sprefix','asset_types.prefix as aprefix','asset_types.name as catgname','templates.code as tcode','templates.name as tname','assets.name as assetname')
                        ->leftJoin('sites','sites.id','=','community_assets.site_id')
                        ->leftJoin('asset_types','asset_types.id','=','community_assets.category_id')
                        ->leftJoin('assets','assets.id','=','community_assets.asset_id')
                        ->leftJoin('templates','templates.id','=','assets.template_id');
        if($c) $assets = $assets->where('community_assets.site_id', $c);
        if($ast) $assets = $assets->where('community_assets.category_id', $ast);
        $assets = $assets->orderBy('community_assets.id','desc')->get();

        $sno=1;
        return view('community_assets.index', compact('assets','sno','categories','communities'));
    }

    /**
     * Show the form for creating new Asset Templates.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        $assets = array(''=>'Please select');
        $relations = [
		    'assettypes' => \App\AssetcatType::get()->pluck('name', 'id')->prepend('Please select', ''),
            'categories' => \App\AssetType::get()->pluck('name', 'id')->prepend('Please select', ''),
            'communities' => \App\Site::get()->pluck('name', 'id')->prepend('Please select', ''),
            'assets' => $assets
        ]; 

        return view('community_assets.create', $relations);
    }

    /**
     * Store a newly created Asset Templates in storage.
     *
     * @param  \App\Http\Requests\StoreClientStatusesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    
        $edata = $request->all();        
        $er = "";
        if(empty($edata['site_id'])) $er .= "Community required<br>";
        if(empty($edata['category_id'])) $er .= "Category required<br>";
        if(empty($edata['asset_id'])) $er .= "Asset required<br>";
        $assets = $edata['asset'];
        if(!$assets) $er .= "Assets required<br>";
        else {
            $asset_uniq = array_unique($assets['code']);
            if(count($asset_uniq)<>count($assets['code'])) $er .= "Duplicate Asset codes exists in the form<br>";
            else {
                foreach ($assets['code'] as $aval) {
                    if(empty($aval)) continue;
                    $casset = CommunityAsset::where('site_id',$edata['site_id'])->where('category_id',$edata['category_id'])->whereRaw('LOWER(code)=?',strtolower($aval))->first();
                    if($casset) $er .= "Asset code: $aval already exits.<br>";
                }               
            }
        }
        if($er) {
            $json = array('message'=>$er,'status'=>false);
            echo json_encode($json);
            return;
        }        
        foreach ($assets['code'] as $ci=>$aval) {
            if(empty($aval) || empty($assets['name'][$ci])) continue;
            $casset = CommunityAsset::where('site_id',$edata['site_id'])->where('category_id',$edata['category_id'])->whereRaw('LOWER(code)=?',strtolower($aval))->first();
            if($casset) continue;
            $etData = [
                'code' => $aval,
                'name' => $assets['name'][$ci],
                'category_id' => $edata['category_id'],
                'asset_id' => $edata['asset_id'],
                'site_id' => $edata['site_id'],
                'user_id' => Auth::user()->id,
                'created_at' => date('Y-m-d H:i:s')
            ];
            CommunityAsset::create($etData);
        }
        $json = array('message'=>'Community assets saved successfully','status'=>true);
        echo json_encode($json);
        return; 
    }

    /**
     * Show the form for editing ClientStatus.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $assetTemplateForm = 1;
        $comm_asset = CommunityAsset::where('id',$id)->first();
        if(!$comm_asset) return redirect()->route('commassets.index')->withErrors('Asset not found');

        $asset = Asset::where('id',$comm_asset->asset_id)->first();
        if(!$asset) return redirect()->route('commassets.index')->withErrors('Community Asset not found');

        $template = Template::where('id',$asset->template_id)->first();
        if(!$template) return redirect()->route('commassets.index')->withErrors('Community Asset Template not found');

        $site = \App\Site::where('id',$comm_asset->site_id)->first();
        $sitename = "";
        if($site) $sitename = $site->name;

        $category = \App\AssetType::where('id',$comm_asset->category_id)->first();
        $catgname = "";
        if($category) $catgname = $category->name;


        //Sections
        $section_rows = TemplateSection::where('template_id',$template->id)->orderBy('sort', 'asc')->orderBy('title', 'asc')->get();
        $sections = array(0=>array('head'=>'','cols'=>2,'fields'=>array()));
        if($section_rows) {
            foreach($section_rows as $sval) $sections[$sval->id] = array('head'=>$sval->title,'cols'=>$sval->inputs_per_row,'fields'=>array());
        }

        //Fields
        $fields = TemplateField::where('template_id',$template->id)->orderBy('section_id', 'asc')->orderBy('sort', 'asc')->orderBy('label', 'asc')->get();  
        if($fields) {
            foreach($fields as $fval) {
                $sections[$fval->section_id]['fields'][]=$fval;
            }
        } else $sections = array();

        $field_types = array('1'=>'Text box','2'=>'Select box','3'=>'Check box','4'=>'Radio button','5'=>'Text Area','6'=>'Date','7'=>'DateTime','8'=>'Text Editor','9'=>'Attachment');
        $field_required = array('N'=>'No','Y'=>'Yes');
        $field_valids = array('0'=>'Any','1'=>'Alphabets','2'=>'Numbers','3'=>'Alpha Numeric');

        //asset template values
        $asset_template = AssetTemplateValue::where('asset_id',$id)->get()->pluck('value', 'field_id');
        $amc_intervals = array(15=>'15 days',45=>'45 days',30=>'monthly',60=>'2 months',90=>'3 months',120=>'4 months',150=>'5 months',180=>'6 months',240=>'8 months',360=>'yearly','');

        $assets = array(''=>'Please select');
        $relations = [
            'categories' => \App\AssetType::get()->pluck('name', 'id')->prepend('Please select', ''),
            'communities' => \App\Site::get()->pluck('name', 'id')->prepend('Please select', ''),
            'assets' => $assets
        ]; 
        $vendors = \App\Vendor::orderBy('name','asc')->get()->pluck('name', 'id')->prepend('Please select', '');


        return view('community_assets.edit', $relations+compact('comm_asset','asset','template','sections','field_types','field_required','field_valids','assetTemplateForm','asset_template','amc_intervals','sitename','catgname','vendors'));
    }
     
    public function show($id)

    {
        $comm_asset = CommunityAsset::where('id',$id)->first();
        if(!$comm_asset) return redirect()->route('commassets.index')->withErrors('Asset not found');

        $asset = Asset::where('id',$comm_asset->asset_id)->first();
        if(!$asset) return redirect()->route('commassets.index')->withErrors('Community Asset not found');

        $template = Template::where('id',$asset->template_id)->first();
        if(!$template) return redirect()->route('commassets.index')->withErrors('Community Asset Template not found');

        $site = \App\Site::where('id',$comm_asset->site_id)->first();
        $sitename = "";
        if($site) $sitename = $site->name;

        $category = \App\AssetType::where('id',$comm_asset->category_id)->first();
        $catgname = "";
        if($category) $catgname = $category->name;

        $vendor = \App\Vendor::where('id',$comm_asset->vendor)->first();
        $vendorname = "";
        if($vendor) $vendorname = $vendor->name;

        $assetcode = '';
        //if($site) $assetcode .= $site->prefix.'_';
        //if($category) $assetcode .= $category->prefix.'_';
        $assetcode .= $comm_asset->code;


        //Sections
        $section_rows = TemplateSection::where('template_id',$template->id)->orderBy('sort', 'asc')->orderBy('title', 'asc')->get();
        $sections = array(0=>array('head'=>'','cols'=>2,'fields'=>array()));
        if($section_rows) {
            foreach($section_rows as $sval) $sections[$sval->id] = array('head'=>$sval->title,'cols'=>$sval->inputs_per_row,'fields'=>array());
        }

        //Fields
        $fields = TemplateField::where('template_id',$template->id)->orderBy('section_id', 'asc')->orderBy('sort', 'asc')->orderBy('label', 'asc')->get();  
        if($fields) {
            foreach($fields as $fval) {
                $sections[$fval->section_id]['fields'][]=$fval;
            }
        } else $sections = array();

        //asset template values
        $asset_template = AssetTemplateValue::where('asset_id',$id)->get()->pluck('value', 'field_id');
        $amc_intervals = array(15=>'15 days',45=>'45 days',30=>'monthly',60=>'2 months',90=>'3 months',120=>'4 months',150=>'5 months',180=>'6 months',240=>'8 months',360=>'yearly','');
		
		
		//$historycards = \App\Historycard::limit(4)->orderBy('updated_at', 'desc')->get();
		$historycards = \App\Historycard::where('asset_id','=',$id)->orderBy('updated_at', 'desc')->get();
		$jobcards = \App\Jobcard::select("jobcards.*",'sites.name as sitename','vendors.name as vendorname')
	            ->leftJoin('sites','sites.id','=','jobcards.site_id')
	            ->leftJoin('vendors','vendors.id','=','jobcards.vendor')
	            ->where('jobcards.status','<>','Completed')
				 ->where('jobcards.asset_id','=',$id)
				->orderBy('updated_at', 'desc')
	            ->get();
				
			//	$incidents = \App\Incident::select('incidents.*','sites.name as sitename')->leftJoin('sites','sites.id','=','incidents.site_id')->where('incidents.asset_id','=',$id)->limit(4)->orderBy('id', 'desc')->get();	
			//	$breakdowns = \App\Breakdown::select('breakdowns.*','sites.name as sitename')->leftJoin('sites','sites.id','=','breakdowns.site_id')->where('breakdowns.asset_id','=',$id)->limit(4)->orderBy('id', 'desc')->get();
			
				$incidents = \App\Incident::select('incidents.*','sites.name as sitename')->leftJoin('sites','sites.id','=','incidents.site_id')->where('incidents.asset_id','=',$id)->orderBy('id', 'desc')->get();	
				$breakdowns = \App\Breakdown::select('breakdowns.*','sites.name as sitename')->leftJoin('sites','sites.id','=','breakdowns.site_id')->where('breakdowns.asset_id','=',$id)->orderBy('id', 'desc')->get();

$jbtypes = array(''=>'Please select',1=>'Break Down',2=>'Incident Report',3=>'AMC',4=>'New');
$hctypes = array(1=>'Break Down',2=>'Incident Report',3=>'Break Down',4=>'Incident Report',5=>'AMC',6=>'New');
        return view('community_assets.show', compact('comm_asset','asset','template','sections','field_types','field_required','field_valids','asset_template','amc_intervals','sitename','catgname','vendorname','assetcode','historycards','jobcards','incidents','breakdowns','jbtypes','hctypes'));
 
    }
	
	 
	
	// JOBCARD EDIT
	
	 public function jobcardEdit($assetid)
    {
	  
        $userid = Auth::user()->id;
        $site_id = 0;
        if($userid>1) {       
            $emprow = \App\Emp::where('id', '=', (int)Auth::user()->emp_id)->first();
            if($emprow) $site_id = (int)$emprow->community;
        }
		 $casset = CommunityAsset::where('id',$assetid)->first();
        $communities = \App\Site::get()->pluck('name', 'id')->prepend('Please select', '');
       //assets
        if($userid>1) {
            $comm_assets = CommunityAsset::select('id','code','name')->where('site_id', $site_id)->orderBy('code','asc')->get();
        }
        else {
            //$comm_assets = \App\CommunityAsset::select('id','code','name')->get();
            $comm_assets = array();
        }
        $jbtypes = array(''=>'Please select',1=>'Break Down',2=>'Incident Report',3=>'AMC',4=>'New');
        $sparestypes = array(''=>'Please select',"Spare 1"=>'Spare 1',"Spare 2"=>'Spare 2',"Spare 3"=>'Spare 3');
        $statuses = array("Inprocess"=>'Inprocess',"Hold"=>'Hold',"Completed"=>'Completed');
        $vendors = \App\Vendor::orderBy('name','asc')->get()->pluck('name', 'id')->prepend('Please select', '');
        $categories = \App\AssetType::get()->pluck('name', 'id')->prepend('Please select', '');
        $jobcardusers = array();
        return view('community_assets.jobcard-edit', compact('comm_assets','jbtypes','sparestypes','vendors','statuses','jobcardusers','communities','userid','site_id','casset','categories'));
    }
	
	
	 public function jobcardOptions(Request $request)
    {
        $edata = $request->all();
        $jctype = $edata['jctype']?$edata['jctype']:0;
        $site_id = $edata['siteid']?$edata['siteid']:0;
		$assetid = $edata['assetid']?$edata['assetid']:0;
        $jcoptions = array();
        if($edata['jctype']=="1") {
            $jcoptions = Breakdown::where('site_id',$site_id)->where('asset_id','=',$assetid)->get()->pluck('refid', 'id')->prepend('Please select', '');    
        } else if($edata['jctype']=="2") 
            $jcoptions = Incident::where('site_id',$site_id)->where('asset_id','=',$assetid)->get()->pluck('refid', 'id')->prepend('Please select', '');    
        return view('topics.jobcard_selectbox', compact('jcoptions','jctype'));
    }
	
	
	// JOBCARD SAVE
	
	 public function jobcardSave(Request $request)
    {
        //echo "NO";
        $edata = $request->all();
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
            $site_id = 0;
            if($edata['jctype']=="1") {
                $eRow = Breakdown::where('id', $edata['jctype12'])->first();
                if($eRow) {
                    $jdate = $eRow->bdate;
                    $jcrefid = $edata['jctype12'];
                    $site_id = $eRow->site_id;
                }
            } else if($edata['jctype']=="2") {
                $eRow = Incident::where('id', $edata['jctype12'])->first();
                if($eRow) {
                    $jdate = $eRow->idate;
                    $jcrefid = $edata['jctype12'];
                    $site_id = $eRow->site_id;
                }
            } else if($edata['jctype']=="3") {
                if($edata['id']) {

                } else {
                    $jdate = date("Y-m-d H:i:s");        
                }  


                //site
                $eRow = CommunityAsset::where('id', $edata['asset_id'])->first();
                $site_id = $eRow?$eRow->site_id:0;
                $jcrefid = $edata['asset_id'];
                //$edata['vendor'] = $eRow?$eRow->vendor:0; 
            } else {
                
                $dt1 = $edata['jdate'];
                $dt = explode("-", $edata['jdate']);//d-m-y
                $jdate = $dt[2].'-'.$dt[1].'-'.$dt[0].' '.$edata['bdtime'].':00';
                //site
                $eRow = CommunityAsset::where('id', $edata['asset_id'])->first();
                $site_id = $eRow?$eRow->site_id:0;
                $jcrefid = $edata['asset_id'];
                
            }            

            $etData = [
                'jctype' => $edata['jctype'],
				'asset_id' => $edata['asset_id'],
                'jcref' => $jcrefid,
                //'vendor' => $edata['vendor'],
                'spares' => $edata['spares'],
                'status' => $edata['status'],
                'site_id' => $site_id,
                'work_activity' => $edata['work_activity']
            ];
            if($jdate) $etData['jdate'] = $jdate;

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
            $esRow = Site::where('id', $site_id)->first();
            $siteprefix=$esRow?$esRow->prefix:'';

            $jdate = date("Y-m-d",strtotime($eRow->jdate));

            $refid = '';
            if($siteprefix) {
                $refid .= $siteprefix.'_';
            }
            $refid .= 'jc_asid_';
            $refid .= str_replace("-", "_", $jdate);
            $refid .= '_'.str_pad($bid,5,"0",STR_PAD_LEFT);
            $etData = [
                    'refid' => $refid
                ];
            $eRow->update($etData);
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
				'asset_id' => $edata['asset_id'],
                'refid' => $bid,
                'site_id' => $site_id,
            ];
            Historycard::create($etData);
           // return redirect('/topics/jobcard');
		    return redirect('/commassets/'.$edata['asset_id']);
        }
        return redirect()->back()->withErrors('Incompleted details.');
    }

    /**
     * Update ClientStatus in storage.
     *
     * @param  \App\Http\Requests\UpdateClientStatusesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $edata = $request->all();
        //print_r($edata);
        $json = array('message'=>'','status'=>false);
        $comm_asset = CommunityAsset::where('id',$id)->first();
        //Dynamic fields
        $er = '';
        if(empty($edata['code'])) $er .= "Asset code required<br>";
        else {
            $assetRow = CommunityAsset::where('site_id',$comm_asset->site_id)->where('category_id',$comm_asset->category_id)->where('code', $edata['code'])->where('id','<>',$id)->first();
            if($assetRow) $er .= "Asset code already exists<br>";
        }
        if(empty($edata['name'])) $er .= "Asset name required<br>";
        if(empty($edata['amc_interval'])) $er .= "AMC interval required<br>";
        if(empty($edata['amc_startdate'])) $er .= "AMC Start Date required<br>";
        if(isset($edata['atfid']) && $edata['atfid']) {
            foreach ($edata['atfid'] as $fval) {
                if($edata['atrequired'][$fval]=="Y") {
                    if($edata['atftype'][$fval]=="3" && count($edata['atfvalue'][$fval])==0)
                       $er .= $edata['attitle'][$fval].' required<br>';
                    else if($edata['atftype'][$fval]=="7" && (empty($edata['atfvalue'][$fval]['date']) || empty($edata['atfvalue'][$fval]['time'])))
                       $er .= $edata['attitle'][$fval].' required<br>';
                    else if($edata['atftype'][$fval]=="8" && empty(strip_tags($edata['atfvalue'][$fval])))
                       $er .= $edata['attitle'][$fval].' required<br>';
                    else if(empty($edata['atfvalue'][$fval]))
                        $er .= $edata['attitle'][$fval].' required<br>';
                } else if($edata['ativalids'][$fval]<>"0" && ($edata['atftype'][$fval]=="1" || $edata['atftype'][$fval]=="5")) {
                    $afval = $edata['atfvalue'][$fval];
                    if($edata['ativalids'][$fval]=="3" && !ctype_alpha($afval))  
                        $er .= $afval.' must be alphabets<br>';
                    else if($edata['ativalids'][$fval]=="2" && !is_numeric($afval))  
                        $er .= $afval.' must be number<br>';
                    else if($edata['ativalids'][$fval]=="3" && !ctype_alnum($afval))  
                        $er .= $afval.' must be alpha numeric<br>';
                }
            }
        }
        if($er) {
            $json['message'] = $er;
            echo json_encode($json);
            return;    
        }
        //Asset image
        if(isset($_FILES['asset_image']['name'])) {
            $afval = $_FILES['asset_image']['name'];
            $aiext = substr(strrchr($afval,'.'),1);
            $aiext = strtolower($aiext);
            if($aiext=="jpg" || $aiext=="jpeg" || $aiext=="png" || $aiext=="gif") {
                $filename = uniqid()."_".$afval;
                $filepath = public_path().'/uploads/template/'.$filename;
                if (move_uploaded_file($_FILES["asset_image"]["tmp_name"], $filepath)) {
                    $asset_image = $filename;
                }    
            }            
        }

        
        //Save asset
        $comm_asset = CommunityAsset::where('id',$id)->first();
        $etData = [
            'code' => $edata['code'],
            'name' => $edata['name'],
            'amc_interval' => $edata['amc_interval'],
            'vendor' => $edata['vendor'],
            'sop' => $edata['sop'],
            'name_plate' => $edata['name_plate'],
            'service_report' => $edata['service_report'],
            'location' => $edata['location']
        ];
        if($edata['amc_startdate']) {
            $dt = explode("-", $edata['amc_startdate']);//d-m-y 012-210
            $etData['amc_startdate']=$dt[2].'-'.$dt[1].'-'.$dt[0];
        }
        if(isset($asset_image)) $etData['asset_image']=$asset_image;
        //print_r($etData);
        $comm_asset->update($etData);
        //Save dynamic template field values
        if(isset($edata['atfid']) && $edata['atfid']) {
            foreach ($edata['atfid'] as $fval) {
                $afval = isset($edata['atfvalue'][$fval])?$edata['atfvalue'][$fval]:'';
                //checkboxes
                if($edata['atftype'][$fval]=="3") {
                    if(count($edata['atfvalue'][$fval])>0) $afval = implode(",",$edata['atfvalue'][$fval]);
                    else $afval='';
                }
                //file
                else if($edata['atftype'][$fval]=="9") {
                    //if(!$afval) continue;
                    if(!isset($_FILES['atfvalue'])) continue;
                    if(!count($_FILES['atfvalue'])) continue;
                    if(!isset($_FILES['atfvalue']['name'][$fval])) continue;

                    $afval = $_FILES['atfvalue']['name'][$fval];

                    $filename = uniqid()."_".$afval;
                    $filepath = public_path().'/uploads/template/'.$filename;
                    if (move_uploaded_file($_FILES["atfvalue"]["tmp_name"][$fval], $filepath)) {
                        $afval = $filename;
                    } else continue;
                } else if($edata['atftype'][$fval]=="7") {
                    if(!empty($edata['atfvalue'][$fval]['date']) && !empty($edata['atfvalue'][$fval]['time'])) 
                        $afval = $edata['atfvalue'][$fval]['date'].' '.$edata['atfvalue'][$fval]['time'];
                    else $afval='';
                }
                $atval = AssetTemplateValue::where('asset_id',$id)->where('field_id',$fval);
                if($atval->count()) {
                    $atval->delete();
                }
                $etData = [
                    'asset_id' => $id,
                    'field_id' => $fval,
                    'value' => $afval,
                    'created_at' => date('Y-m-d H:i:s')
                ];
                AssetTemplateValue::create($etData);
                
            }
        }
        $json['status'] = true;
        $json['message'] = "Asset saved successfully.";
        echo json_encode($json);
        return;
    }

    /**
     * Remove ClientStatus from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id=null,Request $request)
    {      
        $asset = CommunityAsset::findOrFail($id);
        if($asset) {
            if($asset->asset_image) {
                $ufile = public_path().'/uploads/template/'.$asset->asset_image;
                @unlink($ufile);
            }
            $asset->delete();
            AssetTemplateValue::where('asset_id',$id)->delete();    
        }
        
        return redirect()->route('commassets.index');
    }

    //delete attachment
    public function delattach(Request $request)
    {        
        $edata = $request->all();
        if(isset($edata['filepath']) && $edata['filepath']) {
            $ufile = public_path().'/'.$edata['filepath'];
            @unlink($ufile);
        }
        return;
    }

    public function massDestroy(Request $request)

    {

        if ($request->input('ids')) {

            $entries = CommunityAsset::whereIn('id', $request->input('ids'))->get();



            foreach ($entries as $entry) {

                $entry->delete();
                AssetTemplateValue::where('asset_id',$entry->id)->delete();

            }

        }


    }
	
	// SAVE BREAKDOWN
	
	 public function breakdownSave(BreakdownRequest $request)
    {
        //echo "NO";
        $userid = Auth::user()->id;
        $edata = $request->all();
        if($edata['taction']=="save") {
            $refid = '';
            $eRow = CommunityAsset::where('id', $edata['asset_id'])->first();
            $site_id = $eRow?$eRow->site_id:0;
            $edata['site_id'] = $site_id;
            if($edata['site_id']) {
                $eRow = Site::where('id', $edata['site_id'])->first();
                if($eRow) $refid .= $eRow->prefix.'_';
            }
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
                    'action' => $edata['action']
                ];
                $eRow->update($etData);
                $bid = $edata['id'];
            } else {
                $etData = [
                    'refid' => '',
                    'asset_id' => $edata['asset_id'],
                    'site_id' => $edata['site_id'],
                    'title' => $edata['title'],
                    'bdate' => $edata['bdate'],
                    'info' => $edata['info'],
                    'action' => $edata['action'],
                    'user_id' => Auth::user()->id,
                    'created_at' => date('Y-m-d H:i:s')
                ];
                $bid = Breakdown::insertGetId($etData);
                $eRow = Breakdown::where('id', $bid)->first();
            }
            $refid .= 'bd_asid_';
            $refid .= str_replace("-", "_", $dt1);
            $refid .= '_'.str_pad($bid,5,"0",STR_PAD_LEFT);;
            $etData = [
                    'refid' => $refid
                ];
            $eRow->update($etData);
            //History card
            $etData = [
                'htype' => '1',
                'ref_idno' => $refid,
                'refid' => $bid,
				'asset_id' => $edata['asset_id'],
                'site_id' => $edata['site_id']
            ];
            Historycard::create($etData);
            //attachments
            $this->topic_attachments($edata,$bid,'breakdown');
            return redirect('/commassets/'.$edata['asset_id']);
        }
        return redirect()->back()->withErrors('Incompleted details.');
    }
	
	
	// SAVE INCIDENT
	
	  public function incidentSave(IncidentRequest $request)
    {
        //echo "NO";
        $edata = $request->all();
        //print_r($edata); 
        if($edata['taction']=="save") {
            $refid = '';
            $eRow = CommunityAsset::where('id', $edata['asset_id'])->first();
            $site_id = $eRow?$eRow->site_id:0;
            $edata['site_id'] = $site_id;
            if($edata['site_id']) {
                $eRow = Site::where('id', $edata['site_id'])->first();
                if($eRow) $refid .= $eRow->prefix.'_';
            }
            $dt1 = $edata['idate'];
            $dt = explode("-", $edata['idate']);//d-m-y
            $edata['idate'] = $dt[2].'-'.$dt[1].'-'.$dt[0].' '.$edata['bdtime'].':00';
            if($edata['id']) {
                $eRow = Incident::where('id', $edata['id'])->first();
                $etData = [
                    'asset_id' => $edata['asset_id'],
                    'site_id' => $edata['site_id'],
                    'idate' => $edata['idate'],
                    'failure_reason' => $edata['failure_reason'],
                    'required_spares' => $edata['required_spares'],
                    'process_work' => $edata['process_work']
                ];
                $eRow->update($etData);
                $bid = $edata['id'];
            } else {
                $etData = [
                    'refid' => '',
                    'asset_id' => $edata['asset_id'],
                    'site_id' => $edata['site_id'],
                    'idate' => $edata['idate'],
                    'failure_reason' => $edata['failure_reason'],
                    'required_spares' => $edata['required_spares'],
                    'process_work' => $edata['process_work'],
                    'user_id' => Auth::user()->id,
                    'created_at' => date('Y-m-d H:i:s')
                ];
                $bid = Incident::insertGetId($etData);
                $eRow = Incident::where('id', $bid)->first();
            }
            $refid .= 'inr_asid_';
            $refid .= str_replace("-", "_", $dt1);
            $refid .= '_'.str_pad($bid,5,"0",STR_PAD_LEFT);
            $etData = [
                    'refid' => $refid
                ];
            $eRow->update($etData);
            //History card
            $etData = [
                'htype' => '2',
                'ref_idno' => $refid,
                'refid' => $bid,
				'asset_id' => $edata['asset_id'],
                'site_id' => $edata['site_id']
            ];
            Historycard::create($etData);
            //attachments
            $this->topic_attachments($edata,$bid,'incident');
           // return redirect('/topics/incident');
			  return redirect('/commassets/'.$edata['asset_id']);
        }
        return redirect()->back()->withErrors('Incompleted details.');
    }
	
	
	// ASSET BREAK DOWN
	
   public function breakdownEdit($assetid)
    {
        $userid = Auth::user()->id;
        $site_id = 0;
        if($userid>1) {       
            $emprow = \App\Emp::where('id', '=', (int)Auth::user()->emp_id)->first();
            if($emprow) $site_id = (int)$emprow->community;
        }
		  $casset = CommunityAsset::where('id',$assetid)->first();
		  
        $communities = \App\Site::get()->pluck('name', 'id')->prepend('Please select', '');
       //assets
        $comm_assets = array();
        $categories = \App\AssetType::get()->pluck('name', 'id')->prepend('Please select', '');
        $fileuploadable = 1;
        return view('community_assets.breakdown-edit', compact('communities','comm_assets','userid','site_id','categories','fileuploadable','casset','assetid'));
    }
	
	
	// ASSET INCIDENT
	
	   public function incidentEdit($assetid)
    {
        $userid = Auth::user()->id;
        $site_id = 0;
        if($userid>1) {       
            $emprow = \App\Emp::where('id', '=', (int)Auth::user()->emp_id)->first();
            if($emprow) $site_id = (int)$emprow->community;
        }
        $communities = \App\Site::get()->pluck('name', 'id')->prepend('Please select', '');
       //assets
	    $casset = CommunityAsset::where('id',$assetid)->first();
        $comm_assets = array();
        $categories = \App\AssetType::get()->pluck('name', 'id')->prepend('Please select', '');
        $fileuploadable = 1;
        return view('community_assets.incident-edit', compact('communities','comm_assets','userid','site_id','categories','fileuploadable','casset','assetid'));
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
	
	//EN ASSET BREAK DOWN

    //Community Asset Template import
    //Asset template Import
    public function assetTemplateimport(Request $request)
    {
        $message = "";
        $updated=0;
        //Save excel employees
        if ($request->isMethod('post')) {

            //Download
            if ($request->input('catype')=="Download") {
                $edata = $request->all();
                if(empty($edata['site_id'])) return redirect()->route('commassets.import')->withErrors('Community Required');
                if(empty($edata['category_id'])) return redirect()->route('commassets.import')->withErrors('Category Required');
                if(empty($edata['asset_id'])) return redirect()->route('commassets.import')->withErrors('Asset Required');

                $asset = Asset::where('id',$edata['asset_id'])->first();
                if(!$asset) return redirect()->route('commassets.index')->withErrors('Asset not found');

                $template = Template::where('id',$asset->template_id)->first();
                if(!$template) return redirect()->route('commassets.index')->withErrors('Asset Template not found');

                $invoicesArray = [];
                // Generate and return the spreadsheet
                Excel::create('asset', function($excel) use ($template) {

                    // Set the spreadsheet title, creator, and description
                    $excel->setTitle('Community Asset');
                    $excel->setCreator('Laravel')->setCompany('APARNA');
                    $excel->setDescription('Data import file');

                    $assetArray = []; 
                    // Define the Excel spreadsheet headers
                    //Fields
                    $fields = TemplateField::select('label')->where('template_id',$template->id)->where('itype','<>','9')->orderBy('section_id', 'asc')->orderBy('sort', 'asc')->orderBy('label', 'asc')->get();  
                    if($fields) {
                        $headers = array('Code','Location');
                        foreach($fields as $fval) {
                            $headers[]=$fval->label;
                        }
                        $assetArray[] = $headers;
                    }
                    // Build the spreadsheet, passing in the payments array
                    $excel->sheet('sheet1', function($sheet) use ($assetArray) {
                        $sheet->fromArray($assetArray, null, 'A1', false, false);
                    });

                })->download('xlsx');
            }

            //Import
            if ($request->input('catype')=="Upload") {
                $edata = $request->all();
                $uid = Auth::user()->id;

                if(empty($edata['site_id'])) return redirect()->route('commassets.import')->withErrors('Community Required');
                if(empty($edata['category_id'])) return redirect()->route('commassets.import')->withErrors('Category Required');
                if(empty($edata['asset_id'])) return redirect()->route('commassets.import')->withErrors('Asset Required');
                if(!isset($edata['file'])) return redirect()->route('commassets.import')->withErrors('Asset excel required');

                $asset = Asset::where('id',$edata['asset_id'])->first();
                if(!$asset) return redirect()->route('commassets.index')->withErrors('Asset not found');

                $template = Template::where('id',$asset->template_id)->first();
                if(!$template) return redirect()->route('commassets.index')->withErrors('Asset Template not found'); 

                //asset fields               
                $fields = TemplateField::select('id','itype','ivalids','label','sort')
                    ->where('template_id',$template->id)
                    ->where('itype','<>','9')
                    ->orderBy('section_id', 'asc')
                    ->orderBy('sort', 'asc')
                    ->orderBy('label', 'asc')->get();
                if(!$fields)  return redirect()->route('commassets.index')->withErrors('Asset Template fields not found');
                
                $asset_fields = array();
                if($fields) {
                    foreach($fields as $fval) {
                        $asset_fields[]=array('id'=>$fval->id,'itype'=>$fval->itype,'ivalids'=>$fval->ivalids);
                    }
                }

                $filename = 'asset-'.$uid.'-'.uniqid();
                $extension = $request->file('file')->getClientOriginalExtension();
                $extension = strtolower($extension);
                //check extentions  xls or xlsx 
                if($extension<>"xls" && $extension<>"xlsx") return redirect()->route('commassets.import')->withErrors('Only xls or xlsx file is allowed!!');            

                $file = $request->file('file')->move('tmp',$filename.".".$extension);
                $filename_extension = 'tmp/'.$filename.'.'.$extension;

                //$filename_extension = 'tmp/emp-5a8bfc2b9f690.xls';
                //$filename_extension = 'tmp/emp-sample.xlsx';
                $updated = 0;
                Config::set('excel.import.heading', 'false');
                $xls_datas = Excel::load($filename_extension, function($reader) { })->toArray();

                $cms = array();

                if(count($xls_datas) > 0) {
                    //echo "<pre>";print_r($xls_datas);echo "</pre>";

                    /*
                        0 - Code
                        1 - Location
                    */
                    $n=0;
                    $indx=0;
                    //if($xls_datas[0]) $indx=0;
                    //else if($xls_datas[1]) $indx=1;

                    //loop excel
                    foreach($xls_datas as $xval) {
                        //code
                        if(empty($xval[0])) continue;
                        //print_r($xval);
                        $caID = 0;
                        $comm_asset = CommunityAsset::where('site_id',$edata['site_id'])->where('category_id',$edata['category_id'])->where('code', $xval[0])->first();
                        if($comm_asset) $caID = $comm_asset->id;

                        //Save asset
                        $etData = [
                            'code' => $xval[0],
                            'name' => $xval[1]?$xval[1]:'',
                            'category_id' => $edata['category_id'],
                            'asset_id' => $edata['asset_id'],
                            'site_id' => $edata['site_id'],
                            'user_id' => Auth::user()->id,
                            'created_at' => date('Y-m-d H:i:s')
                        ];
                        //print_r($etData);
                        //continue;
                        if($caID) $comm_asset->update($etData);
                        else $caID = CommunityAsset::insertGetId($etData);

                        //echo " <br> CAID: $caID <br>";

                        //Asset Template Data saving
                        $rcols = count($xval);
                        //print_r($xval);
                        //print_r($asset_fields);
                        for($c=2;$c<$rcols;$c++) {
                            if(!isset($xval[$c])) continue;   
                            if(!isset($asset_fields[$c-2])) continue;                         
                            $catfid = $asset_fields[$c-2]['id'];
                            //echo " <br> $c: {$xval[$c]} $catfid ";
                            $fval = $xval[$c]?$xval[$c]:'';
                            $atval = AssetTemplateValue::where('asset_id',$caID)->where('field_id',$catfid);
                            if($atval->count()) {
                                $atval->delete();
                            }
                            if($asset_fields[$c-2]['itype']=="6") {
                                if($fval) {
                                    $dt = explode("/", $fval);//d-m-y 012-210
                                    if(count($dt)==3)$fval=$dt[2].'-'.$dt[1].'-'.$dt[0];
                                }                                
                            } else if($asset_fields[$c-2]['itype']=="7") {
                                if($fval) {
                                    $dte = explode(" ", $fval);//d-m-y 012-210
                                    $dt = explode("/", $dte[0]);//d-m-y 012-210
                                    if(count($dt)==3) $fval=$dt[2].'-'.$dt[1].'-'.$dt[0]." ".$dte[1].":00";
                                } 
                            }
                            $etData = [
                                'asset_id' => $caID,
                                'field_id' => $catfid,
                                'value' => $fval,
                                'created_at' => date('Y-m-d H:i:s')
                            ];
                            //print_r($etData);
                            AssetTemplateValue::create($etData);    
                        }
                    }
                }
                //delete file
                $excelfile = public_path().'/'.$filename_extension;
                if(file_exists($excelfile)) @unlink($excelfile);
                $message = 'Community Assets Uploaded'; 
            }
        }
        $assets = array(''=>'Please select');
        $categories = \App\AssetType::get()->pluck('name', 'id')->prepend('Please select', '');
        $communities = \App\Site::get()->pluck('name', 'id')->prepend('Please select', '');
        return view('community_assets.import', compact('message','communities','categories','assets'));
    }
	
	
}
