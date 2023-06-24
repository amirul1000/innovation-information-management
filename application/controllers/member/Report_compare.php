<?php

 /**
 * Author: Amirul Momenin
 * Desc:Innovation_plan Controller
 *
 */
class Report_compare extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper('url'); 
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('Customlib');
		$this->load->helper(array('cookie', 'url','utility')); 
		$this->load->database();  
		$this->load->model('Department_model');
		$this->load->model('Innovation_plan_model');
		$this->load->model('Documents_model');
		if(! $this->session->userdata('validated')){
				redirect('member/login/index');
		}  
    } 
	function set_department($department_id=0){
		$this->session->set_userdata('selected_department_id',$department_id); 
		
		//set deafult user
		$this->db->order_by('id', 'desc');
		$this->db->where('owner_users_id', $this->session->userdata('id'));
		$this->db->where('department_id', $this->session->userdata('selected_department_id'));
		$this->db->where('status', 'active');
        $resuser = $this->db->get('users')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		if(count($resuser)>0){
			$this->session->set_userdata('selected_users_id',$resuser[0]['id']); 
		}
		
		redirect('member/report_compare/index');
	}  
	
	 function set_users($users_id=0){
		$this->session->set_userdata('selected_users_id',$users_id); 
		redirect('member/report_compare/index');
	}  
	function set_financial_year($financial_year_id){
		$this->session->set_userdata('financial_year_id',$financial_year_id); 
		redirect('member/report_compare/index');
	}
    /**
	 * Index Page for this controller.
	 *@param $start - Starting of report_compare table's index to get query
	 *
	 */
    function index($start=0){
		
		//get all organization
		$data['department'] = $this->Department_model->get_all_users_department();
		
		/*for($i=0;$i<count($department);$i++){
			
			//echo $department[$i]['id'];
			
			
			$this->db->order_by('innovation_plan.id', 'desc');
			$this->db->select('innovation_plan.*,predefined_innovation_plan.id as predefined_innovation_plan_id');
			$this->db->from('innovation_plan');
			$this->db->where('innovation_plan.department_id', $department[$i]['id']);
			//$this->db->where('users_id', $this->session->userdata('selected_users_id'));
			$this->db->where('financial_year_id', $this->session->userdata('financial_year_id'));
			$this->db->join('predefined_innovation_plan', 'predefined_innovation_plan.id = innovation_plan.predefined_innovation_plan_id', 'left');
			$this->db->join('predefined_activities', 'predefined_activities.id = predefined_innovation_plan.predefined_activities_id', 'left');
			$this->db->join('predefined_objectives', 'predefined_objectives.id = predefined_activities.predefined_objectives_id', 'left');
			$result = $this->db->get()->result_array();
			echo $this->db->last_query();
			$db_error = $this->db->error();
			if (!empty($db_error['code'])){
				echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
				exit;
			}
			
			
			echo "<pre>";
			print_r($result);
			
			echo "</pre>";
			
			
			
			
		}*/
		
		
		
		/*
		//$limit = 10;
		$this->db->order_by('innovation_plan.id', 'desc');
		$this->db->select('innovation_plan.*,predefined_innovation_plan.id as predefined_innovation_plan_id');
		$this->db->from('innovation_plan');
		$this->db->where('users_id', $this->session->userdata('selected_users_id'));
		$this->db->where('financial_year_id', $this->session->userdata('financial_year_id'));
		$this->db->join('predefined_innovation_plan', 'predefined_innovation_plan.id = innovation_plan.predefined_innovation_plan_id', 'left');
		$this->db->join('predefined_activities', 'predefined_activities.id = predefined_innovation_plan.predefined_activities_id', 'left');
		$this->db->join('predefined_objectives', 'predefined_objectives.id = predefined_activities.predefined_objectives_id', 'left');
		$result = $this->db->get()->result_array();
		//echo $this->db->last_query();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		
        $data['innovation_plan'] = $result;//$this->Innovation_plan_model->get_limit_innovation_plan($limit,$start);
		
		$no_submitted = array();
		foreach($result as $each){
			$no_submitted[] = "'".$each['predefined_innovation_plan_id']."'";
		}
		if(count($no_submitted)==0){
			$no_submitted[] = "'-1'";
		}
		
		$this->db->order_by('predefined_innovation_plan.id', 'desc');
		$this->db->select('predefined_innovation_plan.*');
		$this->db->from('predefined_innovation_plan');
		//$this->db->where('users_id', $this->session->userdata('selected_users_id'));
		$this->db->where('financial_year_id', $this->session->userdata('financial_year_id'));
		$this->db->where('predefined_innovation_plan.id not in ('.implode(',',$no_submitted).')');
		$this->db->join('predefined_activities', 'predefined_activities.id = predefined_innovation_plan.predefined_activities_id', 'left');
		$this->db->join('predefined_objectives', 'predefined_objectives.id = predefined_activities.predefined_objectives_id', 'left');
		$result = $this->db->get()->result_array();
		//echo $this->db->last_query();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		$data['innovation_plan_no_sub'] = $result;
		*/
		
		
        $data['_view'] = 'member/report_compare/index';
        $this->load->view('layouts/member/body',$data);
    }
	
	
	

}
//End of Innovation_plan controller