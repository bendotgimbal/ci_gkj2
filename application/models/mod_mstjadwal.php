<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mod_mstjadwal extends CI_Model{
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
    
   function savepd() {

        $data = array(
            'kode_pd'       => trim(strip_tags($this->input->post('kode_pd'))),
            'nama'          => trim(strip_tags($this->input->post('nama'))),
            'password'      => md5(trim(strip_tags($this->input->post('password'))))
        );
        
        $query = $this->db2->insert('user_pd', $data);
        return $query;
    }
    function changePassword($TABLE, $LOCK_FIELD, $LOCK_ID){
        $data = array(
            'password'      => md5(trim(strip_tags($this->input->post('password'))))
        );

        $this->db2->where($LOCK_FIELD, $LOCK_ID);
        $update = $this->db2->update('user_pd', $data);
        return $update;
    }
    
    function updateStore($LOCK_ID) {

        $pass = trim(strip_tags($this->input->post('password')));
        if($pass == ""){
            $data = array(
                'kode_pd'       => trim(strip_tags($this->input->post('kode_pd'))),
                'nama'          => trim(strip_tags($this->input->post('nama'))),
            );
        }else{
            $data = array(
                'kode_pd'       => trim(strip_tags($this->input->post('kode_pd'))),
                'nama'          => trim(strip_tags($this->input->post('nama'))),
                'password'      => md5(trim(strip_tags($this->input->post('password'))))
            );
        }
        
        $this->db2->where('kode_pd', $LOCK_ID);
        $update = $this->db2->update('user_pd', $data);
        return $update;
    }

    
    
}
