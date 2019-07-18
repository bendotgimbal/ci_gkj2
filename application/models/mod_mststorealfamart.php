<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mod_mststorealfamart extends CI_Model{
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
    
   function savemststore() {
        
        if($this->input->post('msa_aktif') == "1"){
                $msa_cekcek = "1";
            }else{
                $msa_cekcek = "0";
            }

        $data = array(
            'msa_kode'      => trim(strip_tags($this->input->post('msa_kode'))),
            'msa_nama'      => trim(strip_tags($this->input->post('msa_nama'))),
            'msa_alamat'    => trim(strip_tags($this->input->post('msa_alamat'))),
            'msa_kecamatan' => trim(strip_tags($this->input->post('msa_kecamatan'))),
            'msa_kota'      => trim(strip_tags($this->input->post('msa_kota'))),
            'msa_provinsi'  => trim(strip_tags($this->input->post('msa_provinsi'))),
            'msa_route'     => trim(strip_tags($this->input->post('msa_route'))),
            'msa_latlong'   => trim(strip_tags($this->input->post('msa_latlong'))),
            'msa_company'   => trim(strip_tags($this->input->post('msa_company'))),
            'msa_web'       => trim(strip_tags($this->input->post('msa_web'))),
            'msa_mkcm_kode' => trim(strip_tags($this->input->post('msa_mkcm_kode'))),
            'msa_aktif'     => $msa_cekcek,
            'msa_ins_user'  => $this->session->userdata('sess_apps_uid'),
            'msa_ins_date'  => getDateTime(),
            'msa_upd_user'  => $this->session->userdata('sess_apps_uid'),
            'msa_upd_date'  => getDateTime()
        );
        
        $query = $this->db2->insert('mst_store_alfamart', $data);
        return $query;
    }
    
    function updateStore($LOCK_ID) {

        if($this->input->post('msa_aktif') == "1"){
                $msa_cekcek = "1";
            }else{
                $msa_cekcek = "0";
            }

        $data = array(
            'msa_kode'      => trim(strip_tags($this->input->post('msa_kode'))),
            'msa_nama'      => trim(strip_tags($this->input->post('msa_nama'))),
            'msa_alamat'    => trim(strip_tags($this->input->post('msa_alamat'))),
            'msa_kecamatan' => trim(strip_tags($this->input->post('msa_kecamatan'))),
            'msa_kota'      => trim(strip_tags($this->input->post('msa_kota'))),
            'msa_provinsi'  => trim(strip_tags($this->input->post('msa_provinsi'))),
            'msa_route'     => trim(strip_tags($this->input->post('msa_route'))),
            'msa_latlong'   => trim(strip_tags($this->input->post('msa_latlong'))),
            'msa_company'   => trim(strip_tags($this->input->post('msa_company'))),
            'msa_web'       => trim(strip_tags($this->input->post('msa_web'))),
            'msa_mkcm_kode' => trim(strip_tags($this->input->post('msa_mkcm_kode'))),
            'msa_aktif'     => $msa_cekcek,
            'msa_ins_user'  => $this->session->userdata('sess_apps_uid'),
            'msa_ins_date'  => getDateTime(),
            'msa_upd_user'  => $this->session->userdata('sess_apps_uid'),
            'msa_upd_date'  => getDateTime()
        );
        
        $this->db2->where('msa_kode', $LOCK_ID);
        $update = $this->db2->update('mst_store_alfamart', $data);
        return $update;
    }

    
    
}
