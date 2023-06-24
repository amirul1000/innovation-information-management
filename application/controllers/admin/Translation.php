<?php

 /**
 * Author: Amirul Momenin
 * Desc:Translation Controller
 *
 */
class Translation extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper('url'); 
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('Customlib');
		$this->load->helper(array('cookie', 'url')); 
		$this->load->database();  
		$this->load->model('Translation_model');
		if(! $this->session->userdata('validated')){
				redirect('admin/login/index');
		}  
    } 
	
    /**
	 * Index Page for this controller.
	 *@param $start - Starting of translation table's index to get query
	 *
	 */
    function index($start=0){
		$limit = 10;
        $data['translation'] = $this->Translation_model->get_limit_translation($limit,$start);
		//pagination
		$config['base_url'] = site_url('admin/translation/index');
		$config['total_rows'] = $this->Translation_model->get_count_translation();
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
		
        $data['_view'] = 'admin/translation/index';
        $this->load->view('layouts/admin/body',$data);
    }
	
	 /**
     * Save translation
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
					 'en' => html_escape(trim($this->input->post('en'))),
'bn' => html_escape(trim($this->input->post('bn'))),
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
			$data['translation'] = $this->Translation_model->get_translation($id);
            if(isset($_POST) && count($_POST) > 0){   
                $this->Translation_model->update_translation($id,$params);
				$this->session->set_flashdata('msg','Translation has been updated successfully');
                redirect('admin/translation/index');
            }else{
                $data['_view'] = 'admin/translation/form';
                $this->load->view('layouts/admin/body',$data);
            }
        } //save
		else{
			if(isset($_POST) && count($_POST) > 0){   
                $translation_id = $this->Translation_model->add_translation($params);
				$this->session->set_flashdata('msg','Translation has been saved successfully');
                redirect('admin/translation/index');
            }else{  
			    $data['translation'] = $this->Translation_model->get_translation(0);
                $data['_view'] = 'admin/translation/form';
                $this->load->view('layouts/admin/body',$data);
            }
		}
        
    } 
	
	/**
     * Details translation
	 * @param $id - primary key to get record
	 *
     */
	function details($id){
        $data['translation'] = $this->Translation_model->get_translation($id);
		$data['id'] = $id;
        $data['_view'] = 'admin/translation/details';
        $this->load->view('layouts/admin/body',$data);
	}
	
    /**
     * Deleting translation
	 * @param $id - primary key to delete record
	 *
     */
    function remove($id){
        $translation = $this->Translation_model->get_translation($id);

        // check if the translation exists before trying to delete it
        if(isset($translation['id'])){
            $this->Translation_model->delete_translation($id);
			$this->session->set_flashdata('msg','Translation has been deleted successfully');
            redirect('admin/translation/index');
        }
        else
            show_error('The translation you are trying to delete does not exist.');
    }
	
	/**
     * Search translation
	 * @param $start - Starting of translation table's index to get query
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
$this->db->or_like('en', $key, 'both');
$this->db->or_like('bn', $key, 'both');
$this->db->or_like('created_at', $key, 'both');
$this->db->or_like('updated_at', $key, 'both');


		$this->db->order_by('id', 'desc');
		
        $this->db->limit($limit,$start);
        $data['translation'] = $this->db->get('translation')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		
		//pagination
		$config['base_url'] = site_url('admin/translation/search');
		$this->db->reset_query();		
		$this->db->like('id', $key, 'both');
$this->db->or_like('en', $key, 'both');
$this->db->or_like('bn', $key, 'both');
$this->db->or_like('created_at', $key, 'both');
$this->db->or_like('updated_at', $key, 'both');

		$config['total_rows'] = $this->db->from("translation")->count_all_results();
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
		$data['_view'] = 'admin/translation/index';
        $this->load->view('layouts/admin/body',$data);
	}
	
    /**
     * Export translation
	 * @param $export_type - CSV or PDF type 
     */
	function export($export_type='CSV'){
	  if($export_type=='CSV'){	
		   // file name 
		   $filename = 'translation_'.date('Ymd').'.csv'; 
		   header("Content-Description: File Transfer"); 
		   header("Content-Disposition: attachment; filename=$filename"); 
		   header("Content-Type: application/csv; ");
		   // get data 
		   $this->db->order_by('id', 'desc');
		   $translationData = $this->Translation_model->get_all_translation();
		   // file creation 
		   $file = fopen('php://output', 'w');
		   $header = array("Id","En","Bn","Created At","Updated At"); 
		   fputcsv($file, $header);
		   foreach ($translationData as $key=>$line){ 
			 fputcsv($file,$line); 
		   }
		   fclose($file); 
		   exit; 
	  }else if($export_type=='Pdf'){
		    $this->db->order_by('id', 'desc');
		    $translation = $this->db->get('translation')->result_array();
		   // get the HTML
			ob_start();
			include(APPPATH.'views/admin/translation/print_template.php');
			$html = ob_get_clean();
			require_once FCPATH.'vendor/autoload.php';			
			$mpdf = new \Mpdf\Mpdf();
			$mpdf->WriteHTML($html);
			$mpdf->Output();
			exit;
	  }
	   
	}
}
//End of Translation controller