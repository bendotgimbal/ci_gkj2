<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mod_reportpd extends CI_Model{
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
    function getQuery($TABLE)
    {
        //$DB2 = $this->load->database('default2', TRUE);
        $query = $this->db2->query($TABLE);
        return $query;
    }
}
