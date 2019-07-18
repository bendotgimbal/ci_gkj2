<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class van extends CI_Controller {
	
	function __construct() {
		parent::__construct();	
        $this->load->model('mod_apps');
        $this->load->model('mod_getdata');
		$this->load->model('mod_database');
        $this->load->model('mod_deletedata');
		$this->load->model('mod_van');
		$this->load->library('akses');
        date_default_timezone_set('Asia/Jakarta');
	}
    
    public function index() {
        if ($this->session->userdata('sess_apps') == TRUE) {
            
            $data['STR_PAGE']       = 'PAGE_VAN';
            $data['TITLE']          = 'MENU VAN';
            $data['SUB_TITLE']      = 'Entry VAN Status';
          
			$this->load->view('dashboard', $data);
            
        } else {
            $this->load->view('login');
        }
    }
    
    
    
    public function savedata() {
        if ($this->session->userdata('sess_apps') == TRUE) {
            
			$vendor = $this->session->userdata('sess_vendor_code');
			$locID = $this->session->userdata('sess_cabang');
			$city =  $this->session->userdata('sess_kota');
			$tgl = date('Y-m-d');
			$jam = date('G:i:s');
			$tanggalform = trim(strip_tags($this->input->post('tanggal')));
			 $tanggalform = date('Y/m/d',strtotime($tanggalform)); 		 
			 $jamform	= trim(strip_tags($this->input->post('jam')));
			 $jamform = date('G:i:s',strtotime($jamform));
			
			//$datanya = json_decode(stripslashes($_POST['data']));
			
			
			$query = "call p_init_data('ADMIN','y')";
			$query2 = "select f_get_pk() pk";
			$query3 = "select f_get_no('".$locID."','DV','".$tgl."','M') hasil";

			$result1 = $this->mod_database->getQuery($query);
			$result2 = $this->mod_database->getQuery($query2);
			$result3 = $this->mod_database->getQuery($query3);
			
			$rshasil = $result2->row();
			$pk = $rshasil->pk;
			
			$rsnomor = $result3->row();
			$nomor = $rsnomor->hasil; 
			
			
			 //$this->mod_van->savevan($pk, $locID, $nomor, $tgl, $jam);
			  $TABLE                  = "SELECT mcty_kode, mcty_nama FROM atex.mst_city where   mcty_kode ='".trim(strip_tags($this->input->post('trsh_kota')))."';";
            
            //$TABLE = "v_store_location";
            
            $rsTable        = $this->mod_database->getQuery($TABLE);
			
			
			//if($rsTable->num_rows() == 0) {
			//	$this->load->view('login');
			
			//}
			//else
			//{
			$rskota = $rsTable->row();
			$kota = "123";//trim(strip_tags($rskota->mcty_nama));;
			$kodekota = trim(strip_tags($this->input->post('trsh_kota')));
			$namakurir = trim(strip_tags($this->input->post('trsh_mkur_nama')));
			 
			 
			 $ID = $pk."*+*".$nomor."*+*".$kota."*+*".$namakurir."*+*".$tanggalform."*+*".$jamform."*+*".$kodekota;
			 $ID = $this->akses->encrypt($ID);
			 
			 redirect(base_url("van/entryawb/".$ID));
			 //}
			
		    
        } else {
            $this->load->view('login');
        }
    }
    
	public function entryawb()
	{
		if ($this->session->userdata('sess_apps') == TRUE) {
			 $data['STR_PAGE']       = 'PAGE_VAN_DETAIL';
             $data['TITLE']          = 'MENU AWB VAN';
             $data['SUB_TITLE']      = 'Entry AWB';
			 $tgl = date('Y-m-d');
			 $jam = date('G:i:s');
			 
        
			 
			 $parameter = $this->uri->segment(3);
			 $nilai_par = $this->akses->decrypt($parameter);
			 
			 $namapar = explode("*+*", $nilai_par);
			 
			 
			 $data['id'] = $parameter;
			 $data['trsh_nomor'] = $namapar[1];
			 $data['trsh_kota']=trim(strip_tags($namapar[2]));
			 $data['trsh_mkur_nama']= $namapar[3];
			 
			 $TABLE  = "SELECT mcty_kode, mcty_nama FROM atex.mst_city where   mcty_kode ='".trim(strip_tags($namapar[6]))."';";
			 $rsTable        = $this->mod_database->getQuery($TABLE);
			 $rskota = $rsTable->row();
			 
			 $data['trsh_kota'] = trim(strip_tags($rskota->mcty_nama));
			 //$kodekota = trim(strip_tags($this->input->post('trsh_kota')));
			 
			 
			 
			 $data['message']="";
			 
			 $query = "SELECT trs_transaksi_waybill.ttwb_nomor, trs_transaksi_waybill.ttwb_mpen_kota,
			  			CONCAT(trs_transaksi_waybill.ttwb_mpen_alamat1,' ', trs_transaksi_waybill.ttwb_mpen_alamat2) alamat
						, trs_transaksi_waybill.ttwb_mpen_kecamatan, trs_transaksi_waybill.ttwb_kg_real, trs_runsheet_hdr.trsh_pk
					   FROM atex.trs_runsheet_dtl
					      INNER JOIN atex.trs_transaksi_waybill
						     ON (trs_runsheet_dtl.trsd_mswb_nomor = trs_transaksi_waybill.ttwb_nomor)
    					  INNER JOIN atex.trs_runsheet_hdr
						     ON (trs_runsheet_hdr.trsh_pk = trs_runsheet_dtl.trsd_trsh_pk)
						where trs_runsheet_hdr.trsh_pk = '".$namapar[0]."';";
			 $data['dataAll'] = $this->mod_database->getQuery($query);;
			 
			 if ($_POST) {
			 	$this->form_validation->set_rules('trsh_nomor', 'Nomor AWB', 'required|numeric');
				$data['message']="Klik di button Save/Delete";	
				$this->load->view('dashboard', $data);
			}
			else{				 
			 	 $this->load->view('dashboard', $data);
			}
		}else {
            $this->load->view('login');
        }
		
	}
	
	public function saveawb()
	{
		if($this->session->userdata('sess_apps') == TRUE) {
			//$data = json_decode(stripslashes($_POST['data']));
			$query = "call p_init_data('ADMIN','y')";
			$query2 = "select f_get_pk() pk";
				
			$result1 = $this->mod_database->getQuery($query);
			$result2 = $this->mod_database->getQuery($query2);
			$locID = $this->session->userdata('sess_cabang');
			
			$rshasil = $result2->row();
			$pk_detail = $rshasil->pk;
			
			
			$query = "call p_init_data('ADMIN','y')";
			$query2 = "select f_get_pk() pk";
				
			$result3 = $this->mod_database->getQuery($query);
			$result4 = $this->mod_database->getQuery($query2);
			
			$rshasil1 = $result4->row();
			$pk_logwaybill = $rshasil1->pk;
			
			
			
			$data['awb'] = $this->input->post('awb');
			$data['id'] = $this->input->post('id');
			$data['message']="";
			
			//$parameter = $this->uri->segment(3);
			$nilai_par = $this->akses->decrypt($data['id']);
			
			
			//$ID = $pk."*+*".$nomor."*+*".$kota."*+*".$namakurir."*+*".$tanggalform."*+*".$jamform."*+*".$kodekota."*+*".$tgl."*+*".$jam;
			 
			$namapar = explode("*+*", $nilai_par);
			$data['pk'] = $namapar[0];
			$data['trsh_nomor'] = $namapar[1];
			//$data['trsh_kota']=$namapar[2];
			$data['nama_kurir']=$namapar[3];
			$data['tgl_entry']=$namapar[4];
			$data['jam_entry']=$namapar[5];
			$data['kodekota']=$namapar[6];
			
			$tgl = date('Y-m-d');
			$jam = date('G:i:s');
			
			$TABLE  = "SELECT mcty_kode, mcty_nama FROM atex.mst_city where   mcty_kode ='".trim(strip_tags($namapar[6]))."';";
			 $rsTable        = $this->mod_database->getQuery($TABLE);
			 $rskota = $rsTable->row();
			 
			 $data['trsh_kota'] = trim(strip_tags($rskota->mcty_nama));
			
			
			
			//echo $nilai1;
			
			$query = "SELECT trs_via_vendor.tvve_mswb_nomor, trs_via_vendor.tvve_mven_kode, trs_via_vendor.tvve_nomor, mst_vendor.mven_kode, mst_vendor.mven_nama
						FROM atex.trs_via_vendor
    						INNER JOIN atex.mst_vendor 
        						ON (trs_via_vendor.tvve_mven_kode = mst_vendor.mven_kode) 
								where tvve_mswb_nomor ='".$this->input->post('awb')."' and tvve_mven_kode = '".$this->session->userdata('sess_vendor_code')."' and 
								(SELECT ttwb_mpen_mcty_kode FROM atex.trs_transaksi_waybill WHERE ttwb_nomor = trs_via_vendor.tvve_mswb_nomor) = '".$data['kodekota']."';";
			
			$resultvendor = $this->mod_database->getQuery($query);
			
			if($resultvendor->num_rows() == 0) {
                $data['status'] = "Notfound";
				$data['hasil'] = "Tidak Ditemukan/Kota Tidak Sesuai";    
				
            } else {
                
				
				$queryAwb = "select mswb_pk, mswb_nomor from mst_waybill where mswb_nomor ='".$this->input->post('awb')."';";
				$rsTable        = $this->mod_database->getQuery($queryAwb);
				$rs = $rsTable->row();
				$awbpk = $rs->mswb_pk;
				
				$queryLok = "select ttwb_mlok_pk from trs_transaksi_waybill where ttwb_nomor ='".$this->input->post('awb')."';";
				$rsTable        = $this->mod_database->getQuery($queryLok);
				$rslok = $rsTable->row();
				$lok_edp = $rslok->ttwb_mlok_pk;
				
				$querydtl = "select trsd_mswb_nomor from trs_runsheet_dtl where trsd_mswb_nomor ='".$this->input->post('awb')."' and trsd_trsh_pk ='".$data['pk']."';";
				$rsdetail = $this->mod_database->getQuery($querydtl);
				
				if ($rsdetail->num_rows() > 0)
				{
					$data['status'] = "Notfound";
					$data['hasil'] = "Sudah di runsheet";
					
				}else
				{
					$keterangan = "VAN - Vendor : ". $data['nama_kurir'];
					//$this->mod_umuser->saveUmUser();
					$rshasilvv = $resultvendor->row();
					$vendornumber = $rshasilvv->tvve_nomor;
					$vendornama = $rshasilvv->mven_nama;
					
					

			 
			 
			 		//$ID = $pk."*+*".$nomor."*+*".$kota."*+*".$namakurir."*+*".$tanggalform."*+*".$jamform."*+*".$kodekota."*+*".$tgl."*+*".$jam;
					 
					$cekHeader = "Select trsh_nomor from atex.trs_runsheet_hdr where trsh_nomor ='".$data['trsh_nomor']."';";
					$rsHeader = $this->mod_database->getQuery($cekHeader);
				
					if ($rsHeader->num_rows() == 0)
					{
						//$vendor = $this->session->userdata('sess_vendor_code');
						
						//$city =  $this->session->userdata('sess_kota');
						//$this->mod_van->savevan($pk, $locID, $nomor, $tgl, $jam);
						$hasilquery = $this->mod_van->savevanheader($data['pk'], $locID, $data['trsh_nomor'], $data['nama_kurir'], $data['kodekota']);
						//$data['hasil'] = $data['pk'].":". $locID.":". $data['trsh_nomor'].":". $data['nama_kurir'].":". $data['kodekota'];
					}
					
					
					
					
                	$this->mod_van->savevandetail($pk_detail, $data['pk'], $tgl, $jam, $awbpk, $lok_edp, $data['awb']);
					$this->mod_van->savelogwaybill($pk_logwaybill, $this->session->userdata('sess_cabang'), $lok_edp, $tgl, $jam, $data['nama_kurir'], $awbpk, $this->input->post('awb'), $keterangan, $data['tgl_entry'], date('G:i:s', strtotime($data['jam_entry'])),  $this->session->userdata('sess_vendor_code'), $this->session->userdata('sess_kota'), $vendornumber, $vendornama);
					//($pk_detail, $lokid, $lok_pk, $tanggalsystem, $jamsystem, $kurir, $awbpk, $awb, $keterangan, $tglinput, $jaminput, $kode_vendor, $lokasi)
					
					              
            		$data['status'] = "";
					$data['hasil'] = "";
					//$data['pk'].":". $locID.":". $data['trsh_nomor'].":". $data['nama_kurir'].":". $data['kodekota'];
					
					
					//"";
					//$pk_logwaybill.":".$this->session->userdata('sess_cabang').":".$lok_edp.":".$tgl.":". $jam.":". $data['nama_kurir'].":". $awbpk.":".$this->input->post('awb').":".$keterangan.":".$data['tgl_entry'].":".date('G:i:s', strtotime($data['jam_entry'])).":".$this->session->userdata('sess_vendor_code').":".$this->session->userdata('sess_kota').":".$vendornumber.":".$vendornama;
					
				}    
				//echo json_encode($data);
            }
			 
			echo json_encode($data);
			
		}
	}
   
    
	public function deleteawb()
	{
		$data['awb'] = $this->input->post('awb');
		$data['id'] = $this->input->post('id');
		
		$nilai_par = $this->akses->decrypt($data['id']);
			 
		$namapar = explode("*+*", $nilai_par);
		$data['pk'] = $namapar[0];
		$data['trsh_nomor'] = $namapar[1];
		$data['trsh_kota']=$namapar[2];
		$data['nama_kurir']=$namapar[3];
		$data['tgl_entry']=$namapar[4];
		$data['jam_entry']=$namapar[5];
		$data['message']="";
		
		$query = "select trsd_mswb_nomor from trs_runsheet_dtl where trsd_mswb_nomor = '".$data['awb']."' and trsd_trsh_pk ='".$data['pk']."';";
		$result = $this->mod_database->getQuery($query);
		
		if ($result->num_rows() == 0)
		{
			$data['status'] = "Notfound";
			$data['hasil'] = "AWB tidak ada di runsheet";
		}else
		{
			$TABLE_NAME = 'atex.trs_runsheet_dtl';
            $FIELD_LOCK1 = 'trsd_trsh_pk';
			$FIELD_LOCK2 = 'trsd_mswb_nomor';
            
            $this->mod_deletedata->trashDatadoublekey($data['pk'], $FIELD_LOCK1, $data['awb'], $FIELD_LOCK2, $TABLE_NAME);
			$this->mod_deletedata->trashDatatriplekey($data['awb'], "lowb_mswb_nomor", $data['tgl_entry'], "lowb_tanggal_trs", $data['jam_entry'], "lowb_jam_trs", "atex.log_waybill");
			$data['status'] = "";
			$data['hasil'] = $data['pk'].":".$data['awb'];
		
		}
		echo json_encode($data);
		
		
	}
    
}