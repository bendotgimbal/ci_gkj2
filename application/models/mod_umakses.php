<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mod_umakses extends CI_Model{
	function __Conctruct() {
		parent::Model();
	}
    
    //--------------------------------------------------------------------------------------------------------------------------
    // CONTROL PANEL
    //--------------------------------------------------------------------------------------------------------------------------
    
    function saveUmHakAkses() {
        
        $data = array(
            'nama'         => trim(strip_tags($this->input->post('nama'))),
            'keterangan'         => trim(strip_tags($this->input->post('keterangan'))),
            'createdby'      => $this->session->userdata('sess_apps_uid'),
            'created' => getDateTime(),
            'updatedby'      => $this->session->userdata('sess_apps_uid'),
            'updated' => getDateTime()
        );
        
        $query = $this->db->insert('tbl_um_akses', $data);
            return $query;
    }
    
    function updateUmHakAkses($LOCK_ID) {
        
        $data = array(
            'nama'         => trim(strip_tags($this->input->post('nama'))),
            'keterangan'         => trim(strip_tags($this->input->post('keterangan'))), 
            'updatedby'      => $this->session->userdata('sess_apps_uid'),
            'updated' => getDateTime()
        );
        
        $this->db->where('um_akses_id', $LOCK_ID);
        $update = $this->db->update('tbl_um_akses', $data);
            return $update;
    }

    
    
}
