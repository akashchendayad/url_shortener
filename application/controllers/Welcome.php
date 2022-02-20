<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Welcome extends CI_Controller
{

    function __construct()

    {
        parent::__construct();
        $this
            ->load
            ->model('Welcome_m');

    }
    public function index()
    {
        $params = $_SERVER['QUERY_STRING'];
        if ($params != '')
        {
            $get_redirect_url = $this
                ->Welcome_m
                ->get_redirect_url($params);
            if ($get_redirect_url != 0) redirect($get_redirect_url, 'refresh');
            else $this
                ->load
                ->view('not_found');
        }
        else $this
            ->load
            ->view('welcome_message');
    }

    public function generate_short_url()
    {

        $get_short_url = $this
            ->Welcome_m
            ->get_short_url();
        header('Content-Type: application/json');
        echo json_encode(array(
            'response' => $get_short_url
        ));

    }

    public function reterive_orginal_url()
    {
		$extract=explode("?",$this->input->post('short_url'));
		$short_url =$extract[1];
        $reterive_orginal_url = $this
            ->Welcome_m
            ->reterive_orginal_url($short_url);
        header('Content-Type: application/json');
        echo json_encode(array(
            'response' => $reterive_orginal_url
        ));

    }
    public function get_sec_det()
    {
        $id = $this
            ->input
            ->post('id');

        if ($id == 1)
        {
            $htmldata = '
		    <div style="margin: 2rem;"> 
			</div>  
		   <div class="form-group">
		   <input type="url" id="url" name="url" class="form-control" placeholder="Please enter a long URL here" required>
		 </div>
		 <button type="submit" class="btn btn-default" style="width: 20rem;color: black;background: #41dd62bf;outline-style: none;" onclick="generate_short_url();">Generate Short Url</button>
		 ';

        }
        if ($id == 2)
        {
            $htmldata = ' <div style="margin: 2rem;"> 
		   </div>  
		  <div class="form-group">
		  <input type="url" id="ShortUrl" name="ShortUrl" class="form-control" placeholder="You can enter the exact short URL generated by this system here" required>
		</div>
		<button type="submit" class="btn btn-default" style="width: 20rem;color: black;background: #41dd62bf;outline-style: none;" onclick="reterive_orginal_url();">Reterive Orginal Url</button>
	   
		';

        }

        if ($id == 3)
        {
            $htmldata = '<div class="container">
			   <div class="">
				 <h1>Report</h1>
				 <div class="">
				 <table id="tble_urldata" class="display" width="100%" style="color:black" cellspacing="0">
				 <thead>
					 <tr>
						 <th>ID</th>
						 <th>Url</th>
						 <th>Short Url</th>
						 <th>Hits</th>
						 <th>Created Date</th>
					 </tr>
				 </thead>
			 </table>
			 </div>
			   </div>
			 </div>';

        }

        header('Content-Type: application/json');
        echo json_encode(array(
            'report' => $htmldata
        ));
    }

    public function get_tbldata()
    {
        $draw = intval($this
            ->input
            ->get("draw"));
        $start = intval($this
            ->input
            ->get("start"));
        $length = intval($this
            ->input
            ->get("length"));

        $reterive_data = $this
            ->Welcome_m
            ->reterive_data();
        

        $data = [];

        foreach ($reterive_data->result() as $r)
        {
            $data[] = array(
                $r->id,
                $r->url,
                $r->short_code,
                $r->hits,
                $r->added_date
            );
        }

        $result = array(
            "draw" => $draw,
            "recordsTotal" => $reterive_data->num_rows() ,
            "recordsFiltered" => $reterive_data->num_rows() ,
            "data" => $data
        );

        echo json_encode($result);
        exit();
    }

}

