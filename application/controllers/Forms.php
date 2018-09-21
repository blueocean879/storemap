<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Forms extends UR_Controller {
		public function general(){
			$data['view'] = 'user/forms/general';
			$this->load->view('layout', $data);
		}
		public function advanced(){
			$data['view'] = 'user/forms/advanced';
			$this->load->view('layout', $data);
		}
		public function editors(){
			$data['view'] = 'user/forms/editors';
			$this->load->view('layout', $data);
		}

	}

	?>
