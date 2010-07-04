<?php

class Welcome extends Site_controller {
	private $views=array();
	
	function index()
	{
		$this->load_view('welcome_message',array("lang"=>$this->lang));
		$this->flush();
	}
	
	function abc(){
		$val=$_GET['param'];
		return array("aa"=>$val,"bb"=>200);
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */