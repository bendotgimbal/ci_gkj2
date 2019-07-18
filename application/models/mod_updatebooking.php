<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mod_updatebooking extends CI_Model{
    public $db_server;
    public $db2;
    
    function __Conctruct() {
        parent::Model();
        //parent::__construct();
        //$this->db_server =  $this->load_database('default2', TRUE);
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
    
    
    function updatebooking($LOCK_ID) {
        
        $data = array(
            'mail_cs'          => 'Y',
            'user_cs'     => $this->session->userdata('sess_apps_uid'),
            'tgl_cs'       => getDateTime(),
        );
        
        $this->db2->where('booking_code', $LOCK_ID);
        $update = $this->db2->update('atx_booking_order', $data);
            return $update;
    }
    
    
}
