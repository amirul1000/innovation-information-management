<?php

/**
 * Author: Amirul Momenin
 * Desc:Predefined_objectives Model
 */
class Predefined_objectives_model extends CI_Model
{
	protected $predefined_objectives = 'predefined_objectives';
	
    function __construct(){
        parent::__construct();
    }
	
    /** Get predefined_objectives by id
	 *@param $id - primary key to get record
	 *
     */
    function get_predefined_objectives($id){
        $result = $this->db->get_where('predefined_objectives',array('id'=>$id))->row_array();
		if(!(array)$result){
			$fields = $this->db->list_fields('predefined_objectives');
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
	
    /** Get all predefined_objectives
	 *
     */
    function get_all_predefined_objectives(){
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('predefined_objectives')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit predefined_objectives
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_predefined_objectives($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('predefined_objectives')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count predefined_objectives rows
	 *
     */
	function get_count_predefined_objectives(){
       $result = $this->db->from("predefined_objectives")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	
	 /** Get all users-predefined_objectives
	 *
     */
    function get_all_users_predefined_objectives(){
        $this->db->order_by('id', 'desc');
		$this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('predefined_objectives')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit users-predefined_objectives
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_users_predefined_objectives($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
		$this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('predefined_objectives')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count users-predefined_objectives rows
	 *
     */
	function get_count_users_predefined_objectives(){
	   $this->db->where('users_id', $this->session->userdata('id'));
       $result = $this->db->from("predefined_objectives")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** function to add new predefined_objectives
	 *@param $params - data set to add record
	 *
     */
    function add_predefined_objectives($params){
        $this->db->insert('predefined_objectives',$params);
        $id = $this->db->insert_id();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $id;
    }
	
    /** function to update predefined_objectives
	 *@param $id - primary key to update record,$params - data set to add record
	 *
     */
    function update_predefined_objectives($id,$params){
        $this->db->where('id',$id);
        $status = $this->db->update('predefined_objectives',$params);
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
	
    /** function to delete predefined_objectives
	 *@param $id - primary key to delete record
	 *
     */
    function delete_predefined_objectives($id){
        $status = $this->db->delete('predefined_objectives',array('id'=>$id));
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
}
