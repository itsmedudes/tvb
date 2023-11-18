<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends CI_Controller {

	protected $url = array(
							'website_name' => WEBSITE_NAME, 
							'view_path' => 'admin/course/',
							'title' => 'Admin | course-Table',
							'breadcrumb' => 'course',
							'title_url' => 'admin/course',
							'add' => 'admin/course/add',
							'back' => 'admin/course',
							'form_submit' => 'admin/course/update',
							'error' => 'admin/404',
							'table_name' => 'course',
							'edit' => 'admin/course/edit',
							'delete' => 'admin/course/delete',
							'image_path' => 'assets/images/course',
							'status_change'=>'admin/course/status-change',
							
						);

	public function __construct(){
        parent::__construct();

        is_admin_login();
        
    }	
	
	public function index()
	{
		
		$data['title'] = $this->url['title'];
		$data['website_name'] = $this->url['website_name'];
		$data['breadcrumb'] = $this->url['breadcrumb'];
		$data['title_url'] = $this->url['title_url'];
		$data['add_url'] = $this->url['add'];
		$data['edit_url'] = $this->url['edit'];
		$data['delete_url'] = $this->url['delete'];
		$data['status_change'] = $this->url['status_change'];

		$data['row'] =  $this->crud->get_all($this->url['table_name']);
		
		$this->load->view($this->url['view_path'].'index',$data);

	}

	public function add(){
		$data['title'] = $this->url['title'];
		$data['website_name'] = $this->url['website_name'];
		$data['breadcrumb'] = 'Add '.$this->url['breadcrumb'];
		$data['title_url'] = $this->url['title_url'];
		$data['back_url'] = $this->url['back'];
		$data['form_submit'] = $this->url['form_submit'];
		$data['image_path'] = $this->url['image_path'];
		
		
		
		$this->load->view($this->url['view_path'].'form',$data);
	}

	public function edit($id=''){
		$data['title'] = $this->url['title'];
		$data['website_name'] = $this->url['website_name'];
		$data['title_url'] = $this->url['title_url'];
		$data['back_url'] = $this->url['back'];
		$data['form_submit'] = $this->url['form_submit'].'/'.$id;
		$data['breadcrumb'] = 'Edit '.$this->url['breadcrumb'];
		

		$row = $this->crud->get($this->url['table_name'],array('id'=>$id));
		
		
		if(!empty($row)){
			$data['row'] = $row;
			$this->load->view($this->url['view_path'].'form', $data);
		}else{
			$this->load->view($this->url['error'],$data);

		}

	}

	public function update($id=''){
		$result = array();

		$name = $this->input->post('name');
		
		$form_data = array(
			'name'=>$name,
			'is_active'=>1,
			'created_at' => date('Y-m-d H:i:s'),
			'description'=> $this->input->post('description'),
		);
		

		


		
	
		if(empty($id)){

			if(!empty($this->db->get_where($this->url['table_name'],array('name'=>$name,'id'=>$id))->result())){
					$result['message'] =  'This Name Course is Already Add';
					$result['status'] =  '400';
					$result['action'] = 'add';  
					echo json_encode($result);
					die;
			}
			if($this->db->insert($this->url['table_name'],$form_data)){
		

				$result['message'] =  'Add Successfully';
				$result['status'] =  '200';
				$result['action'] = 'add';
			}else{
				$result['message'] = "Add not successfully";
	            $result['status']  = "400";
	            $result['action']  = "add";
			}
		}else{

			if($this->crud->update($this->url['table_name'],$form_data,array('id'=>$id))){

				$result['message'] = "Update successfully";
	            $result['status']  = "200";
	            $result['action']  = "edit";
			}else{
				$result['message'] = "Not Update successfully";
	            $result['status']  = "400";
	            $result['action']  = "edit";
			}
		}

		echo json_encode($result);

	}

	

	public function delete(){
		$result =array();

		if($this->input->is_ajax_request()){

			if(!empty($id = $this->input->post('id'))){

				if($this->crud->delete($this->url['table_name'],array('id'=>$id))){
					$result['message'] = "Successfully Deleted";
					$result['status'] = 200;
					$result['data'] = array();
				}else{
					$result['message'] = "Not Found In Database";
					$result['status'] = 400;
					$result['data'] = array();
				}
			}else{
				$result['message'] = "Id not be Null or Empty";
				$result['status'] = 400;
				$result['data'] = array();
			}
		}else{

			$result['message'] = "Please use a valid way to request a api";
			$result['status'] = 400;
			$result['data'] = array();
			
		}

		echo json_encode($result);
	}	
	

	public function status_change(){

		$result = array();
		$id = $this->input->post('id');

		if($this->input->post('switch')==1){
			if($this->crud->update($this->url['table_name'],array('is_active'=>1),array('id'=> $id))){
				$result['message'] = "Successfully Active";
				$result['status'] = 200;
				$result['data'] = array();

			}else{

				$result['message'] = "Not Update";
				$result['status'] = 400;
				$result['data'] = array();
			}
		}else{
			if($this->crud->update($this->url['table_name'],array('is_active'=>0),array('id'=> $id))){
				$result['message'] = "successfully InActive";
				$result['status'] = 200;
				$result['data'] = array();

			}else{
				$result['message'] = "Not Update";
				$result['status'] = 400;
				$result['data'] = array();
			}
			
		}
		echo json_encode($result);
	}



	
}
