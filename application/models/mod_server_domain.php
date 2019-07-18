<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mod_server_domain extends CI_Model{
    function __Conctruct() {
        parent::Model();
    }
    
    //--------------------------------------------------------------------------------------------------------------------------
    // CONTROL PANEL
    //--------------------------------------------------------------------------------------------------------------------------
    
   function updateServerDomain($LOCK_ID) {
        
        $data = array(
            'url'         => trim(strip_tags($this->input->post('url'))),
            'port'         => trim(strip_tags($this->input->post('port'))),
            'username'         => trim(strip_tags($this->input->post('username'))),
            'api_key'         => trim(strip_tags($this->input->post('api_key'))),
            'keterangan'         => trim(strip_tags($this->input->post('keterangan'))), 
            'updatedby'      => $this->session->userdata('sess_apps_uid'),
            'updated' => getDateTime()
        );
        
        $this->db->where('id', $LOCK_ID);
        $update = $this->db->update('tbl_server_liqu_id', $data);
            return $update;
    }
    
    function saveServerDomain() {
        
        $data = array(
            'url'          => trim(strip_tags($this->input->post('url'))),
            'port'      => trim(strip_tags($this->input->post('port'))),
            'username'           => trim(strip_tags($this->input->post('username'))),
            'api_key'         => trim(strip_tags($this->input->post('api_key'))),
            'keterangan'    => trim(strip_tags($this->input->post('keterangan'))),
            'createdby'     => $this->session->userdata('sess_apps_uid'),
            'created'       => getDateTime(),
            'updatedby'     => $this->session->userdata('sess_apps_uid'),
            'updated'       => getDateTime()
        );
        
        $query = $this->db->insert('tbl_server_liqu_id', $data);
            return $query;
    }

    
    
}
