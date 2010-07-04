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
			$html=$this->js_include($js_file);
			$this->add_to_view($html, "head");
		}
	}
	
	public function load_js_library($library){
		$html=$this->js_include(APPPATH.'libraries/js/'.$library.'.js');
		$this->add_to_view($html, "head");
	}
	
	/**
	 	loads ajax support libraries
	*/
	private function load_ajax_head(){
		$this->load_js_library('jquery-1.4.2.min');
		$this->load_js_library('code51');		
	}
	
	private function js_include($path){
		$html='<script type="text/javascript" src="'
			.$path.
			'"></script>';
		return $html;
	}
	
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