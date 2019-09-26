<?php
namespace App\Http\Controllers;
use Request;
use Auth;
class FireReportsController extends Controller
{
	public function index(Request $request)

    { 
	 
		$year = isset($_GET['y'])?$_GET['y']:date("Y");	
		if(isset($_GET['m']))
		{
			$month = $_GET['m'];
		}
		else
		{
			if($year==date("Y") && date("m")==1)
			{
				$month = 12;
			}
			else
			{
				$month = date("m")-1;
			}
		 }
		 
		 
		 if(isset($_GET['y']))
		{
			$year = $_GET['y'];
		}
		else
		{
			if($year==date("Y") && date("m")==1)
			{
				$year = date("Y")-1;
			}
			else
			{
				$year = date("Y");
			}
		 }

	      $relations = [

            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', ''),
			'sites_attr_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id'),
			'syear' => $year,
			'smonth' => $month,
			'userid' => Auth::user()->id

        ]; 
		return view('firereports.index', $relations);

    } 
}
?>