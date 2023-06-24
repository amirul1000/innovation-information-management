<?php

/**
 * Author: Amirul Momenin
 * Desc:Translation Model
 */
class Translation_model extends CI_Model
{
	protected $translation = 'translation';
	
    function __construct(){
        parent::__construct();
    }
	
    /** Get translation by id
	 *@param $id - primary key to get record
	 *
     */
    function get_translation($id){
        $result = $this->db->get_where('translation',array('id'=>$id))->row_array();
		if(!(array)$result){
			$fields = $this->db->list_fields('translation');
			foreach ($fields as $field)
			{
			   $result[$field] = ''; 	  
			}
		}
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    } 
	
    /** Get all translation
	 *
     */
    function get_all_translation(){
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('translation')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit translation
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_translation($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('translation')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count translation rows
	 *
     */
	function get_count_translation(){
       $result = $this->db->from("translation")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	
	 /** Get all users-translation
	 *
     */
    function get_all_users_translation(){
        $this->db->order_by('id', 'desc');
		$this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('translation')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit users-translation
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_users_translation($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
		$this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('translation')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count users-translation rows
	 *
     */
	function get_count_users_translation(){
	   $this->db->where('users_id', $this->session->userdata('id'));
       $result = $this->db->from("translation")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** function to add new translation
	 *@param $params - data set to add record
	 *
     */
    function add_translation($params){
        $this->db->insert('translation',$params);
        $id = $this->db->insert_id();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $id;
    }
	
    /** function to update translation
	 *@param $id - primary key to update record,$params - data set to add record
	 *
     */
    function update_translation($id,$params){
        $this->db->where('id',$id);
        $status = $this->db->update('translation',$params);
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
	
    /** function to delete translation
	 *@param $id - primary key to delete record
	 *
     */
    function delete_translation($id){
        $status = $this->db->delete('translation',array('id'=>$id));
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
}
