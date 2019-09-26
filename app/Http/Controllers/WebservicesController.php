<?php     
namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Emp;
use Hash;
use App\Snagcategory;
use App\Snagreport;
use App\Snaglocation;
use App\Sites;
use Illuminate\Support\Facades\Input;
class WebservicesController extends Controller
{
	public function userLogin(Request $request ) 
	{  
		$edata = $request->all();	
		$er = "";
		$scode = "";
		$vendor_id = "";
		$jobstatus = "";
		$notes = "";
		$response = array();
		if(isset($edata['username']) && isset($edata['password']))
		{
			$er="";
			if(empty($edata['username'])) $er .= "User Name required";
			if(empty($edata['password'])) $er .= "Password required";
			if($er=="")
			{
								
				$ucount = DB::table('users')
				->select('*')
				->where('email', Input::get('username'))
				->where('password', Hash::check('password', Input::get('password')))
				->count();
				if($ucount > 0)
				{
					$users_res = DB::table('users')
				->select('*')
				->where('email', Input::get('username'))
				->where('password', Hash::check('password', Input::get('password')))
				->first();
					$userId = $users_res->id;
					$uname = $users_res->name;
					$empId = $users_res->emp_id;		
					$response['id'] = (int)$userId;			
					$response['empid'] = (int)$empId;			
					$response['username'] = $uname;					
					$scode = 200;
					$error = "false";
					$er = "User Logged in Successfully";
				}
				else
				{
				   $er = "Invalid username and password";
				   $error = "true";
				   $scode = 400;
				}
				
			}
			else
			{
				$scode = 400;
				$error = "true";
			}
		}
		else
		{
		   $er = "Please fill the all information";
		   $error = "true";
		   $scode = 400;
		}
		$response_info = array('error'=>$error,'message'=>$er,'user'=>$response);
		return response()->json($response_info,$scode);
		exit; 
	}
	public function upload(Request $request)
	{
		$edata = $request->all();		
		
		if(isset($edata["fileName"])) $fileName = str_replace(":","_",$edata["fileName"]); else $fileName = "";
		$userId = uniqid();
				
		$filepath = public_path().'/uploads/snag/'.$userId.'_snag.jpg';
		
		$filepath2 = $userId."_snag.jpg";

		
		$maxsize    = 16777216;
		
		if(($_FILES["file"]["size"] == 0)) {
	       $msg  = 'File is empty';
	       $status_code = "400";
		   $filepath2 = "";
	    }
	    else if(($_FILES['file']['size'] >= $maxsize)) {
	       $msg  = 'File too large. File must be less than 16 megabytes.';
	       $status_code = "400";
		   $filepath2 = "";
	    }
	    else
	    {
			if (move_uploaded_file($_FILES["file"]["tmp_name"], $filepath)) {
				$msg = "The file ". basename( $fileName ). " has been uploaded.";
				$status_code = "200";
				$filepath2 = $filepath2;
				$filename_extension = public_path().'/uploads/snag/'.$userId.'_snag.jpg';
				$w=150; 
				$h=150; 
				$newfilename= public_path().'/uploads/snag/thumb/'.$userId.'_snag.jpg';
				resize_byratio($filename_extension, $w, $h, $newfilename);
				$msg = "The file ". basename( $fileName ). " has been uploaded.";
				$status_code = "200";
				$filepath2 = $filepath2;
			} 
			else 
			{		
				$msg = "Sorry, there was an error uploading your file.";
				$status_code = "400";
				$filepath2 = "";
			}
		}
		$response_info = array('scode'=>$status_code, 'message'=>$msg, 'filePath'=>$filepath2);
		return response()->json($response_info);
		exit; 
	}
	
	
	public function recupload(Request $request)
	{
		$edata = $request->all();
		//echo '<pre>'; print_r($edata); echo '</pre>';
		if(isset($edata["fileName"])) $fileName = str_replace(":","_",$edata["fileName"]); else $fileName = "";
		$userId = uniqid();
				
		$filepath = public_path().'/uploads/snag/rec/'.$userId.'_rec.jpg';
		
		$filepath2 = $userId."_rec.jpg";

		
		$maxsize    = 16777216;
		
		if(($_FILES["file"]["size"] == 0)) {
	       $msg  = 'File is empty';
	       $status_code = "400";
		   $filepath2 = "";
	    }
	    else if(($_FILES['file']['size'] >= $maxsize)) {
	       $msg  = 'File too large. File must be less than 16 megabytes.';
	       $status_code = "400";
		   $filepath2 = "";
	    }
	    else
	    {			
			if (move_uploaded_file($_FILES["file"]["tmp_name"], $filepath)) {
				$filename_extension = public_path().'/uploads/snag/rec/'.$userId.'_rec.jpg';
				$w=150; 
				$h=150; 
				$newfilename= public_path().'/uploads/snag/rec/thumb/'.$userId.'_rec.jpg';
				resize_byratio($filename_extension, $w, $h, $newfilename);
				$msg = "The file ". basename( $fileName ). " has been uploaded.";
				$status_code = "200";
				$filepath2 = $filepath2;
			} 
			else 
			{		
				$msg = "Sorry, there was an error uploading your file.";
				$status_code = "400";
				$filepath2 = "";
			}
		}
		$response_info = array('scode'=>$status_code, 'message'=>$msg, 'filePath'=>$filepath2);
		return response()->json($response_info);
		exit; 
	}
	
	public function getallcategories()
	{
		$catitems = array();
		$status_code = "";
		 $categories_count = Snagcategory::count();
		 if($categories_count > 0)
		 {
			$categories = \App\Snagcategory::get();		
			foreach( $categories as $cats)
			{
				$catitems[] = array("id" => $cats->id, "title" => $cats->cattitle);
		 	}
			$status_code = 200;  
		}
		else
		{
			$status_code = 400;
		}
		$response_info = array('scode'=>$status_code, 'response'=>$catitems);
		return response()->json($response_info);
		exit; 
    }
	
	
	public function getallsites()
	{
		$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));	
		$segment1 = $uriSegments[2]; 
		$siteitems = array();
		$status_code = "";
		$sites_count = Sites::where('status', 1)->count();
		 if($sites_count > 0)
		 {
		 	if($segment1==1)
			$sites = \App\Sites::where('status', 1)->get();		
			else
			{
				$getemp_info = \App\Emp::where('id','=',$segment1)->first();
				$siteinfo = $getemp_info->community;
			    $sitearr = explode(",",$siteinfo);
				$sites = \App\Sites::whereIn('id', $sitearr)->where('status', 1)->get();		
			}
			
			foreach( $sites as $site)
			{
				$siteitems[] = array("id" => $site->id, "title" => $site->name);
		 	}
			$status_code = 200;  
		}
		else
		{
			$status_code = 400;
		}
		$response_info = array('scode'=>$status_code, 'response'=>$siteitems);
		return response()->json($response_info);
		exit; 
    }
	
	public function getalllocations()
	{
		$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));	
		$segment1 = $uriSegments[2]; 
		$locationitems = array();
		$status_code = "";
		$locations_count = Snaglocation::where('site_id', $segment1)->count();
		if($locations_count > 0)
		{
		 	if($segment1==1)
			$sites = \App\Sites::where('status', 1)->get();		
			else
			{
				$getemp_info = \App\Emp::where('id','=',$segment1)->first();
				$siteinfo = $getemp_info->community;
			    $sitearr = explode(",",$siteinfo);
				$sites = \App\Sites::whereIn('id', $sitearr)->where('status', 1)->get();		
			}
			$locations = Snaglocation::where('site_id', $segment1)->get();			
			foreach( $locations as $location)
			{
				$locationitems[] = array("id" => $location->id, "title" => $location->location_name);
		 	}
			$status_code = 200;  
		}
		else
		{
			$status_code = 400;
		}
		$response_info = array('scode'=>$status_code, 'response'=>$locationitems);
		return response()->json($response_info);
		exit; 
    }
	
	
	
	public function savesnagReport(Request $request ) {           
		$edata = $request->all();	
		$er = "";
		$scode = "";
		$recommendation = "";
		if(isset($edata['uid']) && isset($edata['sid']) && isset($edata['cid']) && isset($edata['observation']) && isset($edata['location']))
		{
			$er="";
			if(empty($edata['uid'])) $er .= "User ID required";
			if(empty($edata['sid'])) $er .= "Community required";
			if(empty($edata['cid'])) $er .= "Category required";
			if(empty($edata['observation'])) $er .= "Observation required";
			if(empty($edata['location'])) $er .= "Location required";
			if($er=="")
			{
				if(isset($edata['recompath']) && $edata['recompath']!="") {
				 	$recommendation = $edata['recompath'];
					$rectype = "image";
				 }
				else if(isset($edata['recommendation']) && $edata['recommendation']!="")
				{
					 $recommendation = $edata['recommendation'];
					 $rectype = "text";
				 }
				else
				{
				 $recommendation = "";
				  $rectype = "";
				}
				
				if(isset($edata['imagepath']) && $edata['imagepath']!="") $imagepath = str_replace(":","_",$edata["imagepath"]);
				else $imagepath = "";
				
				
				
				$snag_array =  array("uid"=>$edata['uid'], "sid"=>$edata['sid'], "cid"=>$edata['cid'], "observation"=>$edata['observation'], "location"=> $edata['location'], "recommendation"=> $recommendation, "rectype"=> $rectype, "imagepath"=> $imagepath, "reporton"=> date("Y-m-d"));
				$snag_id = Snagreport::create($snag_array)->id;	
				$er = "Snag Report Submitted Successfully";
				$scode = 200;
			}
			else
			{
				 $scode = 400;
			}
		}
		else
		{
		   $er = "Please fill the all information";
		   $scode = 400;
		}
		$response_info = array('status'=>$scode,'message'=>$er);
		return response()->json($response_info,$scode);
		exit; 
    }
}
