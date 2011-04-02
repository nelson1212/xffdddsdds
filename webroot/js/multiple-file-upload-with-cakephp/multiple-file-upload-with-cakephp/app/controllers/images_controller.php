<?php

class ImagesController extends AppController {
var $components = array("Image"); // here is the image component that we described above
var $uses = null;


function add(){
//*** comments with *** added by mishu, original script by  Bogdan Lungu, www.bogdan-net.com
if (isset($this->data['Image']['name0']['name'])) //*** verify if submit button was pressed
{
foreach($this->data['Image'] as $key => $value)
  {
  //echo $this->data['Image'][$key]['name'];
	if (strlen($this->data['Image'][$key]['name'])>4){
			$error = 0;
			$uploaddir1 = "upload/big"; // the /big/ directory /*** changed uploads directories
			$uploaddir2 = "upload/small"; // the /small/ directory with resized images /*** changed uploads directories
			$filetype = $this->Image->getFileExtension($this->data['Image'][''.$key.'']['name']);
			$filetype = strtolower($filetype);
			if (($filetype != "jpeg")  && ($filetype != "jpg"))
				   {
					// verify the extension
					$error=1;
				   }
			else
				   {
					$imgsize = GetImageSize($this->data['Image'][$key]['tmp_name']); // image size
				   }
			if (($imgsize[0]> 1600) || ($imgsize[1]> 1200)){
					 // verify to see if the image exceds 800 x 600 px
					 unlink($this->data['Image'][''.$key.'']['tmp_name']); // delete the image in case is to big //*** changed name to tmp_name to actually remove the temp image
					 print ($this->data['Image'][''.$key.'']['name'].' -> File too big, not uploaded.<br>'); //*** added warning of file too big
					 $error=1;
					}
			if ($error==0){
			 // here is generated an unic id for the image name
			 $stamp = strtotime ("now");
			 $orderid = $stamp;
			 $originalname=substr($this->data['Image'][$key]['name'], 0, -4); //*** strip extension from original filename
			 $replacespaces=str_replace (" ", "-", $originalname); //*** strip spaces from original filename
			 $orderid = str_replace(".", "", $orderid);
			 $id_unic = $replacespaces.'--'.$orderid; //*** added original filename to the file
			 $temp = $id_unic;
			 settype($temp,"string");
			 $temp.= ".";
			 $temp.=$filetype;
			 $newfile = $uploaddir1 . "/$temp";
				if (is_uploaded_file($this->data['Image'][$key]['tmp_name']))
				{
					if (!copy($this->data['Image'][$key]['tmp_name'],"$newfile"))
					{
					print "Error Uploading File1.";
					exit();
					}
				}
			  $newfile2 = $uploaddir2 . "/$temp";
			  $picture_location=$newfile;
			  $size=100; // the size for the resized image
			  $img_des= $this->Image->resize_img($picture_location, $size); //here resizing
			  imagejpeg($img_des,$newfile2,90);//*** 0-100 for image quality
			  // here you can have some code for example to insert in the database
			  // Image uploaded
			  }
			  }else{
					  // Image not uploaded
			  }
	 }//*** end if (strlen($this->data['Image'][$key]['name'])>4)
  

  }//*** end foreach

 }//*** end isset($this->data)
}//*** end add function
?>