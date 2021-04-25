<?php
ob_start();
date_default_timezone_set("Asia/Kolkata");
include("db.config.inc.php");
/*header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
header("cache-control: no-cache, no-store, must-revalidate");*/

//// each client should remember their session id for EXACTLY 1 hour
session_start();
 
$qry_global=mysqli_query($DB_LINK,"select * from tbl_setting");
$global_fetch=mysqli_fetch_array($qry_global);
$SITE_NAME= stripslashes($global_fetch['site_name']);
$SITE_URL='';
if($getCurrentHost=='localhost')
    {
        $SITE_URL="http://".$getCurrentHost.$getCurrentURL;
    }
    else
    {
        $SITE_URL= stripslashes($global_fetch['site_url']);
    }
    //echo $SITE_URL;

$EMAIL_ID=stripslashes($global_fetch['email']);
$EMAIL_ID2=stripslashes($global_fetch['email2']);
$phone=stripslashes($global_fetch['phone']);
$mobile=stripslashes($global_fetch['mobile']);
$mobile2=stripslashes($global_fetch['mobile2']);
$fax=stripslashes($global_fetch['fax']);
$address=stripslashes($global_fetch['address']);
$MAP=stripslashes($global_fetch['google_map']);
$F=stripslashes($global_fetch['f']);
$L=stripslashes($global_fetch['l']);
$T=stripslashes($global_fetch['t']);
$Y=stripslashes($global_fetch['y']);
$G=stripslashes($global_fetch['g']);
$WEBMAIL=stripslashes($global_fetch['webmail']);
$MPASS=stripslashes($global_fetch['mpass']);
$HOST=stripslashes($global_fetch['host']);
$PORT=stripslashes($global_fetch['port']);
$IS_MENU=stripslashes($global_fetch['is_menu']);
$msg_contact=stripslashes($global_fetch['msg_contact']);
$msg_pass=stripslashes($global_fetch['msg_pass']);
  $msg_sender_id=stripslashes($global_fetch['msg_sender_id']);
$msg_type=stripslashes($global_fetch['msg_typ']);
$SESSION_MIN = 10;
$current_year = date('Y'); 
$ADMIN_HTML_TITLE=stripslashes($global_fetch['site_admin_title']);
// function for admin login validation
function validate()
{
	if (time() - $_SESSION['CREATED'] > 1800) 
    {
   		// session started more than 30 minutes ago
    	//session_regenerate_id(true);    // change session ID for the current session and invalidate old session ID
    	//$_SESSION['CREATED'] = time();  // update creation time
		header("location:sign-in");
		exit();
	}
}



function master_main()
{
	if(!isset($_SESSION['session_master']))
	{
		header("location:sign-in");
		exit();
	}
}
// function for user login validation
function validate_user()
{
	if (time() - $_SESSION['CREATED_USER'] > 1800) 
  	{
  		// session started more than 30 minutes ago
    	//session_regenerate_id(true);    // change session ID for the current session and invalidate old session ID
    	//$_SESSION['CREATED'] = time();  // update creation time
		session_destroy(); 
		header("location:sign-in");
		exit();
	}
}
function master_user()
{
	if(!isset($_SESSION['session_user']))
	{
		header("location:../login.html");
		exit();
	}
}
// function for staff login validation
function validate_staff()
{
	if (time() - $_SESSION['CREATED_STAFF'] > 1800) 
  	{
  		// session started more than 30 minutes ago
    	//session_regenerate_id(true);    // change session ID for the current session and invalidate old session ID
    	//$_SESSION['CREATED'] = time();  // update creation time
		session_destroy(); 
		header("location:../login.html");
		exit();
	}
}
function master_staff()
{
	if(!isset($_SESSION['session_staff']))
	{
		//header("location:sign-in");
		//exit();
		header("location:../login.html");
		exit();
	}
}
// function for user login validation
function validate_branch()
{
	if (time() - $_SESSION['CREATED_BRANCH'] > 1800) 
  	{
  		// session started more than 30 minutes ago
    	//session_regenerate_id(true);    // change session ID for the current session and invalidate old session ID
    	//$_SESSION['CREATED'] = time();  // update creation time
		session_destroy(); 
		header("location:sign-in");
		exit();
	}
}
function master_branch()
{
	if(!isset($_SESSION['session_branch']))
	{
		header("location:sign-in");
		exit();
	}
}
function update_kyc()
{
	if($_SESSION['user_uid']=='')
	{
		$_SESSION[ 'warn_msg' ] = "Kindly complete the profile";
		header("Location: ../profile_edit");
		exit;
	}
}
function update_bank()
{
	if($_SESSION['user_bank']=='')
	{
		$_SESSION['warn_msg'] = "Kindly complete the Bank Details";
		header("Location: ../bank_details_edit");
		exit;
	}
}
//SEO URL Friendly
function clean($string) 
{
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
   $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
   return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
}
// function for filter the string
function normal_filter($val)
{
	return ucfirst(stripslashes($val));
}
function strip_filter($val)
{
	return  stripslashes(strip_tags($val));
}
function caps_filter($val)
{
	return strtoupper(stripslashes($val));
}
function normalall_filter($val)
{
	return ucwords(stripslashes($val));
}
function date_dmy($date)
{
	if($date!='' || $date!='0000-00-00 00:00:00')
  	{
  		/*$e=mysqli_fetch_array(mysqli_query("select convert_tz('$date','+00:00','+12:00')"));
  		$date= $e[0];
  		list($date_new,$time_new)=explode(" ",$date);
  		list($y,$m,$d)=explode("-",$date_new);
  		list($hr,$min,$sec)=explode(":",$time_new);*/
  		return date("j M Y h:i A", strtotime($date));
  	}
}
function date_dmy_small($date)
{
  	if($date!='' || $date!='0000-00-00')
  	{
  		 return date("j M Y", strtotime($date));
  	}
}
// function to access description form content table
function enc($val)
{
	if($val!='')
	{
		$new_val=base64_encode(base64_encode(base64_encode(base64_encode($val))));
		return $new_val;
	}
}
function dec($val)
{
	if($val!='')
	{
		$org_val=base64_decode(base64_decode(base64_decode(base64_decode($val))));
		return $org_val;
	}
}
function enc_normal($val)
{
	if($val!='')
	{
		$new_val=base64_encode(base64_encode($val));
		return $new_val;
	}
}
function dec_normal($val)
{
	if($val!='')
	{
		$org_val=base64_decode(base64_decode($val));
		return $org_val;
	}
}
 
/*function show_content($id,$row_name,$DB_LINK)
{
	$grs=mysqli_query($DB_LINK,"select $row_name from pages where id='$id'");
	$row=mysqli_fetch_array($grs);
	return $row[$row_name];
}*/

function show_title($id)
{
    global $DB_LINK;
    $grs=mysqli_query($DB_LINK,"select title from tbl_category where id='$id'");
    $row=mysqli_fetch_array($grs);
    return $row['title'];
}

function show_content($id)
{
    global $DB_LINK;
    $grs=mysqli_query($DB_LINK,"select description from tbl_category where id='$id'");
    $row=mysqli_fetch_array($grs);
    return $row['description'];
}
 
function data_cutter($data,$cut)
{
	if(strlen(stripslashes($data))>$cut)
	{
		$cutdata=ucfirst(substr(stripslashes($data),0,$cut)).".."; 
	}
	else 
	{
		$cutdata=stripslashes($data); 
	}
	return $cutdata;
}
function date_dm($date)
{
  	if($date!='' && $date!='0000-00-00 00:00:00' && $date!='0000-00-00')
  	{
		return date("j M Y",strtotime($date));
  	}
}
function curPageName() 
{
	return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
}
$currentPG=curPageName(); 
//session_destroy();
function get_client_ip() 
{
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
function get_ip() 
{
	//Just get the headers if we can or else use the SERVER global
	if ( function_exists( 'apache_request_headers' ) ) 
	{
		$headers = apache_request_headers();
	} else 
	{
			$headers = $_SERVER;
	}
	//Get the forwarded IP if it exists
	if ( array_key_exists( 'X-Forwarded-For', $headers ) && filter_var( $headers['X-Forwarded-For'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 ) ) 			    {
		$the_ip = $headers['X-Forwarded-For'];
	} 
	elseif ( array_key_exists( 'HTTP_X_FORWARDED_FOR', $headers ) && filter_var( $headers['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 )
		) 
	{
		$the_ip = $headers['HTTP_X_FORWARDED_FOR'];
	} 
	else 
	{
			
		$the_ip = filter_var( $_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 );
	}
	return $the_ip;
}
	
function ip_store($log_type,$log_id)
{ 
  global $DB_LINK;
	$ip=get_ip();
	mysqli_query($DB_LINK, "insert into log_data set ip='$ip', log_typ='$log_type', log_id='$log_id'");
}
	
// Numbetr to words
class number_to_words
{
    public function __construct()
    {
             // initialization values
        $this->_hyphen      = '-';
        $this->_separator   = ', ';
        $this->_negative    = 'negative ';
        $this->_space       = ' ';
        $this->_conjunction = ' ';
        $this->_decimal     = 'point ';
        $this->_rupees      = ' rupees';
        $this->_only        = ' only';
            
        // call array of words
        $this->arr_words();           
    }
    protected function arr_words()
    {
        // array words
        $this->_dictionary   = array(
          "0"                   => 'zero',
          "1"                   => 'one',
          "2"                   => 'two',
          "3"                   => 'three',
          "4"                   => 'four',
          "5"                   => 'five',
          "6"                   => 'six',
          "7"                   => 'seven',
          "8"                   => 'eight',
          "9"                   => 'nine',
          "00"                  => 'zero zero',
          "01"                  => 'zero one',
          "02"                  => 'zero two',
          "03"                  => 'zero three',
          "04"                  => 'zero four',
          "05"                  => 'zero five',
          "06"                  => 'zero six',
          "07"                  => 'zero seven',
          "08"                  => 'zero eight',
          "09"                  => 'zero nine',
          "10"                  => 'ten',
          "11"                  => 'eleven',
          "12"                  => 'twelve',
          "13"                  => 'thirteen',
          "14"                  => 'fourteen',
          "15"                  => 'fifteen',
          "16"                  => 'sixteen',
          "17"                  => 'seventeen',
          "18"                  => 'eighteen',
          "19"                  => 'nineteen',
          "20"                  => 'twenty',
          "30"                  => 'thirty',
          "40"                  => 'fourty',
          "50"                  => 'fifty',
          "60"                  => 'sixty',
          "70"                  => 'seventy',
          "80"                  => 'eighty',
          "90"                  => 'ninety',
          "100"                 => 'hundred',
          "1000"                => 'thousand',
          "1000000"             => 'million',
          "1000000000"          => 'billion',
          "1000000000000"       => 'trillion',
          "1000000000000000"    => 'quadrillion',
          "1000000000000000000" => 'quintillion'
      );
   } // end function arr_words
                                
   /**  
     * @param $number
    * @param $first
    */
    public function convert_number_to_words($number, $first=true) 
    {
       //check number is number or not
       if (!is_numeric($number)) {
          return false;
       }
            
       if (($number >= 0 && intval($number )< 0) || intval($number) < 0 - PHP_INT_MAX) 
	   {
          // overflow
          trigger_error('convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX, E_USER_WARNING);
                 return false;
       }
        
       //check number whether is negative or not
       //if it is negative then call the function with positive number
       if ($number < 0) 
	   {
          return $this->_negative . $this->convert_number_to_words(abs($number));
       }
       //assign null value to variables
       $string = $fraction = null;
            
       // check Decimal place in number
       if (strpos($number, '.') !== false) 
	   {
           list($number, $fraction) = explode('.', $number);
       }
           
       switch (true) 
       {
           case $number < 21:
                    
             $string = $this->_dictionary["$number"];
             break;
                    
           case $number < 100:
                     
              $tens   = (intval($number / 10)) * 10;
              $units  = $number % 10;
              $string = $this->_dictionary["$tens"];
                   
              if ($units) 
			  {
                 $string .= $this->_space . $this->_dictionary["$units"];
              }
              break;
                    
           case $number < 1000:
                    
               $hundreds  = intval($number / 100);
               $remainder = $number % 100;
$string = $this->_dictionary["$hundreds"] . ' ' .$this->_dictionary["100"];
                    
               if ($remainder) 
			   {
                        $string .= $this->_conjunction . $this->convert_number_to_words($remainder, false);
               }
               break;
                    
           default:
                   
              $baseUnit = pow(1000, floor(log($number, 1000)));                
              $numBaseUnits = intval($number / $baseUnit);
              $remainder = $number % $baseUnit;
              $string = $this->convert_number_to_words($numBaseUnits, false) . ' ' . $this->_dictionary["$baseUnit"];
                    
              if ($remainder) 
			  {
                 $string .= $this->_conjunction;
                 $string .= $this->convert_number_to_words($remainder, false);
              }
              break;
      }
    
     // start - decimal place
     if (null !== $fraction && is_numeric($fraction)) 
	 {
     	$string .= $this->_rupees . $this->_conjunction . $this->_decimal;
        		
        /**
         * if decimal comes 10, 20, 30 ..upto 90. 0 is removing from number.
         * suppose you were not specify decimal place with 2 digits. like 100.5, 3.9
         * so we need CONCAT 0 with number
         * it would come ten twenty..
         */
       if ($fraction < 10) $fraction = $fraction . '0';
        		   
          $string .= $this->convert_number_to_words($fraction, false);
              //add only
          $string .= $this->_only;
       }
       // end  - decimal place
            
       //first time only this condition would execute.
       //without decimal place.
        if ($fraction === null && $first == true) 
		{
            $string .= $this->_rupees . $this->_only;
        }
            
      return $string;
            
   } // end function convert_number_to_words
        
}
//Date ago time
function timeAgo($time_ago)
{
    $time_ago = strtotime($time_ago);
    $cur_time   = time();
    $time_elapsed   = $cur_time - $time_ago;
    $seconds    = $time_elapsed ;
    $minutes    = round($time_elapsed / 60 );
    $hours      = round($time_elapsed / 3600);
    $days       = round($time_elapsed / 86400 );
    $weeks      = round($time_elapsed / 604800);
    $months     = round($time_elapsed / 2600640 );
    $years      = round($time_elapsed / 31207680 );
    // Seconds
    if($seconds <= 60){
        echo "Just now";
    }
    //Minutes
    else if($minutes <=60){
        if($minutes==1)
		{
            echo "One minute ago";
        }
        else
		{
            echo "$minutes minutes ago";
        }
    }
    //Hours
    else if($hours <=24)
	{
        if($hours==1){
            echo "An hour ago";
        }else{
            echo "$hours hrs ago";
        }
    }
    //Days
    else if($days <= 7)
	{
        if($days==1){
            echo "Yesterday";
        }else{
            echo "$days days ago";
        }
    }
    //Weeks
    else if($weeks <= 4.3)
	{
        if($weeks==1){
            echo "A week ago";
        }else{
            echo "$weeks weeks ago";
        }
    }
    //Months
    else if($months <=12)
	{
        if($months==1){
            echo "A month ago";
        }else{
            echo "$months months ago";
        }
    }
    //Years
    else
	{
        if($years==1)
		{
            echo "One year ago";
        }else{
            echo "$years years ago";
        }
    }
} 
function my_data($m_id)
{
	global $DB_LINK;
	$qry=mysqli_query($DB_LINK,"select title,name from staff where m_id='$m_id' ");
 
    $data_get=mysqli_fetch_array($qry);
    return $data_get['title'].' '.$data_get['name'];       
}
  
function my_data_id($m_id)
{
	global $DB_LINK;
	$qry=mysqli_query($DB_LINK,"select title,name from tbl_customer where id='$m_id' ");
 
    $data_get=mysqli_fetch_array($qry);
    return $data_get['title'].' '.$data_get['name'];       
}
function rec($m_id)
{
	global $DB_LINK;
	$qry=mysqli_query($DB_LINK,"select m_id,r_id,p_id from staff where p_id='$m_id' ");
  
	if(mysqli_num_rows($qry)>0)
    {
    	$data_get=mysqli_fetch_array($qry);
        return $data_get['m_id'];
    }
    else
        return 'No data';
}
function rec_anyleg($m_id,$place)
{
	global $DB_LINK;
	$placer_id= $m_id; 
  	$qry=mysqli_query($DB_LINK,"select m_id from staff where p_id='$m_id' and placing='".$place."' ");  
  	if(mysqli_num_rows($qry)>0)
    {          
    	$data_get=mysqli_fetch_array($qry);
        rec_anyleg($DB_LINK,$data_get['m_id'],$place);  
    }
    else 
    {  
        $_SESSION['placer_id']=$placer_id;
        return $placer_id;   
    }            
}
global  $placer_id_all, $tempTree,$exclude, $depth; 
function rec_anyleg_all($m_id,$place)
{
	global $DB_LINK;
	$tempTree='';
  	$depth='0';
  	$placer_id= $m_id; 
  	$placer_id_all='';
  	$qry=mysqli_query($DB_LINK,"select m_id from staff where p_id='$m_id'     and placing='$place'");  
  	if(mysqli_num_rows($qry)>0)
    {          
		$data_get=mysqli_fetch_array($qry);
		$placer_id=$data_get['m_id'];
		$placer_id_all .= $data_get['m_id'].'~';
		$placer_id_all.=totaldownlinemembers($DB_LINK,$placer_id); 
	  	return $placer_id_all;		  
    }
    else 
	{  
           
        return $placer_id_all;   
    }            
}
/*function totaldownlinemembers($a)// Recursive function to get all of the children... unlimited depth
{  
	//error_reporting(0);
	
	// Refer to the global array defined at the top of this script
	global $DB_LINK;
	$child_query = mysqli_query($DB_LINK,"SELECT m_id, p_id FROM staff WHERE p_id=".$a);
	while ( $child = mysqli_fetch_array($child_query) )
	{
		if ( $child['m_id'] != $child['p_id'] )
		{
			for ( $c=0;$c<$depth;$c++ ) // Indent over so that there is distinction between levels
			{ $tempTree .= ""; }
			$tempTree .= $child['m_id'].'~';
			$depth++;		
			$tempTree .= totaldownlinemembers($DB_LINK,$child['m_id']);	 
		} 
	} 
	return $tempTree;
}*//*function totaldownlinemembers($a)// Recursive function to get all of the children... unlimited depth
{
	//error_reporting(0);

	// Refer to the global array defined at the top of this script
	global $DB_LINK;
	$child_query = mysqli_query($DB_LINK,"SELECT m_id, p_id FROM staff WHERE p_id=".$a);
	while ( $child = mysqli_fetch_array($child_query) )
	{
		if ( $child['m_id'] != $child['p_id'] )
		{
			for ( $c=0;$c<$depth;$c++ ) // Indent over so that there is distinction between levels
			{ $tempTree .= ""; }
			$tempTree .= $child['m_id'].'~';
			$depth++;
			$tempTree .= totaldownlinemembers($DB_LINK,$child['m_id']);
		}
	}
	return $tempTree;
}*/
function mem_status($m_id)
{
	global $DB_LINK;
	$c_query = mysqli_query($DB_LINK,"SELECT status FROM staff WHERE m_id=".$m_id);
	$c_data = mysqli_fetch_array($c_query);
	return $c_data['status'];
	
}
function sum_of_payout($m_id)
{ 
	global $DB_LINK;
	$paid=0;
	$c_query = mysqli_query($DB_LINK,"SELECT sum(lev) as paid FROM tbl_target WHERE m_id=".$m_id);
	$c_data = mysqli_fetch_array($c_query);
	if($c_data['paid']!='')
	{ 
		$paid=$c_data['paid'];
	}
	return $paid;
	
}
function yearCalculator($dt, $y){
    if(!empty($dt)){
        $dt=strtotime($dt);
		$end = strtotime('+'. $y .'year', $dt);
		$year=date('Y-m-d',$end);
		//$year=date('d M Y',$end);
		return $year;
    }else{
        return 0;
    }
}
function simpleInterest($p, $r, $t){
	
	$si = ($p*$r*$t)/100;
	
	$amt=$p+$si;
	
	return $amt;
}
function refresh_wallet($userid, $byledger)
{
	global $DB_LINK; $inco=0;$expe=0;$final_bal=0;
	//echo "SELECT * FROM `tbl_leg_add` where to_mem='".$userid."' and byledger='".$byledger."' order by id desc";exit;
 	$qry1=mysqli_query($DB_LINK,"SELECT * FROM `tbl_leg_add` where to_mem='".$userid."' and byledger='".$byledger."' and ttyp!='Wallet Credit By FD' order by id desc") ;
 	while($row1=mysqli_fetch_array($qry1))
 	{
 		if($row1['typ']=='dr') { $expe+=$row1['amt']; }
 		if($row1['typ']=='cr') { $inco+=$row1['amt'];  } 
 	}  
 	return $final_bal=$inco-$expe;
}
function recharge_wallet($userid)
{
	global $DB_LINK;$inco=0;$expe=0;$final_bal=0;
 	$qry1=mysqli_query($DB_LINK,"SELECT * FROM `tbl_leg_rec` where member='".$userid."'   ") ;
 	while($row1=mysqli_fetch_array($qry1))
 	{
 		if($row1['typ']=='dr') { $expe+=$row1['amt']; }
 		if($row1['typ']=='cr') { $inco+=$row1['amt'];  } 
 	}  
   	$recharge_bal=$inco-$expe;
	return round($recharge_bal,2);
}
function insert_ledger($to, $from, $typ, $amt, $prt, $ttyp, $description='', $byledger)
{
	global $DB_LINK;
	$ins="INSERT INTO `tbl_leg_add` set `to_mem`='".$to."', `from_mem`='".$from."', `typ` ='$typ', `amt`='".$amt."', `dt`='".date("Y-m-d")."', `part`='$prt', ttyp='$ttyp', txnid='".time().rand(100,999)."', description='$description', byledger='$byledger'";
	mysqli_query($DB_LINK,$ins);
}
function insert_ledger_rec($to, $typ, $amt, $prt, $ttyp)
{
	global $DB_LINK;
	$ins="INSERT INTO `tbl_leg_rec` set `member`='".$to."', `typ` ='$typ', `amt`='".$amt."', `dt`='".date("Y-m-d")."', `part`='$prt', ttyp='$ttyp', txnid='".time().rand(100,999)."'";
	mysqli_query($DB_LINK,$ins);
}
function recharge_api($operatorcode, $number, $amount)
{
	global $p2a_cid, $p2a_apitoken, $cnumber;
	function httpGetWithErros($url)
	{
		$ch = curl_init();  
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		$output=curl_exec($ch);
			 
		if($output === false)
		{
			echo "Error Number:".curl_errno($ch)."<br>";
			echo "Error String:".curl_error($ch);
		}
		curl_close($ch);
		return $output;
	}
		
	$provider_id = $operatorcode; 
	$number = $number;
	$amount = $amount;
	$client_id = $p2a_cid; //(your system unique id. that you can check in pay2all);
	//end of data collection from form
	//check whether user enter some data or not
	if(empty($provider_id))
	{
		echo"select operator";
		exit;
	}
	if(empty($number))
	{
		echo"enter mobile number";
		exit;
	}
	if(empty($amount))
	{
		echo"enter amount";
		exit;
	}
	$api_token =$p2a_apitoken; // api_token token will in (https://www.pay2all.in/developers/recharge-api-doc) 
			
	$url = "https://www.pay2all.in/web-api/paynow?api_token=$api_token&number=$number&provider_id=$provider_id&amount=$amount&client_id=$client_id";
	
	if($rowm['rec_type']=='DTH Recharge')
 	{
	 	$url = "https://www.pay2all.in/web-api/paynow?api_token=$api_token&number=$number&provider_id=$provider_id&amount=$amount&client_id=$client_id&cnumber=";  
 	} 
 	if($rowm['rec_type']=='Telephone Payment')
 	{
 		$url = "https://www.pay2all.in/web-api/paynow?api_token=$api_token&number=$number&provider_id=$provider_id&amount=$amount&client_id=$client_id&optional1=&optional2=&optional3=";
 	}
	if($rowm['rec_type']=='DataCard Recharge')
 	{
 		$url = "https://www.pay2all.in/web-api/paynow?api_token=$api_token&number=$number&provider_id=$provider_id&amount=$amount&client_id=$client_id&cnumber=";  
 	} 
 	if($rowm['rec_type']=='Electricity Payment')
 	{
 		$url = "https://www.pay2all.in/web-api/paynow?api_token=$api_token&number=$number&provider_id=$provider_id&amount=$amount&client_id=$client_id&optional1=&optional2=&optional3=";
 	}	
	$response = httpGetWithErros($url);
			
	//$response='{"payid":"8952252","operator_ref":"","status":"success","message":"Transaction Submitted Successfully Done, Check Status in Transaction Report, Thanks","txstatus_desc":"Pending"}';
	$result='['.$response.']';
		 
	$status='';
	$txnid='';
	$ref_id='';
	$r_status='';
	$jsonRS = json_decode ($result,true);
	return $jsonRS;
}
function sms_sender($contact, $sms_text,$templet_id)
{
  global $msg_contact, $msg_pass, $msg_sender_id;
  $new = str_replace(' ', '%20', $sms_text);
  // Account details
  $username = $msg_contact;
  $password = $msg_pass;
// Message details
  $senderid = $msg_sender_id;
  $type = '1';
  $product = '1';
  $number = $contact;
  $message = $new;
// API credentials
  $credentials = 'username=' . $username . '&password=' . $password;
// prepare data for GET request
  $data = '&sender=' . $senderid . '&mobile=' . $number . '&type=' . $type . '&product=' . $product . '&template='.$templet_id.'&message=' . $message;
// make url to post using cURL

    //http://makemysms.in/api/sendsms.php?username=XXXXXX&password=XXXXXX&sender=XXXXXX&mobile=91XXXXXXXXXX&type=1&product=1&template=XXXXXXXXXXXXXXXXXX&message=hello
  $url = 'http://makemysms.in/api/sendsms.php?' . $credentials . $data;
  $curl = curl_init();
  curl_setopt_array($curl, array(
   CURLOPT_URL => $url,
   CURLOPT_RETURNTRANSFER => true,
   CURLOPT_ENCODING => "",
   CURLOPT_MAXREDIRS => 10,
   CURLOPT_TIMEOUT => 30,
   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
   CURLOPT_CUSTOMREQUEST => "GET",
   CURLOPT_HTTPHEADER => array(
    "Accept: */*",
    "Accept-Encoding: gzip, deflate",
    "Cache-Control: no-cache",
    "Connection: keep-alive",
    "Host: sms.friendzitsolutions.biz",
    "Postman-Token: 8b87ccb2-d715-41c0-bb5a-18b842fd14f0,7a21e08f-b8c6-4293-a8cd-6d6f0d623852",
    "User-Agent: PostmanRuntime/7.15.2",
    "cache-control: no-cache"
   ),
  ));
  $response = curl_exec($curl);
  $err = curl_error($curl);
  curl_close($curl);
  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    echo $response;
  }



//     if ($err) {
//        echo "cURL Error #:" . $err;
//    } else {
//        echo $response;
//    }






    /* global $msg_contact, $msg_pass, $msg_sender_id;
 $username = $msg_contact;
 $password = $msg_pass;
// Message details
 $senderid = $msg_sender_id;
 $type = '1';
 $product = '1';
 $number = $contact;
 $message = $sms_text;
// API credentials
 $credentials = 'username='. $username . '&password='. $password;
// prepare data for GET request
  $data = '&sender='. $senderid . '&mobile='. $number . '&type='.$type. '&product='. $product .'&message='. $message;
// make url to post using cURL
  echo $url = 'http://sms.friendzitsolutions.biz/api/sendsms.php?'. $credentials . $data;
exit;
  $url=str_replace(' ', '%20', $url);
 $curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"api\"\r\n\r\nQXpvbGxhQXBwRGV2ZWxvcGVkYnlhbWl0\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"device\"\r\n\r\n android\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"maid_id\"\r\n\r\n4\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"customer_id\"\r\n\r\n6\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"title\"\r\n\r\nHio\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"content\"\r\n\r\nhi\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
  CURLOPT_HTTPHEADER => array(
    "Postman-Token: 0ff0f943-344f-4551-a267-8664d39fda40",
    "cache-control: no-cache",
    "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW"
  ),
));
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl); */
//if ($err) {
//  echo "cURL Error #:" . $err;
//} else {
//  echo $response;
//}




    /*

    $data ="mobile=".$msg_contact."&pass=".$msg_pass."&senderid=".$msg_sender_id."&to=".$contact."&msg=".$sms_text."";

    //echo $data;exit;

     // Send the POST request with cURL
    $ch = curl_init('http://tsms.friendzitsolutions.biz/sendsms.aspx?'); //note https for SSL
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch); //This is the result from Textlocal
    curl_close($ch);
    return $result;*/
}


function mail_sender($contact, $sms_text)
{ 
	$subject = "Query About ".$SITE_NAME ;
	$mail_body = '<div style="font:Arial, Helvetica, sans-serif;color:#000;text-decoration:none;font-weight:normal;">Hi, '.$_POST['name'].'<br>
	
	<div style="padding:10px;">
		<img src="$SITE_URL/links/images/paysol-logo.png" alt="" />
	</div>
		
	<table cellpadding="5" cellspacing="0" width="400px" style="line-height:22px;">
				 
	  <tr>
		  <td>Name</td> 
		  <td valign="top" >:</td>
		  <td>'.$_POST['name'].'</td>
	  </tr>
		  
	  <tr>
		  <td>Mobile</td>
		  <td valign="top" >:</td> 
		  <td>'.$_POST['phone'].'</td>
	   </tr>
		  
	   <tr>
		  <td>Email</td> 
		  <td valign="top" >:</td>
		  <td>'.$_POST['email'].'</td>
	   </tr>
		  
	   <tr>
		  <td>Messege</td> 
		  <td valign="top" >:</td>
		  <td>'.$_POST['msg'].'</td>
	   </tr>    
		  
	</table>
	</div>';
				
				 
	include('links/mailer/PHPMailerAutoload.php');
	$mail = new PHPMailer; 
	$mail->isSMTP(); // Set mailer to use SMTP
	$mail->Host = $HOST; // Specify main and backup server
	$mail->SMTPAuth = true; // Enable SMTP authentication
	$mail->Username = $WEBMAIL; // SMTP username
	$mail->Password = $MPASS; // SMTP password
	$mail->SMTPSecure = 'ssl'; // Enable encryption, 'ssl' also accepted
	$mail->Port = $PORT; //Set the SMTP port number - 587 for authenticated TLS
	$mail->setFrom($WEBMAIL,$SITE_NAME); //Set who the message is to be sent from
	//$mail->addReplyTo('labnol@gmail.com', 'First Last');  //Set an alternative reply-to address
	
	//$mail->addAddress('xyz@gmail.com', $SITE_NAME);
	$mail->addAddress($EMAIL_ID, $SITE_NAME);
	$mail->addAddress($_POST['email'],$_POST['name']);
	
	// Name is optional
	//$mail->addCC('cc@example.com');
	//$mail->addBCC('bcc@example.com');
	$mail->WordWrap = 50; // Set word wrap to 50 characters
	$mail->isHTML(true);              
	//$mail->addAttachment('/images/image.jpg', 'new.jpg'); // Optional name                    
	// Set email format to HTML 
	$mail->Subject = $subject;
	$mail->Body    = $mail_body;
	 
	$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
	 
	//Read an HTML message body from an external file, convert referenced images to embedded,
	//convert HTML into a basic pl}ain-text alternative body
	//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
	 
	if($mail->send()) 
	{
		//echo 'Message Sent Mailer';
		// echo 'Mailer Error: ' . $mail->ErrorInfo;
	}
	else
	{
		//echo 'Message Sent Successfully';
	 
		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		// More headers
		$headers .= 'From: $SITE_NAME<$EMAIL_ID>' . "\r\n";
		//$headers .= 'Cc: xyz@gmail.com' . "\r\n";
		//mail($_POST['email'],$subject,$mail_body,$headers);
		mail($EMAIL_ID,$subject,$mail_body,$headers);
	}
}
/*function msg($type, $module)
{
    switch($type)
    {
        case 'ok': $pop = $module." has been created successfully."; $color = 'success';
        break;
        case 'err': $pop = "Oops ! Something went wrong."; $color = 'warning';
        break;
        case 'invalid': $pop = "Please fill all fields";
        break;
        case 'update': $pop = $module." has been updated successfully.";$color = 'success';
        break;
        case 'exists': $pop = $module." already exists.";$color = 'warning';
        break;
        case 'del': $pop = $module." has been deleted successfully"; $color = 'success';
        break;
    }
    $result = array($pop, $color);
    return $result;
}*/
function alert_msg($type, $module)
{
    switch($type)
    {
        case 'success': $toastr = 'Successfully !!'; $sweetalert = 'success';
        break;
        case 'error': $toastr = 'Error !!'; $sweetalert = 'error';
        break;
        case 'warning': $toastr = 'Warning !!'; $sweetalert = 'warning';
        break;
        case 'info': $toastr = 'Welcome !!'; $sweetalert = 'info';
        break;
    }
    $result = array($toastr, $sweetalert);
    return $result;
}
function logEvent($msg, $message) 
{
	global $DB_LINK;
    if ($message != '') 
	{
		$delim = "\t";   // set delim, eg tab 
		$res = mysqli_query($DB_LINK,$msg); 
		while ($row = mysqli_fetch_row($res)) { 
    		$scoredata = $row;
		} 
        // Add a timestamp to the start of the $message
        //$message = date("Y/m/d H:i:s").': '.$message."\r\n";
		$message = date("Y/m/d H:i:s").': '.$message."".PHP_EOL;
        //$fp = fopen('appLog-'.date('d-m-Y').'.txt', 'a');
		$fp = fopen('logs/appLog-'.date('d-m-Y').'.txt', 'a');
        fwrite($fp, $message);
		fwrite($fp, join($delim, $scoredata) . "\r\n"); 
        fclose($fp);
    }
}
/*
function truncate_number( $number, $precision = 2) {
    // Zero causes issues, and no need to truncate
    if ( 0 == (int)$number ) {
        return $number;
    }
    // Are we negative?
    $negative = $number / abs($number);
    // Cast the number to a positive to solve rounding
    $number = abs($number);
    // Calculate precision number for dividing / multiplying
    $precision = pow(10, $precision);
    // Run the math, re-applying the negative value to ensure returns correctly negative / positive
    return floor( $number * $precision ) / $precision * $negative;
}*/
function cat_title($id)
{
	global $DB_LINK;
	$qry=mysqli_query($DB_LINK,"select title  from tbl_category where id='$id' "); 
    $data_get=mysqli_fetch_array($qry);
    return $data_get['title'];       
}
function cat_data($id)
{
	global $DB_LINK;
	//echo "select description from tbl_category where  id='$id' ";
	$qry=mysqli_query($DB_LINK,"select description from tbl_category where  id='$id' ");
 
    $data_get=mysqli_fetch_array($qry);
    return $data_get['description'];       
}
function cat_img($id)
{
	global $DB_LINK;
	//echo "select description from tbl_category where  id='$id' ";
	$qry=mysqli_query($DB_LINK,"select images from tbl_category where  id='$id' ");
 
    $data_get=mysqli_fetch_array($qry);
    return $data_get['images'];       
}


  function totalmembers($id,$side)
{
    global $DB_LINK1,$tempTree1;
    $sql_rec="SELECT `id`,`sponsor_id`,status, `placement` FROM registration WHERE  sponsor_id='".$id."' and placement='".$side."'";
    $query_rec= mysqli_query($DB_LINK1,$sql_rec);
    while ( $data_rec= mysqli_fetch_array($query_rec) )
    {
        $tempTree1 .= $data_rec['id'].'~';
        totalmembers( $data_rec['id'],$side);
    }
    return $tempTree1;
}

function downlinemembers(  $id)
{

    global $DB_LINK1;
    global $tempTreexx;
    global $exclude, $depth;

    $child_query = mysqli_query($DB_LINK1,"SELECT `id`,`sponsor_id`,status, `placement` FROM registration WHERE sponsor_id='".$id."' ");
    while ( $child= mysqli_fetch_array($child_query) )
    {
        /*if ( $child['id'] != $child['sponsor_id'] )
        {
            for ( $c=0;$c<$depth;$c++ )	 { $tempTree .= ""; }
            echo $tempTree .= $child['id'].'~';
            $depth++;
            $tempTree .= downlinemembers(  $child['id']);
        }*/

        echo $tempTreexx .= $child['id'].'~';
        $tempTreexx .= downlinemembers($child['id']);
    }
    return $tempTreexx;
}


function pv_calc($members_data)
{
    global $DB_LINK1;
    $array_left=explode("~",$members_data);
    $count=count($array_left);
    $left_pv=0;
    for($i=0;$i<$count;$i++)
    {
        $qry_pv=mysqli_query($DB_LINK1,"select * from registration where id='".$array_left[$i]."'") ;
        $rowget=mysqli_fetch_array($qry_pv);
        $left_pv=$left_pv+$rowget['pv'];
    }
    return $left_pv;
}

function verified_filter($members_data)
{
    global $DB_LINK1;
    $array_left=explode("~",$members_data);
    $count=count($array_left);
    $ver_user="";
    for($i=0;$i<$count;$i++)
    {
        $qry_pv=mysqli_query($DB_LINK1,"select id from registration where id='".$array_left[$i]."' and status='2'") ;
        if(mysqli_num_rows($qry_pv)>0)
        {
            $rowget = mysqli_fetch_array($qry_pv);
            $ver_user = $ver_user . "~" . $rowget['id'];
        }
    }
    return $ver_user;
}

function gettotalincome($member_id)
{
    global $DB_LINK1;
    $pay1=0;
    $data="SELECT sum(income) as way1 FROM `binary1` where member='".$member_id."'";
    $qry1=mysqli_query($DB_LINK1,$data);
    $rowget1=mysqli_fetch_array($qry1);
    $pay1=$rowget1['way1'];


    $pay2=0;
    $data2="SELECT sum(amt) as way2 FROM `bonus_pay` where uid='".$member_id."'";
    $qry2=mysqli_query($DB_LINK1,$data2);
    $rowget2=mysqli_fetch_array($qry2);
    $pay2=$rowget2['way2'];


    $pay3=0;
    $data3="SELECT sum(amt) as way3 FROM `royl_pay` where uid='".$member_id."'";
    $qry3=mysqli_query($DB_LINK1,$data3);
    $rowget3=mysqli_fetch_array($qry3);
    $pay3=$rowget3['way3'];


    $pay4=0;
    $data4="SELECT sum(amt) as way4 FROM `sal_pay` where uid='".$member_id."'";
    $qry4=mysqli_query($DB_LINK1,$data4);
    $rowget4=mysqli_fetch_array($qry4);
    $pay4=$rowget4['way4'];


    return $all=$pay1+$pay2+$pay3+$pay4;
}

function getweekincome($member_id,$diff)
{
    $TodayDate = date("Y-m-d");
    $PreviousDate=date('Y-m-d', strtotime($TodayDate. ' - '.$diff.' days'));

    global $DB_LINK1;
    $pay1=0;
    $data="SELECT sum(income) as way1 FROM `binary1` where member='".$member_id."' and dt between '".$PreviousDate."' and '".$TodayDate."' ";
    $qry1=mysqli_query($DB_LINK1,$data);
    $rowget1=mysqli_fetch_array($qry1);
    $pay1=$rowget1['way1'];

    $pay4=0;
    $data4="SELECT sum(amt) as way4 FROM `sal_pay` where uid='".$member_id."' and stat='1' and  dt between '".$PreviousDate."' and '".$TodayDate."'";
    $qry4=mysqli_query($DB_LINK1,$data4);
    $rowget4=mysqli_fetch_array($qry4);
    $pay4=$rowget4['way4'];


    return $all=$pay1+$pay4;
}

function getdesignation($member_id,$status)
{
    global $DB_LINK1;
    $desig="";
    $getqry=mysqli_query($DB_LINK1,"select * from salary where uid='".$member_id."' order by id desc  ");
    $count=mysqli_num_rows($getqry);
    if($count>0) {
        $getval = mysqli_fetch_array($getqry);

        if ($getval['level'] == 1)
            $desig = 'Advisor';
        else if ($getval['level'] == 2)
            $desig = 'Silver Advisor';
        else if ($getval['level'] == 3)
            $desig = 'Gold Advisor';
        else if ($getval['level'] == 4)
            $desig = 'Diamond Advisor';
        else if ($getval['level'] == 5)
            $desig = 'Manager';
        else if ($getval['level'] == 6)
            $desig = 'Silver Manager';
        else if ($getval['level'] == 7)
            $desig = 'Gold Manager';
        else if ($getval['level'] == 8)
            $desig = 'Diamond Manager';
        else if ($getval['level'] == 9)
            $desig = 'Crown';
        else if ($getval['level'] == 10)
            $desig = 'Board Of Director';

        $qry_fordata="update `tbl_member_info` set
          designation_id= '".$getval['level']."',
          designation= '".$desig."' 
          where mem_id='".$member_id."'";
        mysqli_query($DB_LINK1,$qry_fordata);



    }
    else
    {
        if($status==2)
            $desig='Active Member';
        else if($status==0)
            $desig='Registered Member';

        $qry_fordata="update `tbl_member_info` set
          designation_id= '0',
          designation= '".$desig."' 
          where mem_id='".$member_id."'";
        mysqli_query($DB_LINK1,$qry_fordata);
    }
    return  $desig;
}

function getdesignation_bylevel($level)
{
    if ($level == 1)
        $desig = 'Advisor';
    else if ($level == 2)
        $desig = 'Silver Advisor';
    else if ($level == 3)
        $desig = 'Gold Advisor';
    else if ($level == 4)
        $desig = 'Diamond Advisor';
    else if ($level == 5)
        $desig = 'Manager';
    else if ($level == 6)
        $desig = 'Silver Manager';
    else if ($level == 7)
        $desig = 'Gold Manager';
    else if ($level == 8)
        $desig = 'Diamond Manager';
    else if ($level == 9)
        $desig = 'Crown';
    else if ($level == 10)
        $desig = 'Board Of Director';

    return $desig;
}

function validate_newmember()
{
    if(!isset($_SESSION[ 'a_mid' ]))
    {
    	header("Location: ../login.html");
     ?>
					<a href="../login.html">User Logout kindly login again!!!</a>
				<!--	<script>   window.location = "../login.html";  </script>-->
					<?php exit();
    }
}

function validate_newmember_version2()
{
	if(!isset($_SESSION[ 'a_mid' ]))
	{
		header("Location: login.php");
	 exit();
	}
}

function gen_designation($member_id,$status)
{
    ///////Upadte Designation//////////////
    global $DB_LINK1;
    $main=$member_id;

    $sql_member = " select * from tbl_member_info where mem_id='".$main."' ";
    $qry_member = mysqli_query( $DB_LINK1, $sql_member );
    $data_member = mysqli_fetch_array( $qry_member );

//echo "<br><br>[".$_SESSION[ 'a_id' ]."] Name :".$name;
    if($status==2)
    {
        $pay1=$data_member['left_pv'];
        $pay2=$data_member['right_pv'];
        //echo "<br/>left PV= [".$pay1."]";
        //echo "<br/>Right PV= [".$pay2."]";

        if($pay1>=500 && $pay2>=500)
        {
            //echo "<br/>Active For salary";
            $found=mysqli_query($DB_LINK1,"select * from salary where uid='".$main."'");
            $f1=mysqli_num_rows($found);
            if($f1==0)
            {
                if(mysqli_query($DB_LINK1,"INSERT INTO salary(`uid` ,`level` ,`dt` ,sal) values ('".$main."',1,now(),'N')"))
                {
                }
            }
            else
            {
                $found=mysqli_query($DB_LINK1,"select * from salary where uid='".$main."' order by id desc");
                $finder=mysqli_fetch_array($found);
                echo  '<br/>Current level : '.$curlev=$finder['level'];

                switch($curlev)
                {
                    case 1:
                        $bin=$data_member['left_members_data_ver'];
                        $arr1=explode("~",$bin);
                        $countbin=count($arr1);
                        $counterl=0;
                        $pay1=0;
                        $left=0;
                        $rowleft=0;
                        for($i=0;$i<$countbin;$i++)
                        {
                            $left=mysqli_fetch_array(mysqli_query($DB_LINK1,"select * from salary where uid='".$arr1[$i]."' and level=1"));
                            if($left>0)
                                $rowleft=1;
                        }

                        $bin=$data_member['right_members_data_ver'];
                        $arr2=explode("~",$bin);
                        $countbin=count($arr2);
                        $counterl=0;
                        $pay1=0;
                        $rowright=0;
                        $right=0;
                        for($i=0;$i<$countbin;$i++)
                        {
                            $right=mysqli_fetch_array(mysqli_query($DB_LINK1,"select * from salary where uid='".$arr1[$i]."' and level=1"));
                            if($right>0)
                                $rowright=1;
                        }
                        echo  '<br/>Left For Level '.$curlev." count : ".$rowleft;
                        echo  '<br/>Right For Level '.$curlev." count : ".$rowright;

                        if($rowright>0 && $rowleft>0)
                        {
                            $counter_enter=mysqli_fetch_array(mysqli_query($DB_LINK1,"select * from salary where   uid='".$main."'  and level=2   "));
                            if($counter_enter<1)
                            {
                                mysqli_query($DB_LINK1,"insert into  salary set level=2, dt=now(), sal='N' , uid='".$main."' ");
                            }
                        }
                        break;

                    case 2:
                        $bin=$data_member['left_members_data_ver'];
                        $arr1=explode("~",$bin);
                        $countbin=count($arr1);
                        $counterl=0;
                        $pay1=0;
                        $left=0;
                        $rowleft=0;
                        for($i=0;$i<$countbin;$i++)
                        {
                            $left=mysqli_fetch_array(mysqli_query($DB_LINK1,"select * from salary where uid='".$arr1[$i]."' and level=2"));
                            if($left>0)
                                $rowleft=1;
                        }

                        $bin=$data_member['right_members_data_ver'];
                        $arr2=explode("~",$bin);
                        $countbin=count($arr2);
                        $counterl=0;
                        $pay1=0;
                        $rowright=0;
                        $right=0;
                        for($i=0;$i<$countbin;$i++)
                        {
                            $right=mysqli_fetch_array(mysqli_query($DB_LINK1,"select * from salary where uid='".$arr1[$i]."' and level=2"));
                            if($right>0)
                                $rowright=1;
                        }
                        echo  '<br/>Left For Level '.$curlev." count : ".$rowleft;
                        echo  '<br/>Right For Level '.$curlev." count : ".$rowright;

                        if($rowright>0 && $rowleft>0)
                        {
                            $counter_enter=mysqli_fetch_array(mysqli_query($DB_LINK1,"select * from salary where   uid='".$main."'  and level=3   "));
                            if($counter_enter<1)
                            {
                                mysqli_query($DB_LINK1,"insert into  salary set level=3, dt=now(), sal='N' , uid='".$main."' ");
                            }
                        }
                        break;

                    case 3:
                        $bin=$data_member['left_members_data_ver'];
                        $arr1=explode("~",$bin);
                        $countbin=count($arr1);
                        $counterl=0;
                        $pay1=0;
                        $left=0;
                        $rowleft=0;
                        for($i=0;$i<$countbin;$i++)
                        {
                            $left=mysqli_fetch_array(mysqli_query($DB_LINK1,"select * from salary where uid='".$arr1[$i]."' and level=3"));
                            if($left>0)
                                $rowleft=1;
                        }

                        $bin=$data_member['right_members_data_ver'];
                        $arr2=explode("~",$bin);
                        $countbin=count($arr2);
                        $counterl=0;
                        $pay1=0;
                        $rowright=0;
                        $right=0;
                        for($i=0;$i<$countbin;$i++)
                        {
                            $right=mysqli_fetch_array(mysqli_query($DB_LINK1,"select * from salary where uid='".$arr1[$i]."' and level=3"));
                            if($right>0)
                                $rowright=1;
                        }
                        echo  '<br/>Left For Level '.$curlev." count : ".$rowleft;
                        echo  '<br/>Right For Level '.$curlev." count : ".$rowright;

                        if($rowright>0 && $rowleft>0)
                        {
                            $counter_enter=mysqli_fetch_array(mysqli_query($DB_LINK1,"select * from salary where   uid='".$main."'  and level=4   "));
                            if($counter_enter<1)
                            {
                                mysqli_query($DB_LINK1,"insert into  salary set level=4, dt=now(), sal='N' , uid='".$main."' ");
                            }
                        }
                        break;

                    case 4:
                        $bin=$data_member['left_members_data_ver'];
                        $arr1=explode("~",$bin);
                        $countbin=count($arr1);
                        $counterl=0;
                        $pay1=0;
                        $left=0;
                        $rowleft=0;
                        for($i=0;$i<$countbin;$i++)
                        {
                            $left=mysqli_fetch_array(mysqli_query($DB_LINK1,"select * from salary where uid='".$arr1[$i]."' and level=4"));
                            if($left>0)
                                $rowleft=1;
                        }

                        $bin=$data_member['right_members_data_ver'];
                        $arr2=explode("~",$bin);
                        $countbin=count($arr2);
                        $counterl=0;
                        $pay1=0;
                        $rowright=0;
                        $right=0;
                        for($i=0;$i<$countbin;$i++)
                        {
                            $right=mysqli_fetch_array(mysqli_query($DB_LINK1,"select * from salary where uid='".$arr1[$i]."' and level=4"));
                            if($right>0)
                                $rowright=1;
                        }
                        echo  '<br/>Left For Level '.$curlev." count : ".$rowleft;
                        echo  '<br/>Right For Level '.$curlev." count : ".$rowright;

                        if($rowright>0 && $rowleft>0)
                        {
                            $counter_enter=mysqli_fetch_array(mysqli_query($DB_LINK1,"select * from salary where   uid='".$main."'  and level=5   "));
                            if($counter_enter<1)
                            {
                                mysqli_query($DB_LINK1,"insert into  salary set level=5, dt=now(), sal='N' , uid='".$main."' ");
                            }
                        }
                        break;

                    case 5:
                        $bin=$data_member['left_members_data_ver'];
                        $arr1=explode("~",$bin);
                        $countbin=count($arr1);
                        $counterl=0;
                        $pay1=0;
                        $left=0;
                        $rowleft=0;
                        for($i=0;$i<$countbin;$i++)
                        {
                            $left=mysqli_fetch_array(mysqli_query($DB_LINK1,"select * from salary where uid='".$arr1[$i]."' and level=5"));
                            if($left>0)
                                $rowleft=1;
                        }

                        $bin=$data_member['right_members_data_ver'];
                        $arr2=explode("~",$bin);
                        $countbin=count($arr2);
                        $counterl=0;
                        $pay1=0;
                        $rowright=0;
                        $right=0;
                        for($i=0;$i<$countbin;$i++)
                        {
                            $right=mysqli_fetch_array(mysqli_query($DB_LINK1,"select * from salary where uid='".$arr1[$i]."' and level=5"));
                            if($right>0)
                                $rowright=1;
                        }
                        echo  '<br/>Left For Level '.$curlev." count : ".$rowleft;
                        echo  '<br/>Right For Level '.$curlev." count : ".$rowright;

                        if($rowright>0 && $rowleft>0)
                        {
                            $counter_enter=mysqli_fetch_array(mysqli_query($DB_LINK1,"select * from salary where   uid='".$main."'  and level=6   "));
                            if($counter_enter<1)
                            {
                                mysqli_query($DB_LINK1,"insert into  salary set level=6, dt=now(), sal='N' , uid='".$main."' ");
                            }
                        }
                        break;


                    case 6:
                        $bin=$data_member['left_members_data_ver'];
                        $arr1=explode("~",$bin);
                        $countbin=count($arr1);
                        $counterl=0;
                        $pay1=0;
                        $left=0;
                        $rowleft=0;
                        for($i=0;$i<$countbin;$i++)
                        {
                            $left=mysqli_fetch_array(mysqli_query($DB_LINK1,"select * from salary where uid='".$arr1[$i]."' and level=6"));
                            if($left>0)
                                $rowleft=1;
                        }

                        $bin=$data_member['right_members_data_ver'];
                        $arr2=explode("~",$bin);
                        $countbin=count($arr2);
                        $counterl=0;
                        $pay1=0;
                        $rowright=0;
                        $right=0;
                        for($i=0;$i<$countbin;$i++)
                        {
                            $right=mysqli_fetch_array(mysqli_query($DB_LINK1,"select * from salary where uid='".$arr1[$i]."' and level=6"));
                            if($right>0)
                                $rowright=1;
                        }
                        echo  '<br/>Left For Level '.$curlev." count : ".$rowleft;
                        echo  '<br/>Right For Level '.$curlev." count : ".$rowright;

                        if($rowright>0 && $rowleft>0)
                        {
                            $counter_enter=mysqli_fetch_array(mysqli_query($DB_LINK1,"select * from salary where   uid='".$main."'  and level=7  "));
                            if($counter_enter<1)
                            {
                                mysqli_query($DB_LINK1,"insert into  salary set level=7, dt=now(), sal='N' , uid='".$main."' ");
                            }
                        }
                        break;

                    case 7:
                        $bin=$data_member['left_members_data_ver'];
                        $arr1=explode("~",$bin);
                        $countbin=count($arr1);
                        $counterl=0;
                        $pay1=0;
                        $left=0;
                        $rowleft=0;
                        for($i=0;$i<$countbin;$i++)
                        {
                            $left=mysqli_fetch_array(mysqli_query($DB_LINK1,"select * from salary where uid='".$arr1[$i]."' and level=7"));
                            if($left>0)
                                $rowleft=1;
                        }

                        $bin=$data_member['right_members_data_ver'];
                        $arr2=explode("~",$bin);
                        $countbin=count($arr2);
                        $counterl=0;
                        $pay1=0;
                        $rowright=0;
                        $right=0;
                        for($i=0;$i<$countbin;$i++)
                        {
                            $right=mysqli_fetch_array(mysqli_query($DB_LINK1,"select * from salary where uid='".$arr1[$i]."' and level=7"));
                            if($right>0)
                                $rowright=1;
                        }
                        echo  '<br/>Left For Level '.$curlev." count : ".$rowleft;
                        echo  '<br/>Right For Level '.$curlev." count : ".$rowright;

                        if($rowright>0 && $rowleft>0)
                        {
                            $counter_enter=mysqli_fetch_array(mysqli_query($DB_LINK1,"select * from salary where   uid='".$main."'  and level=8   "));
                            if($counter_enter<1)
                            {
                                mysqli_query($DB_LINK1,"insert into  salary set level=8, dt=now(), sal='N' , uid='".$main."' ");
                            }
                        }
                        break;

                    case 8:
                        $bin=$data_member['left_members_data_ver'];
                        $arr1=explode("~",$bin);
                        $countbin=count($arr1);
                        $counterl=0;
                        $pay1=0;
                        $left=0;
                        $rowleft=0;
                        for($i=0;$i<$countbin;$i++)
                        {
                            $left=mysqli_fetch_array(mysqli_query($DB_LINK1,"select * from salary where uid='".$arr1[$i]."' and level=8"));
                            if($left>0)
                                $rowleft=1;
                        }

                        $bin=$data_member['right_members_data_ver'];
                        $arr2=explode("~",$bin);
                        $countbin=count($arr2);
                        $counterl=0;
                        $pay1=0;
                        $rowright=0;
                        $right=0;
                        for($i=0;$i<$countbin;$i++)
                        {
                            $right=mysqli_fetch_array(mysqli_query($DB_LINK1,"select * from salary where uid='".$arr1[$i]."' and level=8"));
                            if($right>0)
                                $rowright=1;
                        }
                        echo  '<br/>Left For Level '.$curlev." count : ".$rowleft;
                        echo  '<br/>Right For Level '.$curlev." count : ".$rowright;

                        if($rowright>0 && $rowleft>0)
                        {
                            $counter_enter=mysqli_fetch_array(mysqli_query($DB_LINK1,"select * from salary where   uid='".$main."'  and level=9   "));
                            if($counter_enter<1)
                            {
                                mysqli_query($DB_LINK1,"insert into  salary set level=9, dt=now(), sal='N' , uid='".$main."' ");
                            }
                        }
                        break;

                    case 9:
                        $bin=$data_member['left_members_data_ver'];
                        $arr1=explode("~",$bin);
                        $countbin=count($arr1);
                        $counterl=0;
                        $pay1=0;
                        $left=0;
                        $rowleft=0;
                        for($i=0;$i<$countbin;$i++)
                        {
                            $left=mysqli_fetch_array(mysqli_query($DB_LINK1,"select * from salary where uid='".$arr1[$i]."' and level=9"));
                            if($left>0)
                                $rowleft=1;
                        }

                        $bin=$data_member['right_members_data_ver'];
                        $arr2=explode("~",$bin);
                        $countbin=count($arr2);
                        $counterl=0;
                        $pay1=0;
                        $rowright=0;
                        $right=0;
                        for($i=0;$i<$countbin;$i++)
                        {
                            $right=mysqli_fetch_array(mysqli_query($DB_LINK1,"select * from salary where uid='".$arr1[$i]."' and level=9"));
                            if($right>0)
                                $rowright=1;
                        }
                        echo  '<br/>Left For Level '.$curlev." count : ".$rowleft;
                        echo  '<br/>Right For Level '.$curlev." count : ".$rowright;

                        if($rowright>0 && $rowleft>0)
                        {
                            $counter_enter=mysqli_fetch_array(mysqli_query($DB_LINK1,"select * from salary where   uid='".$main."'  and level=10   "));
                            if($counter_enter<1)
                            {
                                mysqli_query($DB_LINK1,"insert into  salary set level=10, dt=now(), sal='N' , uid='".$main."' ");
                            }
                        }
                        break;
                }

            }
        }

    }
}

function getstatuscolor($status,$joindt)
{
	$now = time(); // or your date as well
	$your_date = strtotime($joindt);
	$datediff = $now - $your_date;
	$ddt=floor($datediff/(60*60*24));

	$color='';
	if($status==2) $color='greenm' ;
	if($status==0)
	{
		if( $ddt>30)
			$color = 'graym';
		else
			$color = 'redm';
	}
	if($status==3) $color= 'graym' ;
	return $color;
}

function getgenderimage($a_mid,$gen,$joindt,$status)
{
	global $DB_LINK1;
	global $genimg;
	if($status==2)
	{
		 $sql_member_fm = " select user_image from tbl_member_info where mem_id='".$a_mid."' and user_image!='' and user_image_flag=1 ";
		$qry_member_fm = mysqli_query( $DB_LINK1, $sql_member_fm );

		if(mysqli_num_rows($qry_member_fm)>0)
		{
			$data_member_fm = mysqli_fetch_array( $qry_member_fm );
			$genimg="../upload/user_image/".$data_member_fm['user_image'];
		}
		else {
			if ($gen == 'Male')
				$genimg = 'treeview/images/user_m.jpg';
			if ($gen == 'MALE')
				$genimg = 'treeview/images/user_m.jpg';
			if ($gen == 'Female')
				$genimg = 'treeview/images/user_f.jpg';
			if ($gen == 'FEMALE')
				$genimg = 'treeview/images/user_f.jpg';
			if ($gen == '')
				$genimg = 'treeview/images/user_m.jpg';
		}
	}
	if($status==3)
		$genimg = 'treeview/images/user_t.jpg';
	if($status==0)
	{
		$now = time(); // or your date as well
		$your_date = strtotime($joindt);
		$datediff = $now - $your_date;
		$ddt = floor($datediff / (60 * 60 * 24));
		if ($ddt > 30)	{
			$genimg = 'treeview/images/user_d.jpg';
		}	else {
			$sql_member_fm = " select user_image from tbl_member_info where mem_id='".$a_mid."' and user_image!='' and user_image_flag=1 ";
			$qry_member_fm = mysqli_query( $DB_LINK1, $sql_member_fm );
			if(mysqli_num_rows($qry_member_fm)>0)
			{
				$data_member_fm = mysqli_fetch_array( $qry_member_fm );
				$genimg="../upload/user_image/".$data_member_fm['user_image'];
			}
			else {
				if ($gen == 'Male')
					$genimg = 'treeview/images/user_m.jpg';
				if ($gen == 'MALE')
					$genimg = 'treeview/images/user_m.jpg';
				if ($gen == 'Female')
					$genimg = 'treeview/images/user_f.jpg';
				if ($gen == 'FEMALE')
					$genimg = 'treeview/images/user_f.jpg';
				if ($gen == '')
					$genimg = 'treeview/images/user_m.jpg';
			}
		}
	}
	return $genimg;
}

function kyc_approveby_data($kyc_by)
{
	global $DB_LINK1;
	if($kyc_by=='Admin')
		return $kyc_by;
	else
		{
			$data="SELECT * FROM `tbl_branch` where br_code='".$kyc_by."' ";
			$qry1=mysqli_query($DB_LINK1,$data);
			$rowget1=mysqli_fetch_array($qry1);
			return $rowget1['title'];
		}
}





?>