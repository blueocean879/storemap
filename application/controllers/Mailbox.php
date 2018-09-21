<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Mailbox extends UR_Controller {

		public function inbox(){
			$data['view'] = 'user/mailbox/mailbox';
			$this->load->view('layout', $data);
		}
		public function compose(){
			$data['view'] = 'user/mailbox/compose';
			$this->load->view('layout', $data);
		}
		public function read_mail(){
			$data['view'] = 'user/mailbox/read-mail';
			$this->load->view('layout', $data);
		}
	}

?>