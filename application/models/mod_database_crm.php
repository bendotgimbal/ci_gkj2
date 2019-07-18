<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mod_database_crm extends CI_Model{
	public $db2;
    //public $db2;
    
    function __Conctruct() {
		parent::Model();
        //parent::__construct();
        //$this->db2 =  $this->load_database('default2', TRUE);
        //$this->db2 = $this->load->database('default2', TRUE);
	}
    
    public function __construct()
    {
        parent::__construct();
         $this->db2 = $this->load->database('default3', TRUE);
    }
    
    //--------------------------------------------------------------------------------------------------------------------------
    // CONTROL PANEL
    //--------------------------------------------------------------------------------------------------------------------------
    function getData($TABLE, $SORT_FIELD, $SORT_VAR) {
        $this->db2->select('*');
        $this->db2->from($TABLE);
        $this->db2->order_by($SORT_FIELD, $SORT_VAR);
        $query = $this->db2->get();
        return $query;
    }

// GET DATA SESUAI KOLOM YANG DI INGINKAN
    function getDataJx($TABLE, $SORT_FIELD, $SORT_VAR, $VIEW_VAR){
        $this->db2->select($VIEW_VAR);
        $this->db2->from($TABLE);
        $this->db2->order_by($SORT_FIELD, $SORT_VAR);
        $query = $this->db2->get();
        return $query;
    }
    
    function getDataFilter($TABLE, $STATUS_FIELD, $STATUS_VAR, $SORT_FIELD, $SORT_VAR) {
        $this->db2->select('*');
        $this->db2->from($TABLE);
        $this->db2->where($STATUS_FIELD, $STATUS_VAR);
        $this->db2->order_by($SORT_FIELD, $SORT_VAR);
        $query = $this->db2->get();
          return $query;
    }
    
    function getQuery($TABLE)
    {
        //$DB2 = $this->load->database('default2', TRUE);
        $query = $this->db2->query($TABLE);
          return $query;
    }
    
    
    function getDataDoubleFilter($TABLE, $STATUS_FIELD, $STATUS_VAR,$STATUS_FIELD2, $STATUS_VAR2, $SORT_FIELD, $SORT_VAR) {
        $this->db2->select('*');
        $this->db2->from($TABLE);
        $this->db2->where($STATUS_FIELD, $STATUS_VAR);
        $this->db2->where($STATUS_FIELD2, $STATUS_VAR2);
        $this->db2->order_by($SORT_FIELD, $SORT_VAR);
        $query = $this->db2->get();
          return $query;
    }
    
    function getDataCheck($TABLE, $LOCK_FIELD, $LOCK_VAR, $CHECK_FIELD, $CHECK_VAR) {
        $this->db2->select('*');
        $this->db2->from($TABLE);
        
        $this->db2->where($LOCK_FIELD, $LOCK_VAR);
        $this->db2->where($CHECK_FIELD, $CHECK_VAR);
        $query = $this->db2->get();
          return $query;
    }
    
    function getDataStatus($TABLE, $STATUS_FIELD, $STATUS_VAR, $SORT_FIELD, $SORT_VAR) {
        $this->db2->select('*');
        $this->db2->from($TABLE);
        $this->db2->where($STATUS_FIELD, $STATUS_VAR);
        $this->db2->order_by($SORT_FIELD, $SORT_VAR);
        $query = $this->db2->get();
          return $query;
    }
    
    function getDataSelected($TABLE, $LOCK_FIELD, $LOCK_VAR) {
        $this->db2->select('*');
        $this->db2->from($TABLE);
        $this->db2->where($LOCK_FIELD, $LOCK_VAR);
        $query = $this->db2->get();
          return $query;
    }
    
    function getDataSelectedDouble($TABLE_NAME, $ID_CODE1, $FIELD_LOCK1, $ID_CODE2, $FIELD_LOCK2) {
        $this->db2->select('*');
        $this->db2->from($TABLE_NAME);
        $this->db2->where($FIELD_LOCK1, $ID_CODE1);
        $this->db2->where($FIELD_LOCK2, $ID_CODE2);
        $query = $this->db2->get();
          return $query;
    }
    
    function getDataSelectedTriple($TABLE_NAME, $FIELD_LOCK1, $ID_CODE1, $FIELD_LOCK2, $ID_CODE2, $FIELD_LOCK3, $ID_CODE3) {
        $this->db2->select('*');
        $this->db2->from($TABLE_NAME);
        $this->db2->where($FIELD_LOCK1, $ID_CODE1);
        $this->db2->where($FIELD_LOCK2, $ID_CODE2);
        $this->db2->where($FIELD_LOCK3, $ID_CODE3);
        $query = $this->db2->get();
          return $query;
    }
    
    function getDataLimit($TABLE, $STATUS_FIELD, $STATUS_VAR, $SORT_FIELD, $SORT_VAR, $LIMIT_DATA) {
        $this->db2->select('*');
        $this->db2->from($TABLE);
        $this->db2->where($STATUS_FIELD, $STATUS_VAR);
        $this->db2->order_by($SORT_FIELD, $SORT_VAR);
        $this->db2->limit($LIMIT_DATA);
        $query = $this->db2->get();
          return $query;
    }
    
    function getDataPagging($TABLE, $STATUS_FIELD, $STATUS_VAR, $SORT_FIELD, $SORT_VAR, $LIMIT, $NILAI) {
        $this->db2->select('*');
        $this->db2->from($TABLE);
        $this->db2->where($STATUS_FIELD, $STATUS_VAR);
        $this->db2->limit($LIMIT, $NILAI);
        $this->db2->order_by($SORT_FIELD, $SORT_VAR);
        $query = $this->db2->get();
          return $query;
    }
    
    function countDataPagging($TABLE, $STATUS_FIELD, $STATUS_VAR) {
        $this->db2->select('*');
        $this->db2->from($TABLE);
        $this->db2->where($STATUS_FIELD, $STATUS_VAR);
        $query = $this->db2->get();
          return $query;
    }
    
    function getDataPaggingSingle($TABLE, $STATUS_FIELD, $STATUS_VAR, $STATUS_FIELD1, $STATUS_VAR1, $SORT_FIELD, $SORT_VAR, $LIMIT, $NILAI) {
        $this->db2->select('*');
        $this->db2->from($TABLE);
        $this->db2->where($STATUS_FIELD, $STATUS_VAR);
        $this->db2->where($STATUS_FIELD1, $STATUS_VAR1);
        $this->db2->limit($LIMIT, $NILAI);
        $this->db2->order_by($SORT_FIELD, $SORT_VAR);
        $query = $this->db2->get();
          return $query;
    }
    
    function countDataPaggingSingle($TABLE, $STATUS_FIELD, $STATUS_VAR, $STATUS_FIELD1, $STATUS_VAR1) {
        $this->db2->select('*');
        $this->db2->from($TABLE);
        $this->db2->where($STATUS_FIELD, $STATUS_VAR);
        $this->db2->where($STATUS_FIELD1, $STATUS_VAR1);
        $query = $this->db2->get();
          return $query;
    }
    
    function getDataPaggingDouble($TABLE, $STATUS_FIELD, $STATUS_VAR, $STATUS_FIELD1, $STATUS_VAR1, $STATUS_FIELD2, $STATUS_VAR2, $SORT_FIELD, $SORT_VAR, $LIMIT, $NILAI) {
        $this->db2->select('*');
        $this->db2->from($TABLE);
        $this->db2->where($STATUS_FIELD, $STATUS_VAR);
        $this->db2->where($STATUS_FIELD1, $STATUS_VAR1);
        $this->db2->where($STATUS_FIELD2, $STATUS_VAR2);
        $this->db2->limit($LIMIT, $NILAI);
        $this->db2->order_by($SORT_FIELD, $SORT_VAR);
        $query = $this->db2->get();
          return $query;
    }
    
    function countDataPaggingDouble($TABLE, $STATUS_FIELD, $STATUS_VAR, $STATUS_FIELD1, $STATUS_VAR1, $STATUS_FIELD2, $STATUS_VAR2) {
        $this->db2->select('*');
        $this->db2->from($TABLE);
        $this->db2->where($STATUS_FIELD, $STATUS_VAR);
        $this->db2->where($STATUS_FIELD1, $STATUS_VAR1);
        $this->db2->where($STATUS_FIELD2, $STATUS_VAR2);
        $query = $this->db2->get();
          return $query;
    }
    
    function getDataPaggingFilterDouble($TABLE, $STATUS_FIELD, $STATUS_VAR, $STATUS_FIELD1, $STATUS_VAR1, $SORT_FIELD, $SORT_VAR, $LIMIT, $NILAI, $SLUG, $FIELD_SLUG) {
        $this->db2->select('*');
        $this->db2->from($TABLE);
        $this->db2->where($STATUS_FIELD, $STATUS_VAR);
        $this->db2->where($FIELD_SLUG, $SLUG);
        $this->db2->where($STATUS_FIELD1, $STATUS_VAR1);
        $this->db2->limit($LIMIT, $NILAI);
        $this->db2->order_by($SORT_FIELD, $SORT_VAR);
        $query = $this->db2->get();
          return $query;
    }
    
    function countDataPaggingFilterDouble($TABLE, $STATUS_FIELD, $STATUS_VAR, $SLUG, $FIELD_SLUG, $STATUS_FIELD1, $STATUS_VAR1) {
        $this->db2->select('*');
        $this->db2->from($TABLE);
        $this->db2->where($STATUS_FIELD, $STATUS_VAR);
        $this->db2->where($FIELD_SLUG, $SLUG);
        $this->db2->where($STATUS_FIELD1, $STATUS_VAR1);
        $query = $this->db2->get();
          return $query;
    }
    
    function getDataPaggingFilter($TABLE, $STATUS_FIELD, $STATUS_VAR, $SORT_FIELD, $SORT_VAR, $LIMIT, $NILAI, $SLUG, $FIELD_SLUG) {
        $this->db2->select('*');
        $this->db2->from($TABLE);
        $this->db2->where($STATUS_FIELD, $STATUS_VAR);
        $this->db2->where($FIELD_SLUG, $SLUG);
        $this->db2->limit($LIMIT, $NILAI);
        $this->db2->order_by($SORT_FIELD, $SORT_VAR);
        $query = $this->db2->get();
          return $query;
    }
    
    function countDataPaggingFilter($TABLE, $STATUS_FIELD, $STATUS_VAR, $SLUG, $FIELD_SLUG) {
        $this->db2->select('*');
        $this->db2->from($TABLE);
        $this->db2->where($STATUS_FIELD, $STATUS_VAR);
        $this->db2->where($FIELD_SLUG, $SLUG);
        $query = $this->db2->get();
          return $query;
    }
    
    function getDataPaggingFind($TABLE, $STATUS_FIELD, $STATUS_VAR, $SORT_FIELD, $SORT_VAR, $LIMIT, $NILAI, $STR_WHERE) {
        $this->db2->select('*');
        $this->db2->from($TABLE);
        $this->db2->where($STATUS_FIELD, $STATUS_VAR);
        $this->db2->where($STR_WHERE);
        $this->db2->limit($LIMIT, $NILAI);
        $this->db2->order_by($SORT_FIELD, $SORT_VAR);
        $query = $this->db2->get();
          return $query;
    }
    
    function countDataPaggingFind($TABLE, $STATUS_FIELD, $STATUS_VAR, $STR_WHERE) {
        $this->db2->select('*');
        $this->db2->from($TABLE);
        $this->db2->where($STATUS_FIELD, $STATUS_VAR);
        $this->db2->where($STR_WHERE);
        $query = $this->db2->get();
          return $query;
    }
    
    function getDataPaggingALL($TABLE, $SORT_FIELD, $SORT_VAR, $LIMIT, $NILAI) {
        $this->db2->select('*');
        $this->db2->from($TABLE);
        $this->db2->where($STATUS_FIELD, $STATUS_VAR);
        $this->db2->limit($LIMIT, $NILAI);
        $this->db2->order_by($SORT_FIELD, $SORT_VAR);
        $query = $this->db2->get();
          return $query;
    }
    
    function countDataPaggingALL($TABLE) {
        $this->db2->select('*');
        $this->db2->from($TABLE);
        $this->db2->where($STATUS_FIELD, $STATUS_VAR);
        $query = $this->db2->get();
          return $query;
    }
    
    
    
    
}
