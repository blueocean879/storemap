<?php
	class Billing_model extends CI_Model{

		public function get_all_billings(){
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

		function getFields(){
			return array(
				'id',
				'billing_cost',
				'billing_type',
			);
		}

	}

?>	