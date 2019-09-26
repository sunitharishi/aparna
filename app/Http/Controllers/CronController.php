<?php



namespace App\Http\Controllers;




use PDF;



use App\Project;
use App\Dailylockpermission;







use Carbon\Carbon;







use App\Transaction;







use App\Fmsdailyreport;



use App\Pmsdailyreport;



use App\Firesafedailyreport;
use App\Firesafedailyreportvalidation;


use App\Securitydailyreport;

use App\Dailyfmsdgsetreport;
use App\Dailylocktime;



use Request;

use Auth;

use App\Emp;

use DB;


use App\Http\Requests\StoreFpmRequest;

use App\Http\Requests\StoreDailyLocktime;

use App\Http\Requests\StoreLockPermissionRequest;





use App\Http\Requests\StoreSecurityRequest;



use App\Http\Requests\StorePmsRequest;



use App\Http\Requests\StoreFiresafeRequest;




class CronController extends Controller



{







    /**







     * Index page







     * 







     * @param Request $request







     *







     * @return \Illuminate\View\View







     */
	 
	  public function __construct()

    {

      //  $this->middleware('auth');

    }


	
	
	 public function sentsms(Request $request)

    { 
	$notented = array();
	$sitearr =  \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
	  if (count($sitearr) > 0) {
        foreach ($sitearr as $kk => $client) {
		   $date =  date('d-m-Y'); 
            $resarr =  checkDailyStatus($date, $kk); 
			if($resarr[0] == 'yes' && $resarr[1] == 'yes' && $resarr[1] == 'yes' && $resarr[2] == 'yes' && $resarr[3] == 'yes'){
			  
			}else{
			   $notented[$kk] = $client;
			}
			 
		  }
		}
		
		$string = "";
		$cn = count($notented);
		if($cn > 0){
		   $string = implode(" ",$notented);
		}
		 
			$phone = '9010435435';
			$msg = "All IS WELL";
 $url ="http://tra.bulksmshyderabad.co.in/websms/sendsms.aspx?userid=ZONUPT&password=tech12344&sender=ZONUPT&mobileno=".$phone."&msg=".$msg."";
 
 
 
 
		$phone = '9010435435';
			$msg = "All IS WELL";
 $url ="http://tra.bulksmshyderabad.co.in/websms/sendsms.aspx?userid=ZONUPT&password=tech12344&sender=ZONUPT&mobileno=".$phone."&msg=".$msg."";
// Apmspl: 5 sites(sarovar,grande,lotus,tulip,) data not entered
   $data =   $cn.' sites ('.$string.') data not entered';
   $data = str_replace(" ","%20",$data);
   echo $data;
 
    
echo 'http://tra.bulksmshyderabad.co.in/websms/sendsms.aspx?userid=ZONUPT&password=tech12344&sender=ZONUPT&mobileno=7207255435&msg='.$data.'';



 
 /*$json_url = "http://tra.bulksmshyderabad.co.in/websms/sendsms.aspx?userid=ZONUPT&password=tech12344&sender=ZONUPT&mobileno=7207255435&msg=".$data."";
$json = file_get_contents($json_url);
$parseJ = json_decode($json,true); */
 
   
 
 $ch = curl_init('http://tra.bulksmshyderabad.co.in/websms/sendsms.aspx?userid=ZONUPT&password=tech12344&sender=ZONUPT&mobileno=7207255435&msg='.$data.'');  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);				
		echo $json = curl_exec($ch);
		 
		  
	
$info = curl_getinfo($ch); 

// close cURL resource, and free up system resources
curl_close($ch);

//print_r($info);

 
 
 /*echo $url;
  $ch = curl_init(); 

    curl_setopt($ch, CURLOPT_URL, $url); 

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

    curl_setopt($ch, CURLOPT_TIMEOUT, 4); 

    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: close')); 



    $start = array_sum(explode(' ', microtime())); 

    echo $result = curl_exec($ch); */
	//$url = "https://www.google.com";  


		
  
    }
	
	
	
	
	
	


}







