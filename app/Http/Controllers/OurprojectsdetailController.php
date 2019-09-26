<?php

namespace App\Http\Controllers;

use App\Http\Requests;


use Request;

class OurprojectsdetailController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function detailView()
    {
        //return view('contactus');
		 
		 $segment1 = Request::segment(1);
		$segment2 = Request::segment(2);
		
       $relations = [
            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
			//'sites_names' => \App\Sites::get()->pluck('title', 'id')->prepend('All', ''),
			'sites_names' => \App\Sites::get()->pluck('name', 'id')->prepend('All', ''),
			'segmentval' => $segment2,  
        ];    

		if($segment2 == '1'){

		  return view('ourprojects-details');

		} 

		if($segment2 == '2'){

		  return view('ourprojects-details');

		} 

		if($segment2 == '3'){

		  return view('ourprojects-details');

		} 

		if($segment2 == '4'){

		  return view('ourprojects-details');

		} 
 
    }
}
  