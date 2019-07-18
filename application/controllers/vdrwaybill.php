<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class vdrwaybill extends CI_Controller {
	
	function __construct() {
		parent::__construct();	
        $this->load->model('mod_apps');
        $this->load->model('mod_getdata');
        $this->load->model('mod_database');

		$this->load->library('akses');
        date_default_timezone_set('Asia/Jakarta');
	}
    
    public function index() {
        if ($this->session->userdata('sess_apps') == TRUE) {
            
            $data['STR_PAGE']       = 'PAGE_VDR_REPORT';
            $data['TITLE']         = "REPORT VENDOR ASSIGNMENT WAYBILL";
            $data['SUB_TITLE']      = "Detail Data";
            
            $TABLE                  = "";
            
            //$TABLE = "v_store_location";
            
            $data['dataAll']        = "";
            $data['tgl_awal'] = date('Y/m/d');
            $data['tgl_akhir'] = date('Y/m/d');
            
            $this->load->view('dashboard', $data);
            
        } else {
            $this->load->view('login');
        }
    }
    
    
    
    
    public function carireport() {
        if ($this->session->userdata('sess_apps') == TRUE) {
            
            
            
            $tgl_awal = date('Y/m/d',strtotime($this->input->post('tgl_awal')));
            $tgl_akhir = date('Y/m/d',strtotime($this->input->post('tgl_akhir')));
            
			$data['STR_PAGE']       = "PAGE_REPORT_VDR";
            $data['TITLE']          = "REPORT VENDOR ASSIGNMENT WAYBILL";
            $data['SUB_TITLE']      = "Detail data dari ".$tgl_awal." s.d ". $tgl_akhir;
			
			
            $TABLE                  = "SELECT ttwb_tanggal_input, ttwb_nomor, ttwb_mpen_nama, CONCAT(ttwb_mpen_alamat1, ', ',ttwb_mpen_alamat2) ttwb_mpen_alamat1, 
										ttwb_mpen_mcty_kode, ttwb_mpen_kota, ttwb_mpen_mkcm_kode, ttwb_mpen_kecamatan, ttwb_mpro_kode,  ttwb_isi_paket, ttwb_qty,
										ttwb_kg, ttwb_kg_real,CONCAT(CAST(ttwb_tinggi AS CHAR),'x', CAST(ttwb_panjang AS CHAR),'x', CAST(ttwb_lebar AS CHAR)) kubikasi,
										last_state_app, last_kota, tgl_trs, jam_trs, ttwb_mcus_info,
										COALESCE(tswb_mrem_ket,'-') tswb_mrem_ket, COALESCE(tswb_penerima,'-') tswb_penerima, COALESCE(tswb_keterangan,'-') tswb_keterangan,
										COALESCE(tswb_telp,'-') tswb_telp, ttwb_note, ttwb_cod
									  FROM atex.trs_via_vendor, atex.trs_transaksi_waybill
    									LEFT JOIN 
											(SELECT lowb_mswb_nomor no_mswb, lowb_mlok_pk last_mlok_pk, lowb_status last_state,
                  								lowb_kode last_state_app, lowb_kota_scan last_kota, lowb_tanggal_trs tgl_trs, lowb_jam_trs jam_trs
                  							  FROM atex.trs_via_vendor, atex.log_waybill lw
                  								INNER JOIN (
                        							SELECT nomor, stst, uset_kode sts  FROM (
                            							SELECT lowb_mswb_nomor nomor, MAX(uset_value5) stst FROM  atex.uti_setting, atex.log_waybill, atex.trs_via_vendor
                            								WHERE lowb_mswb_nomor = tvve_mswb_nomor AND lowb_tanggal_trs BETWEEN '".$tgl_awal."' AND DATE_ADD('".$tgl_akhir."', INTERVAL 90 DAY)
                               								AND lowb_status = uset_kode AND uset_modul IN ('WBSC', 'WBSCL')
                               								AND uset_value4 IN ('T','V') GROUP BY lowb_mswb_nomor) dlw
                       									LEFT JOIN atex.uti_setting ON uset_modul IN ('WBSC', 'WBSCL')
                             								AND uset_value4 IN ('T','V','C') AND uset_value5 = stst) glw
                       									ON lw.lowb_mswb_nomor = nomor AND lowb_status = sts
                  									WHERE lowb_mswb_nomor = tvve_mswb_nomor AND lowb_tanggal_trs BETWEEN '".$tgl_awal."' AND DATE_ADD('".$tgl_akhir."', INTERVAL 160 DAY)
       											) lowb_trs ON ttwb_nomor = no_mswb
												 LEFT JOIN atex.trs_status_waybill 
												 	ON (tswb_mswb_nomor = ttwb_nomor AND tswb_type = IF(last_state_app = 'POD','1',IF(last_state_app = 'DEX','0','2')))
									WHERE tvve_mswb_nomor = ttwb_nomor
										AND ttwb_tanggal_input >=  '".$tgl_awal."' AND ttwb_tanggal_input <= '".$tgl_akhir."'
										AND tvve_mven_kode = '".$this->session->userdata('sess_vendor_code')."' GROUP BY ttwb_nomor
										Having last_state_app Not In ('SIP', 'VAN', 'POD', 'DEX')
									ORDER BY ttwb_tanggal_input, ttwb_nomor";
            
            //$TABLE = "v_store_location";
			
			
			
            $data['dataAll']        = $this->mod_database->getQuery($TABLE);
            $data['tgl_awal'] = $tgl_awal;
            $data['tgl_akhir'] = $tgl_akhir;
			$data['table'] = $TABLE;
            
            $this->load->view('dashboard', $data);
            
        } else {
            $this->load->view('login');
        }
    }
    
    
    
    
    
    
}