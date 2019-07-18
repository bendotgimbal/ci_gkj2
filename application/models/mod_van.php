<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mod_van extends CI_Model{
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
         $this->db2 = $this->load->database('default2', TRUE);
    }
    
    //--------------------------------------------------------------------------------------------------------------------------
    // CONTROL PANEL
    //--------------------------------------------------------------------------------------------------------------------------
    
    function savevan($pk, $lokid, $nomor, $tanggal, $jam) {
        
        
		$trsh_status_proses = 0;
        
        $data = array(
            'trsh_pk'          => trim(strip_tags($pk)),
            'trsh_mlok_pk'              => trim(strip_tags($lokid)),
            'trsh_tanggal'          => trim(strip_tags($tanggal)),
            'trsh_jam'              => trim(strip_tags($jam)),
            'trsh_nomor'          => trim(strip_tags($nomor)),
            'trsh_mkur_nama'              => trim(strip_tags($this->input->post('trsh_mkur_nama'))),
            'trsh_transporter'          => trim(strip_tags($this->session->userdata('sess_vendor_code'))),
            'trsh_status_proses'              => $trsh_status_proses,
			'trsh_status_ambil'              => $trsh_status_proses,
			'trsh_kota'              => trim(strip_tags($this->input->post('trsh_kota'))),
			'trsh_type'			=> $trsh_status_proses,
            'trsh_ins_user'     => $this->session->userdata('sess_apps_uid'),
            'trsh_ins_date'       => getDateTime(),
            'trsh_upd_user'     => $this->session->userdata('sess_apps_uid'),
            'trsh_upd_date'       => getDateTime()
        );
        $this->db->trans_complete();
        $query = $this->db->insert('atex.trs_runsheet_hdr', $data);
        return $query;
        //return $this->mod_database->insert_id();
    }
	
	function savevanheader($pk, $lokid, $nomor, $kurir, $kotavan) {
        $tanggal = date('Y-m-d');
		$jam = date('G:i:s');
        
		$trsh_status_proses = 0;
        
        $data = array(
            'trsh_pk'          => trim(strip_tags($pk)),
            'trsh_mlok_pk'              => trim(strip_tags($lokid)),
            'trsh_tanggal'          => trim(strip_tags($tanggal)),
            'trsh_jam'              => trim(strip_tags($jam)),
            'trsh_nomor'          => trim(strip_tags($nomor)),
            'trsh_mkur_nama'              => trim(strip_tags($kurir)),
            'trsh_transporter'          => trim(strip_tags($this->session->userdata('sess_vendor_code'))),
            'trsh_status_proses'              => $trsh_status_proses,
			'trsh_status_ambil'              => $trsh_status_proses,
			'trsh_kota'              => trim(strip_tags($kotavan)),
			'trsh_type'			=> $trsh_status_proses,
            'trsh_ins_user'     => $this->session->userdata('sess_apps_uid'),
            'trsh_ins_date'       => getDateTime(),
            'trsh_upd_user'     => $this->session->userdata('sess_apps_uid'),
            'trsh_upd_date'       => getDateTime()
        );
        $this->db->trans_complete();
        $query = $this->db->insert('atex.trs_runsheet_hdr', $data);
        return $query;
        //return $this->mod_database->insert_id();
    }
	
	function savevandetail($pk_detail, $pk, $tanggal, $jam, $awbpk, $lok_pk, $awb) {
        
                
        $data = array(
            'trsd_pk'          => trim(strip_tags($pk_detail)),
            'trsd_trsh_pk'              => trim(strip_tags($pk)),
            'trsd_tanggal_trs'          => trim(strip_tags($tanggal)),
            'trsd_jam_trs'              => trim(strip_tags($jam)),
            'trsd_mswb_pk'          => trim(strip_tags($awbpk)),
			'trsd_mswb_nomor'          => trim(strip_tags($awb)),
			'trsd_kode'          => "",
			'trsd_keterangan'          => "",	
			'trsd_comment'          => "",
			'trsd_penerima'          => "",	
			'trsd_penerima'          => 1,		
            'trsd_mswb_mlok_pk_edp'              => trim(strip_tags($lok_pk)),
            'trsd_ins_user'     => $this->session->userdata('sess_apps_uid'),
            'trsd_ins_date'       => getDateTime(),
            'trsd_upd_user'     => $this->session->userdata('sess_apps_uid'),
            'trsd_upd_date'       => getDateTime()
        );
        $this->db->trans_complete();
        $query = $this->db->insert('atex.trs_runsheet_dtl', $data);
        return $query;
        //return $this->mod_database->insert_id();
    }
	
	function savelogwaybill($pk_detail, $lokid, $lok_pk, $tanggalsystem, $jamsystem, $kurir, $awbpk, $awb, $keterangan, $tglinput, $jaminput, $kode_vendor, $lokasi, $vendornumber, $vendornama)
	//savelog($pk_detail, $lokid, $lok_pk, $tanggalsystem, $jamsystem, $kurir, $awbpk, $awb, $keterangan, $tglinput, $jaminput, $kode_vendor)
	 {
        
                
        $data = array(
            'lowb_pk'          => trim(strip_tags($pk_detail)),
            'lowb_mlok_pk'     => trim(strip_tags($lokid)),
            'lowb_mlok_pk_edp' => trim(strip_tags($lok_pk)),
            'lowb_tanggal'          => trim(strip_tags($tanggalsystem)),
			'lowb_jam'          => trim(strip_tags($jamsystem)),
			'lowb_tanggal_trs'          => trim(strip_tags($tglinput)),	
			'lowb_jam_trs'          => trim(strip_tags($jaminput)),	
			'lowb_status'      => 5,
			'lowb_kode_user'      => "",				
			'lowb_user'          => trim(strip_tags($this->session->userdata('sess_vendor_code'))),
			'lowb_mswb_pk'          => trim(strip_tags($awbpk)),
			'lowb_mswb_nomor'          => trim(strip_tags($awb)),
			'lowb_kode'          => trim(strip_tags("Van")),
			'lowb_keterangan'          => trim(strip_tags($keterangan)),
			'lowb_tipe_tujuan'          => 0,
			'lowb_kode_tujuan'		=> "",
			'lowb_type_app'          => "Van",	
			'lowb_kota_scan'          => trim(strip_tags($lokasi)),
            'lowb_tanggal_scan'     => trim(strip_tags($tanggalsystem)),
			'lowb_jam_scan'          => trim(strip_tags($jamsystem)),
			'lowb_tvve_nomor'		=> trim(strip_tags($vendornumber)),
            'lowb_mven_kode'     =>  trim(strip_tags($kode_vendor)),
			'lowb_mven_nama'     => trim(strip_tags($vendornama))
        );
		
		//'lowb_user'          => trim(strip_tags($kurir)),
        $this->db->trans_complete();
        $query = $this->db->insert('atex.log_waybill', $data);
        return $query;
        //return $this->mod_database->insert_id();
    }
	
    
}
