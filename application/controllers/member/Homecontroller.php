<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Author: Amirul Momenin
 * Desc:Landing Page
 */
class Homecontroller extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->helper(array(
            'cookie',
            'url'
        ));
        $this->load->database();
		$this->load->helper('utility'); 
        if (! $this->session->userdata('validated')) {
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
		redirect('member/homecontroller/index');
	}  
	
	 function set_users($users_id=0){
		$this->session->set_userdata('selected_users_id',$users_id); 
		redirect('member/homecontroller/index');
	}  
	 function set_switch($user_type=0){
		$this->session->set_userdata('user_type',$user_type); 
		$this->session->set_userdata('selected_department_id',$this->session->userdata('department_id')); 
		$this->session->set_userdata('selected_users_id',$this->session->userdata('id')); 
		redirect('member/homecontroller/index');
	}  
    /**
     * Index Page for this controller.
     */
    public function index()
    {
        $data['_view'] = 'member_homepage';
        $this->load->view('layouts/member/body', $data);
    }
	
		
	function load_predefined_template(){
		
		$this->session->set_userdata('financial_year_id',$this->input->post('id')); 
		
		$this->db->order_by('sl_no', 'asc');
		$this->db->where('financial_year_id',$this->input->post('id'));
        $respo = $this->db->get('predefined_objectives')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}		
		$data['respo'] = $respo;
		
		$this->db->order_by('order_no', 'asc');
		$this->db->where('financial_year_id', $this->input->post('id'));
		$respoc = $this->db->get('predefined_objectives_column')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		$data['respoc'] = $respoc;
		
		
		$this->load->view('member/template/template.php', $data);
		
	}
	
	function set_coulmn_data(){
			$this->db->order_by('order_no', 'asc');
			$this->db->where('financial_year_id', $this->input->post('id'));
			$respoc = $this->db->get('predefined_objectives_column')->result_array();
			$db_error = $this->db->error();
			if (!empty($db_error['code'])){
				echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
				exit;
			}
	    $data['respoc'] =  $respoc; 
		$this->load->view('member/template/column_data.php', $data);
	}
	
}
