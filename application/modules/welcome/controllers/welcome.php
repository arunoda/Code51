<?php

class Welcome extends Site_controller {
	private $views=array();
	
	function index()
	{
		$this->load_view('welcome_message',array("lang"=>$this->lang));
		$this->flush();
	}
	
	function abc(){
		$val=$this->input->get('param',true);
		$val2=$this->input->post('param',true);
		return array("aa"=>$val,"bb"=>$val2);
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */