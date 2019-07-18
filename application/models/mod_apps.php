<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mod_apps extends CI_Model{
	function __Conctruct() {
		parent::Model();
	}
	
	function authLogin() {
		$this->db->select('*');
		$this->db->from('tbl_um_user');
		$this->db->where('username', trim(strip_tags($this->input->post('userlogin_username'))));
		$query = $this->db->get();
		return $query;
	}
	
	function lastLogin($GET_DATETIME) {
		
		$data = array(
				'lastlogin' 	=> $GET_DATETIME
		);
	
		$this->db->where('um_user_id', $this->session->userdata('sess_apps_uid'));
		$this->db->update('tbl_um_user', $data);
	}
    
    function logs($MEMBER, $LOGSCODE, $TIME) {
        
		$data = array(
			'logs_members'	     => $MEMBER,
			'logs_desc'	         => $LOGSCODE,
			'logs_timestamp'	 => $TIME
		);
		
		$query = $this->db->insert('_logs', $data);
            return $query;
	}
	
}