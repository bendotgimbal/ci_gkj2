<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mod_umuser extends CI_Model{
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
    
   function saveUmUser() {
        
        $data = array(
            'nama'          => trim(strip_tags($this->input->post('nama'))),
            'keterangan'    => trim(strip_tags($this->input->post('keterangan'))),
            'username'    => trim(strip_tags($this->input->post('username'))),
            'password'    => md5(trim(strip_tags($this->input->post('password')))),
			'city'    => trim(strip_tags($this->input->post('city'))),
            'customer_code'    => trim(strip_tags($this->input->post('customer_code'))),
            'location'    => (trim(strip_tags($this->input->post('location')))),
            'createdby'     => $this->session->userdata('sess_apps_uid'),
            'created'       => getDateTime(),
            'updatedby'     => $this->session->userdata('sess_apps_uid'),
            'updated'       => getDateTime()
        );
        
        $query = $this->db->insert('tbl_um_user', $data);
            return $query;
    }
    
    function updateUmUser($LOCK_ID) {
        
        $data = array(
            'nama'          => trim(strip_tags($this->input->post('nama'))),
            'keterangan'    => trim(strip_tags($this->input->post('keterangan'))),
            'username'    => trim(strip_tags($this->input->post('username'))),
            'password'    => md5(trim(strip_tags($this->input->post('password')))),
			'city'    => trim(strip_tags($this->input->post('city'))),
            'customer_code'    => trim(strip_tags($this->input->post('customer_code'))),
            'location'    => (trim(strip_tags($this->input->post('location')))),
            'updatedby'     => $this->session->userdata('sess_apps_uid'),
            'updated'       => getDateTime()
        );
        
        $this->db->where('um_user_id', $LOCK_ID);
        $update = $this->db->update('tbl_um_user', $data);
            return $update;
    }

    
    
}
