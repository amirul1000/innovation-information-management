<?php

/**
 * Author: Amirul Momenin
 * Desc:Innovation_team Model
 */
class Innovation_team_model extends CI_Model
{
	protected $innovation_team = 'innovation_team';
	
    function __construct(){
        parent::__construct();
    }
	
    /** Get innovation_team by id
	 *@param $id - primary key to get record
	 *
     */
    function get_innovation_team($id){
        $result = $this->db->get_where('innovation_team',array('id'=>$id))->row_array();
		if(!(array)$result){
			$fields = $this->db->list_fields('innovation_team');
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
	
    /** Get all innovation_team
	 *
     */
    function get_all_innovation_team(){
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('innovation_team')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit innovation_team
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_innovation_team($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('innovation_team')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count innovation_team rows
	 *
     */
	function get_count_innovation_team(){
       $result = $this->db->from("innovation_team")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	
	 /** Get all users-innovation_team
	 *
     */
    function get_all_users_innovation_team(){
        $this->db->order_by('id', 'desc');
		$this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('innovation_team')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit users-innovation_team
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_users_innovation_team($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
		$this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('innovation_team')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count users-innovation_team rows
	 *
     */
	function get_count_users_innovation_team(){
	   $this->db->where('users_id', $this->session->userdata('id'));
       $result = $this->db->from("innovation_team")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** function to add new innovation_team
	 *@param $params - data set to add record
	 *
     */
    function add_innovation_team($params){
        $this->db->insert('innovation_team',$params);
        $id = $this->db->insert_id();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $id;
    }
	
    /** function to update innovation_team
	 *@param $id - primary key to update record,$params - data set to add record
	 *
     */
    function update_innovation_team($id,$params){
        $this->db->where('id',$id);
        $status = $this->db->update('innovation_team',$params);
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
	
    /** function to delete innovation_team
	 *@param $id - primary key to delete record
	 *
     */
    function delete_innovation_team($id){
        $status = $this->db->delete('innovation_team',array('id'=>$id));
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
}
