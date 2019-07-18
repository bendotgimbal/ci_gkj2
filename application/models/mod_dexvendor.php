<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mod_dexvendor extends CI_Model{
    public $db_server;
    public $db2;
    
    function __Conctruct() {
        parent::Model();
    }
    
    public function __construct()
    {
        parent::__construct();
         $this->db2 = $this->load->database('default', TRUE);
    }
    
    //--------------------------------------------------------------------------------------------------------------------------
    // CONTROL PANEL
    //--------------------------------------------------------------------------------------------------------------------------
    
   function saveDataOrder() {
        
        if($this->input->post('status_kode') == "1"){
                $msa_cekcek = "1";
            }else{
                $msa_cekcek = "0";
            }

        $data = array(
            'lowdo_mswb_nomor'      => trim(strip_tags($this->input->post('lowdo_mswb_nomor'))),
            'lowdo_created'       => getDateTime(),
            'lowdo_updated'       => getDateTime(),
            'lowdo_shipment_nomor'      => trim(strip_tags($this->input->post('lowdo_shipment_nomor'))),
            'lowdo_cust_nama'    => trim(strip_tags($this->input->post('lowdo_cust_nama'))),
            'lowdo_cust_email' => trim(strip_tags($this->input->post('lowdo_cust_email'))),
            'lowdo_cust_telp'      => trim(strip_tags($this->input->post('lowdo_cust_telp'))),
            'lowdo_status_kode'  => trim(strip_tags($this->input->post('lowdo_status_kode'))),
            'lowdo_kode_user'       => trim(strip_tags($this->input->post('lowdo_kode_user'))),
            'lowdo_kode_toko'       => trim(strip_tags($this->input->post('lowdo_kode_toko'))),
            'lowdo_kode_ecommers'       => trim(strip_tags($this->input->post('lowdo_kode_ecommers'))),
            'lowdo_status_payment'       => trim(strip_tags($this->input->post('lowdo_status_payment'))),
            'lowdo_mount_payment'       => trim(strip_tags($this->input->post('lowdo_mount_payment'))),
            'lowdo_createdby'     => $this->session->userdata('sess_apps_uid'),
            'lowdo_updateby'     => $this->session->userdata('sess_apps_uid')
        );
        
        $query = $this->db2->insert('log_data_order', $data);
        return $query;
    }
    
    function updateStore($LOCK_ID) {

        if($this->input->post('status_kode') == "1"){
                $msa_cekcek = "1";
            }else{
                $msa_cekcek = "0";
            }

        $data = array(
            'lowdo_mswb_nomor'      => trim(strip_tags($this->input->post('lowdo_mswb_nomor'))),
            'lowdo_created'       => getDateTime(),
            'lowdo_updated'       => getDateTime(),
            'lowdo_shipment_nomor'      => trim(strip_tags($this->input->post('lowdo_shipment_nomor'))),
            'lowdo_cust_nama'    => trim(strip_tags($this->input->post('lowdo_cust_nama'))),
            'lowdo_cust_email' => trim(strip_tags($this->input->post('lowdo_cust_email'))),
            'lowdo_cust_telp'      => trim(strip_tags($this->input->post('lowdo_cust_telp'))),
            'lowdo_status_kode'  => trim(strip_tags($this->input->post('lowdo_status_kode'))),
            'lowdo_kode_user'       => trim(strip_tags($this->input->post('lowdo_kode_user'))),
            'lowdo_kode_toko'       => trim(strip_tags($this->input->post('lowdo_kode_toko'))),
            'lowdo_kode_ecommers'       => trim(strip_tags($this->input->post('lowdo_kode_ecommers'))),
            'lowdo_status_payment'       => trim(strip_tags($this->input->post('lowdo_status_payment'))),
            'lowdo_mount_payment'       => trim(strip_tags($this->input->post('lowdo_mount_payment'))),
            'lowdo_createdby'     => $this->session->userdata('sess_apps_uid'),
            'lowdo_updateby'     => $this->session->userdata('sess_apps_uid')
        );
        
        $this->db2->where('lowdo_mswb_nomor', $LOCK_ID);
        $update = $this->db2->update('log_data_order', $data);
        return $update;
    }

    
    
}
