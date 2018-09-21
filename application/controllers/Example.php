<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Example extends UR_Controller {
		public function invoice(){
			$data['view'] = 'user/examples/invoice';
			$this->load->view('layout', $data);
		}
		public function profile(){
			$data['view'] = 'user/examples/profile';
			$this->load->view('layout', $data);
		}
		public function login(){
			$this->load->view('user/examples/login');
		}
		public function register(){
			$this->load->view('user/examples/register');
		}
		public function lockscreen(){
			$this->load->view('user/examples/lockscreen');
		}
		public function error404(){
			$data['view'] = 'user/examples/404';
			$this->load->view('layout', $data);
		}
		public function errro500(){
			$data['view'] = 'user/examples/500';
			$this->load->view('layout', $data);
		}
		public function blank(){
			$data['view'] = 'user/examples/blank';
			$this->load->view('layout', $data);
		}
		public function pace(){
			$data['view'] = 'user/examples/pace';
			$this->load->view('layout', $data);
		}

	}

	?>
