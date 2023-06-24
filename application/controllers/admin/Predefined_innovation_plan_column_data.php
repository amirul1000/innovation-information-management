<?php

 /**
 * Author: Amirul Momenin
 * Desc:Predefined_innovation_plan_column_data Controller
 *
 */
class Predefined_innovation_plan_column_data extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper('url'); 
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('Customlib');
		$this->load->helper(array('cookie', 'url')); 
		$this->load->database();  
		$this->load->model('Predefined_innovation_plan_column_data_model');
		if(! $this->session->userdata('validated')){
				redirect('admin/login/index');
		}  
    } 
	
    /**
	 * Index Page for this controller.
	 *@param $start - Starting of predefined_innovation_plan_column_data table's index to get query
	 *
	 */
    function index($start=0){
		$limit = 10;
        $data['predefined_innovation_plan_column_data'] = $this->Predefined_innovation_plan_column_data_model->get_limit_predefined_innovation_plan_column_data($limit,$start);
		//pagination
		$config['base_url'] = site_url('admin/predefined_innovation_plan_column_data/index');
		$config['total_rows'] = $this->Predefined_innovation_plan_column_data_model->get_count_predefined_innovation_plan_column_data();
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
		
        $data['_view'] = 'admin/predefined_innovation_plan_column_data/index';
        $this->load->view('layouts/admin/body',$data);
    }
	
	 /**
     * Save predefined_innovation_plan_column_data
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
					 'predefined_objectives_column_id' => html_escape($this->input->post('predefined_objectives_column_id')),
'predefined_innovation_plan_id' => html_escape($this->input->post('predefined_innovation_plan_id')),
'column_data' => html_escape($this->input->post('column_data')),
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
			$data['predefined_innovation_plan_column_data'] = $this->Predefined_innovation_plan_column_data_model->get_predefined_innovation_plan_column_data($id);
            if(isset($_POST) && count($_POST) > 0){   
                $this->Predefined_innovation_plan_column_data_model->update_predefined_innovation_plan_column_data($id,$params);
				$this->session->set_flashdata('msg','Predefined_innovation_plan_column_data has been updated successfully');
                redirect('admin/predefined_innovation_plan_column_data/index');
            }else{
                $data['_view'] = 'admin/predefined_innovation_plan_column_data/form';
                $this->load->view('layouts/admin/body',$data);
            }
        } //save
		else{
			if(isset($_POST) && count($_POST) > 0){   
                $predefined_innovation_plan_column_data_id = $this->Predefined_innovation_plan_column_data_model->add_predefined_innovation_plan_column_data($params);
				$this->session->set_flashdata('msg','Predefined_innovation_plan_column_data has been saved successfully');
                redirect('admin/predefined_innovation_plan_column_data/index');
            }else{  
			    $data['predefined_innovation_plan_column_data'] = $this->Predefined_innovation_plan_column_data_model->get_predefined_innovation_plan_column_data(0);
                $data['_view'] = 'admin/predefined_innovation_plan_column_data/form';
                $this->load->view('layouts/admin/body',$data);
            }
		}
        
    } 
	
	/**
     * Details predefined_innovation_plan_column_data
	 * @param $id - primary key to get record
	 *
     */
	function details($id){
        $data['predefined_innovation_plan_column_data'] = $this->Predefined_innovation_plan_column_data_model->get_predefined_innovation_plan_column_data($id);
		$data['id'] = $id;
        $data['_view'] = 'admin/predefined_innovation_plan_column_data/details';
        $this->load->view('layouts/admin/body',$data);
	}
	
    /**
     * Deleting predefined_innovation_plan_column_data
	 * @param $id - primary key to delete record
	 *
     */
    function remove($id){
        $predefined_innovation_plan_column_data = $this->Predefined_innovation_plan_column_data_model->get_predefined_innovation_plan_column_data($id);

        // check if the predefined_innovation_plan_column_data exists before trying to delete it
        if(isset($predefined_innovation_plan_column_data['id'])){
            $this->Predefined_innovation_plan_column_data_model->delete_predefined_innovation_plan_column_data($id);
			$this->session->set_flashdata('msg','Predefined_innovation_plan_column_data has been deleted successfully');
            redirect('admin/predefined_innovation_plan_column_data/index');
        }
        else
            show_error('The predefined_innovation_plan_column_data you are trying to delete does not exist.');
    }
	
	/**
     * Search predefined_innovation_plan_column_data
	 * @param $start - Starting of predefined_innovation_plan_column_data table's index to get query
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
$this->db->or_like('predefined_objectives_column_id', $key, 'both');
$this->db->or_like('predefined_innovation_plan_id', $key, 'both');
$this->db->or_like('column_data', $key, 'both');
$this->db->or_like('created_at', $key, 'both');
$this->db->or_like('updated_at', $key, 'both');


		$this->db->order_by('id', 'desc');
		
        $this->db->limit($limit,$start);
        $data['predefined_innovation_plan_column_data'] = $this->db->get('predefined_innovation_plan_column_data')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		
		//pagination
		$config['base_url'] = site_url('admin/predefined_innovation_plan_column_data/search');
		$this->db->reset_query();		
		$this->db->like('id', $key, 'both');
$this->db->or_like('predefined_objectives_column_id', $key, 'both');
$this->db->or_like('predefined_innovation_plan_id', $key, 'both');
$this->db->or_like('column_data', $key, 'both');
$this->db->or_like('created_at', $key, 'both');
$this->db->or_like('updated_at', $key, 'both');

		$config['total_rows'] = $this->db->from("predefined_innovation_plan_column_data")->count_all_results();
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
		$data['_view'] = 'admin/predefined_innovation_plan_column_data/index';
        $this->load->view('layouts/admin/body',$data);
	}
	
    /**
     * Export predefined_innovation_plan_column_data
	 * @param $export_type - CSV or PDF type 
     */
	function export($export_type='CSV'){
	  if($export_type=='CSV'){	
		   // file name 
		   $filename = 'predefined_innovation_plan_column_data_'.date('Ymd').'.csv'; 
		   header("Content-Description: File Transfer"); 
		   header("Content-Disposition: attachment; filename=$filename"); 
		   header("Content-Type: application/csv; ");
		   // get data 
		   $this->db->order_by('id', 'desc');
		   $predefined_innovation_plan_column_dataData = $this->Predefined_innovation_plan_column_data_model->get_all_predefined_innovation_plan_column_data();
		   // file creation 
		   $file = fopen('php://output', 'w');
		   $header = array("Id","Predefined Objectives Column Id","Predefined Innovation Plan Id","Column Data","Created At","Updated At"); 
		   fputcsv($file, $header);
		   foreach ($predefined_innovation_plan_column_dataData as $key=>$line){ 
			 fputcsv($file,$line); 
		   }
		   fclose($file); 
		   exit; 
	  }else if($export_type=='Pdf'){
		    $this->db->order_by('id', 'desc');
		    $predefined_innovation_plan_column_data = $this->db->get('predefined_innovation_plan_column_data')->result_array();
		   // get the HTML
			ob_start();
			include(APPPATH.'views/admin/predefined_innovation_plan_column_data/print_template.php');
			$html = ob_get_clean();
			require_once FCPATH.'vendor/autoload.php';			
			$mpdf = new \Mpdf\Mpdf();
			$mpdf->WriteHTML($html);
			$mpdf->Output();
			exit;
	  }
	   
	}
}
//End of Predefined_innovation_plan_column_data controller