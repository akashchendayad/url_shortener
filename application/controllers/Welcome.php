<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Welcome extends CI_Controller {

	function __construct()

	{
		parent::__construct();
			$this->load->model('Welcome_m');
		   
	}
	public function index()
	{
		$this->load->view('welcome_message');
	}


	public function generate_short_url()
	{
	
		$get_short_url=$this->Welcome_m->get_short_url();
		header('Content-Type: application/json');
		echo json_encode(array('response'=>$get_short_url)); 

	}
	public function get_sec_det()
    {
        $id=$this->input->post('id');
 
        if( $id==1)
        {
           $htmldata='
		    <div style="margin: 2rem;"> 
			</div>  


		   <div class="form-group">
		   <input type="url" id="url" name="url" class="form-control" placeholder="Please enter a long URL here" required>
		 </div>
		 
		 
		 <button type="submit" class="btn btn-default" style="width: 20rem;color: black;background: #41dd62bf;outline-style: none;" onclick="generate_short_url();">Generate Short Url</button>
		
		 
		 ';
         
        }
 
         header('Content-Type: application/json');
         echo json_encode(array('report'=>$htmldata)); 
    }
 
}
