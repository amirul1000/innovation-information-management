<?php

 /**
 * Author: Amirul Momenin
 * Desc:Innovation_plan Controller
 *
 */
class Innovation_plan extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper('url'); 
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('Customlib');
		$this->load->helper(array('cookie', 'url','utility')); 
		$this->load->database();  
		$this->load->model('Innovation_plan_model');
		$this->load->model('Documents_model');
		$this->load->model('Final_submit_permission_model');
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
		
		redirect('member/innovation_plan/index');
	}  
	
	 function set_users($users_id=0){
		$this->session->set_userdata('selected_users_id',$users_id); 
		redirect('member/innovation_plan/index');
	}  
	function set_financial_year($financial_year_id){
		$this->session->set_userdata('financial_year_id',$financial_year_id); 
		redirect('member/innovation_plan/index');
	}
    /**
	 * Index Page for this controller.
	 *@param $start - Starting of innovation_plan table's index to get query
	 *
	 */
    function index($start=0){
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
		
		//pagination
		/*$config['base_url'] = site_url('member/innovation_plan/index');
		$config['total_rows'] = $this->Innovation_plan_model->get_count_innovation_plan();
		$config['per_page'] = 10;
		//Bootstrap 4 Pagination fix
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tag_close']   = '<span aria-hidden="true"></span></span></li>';
		$config['next_tag_close']   = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tag_close']   = '</span></li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tag_close']  = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tag_close']   = '</span></li>';		
		$this->pagination->initialize($config);
        $data['link'] =$this->pagination->create_links();*/
		
        $data['_view'] = 'member/innovation_plan/index';
        $this->load->view('layouts/member/body',$data);
    }
	
	 /**
     * Save innovation_plan
	 *@param $id - primary key to update
	 *
     */
    function save($id=-1){   
		 
		$created_at = "";
        $updated_at = "";

		if($id<=0){
			 $created_at = date("Y-m-d H:i:s");
		 }
		else if($id>0){
			 $updated_at = date("Y-m-d H:i:s");
		 }

			$params = array(
					'users_id' => html_escape($this->input->post('users_id')),
					'department_id' => html_escape($this->input->post('department_id')),
					'predefined_objectives_id' => html_escape($this->input->post('predefined_objectives_id')),
					'predefined_activities_id' => html_escape($this->input->post('predefined_activities_id')),
					'predefined_innovation_plan_id' => html_escape($this->input->post('predefined_innovation_plan_id')),
					'performance_indicators' => html_escape($this->input->post('performance_indicators')),
					'weight_of_plan' => html_escape($this->input->post('weight_of_plan')),
					'half_yearly_evaluation' => html_escape($this->input->post('half_yearly_evaluation')),
					'half_yearly_evaluation_date' => html_escape($this->input->post('half_yearly_evaluation_date')),
					'half_yearly_evaluation_comments' => html_escape($this->input->post('half_yearly_evaluation_comments')),
					'yearly_evaluation' => html_escape($this->input->post('yearly_evaluation')),
					'yearly_evaluation_date' => html_escape($this->input->post('yearly_evaluation_date')),
					'yearly_evaluation_comments' => html_escape($this->input->post('yearly_evaluation_comments')),
					'final_evaluation' => html_escape($this->input->post('final_evaluation')),
					'final_evaluation_date' => html_escape($this->input->post('final_evaluation_date')),
					'final_evaluation_comments' => html_escape($this->input->post('final_evaluation_comments')),
					'submission' => html_escape($this->input->post('submission')),
					'submitted_date' => html_escape($this->input->post('submitted_date')),
					'completed_date' => html_escape($this->input->post('completed_date')),
					'created_at' =>$created_at,
					'updated_at' =>$updated_at,
					
									);
		 
		if($id>0){
			unset($params['created_at']);
		  }if($id<=0){
			unset($params['updated_at']);
		  } 
		$data['id'] = $id;
		//update		
        if(isset($id) && $id>0){
			$data['innovation_plan'] = $this->Innovation_plan_model->get_innovation_plan($id);
            if(isset($_POST) && count($_POST) > 0){   
                $this->Innovation_plan_model->update_innovation_plan($id,$params);
				$this->session->set_flashdata('msg','Innovation_plan has been updated successfully');
                redirect('member/innovation_plan/index');
            }else{
                $data['_view'] = 'member/innovation_plan/form';
                $this->load->view('layouts/member/body',$data);
            }
        } //save
		else{
			if(isset($_POST) && count($_POST) > 0){   
                $innovation_plan_id = $this->Innovation_plan_model->add_innovation_plan($params);
				$this->session->set_flashdata('msg','Innovation_plan has been saved successfully');
                redirect('member/innovation_plan/index');
            }else{  
			    $data['innovation_plan'] = $this->Innovation_plan_model->get_innovation_plan(0);
                $data['_view'] = 'member/innovation_plan/form';
                $this->load->view('layouts/member/body',$data);
            }
		}
        
    } 
	
	/**
     * Details innovation_plan
	 * @param $id - primary key to get record
	 *
     */
	function details($id){
        $data['innovation_plan'] = $this->Innovation_plan_model->get_innovation_plan($id);
		$data['id'] = $id;
        $data['_view'] = 'member/innovation_plan/details';
        $this->load->view('layouts/member/body',$data);
	}
	
    /**
     * Deleting innovation_plan
	 * @param $id - primary key to delete record
	 *
     */
    function remove($id){
        $innovation_plan = $this->Innovation_plan_model->get_innovation_plan($id);

        // check if the innovation_plan exists before trying to delete it
        if(isset($innovation_plan['id'])){
            $this->Innovation_plan_model->delete_innovation_plan($id);
			$this->session->set_flashdata('msg','Innovation_plan has been deleted successfully');
            redirect('member/innovation_plan/index');
        }
        else
            show_error('The innovation_plan you are trying to delete does not exist.');
    }
	
	function view_evaluation($id=0){
		$this->load->helper('utility'); 
		$arr_plan = get_predefined_innovation_plan($id);
		$arr_activities = get_predefined_activities($arr_plan[0]['predefined_activities_id']);
		$arr_objectives = get_predefined_objectives($arr_activities[0]['predefined_objectives_id']);
		$data['id'] = $id;
		
		$data['arr_plan'] = $arr_plan;
		$data['arr_activities'] = $arr_activities;
		$data['arr_objectives'] = $arr_objectives;
		
		
		$this->db->order_by('id', 'desc');
		$this->db->where('users_id', $this->session->userdata('selected_users_id'));
		$this->db->where('predefined_innovation_plan_id',$arr_plan[0]['id']);
        $resinnovation_plan = $this->db->get('innovation_plan')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		
		$data['innovation_plan'] = $resinnovation_plan;
		
		$this->db->where('id', $id);
		$respip = $this->db->get('predefined_innovation_plan')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		$data['respip'] = $respip;
		
		$this->db->order_by('order_no', 'asc');
		$this->db->where('financial_year_id', $arr_objectives[0]['financial_year_id']);
		$respoc = $this->db->get('predefined_objectives_column')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		$data['respoc'] = $respoc;
		
		$data['_view'] = 'member/innovation_plan/view_evaluation';
        $this->load->view('layouts/member/body',$data);
	}
	
	
	function add_evaluation(){
		$created_at = date("Y-m-d H:i:s");
		$updated_at = date("Y-m-d H:i:s");
		$innovation_plan_id = 0;
		
		$this->db->order_by('id', 'desc');
		$this->db->where('users_id', $this->session->userdata('selected_users_id'));
		$this->db->where('predefined_innovation_plan_id',$this->input->post('predefined_innovation_plan_id'));
        $result = $this->db->get('innovation_plan')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		$id = isset($result[0]['id'])?$result[0]['id']:0;
		
		if($id<=0){
			 $created_at = date("Y-m-d H:i:s");
		 }
		else if($id>0){
			 $updated_at = date("Y-m-d H:i:s");
		 }
		$params = array(
					'users_id' => $this->session->userdata('selected_users_id'),
					'department_id' => $this->session->userdata('selected_department_id'),
					'predefined_objectives_id' => html_escape($this->input->post('predefined_objectives_id')),
					'predefined_activities_id' => html_escape($this->input->post('predefined_activities_id')),
					'predefined_innovation_plan_id' => html_escape($this->input->post('predefined_innovation_plan_id')),
					'performance_indicators' => html_escape($this->input->post('performance_indicators')),
					'weight_of_plan' => html_escape($this->input->post('weight_of_plan')),
					/*'half_yearly_evaluation' => html_escape($this->input->post('half_yearly_evaluation')),
					'half_yearly_evaluation_date' => html_escape($this->input->post('half_yearly_evaluation_date')),
					'half_yearly_evaluation_comments' => html_escape($this->input->post('half_yearly_evaluation_comments')),
					'yearly_evaluation' => html_escape($this->input->post('yearly_evaluation')),
					'yearly_evaluation_date' => html_escape($this->input->post('yearly_evaluation_date')),
					'yearly_evaluation_comments' => html_escape($this->input->post('yearly_evaluation_comments')),
					'total_evaluation' => html_escape($this->input->post('total_evaluation')),
					'half_yearly_evaluation_actual' => html_escape($this->input->post('half_yearly_evaluation_actual')),
					'half_yearly_evaluation_actual_date' => html_escape($this->input->post('half_yearly_evaluation_actual_date')),
					'yearly_evaluation_actual_comments' => html_escape($this->input->post('yearly_evaluation_actual_comments')),
					'yearly_evaluation_actual' => html_escape($this->input->post('yearly_evaluation_actual')),
					'yearly_evaluation_actual_date' => html_escape($this->input->post('yearly_evaluation_actual_date')),
					'yearly_evaluation_actual_commets' => html_escape($this->input->post('yearly_evaluation_actual_commets')),
					'total_evaluation_actual' => html_escape($this->input->post('total_evaluation_actual')),
					'submission' => html_escape($this->input->post('submission')),
					'submitted_date' => html_escape($this->input->post('submitted_date')),
					'completed_date' => html_escape($this->input->post('completed_date')),*/
					'created_at' =>$created_at,
					'updated_at' =>$updated_at,					
									);
		 
		 if($this->session->userdata('user_type')=='organization'){
			  if($this->input->post('predefined_year_type')=='half_yearly'){
				  $params['half_yearly_evaluation'] = $this->input->post('weight_of_plan') * ((float)$this->input->post('predefined_objectives_column')/100);
				  $params['half_yearly_evaluation_date'] = $created_at;
				  $params['half_yearly_evaluation_comments']  = $this->input->post('comments'); 
				  $params['submission']  ='half year submitted'; 
				  $params['submitted_date']  = date("Y-m-d H:i:s");
			  }
			  
			  if($this->input->post('predefined_year_type')=='full_yearly'){
				  $params['yearly_evaluation'] = $this->input->post('weight_of_plan') * ((float)$this->input->post('predefined_objectives_column')/100);
				  $params['yearly_evaluation_date'] = $created_at;
				  $params['yearly_evaluation_comments']  = $this->input->post('comments'); 
				  $params['submission']  = 'full year submitted'; 
				  $params['submitted_date']  = date("Y-m-d H:i:s");
			  }
		 }
		 
		 if($this->session->userdata('user_type')=='admin'){
			  if($this->input->post('predefined_year_type')=='half_yearly'){				   
				  $params['half_yearly_final_evaluation'] = $this->input->post('weight_of_plan') * ((float)$this->input->post('predefined_objectives_column')/100);
				  $params['half_yearly_final_evaluation_date'] = $created_at;
				  $params['half_yearly_final_evaluation_comments']  = $this->input->post('comments'); 
				  $params['final_evaluator_users_id']  = $this->session->userdata('id');
				  //$params['submission']  = 'completed'; 
				  //$params['completed_date']  = date("Y-m-d H:i:s");
				  
				  $params['final_evaluation'] = $this->input->post('weight_of_plan') * ((float)$this->input->post('predefined_objectives_column')/100);
				  $params['final_evaluation_date'] = $created_at;
				  $params['final_evaluation_comments']  = $this->input->post('comments'); 
				  $params['final_evaluator_users_id']  = $this->session->userdata('id');
				  $params['submission']  = 'completed'; 
				  $params['completed_date']  = date("Y-m-d H:i:s");
				  
				  
			  }
			  
			  if($this->input->post('predefined_year_type')=='full_yearly'){
				  $params['final_evaluation'] = $this->input->post('weight_of_plan') * ((float)$this->input->post('predefined_objectives_column')/100);
				  $params['final_evaluation_date'] = $created_at;
				  $params['final_evaluation_comments']  = $this->input->post('comments'); 
				  $params['final_evaluator_users_id']  = $this->session->userdata('id');
				  $params['submission']  = 'completed'; 
				  $params['completed_date']  = date("Y-m-d H:i:s");
			  }
		 }
		     
		  
		if($id>0){
			unset($params['created_at']);
		  }if($id<=0){
			unset($params['updated_at']);
		  } 
		  
		  
		$data['id'] = $id;
		//update		
        if(isset($id) && $id>0){
			$data['innovation_plan'] = $this->Innovation_plan_model->get_innovation_plan($id);
            if(isset($_POST) && count($_POST) > 0){   
                $this->Innovation_plan_model->update_innovation_plan($id,$params);
				$this->session->set_flashdata('msg','Innovation_plan has been updated successfully');
               
            }
        } //save
		else{
			if(isset($_POST) && count($_POST) > 0){   
                $innovation_plan_id = $this->Innovation_plan_model->add_innovation_plan($params);
				$id = $innovation_plan_id;
            }
		}
		//upload picture
		if(isset($_SESSION['file_picture_tmp_name'])){
			
			$this->db->order_by('id', 'desc');
			$this->db->where('innovation_plan_id', $id);
			$this->db->where('document_file_type', 'picture');
			$resdocuments = $this->db->get('documents')->result_array();
			$db_error = $this->db->error();
			if (!empty($db_error['code'])){
				echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
				exit;
			}
			$documents_id = isset($resdocuments[0]['id'])?$resdocuments[0]['id']:0;
			
			$_SESSION['file_picture_tmp_name'] = base64_decode($_SESSION['file_picture_tmp_name']);
			$filePath="uploads/images/documents/".time() . str_replace(" ", "_",$_SESSION['file_picture_name']);
			$fp=fopen("./public/".$filePath,"w");
			fwrite($fp,$_SESSION['file_picture_tmp_name']);
			fclose($fp);
			$params = array(
						 'innovation_plan_id' =>$id,
						  'document_file_type' => 'picture',
						  'file_picture' => $filePath,
						  'description' => '',
						  'created_at' =>$created_at,
						  'updated_at' =>$updated_at,
										);
			if($documents_id>0){
				unset($params['created_at']);
			  }if($documents_id<=0){
				unset($params['updated_at']);
			  } 					
			if($documents_id>0){							
				$this->Documents_model->update_documents($documents_id,$params);
			}else{
				$documents_id = $this->Documents_model->add_documents($params);	
			}
			unset($_SESSION['file_picture_tmp_name']);
		}
		
		//upload video
		if(isset($_SESSION['file_video_tmp_name'])){
			
			$this->db->order_by('id', 'desc');
			$this->db->where('innovation_plan_id', $id);
			$this->db->where('document_file_type', 'video');
			$resdocuments = $this->db->get('documents')->result_array();
			$db_error = $this->db->error();
			if (!empty($db_error['code'])){
				echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
				exit;
			}
			$documents_id = isset($resdocuments[0]['id'])?$resdocuments[0]['id']:0;
			
			$_SESSION['file_video_tmp_name'] = base64_decode($_SESSION['file_video_tmp_name']);
			$filePath="uploads/images/documents/".time() . str_replace(" ", "_",$_SESSION['file_video_name']);
			$fp=fopen("./public/".$filePath,"w");
			fwrite($fp,$_SESSION['file_video_tmp_name']);
			fclose($fp);
			$params = array(
						  'innovation_plan_id' =>$id,
						  'document_file_type' => 'video',
						  'file_picture' => $filePath,
						  'description' => '',
						  'created_at' =>$created_at,
						  'updated_at' =>$updated_at,
										);
			if($documents_id>0){
				unset($params['created_at']);
			  }if($documents_id<=0){
				unset($params['updated_at']);
			  } 					
			if($documents_id>0){							
				$this->Documents_model->update_documents($documents_id,$params);
			}else{
				$documents_id = $this->Documents_model->add_documents($params);	
			}
			
			unset($_SESSION['file_video_tmp_name']);
		}
		
		//upload docx
		if(isset($_SESSION['file_docx_tmp_name'])){
			
			$this->db->order_by('id', 'desc');
			$this->db->where('innovation_plan_id', $id);
			$this->db->where('document_file_type', 'docx');
			$resdocuments = $this->db->get('documents')->result_array();
			$db_error = $this->db->error();
			if (!empty($db_error['code'])){
				echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
				exit;
			}
			$documents_id = isset($resdocuments[0]['id'])?$resdocuments[0]['id']:0;
			
			$_SESSION['file_docx_tmp_name'] = base64_decode($_SESSION['file_docx_tmp_name']);
			$filePath="uploads/images/documents/".time() . str_replace(" ", "_",$_SESSION['file_docx_name']);
			$fp=fopen("./public/".$filePath,"w");
			fwrite($fp,$_SESSION['file_docx_tmp_name']);
			fclose($fp);
			$params = array(
						 'innovation_plan_id' =>$id,
						  'document_file_type' => 'docx',
						  'file_picture' => $filePath,
						  'description' => '',
						  'created_at' =>$created_at,
						  'updated_at' =>$updated_at,
										);
			if($documents_id>0){
				unset($params['created_at']);
			  }if($documents_id<=0){
				unset($params['updated_at']);
			  } 					
			if($documents_id>0){							
				$this->Documents_model->update_documents($documents_id,$params);
			}else{
				$documents_id = $this->Documents_model->add_documents($params);	
			}
			unset($_SESSION['file_docx_tmp_name']);
		}
		
		
		//upload pdf
		if(isset($_SESSION['file_pdf_tmp_name'])){
			
			$this->db->order_by('id', 'desc');
			$this->db->where('innovation_plan_id', $id);
			$this->db->where('document_file_type', 'pdf');
			$resdocuments = $this->db->get('documents')->result_array();
			$db_error = $this->db->error();
			if (!empty($db_error['code'])){
				echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
				exit;
			}
			$documents_id = isset($resdocuments[0]['id'])?$resdocuments[0]['id']:0;
			
			$_SESSION['file_pdf_tmp_name'] = base64_decode($_SESSION['file_pdf_tmp_name']);
			$filePath="uploads/images/documents/".time() . str_replace(" ", "_",$_SESSION['file_pdf_name']);
			$fp=fopen("./public/".$filePath,"w");
			fwrite($fp,$_SESSION['file_pdf_tmp_name']);
			fclose($fp);
			$params = array(
						 'innovation_plan_id' =>$id,
						  'document_file_type' => 'pdf',
						  'file_picture' => $filePath,
						  'description' => '',
						  'created_at' =>$created_at,
						  'updated_at' =>$updated_at,
										);
			if($documents_id>0){
				unset($params['created_at']);
			  }if($documents_id<=0){
				unset($params['updated_at']);
			  } 					
			if($documents_id>0){							
				$this->Documents_model->update_documents($documents_id,$params);
			}else{
				$documents_id = $this->Documents_model->add_documents($params);	
			}
			
			unset($_SESSION['file_pdf_tmp_name']);
		}
		
		
		if($innovation_plan_id>0){
		  $arr[0]['status'] = "success";	
		  $arr[0]['msg'] = "Innovation plan has been saved successfully";
		}else if($id>0){
		  $arr[0]['status'] = "success";	
		  $arr[0]['msg'] = "Innovation plan has been updated successfully";
		}
		
		echo json_encode($arr);
	}
	
	
	function upload_file(){
	    require(dirname(__FILE__) . '/../../../public/Simple-Ajax-Uploader/code/Uploader.php');
		 
		if($this->check_file_extension($_FILES)==false)
		{
		  exit(json_encode(array('success' => false, 'msg' =>'Error:  .'.$_SESSION['extension'].' is not a supported file'))); 
		}
		
		if(isset($_FILES['file_picture']['name']) && $_FILES['file_picture']['size']>0)
		{
			$_SESSION['file_picture_tmp_name'] = base64_encode(file_get_contents($_FILES['file_picture']['tmp_name']));
			$_SESSION['file_picture_name']     = $_FILES['file_picture']['name'];
		   echo json_encode(array('success' => true)); 	
		   exit;
		}
		
		if(isset($_FILES['file_video']['name']) && $_FILES['file_video']['size']>0)
		{
			$_SESSION['file_video_tmp_name'] = base64_encode(file_get_contents($_FILES['file_video']['tmp_name']));
			$_SESSION['file_video_name']     = $_FILES['file_video']['name'];
		   echo json_encode(array('success' => true)); 	
		   exit;
		}
		
		if(isset($_FILES['file_docx']['name']) && $_FILES['file_docx']['size']>0)
		{
			$_SESSION['file_docx_tmp_name'] = base64_encode(file_get_contents($_FILES['file_docx']['tmp_name']));
			$_SESSION['file_docx_name']     = $_FILES['file_docx']['name'];
		   echo json_encode(array('success' => true)); 	
		   exit;
		}
		
		if(isset($_FILES['file_pdf']['name']) && $_FILES['file_pdf']['size']>0)
		{
			$_SESSION['file_pdf_tmp_name'] = base64_encode(file_get_contents($_FILES['file_pdf']['tmp_name']));
			$_SESSION['file_pdf_name']     = $_FILES['file_pdf']['name'];
		   echo json_encode(array('success' => true)); 	
		   exit;
		}
		 
		// echo json_encode(array('success' => true));
	}
	
	function check_file_extension($_files)
		{
		  foreach($_files as $key=>$name)
		  {
			 if(strlen($_files[$key]['name'])>0 && $_files[$key]['size']>0)
			 {
					 unset($arr);			
					 $arr = explode(".",$_files[$key]['name']);			
					 $extension = strtolower($arr[count($arr)-1]);			
					 if(!( $extension == "pdf" || $extension == "docx" ||  $extension == "doc" || $extension == "png"  || $extension == "jpg" || $extension == "jpeg"))
					 {
						 $_SESSION['extension'] = $extension;
						// echo '<font color="red"><h3>Error:'.$extension .' is not supported file</h3></font>';
						 return false;
					 }
			 }
			// echo $arr[count($arr)-1];
		  } 
		  return true;
		}
	
	function final_submit(){
		
			$created_at = "";
			$updated_at = "";
			
			$created_at = date("Y-m-d H:i:s");			
			$updated_at = date("Y-m-d H:i:s");
			
			
			$id = $this->input->post('id');
														 

		$params = array(
				'powner_users_id' => get_user_owner() ,
				'financial_year_id' => $this->session->userdata('financial_year_id'),
				'department_id' => $this->session->userdata('department_id'),
				//'allow_last_date' => html_escape($this->input->post('allow_last_date')),
				'submit_status' => 'yes',
				//'resubmit_status' => html_escape($this->input->post('resubmit_status')),
				'created_at' =>$created_at,
				'updated_at' =>$updated_at,
				
				);
		 
		 if($id>0){
			unset($params['created_at']);
			$params['resubmit_status'] = 'pending';
		  }
		  if($id<=0){
			unset($params['updated_at']);
		  } 
		  
		
		$data['id'] = $id;
		//update		
        if(isset($id) && $id>0){
			$data['final_submit_permission'] = $this->Final_submit_permission_model->get_final_submit_permission($id);
            if(isset($_POST) && count($_POST) > 0){   
                $this->Final_submit_permission_model->update_final_submit_permission($id,$params);
				$this->session->set_flashdata('msg','Final submit has been updated successfully');
              
            }
        } //save
		else{
			if(isset($_POST) && count($_POST) > 0){   
			 
                $final_submit_permission_id = $this->Final_submit_permission_model->add_final_submit_permission($params);
				$this->session->set_flashdata('msg','Final submit has been saved successfully');
	           
			}
		} 
		
		redirect('member/innovation_plan/index');
	}
	/**
     * Search innovation_plan
	 * @param $start - Starting of innovation_plan table's index to get query
     */
	function search($start=0){
		if(!empty($this->input->post('key'))){
			$key =$this->input->post('key');
			$_SESSION['key'] = $key;
		}else{
			$key = $_SESSION['key'];
		}
		
		$limit = 10;		
		$this->db->like('id', $key, 'both');
		$this->db->or_like('users_id', $key, 'both');
		$this->db->or_like('department_id', $key, 'both');
		$this->db->or_like('predefined_objectives_id', $key, 'both');
		$this->db->or_like('predefined_activities_id', $key, 'both');
		$this->db->or_like('predefined_innovation_plan_id', $key, 'both');
		$this->db->or_like('performance_indicators', $key, 'both');
		$this->db->or_like('weight_of_plan', $key, 'both');
		$this->db->or_like('half_yearly_evaluation', $key, 'both');
		$this->db->or_like('half_yearly_evaluation_date', $key, 'both');
		$this->db->or_like('half_yearly_evaluation_comments', $key, 'both');
		$this->db->or_like('yearly_evaluation', $key, 'both');
		$this->db->or_like('yearly_evaluation_date', $key, 'both');
		$this->db->or_like('yearly_evaluation_comments', $key, 'both');
		$this->db->or_like('final_evaluation', $key, 'both');
		$this->db->or_like('final_evaluation_date', $key, 'both');
		$this->db->or_like('final_evaluation_comments', $key, 'both');
		$this->db->or_like('submission', $key, 'both');
		$this->db->or_like('submitted_date', $key, 'both');
		$this->db->or_like('completed_date', $key, 'both');
		$this->db->or_like('created_at', $key, 'both');
		$this->db->or_like('updated_at', $key, 'both');


		$this->db->order_by('id', 'desc');
		
        $this->db->limit($limit,$start);
        $data['innovation_plan'] = $this->db->get('innovation_plan')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		
		//pagination
		$config['base_url'] = site_url('admin/innovation_plan/search');
		$this->db->reset_query();		
		$this->db->like('id', $key, 'both');
		$this->db->or_like('users_id', $key, 'both');
		$this->db->or_like('department_id', $key, 'both');
		$this->db->or_like('predefined_objectives_id', $key, 'both');
		$this->db->or_like('predefined_activities_id', $key, 'both');
		$this->db->or_like('predefined_innovation_plan_id', $key, 'both');
		$this->db->or_like('performance_indicators', $key, 'both');
		$this->db->or_like('weight_of_plan', $key, 'both');
		$this->db->or_like('half_yearly_evaluation', $key, 'both');
		$this->db->or_like('half_yearly_evaluation_date', $key, 'both');
		$this->db->or_like('half_yearly_evaluation_comments', $key, 'both');
		$this->db->or_like('yearly_evaluation', $key, 'both');
		$this->db->or_like('yearly_evaluation_date', $key, 'both');
		$this->db->or_like('yearly_evaluation_comments', $key, 'both');
		$this->db->or_like('final_evaluation', $key, 'both');
		$this->db->or_like('final_evaluation_date', $key, 'both');
		$this->db->or_like('final_evaluation_comments', $key, 'both');
		$this->db->or_like('submission', $key, 'both');
		$this->db->or_like('submitted_date', $key, 'both');
		$this->db->or_like('completed_date', $key, 'both');
		$this->db->or_like('created_at', $key, 'both');
		$this->db->or_like('updated_at', $key, 'both');

		$config['total_rows'] = $this->db->from("innovation_plan")->count_all_results();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		$config['per_page'] = 10;
		// Bootstrap 4 Pagination fix
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tag_close']   = '<span aria-hidden="true"></span></span></li>';
		$config['next_tag_close']   = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tag_close']   = '</span></li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tag_close']  = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tag_close']   = '</span></li>';
		$this->pagination->initialize($config);
        $data['link'] =$this->pagination->create_links();
		
		$data['key'] = $key;
		$data['_view'] = 'admin/innovation_plan/index';
        $this->load->view('layouts/admin/body',$data);
	}
	
    /**
     * Export innovation_plan
	 * @param $export_type - CSV or PDF type 
     */
	function export($export_type='CSV'){
	  if($export_type=='CSV'){	
		   // file name 
		   $filename = 'innovation_plan_'.date('Ymd').'.csv'; 
		   header("Content-Description: File Transfer"); 
		   header("Content-Disposition: attachment; filename=$filename"); 
		   header("Content-Type: application/csv; ");
		   // get data 
		   $this->db->order_by('id', 'desc');
		   $innovation_planData = $this->Innovation_plan_model->get_all_innovation_plan();
		   // file creation 
		   $file = fopen('php://output', 'w');
		   $header = array("Id","Users Id","Department Id","Predefined Objectives Id","Predefined Activities Id","Predefined Innovation Plan Id","Performance Indicators","Weight Of Plan","Half Yearly Evaluation","Half Yearly Evaluation Date","Half Yearly Evaluation Comments","Yearly Evaluation","Yearly Evaluation Date","Yearly Evaluation Comments","Final Evaluation","Final Evaluation Date","Final Evaluation Comments","Submission","Submitted Date","Completed Date","Created At","Updated At"); 
		   fputcsv($file, $header);
		   foreach ($innovation_planData as $key=>$line){ 
			 fputcsv($file,$line); 
		   }
		   fclose($file); 
		   exit; 
	  }else if($export_type=='Pdf'){
		    $this->db->order_by('id', 'desc');
		    $innovation_plan = $this->db->get('innovation_plan')->result_array();
		   // get the HTML
			ob_start();
			include(APPPATH.'views/admin/innovation_plan/print_template.php');
			$html = ob_get_clean();
			require_once FCPATH.'vendor/autoload.php';			
			$mpdf = new \Mpdf\Mpdf();
			$mpdf->WriteHTML($html);
			$mpdf->Output();
			exit;
	  }
	   
	}
}
//End of Innovation_plan controller