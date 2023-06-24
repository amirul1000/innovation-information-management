<?php

 /**
 * Author: Amirul Momenin
 * Desc:Final_submit_permission Controller
 *
 */
class Final_submit_permission extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper('url'); 
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('Customlib');
		$this->load->helper(array('cookie', 'url','utility')); 
		$this->load->database();  
		$this->load->model('Final_submit_permission_model');
		if(! $this->session->userdata('validated')){
				redirect('member/login/index');
		}  
    } 
	
    /**
	 * Index Page for this controller.
	 *@param $start - Starting of final_submit_permission table's index to get query
	 *
	 */
    function index($start=0){
		$limit = 10;
        $data['final_submit_permission'] = $this->Final_submit_permission_model->get_limit_users_final_submit_permission($limit,$start);
		//pagination
		$config['base_url'] = site_url('member/final_submit_permission/index');
		$config['total_rows'] = $this->Final_submit_permission_model->get_count_users_final_submit_permission();
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
		
        $data['_view'] = 'member/final_submit_permission/index';
        $this->load->view('layouts/member/body',$data);
    }
	
	 /**
     * Save final_submit_permission
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
					 'powner_users_id' => html_escape($this->input->post('powner_users_id')),
'financial_year_id' => html_escape($this->input->post('financial_year_id')),
'department_id' => html_escape($this->input->post('department_id')),
'allow_last_date' => html_escape($this->input->post('allow_last_date')),
'submit_status' => html_escape($this->input->post('submit_status')),
'resubmit_status' => html_escape($this->input->post('resubmit_status')),
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
			$data['final_submit_permission'] = $this->Final_submit_permission_model->get_final_submit_permission($id);
            if(isset($_POST) && count($_POST) > 0){   
                $this->Final_submit_permission_model->update_final_submit_permission($id,$params);
				$this->session->set_flashdata('msg','Final_submit_permission has been updated successfully');
                redirect('member/final_submit_permission/index');
            }else{
                $data['_view'] = 'member/final_submit_permission/form';
                $this->load->view('layouts/member/body',$data);
            }
        } //save
		else{
			if(isset($_POST) && count($_POST) > 0){   
                $final_submit_permission_id = $this->Final_submit_permission_model->add_final_submit_permission($params);
				$this->session->set_flashdata('msg','Final_submit_permission has been saved successfully');
                redirect('member/final_submit_permission/index');
            }else{  
			    $data['final_submit_permission'] = $this->Final_submit_permission_model->get_final_submit_permission(0);
                $data['_view'] = 'member/final_submit_permission/form';
                $this->load->view('layouts/member/body',$data);
            }
		}
        
    } 
	
	/**
     * Details final_submit_permission
	 * @param $id - primary key to get record
	 *
     */
	function details($id){
        $data['final_submit_permission'] = $this->Final_submit_permission_model->get_final_submit_permission($id);
		$data['id'] = $id;
        $data['_view'] = 'member/final_submit_permission/details';
        $this->load->view('layouts/member/body',$data);
	}
	
    /**
     * Deleting final_submit_permission
	 * @param $id - primary key to delete record
	 *
     */
    function remove($id){
        $final_submit_permission = $this->Final_submit_permission_model->get_final_submit_permission($id);

        // check if the final_submit_permission exists before trying to delete it
        if(isset($final_submit_permission['id'])){
            $this->Final_submit_permission_model->delete_final_submit_permission($id);
			$this->session->set_flashdata('msg','Final_submit_permission has been deleted successfully');
            redirect('member/final_submit_permission/index');
        }
        else
            show_error('The final_submit_permission you are trying to delete does not exist.');
    }
	
	/**
     * Search final_submit_permission
	 * @param $start - Starting of final_submit_permission table's index to get query
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
$this->db->or_like('powner_users_id', $key, 'both');
$this->db->or_like('financial_year_id', $key, 'both');
$this->db->or_like('department_id', $key, 'both');
$this->db->or_like('allow_last_date', $key, 'both');
$this->db->or_like('submit_status', $key, 'both');
$this->db->or_like('resubmit_status', $key, 'both');
$this->db->or_like('created_at', $key, 'both');
$this->db->or_like('updated_at', $key, 'both');


		$this->db->order_by('id', 'desc');
		
        $this->db->limit($limit,$start);
        $data['final_submit_permission'] = $this->db->get('final_submit_permission')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		
		//pagination
		$config['base_url'] = site_url('member/final_submit_permission/search');
		$this->db->reset_query();		
		$this->db->like('id', $key, 'both');
$this->db->or_like('powner_users_id', $key, 'both');
$this->db->or_like('financial_year_id', $key, 'both');
$this->db->or_like('department_id', $key, 'both');
$this->db->or_like('allow_last_date', $key, 'both');
$this->db->or_like('submit_status', $key, 'both');
$this->db->or_like('resubmit_status', $key, 'both');
$this->db->or_like('created_at', $key, 'both');
$this->db->or_like('updated_at', $key, 'both');

		$config['total_rows'] = $this->db->from("final_submit_permission")->count_all_results();
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
		$data['_view'] = 'member/final_submit_permission/index';
        $this->load->view('layouts/member/body',$data);
	}
	
    /**
     * Export final_submit_permission
	 * @param $export_type - CSV or PDF type 
     */
	function export($export_type='CSV'){
	  if($export_type=='CSV'){	
		   // file name 
		   $filename = 'final_submit_permission_'.date('Ymd').'.csv'; 
		   header("Content-Description: File Transfer"); 
		   header("Content-Disposition: attachment; filename=$filename"); 
		   header("Content-Type: application/csv; ");
		   // get data 
		   $this->db->order_by('id', 'desc');
		   $final_submit_permissionData = $this->Final_submit_permission_model->get_all_final_submit_permission();
		   // file creation 
		   $file = fopen('php://output', 'w');
		   $header = array("Id","Powner Users Id","Financial Year Id","Department Id","Allow Last Date","Submit Status","Resubmit Status","Created At","Updated At"); 
		   fputcsv($file, $header);
		   foreach ($final_submit_permissionData as $key=>$line){ 
			 fputcsv($file,$line); 
		   }
		   fclose($file); 
		   exit; 
	  }else if($export_type=='Pdf'){
		    $this->db->order_by('id', 'desc');
		    $final_submit_permission = $this->db->get('final_submit_permission')->result_array();
		   // get the HTML
			ob_start();
			include(APPPATH.'views/member/final_submit_permission/print_template.php');
			$html = ob_get_clean();
			require_once FCPATH.'vendor/autoload.php';			
			$mpdf = new \Mpdf\Mpdf();
			$mpdf->WriteHTML($html);
			$mpdf->Output();
			exit;
	  }
	   
	}
}
//End of Final_submit_permission controller