<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Map_Setting extends UR_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('mapsetting_model', 'mapsetting_model');
	}
	
	public function index(){
		$data['title'] = 'Map Setting';
		$data['view'] = 'user/map_setting/index';
		$user_id = $this->session->userdata('user_id');
		$data['map_settings'] = $this->mapsetting_model->getMapSetting($user_id);
		
		$this->load->view('layout_user', $data);
	}

	public function save(){
		$form_data = $this->input->post();
		$form_data['user_id'] = $this->session->userdata('user_id');
		$data = $this->security->xss_clean($form_data);
		$result = $this->mapsetting_model->saveMapSetting($data);

		if($result){
			$this->session->set_flashdata('msg', 'Map setting values has been saved successfully!');
			redirect(base_url('map_setting'), 'refresh');
		}

		$this->session->set_flashdata('msg', 'Map setting saving failed due to database!');
		redirect(base_url('map_setting'), 'refresh');
	}
	
}

?>	