<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_getdata extends CI_Model{
	function __Conctruct() {
		parent::Model();
	}
    
    function getData($TABLE, $SORT_FIELD, $SORT_VAR) {
		$this->db->select('*');
		$this->db->from($TABLE);
        $this->db->order_by($SORT_FIELD, $SORT_VAR);
		$query = $this->db->get();
		  return $query;
	}
	
	function getDataFilter($TABLE, $STATUS_FIELD, $STATUS_VAR, $SORT_FIELD, $SORT_VAR) {
		$this->db->select('*');
		$this->db->from($TABLE);
		$this->db->where($STATUS_FIELD, $STATUS_VAR);
        $this->db->order_by($SORT_FIELD, $SORT_VAR);
		$query = $this->db->get();
		  return $query;
	}
    
    function getDataDoubleFilter($TABLE, $STATUS_FIELD, $STATUS_VAR,$STATUS_FIELD2, $STATUS_VAR2, $SORT_FIELD, $SORT_VAR) {
        $this->db->select('*');
        $this->db->from($TABLE);
        $this->db->where($STATUS_FIELD, $STATUS_VAR);
        $this->db->where($STATUS_FIELD2, $STATUS_VAR2);
        $this->db->order_by($SORT_FIELD, $SORT_VAR);
        $query = $this->db->get();
          return $query;
    }
    
    function getDataCheck($TABLE, $LOCK_FIELD, $LOCK_VAR, $CHECK_FIELD, $CHECK_VAR) {
		$this->db->select('*');
		$this->db->from($TABLE);
        
		$this->db->where($LOCK_FIELD, $LOCK_VAR);
		$this->db->where($CHECK_FIELD, $CHECK_VAR);
		$query = $this->db->get();
		  return $query;
	}
	
	function getDataStatus($TABLE, $STATUS_FIELD, $STATUS_VAR, $SORT_FIELD, $SORT_VAR) {
		$this->db->select('*');
		$this->db->from($TABLE);
		$this->db->where($STATUS_FIELD, $STATUS_VAR);
        $this->db->order_by($SORT_FIELD, $SORT_VAR);
		$query = $this->db->get();
		  return $query;
	}
    
    function getDataSelected($TABLE, $LOCK_FIELD, $LOCK_VAR) {
		$this->db->select('*');
		$this->db->from($TABLE);
		$this->db->where($LOCK_FIELD, $LOCK_VAR);
		$query = $this->db->get();
		  return $query;
	}
    
    function getDataSelectedDouble($TABLE_NAME, $ID_CODE1, $FIELD_LOCK1, $ID_CODE2, $FIELD_LOCK2) {
		$this->db->select('*');
		$this->db->from($TABLE_NAME);
		$this->db->where($FIELD_LOCK1, $ID_CODE1);
		$this->db->where($FIELD_LOCK2, $ID_CODE2);
		$query = $this->db->get();
		  return $query;
	}
    
    function getDataSelectedTriple($TABLE_NAME, $FIELD_LOCK1, $ID_CODE1, $FIELD_LOCK2, $ID_CODE2, $FIELD_LOCK3, $ID_CODE3) {
		$this->db->select('*');
		$this->db->from($TABLE_NAME);
		$this->db->where($FIELD_LOCK1, $ID_CODE1);
		$this->db->where($FIELD_LOCK2, $ID_CODE2);
		$this->db->where($FIELD_LOCK3, $ID_CODE3);
		$query = $this->db->get();
		  return $query;
	}
    
    function getDataLimit($TABLE, $STATUS_FIELD, $STATUS_VAR, $SORT_FIELD, $SORT_VAR, $LIMIT_DATA) {
		$this->db->select('*');
		$this->db->from($TABLE);
		$this->db->where($STATUS_FIELD, $STATUS_VAR);
        $this->db->order_by($SORT_FIELD, $SORT_VAR);
        $this->db->limit($LIMIT_DATA);
		$query = $this->db->get();
		  return $query;
	}
    
    function getDataPagging($TABLE, $STATUS_FIELD, $STATUS_VAR, $SORT_FIELD, $SORT_VAR, $LIMIT, $NILAI) {
		$this->db->select('*');
		$this->db->from($TABLE);
		$this->db->where($STATUS_FIELD, $STATUS_VAR);
        $this->db->limit($LIMIT, $NILAI);
        $this->db->order_by($SORT_FIELD, $SORT_VAR);
		$query = $this->db->get();
		  return $query;
	}
    
    function countDataPagging($TABLE, $STATUS_FIELD, $STATUS_VAR) {
		$this->db->select('*');
		$this->db->from($TABLE);
		$this->db->where($STATUS_FIELD, $STATUS_VAR);
		$query = $this->db->get();
		  return $query;
	}
    
    function getDataPaggingSingle($TABLE, $STATUS_FIELD, $STATUS_VAR, $STATUS_FIELD1, $STATUS_VAR1, $SORT_FIELD, $SORT_VAR, $LIMIT, $NILAI) {
		$this->db->select('*');
		$this->db->from($TABLE);
		$this->db->where($STATUS_FIELD, $STATUS_VAR);
		$this->db->where($STATUS_FIELD1, $STATUS_VAR1);
        $this->db->limit($LIMIT, $NILAI);
        $this->db->order_by($SORT_FIELD, $SORT_VAR);
		$query = $this->db->get();
		  return $query;
	}
    
    function countDataPaggingSingle($TABLE, $STATUS_FIELD, $STATUS_VAR, $STATUS_FIELD1, $STATUS_VAR1) {
		$this->db->select('*');
		$this->db->from($TABLE);
		$this->db->where($STATUS_FIELD, $STATUS_VAR);
		$this->db->where($STATUS_FIELD1, $STATUS_VAR1);
		$query = $this->db->get();
		  return $query;
	}
    
    function getDataPaggingDouble($TABLE, $STATUS_FIELD, $STATUS_VAR, $STATUS_FIELD1, $STATUS_VAR1, $STATUS_FIELD2, $STATUS_VAR2, $SORT_FIELD, $SORT_VAR, $LIMIT, $NILAI) {
		$this->db->select('*');
		$this->db->from($TABLE);
		$this->db->where($STATUS_FIELD, $STATUS_VAR);
		$this->db->where($STATUS_FIELD1, $STATUS_VAR1);
		$this->db->where($STATUS_FIELD2, $STATUS_VAR2);
        $this->db->limit($LIMIT, $NILAI);
        $this->db->order_by($SORT_FIELD, $SORT_VAR);
		$query = $this->db->get();
		  return $query;
	}
    
    function countDataPaggingDouble($TABLE, $STATUS_FIELD, $STATUS_VAR, $STATUS_FIELD1, $STATUS_VAR1, $STATUS_FIELD2, $STATUS_VAR2) {
		$this->db->select('*');
		$this->db->from($TABLE);
		$this->db->where($STATUS_FIELD, $STATUS_VAR);
		$this->db->where($STATUS_FIELD1, $STATUS_VAR1);
		$this->db->where($STATUS_FIELD2, $STATUS_VAR2);
		$query = $this->db->get();
		  return $query;
	}
    
    function getDataPaggingFilterDouble($TABLE, $STATUS_FIELD, $STATUS_VAR, $STATUS_FIELD1, $STATUS_VAR1, $SORT_FIELD, $SORT_VAR, $LIMIT, $NILAI, $SLUG, $FIELD_SLUG) {
		$this->db->select('*');
		$this->db->from($TABLE);
		$this->db->where($STATUS_FIELD, $STATUS_VAR);
		$this->db->where($FIELD_SLUG, $SLUG);
		$this->db->where($STATUS_FIELD1, $STATUS_VAR1);
        $this->db->limit($LIMIT, $NILAI);
        $this->db->order_by($SORT_FIELD, $SORT_VAR);
		$query = $this->db->get();
		  return $query;
	}
    
    function countDataPaggingFilterDouble($TABLE, $STATUS_FIELD, $STATUS_VAR, $SLUG, $FIELD_SLUG, $STATUS_FIELD1, $STATUS_VAR1) {
		$this->db->select('*');
		$this->db->from($TABLE);
		$this->db->where($STATUS_FIELD, $STATUS_VAR);
		$this->db->where($FIELD_SLUG, $SLUG);
		$this->db->where($STATUS_FIELD1, $STATUS_VAR1);
		$query = $this->db->get();
		  return $query;
	}
    
    function getDataPaggingFilter($TABLE, $STATUS_FIELD, $STATUS_VAR, $SORT_FIELD, $SORT_VAR, $LIMIT, $NILAI, $SLUG, $FIELD_SLUG) {
		$this->db->select('*');
		$this->db->from($TABLE);
		$this->db->where($STATUS_FIELD, $STATUS_VAR);
		$this->db->where($FIELD_SLUG, $SLUG);
        $this->db->limit($LIMIT, $NILAI);
        $this->db->order_by($SORT_FIELD, $SORT_VAR);
		$query = $this->db->get();
		  return $query;
	}
    
    function countDataPaggingFilter($TABLE, $STATUS_FIELD, $STATUS_VAR, $SLUG, $FIELD_SLUG) {
		$this->db->select('*');
		$this->db->from($TABLE);
		$this->db->where($STATUS_FIELD, $STATUS_VAR);
		$this->db->where($FIELD_SLUG, $SLUG);
		$query = $this->db->get();
		  return $query;
	}
    
    function getDataPaggingFind($TABLE, $STATUS_FIELD, $STATUS_VAR, $SORT_FIELD, $SORT_VAR, $LIMIT, $NILAI, $STR_WHERE) {
		$this->db->select('*');
		$this->db->from($TABLE);
		$this->db->where($STATUS_FIELD, $STATUS_VAR);
		$this->db->where($STR_WHERE);
        $this->db->limit($LIMIT, $NILAI);
        $this->db->order_by($SORT_FIELD, $SORT_VAR);
		$query = $this->db->get();
		  return $query;
	}
    
    function countDataPaggingFind($TABLE, $STATUS_FIELD, $STATUS_VAR, $STR_WHERE) {
		$this->db->select('*');
		$this->db->from($TABLE);
		$this->db->where($STATUS_FIELD, $STATUS_VAR);
		$this->db->where($STR_WHERE);
		$query = $this->db->get();
		  return $query;
	}
    
    function getDataPaggingALL($TABLE, $SORT_FIELD, $SORT_VAR, $LIMIT, $NILAI) {
		$this->db->select('*');
		$this->db->from($TABLE);
		$this->db->where($STATUS_FIELD, $STATUS_VAR);
        $this->db->limit($LIMIT, $NILAI);
        $this->db->order_by($SORT_FIELD, $SORT_VAR);
		$query = $this->db->get();
		  return $query;
	}
    
    function countDataPaggingALL($TABLE) {
		$this->db->select('*');
		$this->db->from($TABLE);
		$this->db->where($STATUS_FIELD, $STATUS_VAR);
		$query = $this->db->get();
		  return $query;
	}
    
    //Kondisi WORKFLOW
    
    function getDataWorkflow($TABLE, $SORT_FIELD, $SORT_VAR, $FIELDUP, $FIELDOWN) {
        $this->db->select('*');
        $this->db->from($TABLE);
        
        $QUERY = "m_flow_id IN ('".$FIELDUP."','".$FIELDOWN."')";
        $this->db->where($QUERY);
        
        $this->db->order_by($SORT_FIELD, $SORT_VAR);
        $query = $this->db->get();
          return $query;
    }
    
    //---------------------------------------------------------------------------------------------------------------------------
    // SEARCHING
    //---------------------------------------------------------------------------------------------------------------------------

    function getDataPaggingKelurahan($TABLE, $SORT_FIELD, $SORT_VAR, $LIMIT, $NILAI, $KEYWORD) {
		$this->db->select('*');
		$this->db->from($TABLE);
        
        if(!empty($KEYWORD)) {
            $QUERY  = "LOWER(kodepos) LIKE LOWER('%".$KEYWORD."%') OR LOWER(kelurahan) LIKE LOWER('%".$KEYWORD."%') OR LOWER(kecamatan) LIKE LOWER('%".$KEYWORD."%') OR LOWER(jenis) LIKE LOWER('%".$KEYWORD."%') OR LOWER(kabupaten) LIKE LOWER('%".$KEYWORD."%') OR LOWER(propinsi) LIKE LOWER('%".$KEYWORD."%')";
            $this->db->where($QUERY);
        }
        
        $this->db->limit($LIMIT, $NILAI);
        $this->db->order_by($SORT_FIELD, $SORT_VAR);
		$query = $this->db->get();
		  return $query;
	}
    
    function countDataPaggingKelurahan($TABLE, $KEYWORD) {
		$this->db->select('*');
		$this->db->from($TABLE);
        
        if(!empty($KEYWORD)) {
            $QUERY  = "LOWER(kodepos) LIKE LOWER('%".$KEYWORD."%') OR LOWER(kelurahan) LIKE LOWER('%".$KEYWORD."%') OR LOWER(kecamatan) LIKE LOWER('%".$KEYWORD."%') OR LOWER(jenis) LIKE LOWER('%".$KEYWORD."%') OR LOWER(kabupaten) LIKE LOWER('%".$KEYWORD."%') OR LOWER(propinsi) LIKE LOWER('%".$KEYWORD."%')";
            $this->db->where($QUERY);
        }
        
		$query = $this->db->get();
		  return $query;
	}
    //---------------------------------------------------------------------------------------------------------------------------
    // AUTHENTIKASI
    //---------------------------------------------------------------------------------------------------------------------------
    function authLogin() {
		$this->db->select('*');
		$this->db->from('mst_account');
		$this->db->where('account_uname LIKE BINARY ', trim(strip_tags($this->input->post('uname'))));
		$query = $this->db->get();
		return $query;
	}
	
	function lastLogin($GET_DATETIME) {
		
		$data = array(
				'account_lastlogin' => $GET_DATETIME
		);
	
		$this->db->where('account_id', $this->session->userdata('sess_account_uid'));
		$this->db->update('mst_account', $data);
	}
    
}