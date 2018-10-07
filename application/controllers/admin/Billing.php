<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Billing extends MY_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('admin/billing_model', 'billing_model');
		}
		public function index(){

			$data['billings'] = $this->billing_model->get_all_billings();
			$data['view'] = 'admin/billing/index';
			$this->load->view('layout', $data);
		}
		
		public function edit($id){
			$data['billing'] = $this->billing_model->get_billing($id);
			$data['view'] = 'admin/billing/edit';
			$this->load->view('layout', $data);
		}

		public function save(){
			$form_data = $this->input->post();
			$result = $this->billing_model->update_billing($form_data);

			if($result){
				$this->session->set_flashdata('msg', 'Billing cost has been updated successfully!');
				redirect(base_url('admin/billing'), 'refresh');
			}

			$this->session->set_flashdata('msg', 'Billing cost updating failed due to database!');
			redirect(base_url('admin/billing'), 'refresh');
		}

	}

	?>
