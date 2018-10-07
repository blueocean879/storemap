<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Users extends MY_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('admin/user_model', 'user_model');
			$this->load->library('datatable'); // loaded my custom serverside datatable library
		}

		public function index(){
			$data['view'] = 'admin/users/user_list';
			$data['users'] = $this->user_model->get_all_users();
			$this->load->view('layout', $data);
		}
		
		public function datatable_json(){				   					   
			$records = $this->user_model->get_all_users();
	        $data = array();
	        foreach ($records['data']  as $row) 
			{  
				$status = ($row['is_active'] == 0)? 'Deactive': 'Active'.'<span>';
				$disabled = ($row['is_admin'] == 1)? 'disabled': ''.'<span>';
				$data[]= array(
					$row['username'],
					$row['email'],
					$row['mobile_no'],
					'<span class="btn btn-info btn-flat btn-xs" title="status">'.getGroupyName($row['role']).'<span>',	// get Group name by ID (getGroupyName() is a helper function)
					'<span class="btn btn-success btn-flat btn-xs" title="status">'.$status.'<span>',	
					$row['billing_plan_id'],
					'<a title="Login as user" class="view btn btn-sm btn-info" target="_blank" href="'.base_url('admin/users/proxy/'.$row['id']).'">Login as user</a>',			
					'<a title="Delete" class="delete btn btn-sm btn-danger pull-right '.$disabled.'" data-href="'.base_url('admin/users/del/'.$row['id']).'" data-toggle="modal" data-target="#confirm-delete"> <i class="fa fa-trash-o"></i></a>
					 <a title="Edit" class="update btn btn-sm btn-primary pull-right" href="'.base_url('admin/users/edit/'.$row['id']).'"> <i class="fa fa-pencil-square-o"></i></a>
					 <a title="View" class="view btn btn-sm btn-info pull-right" href="'.base_url('admin/users/edit/'.$row['id']).'"> <i class="fa fa-eye"></i></a>'
				);
	        }
			$records['data']=$data;
	        echo json_encode($records);						   
		}

		public function proxy($user_id){
			$current_user  = $this->user_model->get_user_by_id($user_id);
			if($this->session->has_userdata('is_admin_login')){
				$user_data = array(
					'user_id' => $user_id,
					'username' => $current_user['username'],
					'is_user_login' => TRUE
				);
				$this->session->set_userdata($user_data);
				redirect(base_url('user/dashboard'), 'refresh');
			}
			
			$this->session->set_flashdata('errormessage', 'Invalid user.');
			redirect(base_url('admin/users'));
		}

		public function add(){
			if($this->input->post('submit')){
				$this->form_validation->set_rules('username', 'Username', 'trim|required');
				$this->form_validation->set_rules('firstname', 'Firstname', 'trim|required');
				$this->form_validation->set_rules('lastname', 'Lastname', 'trim|required');
				$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');
				$this->form_validation->set_rules('mobile_no', 'Number', 'trim|required');
				$this->form_validation->set_rules('password', 'Password', 'trim|required');
				$this->form_validation->set_rules('group', 'Group', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$data['view'] = 'admin/users/user_add';
					$this->load->view('layout', $data);
				}
				else{
					$data = array(
						'username' => $this->input->post('username'),
						'firstname' => $this->input->post('firstname'),
						'lastname' => $this->input->post('lastname'),
						'email' => $this->input->post('email'),
						'mobile_no' => $this->input->post('mobile_no'),
						'address' => $this->input->post('address'),
						'password' =>  password_hash($this->input->post('password'), PASSWORD_BCRYPT),
						'role' => $this->input->post('group'),
						'created_at' => date('Y-m-d : h:m:s'),
						'updated_at' => date('Y-m-d : h:m:s'),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->user_model->add_user($data);
					if($result){
						$this->session->set_flashdata('msg', 'User has been added successfully!');
						redirect(base_url('admin/users'));
					}
				}
			}
			else{
				$data['user_groups'] = $this->user_model->get_user_groups();
				$data['view'] = 'admin/users/user_add';
				$this->load->view('layout', $data);
			}
			
		}

		public function edit($id = 0){
			if($this->input->post('submit')){
				$this->form_validation->set_rules('username', 'Username', 'trim|required');
				$this->form_validation->set_rules('firstname', 'Username', 'trim|required');
				$this->form_validation->set_rules('lastname', 'Lastname', 'trim|required');
				$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');
				$this->form_validation->set_rules('mobile_no', 'Number', 'trim|required');
				$this->form_validation->set_rules('status', 'Status', 'trim|required');
				$this->form_validation->set_rules('group', 'Group', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$data['user'] = $this->user_model->get_user_by_id($id);
					$data['view'] = 'admin/users/user_edit';
					$this->load->view('layout', $data);
				}
				else{
					$data = array(
						'username' => $this->input->post('username'),
						'firstname' => $this->input->post('firstname'),
						'lastname' => $this->input->post('lastname'),
						'email' => $this->input->post('email'),
						'mobile_no' => $this->input->post('mobile_no'),
						'role' => $this->input->post('group'),
						'is_active' => $this->input->post('status'),
						'billing_plan_id' => $this->input->post('billing_plan_id'),
						'updated_at' => date('Y-m-d : h:m:s'),
					);

					if($this->input->post('password') != ""){
						$data['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
					}

					$data = $this->security->xss_clean($data);
					$result = $this->user_model->edit_user($data, $id);
					if($result){
						$this->session->set_flashdata('msg', 'User has been updated successfully!');
						redirect(base_url('admin/users'));
					}
				}
			}
			else{
				$data['user'] = $this->user_model->get_user_by_id($id);
				$data['user_groups'] = $this->user_model->get_user_groups();
				$data['view'] = 'admin/users/user_edit';
				$this->load->view('layout', $data);
			}
		}

		public function del($id = 0){
			$this->db->delete('ci_users', array('id' => $id));
			$this->session->set_flashdata('msg', 'Use has been deleted successfully!');
			redirect(base_url('admin/users'));
		}

	}


?>