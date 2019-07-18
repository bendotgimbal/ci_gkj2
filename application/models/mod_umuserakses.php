<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mod_umuserakses extends CI_Model{
	function __Conctruct() {
		parent::Model();
        // $this->load->library('encrypt');
	}
    
    //--------------------------------------------------------------------------------------------------------------------------
    // CONTROL PANEL
    //--------------------------------------------------------------------------------------------------------------------------

    function getQuery($TABLE)
    {
        $query = $this->db->query($TABLE);
          return $query;
    }

    function updateUmUserAkses($LOCK_ID) {
        
        $data = array(
            'namauser'         => trim(strip_tags($this->input->post('namauser'))),
            'username'         => trim(strip_tags($this->input->post('username'))),
            // 'password'         => trim(strip_tags($this->input->post('password')))
            'password'         => trim(strip_tags($this->input->post('username')))
            // 'password'         => trim(strip_tags($this->encrypt->decode('password')))
        );
        
        $this->db->where('um_user_akses_id', $LOCK_ID);
        $update = $this->db->update('v_um_user_akses', $data);
            return $update;
    }
    
   function saveUmUserAkses($umuserid, $umaksesid) {
        
        $data = array(
            'um_user_id'          => trim(strip_tags($umuserid)),
            'um_akses_id'      => trim(strip_tags($umaksesid)),
            'createdby'     => $this->session->userdata('sess_apps_uid'),
            'created'       => getDateTime(),
            'updatedby'     => $this->session->userdata('sess_apps_uid'),
            'updated'       => getDateTime()
        );
        
        $query = $this->db->insert('tbl_um_user_akses', $data);    
        return $query;
    }

    function saveUmUserAkses2($count_um_user_id, $username, $um_akses_id) {
        
        $data = array(
            'tbluk_u_id'            => trim(strip_tags($count_um_user_id)),
            'tbluk_um_akses_id'     => trim(strip_tags($um_akses_id)),
            'tbluk_nik'             => trim(strip_tags($username)),
            'tbluk_password'        => md5(trim(strip_tags($username))),
            'tbluk_created'         => getDateTime(),
            'tbluk_createdby'       => $this->session->userdata('sess_apps_uid'),
            'tbluk_updated'         => getDateTime(),
            'tbluk_updatedby'       => $this->session->userdata('sess_apps_uid')
        );

        // $set = $this->db->set('counter','counter','+','1');
        // $query = $this->db->update('tbl_total_user', $set);

        $set = $this->db->set('counter','counter+1',False);
        $query2 = $this->db->update('tbl_total_user');

        // $query = $this->db->get(tbl_total_user);
        // foreach($query->result() as $row){
        //     $count = $row->counter;
        //     for ($i = 0; $i < count($count); $i++){
        //         $set = $this->db->set('counter',$i++);
        //         $query = $this->db->update('tbl_total_user', $set);
        //     }
        // }
        
        $query = $this->db->insert('tbl_user_akses', $data);  
        return $query;
    }
    
    

    
    
}
