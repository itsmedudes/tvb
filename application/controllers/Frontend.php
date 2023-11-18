<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Frontend extends CI_Controller{
	protected $url = array(
							'website_name' => WEBSITE_NAME,
							'title' => WEBSITE_NAME,
							'view_path' => 'frontend/',
							'breadcrumb' => 'Home',
							'slider_image_path' => 'assets/images/slider/',
							'image_path' => 'assets/images/',
							'form_submit' => 'frontend/appointment_booking',
						
						);

	public function __construct(){
        parent::__construct();

        
    }	
	
	public function index(){

		$data['title'] = $this->url['title'];
		$data['image_path'] = $this->url['image_path'];


		$this->load->view($this->url['view_path'].'index',$data);
	
	}



	public function all($page)
	{
		$data = array();		
		$data['title'] = ucfirst($page);
		$check_page = FCPATH.'application/views/'.$this->url['view_path'].$page.'.php';
		if(file_exists($check_page))
		{
			$this->load->view($this->url['view_path'].$page,$data);
		}
		else
		{
			$this->load->view($this->url['view_path'].'404');
		}
		
	}

}