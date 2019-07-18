<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class treport extends CI_Controller {
	
	function __construct() {
		parent::__construct();	
        $this->load->model('mod_apps');
        $this->load->model('mod_getdata');
        $this->load->model('mod_database');
        $this->load->model('mod_umuser');
        
        $this->load->model('mod_deletedata');
        date_default_timezone_set('Asia/Jakarta');
	}
    
    public function index() {
        if ($this->session->userdata('sess_apps') == TRUE) {
            
            $data['STR_PAGE']       = 'PAGE_REPORT';
            $data['TITLE']          = 'REPORT';
            $data['SUB_TITLE']      = 'Data';
            
            $TABLE                  = "SELECT tco_mcus_kota, SUM(jml_waybill) as jml_waybill, SUM(total_berat) as total_berat, SUM(total_revenue) as total_revenue FROM v_store_location GROUP BY tco_mcus_kota order by jml_waybill desc ";
            
            //$TABLE = "v_store_location";
            
            $data['dataAll']        = $this->mod_database->getQuery($TABLE);
            $data['tgl_awal'] = date('Y/m/d');
            $data['tgl_akhir'] = date('Y/m/d');
            
            $this->load->view('dashboard', $data);
            
        } else {
            $this->load->view('login');
        }
    }
    
    
    public function detailstore($store, $tglawal, $tglakhir) {
        if ($this->session->userdata('sess_apps') == TRUE) {
            
            $data['STR_PAGE']       = 'PAGE_REPORT_STORE';
            $data['TITLE']          = 'REPORT';
            $data['SUB_TITLE']      = 'Data';
            
                $store                = str_replace("%20", " ", $store);
                $TABLE                  = "SELECT tdo_kode_store, tdo_nama_store, tco_mcus_kota, SUM(jml_waybill) AS jml_waybill, SUM(total_berat) AS total_berat, 
SUM(total_revenue) AS total_revenue FROM v_store_location GROUP BY tdo_nama_store, tco_mcus_kota HAVING tco_mcus_kota='".$store."'
  ORDER BY tdo_nama_store, tco_mcus_kota ASC";
            
           
            
            //$TABLE = "v_store_location";
            
            $data['dataAll']        = $this->mod_database->getQuery($TABLE);
            $data['query'] = $TABLE;
            $this->load->view('dashboard', $data);
            
        } else {
            $this->load->view('login');
        }
    }
    
     public function detailcaristore($store, $tglawal, $tglakhir) {
        if ($this->session->userdata('sess_apps') == TRUE) {
            
            $data['STR_PAGE']       = 'PAGE_REPORT_CARI_STORE';
            $data['TITLE']          = 'REPORT';
            $data['SUB_TITLE']      = 'Data';
            
            
                $tglawal = str_replace("_", "/", $tglawal);
                $tglakhir = str_replace("_", "/", $tglakhir);
                $store                = trim(strip_tags($store));
                $store                = str_replace("%20", " ", $store);
                $TABLE                  = "SELECT tdo_nama_store, SUM(jml_waybill) as jml_waybill, SUM(total_berat) as total_berat, SUM(total_revenue) as total_revenue FROM
    atex.v_store_location_date where tco_mcus_kota='".$store."' and tco_tanggal >='".$tglawal."' and tco_tanggal<='".$tglakhir."'    GROUP BY tdo_nama_store;  ";
            
            //$TABLE = "v_store_location";
            
            $data['dataAll']        = $this->mod_database->getQuery($TABLE);
            $data['query'] = $TABLE;
            $this->load->view('dashboard', $data);
            
        } else {
            $this->load->view('login');
        }
    }
    
    public function carireport() {
        if ($this->session->userdata('sess_apps') == TRUE) {
            
            $data['STR_PAGE']       = 'PAGE_REPORT_CARI';
            $data['TITLE']          = 'REPORT';
            $data['SUB_TITLE']      = 'Data';
            
            $tgl_awal = date('Y/m/d',strtotime($this->input->post('tgl_awal')));
            $tgl_akhir = date('Y/m/d',strtotime($this->input->post('tgl_akhir')));
            
            $TABLE                  = "SELECT tco_mcus_kota, SUM(jml_waybill) as jml_waybill, SUM(total_berat) as total_berat, SUM(total_revenue) as total_revenue FROM
    atex.v_store_location_date where tco_tanggal >='".$tgl_awal."' and tco_tanggal<='".$tgl_akhir."'    GROUP BY tco_mcus_kota;  ";
            
            //$TABLE = "v_store_location";
            
            $data['dataAll']        = $this->mod_database->getQuery($TABLE);
            $data['tgl_awal'] = $tgl_awal;
            $data['tgl_akhir'] = $tgl_akhir;
            
            $this->load->view('dashboard', $data);
            
        } else {
            $this->load->view('login');
        }
    }
    
    
    
    
    
    
}