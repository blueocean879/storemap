<?php
	class Billing_model extends CI_Model{

		function __construct(){
			parent::__construct();
			$this->load->library('stripe');
		}

		public function get_all_billings(){
			$this->create_billing_plans();

			$query = $this->db->get('ci_billing');
			return $result = $query->result_array();
		}

		/*public function edit_group($data, $id){
			$this->db->where('id', $id);
			$this->db->update('ci_billing', $data);
			return true;

		} */

		public function get_billing($id){
			$query = $this->db->get_where('ci_billing', array('id' => $id));
			return $result = $query->row_array();
		}

		public function update_billing($form_data){
			$fields         = $this->getFields();
			$billing_fields = array();

			foreach($fields as $field_id){
				if(isset($form_data[$field_id])){
					$billing_fields[$field_id] = $form_data[$field_id];
				}
			}

			$this->db->where('id', $form_data['id']);
			return $this->db->update('ci_billing', $billing_fields);
		}

		public function create_billing_plans(){
			\Stripe\Stripe::setApiKey($this->config->item('secret_key'));

			$plans = \Stripe\Plan::all(["limit" => 10]);
			$plansJson = $plans->jsonSerialize();
			
			$ids = array_map(function ($item) {
			  return $item['id'];
			}, $plansJson['data']);

			if (!in_array("monthly-micro", $ids)){
				$monthly_micro_plan = \Stripe\Plan::create([
				  "amount" => 1700,
				  "interval" => "month",
				  "product" => [
				    "name" => "Monthly Micro"
				  ],
				  "currency" => "usd",
				  "id" => "monthly-micro"
				]);
			}

			if(!in_array("monthly-pro", $ids)){
				$monthly_pro_plan = \Stripe\Plan::create([
				  "amount" => 2700,
				  "interval" => "month",
				  "product" => [
				    "name" => "Monthly Pro"
				  ],
				  "currency" => "usd",
				  "id" => "monthly-pro"
				]);
			}

			if(!in_array("monthly-advanced", $ids)){
				$monthly_advanced_plan = \Stripe\Plan::create([
				  "amount" => 5700,
				  "interval" => "month",
				  "product" => [
				    "name" => "Monthly Advanced"
				  ],
				  "currency" => "usd",
				  "id" => "monthly-advanced"
				]);
			}

			if(!in_array("annual-micro", $ids)){
				$annual_micro_plan = \Stripe\Plan::create([
				  "amount" => 18000,
				  "interval" => "year",
				  "product" => [
				    "name" => "Annual Micro"
				  ],
				  "currency" => "usd",
				  "id" => "annual-micro"
				]);
			}

			if(!in_array("annual-pro", $ids)){
				$annual_pro_plan = \Stripe\Plan::create([
				  "amount" => 28800,
				  "interval" => "year",
				  "product" => [
				    "name" => "Annual Pro"
				  ],
				  "currency" => "usd",
				  "id" => "annual-pro"
				]);
			}

			if(!in_array("annual-advanced", $ids)){
				$annual_pro_plan = \Stripe\Plan::create([
				  "amount" => 61200,
				  "interval" => "year",
				  "product" => [
				    "name" => "Annual Advanced"
				  ],
				  "currency" => "usd",
				  "id" => "annual-advanced"
				]);
			}
			/*
				Monthly Plans
			*/
			
			/*
			  2-year plans
			*/
		/*	$twoyears_micro_plan = \Stripe\Plan::create([
			  "amount" => 31200,
			  "interval" => "day",
			  "interval_count" => 730,
			  "product" => [
			    "name" => "2 Years Micro"
			  ],
			  "currency" => "usd",
			  "id" => "two-years-micro"
			]);
			
			$twoyears_pro_plan = \Stripe\Plan::create([
			  "amount" => 50400,
			  "interval" => "day",
			  "interval_count" => 730,
			  "product" => [
			    "name" => "2 Years Pro"
			  ],
			  "currency" => "usd",
			  "id" => "two-years-pro"
			]);

			
			$twoyears_advanced_plan = \Stripe\Plan::create([
			  "amount" => 108000,
			  "interval" => "day",
			  "interval_count" => 730,
			  "product" => [
			    "name" => "2 Years Advanced"
			  ],
			  "currency" => "usd",
			  "id" => "two-years-advanced"
			]);*/
			
		}

		function getFields(){
			return array(
				'id',
				'billing_cost',
				'billing_type',
			);
		}

	}

?>	