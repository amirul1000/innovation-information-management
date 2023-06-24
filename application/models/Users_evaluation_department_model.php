<?php

/**
 * Author: Amirul Momenin
 * Desc:Users_evaluation_department Model
 */
class Users_evaluation_department_model extends CI_Model
{
	protected $users_evaluation_department = 'users_evaluation_department';
	
    function __construct(){
        parent::__construct();
    }
	
    /** Get users_evaluation_department by id
	 *@param $id - primary key to get record
	 *
     */
    function get_users_evaluation_department($id){
        $result = $this->db->get_where('users_evaluation_department',array('id'=>$id))->row_array();
		if(!(array)$result){
			$fields = $this->db->list_fields('users_evaluation_department');
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
	
    /** Get all users_evaluation_department
	 *
     */
    function get_all_users_evaluation_department(){
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('users_evaluation_department')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit users_evaluation_department
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_users_evaluation_department($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('users_evaluation_department')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count users_evaluation_department rows
	 *
     */
	function get_count_users_evaluation_department(){
       $result = $this->db->from("users_evaluation_department")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	
	 /** Get all users-users_evaluation_department
	 *
     */
    function get_all_users_users_evaluation_department(){
        $this->db->order_by('id', 'desc');
		$this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('users_evaluation_department')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit users-users_evaluation_department
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_users_users_evaluation_department($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
		$this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('users_evaluation_department')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count users-users_evaluation_department rows
	 *
     */
	function get_count_users_users_evaluation_department(){
	   $this->db->where('users_id', $this->session->userdata('id'));
       $result = $this->db->from("users_evaluation_department")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** function to add new users_evaluation_department
	 *@param $params - data set to add record
	 *
     */
    function add_users_evaluation_department($params){
        $this->db->insert('users_evaluation_department',$params);
        $id = $this->db->insert_id();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $id;
    }
	
    /** function to update users_evaluation_department
	 *@param $id - primary key to update record,$params - data set to add record
	 *
     */
    function update_users_evaluation_department($id,$params){
        $this->db->where('id',$id);
        $status = $this->db->update('users_evaluation_department',$params);
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
	
    /** function to delete users_evaluation_department
	 *@param $id - primary key to delete record
	 *
     */
    function delete_users_evaluation_department($id){
        $status = $this->db->delete('users_evaluation_department',array('id'=>$id));
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
}
