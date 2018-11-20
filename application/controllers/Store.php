<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');*/
class Store extends UR_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('store_model', 'store_model');
		$this->load->model('mapsetting_model', 'mapsetting_model');
	}
	
	public function index(){
		$data['title'] = 'Add a New Store';
		$data['view'] = 'store/index';
		$this->load->view('layout_user', $data);
	}

	public function add_store(){
		
		$form_data = $this->input->post();
		$form_data['user_id'] = $this->session->userdata('user_id');
		$data = $this->security->xss_clean($form_data);
		$result = $this->store_model->addStore($data);
		if($result){
			$this->session->set_flashdata('msg', 'New store has been added successfully!');
			redirect(base_url('user/dashboard'), 'refresh');
		}
	}

	public function update_store(){
		$form_data = $this->input->post();
		$data = $this->security->xss_clean($form_data);
		$result = $this->store_model->updateStore($data);
		if($result){
			$this->session->set_flashdata('msg', 'Store detail has been updated successfully!');
			redirect(base_url('user/dashboard'), 'refresh');
		}
	}

	public function edit($store_id){
		$store = $this->store_model->getStore($store_id);
		$user_id = $this->session->userdata('user_id');
		$mapsetting = $this->mapsetting_model->getMapSetting($user_id);

		$data  = array(
			'store_detail' => $store,
			'category'     => $mapsetting['custom_categories'],
			'view'         => 'store/store_edit'
		);
	
		$this->load->view('layout_user', $data);
	}

	public function delete($store_id){
		if($this->store_model->deleteStore($store_id)){
			$this->session->set_flashdata('msg', 'The store was deleted successfully.');
		}
		redirect(base_url('user/dashboard'), 'refresh');
	}

	public function delete_selected(){
		$ids = $this->input->post('store_ids');
		if (!empty($ids)) {
	        $this->db->where_in('id', $ids);
	        $this->db->delete('ci_stores');

	        $this->output->set_content_type('application/json'); 
        	$this->output->set_output(json_encode("success"));

        	return;
	    }

		$this->output->set_content_type('application/json'); 
        $this->output->set_output(json_encode("fail"));
	}
	
}

?>	