<?php

  
  
namespace App\Http\Controllers;





use Illuminate\Http\Request;

use App\Http\Requests\StoreTasksRequest;

use App\Http\Requests\UpdateTasksRequest;
use Illuminate\Support\Facades\Input;
use App\CommunityAsset;
  

class AmcController extends Controller

{



    /**

     * Display a listing of Client.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {
       $site_id = Input::get('site_id', 0);
       if(!$site_id) {
            $siteRow = \App\Site::select('id')->first();
            $site_id = $siteRow->id;
       }

       $amc_intervals = array(15=>'15 days',45=>'45 days',30=>'monthly',60=>'2 months',90=>'3 months',120=>'4 months',150=>'5 months',180=>'6 months',240=>'8 months',360=>'yearly','');

       $weeks = array(1=>1);
       $sdate = date("Y")."-01-01";
       //$dates = array(1=>$sdate);
       $months = array(1=>1);
       $monthnames = array(1=>'January');
       $sdate = strtotime($sdate);
       $m=1;
       for($w=2;$w<=52;$w++) {
            $sdate += 7*24*60*60;
            $weeks[$w] = date("n",$sdate);            
            if($weeks[$w]==$m) $months[$m]++;
            else {
                $m++;
                $months[$m]=1;
            }
            $monthnames[$m] = date("F",$sdate);
            //$dates[$w] = date("Y-m-d",$sdate);
       }
       //print_r($weeks);print_r($dates);
       //print_r($monthnames);print_r($months);


        $communities = \App\Site::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
        $categories = \App\AssetType::get()->pluck('name', 'id');
        $cassets = array();
        foreach($categories as $ci=>$cval) {
            $asst = CommunityAsset::select("name",'amc_interval','amc_startdate')->where('site_id',$site_id)->where('category_id',$ci)->where('amc_interval','>',0);
            if($asst->count()) {
                $assets = $asst->get();
                $cassets[$ci] = array('assets'=>$assets,'rows'=>$asst->count());
            }
        }

        $colorLetters = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
        //$color = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
    

        return view('amc.index', compact('communities','site_id','categories','amc_intervals','cassets','monthnames','months','colorLetters'));

    }  
 
 
 
    /**

     * Show the form for creating new Client.
 
     *

     * @return \Illuminate\Http\Response

     */




}

