<?php
define('FLICKR_CACHE_DIR',CACHE . 'flickr/');
App::import('Vendor', 'phpflickr');

class FlickrComponent extends Object
{
    var $_api_key='3fc06c8843c0162957e087988bdb400f';

    function startup(&$controller)
    {
         $controller->flickr =& new phpFlickr($this->_api_key);
         if (!is_dir(FLICKR_CACHE_DIR))
	        {
	            mkdir(FLICKR_CACHE_DIR,0777);
	        }   
			              
         $controller->flickr->enableCache('fs', FLICKR_CACHE_DIR);
         $controller->set('flickr',$controller->flickr);
    }
}
?>