<?php 

function getData($name='') {
	$data = (isset($_REQUEST[$name]) && $_REQUEST[$name]!="")?$_REQUEST[$name]:'';
   	$data = trim($data);
   	$data = stripslashes($data);
	//$data = htmlspecialchars($data);

	//$data = mysql_real_escape_string($data);   
   	return $data;
}

function checkEmail($email="")
{
	if (!filter_var($email, FILTER_VALIDATE_EMAIL))
	{
		return true;
	}
	return false;
}

function checkUsername($username="")
{
	if (!ctype_alnum($username)) 
	{
		return true;
	}
	return false;

}


function checkMoNo($phone='')
{
	if (!ctype_digit($phone) OR strlen($phone) != 10)
	{
		return true;
	}
	return false;
}

function checkLen($data='')
{
	if (strlen($data) < 3 OR strlen($data) > 20)
	{
		return true;

	}
	return false;
}

function isLogin()
{
	if(!isset($_SESSION['AdminLoginUserData']) || empty($_SESSION['AdminLoginUserData']) || $_SESSION['AdminLoginUserData']=="" )
	{
		header("Location:login.php");
	}
}

function getUser($id='')
{

	if($id=='')
	{
		$userdata = $_SESSION['AdminLoginUserData'];
		$id = $userdata['id'];
	}
	$query = " SELECT  * FROM users WHERE   id = ".$id;
	$result = mysqli_query($conn,$query);

	if(mysqli_num_rows($result) > 0)
	{
		$row = mysqli_fetch_array($result);
		return $row;
	}
	return false;

}

function isAdmin($id='')
{
	if($id=='')
	{
		$userdata = $_SESSION['AdminLoginUserData'];
		$id = $userdata['id'];
	}

	$query = " SELECT  user_type FROM users WHERE   id = ".$id;

	$result = mysqli_query($conn,$query);
	if(mysqli_num_rows($result) > 0)
	{
		$row = mysqli_fetch_array($result);
		if($row['user_type']==0)
		{
			return true;
		}
		else{
			return false;
		}
	}
	return false;
}

function isEmailExist($email='',$id='')
{
		$query = " SELECT  id FROM users WHERE   email = '".$email."'";

		if($id!="")
		{
			$query .= " AND id != ".$id;
		}
		$result = mysqli_query($conn,$query);

		if(mysqli_num_rows($result) > 0)
		{
			return true;
		}
		return false;
}



function isUsernameExist($username='',$id='')
{

		$query = " SELECT  id FROM users WHERE   username = '".$username."'";
		if($id!="")
		{
			$query .= " AND id != ".$id;
		}

		$result = mysqli_query($conn,$query);
		if(mysqli_num_rows($result) > 0)
		{
			return true;
		}
		return false;

}

function create_thumbnail($image_path, $thumb_width, $thumb_height, $prefix) 
{
    if (!(is_integer($thumb_width) && $thumb_width > 0) && !($thumb_width === "*")) {
        echo "The width is invalid";
        exit(1);
    }

    if (!(is_integer($thumb_height) && $thumb_height > 0) && !($thumb_height === "*")) {
        echo "The height is invalid";
        exit(1);
    }

    $extension = pathinfo($image_path, PATHINFO_EXTENSION);
	$extension = strtolower($extension);
    switch ($extension) {

        case "jpg":
        case "jpeg":
            $source_image = imagecreatefromjpeg($image_path);
            break;
        case "gif":
            $source_image = imagecreatefromgif($image_path);
            break;
        case "png":
            $source_image = imagecreatefrompng($image_path);
            break;

        default:
            exit(1);
            break;

    }

    $source_width = imageSX($source_image);
    $source_height = imageSY($source_image);

    if (($source_width / $source_height) == ($thumb_width / $thumb_height)) {
        $source_x = 0;
        $source_y = 0;
    }

    if (($source_width / $source_height) > ($thumb_width / $thumb_height)) {

        $source_y = 0;
        $temp_width = $source_height * $thumb_width / $thumb_height;
        $source_x = ($source_width - $temp_width) / 2;
        $source_width = $temp_width;
    }

    if (($source_width / $source_height) < ($thumb_width / $thumb_height)) {
        $source_x = 0;
        $temp_height = $source_width * $thumb_height / $thumb_width;
        $source_y = ($source_height - $temp_height) / 2;
        $source_height = $temp_height;
    }

    $target_image = ImageCreateTrueColor($thumb_width, $thumb_height);

    imagecopyresampled($target_image, $source_image, 0, 0, $source_x, $source_y, $thumb_width, $thumb_height, $source_width, $source_height);

    switch ($extension) {
        case "jpg":
        case "jpeg":
            imagejpeg($target_image,$prefix);
            break;
        case "gif":
            imagegif($target_image, $prefix);//$prefix . "_" . 
            break;
        case "png":
            imagepng($target_image,  $prefix);
            break;
        default:
            exit(1);
            break;
    }
    imagedestroy($target_image);
    imagedestroy($source_image);
}



function slugify($text)
{

  // replace non letter or digits by -
  $text = preg_replace('~[^\pL\d]+~u', '-', $text);

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);


  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  // trim
  $text = trim($text, '-');

  // remove duplicate -
  $text = preg_replace('~-+~', '-', $text);

  // lowercase
  $text = strtolower($text);

  if (empty($text))
  {
    return 'n-a';
  }
  return $text;

}

/*

 This function is return the array of Gender Values

*/

function arrGender(){

	return array('M'=>'Male',
				'F'=>'Female');

}


/*

 This function is return the array of for Module values

*/

function arrForModule(){
	return array('0'=>'Administrator',
				'1'=>'System');

}


/*

 This function is return the array of Package Validty

*/

function arrValidty(){

	return array('1M'=>'1 Month',
				'2M'=>'2 Month',
				'3M'=>'3 Month',
				'4M'=>'4 Month',
				'5M'=>'5 Month',
				'6M'=>'6 Month',
				'7M'=>'7 Month',
				'8M'=>'8 Month',
				'9M'=>'9 Month',
				'10M'=>'10 Month',
				'11M'=>'11 Month',
				'12M'=>'12 Month',
				'13M'=>'13 Month',
				'14M'=>'14 Month',
				'15M'=>'15 Month',
				'16M'=>'16 Month',
				'17M'=>'17 Month',
				'18M'=>'18 Month',
				'19M'=>'19 Month',
				'20M'=>'20 Month',
				'21M'=>'21 Month',
				'22M'=>'22 Month',
				'23M'=>'23 Month',
				'24M'=>'24 Month');

}
/*

 This function is return the array of arrUserRights 

*/

function arrUserRights(){

	return array('F'=>'Full rights users',
				'V'=>'View only user');

}
function arrComissions(){

	return array('10'=>'10%',
				'15'=>'15%',
				'18'=>'18%',
				'20'=>'20%',
				'25'=>'25%');

}


?>



