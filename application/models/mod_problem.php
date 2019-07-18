<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mod_problem extends CI_Model{
    public $db_server;
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
    function getData($TABLE, $SORT_FIELD, $SORT_VAR,$SELECT_SHOW) {
        $this->db2->select($SELECT_SHOW);
        $this->db2->from($TABLE);
        $this->db2->where("uset_modul", "problem_pd");
        $this->db2->order_by($SORT_FIELD, $SORT_VAR);
        $query = $this->db2->get();
        return $query;
    }
    function savedata() {
        $data = array(
            'uset_modul'        => "problem_pd",
            'uset_kode'         => trim(strip_tags($this->input->post('pxUsetkode'))),
            'uset_value1'       => trim(strip_tags($this->input->post('pxProb'))),
            'uset_value2'       => "Y",
            'uset_value5'       => trim(strip_tags($this->input->post('pxUsetkode'))),
            'uset_user_ins'     => "a",
            'uset_date_ins'     => date("Ymd"),
            'uset_ip_ins'       => "a",
            'uset_user_upd'     => "a",
            'uset_date_upd'     => date("Ymd"),
            'uset_ip_upd'       => "a"
        );
         
        $query = $this->db2->insert('uti_setting', $data);
        return $query;
    }

    function editdata() {
        $data = array(
            'uset_value1'      => trim(strip_tags($this->input->post('pxProb'))),
            'uset_date_ins'     => date("Ymd"),
            'uset_date_upd'     => date("Ymd")
        );

        $this->db2->where('uset_kode', trim(strip_tags($this->input->post('pxUsetkode'))));
        $update = $this->db2->update('uti_setting', $data);
        return $update;
    }

    function trashData($ID_CODE, $TABLE_NAME, $FIELD_LOCK) {
        $this->db2->delete($TABLE_NAME, array($FIELD_LOCK => $ID_CODE));
    }
}
