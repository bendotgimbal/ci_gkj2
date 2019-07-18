<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mod_data_jemaat extends CI_Model{
    // public $db_server;
    // public $db2;
    function __Conctruct() {
        parent::Model();
    }

    // public function __construct()
    // {
    //     parent::__construct();
    //      $this->db2 = $this->load->database('default2', TRUE);
    // }
    
    //--------------------------------------------------------------------------------------------------------------------------
    // CONTROL PANEL
    //--------------------------------------------------------------------------------------------------------------------------

    function get_data_jemaat_byname($nama){
        $hsl=$this->db->query("SELECT (a.um_user_id)um_user_id, (a.nik)nik, (a.nama)nama, (a.password)password, (a.username)username, (b.no_induk)no_induk, (b.Field1)no_kk, (b.nama)nama2 FROM tbl_um_user a inner join tbl_induk b on b.nik=a.nik WHERE a.nama='$nama' order by a.um_user_id");
        if($hsl->num_rows()>0){
            foreach ($hsl->result() as $data) {
                $hasil=array(
                    'um_user_id' => $data->um_user_id,
                    'nik' => $data->nik,
                    'nama' => $data->nama,
                    'password' => $data->password,
                    'username' => $data->username,
                    'no_induk' => $data->no_induk,
                    'no_kk' => $data->no_kk,
                    'nama2' => $data->nama2,
                    'readonly'=>'true'
                    );
            }
        }
        return $hasil;
    }

    function getQuery($TABLE)
    {
        //$DB2 = $this->load->database('default2', TRUE);
        // $query = $this->db2->query($TABLE);
        $query = $this->db->query($TABLE);
          return $query;
    }

    function get_update_jemaat_byname($nama){
        // $hslUpdate=$this->db->query("SELECT * FROM test_data WHERE nama_jemaat='$nama'");
        $hslUpdate=$this->db->query("SELECT * FROM test_data WHERE nik='$nama'");
        if($hslUpdate->num_rows()>0){
            // $hasilUpdate = "isi";
            $hasilUpdate = "1";
        }else{
            // $hasilUpdate = "kosong";
            $hasilUpdate = "0";
        }
        return $hasilUpdate;
    }

    // function updateDataJemaat($LOCK_ID) {
        
    //     $data = array(
    //         'id'         => trim(strip_tags($this->input->post('id'))),
    //         'nik'         => trim(strip_tags($this->input->post('nik'))),
    //         'no_induk'         => trim(strip_tags($this->input->post('no_induk'))),
    //         'no_kk'         => trim(strip_tags($this->input->post('no_kk'))),
    //         'nama_jemaat'         => trim(strip_tags($this->input->post('nama_jemaat'))), 
    //         'tempat_lahir'      => $this->session->userdata('tempat_lahir')
    //     );
        
    //     $this->db->where('id', $LOCK_ID);
    //     $update = $this->db->update('test_data', $data);
    //         return $update;
    // }

    function updateDataJemaat() {
        
        $data = array(
            'id'         => trim(strip_tags($this->input->post('id'))),
            'nik'         => trim(strip_tags($this->input->post('nik'))),
            'no_induk'         => trim(strip_tags($this->input->post('no_induk'))),
            'no_kk'         => trim(strip_tags($this->input->post('no_kk'))),
            'nama_jemaat'         => trim(strip_tags($this->input->post('nama'))), 
            'tempat_lahir'      => trim(strip_tags($this->input->post('tmpt_lahir'))),
            'tgl_lahir'      => trim(strip_tags($this->input->post('tgl_lahir'))),
            'email'      => trim(strip_tags($this->input->post('email')))
        );
        
        // $this->db->where('id', $LOCK_ID);
        // $update = $this->db->update('test_data', $data);
        $update = $this->db->insert('test_data', $data);
        return $update;
    }
    
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
