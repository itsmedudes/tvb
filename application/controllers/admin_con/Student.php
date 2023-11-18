<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

	protected $url = array(
							'website_name' => WEBSITE_NAME, 
							'view_path' => 'admin/student/',
							'title' => 'Admin | student-Table',
							'breadcrumb' => 'student',
							'title_url' => 'admin/student',
							'add' => 'admin/student/add',
							'back' => 'admin/student',
							'form_submit' => 'admin/student/update',
							'error' => 'admin/404',
							'table_name' => 'student',
							'edit' => 'admin/student/edit',
							'delete' => 'admin/student/delete',
							'image_path' => 'assets/images/student',// name student all photo store
							'status_change'=>'admin/student/status-change',
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

		$data['image_path'] = $this->url['image_path'];


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
		$data['image_path'] = $this->url['image_path'];


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
		$name= $this->input->post('name');
		$value = $this->input->post('course');
		$form_data = array(
			'name'=> $name,
			'address'=>$this->input->post('address'),
			'email'=> $this->input->post('email'),
			'dob'=> $this->input->post('dob'),
			'is_active' => 1,
			'created_at' => date('Y-m-d H:i:s'),

		);


		
		if(empty($id)){



			if($this->crud->insert($this->url['table_name'],$form_data)){

				$currentData = $this->db->insert_id();

			   	if(!empty($value)){
					

					foreach($value as $course){
						$this->crud->insert('student_courses',array('student_id'=>$currentData,'course_id'=>$course,'created_at'=>date("Y-m-d H:i:s")));
					}
				}else{
					$result['message'] =  'Select aleast one Course';
					$result['status'] =  '400';
					$result['action'] = 'error';
					echo json_encode($result);
					die;
				}

				$result['message'] =  'Add Successfully';
				$result['status'] =  '200';
				$result['action'] = 'add';
			}else{
				$result['message'] = "Not Added successfully";
	            $result['status']  = "400";
	            $result['action']  = "add";
			}
		}else{

		

			if($this->crud->update($this->url['table_name'],$form_data,array('id'=>$id))){

				if(!empty($value)){
					// $this->crud->delete('auction_user_table_id',array('auction_id'=>$id));
					foreach($value as $course){

						$already_have_course =$this->crud->get("student_courses",array('student_id'=>$id,'course_id'=>$course));

						if(empty($already_have_course)){

							$this->crud->insert('student_courses',array('student_id'=>$currentData,'course_id'=>$course,'created_at'=>date("Y-m-d H:i:s")));
						}

					}
				}

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

	public function view(){
		$data['title'] = "Enrolled Student";
		$data['website_name'] = $this->url['website_name'];
		$data['breadcrumb'] = "Enrolled Student";
		$data['title_url'] = $this->url['title_url'];
		$data['add_url'] = $this->url['add'];
		$data['edit_url'] = $this->url['edit'];
		$data['back_url'] = $this->url['back'];
		$data['status_change'] = $this->url['status_change'];

		


		$data['row'] =  $this->db->select("c.name as course_name, s.name as student_name,s.*, sc.created_at as joining_date")
		->from("student_courses as sc")
		->join("course as c","c.id = sc.course_id","INNER")
		->join("student as s","s.id = sc.student_id", "INNER")
		->get()->result();

		// print_r($data['row']);
		// die;


		$this->load->view($this->url['view_path'].'view',$data);
	}
	
}
