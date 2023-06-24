<?php

/**
 * Author: Amirul Momenin
 * Desc:Final_submit_permission Model
 */
class Final_submit_permission_model extends CI_Model
{
	protected $final_submit_permission = 'final_submit_permission';
	
    function __construct(){
        parent::__construct();
    }
	
    /** Get final_submit_permission by id
	 *@param $id - primary key to get record
	 *
     */
    function get_final_submit_permission($id){
        $result = $this->db->get_where('final_submit_permission',array('id'=>$id))->row_array();
		if(!(array)$result){
			$fields = $this->db->list_fields('final_submit_permission');
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
	
    /** Get all final_submit_permission
	 *
     */
    function get_all_final_submit_permission(){
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('final_submit_permission')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit final_submit_permission
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_final_submit_permission($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('final_submit_permission')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count final_submit_permission rows
	 *
     */
	function get_count_final_submit_permission(){
       $result = $this->db->from("final_submit_permission")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	
	 /** Get all users-final_submit_permission
	 *
     */
    function get_all_users_final_submit_permission(){
        $this->db->order_by('id', 'desc');
		$this->db->where('powner_users_id', $this->session->userdata('id'));
        $result = $this->db->get('final_submit_permission')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit users-final_submit_permission
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_users_final_submit_permission($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
		$this->db->where('powner_users_id', $this->session->userdata('id'));
        $result = $this->db->get('final_submit_permission')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count users-final_submit_permission rows
	 *
     */
	function get_count_users_final_submit_permission(){
	   $this->db->where('powner_users_id', $this->session->userdata('id'));
       $result = $this->db->from("final_submit_permission")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** function to add new final_submit_permission
	 *@param $params - data set to add record
	 *
     */
    function add_final_submit_permission($params){
        $this->db->insert('final_submit_permission',$params);
        $id = $this->db->insert_id();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $id;
    }
	
    /** function to update final_submit_permission
	 *@param $id - primary key to update record,$params - data set to add record
	 *
     */
    function update_final_submit_permission($id,$params){
        $this->db->where('id',$id);
        $status = $this->db->update('final_submit_permission',$params);
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
	
    /** function to delete final_submit_permission
	 *@param $id - primary key to delete record
	 *
     */
    function delete_final_submit_permission($id){
        $status = $this->db->delete('final_submit_permission',array('id'=>$id));
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
}
