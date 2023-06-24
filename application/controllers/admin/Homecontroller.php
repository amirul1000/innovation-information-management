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
		$this->load->library('customlib');
        $this->load->helper(array('cookie', 'url','utility')); 
        $this->load->database();
		$this->load->helper('utility'); 
		$this->load->model('Predefined_objectives_model');
		$this->load->model('Predefined_activities_model');
		$this->load->model('Predefined_innovation_plan_model');
		$this->load->model('Predefined_innovation_plan_column_data_model');
        if (! $this->session->userdata('validated')) {
            redirect('admin/login/index');
        }
    }
    /**
     * Index Page for this controller.
     */
    public function index()
    {
        $data['_view'] = 'admin_homepage';
        $this->load->view('layouts/admin/body', $data);
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
		
		
		$this->load->view('admin/template/template.php', $data);
		
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
		$this->load->view('admin/template/column_data.php', $data);
	}
	
	function load_objectives(){
		$this->db->order_by('id', 'desc');
		$this->db->where('id', $this->input->post('id'));
        $result = $this->db->get('predefined_objectives')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		
		echo json_encode($result);
		
	}
	
	function save_objectives(){
		$predefined_objectives_id = 0;
		$params = array(
					'financial_year_id' => html_escape($this->input->post('financial_year_id')),
					'sl_no' => html_escape($this->input->post('sl_no')),
					'objectives_name' => html_escape($this->input->post('objectives_name')),
					'weight_of_objectives' => html_escape($this->input->post('weight_of_objectives')),
				);
		 
		$id = $this->input->post('id');
		
		 if(isset($id) && $id>0){
			$data['predefined_objectives'] = $this->Predefined_objectives_model->get_predefined_objectives($id);
            if(isset($_POST) && count($_POST) > 0){   
                $predefined_objectives_id = $this->Predefined_objectives_model->update_predefined_objectives($id,$params);
            }
        } //save
		else{
			if(isset($_POST) && count($_POST) > 0){   
                $predefined_objectives_id = $this->Predefined_objectives_model->add_predefined_objectives($params);
            }
		}
		
		if($predefined_objectives_id >0 ){
			
			$arr[0]['msg'] = 'Objectives has been created successfully';
			$arr[0]['status'] = 'success';
			
			echo json_encode($arr);
		}
	}
	
	
	function delete_objectives(){
	$predefined_objectives = $this->Predefined_objectives_model->get_predefined_objectives($this->input->post('id'));

        // check if the predefined_objectives exists before trying to delete it
        if(isset($predefined_objectives['id'])){
            $this->Predefined_objectives_model->delete_predefined_objectives($this->input->post('id'));
        }
		
		if($predefined_objectives['id'] >0 ){
			
            $status = $this->db->delete('predefined_activities',array('predefined_objectives_id'=>$this->input->post('id')));
			$db_error = $this->db->error();
			if (!empty($db_error['code'])){
				echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
				exit;
			}
			
			$arr[0]['msg'] = 'Predefined objectives has been deleted successfully';
			$arr[0]['status'] = 'success';
			
			echo json_encode($arr);
		}
	}
	
	function load_activities(){
		$this->db->order_by('id', 'desc');
		$this->db->where('id', $this->input->post('id'));
        $result = $this->db->get('predefined_activities')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		
		echo json_encode($result);
		
	}
	
	
	function save_activities(){
		$predefined_activities_id = 0;
		$id = $this->input->post('id');
		
		$created_at = "";
		$updated_at = "";

		if($id<=0){
			$created_at = date("Y-m-d H:i:s");
		}
		else if($id>0){
			$updated_at = date("Y-m-d H:i:s");
		}

		$params = array(
					'predefined_objectives_id' => html_escape($this->input->post('predefined_objectives_id')),
					'activities_name' => html_escape($this->input->post('activities_name')),
					'description' => html_escape($this->input->post('description')),
					'sl_no' => html_escape($this->input->post('sl_no')),
					'order_no' => html_escape($this->input->post('order_no')),
					'created_at' =>$created_at,
					'updated_at' =>$updated_at,

				);
		 
		if($id>0){
			unset($params['created_at']);
		  }if($id<=0){
			unset($params['updated_at']);
		  } 
		//update		
        if(isset($id) && $id>0){
			 $this->Predefined_activities_model->get_predefined_activities($id);
            if(isset($_POST) && count($_POST) > 0){   
                $predefined_activities_id  =$this->Predefined_activities_model->update_predefined_activities($id,$params);
				//$this->session->set_flashdata('msg','Predefined_activities has been updated successfully');
            }
        } //save
		else{
			if(isset($_POST) && count($_POST) > 0){   
                $predefined_activities_id = $this->Predefined_activities_model->add_predefined_activities($params);
				//$this->session->set_flashdata('msg','Predefined_activities has been saved successfully');
               
            }
		}
		if($predefined_activities_id >0 ){
			
			$arr[0]['msg'] = 'Predefined_activities has been saved successfully';
			$arr[0]['status'] = 'success';
			
			echo json_encode($arr);
		}
	}
	
	function delete_activities(){
		$predefined_activities = $this->Predefined_activities_model->get_predefined_activities($this->input->post('id'));

        // check if the predefined_activities exists before trying to delete it
        if(isset($predefined_activities['id'])){
            $this->Predefined_activities_model->delete_predefined_activities($this->input->post('id'));
        }
		if($predefined_activities['id'] >0 ){
			
			$status = $this->db->delete('predefined_innovation_plan',array('predefined_activities_id'=>$this->input->post('id')));
			$db_error = $this->db->error();
			if (!empty($db_error['code'])){
				echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
				exit;
			}
			
			
			$arr[0]['msg'] = 'Predefined activities has been deleted successfully';
			$arr[0]['status'] = 'success';
			echo json_encode($arr);
		}
	}
	
	function load_plan(){
		$this->db->order_by('id', 'desc');
		$this->db->where('id', $this->input->post('id'));
        $result1 = $this->db->get('predefined_innovation_plan')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		
		$this->db->order_by('id', 'desc');
		$this->db->where('predefined_innovation_plan_id', $this->input->post('id'));
        $result2 = $this->db->get('predefined_innovation_plan_column_data')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		
		//
		$arr['plan'] = $result1;
		$arr['plan_data'] = $result2;
		
		echo json_encode($arr);
	}
	function save_plan(){
		$predefined_innovation_plan_id = 0;
		$id = $this->input->post('id');
		$created_at = "";
		$updated_at = "";

		if($id<=0){
			 $created_at = date("Y-m-d H:i:s");
		 }
		else if($id>0){
			 $updated_at = date("Y-m-d H:i:s");
		 }

		$params = array(
					'predefined_activities_id' => html_escape($this->input->post('predefined_activities_id')),
					'plan' => html_escape($this->input->post('plan')),
					'performance_indicators' => html_escape($this->input->post('performance_indicators')),
					'weight_of_plan' => html_escape($this->input->post('weight_of_plan')),
					'sl_no' => html_escape($this->input->post('sl_no')),
					'created_at' =>$created_at,
					'updated_at' =>$updated_at,
				);
		 
		if($id>0){
			unset($params['created_at']);
		  }if($id<=0){
			unset($params['updated_at']);
		  } 
		
		//update		
        if(isset($id) && $id>0){
			$predefined_innovation_plan_id = $this->Predefined_innovation_plan_model->get_predefined_innovation_plan($id);
            if(isset($_POST) && count($_POST) > 0){   
                $predefined_innovation_plan_id = $this->Predefined_innovation_plan_model->update_predefined_innovation_plan($id,$params);
				$this->save_column_data($id);            }
        } //save
		else{
			if(isset($_POST) && count($_POST) > 0){   
                $predefined_innovation_plan_id = $this->Predefined_innovation_plan_model->add_predefined_innovation_plan($params);
				$this->save_column_data($predefined_innovation_plan_id);         
            }
		}
		
		if($predefined_innovation_plan_id >0 ){
			$arr[0]['msg'] = 'Predefined innovation plan has been saved successfully';
			$arr[0]['status'] = 'success';
			
			echo json_encode($arr);
		}
        
	}
	
	function save_column_data($id){
		$predefined_objectives_column_id_arr = json_decode($this->input->post('predefined_objectives_column_id'));
		$column_data_arr = json_decode($this->input->post('column_data'));
		foreach($predefined_objectives_column_id_arr as $key=>$value){
			$created_at = "";
			$updated_at = "";

			$created_at = date("Y-m-d H:i:s");
			
			$updated_at = date("Y-m-d H:i:s");
			
		    $params = array(
					'predefined_objectives_column_id' =>$value,
					'predefined_innovation_plan_id' => $id,
					'column_data' => $column_data_arr[$key],
					'created_at' =>$created_at,
					'updated_at' =>$updated_at,

				);
				
				
			$this->db->order_by('id', 'desc');
			$this->db->where('predefined_objectives_column_id', $value);
			$this->db->where('predefined_innovation_plan_id', $id);
			$respipcd = $this->db->get('predefined_innovation_plan_column_data')->result_array();
			$db_error = $this->db->error();
			if (!empty($db_error['code'])){
				echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
				exit;
			}	
				
			if(count($respipcd)>0){
			  $this->Predefined_innovation_plan_column_data_model->update_predefined_innovation_plan_column_data($respipcd[0]['id'],$params);
            }
			else
			{
			  $this->Predefined_innovation_plan_column_data_model->add_predefined_innovation_plan_column_data($params);
			}
		}
	}
	
	function delete_plan(){
		$predefined_innovation_plan = $this->Predefined_innovation_plan_model->get_predefined_innovation_plan($this->input->post('id'));

        // check if the predefined_activities exists before trying to delete it
        if(isset($predefined_innovation_plan['id'])){
            $this->Predefined_innovation_plan_model->delete_predefined_innovation_plan($this->input->post('id'));

        }
		if($predefined_innovation_plan['id'] >0 ){
			
			$status = $this->db->delete('predefined_innovation_plan_column_data',array('predefined_innovation_plan_id'=>$this->input->post('id')));
			$db_error = $this->db->error();
			if (!empty($db_error['code'])){
				echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
				exit;
			}
			
			$arr[0]['msg'] = 'Predefined innovation plan has been deleted successfully';
			$arr[0]['status'] = 'success';
			echo json_encode($arr);
		}
	}
}
