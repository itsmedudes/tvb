<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	protected $url = array(
							'website_name' => WEBSITE_NAME, 
							'view_path' => 'admin/',
							'title' => 'Admin | Dashboard',
							'breadcrumb' => 'Dashboard',
							'title_url' => 'admin',
							'table_name' => 'admin',
							'session' => 'admin_id',
						);
	public function __construct(){
        parent::__construct();

        
    }	
	
	public function index()
	{
		is_admin_login();
		$data['title'] = $this->url['title'];
		$data['website_name'] = $this->url['website_name'];
		$data['title_url'] = $this->url['title_url'];
		$data['breadcrumb'] = $this->url['breadcrumb'];

		$data['total_students'] = $this->db->count_all_results('student');
		$data['total_courses'] = $this->db->count_all_results('course');
		
		$this->load->view($this->url['view_path'].'index',$data);

	}


	public function login(){

		if($this->session->has_userdata($this->url['session']))
		 redirect(base_url('admin'));

		$data['title'] ='Admin | Login';
		$data['website_name'] = $this->url['website_name'];

		$username = $this->input->post('username');
		$password = $this->input->post('password');
		if($this->authentication($username,$password))
			redirect(base_url('admin'));
		else $this->load->view($this->url['view_path'].'login',$data);
	}

	private function authentication($username='',$password=''){
		if(!empty($admin = $this->crud->get('admin',array('username'=>$username,'password'=> $password)))){
			$this->session->set_userdata(array('admin_username'=> $admin[0]->username,'admin_email'=>$admin[0]->email, 'admin_id'=>$admin[0]->id));
			return true;
		}else{
			return false;
		}
	}

	public function logout(){
		$this->session->unset_userdata(array('admin_username','admin_email', 'admin_id'));
		redirect(base_url('admin/login'));
	}

	
}
