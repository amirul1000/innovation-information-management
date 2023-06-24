<?php

 /**
 * Author: Amirul Momenin
 * Desc:Department Controller
 *
 */
class Department extends CI_Controller{
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
		if(! $this->session->userdata('validated')){
				redirect('member/login/index');
		}  
		
		//print_r($_SESSION);
    } 
	
    /**
	 * Index Page for this controller.
	 *@param $start - Starting of department table's index to get query
	 *
	 */
    function index($start=0){
		$limit = 10;
        $data['department'] = $this->Department_model->get_limit_users_department($limit,$start);
		//pagination
		$config['base_url'] = site_url('member/department/index');
		$config['total_rows'] = $this->Department_model->get_count_users_department();
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
        $data['link'] =$this->pagination->create_links();
		
        $data['_view'] = 'member/department/index';
        $this->load->view('layouts/member/body',$data);
    }
	
	 /**
     * Save department
	 *@param $id - primary key to update
	 *
     */
    function save($id=-1){   
		 
		
		
		$params = array(
		             'downer_users_id'=>$this->session->userdata('id'),
					 'department' => html_escape($this->input->post('department')),
'description' => html_escape($this->input->post('description')),

				);
		 
		 
		$data['id'] = $id;
		//update		
        if(isset($id) && $id>0){
			$data['department'] = $this->Department_model->get_department($id);
            if(isset($_POST) && count($_POST) > 0){   
                $this->Department_model->update_department($id,$params);
				$this->session->set_flashdata('msg','Department has been updated successfully');
                redirect('member/department/index');
            }else{
                $data['_view'] = 'member/department/form';
                $this->load->view('layouts/member/body',$data);
            }
        } //save
		else{
			if(isset($_POST) && count($_POST) > 0){   
                $department_id = $this->Department_model->add_department($params);
				$this->session->set_flashdata('msg','Department has been saved successfully');
                redirect('member/department/index');
            }else{  
			    $data['department'] = $this->Department_model->get_department(0);
                $data['_view'] = 'member/department/form';
                $this->load->view('layouts/member/body',$data);
            }
		}
        
    } 
	
	/**
     * Details department
	 * @param $id - primary key to get record
	 *
     */
	function details($id){
        $data['department'] = $this->Department_model->get_department($id);
		$data['id'] = $id;
        $data['_view'] = 'member/department/details';
        $this->load->view('layouts/member/body',$data);
	}
	
    /**
     * Deleting department
	 * @param $id - primary key to delete record
	 *
     */
    function remove($id){
        $department = $this->Department_model->get_department($id);

        // check if the department exists before trying to delete it
        if(isset($department['id'])){
            $this->Department_model->delete_department($id);
			$this->session->set_flashdata('msg','Department has been deleted successfully');
            redirect('member/department/index');
        }
        else
            show_error('The department you are trying to delete does not exist.');
    }
	
	/**
     * Search department
	 * @param $start - Starting of department table's index to get query
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
$this->db->or_like('department', $key, 'both');
$this->db->or_like('description', $key, 'both');


		$this->db->order_by('id', 'desc');
		
        $this->db->limit($limit,$start);
        $data['department'] = $this->db->get('department')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		
		//pagination
		$config['base_url'] = site_url('member/department/search');
		$this->db->reset_query();		
		$this->db->like('id', $key, 'both');
$this->db->or_like('department', $key, 'both');
$this->db->or_like('description', $key, 'both');

		$config['total_rows'] = $this->db->from("department")->count_all_results();
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
		$data['_view'] = 'member/department/index';
        $this->load->view('layouts/member/body',$data);
	}
	
    /**
     * Export department
	 * @param $export_type - CSV or PDF type 
     */
	function export($export_type='CSV'){
	  if($export_type=='CSV'){	
		   // file name 
		   $filename = 'department_'.date('Ymd').'.csv'; 
		   header("Content-Description: File Transfer"); 
		   header("Content-Disposition: attachment; filename=$filename"); 
		   header("Content-Type: application/csv; ");
		   // get data 
		   $this->db->order_by('id', 'desc');
		   $departmentData = $this->Department_model->get_all_department();
		   // file creation 
		   $file = fopen('php://output', 'w');
		   $header = array("Id","Department","Description"); 
		   fputcsv($file, $header);
		   foreach ($departmentData as $key=>$line){ 
			 fputcsv($file,$line); 
		   }
		   fclose($file); 
		   exit; 
	  }else if($export_type=='Pdf'){
		    $this->db->order_by('id', 'desc');
		    $department = $this->db->get('department')->result_array();
		   // get the HTML
			ob_start();
			include(APPPATH.'views/member/department/print_template.php');
			$html = ob_get_clean();
			require_once FCPATH.'vendor/autoload.php';			
			$mpdf = new \Mpdf\Mpdf();
			$mpdf->WriteHTML($html);
			$mpdf->Output();
			exit;
	  }
	   
	}
}
//End of Department controller