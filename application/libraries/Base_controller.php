<?php

class Base_controller extends Controller{
	private $views=array();
	private $context;
	
	//fetch from the DB
	
	private $template='default';
	
	public function __construct($context='site'){

		$this->context=$context;
		parent::Controller();
		include_once APPPATH."config/template.php";
		if(isset($template) && isset($template['default'])){
			$this->template=$template['default'];
		}
		
		//this will be used in  the template
		$install_dir=$this->config->config['install_dir'];
		define('TEMPLATE_PATH',$install_dir.APPPATH."templates/{$this->template}/");
	}
	
	/**
	 load views to the controller to be displayed!
	 * @param $view_name name of the view to be loaded
	 * @param $params data to the view
	 * @param $placeHolder where this is gonna showed in the page
	 */
	public function load_view($view_name,$params=array(),$placeHolder="module"){
		$view=$this->load->view($view_name,$params,true);
		$this->add_to_view($view, $placeHolder);
	}
	
	public function add_to_view($html,$placeHolder){
		if(!isset($this->views[$placeHolder])){
			$this->views[$placeHolder]="";
		}
		$current=$this->views[$placeHolder];
		$this->views[$placeHolder]=$current  . $html;
	}
	
	public function flush(){
		ob_start();
		
		include APPPATH."templates/{$this->template}/"."{$this->context}.php";
		$template=ob_get_contents();
		ob_end_clean();
		
		foreach ($this->views as $placeHolder => $html) {
			$template=str_replace("<code51:$placeHolder/>",$html,$template);	
		}
		
		echo $template;
	}
}