<?php
class PhotosController extends AppController {
	
	var $name = 'Photos';
	var $helpers=array('Javascript');
	var $photoName="";
    var $components =array("ImageUploadAndResize",'Auth'=>array("redirect"=>false));
    //var $uses = array('Photo','Album');
	//var $components =array('Auth'=>array("redirect"=>false));
	
	function beforeFilter(){
		$this->Auth->autoRedirect=false;
		$rol=$this->Session->read("Auth.User.role_id");
		
		if($rol==2){
			$this->Auth->allow("index");	
		}else if ($rol==1) {
			$this->Auth->allow("*");
		}else {
			$this->Auth->allow("index");
		}	
	}
	
	function index() 
	{
		//debug($this->params); exit;
		$this->layout="index";
		$this->Photo->recursive = 1;
		$albumId=$this->params['pass'][0];
		$photos=$this->Photo->find("all", array('conditions'=>array('Photo.album_id'=>$albumId), 
									"fields"=>array('id','name','album_id',"thumb")));
		
		$this->paginate=array('order' => array('Photo.created' => 'desc'),"limit"=>15);
		$this->set('photos', $this->paginate());
		$directorio = $albumId;
		$album= $this->Photo->Album->query("SELECT title FROM albums where id='$albumId'");
		$titulo = $album[0]['albums']['title'];
		$this->set(compact('directorio', 'titulo', "albumId"));
	}
	
	function admin_index($albumId=null) 
	{
		//debug($this->params); exit;
		$this->Photo->recursive = -1;
		$albumId=$this->params['pass'][0];
		$photos=$this->Photo->find("all", array('conditions'=>array('Photo.album_id'=>$albumId), 
									"fields"=>array('id','name','album_id',"thumb")));
	
		$this->set(compact('photos', $this->paginate()));
		$directorio = $albumId;
		$album= $this->Photo->Album->query("SELECT title FROM albums where id='$albumId'");
		$titulo = $album[0]['albums']['title'];
		$this->set(compact('directorio', 'titulo', "albumId"));
	}
	

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid photo', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('photo', $this->Photo->read(null, $id));
	}

	function admin_add() 
	{
		
		if(empty($this->data)){
			$albumID = $this->params["pass"][0];
		} else if(!empty($this->data)){
			$albumID = $this->data['Album']["album_id"];
		} 
			
		//debug($this->data); 
		
		if (!empty($this->data)) 
		{
			//debug($this->data); exit;
			//$albumID = $this->params["pass"][0];
			
			$album=$this->data['Album']["album_id"];
			$photo=array();
		    $photo['Photo']["album_id"]=$this->data['Album']["album_id"];
			
			foreach($this->data['Photo'] as $indice => $valor)
			{
				if($valor['error']==0)
				{
					//print_r($valor); exit;
					if($this->uploadPicture($valor, $album)==true) {
						$photo['Photo']["name"]=$this->photoName;
				
						$directorio = WWW_ROOT."img".DS."fotos".DS;
						//$directorio = str_replace("\\", "/", $directorio);
						
						$ruta=$directorio.$album.DS; 
						$imagen=$directorio.$album.DS.$this->photoName; 
						//echo "Aqui: ".$this->photoName; exit;
						
						
						list($width, $height, $type, $attr) = getimagesize($imagen);
						
						if($height>$width) {
							$this->ImageUploadAndResize->resize_image($imagen, 480, 640, $scale = null, $relscale = false, $quality = 60);
							$photo['Photo']["thumb"]=$this->ImageUploadAndResize->make_thumb($imagen,$ruta,120, 190);
						}else {
							$this->ImageUploadAndResize->resize_image($imagen, 640, 480, $scale = null, $relscale = false, $quality = 100);
							$photo['Photo']["thumb"]=$this->ImageUploadAndResize->make_thumb($imagen,$ruta,190, 120);
						}
					}else {
						//$albumID = $this->data['Album']["album_id"];
						$this->set(compact("albumID"));
						$this->Session->setFlash(__('No se pueden guardar las fotos, recuerda que los formatos permitidos son: .jpg, .png y .gif', true));
						return;
					}
				
					$this->Photo->save($photo['Photo']);
					$this->Photo->id=0;
				}
				//echo "<br>";
			}
				
			$this->Session->setFlash(__('Las fotos fueron guardadas', true));
			//$albumID = $this->data['Album']["album_id"];
			$this->redirect(array('controller'=>'Albums', 'action' => 'index', $albumID));
			
		}else {
		 	 
			// $albumID = $this->params["pass"];
			 //debug($this->params);
		     $this->set(compact("albumID"));
			 //$this->Session->setFlash(__('The photo could not be saved. Please, try again.', true));
		}
		 
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid photo', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Photo->save($this->data)) {
				$this->Session->setFlash(__('The photo has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The photo could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Photo->read(null, $id);
		}
		$albums = $this->Photo->Album->find('list');
		$this->set(compact('albums'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for photo', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Photo->delete($id)) {
			$this->Session->setFlash(__('Photo deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Photo was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	
	
	//$foto array del archivo
    //nombre_foto es igual al username ya que sera unico
	function uploadPicture($foto, $album)
	{		
		//Caracteristicas de la imagen
		$nombre = $foto['name'];
		$tipo = $foto['type'];
		$tamano = $foto['size'];
		$hoy = getdate();
		$nombre_foto=md5(sha1($hoy["seconds"].rand(1,100000)));		
		
		//Comprobamos la extensión de la  imagen
		if(strpos($tipo, "gif")) {
			
				$nombre_foto=$nombre_foto.".gif";
			
		} else if(strpos($tipo, "jpeg")) {
		   
				$nombre_foto=$nombre_foto.".jpg";
			
		}else if(strpos($tipo, "png")) {
		
				$nombre_foto=$nombre_foto.".png";
		}else {
			return false;
		}
		
		//Directorio donde sera guardada la imagen
		$directorio = WWW_ROOT."img".DS."fotos".DS.$album.DS.$nombre_foto;
		
			//Copiamos la imagen al directorio, especificado
	   		if (copy($foto["tmp_name"], $directorio)) {
	   			$this->photoName=$nombre_foto;
			    return true;  
	   		} else { 
			   return false; 
	   		}
	}

}
?>