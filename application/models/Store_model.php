<?php
	class Store_model extends CI_Model{

		function addStore($form_data){
			$fields         = $this->getFields();
			$store_fields = array();

			foreach($fields as $field_id){
				if(isset($form_data[$field_id])){
					$store_fields[$field_id] = $form_data[$field_id];
				}
			}

			$this->db->insert('ci_stores', $store_fields);
			return $this->db->insert_id();
		}

		function updateStore($form_data){
			$fields         = $this->getFields();
			$store_fields = array();

			foreach($fields as $field_id){
				if(isset($form_data[$field_id])){
					$store_fields[$field_id] = $form_data[$field_id];
				}
			}

			$this->db->where('id', $form_data['id']);
			return $this->db->update('ci_stores', $store_fields);
		}

		// get stores for csv export
		public function get_stores_for_csv($user_id){
			$this->db->where('user_id', $user_id);
			$this->db->select('store_name, store_address, store_phone, store_email, store_url, store_lat, store_lng');
			$this->db->from('ci_stores');
			$query = $this->db->get();
			return $result = $query->result_array();
		}

		function getStore($store_id){
			$query  = $this->db->get_where('ci_stores', array('id' => $store_id));
			$result = null;
			if ($query->num_rows() > 0)
			{
				$result = $query->row();
			}
			return $result;
		}

		function getStores($user_id){
			$this->db->order_by("id", "desc");
			$query  = $this->db->get_where('ci_stores', array('user_id' => $user_id));
			$result = array();
			if ($query->num_rows() > 0)
			{
				$result = $query->result_array(); 
			}
			return $result;
		}

		public function deleteStore($store_id){
			$this->db->where('id', $store_id);
			return $this->db->delete('ci_stores');
		}
	
		function getFields(){
			return array(
				'store_name',
				'store_address',
				'store_phone',
				'store_email',
				'store_url',
				'store_description',
				'store_promomessage',
				'store_hours',
				'store_custom_field_1',
				'store_custom_field_2',
				'store_custom_field_3',
				'store_custom_marker_image',
				'store_category',
				'hide_store',
				'user_id',
				'store_lat',
				'store_lng'
			);
		}

	}

?>