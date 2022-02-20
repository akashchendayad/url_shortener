<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Short extends CI_Controller {

	function __construct()

	{
		parent::__construct();
			$this->load->model('Welcome_m');
		   
	}
	public function index()
	{
	echo 	$in = $this->uri->segment(3);
	}


	
 
}
