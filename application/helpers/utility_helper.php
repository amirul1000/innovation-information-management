<?php
   function get_predefined_innovation_plan($predefined_innovation_plan_id){
	   $CI = & get_instance();
	   $CI->load->database();
	   $CI->db->where('id', $predefined_innovation_plan_id);
       $result = $CI->db->get("predefined_innovation_plan")->result_array();
	   $db_error = $CI->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
	   return $result;
   }
   
   
   function get_predefined_activities($predefined_activities_id){
	   $CI = & get_instance();
	   $CI->load->database();
	   $CI->db->where('id', $predefined_activities_id);
       $result = $CI->db->get("predefined_activities")->result_array();
	   $db_error = $CI->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
	   return $result;
   }
   
   function get_predefined_objectives($predefined_objectives_id){
	   $CI = & get_instance();
	   $CI->load->database();
	   $CI->db->where('id', $predefined_objectives_id);
       $result = $CI->db->get("predefined_objectives")->result_array();
	   $db_error = $CI->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
	   return $result;
   }
   
   function get_column($financial_year_id){
	    $CI = & get_instance();
	    $CI->load->database();
	    $CI->db->order_by('order_no', 'asc');
		$CI->db->where('financial_year_id', $financial_year_id);
		$respoc = $CI->db->get('predefined_objectives_column')->result_array();
		$db_error = $CI->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		} 
		
		return $respoc;
   }
   
   function get_total_weight($financial_year_id){
	    $CI = & get_instance();
	    $CI->load->database();
	    $CI->db->select('sum(`predefined_innovation_plan`.`weight_of_plan`) as weight_of_plan');
		$CI->db->from('predefined_innovation_plan');
		$CI->db->where('financial_year_id', $financial_year_id);
		$CI->db->join('predefined_activities', 'predefined_activities.id = predefined_innovation_plan.predefined_activities_id', 'left');
		$CI->db->join('predefined_objectives', 'predefined_objectives.id = predefined_activities.predefined_objectives_id', 'left');
		$respinplan = $CI->db->get()->result_array();
		return $respinplan[0]['weight_of_plan'];
	   
   }
   
   function get_plan($financial_year_id){
	    $CI = & get_instance();
	    $CI->load->database();
	    $CI->db->select('predefined_innovation_plan.*');
		$CI->db->from('predefined_innovation_plan');
		$CI->db->where('financial_year_id', $financial_year_id);
		$CI->db->join('predefined_activities', 'predefined_activities.id = predefined_innovation_plan.predefined_activities_id', 'left');
		$CI->db->join('predefined_objectives', 'predefined_objectives.id = predefined_activities.predefined_objectives_id', 'left');
		$respinplan = $CI->db->get()->result_array(); 
		
		return $respinplan;
   }
   
   function eng_to_bengali_number($number)
	{
	   $arr_bangla = array('&#2534;','&#2535;','&#2536;','&#2537;','&#2538;','&#2539;','&#2540;','&#2541;','&#2542;','&#2543;');
	   
	   $len = strlen($number);
	   $converted = "";
	   
	   for($i=0;$i<$len;$i++)
	   {
		   
		 $index      = substr($number, $i, 1);	 
		 if(!is_numeric($index)){
			 $converted .=$index;
			 continue;
		 }
		 $converted .= $arr_bangla[$index];
	   }
	   
	   return $converted; 
	}
	
	function tr_en_bn($en){
		$CI = & get_instance();
	    $CI->load->database();
		$CI->db->order_by('id', 'desc');
		$CI->db->where('en', $en);
        $result = $CI->db->get('translation')->result_array();
		$db_error = $CI->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		if(count($result)==0){
			return $en;
		}
		return $result[0]['bn'];
	}
	
	function get_user_owner(){
	   $CI = & get_instance();
	   $CI->load->database();
	   $CI->db->where('id', $CI->session->userdata('id'));
       $result = $CI->db->get("users")->result_array();
	   $db_error = $CI->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
	   return $result[0]['owner_users_id'];
	}
?>