<?php

class Admin extends Admin_controller {

	function index()
	{
		$this->load_view('welcome_admin');
		$this->flush();
	}
	
	
	function abc(){
		echo "Power House Boss";
		var_dump($_REQUEST);
	}
	
	function test($var_from=""){
		echo "Test Here $var_from";
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
