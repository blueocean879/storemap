<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Charts extends UR_Controller {
		public function chartjs(){
			$data['view'] = 'user/charts/chartjs';
			$this->load->view('layout', $data);
		}
		public function morris(){
			$data['view'] = 'user/charts/morris';
			$this->load->view('layout', $data);
		}
		public function flot(){
			$data['view'] = 'user/charts/flot';
			$this->load->view('layout', $data);
		}
		public function inline(){
			$data['view'] = 'user/charts/inline';
			$this->load->view('layout', $data);
		}

	}

	?>
