<?php

/**
 * Author: Amirul Momenin
 * Desc:Predefined_innovation_plan_distribution Model
 */
class Predefined_innovation_plan_distribution_model extends CI_Model
{
	protected $predefined_innovation_plan_distribution = 'predefined_innovation_plan_distribution';
	
    function __construct(){
        parent::__construct();
    }
	
    /** Get predefined_innovation_plan_distribution by id
	 *@param $id - primary key to get record
	 *
     */
    function get_predefined_innovation_plan_distribution($id){
        $result = $this->db->get_where('predefined_innovation_plan_distribution',array('id'=>$id))->row_array();
		if(!(array)$result){
			$fields = $this->db->list_fields('predefined_innovation_plan_distribution');
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
	
    /** Get all predefined_innovation_plan_distribution
	 *
     */
    function get_all_predefined_innovation_plan_distribution(){
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('predefined_innovation_plan_distribution')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit predefined_innovation_plan_distribution
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_predefined_innovation_plan_distribution($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('predefined_innovation_plan_distribution')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count predefined_innovation_plan_distribution rows
	 *
     */
	function get_count_predefined_innovation_plan_distribution(){
       $result = $this->db->from("predefined_innovation_plan_distribution")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	
	 /** Get all users-predefined_innovation_plan_distribution
	 *
     */
    function get_all_users_predefined_innovation_plan_distribution(){
        $this->db->order_by('id', 'desc');
		$this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('predefined_innovation_plan_distribution')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit users-predefined_innovation_plan_distribution
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_users_predefined_innovation_plan_distribution($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
		$this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('predefined_innovation_plan_distribution')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count users-predefined_innovation_plan_distribution rows
	 *
     */
	function get_count_users_predefined_innovation_plan_distribution(){
	   $this->db->where('users_id', $this->session->userdata('id'));
       $result = $this->db->from("predefined_innovation_plan_distribution")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** function to add new predefined_innovation_plan_distribution
	 *@param $params - data set to add record
	 *
     */
    function add_predefined_innovation_plan_distribution($params){
        $this->db->insert('predefined_innovation_plan_distribution',$params);
        $id = $this->db->insert_id();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $id;
    }
	
    /** function to update predefined_innovation_plan_distribution
	 *@param $id - primary key to update record,$params - data set to add record
	 *
     */
    function update_predefined_innovation_plan_distribution($id,$params){
        $this->db->where('id',$id);
        $status = $this->db->update('predefined_innovation_plan_distribution',$params);
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
	
    /** function to delete predefined_innovation_plan_distribution
	 *@param $id - primary key to delete record
	 *
     */
    function delete_predefined_innovation_plan_distribution($id){
        $status = $this->db->delete('predefined_innovation_plan_distribution',array('id'=>$id));
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
}
