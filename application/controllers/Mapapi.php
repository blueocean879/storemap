<?php
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
	class Mapapi extends CI_Controller {
		
		function __construct() {
			parent::__construct(); 
		}

		function mapsetting($user_id){
			
			$this->db->select('ci_mapsetting.*,');
		  
	        if($user_id){
	            $this->db->where('ci_mapsetting.user_id', $user_id);
	        }

	        $query  = $this->db->get('ci_mapsetting');
	        $result = $query->result();

	        $this->output->set_content_type('application/json'); 
	        $this->output->set_output(json_encode($result));

		}

		function stores($user_id){
			$this->db->select('ci_stores.*,');
			 
	        if($user_id){
	            $this->db->where('ci_stores.user_id', $user_id);
	        }

	        $query  = $this->db->get('ci_stores');
	        $result = $query->result();

	        $this->output->set_content_type('application/json'); 
	        $this->output->set_output(json_encode($result));
		}

	}
?>