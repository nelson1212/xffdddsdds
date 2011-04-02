<?php
/*
 *
 *				FAIL
 *
 *		File And Image upLoader
 *
 *	CREDITS
 *---------------------------------------
 *
 *	By:
 *		Daniel Cousineau
 *		dcousineau@gmail.com
 *		http://www.terminalfuture.com/
 *
 *
 *	ABOUT
 *---------------------------------------
 *
 *	FAIL is a PHP 4.0+ class designed to facilitate
 *	the uploading of images, namely file type restrictions
 *	and resizing of the images (to keep our funny
 *	13 year old populations from uploading 1600x1600
 *	goatse bitmaps).
 *
 *
 *	USAGE:
 *---------------------------------------
 *
 *	Place in your PHP script targeted by the method property of
 *	your form tag:
 *
 *	$myfile = new UploadedImage;
 *	$myfile->file = $_FILES['inputtagname'];
 *
 *	if( !$myfile->upload_file() ) {  //If there is some sort of error:
 *		echo $myfile->ErrorMsg;
 *	} else
 *		echo $myfile->final;
 *
 *	
 *	$myfile->final: is the location (relative to the location of this script) and
 *					name of the uploaded image
 *
 *
 *	Other editable properties include:
 *
 *	$myfile->file		(arr)	$_FILES[]
 *	$myfile->maxsize	(int)	maximum filesize in bytes
 *	$myfile->uploaddir	(str)	directory to upload to
 *	$myfile->newfile	(str)	new file name (WITHOUT EXTENSION)
 *	$myfile->maxwidth	(int)	specify the maximum width, pair with...
 *	$myfile->maxheight	(int)	maximum height
 *	$myfile->scale		(dbl)	% to scale the image, overrides maxwidth and maxheight
 *	$myfile->relscale	(bool)	FALSE: width = maxwidth, height = maxheight
 *	$myfile->allowtypes	(arr)	array of allowed file mime types
 *	$myfile->deniedtypes(arr)	array of denied file mime types
 *  $myfile->jpegquality(int)	jpeg file quality (if file is a jpeg)
 *
 *
 *	PROVISIONS
 *---------------------------------------
 *
 *	If you use this class, leave this comment in the class itself.
 *	If any changes are made, please send the edited class file
 *	and comment on your changes to me (I'll probably implement
 *	your changes).
 *
 *	This class is released under the LGPL (http://www.gnu.org/licenses/lgpl.html).
 *	By using this class, I agree to all the provisions set forth
 *	by the GPL.
 *
 *
 *			THANKS AND ENJOY!
 *
 */

class UploadedImage{
	
	var $maxsize = 1048576; //deftaults to 1mb in bytes
	var $uploaddir = "/"; //current folder of the script
	var $file = array(); //prepare for $_FILES[]
	var $newfile;
	var $defecto="modulos/defecto.jpg";
	var $maxwidth;
	var $maxheight;
	var $allowtypes = array("image/jpg","image/jpeg","image/gif","image/png","image/pjpeg"); //normal websafe images
	var $deniedtypes = array("image/bmp"); //Explicity Deny
	var $relscale = false;
	var $scale = null;
	var $ErrorMsg;
	var $final;
	var $jpegquality = 100;
	
	function upload_file(){
		
		if ( !isset( $this->file ) || is_null( $this->file['tmp_name'] ) || $this->file['name'] == '' ){ //Check File //Chequea sl archivo
		
		//$this->file['name']=$defecto;// = "Archivo no fue subido"; 
			$this->ErrorMsg = "Archivo no fue subido"; 
			return (false);
			
		}
		
		if( $this->file['size'] > $this->maxsize ){ //Check Size
		
			$this->ErrorMsg = "El Archivo Excede el Tamaño permitido de $this->maxsize bytes";
			return (false);
			
		}
		
		if ((   count($this->allowtypes) > 0 && !in_array( $this->file['type'], $this->allowtypes )) 
		   ||(	count($this->deniedtypes) > 0 && in_array( $this->file['type'], $this->deniedtypes ))){ //Check Type //Chequea el tipo de archivo
		   
			$this->ErrorMsg = "Tipo de Archivo '.".file_extension($this->file['name'])." -- {$this->file['type']}' No Permitido."; 
			return (false);
			
		}
			
		if( !$this->newfile ) $this->newfile = substr( basename($this->file['name']) , 0 , strrpos($this->file['name'], '.') ); //No new name specified, default to old name
		
		$uploaddirtemp = upload_dir($this->uploaddir); //Create Upload Dir
		
		move_uploaded_file( $this->file['tmp_name'] , $uploaddirtemp.$this->newfile.".".file_extension( $this->file['name'] ) ); //Move Uploaded File
		
		if($maxwidth == "" && $maxheight = ""){ //No need to resize the image, user did not specify to reszie
		
			$this->final = ".".$this->uploaddir.$this->newfile.".".file_extension( $this->file['name'] );
			return (true);
			
		}
		
		//User is going to resize the image
		resize_image( ".".$this->uploaddir.$this->newfile.".".file_extension( $this->file['name'] ), $this->maxwidth, $this->maxheight, $this->scale, $this->relscale, $this->jpegquality );
				
		$this->final = ".".$this->uploaddir.$this->newfile.".".file_extension( $this->file['name'] );
		
		return (true); //Hooray!
	}

}//end class

//--BEGIN UTILITY FUNCTIONS--------------------------------------------------------------------------------------

	function upload_dir($destination){
		$dir = $_SERVER['PHP_SELF'];
		
		for($i=0;$i<strlen($dir);$i++){
			if(substr($dir,$i,1)=="/") $slashpos=$i;
		}
		
		$dir = substr($dir,0,$slashpos);
		$dir = $_SERVER['DOCUMENT_ROOT'].$dir.$destination;
		
		return($dir);
	}

	function file_extension($filename){
	
		$extension = substr( $filename, ( strrpos($filename, '.') + 1 ) ) ;
		$extension = strtolower( $extension ) ;
		
		return $extension;
	}
	
	function resize_image($image_name, $max_width = null, $max_height = null, $scale = null, $relscale = false, $quality = 100){
		
		$img = null;
		$ext = file_extension($image_name);

		if ($ext == 'jpg' || $ext == 'jpeg') {
		
		    $img = @imagecreatefromjpeg($image_name);
		    
		} else if ($ext == 'png') {
		
		    $img = @imagecreatefrompng($image_name);
		    
		} else if ($ext == 'gif') {
		
		    $img = @imagecreatefromgif($image_name);
		    
		}
		
		// If an image was successfully loaded, test the image for size
		if ($img) {

		    // Get image size and scale ratio
		    list($oldwidth, $oldheight) = getimagesize($image_name);
			
			if( $relscale == true && ( $max_width || $max_height ) ){ //Supply bounds, scale w/o loss to ratio
			
				if ($oldheight > $oldwidth || !$max_width) 
				{ 
					$sizefactor = (double) ($max_height / $oldheight);
					$width = (int) ($oldwidth * $sizefactor);
					$height = (int) ($oldheight * $sizefactor);
				} 
				else if($oldheight < $oldwidth || !$max_height)
				{
				
					$sizefactor = (double) ($max_width / $oldwidth) ;
					$width = (int) ($oldwidth * $sizefactor);
					$height = (int) ($oldheight * $sizefactor);
					
				}else{ //if the image has a ratio of 1, aka Height and Width ==, just do a generic resize
				
					$width = $max_width;
					$height = $max_height;
					
				}
			
			}else if (  $max_width && $max_height && $relscale == false ) //Max Width And Height are new dimensions
			{   
				
				$width = $max_width;
				$height = $max_height;
				
			}else if( $scale && !$max_width || !$max_height ){ //Scale Provided And No Max Width/Height
				
				$width = (int) ($oldwidth * ( $scale / 100 ));
				$height = (int) ($oldheight * ( $scale / 100 ));
				
			}else{
				return false; //No Dimensions Specified BUT if this function were to be accidentally called...
			}
			
			$tmp_img = imagecreatetruecolor($width, $height);
			
		    // Copy and resize old image into new image
			imagecopyresampled($tmp_img, $img, 0, 0, 0, 0, $width, $height, $oldwidth, $oldheight);
		        
			imagedestroy($img);
			$img = $tmp_img;
		    
			if ($ext == 'png') {
			
			    imagepng($img,$image_name);
			    
			} else if ($ext == 'gif') {
			
			    imagegif($img,$image_name);
			    
			}else{
			
			    imagejpeg($img,$image_name,$quality);
			    
			}     
			
			
		}//end if($img)
		
	}//end function resize_image()
?>