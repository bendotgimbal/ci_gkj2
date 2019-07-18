<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sip extends CI_Controller {
	
	function __construct() {
		parent::__construct();	
        $this->load->model('mod_apps');
        $this->load->model('mod_getdata');
		$this->load->model('mod_database');
        $this->load->model('mod_deletedata');
        date_default_timezone_set('Asia/Jakarta');
	}
    
    public function index() {
        if ($this->session->userdata('sess_apps') == TRUE) {
            
            $data['STR_PAGE']       = 'PAGE_SIP';
            $data['TITLE']          = 'MENU SIP';
            $data['SUB_TITLE']      = 'Entry Shipment Inbound Package Status';
          
			$this->load->view('dashboard', $data);
            
        } else {
            $this->load->view('login');
        }
    }
    
    public function getdata() {
        if ($this->session->userdata('sess_apps') == TRUE) {
            
            $data['STR_PAGE']       = 'PAGE_SIP_ENTRY';
            $data['TITLE']          = 'Add New';
            $data['SUB_TITLE']      = 'Set status SIP for waybills';
            
			$nomor = mysql_real_escape_string($this->input->post('nomor_manifest'));
			
			if ($nomor == "")
			{ $nomor = "undefined";}
			
			$query = "select customer_code from vendor.um_user where um_user_id = '".$this->session->userdata('u_id')."'";
			$data['cust'] = $this->mod_database->getQuery($query);
			 
			$rsDCus = $data['cust']->row();
			$vendor = $rsDCus->customer_code;
			/*
				$TABLE = "select tmd_mswb_nomor, ttwb_mpen_nama,REPLACE(REPLACE(REPLACE(concat_ws(' ',ttwb_mpen_alamat1, ttwb_mpen_alamat2), '\r', ''), '\n', ''),  '\r\n', '') ttwb_mpen_alamat, 
							ttwb_mpen_kota, ttwb_mpen_kecamatan from atex.trs_modis_dispath, atex.trs_transaksi_waybill 
							where ttwb_nomor = tmd_mswb_nomor and tmd_nomor_manifest = '$nomor' " ;
							//and tmd_pemberi = '$vendor' ";
				*/			
				$TABLE = "select tmd_nomor, ttwb_mpen_nama,
							REPLACE(REPLACE(REPLACE(concat_ws(' ',ttwb_mpen_alamat1, ttwb_mpen_alamat2), '\r', ''), '\n', ''),  '\r\n', '') ttwb_mpen_alamat,
							ttwb_mpen_kota, ttwb_mpen_kecamatan
						  from atex.trs_manifest_dtl, atex.trs_transaksi_waybill
							where ttwb_nomor = tmd_nomor and tmd_nomor_manifest = '$nomor'";

            $data['datasip']   = $this->mod_database->getQuery($TABLE);
			
			$data['nomor'] = $nomor;
            $this->load->view('dashboard', $data);
            
        } else {
            $this->load->view('login');
        }
    }
    
    public function savedata() {
        if ($this->session->userdata('sess_apps') == TRUE) {
            
		
			
			$query = "select customer_code, location, city from vendor.um_user where um_user_id = '".$this->session->userdata('u_id')."'";
			$data['cust'] = $this->mod_database->getQuery($query);
			 
			$rsDCus = $data['cust']->row();
			$vendor = $rsDCus->customer_code;
			$locID = $rsDCus->location;
			$city = $rsDCus->city;
			
			$datanya = json_decode(stripslashes($_POST['data']));
			
			
				  
			$ID_CODE = "";
            foreach($datanya as $d){
				if ($ID_CODE=="")
				{ $ID_CODE = "'".$d."'";}
				else
                 {$ID_CODE    .= ",'".$d."'";}
              									
            }	
			
			$query = "call p_init_data('ADMIN','y')";
			$query2 = "INSERT INTO log_waybill (lowb_pk,lowb_status,lowb_mlok_pk,lowb_mlok_pk_edp, lowb_tanggal, lowb_jam, lowb_user, lowb_mswb_pk, lowb_mswb_nomor,
                                                        lowb_kode, lowb_keterangan,lowb_tipe_tujuan,lowb_kode_tujuan,lowb_type_app,lowb_kota_scan,lowb_tanggal_trs, lowb_jam_trs, lowb_tanggal_scan, lowb_jam_scan )
                                select f_get_pk() pk, 4, '".$locID."', '".$locID."', date(sysdate()), time(sysdate()), '".$vendor."', mswb_pk, mswb_nomor, 'SIP',
                                                        'SIP', 0, '', 'SIP', '".$city."', date(sysdate()), time(sysdate()),date(sysdate()), time(sysdate()) 
                                                        from mst_waybill where mswb_nomor in (".$ID_CODE.")";

			$result1 = $this->mod_database->getQuery($query);
			$result2 = $this->mod_database->getQuery($query2);	
			
			echo "set status SIP sukses !!";
		    
        } else {
            $this->load->view('login');
        }
    }
    
   
    
    
}