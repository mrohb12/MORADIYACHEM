<?php include('include/config.php');

	

	$action = (isset($_POST['action']) && $_POST['action']!='')?$_POST['action']:'';

	switch ($action) {

    case "delete":

        $table =  (isset($_POST['table']) && $_POST['table']!='')?$_POST['table']:'';

		$index = (isset($_POST['index']) && $_POST['index']!='')?$_POST['index']:'';

		$id =  (isset($_POST['id']) && $_POST['id']!='')?$_POST['id']:'';

		

		if( $table && $index && $id)

		{

			if($table=="subcategories")

			{

				$query = 'SELECT * FROM subcategories WHERE sub_id = '.$id;

				$result = mysqli_query($conn,$query);

				$upload_dir = 'uploads/subcategory/';

				if(mysqli_num_rows($result) > 0)

				{			

					$row = mysqli_fetch_array($result);

					$file_name = $upload_dir.$row['sub_image'];

					@unlink($file_name);

					

				}

			}

			
			

			if($table=="modual_master")

			{

				$query = 'SELECT * FROM modual_master WHERE id = '.$id;

				$result = mysqli_query($conn,$query);

				/*$upload_dir = 'uploads/photo_gallery/';

				if(mysql_num_rows($result) > 0)

				{			

					$row = mysql_fetch_array($result);

					$file_name = $upload_dir.$row['image'];

					@unlink($file_name);

					@unlink($upload_dir."thumb_".$row['image']);

					

				}*/

			}

			

			if($table=="gallery")

			{

				$query = 'SELECT * FROM gallery_images WHERE photo_album_id = '.$id;

				$result = mysqli_query($conn,$query);

				$upload_dir = 'uploads/photo_gallery/';

				if(mysqli_num_rows($result) > 0)

				{			

					while($row = mysqli_fetch_array($result))

					{

						$file_name = $upload_dir.$row['image'];

						@unlink($file_name);

						@unlink($upload_dir."thumb_".$row['image']);

					}	

					mysqli_query($conn,"delete FROM gallery_images WHERE photo_album_id = '".$id."'");

				}

			}

			

			$is_delete = mysqli_query($conn,"DELETE FROM ".$table." WHERE ".$index." = ".$id);



			if($is_delete)

			{

				echo json_encode(array('error'=>0,'message'=>'Record Deleted Successfully'));

				break;

			}

		}

		echo json_encode(array('error'=>1,'message'=>'Invalid Action'));

        break;

    case "status":

        

		$table	=	(isset($_POST['table']) && $_POST['table']!='')?$_POST['table']:'';

		$index	=	(isset($_POST['index']) && $_POST['index']!='')?$_POST['index']:'';

		$id		=  	(isset($_POST['id']) && $_POST['id']!='')?$_POST['id']:'';

		$value	=  	(isset($_POST['value']) && $_POST['value']!='')?$_POST['value']:'';

		

		$field = "status";

		

		if( $table && $index && $id)

		{

			$is_update = mysqli_query($conn,"UPDATE  ".$table." SET  ".$field." = ". $value ." WHERE  ".$index." = ".$id);

			if($is_update)

			{

				echo json_encode(array('error'=>0,'message'=>'Record Deleted Successfully'));

				break;

			}

			

		}

		echo json_encode(array('error'=>1,'message'=>'Invalid Action'));

        break;

	case "eventImageDelete":

		$upload_dir = 'image/event/';	

		$id =  (isset($_POST['id']) && $_POST['id']!='')?$_POST['id']:'';

		

		if($id!='')

		{

			$query = 'SELECT * FROM completed_event_images WHERE id = '.$id;

			$result = mysqli_query($conn,$query);

	

			if(mysqli_num_rows($result) > 0)

			{

				$row = mysqli_fetch_array($result);

				$file_name = $upload_dir.$row['image'];

				$is_delete = mysqli_query($conn,"DELETE FROM completed_event_images WHERE id = ".$id);

				if($is_delete)

				{

					//@unlink($file_name);

					@unlink($upload_dir.$row['image']);

					@unlink($upload_dir."thumb_".$row['image']);

					echo json_encode(array('error'=>0,'message'=>'Image Deleted Successfully'));

					break;

				}

			}

		}	

		echo json_encode(array('error'=>1,'message'=>'Invalid Action'));

		break;	

	case "dataImageDelete":

		$upload_dir = 'uploads/photo_gallery/';	

		$id =  (isset($_POST['id']) && $_POST['id']!='')?$_POST['id']:'';

		

		if($id!='')

		{

			$query = 'SELECT * FROM gallery_images WHERE id = '.$id;

			$result = mysqli_query($conn,$query);

	

			if(mysqli_num_rows($result) > 0)

			{

				$row = mysqli_fetch_array($result);

				$file_name = $upload_dir.$row['image'];

				$is_delete = mysqli_query($conn,"DELETE FROM gallery_images WHERE id = ".$id);

				if($is_delete)

				{

					//@unlink($file_name);

					@unlink($upload_dir.$row['image']);

					@unlink($upload_dir."thumb_".$row['image']);

					echo json_encode(array('error'=>0,'message'=>'Image Deleted Successfully'));

					break;

				}

			}

		}	

		echo json_encode(array('error'=>1,'message'=>'Invalid Action'));

		break;	

    default:

        echo json_encode(array('error'=>1,'message'=>'Invalid Action'));

}