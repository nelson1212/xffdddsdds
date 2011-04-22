<?php
class NoticiasController extends AppController {

	var $name = 'Noticias';
	var $components =array("ImageUploadAndResize", 'Auth'=>array("redirect"=>false));
	var $helpers = array("Javascript");
	private $nombreFoto="";
	
	 function beforeFilter()
	{
		$this->Auth->autoRedirect=false;
		$rol=$this->Session->read("Auth.User.role_id");
		
		if($rol==2){
			$this->Auth->allow("index");	
		}else if ($rol==1) {
			$this->Auth->allow("*");
		}else {
			$this->Auth->allow("index","leerMas");
		}
	}
	
	function index() {
	   $this->layout="index";
		$this->Noticia->recursive = 1;
		$this->paginate=array('order' => array('Noticia.id' => 'desc'),"limit"=>4);
		$this->set('noticias', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid noticia', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Noticia->recursive=0;
		$this->set('noticia', $this->Noticia->read(null, $id));
	}

	function admin_add() {
		$userId=$this->Session->read("Auth.User.id");
		
		if (!empty($this->data)) {
			//debug($this->data);
			$foto=$this->data["Noticia"]["image"];
			if($foto["error"]==4){
				$this->data["Noticia"]["image"]="";
				unset($this->data["Noticia"]["image"]);
			}

			if ($foto["error"]==0 && $this->uploadPicture($foto)==true)
			{
				$directorio = WWW_ROOT."img/";
			    $directorio = str_replace("\\", "/", $directorio);
				$ruta=$directorio."noticias/"; 
				$imagen=$directorio."noticias/".$this->nombreFoto; 
				
				list($width, $height, $type, $attr) = getimagesize($imagen);
				
				/*echo "Imagen ".$imagen; 
				echo "<br>";
				echo "Ruta ".$ruta; 
				exit;
				 * */
				 
				$nombre="";
				if($height>$width) {
						$this->ImageUploadAndResize->resize_image($imagen, 120, 190, $scale = true, $relscale = false, $quality = 100);
						echo $nombre=$this->ImageUploadAndResize->make_thumb($imagen,$ruta,120, 190);
				}else {
						$this->ImageUploadAndResize->resize_image($imagen, 190, 120, $scale = true, $relscale = false, $quality = 100);
						echo $nombre=$this->ImageUploadAndResize->make_thumb($imagen,$ruta,120, 190);
				}
				$this->data["Noticia"]["image"]=$this->nombreFoto;
				$this->data["Noticia"]["thumb"]=$nombre;
				
				//debug($this->data);
				
			}else if($this->uploadPicture($foto)==false) 
			{
				$this->data["Noticia"]["image"]="";
				$this->Session->setFlash(__('Error al intentar copiar la imagen.', true));
			}
			
			
			if ($foto["error"]==4)
			{
				unset($this->data["Noticia"]["image"]);
				$this->data["Noticia"]["image"]="";
			}
			//exit;
			//debug($this->data);
			$this->Noticia->create();
			
			if ($this->Noticia->save($this->data)) {
			
				$this->Session->setFlash(__('La noticia fue guardada', true));
				//$this->Noticia->id=0;
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La noticia no pudo ser guardada, intenta de nuevo.', true));
				$this->set(compact("userId"));
			}
		}
		$categories = $this->Noticia->Category->find('list', array("fields"=>array("id", "description")));
		//$users = $this->Noticia->User->find('list');
		$this->set(compact('categories', 'users',"userId"));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Noticia no valida', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) 
		{
			//debug($this->data);
			$foto=$this->data["Noticia"]["image"];
			
			if($imagen["error"]==4)
			{
				unset($this->data["Noticia"]["image"]);
			}
			
			else if($imagen["error"]==0) 
			{
					if ($this->uploadPicture($foto)==true)
					{
						$directorio = WWW_ROOT."img/";
					    $directorio = str_replace("\\", "/", $directorio);
						$ruta="img/noticias/".$this->nombreFoto; 
						list($width, $height, $type, $attr) = getimagesize($ruta);
						if($height>$width) {
							$this->ImageUploadAndResize->resize_image($ruta, 120, 190, $scale = true, $relscale = false, $quality = 100);
						}else {
							$this->ImageUploadAndResize->resize_image($ruta, 190, 120, $scale = true, $relscale = false, $quality = 100);
						}
						$this->data["Noticia"]["image"]=$this->nombreFoto;
					}else {
						$this->Session->setFlash(__('La foto no pudo ser guardada', true));
					}
			}
			
			if ($this->Noticia->save($this->data)) {
				$this->Session->setFlash(__('La noticia fue guardada', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Noticia->recursive=-1;
				$this->data = $this->Noticia->read(null, $id);
				$this->Session->setFlash(__('La noticia no pudo ser guardada, intenta de nuevo', true));
			}
		}
		if (empty($this->data)) {
			$this->Noticia->recursive=-1;
			$this->data = $this->Noticia->read(null, $id);
		}
		$categories = $this->Noticia->Category->find('list', array("fields"=>array("id","description")));
		$this->set(compact('categories', 'users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for noticia', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Noticia->delete($id)) {
			$this->Session->setFlash(__('Noticia deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Noticia was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->Noticia->recursive = 0;
		$this->set('noticias', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid noticia', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('noticia', $this->Noticia->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Noticia->create();
			if ($this->Noticia->save($this->data)) {
				$this->Session->setFlash(__('The noticia has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The noticia could not be saved. Please, try again.', true));
			}
		}
		$categories = $this->Noticia->Category->find('list');
		$users = $this->Noticia->User->find('list');
		$this->set(compact('categories', 'users'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid noticia', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Noticia->save($this->data)) {
				$this->Session->setFlash(__('LA noticia fue guardada', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La noticia no pudo ser guardada. Intenta de nuevo.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Noticia->read(null, $id);
		}
		$categories = $this->Noticia->Category->find('list', array("fields"=>array("id", "description")));
		//$users = $this->Noticia->User->find('list');
		$this->set(compact('categories', 'users'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Noticia invalida', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Noticia->delete($id)) {
			$this->Session->setFlash(__('Noticia borrada', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('La noticia no fue borrada', true));
		$this->redirect(array('action' => 'index'));
	}
	
	//$foto array del archivo
    //nombre_foto es igual al username ya que sera unico
	function uploadPicture($foto)
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
		$directorio = WWW_ROOT."img\\noticias\\".$nombre_foto;
		
		
			//Copiamos la imagen al directorio, especificado
	   		if (copy($foto["tmp_name"], $directorio))
	   		{
	   			$this->nombreFoto=$nombre_foto;	
			    return true;  
	   		}
	   		else
	   		{ 
			   return false; 
	   		}	
	}


	function leerMas($id=null)
	{
		$this->layout="index";
		if (!$id) {
			$this->Session->setFlash(__('Invalid noticia', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Noticia->recursive=1;
		$this->set('noticia', $this->Noticia->read(null, $id));
	}
}
?>