<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Home extends CI_Controller {
		public function __construct(){
			parent::__construct();
		}
		public function index(){
			if($this->session->has_userdata('is_admin_login'))
			{
				redirect('admin/dashboard');
			}
			if($this->session->has_userdata('is_user_login'))
			{
				redirect('profile');
			}
			else{
				$this->load->view('home/index');
			}
		}
	}
?>