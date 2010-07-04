<?php

class Ajax_controller extends Base_controller{
	
	public function __construct($context){
		parent::__construct($context);
		$this->load_ajax_head();
	}
	
	public function load_view($view_name, $params=array(), $placeHolder="module"){
		parent::load_view($view_name, $params, $placeHolder);
		$module=CI::$APP->router->fetch_module();
		//loads the js associated with the view
		$js_file=APPPATH.'modules/'.$module.'/views/'.$view_name.'.js';
		
		if(is_file(FCPATH.$js_file)){
			$html=$this->include_js($js_file);
			$this->add_to_view($html, "head");
		}
	}
	
	public function load_js_library($library){
		$html=$this->include_js(APPPATH.'libraries/js/'.$library.'.js');
		$this->add_to_view($html, "head");
	}
	
	public function load_inline_js($script){
		$html=$this->inline_js($script);
		$this->add_to_view($html, "head");
	}
	
	/**
	 	loads ajax support libraries
	*/
	private function load_ajax_head(){
		$this->load_js_library('jquery-1.4.2.min');
		$this->load_js_library('code51');	
		
		$install_dir=$this->config->config['install_dir'];
		$module=CI::$APP->router->fetch_module();
		$controller=strtolower(get_class($this));
		
		$ws_caller=$install_dir.$module.'/'.$controller.'/';
		$this->load_inline_js("code51.controller='$ws_caller';");
	}
	
	private function include_js($path){
		$html='<script type="text/javascript" src="'
			.$path.
			'"></script>';
		return $html;
	}
	
	private function inline_js($script){
		$html='<script type="text/javascript">'
			.$script.
			'</script>';
		return $html;
	}
	
	/**
	 *This is the main method in this ajax system
	 *which makes calls to the other functions
	 * @param unknown_type $method
	 */
	public function service($method){
		$response="";	
		try{
			$out=$this->$method();	
			$response=json_encode($out);
		}
		catch(Exception $ex){
			$response=json_encode(array(
				"error"=>array
					("code"=>$ex->getCode(),
					 "message"=>$ex->getMessage()
					)
			));
		}
		echo $response;
	}
}