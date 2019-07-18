<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pod extends CI_Controller {
	
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
            
            $data['STR_PAGE']       = 'PAGE_POD';
            $data['TITLE']          = 'MENU POD';
            $data['SUB_TITLE']      = 'Proof Of Delivery (POD) Status';
            
			$query = "select mrem_kode, mrem_keterangan, concat_ws('-',mrem_kode,mrem_keterangan) tipe_pod from atex.mst_remark where mrem_type = 'POD'";
			$data['pod'] = $this->mod_database->getQuery($query);
			
			$query = "select customer_code, location, city from vendor.um_user where um_user_id = '".$this->session->userdata('u_id')."'";
			$data['cust'] = $this->mod_database->getQuery($query);
			 
			$rsDCus = $data['cust']->row();
			$data['vendor'] = $rsDCus->customer_code;
			$data['locid'] = $rsDCus->location;
			$data['city'] = $rsDCus->city;
            
            $this->load->view('dashboard', $data);
            
        } else {
            $this->load->view('login');
        }
    }
    
    public function getdata() {
        if ($this->session->userdata('sess_apps') == TRUE) {
            
          
			$nomor = mysql_real_escape_string($this->input->post('waybill'));
			
			if ($nomor == "")
			{ $nomor = "undefined";}
			
			$query = "select customer_code from vendor.um_user where um_user_id = '".$this->session->userdata('u_id')."'";
			$data['cust'] = $this->mod_database->getQuery($query);
			 
			$rsDCus = $data['cust']->row();
			$vendor = $rsDCus->customer_code;
			
			
			$query = "select tswb_mrem_kode from atex.trs_status_waybill where tswb_mswb_nomor ='".$nomor."' and tswb_type in ( 1, 2, 3) ";
            $data   = $this->mod_database->getQuery($query);
			
			if ( $data->num_rows() >0)
			{
				echo "error|AWB sudah di POD atau VOID atau CLOSING silahkan Lihat di Trace and Track !!";
				return;
			}	
			
			$TABLE = "select ttwb_pk, ttwb_mcus_nama, ttwb_mpen_nama,
				REPLACE(REPLACE(REPLACE(concat_ws(' ',ttwb_mpen_alamat1, ttwb_mpen_alamat2, ttwb_mpen_kecamatan, ttwb_mpen_kota), '\r', ''), '\n', ''),  '\r\n', '') ttwb_mpen_alamat
				from trs_transaksi_waybill, log_waybill
				where ttwb_nomor = lowb_mswb_nomor
				and lowb_kode = 'SIP' and lowb_mswb_nomor = '$nomor' and lowb_user = '$vendor' order by lowb_tanggal_trs desc limit 1 " ;
							//and tmd_pemberi = '$vendor' ";
            $data   = $this->mod_database->getQuery($TABLE);
			
			if ( $data->num_rows() >0)
			{
				$rdData = $data->row();
				echo $rdData->ttwb_pk."|".$rdData->ttwb_mcus_nama."|".$rdData->ttwb_mpen_nama."|".$rdData->ttwb_mpen_alamat;
			}
			else
			{
				echo "error|Awb tidak ditemukan, atau belum dilakukan entry status SIP !";
				return;
			}
        } else {
            $this->load->view('login');
        }
    }
    
    public function savedata() {
        if ($this->session->userdata('sess_apps') == TRUE) {
            
			$query = "select customer_code, location, city from vendor.um_user where um_user_id = '".$this->session->userdata('u_id')."'";
			$dataven = $this->mod_database->getQuery($query);
			 
			$rsDCus = $dataven->row();
			$vendor = $rsDCus->customer_code;
			$locID = $rsDCus->location;
			$city = $rsDCus->city;
			
			$nomor = mysql_real_escape_string($this->input->post('waybill'));
			$penerima = mysql_real_escape_string($this->input->post('penerima'));
			$tipe_pod = mysql_real_escape_string($this->input->post('tipe_pod'));
			$telp_terima = mysql_real_escape_string($this->input->post('telp_terima'));
			$tgl_terima = date('Y-m-d',strtotime(mysql_real_escape_string($this->input->post('tgl_terima'))));
			$jam_terima = date('H:i:s',strtotime(mysql_real_escape_string($this->input->post('jam_terima'))));
			$mswb_pk= mysql_real_escape_string($this->input->post('mswb_pk'));
			$keterangan= mysql_real_escape_string($this->input->post('keterangan'));
			
			
			$query = "call p_init_data('ADMIN','y')";
			$query2 = "INSERT INTO trs_status_waybill (tswb_mswb_nomor,tswb_mswb_pk,tswb_type,tswb_tanggal,tswb_mrem_kode,tswb_mrem_ket,tswb_keterangan,tswb_tanggal_trs,tswb_penerima,tswb_kota_scan,tswb_jam_trs,tswb_telp)
                                values('".$nomor."', '".$mswb_pk."', 1 , date(sysdate()), '".$tipe_pod."', '','".$keterangan."', '".$tgl_terima."', '".$penerima."', '".$city."','".$jam_terima."','".$telp_terima."')";
			$query3 = "INSERT INTO log_waybill (lowb_pk,lowb_status,lowb_mlok_pk,lowb_mlok_pk_edp, lowb_tanggal, lowb_jam, lowb_user, lowb_mswb_pk, lowb_mswb_nomor,
                                                        lowb_kode, lowb_keterangan,lowb_tipe_tujuan,lowb_kode_tujuan,lowb_type_app,lowb_kota_scan,lowb_tanggal_trs, lowb_jam_trs, lowb_tanggal_scan, lowb_jam_scan, lowb_tvve_nomor, lowb_mven_kode,lowb_mven_nama )
                                select f_get_pk() pk, 7, '".$locID."', '".$locID."', date(sysdate()), time(sysdate()), '".$vendor."', mswb_pk, mswb_nomor, 'POD',
                                                        'POD', 0, '', 'POD', '".$city."', '".$tgl_terima."', '".$jam_terima."',date(sysdate()), time(sysdate()), tvve_nomor, tvve_mven_kode, tvve_mven_nama  
                                                        from mst_waybill left join trs_via_vendor on tvve_mswb_nomor = mswb_nomor and tvve_mven_kode = '".$vendor."' where mswb_nomor = '".$nomor."'";
			$result1 = $this->mod_database->getQuery($query);
			$result2 = $this->mod_database->getQuery($query2);	
			$result3 = $this->mod_database->getQuery($query3);	
			
			if ($result2<>"1")
			{
				echo "<script>
                        alert('Gagal insert POD status.');
                        window.history.back();
                      </script>";
				return;
			}
			if ($result3<>"1")
			{
				echo "<script>
                        alert('Gagal Insert Log POD.');
                        window.history.back();
                      </script>";
				return;
			}
			echo "<script>
                        alert('set status POD sukses.');
						javascript:location.href='".base_url('pod')."';
                  </script>";
        } else {
            $this->load->view('login');
        }
    }
    
    
    
    
    
}