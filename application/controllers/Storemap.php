<?php 
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
class Storemap extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
		$data['title'] = 'Stores Map';
		$data['view'] = 'storemap/index';
		$this->load->view('layout_map', $data);
	}
	
}

?>	