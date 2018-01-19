<?php 
function visitor_country()
{
	$client  = @$_SERVER['HTTP_CLIENT_IP'];
	$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
	$remote  = $_SERVER['REMOTE_ADDR'];
	$result  = "Unknown";
	if(filter_var($client, FILTER_VALIDATE_IP))
	{
		$ip = $client;
	}
	elseif(filter_var($forward, FILTER_VALIDATE_IP))
	{
		$ip = $forward;
	}
	else
	{
		$ip = $remote;
	}
 
	$ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));
 
	if($ip_data && $ip_data->geoplugin_countryName != null)
	{
		$result = $ip_data->geoplugin_countryName;
	}
 
	return $result;
}



function convert_number_to_words($number) {
    
    $hyphen      = '-';
    $conjunction = ' and ';
    $separator   = ', ';
    $negative    = 'negative ';
    $decimal     = ' point ';
    $dictionary  = array(
        0                   => 'zero',
        1                   => 'one',
        2                   => 'two',
        3                   => 'three',
        4                   => 'four',
        5                   => 'five',
        6                   => 'six',
        7                   => 'seven',
        8                   => 'eight',
        9                   => 'nine',
        10                  => 'ten',
        11                  => 'eleven',
        12                  => 'twelve',
        13                  => 'thirteen',
        14                  => 'fourteen',
        15                  => 'fifteen',
        16                  => 'sixteen',
        17                  => 'seventeen',
        18                  => 'eighteen',
        19                  => 'nineteen',
        20                  => 'twenty',
        30                  => 'thirty',
        40                  => 'fourty',
        50                  => 'fifty',
        60                  => 'sixty',
        70                  => 'seventy',
        80                  => 'eighty',
        90                  => 'ninety',
        100                 => 'hundred',
        1000                => 'thousand',
        1000000             => 'million',
        1000000000          => 'billion',
        1000000000000       => 'trillion',
        1000000000000000    => 'quadrillion',
        1000000000000000000 => 'quintillion'
    );
    
    if (!is_numeric($number)) {
        return false;
    }
    
    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . convert_number_to_words(abs($number));
    }
    
    $string = $fraction = null;
    
    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }
    
    switch (true) {
		
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . convert_number_to_words($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= convert_number_to_words($remainder);
            }
            break;
    }
    
    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
	  //  $string .=  convert_number_to_words($fraction);
    }
    
    return ucwords($string);
}
function getTaxRate()
{
	$query = "SELECT  * FROM admin_settings WHERE name = 'tax'";
		
	$result = mysql_query($query);
	
	if(mysql_num_rows($result) > 0)
	{
		$row = mysql_fetch_array($result);
		
		return $row['value'];
	}
	return 0;
}
function encrypt_decrypt($action, $string) {
    $output = false;

    $encrypt_method = "AES-256-CBC";
    $secret_key = 'sanskartechnolab@secret_key';
    $secret_iv = 'sanskartechnolab@secret_iv';

    // hash
    $key = hash('sha256', $secret_key);
    
    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    if( $action == 'encrypt' ) {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    }
    else if( $action == 'decrypt' ){
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }

    return $output;
}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function isLogin()
{
	if(!isset($_SESSION['earth_india@AdminUserData']) || empty($_SESSION['earth_india@AdminUserData']) || $_SESSION['earth_india@AdminUserData']=="" )
	{
		header("Location:login.php");
	}
}
function getUser($id='')
{
	if($id=='')
	{
		$userdata = $_SESSION['earth_india@AdminUserData'];
		$id = $userdata['id'];
	}
	$query = " SELECT  * FROM users WHERE   id = ".$id;
	
	$result = mysql_query($query);
	
	if(mysql_num_rows($result) > 0)
	{
		$row = mysql_fetch_array($result);
		
		return $row;
	}
	return false;
}
function getProject($id='')
{
	if($id!='')
	{
	
		$query = " SELECT  * FROM product_category WHERE id = ".$id;
		
		$result = mysql_query($query);
		
		if(mysql_num_rows($result) > 0)
		{
			$row = mysql_fetch_array($result);
			
			return $row;
		}
	}
	return false;
}

function getSalesman($id='')
{
	if($id!='')
	{
	
		$query = " SELECT  * FROM salesman_master WHERE id = ".$id;
		
		$result = mysql_query($query);
		
		if(mysql_num_rows($result) > 0)
		{
			$row = mysql_fetch_array($result);
			
			return $row;
		}
	}
	return false;
}
function getClient($id='')
{
	if($id!='')
	{
	
		$query = " SELECT  * FROM client_master WHERE id = ".$id;
		
		$result = mysql_query($query);
		
		if(mysql_num_rows($result) > 0)
		{
			$row = mysql_fetch_array($result);
			
			return $row;
		}
	}
	return false;
}
function isAdmin($id='')
{
	if($id=='')
	{
		$userdata = $_SESSION['earth_india@AdminUserData'];
		$id = $userdata['id'];
	}
		$query = " SELECT  user_type FROM users WHERE   id = ".$id;
		
		$result = mysql_query($query);
		
		if(mysql_num_rows($result) > 0)
		{
			$row = mysql_fetch_array($result);
			
			if($row['user_type']==0)
			{
				return true;
			}else
			{
				return false;
			}
		}
		return false;
}
function get_format($df) {
 
    $str = '';
    $str .= ($df->invert == 1) ? ' - ' : '';
    if ($df->y > 0) {
        // years
        $str .= ($df->y > 1) ? $df->y . ' Years ' : $df->y . ' Year ';
    } if ($df->m > 0) {
        // month
        $str .= ($df->m > 1) ? $df->m . ' Months ' : $df->m . ' Month ';
    } if ($df->d > 0) {
        // days
        $str .= ($df->d > 1) ? $df->d . ' Days ' : $df->d . ' Day ';
    } if ($df->h > 0) {
        // hours
        $str .= ($df->h > 1) ? $df->h . ' Hours ' : $df->h . ' Hour ';
    } if ($df->i > 0) {
        // minutes
        $str .= ($df->i > 1) ? $df->i . ' Minutes ' : $df->i . ' Minute ';
    } if ($df->s > 0) {
        // seconds
        $str .= ($df->s > 1) ? $df->s . ' Seconds ' : $df->s . ' Second ';
    }
 
    return $str;
}


?>