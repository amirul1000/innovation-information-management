<?php

 /**
 * Author: Amirul Momenin
 * Desc:Users_evaluation_department Controller
 *
 */
class Users_evaluation_department extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper('url'); 
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('Customlib');
		$this->load->helper(array('cookie', 'url','utility')); 
		$this->load->database();  
		$this->load->model('Users_evaluation_department_model');
		if(! $this->session->userdata('validated')){
				redirect('admin/login/index');
		}  
    } 
	
    /**
	 * Index Page for this controller.
	 *@param $start - Starting of users_evaluation_department table's index to get query
	 *
	 */
    function index($start=0){
		$limit = 10;
        $data['users_evaluation_department'] = $this->Users_evaluation_department_model->get_limit_users_evaluation_department($limit,$start);
		//pagination
		$config['base_url'] = site_url('admin/users_evaluation_department/index');
		$config['total_rows'] = $this->Users_evaluation_department_model->get_count_users_evaluation_department();
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
		
        $data['_view'] = 'admin/users_evaluation_department/index';
        $this->load->view('layouts/admin/body',$data);
    }
	
	 /**
     * Save users_evaluation_department
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
			$data['users_evaluation_department'] = $this->Users_evaluation_department_model->get_users_evaluation_department($id);
            if(isset($_POST) && count($_POST) > 0){   
                $this->Users_evaluation_department_model->update_users_evaluation_department($id,$params);
				$this->session->set_flashdata('msg','Users_evaluation_department has been updated successfully');
                redirect('admin/users_evaluation_department/index');
            }else{
                $data['_view'] = 'admin/users_evaluation_department/form';
                $this->load->view('layouts/admin/body',$data);
            }
        } //save
		else{
			if(isset($_POST) && count($_POST) > 0){   
                $users_evaluation_department_id = $this->Users_evaluation_department_model->add_users_evaluation_department($params);
				$this->session->set_flashdata('msg','Users_evaluation_department has been saved successfully');
                redirect('admin/users_evaluation_department/index');
            }else{  
			    $data['users_evaluation_department'] = $this->Users_evaluation_department_model->get_users_evaluation_department(0);
                $data['_view'] = 'admin/users_evaluation_department/form';
                $this->load->view('layouts/admin/body',$data);
            }
		}
        
    } 
	
	/**
     * Details users_evaluation_department
	 * @param $id - primary key to get record
	 *
     */
	function details($id){
        $data['users_evaluation_department'] = $this->Users_evaluation_department_model->get_users_evaluation_department($id);
		$data['id'] = $id;
        $data['_view'] = 'admin/users_evaluation_department/details';
        $this->load->view('layouts/admin/body',$data);
	}
	
    /**
     * Deleting users_evaluation_department
	 * @param $id - primary key to delete record
	 *
     */
    function remove($id){
        $users_evaluation_department = $this->Users_evaluation_department_model->get_users_evaluation_department($id);

        // check if the users_evaluation_department exists before trying to delete it
        if(isset($users_evaluation_department['id'])){
            $this->Users_evaluation_department_model->delete_users_evaluation_department($id);
			$this->session->set_flashdata('msg','Users_evaluation_department has been deleted successfully');
            redirect('admin/users_evaluation_department/index');
        }
        else
            show_error('The users_evaluation_department you are trying to delete does not exist.');
    }
	
	/**
     * Search users_evaluation_department
	 * @param $start - Starting of users_evaluation_department table's index to get query
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
$this->db->or_like('created_at', $key, 'both');
$this->db->or_like('updated_at', $key, 'both');


		$this->db->order_by('id', 'desc');
		
        $this->db->limit($limit,$start);
        $data['users_evaluation_department'] = $this->db->get('users_evaluation_department')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		
		//pagination
		$config['base_url'] = site_url('admin/users_evaluation_department/search');
		$this->db->reset_query();		
		$this->db->like('id', $key, 'both');
$this->db->or_like('users_id', $key, 'both');
$this->db->or_like('department_id', $key, 'both');
$this->db->or_like('created_at', $key, 'both');
$this->db->or_like('updated_at', $key, 'both');

		$config['total_rows'] = $this->db->from("users_evaluation_department")->count_all_results();
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
		$data['_view'] = 'admin/users_evaluation_department/index';
        $this->load->view('layouts/admin/body',$data);
	}
	
    /**
     * Export users_evaluation_department
	 * @param $export_type - CSV or PDF type 
     */
	function export($export_type='CSV'){
	  if($export_type=='CSV'){	
		   // file name 
		   $filename = 'users_evaluation_department_'.date('Ymd').'.csv'; 
		   header("Content-Description: File Transfer"); 
		   header("Content-Disposition: attachment; filename=$filename"); 
		   header("Content-Type: application/csv; ");
		   // get data 
		   $this->db->order_by('id', 'desc');
		   $users_evaluation_departmentData = $this->Users_evaluation_department_model->get_all_users_evaluation_department();
		   // file creation 
		   $file = fopen('php://output', 'w');
		   $header = array("Id","Users Id","Department Id","Created At","Updated At"); 
		   fputcsv($file, $header);
		   foreach ($users_evaluation_departmentData as $key=>$line){ 
			 fputcsv($file,$line); 
		   }
		   fclose($file); 
		   exit; 
	  }else if($export_type=='Pdf'){
		    $this->db->order_by('id', 'desc');
		    $users_evaluation_department = $this->db->get('users_evaluation_department')->result_array();
		   // get the HTML
			ob_start();
			include(APPPATH.'views/admin/users_evaluation_department/print_template.php');
			$html = ob_get_clean();
			require_once FCPATH.'vendor/autoload.php';			
			$mpdf = new \Mpdf\Mpdf();
			$mpdf->WriteHTML($html);
			$mpdf->Output();
			exit;
	  }
	   
	}
}
//End of Users_evaluation_department controller