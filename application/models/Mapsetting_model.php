<?php
	class Mapsetting_model extends CI_Model{

		function saveMapSetting($form_data){
			$fields         = $this->getFields();
			$mapsetting_fields = array();

			foreach($fields as $field_id){
				if(isset($form_data[$field_id])){
					$mapsetting_fields[$field_id] = $form_data[$field_id];
				}
			}

			$query  = $this->db->get_where('ci_mapsetting', array('user_id' => $form_data['user_id']));

			if ($query->num_rows() > 0){
				$this->db->where('user_id', $form_data['user_id']);
				return $this->db->update('ci_mapsetting', $mapsetting_fields);
			}
			else{
				$this->db->insert('ci_mapsetting', $mapsetting_fields);
				return $this->db->insert_id();
			}

		}

		function getMapSetting($user_id){
			$query  = $this->db->get_where('ci_mapsetting', array('user_id' => $user_id));
			$result = array();
			if ($query->num_rows() > 0)
			{
				$result = $query->result_array(); 
				return $result[0];
			}
			else{
				return null;
			}
			
		}

		public function deleteMapSetting($user_id){
			$this->db->where('user_id', $user_id);
			return $this->db->delete('ci_mapsetting');
		}

		function getFields(){
			return array(
				'user_id',
				'map_options',
				'map_api_key',
				'map_layout',
				'location_visible',
				'ask_user_location',
				'custom_css',
				'external_csslink',
				'google_fonts',
				'custom_image_marker',
				'starting_location',
				'starting_zoomlevel',
				'after_zoomlevel',
				'search_radius_filter',
				'default_search_radius',
				'show_store_nearest',
				'enable_autocomplete',
				'search_location',
				'start_lat',
				'start_lng',
				'custom_categories',
			);
		}
	}
?>