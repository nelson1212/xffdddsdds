I have managed to make this script from http://www.bogdan-net.com/archives/24 to work with multiple file uploads javascript from http://the-stickman.com. I also made some modifications to the code (upload directory, changed code to delete the temp file and added original filename stripped of spaces to the final filename). I know there's a lot of improvement that this code could suffer but I thought I share this with you, it would save you a day of work. So here it goes:



		***Backup your working files first!!!***




I have kept the directory structure in the archive but just to be sure:

Place image.php into \yourcakeinstalldir\app\controllers\components\image.php
Place images_controller.php into \yourcakeinstalldir\app\controllers\images_controller.php
Place add.thtml into \yourcakeinstalldir\app\views\images\add.thtml
	*Note that I use add.thtml instead of upload.thtml. I'll call it *view from now on.

Place multifile.js \yourcakeinstalldir\app\webroot\js\multifile.js



Javascript
-------------------------------------------------------
Place script in \yourcakeinstalldir\app\webroot\js\multifile.js
-------------------------------------------------------
-------------------------------------------------------




View
-------------------------------------------------------
Place add.thtml into \yourcakeinstalldir\app\views\images\add.thtml (or rename it if necessary)


Into your *view file add the path to the javascript in the beggining. I did it like this, I don't know how to use helpers yet:

<script src="<?php echo $this->webroot;?>js/multifile.js"></script>
After the </form> tag add the following lines:

Files:
<!-- This is where the output will appear -->
<div id="files_list"></div>
<script>
	<!-- Create an instance of the multiSelector class, pass it the output target and the max number of files -->
	var multi_selector = new MultiSelector( document.getElementById( 'files_list' ), 10 ); //set nr. of maximum fields from here
	<!-- Pass in the file element -->
	multi_selector.addElement( document.getElementById( 'ImageName1' ) );
</script>
-------------------------------------------------------
-------------------------------------------------------




Into your image_controller.php change the code to this:
-------------------------------------------------------
Place images_controller.php into \yourcakeinstalldir\app\controllers\images_controller.php and image.php into \yourcakeinstalldir\app\controllers\components\image.php 


Code for images_controller.php:

<?php

class ImagesController extends AppController {
var $components = array("Image"); // here is the image component that we described above
var $uses = null;


function add(){
//*** comments with *** added by mishu (www.doingtheartwork.com), original script by  Bogdan Lungu, www.bogdan-net.com
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
			  }//*** end if (strlen($this->data['Image'][$key]['name'])>4)
			  
			  else{
					  // Image not uploaded
			  }
	 }//*** end foreach
  

  }//*** end isset($this->data)

 }//*** end add function
}//end class
?>
-------------------------------------------------------
-------------------------------------------------------

Access your multiple files upload form at http://yourhost/yourcakeinstalldir/images/add/


Make the necessary changes to the upload paths, file size,  image quality etc. My comments are preceded by //***. Don't forget to backup your working files first!

Hope this helps. If you make improvements to this code, let me know @ mishu@doingtheartwork.com. Thanks. And get some of my music from www.doingtheartwork.com. 