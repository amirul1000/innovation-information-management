<?php

 /**
 * Author: Amirul Momenin
 * Desc:Predefined_objectives Controller
 *
 */
class Predefined_objectives extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper('url'); 
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('Customlib');
		$this->load->helper(array('cookie', 'url')); 
		$this->load->database();  
		$this->load->model('Predefined_objectives_model');
		if(! $this->session->userdata('validated')){
				redirect('admin/login/index');
		}  
    } 
	
    /**
	 * Index Page for this controller.
	 *@param $start - Starting of predefined_objectives table's index to get query
	 *
	 */
    function index($start=0){
		$limit = 10;
        $data['predefined_objectives'] = $this->Predefined_objectives_model->get_limit_predefined_objectives($limit,$start);
		//pagination
		$config['base_url'] = site_url('admin/predefined_objectives/index');
		$config['total_rows'] = $this->Predefined_objectives_model->get_count_predefined_objectives();
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
		
        $data['_view'] = 'admin/predefined_objectives/index';
        $this->load->view('layouts/admin/body',$data);
    }
	
	 /**
     * Save predefined_objectives
	 *@param $id - primary key to update
	 *
     */
    function save($id=-1){   
		 
		
		
		$params = array(
					 'financial_year_id' => html_escape($this->input->post('financial_year_id')),
'sl_no' => html_escape($this->input->post('sl_no')),
'objectives_name' => html_escape($this->input->post('objectives_name')),
'weight_of_objectives' => html_escape($this->input->post('weight_of_objectives')),

				);
		 
		 
		$data['id'] = $id;
		//update		
        if(isset($id) && $id>0){
			$data['predefined_objectives'] = $this->Predefined_objectives_model->get_predefined_objectives($id);
            if(isset($_POST) && count($_POST) > 0){   
                $this->Predefined_objectives_model->update_predefined_objectives($id,$params);
				$this->session->set_flashdata('msg','Predefined_objectives has been updated successfully');
                redirect('admin/predefined_objectives/index');
            }else{
                $data['_view'] = 'admin/predefined_objectives/form';
                $this->load->view('layouts/admin/body',$data);
            }
        } //save
		else{
			if(isset($_POST) && count($_POST) > 0){   
                $predefined_objectives_id = $this->Predefined_objectives_model->add_predefined_objectives($params);
				$this->session->set_flashdata('msg','Predefined_objectives has been saved successfully');
                redirect('admin/predefined_objectives/index');
            }else{  
			    $data['predefined_objectives'] = $this->Predefined_objectives_model->get_predefined_objectives(0);
                $data['_view'] = 'admin/predefined_objectives/form';
                $this->load->view('layouts/admin/body',$data);
            }
		}
        
    } 
	
	/**
     * Details predefined_objectives
	 * @param $id - primary key to get record
	 *
     */
	function details($id){
        $data['predefined_objectives'] = $this->Predefined_objectives_model->get_predefined_objectives($id);
		$data['id'] = $id;
        $data['_view'] = 'admin/predefined_objectives/details';
        $this->load->view('layouts/admin/body',$data);
	}
	
    /**
     * Deleting predefined_objectives
	 * @param $id - primary key to delete record
	 *
     */
    function remove($id){
        $predefined_objectives = $this->Predefined_objectives_model->get_predefined_objectives($id);

        // check if the predefined_objectives exists before trying to delete it
        if(isset($predefined_objectives['id'])){
            $this->Predefined_objectives_model->delete_predefined_objectives($id);
			$this->session->set_flashdata('msg','Predefined_objectives has been deleted successfully');
            redirect('admin/predefined_objectives/index');
        }
        else
            show_error('The predefined_objectives you are trying to delete does not exist.');
    }
	
	/**
     * Search predefined_objectives
	 * @param $start - Starting of predefined_objectives table's index to get query
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
$this->db->or_like('financial_year_id', $key, 'both');
$this->db->or_like('sl_no', $key, 'both');
$this->db->or_like('objectives_name', $key, 'both');
$this->db->or_like('weight_of_objectives', $key, 'both');


		$this->db->order_by('id', 'desc');
		
        $this->db->limit($limit,$start);
        $data['predefined_objectives'] = $this->db->get('predefined_objectives')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		
		//pagination
		$config['base_url'] = site_url('admin/predefined_objectives/search');
		$this->db->reset_query();		
		$this->db->like('id', $key, 'both');
$this->db->or_like('financial_year_id', $key, 'both');
$this->db->or_like('sl_no', $key, 'both');
$this->db->or_like('objectives_name', $key, 'both');
$this->db->or_like('weight_of_objectives', $key, 'both');

		$config['total_rows'] = $this->db->from("predefined_objectives")->count_all_results();
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
		$data['_view'] = 'admin/predefined_objectives/index';
        $this->load->view('layouts/admin/body',$data);
	}
	
    /**
     * Export predefined_objectives
	 * @param $export_type - CSV or PDF type 
     */
	function export($export_type='CSV'){
	  if($export_type=='CSV'){	
		   // file name 
		   $filename = 'predefined_objectives_'.date('Ymd').'.csv'; 
		   header("Content-Description: File Transfer"); 
		   header("Content-Disposition: attachment; filename=$filename"); 
		   header("Content-Type: application/csv; ");
		   // get data 
		   $this->db->order_by('id', 'desc');
		   $predefined_objectivesData = $this->Predefined_objectives_model->get_all_predefined_objectives();
		   // file creation 
		   $file = fopen('php://output', 'w');
		   $header = array("Id","Financial Year Id","Sl No","Objectives Name","Weight Of Objectives"); 
		   fputcsv($file, $header);
		   foreach ($predefined_objectivesData as $key=>$line){ 
			 fputcsv($file,$line); 
		   }
		   fclose($file); 
		   exit; 
	  }else if($export_type=='Pdf'){
		    $this->db->order_by('id', 'desc');
		    $predefined_objectives = $this->db->get('predefined_objectives')->result_array();
		   // get the HTML
			ob_start();
			include(APPPATH.'views/admin/predefined_objectives/print_template.php');
			$html = ob_get_clean();
			require_once FCPATH.'vendor/autoload.php';			
			$mpdf = new \Mpdf\Mpdf();
			$mpdf->WriteHTML($html);
			$mpdf->Output();
			exit;
	  }
	   
	}
}
//End of Predefined_objectives controller