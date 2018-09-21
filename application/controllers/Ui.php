<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Ui extends UR_Controller {
		
		public function widgets(){
			$data['view'] = 'user/ui/widgets';
			$this->load->view('layout', $data);
		}
		public function buttons(){
			$data['view'] = 'user/ui/buttons';
			$this->load->view('layout', $data);
		}
		public function general(){
			$data['view'] = 'user/ui/general';
			$this->load->view('layout', $data);
		}
		public function icons(){
			$data['view'] = 'user/ui/icons';
			$this->load->view('layout', $data);
		}
		public function modals(){
			$data['view'] = 'user/ui/modals';
			$this->load->view('layout', $data);
		}
		public function sliders(){
			$data['view'] = 'user/ui/sliders';
			$this->load->view('layout', $data);
		}
		public function timeline(){
			$data['view'] = 'user/ui/timeline';
			$this->load->view('layout', $data);
		}
		public function calendar(){
			$data['view'] = 'user/ui/calendar';
			$this->load->view('layout', $data);
		}
		public function inbox(){
			$data['view'] = 'user/ui/mailbox';
			$this->load->view('layout', $data);
		}
		public function compose(){
			$data['view'] = 'user/ui/compose';
			$this->load->view('layout', $data);
		}
		public function read_mail(){
			$data['view'] = 'user/ui/read-mail';
			$this->load->view('layout', $data);
		}
		public function invoice(){
			$data['view'] = 'user/ui/invoice';
			$this->load->view('layout', $data);
		}
		public function profile(){
			$data['view'] = 'user/ui/profile';
			$this->load->view('layout', $data);
		}
		public function login(){
			$this->load->view('user/ui/login');
		}
		public function register(){
			$this->load->view('user/ui/register');
		}
		public function lockscreen(){
			$this->load->view('user/ui/lockscreen');
		}
		public function error404(){
			$data['view'] = 'user/ui/404';
			$this->load->view('layout', $data);
		}
		public function errro500(){
			$data['view'] = 'user/ui/500';
			$this->load->view('layout', $data);
		}
		public function blank(){
			$data['view'] = 'user/ui/blank';
			$this->load->view('layout', $data);
		}
		public function pace(){
			$data['view'] = 'user/ui/pace';
			$this->load->view('layout', $data);
		}
	}