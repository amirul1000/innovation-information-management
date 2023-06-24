<?php

 /**
 * Author: Amirul Momenin
 * Desc:Predefined_objectives_column Controller
 *
 */
class Predefined_objectives_column extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper('url'); 
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('Customlib');
		$this->load->helper(array('cookie', 'url','utility')); 
		$this->load->database();  
		$this->load->model('Predefined_objectives_column_model');
		if(! $this->session->userdata('validated')){
				redirect('admin/login/index');
		}  
    } 
	
    /**
	 * Index Page for this controller.
	 *@param $start - Starting of predefined_objectives_column table's index to get query
	 *
	 */
    function index($start=0){
		$limit = 10;
        $data['predefined_objectives_column'] = $this->Predefined_objectives_column_model->get_limit_predefined_objectives_column($limit,$start);
		//pagination
		$config['base_url'] = site_url('admin/predefined_objectives_column/index');
		$config['total_rows'] = $this->Predefined_objectives_column_model->get_count_predefined_objectives_column();
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
		
        $data['_view'] = 'admin/predefined_objectives_column/index';
        $this->load->view('layouts/admin/body',$data);
    }
	
	 /**
     * Save predefined_objectives_column
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
					 'financial_year_id' => html_escape($this->input->post('financial_year_id')),
'column_name' => html_escape($this->input->post('column_name')),
'in_percent' => html_escape($this->input->post('in_percent')),
'order_no' => html_escape($this->input->post('order_no')),
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
			$data['predefined_objectives_column'] = $this->Predefined_objectives_column_model->get_predefined_objectives_column($id);
            if(isset($_POST) && count($_POST) > 0){   
                $this->Predefined_objectives_column_model->update_predefined_objectives_column($id,$params);
				$this->session->set_flashdata('msg','Predefined_objectives_column has been updated successfully');
                redirect('admin/predefined_objectives_column/index');
            }else{
                $data['_view'] = 'admin/predefined_objectives_column/form';
                $this->load->view('layouts/admin/body',$data);
            }
        } //save
		else{
			if(isset($_POST) && count($_POST) > 0){   
                $predefined_objectives_column_id = $this->Predefined_objectives_column_model->add_predefined_objectives_column($params);
				$this->session->set_flashdata('msg','Predefined_objectives_column has been saved successfully');
                redirect('admin/predefined_objectives_column/index');
            }else{  
			    $data['predefined_objectives_column'] = $this->Predefined_objectives_column_model->get_predefined_objectives_column(0);
                $data['_view'] = 'admin/predefined_objectives_column/form';
                $this->load->view('layouts/admin/body',$data);
            }
		}
        
    } 
	
	/**
     * Details predefined_objectives_column
	 * @param $id - primary key to get record
	 *
     */
	function details($id){
        $data['predefined_objectives_column'] = $this->Predefined_objectives_column_model->get_predefined_objectives_column($id);
		$data['id'] = $id;
        $data['_view'] = 'admin/predefined_objectives_column/details';
        $this->load->view('layouts/admin/body',$data);
	}
	
    /**
     * Deleting predefined_objectives_column
	 * @param $id - primary key to delete record
	 *
     */
    function remove($id){
        $predefined_objectives_column = $this->Predefined_objectives_column_model->get_predefined_objectives_column($id);

        // check if the predefined_objectives_column exists before trying to delete it
        if(isset($predefined_objectives_column['id'])){
            $this->Predefined_objectives_column_model->delete_predefined_objectives_column($id);
			$this->session->set_flashdata('msg','Predefined_objectives_column has been deleted successfully');
            redirect('admin/predefined_objectives_column/index');
        }
        else
            show_error('The predefined_objectives_column you are trying to delete does not exist.');
    }
	
	/**
     * Search predefined_objectives_column
	 * @param $start - Starting of predefined_objectives_column table's index to get query
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
$this->db->or_like('column_name', $key, 'both');
$this->db->or_like('in_percent', $key, 'both');
$this->db->or_like('order_no', $key, 'both');
$this->db->or_like('created_at', $key, 'both');
$this->db->or_like('updated_at', $key, 'both');


		$this->db->order_by('id', 'desc');
		
        $this->db->limit($limit,$start);
        $data['predefined_objectives_column'] = $this->db->get('predefined_objectives_column')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		
		//pagination
		$config['base_url'] = site_url('admin/predefined_objectives_column/search');
		$this->db->reset_query();		
		$this->db->like('id', $key, 'both');
$this->db->or_like('financial_year_id', $key, 'both');
$this->db->or_like('column_name', $key, 'both');
$this->db->or_like('in_percent', $key, 'both');
$this->db->or_like('order_no', $key, 'both');
$this->db->or_like('created_at', $key, 'both');
$this->db->or_like('updated_at', $key, 'both');

		$config['total_rows'] = $this->db->from("predefined_objectives_column")->count_all_results();
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
		$data['_view'] = 'admin/predefined_objectives_column/index';
        $this->load->view('layouts/admin/body',$data);
	}
	
    /**
     * Export predefined_objectives_column
	 * @param $export_type - CSV or PDF type 
     */
	function export($export_type='CSV'){
	  if($export_type=='CSV'){	
		   // file name 
		   $filename = 'predefined_objectives_column_'.date('Ymd').'.csv'; 
		   header("Content-Description: File Transfer"); 
		   header("Content-Disposition: attachment; filename=$filename"); 
		   header("Content-Type: application/csv; ");
		   // get data 
		   $this->db->order_by('id', 'desc');
		   $predefined_objectives_columnData = $this->Predefined_objectives_column_model->get_all_predefined_objectives_column();
		   // file creation 
		   $file = fopen('php://output', 'w');
		   $header = array("Id","Financial Year Id","Column Name","In Percent","Order No","Created At","Updated At"); 
		   fputcsv($file, $header);
		   foreach ($predefined_objectives_columnData as $key=>$line){ 
			 fputcsv($file,$line); 
		   }
		   fclose($file); 
		   exit; 
	  }else if($export_type=='Pdf'){
		    $this->db->order_by('id', 'desc');
		    $predefined_objectives_column = $this->db->get('predefined_objectives_column')->result_array();
		   // get the HTML
			ob_start();
			include(APPPATH.'views/admin/predefined_objectives_column/print_template.php');
			$html = ob_get_clean();
			require_once FCPATH.'vendor/autoload.php';			
			$mpdf = new \Mpdf\Mpdf();
			$mpdf->WriteHTML($html);
			$mpdf->Output();
			exit;
	  }
	   
	}
}
//End of Predefined_objectives_column controller