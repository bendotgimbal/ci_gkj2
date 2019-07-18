<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mod_ummenu extends CI_Model{
	function __Conctruct() {
		parent::Model();
	}
    
    //--------------------------------------------------------------------------------------------------------------------------
    // CONTROL PANEL
    //--------------------------------------------------------------------------------------------------------------------------
    
   function updateUmMenu($LOCK_ID) {
        
        $data = array(
            'nama'         => trim(strip_tags($this->input->post('nama'))),
            'tipemenu'         => trim(strip_tags($this->input->post('tipemenu'))),
            'url'         => trim(strip_tags($this->input->post('url'))),
            'parenturl'         => trim(strip_tags($this->input->post('parenturl'))),
            'keterangan'         => trim(strip_tags($this->input->post('keterangan'))), 
            'updatedby'      => $this->session->userdata('sess_apps_uid'),
            'updated' => getDateTime()
        );
        
        $this->db->where('um_menu_id', $LOCK_ID);
        $update = $this->db->update('tbl_um_menu', $data);
            return $update;
    }
    
    function saveUmMenu() {
        
        $data = array(
            'nama'          => trim(strip_tags($this->input->post('nama'))),
            'tipemenu'      => trim(strip_tags($this->input->post('tipemenu'))),
            'url'           => trim(strip_tags($this->input->post('url'))),
            'keterangan'    => trim(strip_tags($this->input->post('keterangan'))),
            'parenturl'    => trim(strip_tags($this->input->post('parenturl'))),
            'createdby'     => $this->session->userdata('sess_apps_uid'),
            'created'       => getDateTime(),
            'updatedby'     => $this->session->userdata('sess_apps_uid'),
            'updated'       => getDateTime()
        );
        
        $query = $this->db->insert('tbl_um_menu', $data);
            return $query;
    }

    
    
}
