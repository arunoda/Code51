<?php

class Power extends Site_controller{
	function index(){
		$this->load_view('power');
		$this->flush();
	}
}