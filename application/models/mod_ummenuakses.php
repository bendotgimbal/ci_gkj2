<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mod_ummenuakses extends CI_Model{
	function __Conctruct() {
		parent::Model();
	}
    
    //--------------------------------------------------------------------------------------------------------------------------
    // CONTROL PANEL
    //--------------------------------------------------------------------------------------------------------------------------

    function getQuery($TABLE)
    {
        $query = $this->db->query($TABLE);
          return $query;
    }
    
   function saveUmMenuAkses($ummenuid, $umaksesid) {
        
        $data = array(
            'um_menu_id'          => trim(strip_tags($ummenuid)),
            'um_akses_id'      => trim(strip_tags($umaksesid)),
            'createdby'     => $this->session->userdata('sess_apps_uid'),
            'created'       => getDateTime(),
            'updatedby'     => $this->session->userdata('sess_apps_uid'),
            'updated'       => getDateTime()
        );
        
        $query = $this->db->insert('tbl_um_menu_akses', $data);    
        return $query;
    }

    function updateUmMenuAkses($LOCK_ID) {
        
        $data = array(
            'um_menu_id'         => trim(strip_tags($this->input->post('um_menu_id'))),
            'um_akses_id'         => trim(strip_tags($this->input->post('um_akses_id'))),
            'updatedby'      => $this->session->userdata('sess_apps_uid'),
            'updated' => getDateTime()
        );
        
        $this->db->where('um_menu_akses_id', $LOCK_ID);
        $update = $this->db->update('tbl_um_menu_akses', $data);
            return $query;
    }
    
}
