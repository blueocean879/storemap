<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Calendar extends UR_Controller {
		public function index(){
			$data['view'] = 'user/calendar/calendar';
			$this->load->view('layout', $data);
		}

	}

?>	