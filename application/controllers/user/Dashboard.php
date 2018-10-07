<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Dashboard extends UR_Controller {
		public function __construct(){
			parent::__construct();
			$this->load->model('store_model', 'store_model');
		}

		public function index(){
			$user_id = $this->session->userdata('user_id');
			$data['stores'] = $this->store_model->getStores($user_id);
			$data['title'] = 'Dashboard';
			$data['view'] = 'user/dashboard/dashboard1';
			$this->load->view('layout_user', $data);
		}

		//---------------------------------------------------------------	
		// Export data in CSV format 
		public function export_csv(){ 
		   // file name 
		   $filename = 'stores_'.date('Y-m-d').'.csv'; 
		   header("Content-Description: File Transfer"); 
		   header("Content-Disposition: attachment; filename=$filename"); 
		   header("Content-Type: application/csv; ");
		   
		   // get data 
		   $user_id = $this->session->userdata('user_id');
		   $stores_data = $this->store_model->get_stores_for_csv($user_id);

		   // file creation 
		   $file = fopen('php://output', 'w');
		   $header = array("StoreName", "Address", "Phone Number", "Email", "URL", "Latitude", "Longitude"); 
		   fputcsv($file, $header);
		   foreach ($stores_data as $key=>$line){ 
		     fputcsv($file,$line); 
		   }
		   fclose($file); 
		   exit; 
		}
		
	}

?>	