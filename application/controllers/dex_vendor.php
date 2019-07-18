<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dex_vendor extends CI_Controller {
	
	function __construct() {
		parent::__construct();	
        $this->load->model('mod_apps');
        $this->load->model('mod_getdata');
        $this->load->model('mod_umuser');
        $this->load->model('mod_database');
        $this->load->model('mod_deletedata');
        date_default_timezone_set('Asia/Jakarta');
	}
    
    public function index() {
        if ($this->session->userdata('sess_apps') == TRUE) {
            
            $data['STR_PAGE']       = 'PAGE_DEX_VENDOR';
            $data['TITLE']          = 'USER LOGIN';
            $data['SUB_TITLE']      = 'DEX Via - Vendor Status';
            
            $query = "select mrem_kode, mrem_keterangan, concat_ws('-',mrem_kode,mrem_keterangan) tipe_pod from atex.mst_remark where mrem_type = 'DEX'";
			$data['pod'] = $this->mod_database->getQuery($query);
			
			$query = "select customer_code, location, city from vendor.um_user where um_user_id = '".$this->session->userdata('u_id')."'";
			$data['cust'] = $this->mod_database->getQuery($query);

			$query = "select mkur_kode, mkur_nama, concat_ws('-',mkur_kode,mkur_nama) kode_kurir from atex.mst_kurir where mkur_status_aktif = '1'";
			$data['kurir'] = $this->mod_database->getQuery($query);

			$query = "select mven_kode, mven_nama, concat_ws('-',mven_kode,mven_nama) kode_kurir from atex.mst_vendor where mven_status = '1'";
			$data['Dvendor'] = $this->mod_database->getQuery($query);

			$query = "select mcty_kode, mcty_nama, concat_ws('-',mcty_kode,mcty_nama) master_city from atex.mst_city where mcty_upd_user ='ADMIN' order by mcty_kode asc";
			$data['MasterCity'] = $this->mod_database->getQuery($query);

			$query = "select date_format(current_date,'%d-%m-%y') as dateserver, time_format(current_time,'%H:%i') as timeserver";
			$data['TimeServerNow'] = $this->mod_database->getQuery($query);
			 
			$rsDCus = $data['cust']->row();
			$data['vendor'] = $rsDCus->customer_code;
			$data['locid'] = $rsDCus->location;
			$data['city'] = $rsDCus->city;
			$LocIDUser = $rsDCus->location;
			$rsDVen = $data['Dvendor']->row();

			$query = "select mswb_nomor from mst_waybill left join trs_via_vendor on (tvve_mswb_nomor = mswb_nomor) left join trs_status_waybill on tswb_mswb_nomor = mswb_nomor where tvve_status_proses = '1' and tvve_mven_kode = '".$data['vendor']."' and tswb_mswb_nomor is null";
            $data['AwbVendor'] = $this->mod_database->getQuery($query);
            
            $this->load->view('dashboard', $data);
            
        } else {
            $this->load->view('login');
        }
    }
    
    public function formadd() {
        if ($this->session->userdata('sess_apps') == TRUE) {
            
            $data['STR_PAGE']       = 'PAGE_DEX_VENDOR_ADDFORM';
            $data['TITLE']          = 'Add New';
            $data['SUB_TITLE']      = 'User Login Aplikasi';
            
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
				echo "error|AWB sudah di DEX atau VOID atau CLOSING silahkan Lihat di Trace and Track !!";
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

			$queryCusVen = "select mven_kode, mven_nama from atex.mst_vendor where mven_kode = '".$vendor."'";
			$dataCusVen= $this->mod_database->getQuery($queryCusVen);

			$rsDCusVen = $dataCusVen->row();
			$vendorCode = $rsDCusVen->mven_kode;
			$vendorName = $rsDCusVen->mven_nama;
			
			$nomor = mysql_real_escape_string($this->input->post('waybill'));
			$penerima = "";
			$tipe_pod = mysql_real_escape_string($this->input->post('tipe_pod'));
			$telp_terima = mysql_real_escape_string($this->input->post('telp_terima'));
			$tgl_actual = date('Y-m-d',strtotime(mysql_real_escape_string($this->input->post('tgl_actual'))));
			$jam_dex = date('H:i:s',strtotime(mysql_real_escape_string($this->input->post('jam_dex'))));
			$vanTime = strtotime("-120 minutes", strtotime($jam_dex));
			$jam_van = date('H:i:s',$vanTime);
			$sipTime = strtotime("-135 minutes", strtotime($jam_dex));
			$jam_sip = date('H:i:s',$sipTime);
			$mswb_pk= mysql_real_escape_string($this->input->post('mswb_pk'));
			$keterangan= mysql_real_escape_string($this->input->post('keterangan'));

			//baru
			$m_city= mysql_real_escape_string($this->input->post('master_city'));
			$m_citystring = explode("|",$m_city);
			$citycode = $m_citystring[0];
			$cityname = $m_citystring[1];

			$m_typepod= mysql_real_escape_string($this->input->post('tipe_pod'));
			$m_typepodstring = explode("|",$m_typepod);
			$typepodcode = $m_typepodstring[0];
			$typepodname = $m_typepodstring[1];

			$mswb_pk = "select lowb_mswb_pk from log_waybill where lowb_tanggal_trs='".$tgl_actual."'";
			$data_mswb_pk = $this->mod_database->getQuery($mswb_pk);
			$rsDWaybill = $data_mswb_pk->row();
			$m_mswb_pk = $rsDWaybill->lowb_mswb_pk;

			$queryTuju = "select ttwb_nomor, ttwb_mcus_mcty_kode, ttwb_mcus_kota, ttwb_mcus_mkcm_kode, ttwb_mcus_kecamatan, ttwb_mpen_mcty_kode, ttwb_mpen_kota, ttwb_mpen_mkcm_kode, ttwb_mpen_kecamatan from trs_transaksi_waybill where ttwb_nomor= '".$nomor."'";
			$dataTuju= $this->mod_database->getQuery($queryTuju);
			$rsDTuju = $dataTuju->row();
			$m_ttwb_mpen_mcty_kode= $rsDTuju->ttwb_mpen_mcty_kode;

			$queryUserLog = "select um_user_id, nama, customer_code, location, city from vendor.um_user where um_user_id = '".$this->session->userdata('u_id')."'";
			$dataUserLog= $this->mod_database->getQuery($queryUserLog);
			$rsDUserLog = $dataUserLog->row();
			$m_UserLogID= $rsDUserLog->um_user_id;
			$m_UserLogNama= $rsDUserLog->nama;
			$m_UserLogCode= $rsDUserLog->customer_code;
			$m_UserLogLoc= $rsDUserLog->location;
			$m_UserLogCity= $rsDUserLog->city;
			
			
			$query = "call p_init_data('ADMIN','y')";
			$query2 = "INSERT INTO trs_status_waybill (tswb_mswb_nomor
														,tswb_mswb_pk
														,tswb_type
														,tswb_tanggal
														,tswb_mrem_kode
														,tswb_mrem_ket
														,tswb_keterangan
														,tswb_tanggal_trs
														,tswb_penerima
														,tswb_kota_scan
														,tswb_jam_trs
														,tswb_telp)
                                values('".$nomor."'
                                		, '".$m_mswb_pk."'
                                		, 1 
                                		, '".$tgl_actual."'
                                		, '".$typepodcode."'
                                		, '".$typepodname."'
                                		,'".$keterangan."'
                                		, '".$tgl_actual."'
                                		, '".$penerima."'
                                		, '".$m_UserLogCity."'
                                		,'".$jam_dex."'
                                		,'".$telp_terima."')";
			$queryPOD = "INSERT INTO log_waybill (lowb_pk
												,lowb_status
												,lowb_mlok_pk
												,lowb_mlok_pk_edp
												,lowb_tanggal
												,lowb_jam
												,lowb_kode_user
												,lowb_user
												,lowb_mswb_pk
												,lowb_mswb_nomor
												,lowb_kode
												,lowb_keterangan
												,lowb_tipe_tujuan
												,lowb_kode_tujuan
												,lowb_type_app
												,lowb_kota_scan
												,lowb_tanggal_trs
												,lowb_jam_trs
												,lowb_tanggal_scan
												,lowb_jam_scan
												,lowb_tvve_nomor
												,lowb_mven_kode
												,lowb_mven_nama )
                                select f_get_pk() pk
                                				, 7
                                				, '".$m_UserLogLoc."'
                                				, '".$m_UserLogLoc."'
                                				, date(sysdate())
                                				, time(sysdate())
                                				, '".$m_UserLogCode."'
                                				, '".$m_UserLogNama."'
                                				, mswb_pk
                                				, mswb_nomor
                                				, 'DEX'
                                				, concat('TERKIRIM : ','".$typepodname."','/','".$keterangan."','/ PENERIMA : ', '".$penerima."' )
                                				, 1
                                				, '".$m_ttwb_mpen_mcty_kode."'
                                				, 'DEX'
                                				, '".$citycode."'
                                				, date(sysdate())
                                				, '".$jam_dex."'
                                				, date(sysdate())
                                				, time(sysdate())
                                				, tvve_nomor
                                				, '".$vendorCode."'
                                				, '".$vendorName."' 
                                        from mst_waybill left join trs_via_vendor on tvve_mswb_nomor = mswb_nomor and tvve_mven_kode = '".$vendor."' where mswb_nomor = '".$nomor."'";
            $queryVAN = "INSERT INTO log_waybill (lowb_pk
												,lowb_status
												,lowb_mlok_pk
												,lowb_mlok_pk_edp
												,lowb_tanggal
												,lowb_jam
												,lowb_kode_user
												,lowb_user
												,lowb_mswb_pk
												,lowb_mswb_nomor
												,lowb_kode
												,lowb_keterangan
												,lowb_tipe_tujuan
												,lowb_kode_tujuan
												,lowb_type_app
												,lowb_kota_scan
												,lowb_tanggal_trs
												,lowb_jam_trs
												,lowb_tanggal_scan
												,lowb_jam_scan
												,lowb_tvve_nomor
												,lowb_mven_kode
												,lowb_mven_nama )
                                select f_get_pk() pk
                                				, 5
                                				, '".$m_UserLogLoc."'
                                				, '".$m_UserLogLoc."'
                                				, date(sysdate())
                                				, time(sysdate())
                                				, '".$m_UserLogCode."'
                                				, '".$m_UserLogNama."'
                                				, mswb_pk
                                				, mswb_nomor
                                				, 'VAN'
                                				, 'VAN - RUNSHEET'
                                				, 1
                                				, '".$m_ttwb_mpen_mcty_kode."'
                                				, 'VAN'
                                				, '".$citycode."'
                                				, date(sysdate())
                                				, '".$jam_van."'
                                				, date(sysdate())
                                				, time(sysdate())
                                				, tvve_nomor
                                				, '".$vendorCode."'
                                				, '".$vendorName."' 
                                        from mst_waybill left join trs_via_vendor on tvve_mswb_nomor = mswb_nomor and tvve_mven_kode = '".$vendor."' where mswb_nomor = '".$nomor."'";
            $querySIP = "INSERT INTO log_waybill (lowb_pk
												,lowb_status
												,lowb_mlok_pk
												,lowb_mlok_pk_edp
												,lowb_tanggal
												,lowb_jam
												,lowb_kode_user
												,lowb_user
												,lowb_mswb_pk
												,lowb_mswb_nomor
												,lowb_kode
												,lowb_keterangan
												,lowb_tipe_tujuan
												,lowb_kode_tujuan
												,lowb_type_app
												,lowb_kota_scan
												,lowb_tanggal_trs
												,lowb_jam_trs
												,lowb_tanggal_scan
												,lowb_jam_scan
												,lowb_tvve_nomor
												,lowb_mven_kode
												,lowb_mven_nama )
                                select f_get_pk() pk
                                				, 4
                                				, '".$m_UserLogLoc."'
                                				, '".$m_UserLogLoc."'
                                				, date(sysdate())
                                				, time(sysdate())
                                				, '".$m_UserLogCode."'
                                				, '".$m_UserLogNama."'
                                				, mswb_pk
                                				, mswb_nomor
                                				, 'SIP'
                                				, 'SIP - TERIMA'
                                				, 1
                                				, '".$m_ttwb_mpen_mcty_kode."'
                                				, 'SIP'
                                				, '".$citycode."'
                                				, date(sysdate())
                                				, '".$jam_sip."'
                                				, date(sysdate())
                                				, time(sysdate())
                                				, tvve_nomor
                                				, '".$vendorCode."'
                                				, '".$vendorName."' 
                                        from mst_waybill left join trs_via_vendor on tvve_mswb_nomor = mswb_nomor and tvve_mven_kode = '".$vendor."' where mswb_nomor = '".$nomor."'";
			$result1 = $this->mod_database->getQuery($query);
			$result2 = $this->mod_database->getQuery($query2);	
			$result3 = $this->mod_database->getQuery($queryPOD);
			$result4 = $this->mod_database->getQuery($queryVAN);
			$result5 = $this->mod_database->getQuery($querySIP);
			
			if ($result2<>"1")
			{
				echo "<script>
                        alert('Gagal insert DEX Vendor status.');
                        window.history.back();
                      </script>";
				return;
			}
			if ($result3<>"1")
			{
				echo "<script>
                        alert('Gagal Insert Log DEX Vendor.');
                        window.history.back();
                      </script>";
				return;
			}
			if ($result4<>"1")
			{
				echo "<script>
                        alert('Gagal Insert Log DEX Vendor.');
                        window.history.back();
                      </script>";
				return;
			}
			if ($result5<>"1")
			{
				echo "<script>
                        alert('Gagal Insert Log DEX Vendor.');
                        window.history.back();
                      </script>";
				return;
			}
			echo "<script>
                        alert('set status DEX Vendor sukses.');
						javascript:location.href='".base_url('pod_vendor')."';
                  </script>";
        } else {
            $this->load->view('login');
        }
    }
    
    public function trash($ID_CODE) {
		if($this->session->userdata('sess_apps') == TRUE) {
	       
            $TABLE_NAME = 'um_user';
            $FIELD_LOCK = 'um_user_id';
            
            $query = $this->mod_deletedata->trashData($ID_CODE, $TABLE_NAME, $FIELD_LOCK);
            
            redirect(base_url('umuser'));
            
		} else {
			$this->load->view('login');
		}
	}
    
    
    
    public function formUpdate($LOCK_ID) {
        if ($this->session->userdata('sess_apps') == TRUE) {
            
            $data['STR_PAGE']       = 'PAGE_DEX_VENDOR_FORMUPDATE';
            $data['TITLE']          = 'Edit Forms';
            $data['SUB_TITLE']      = 'User Login';
            
            $TABLE_NAME             = 'um_user';
            $FIELD_LOCK             = 'um_user_id';
            $data['dataSelected']   = $this->mod_getdata->getDataSelected($TABLE_NAME, $FIELD_LOCK, $LOCK_ID);
            $data['LOCK_ID']        = $LOCK_ID;
            
            $this->load->view('dashboard', $data);
            
        } else {
			$this->load->view('login');
		}
	}
    
    public function updatedata($LOCK_ID) {
        if ($this->session->userdata('sess_apps') == TRUE) {
                
            $this->mod_umuser->updateUmUser($LOCK_ID);
            
            
            redirect(base_url('umuser'));
            
        } else {
            $this->load->view('login');
        }
    }
    
    public function trashSelected() {
        
         
        
		if($this->session->userdata('sess_apps') == TRUE) {
            
            $TABLE_NAME     = 'um_user';
            $FIELD_LOCK     = 'um_user_id';
            
            
            
            $data = json_decode(stripslashes($_POST['data']));
            foreach($data as $d){
                $ID_CODE    = $d;
                $query      = $this->mod_deletedata->trashData($ID_CODE, $TABLE_NAME, $FIELD_LOCK);
            }
            
            if($query == TRUE) {
                echo "success";
                
            } else {
                echo "error";
            }
            
		} else {
			$this->load->view('login');
		}
	}

	public function set_timezone() {
        if ($this->session->userdata('user_id')) {
            $this->db->select('timezone');
            $this->db->from($this->db->dbprefix . 'user');
            $this->db->where('user_id', $this->session->userdata('user_id'));
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                date_default_timezone_set($query->row()->timezone);
            } else {
                return false;
            }
        }
    }
    
}