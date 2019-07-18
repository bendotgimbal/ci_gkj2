<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class jadwal extends CI_Controller {
	
	function __construct() {
		parent::__construct();	
        $this->load->model('mod_apps');
        //$this->load->model('mod_getdata');
        $this->load->model('mod_mstjadwal');
        $this->load->model('mod_database_crm');
        $this->load->model('mod_database');
        $this->load->model('mod_deletedata');
        date_default_timezone_set('Asia/Jakarta');
	}
    
    public function index() {
        if ($this->session->userdata('sess_apps') == TRUE) {
            
            $data['STR_PAGE']       = 'PAGE_JADWAL';
            $data['TITLE']          = 'Master Jadwal';
            $data['SUB_TITLE']      = 'Data';
            
            $TABLE                  = "vw_mst_store_alfamart";
            $SORT_FIELD             = "msa_nama";
            $SORT_VAR               = "ASC";
            $QUERY1                 = "select uset_kode, uset_value1 from uti_setting where uset_modul = 'periode_call'";
            $QUERY2                 = "select kode_pd, nama from user_pd";

            $data['dataPRD']        = $this->mod_database_crm->getQuery($QUERY1);
            $data['dataPD']         = $this->mod_database_crm->getQuery($QUERY2);
            
            $data['dataAll']        = $this->mod_database_crm->getData($TABLE, $SORT_FIELD, $SORT_VAR);
            $data['list']          =  "0";
            
            
            
            $this->load->view('dashboard', $data);
            
        } else {
            $this->load->view('login');
        }
    }
    
    
    public function ListJadwal()
    {
         if ($this->session->userdata('sess_apps') == TRUE) {
            
             $data['STR_PAGE']       = 'PAGE_JADWAL';
             $data['TITLE']          = 'Master Jadwal';
             $data['SUB_TITLE']      = 'Data';
             
             $postTgl                = trim(strip_tags($this->input->post('postTgl')));
       
             $postTgl = date('Y/m/d',strtotime($postTgl));
            
             $LIST                  = "SELECT mst_store_alfamart.msa_kode, mst_store_alfamart.msa_nama, mst_store_alfamart.msa_alamat, mst_store_alfamart.msa_kecamatan, mst_store_alfamart.msa_kota, mst_store_alfamart.msa_provinsi, store_call.sc_muse_kode, store_call.sc_tanggal, store_call.sc_tanggal_periode  FROM store_call INNER JOIN crm.mst_store_alfamart ON store_call.sc_msa_kode = mst_store_alfamart.msa_kode  where sc_muse_kode = '".trim(strip_tags($this->input->post('postkdPD')))."' and sc_tanggal_periode = '".$postTgl."'";
             
             $QUERY1                 = "select uset_kode, uset_value1 from uti_setting where uset_modul = 'periode_call'";
             $QUERY2                 = "select kode_pd, nama from user_pd";
             
             $nilai = '2';
             echo "<script>
                        alert('$postTgl'); 
                      </script>";

             $data['dataPRD']        = $this->mod_database_crm->getQuery($QUERY1);
             $data['dataPD']         = $this->mod_database_crm->getQuery($QUERY2);
            
             $data['dataAll']        = $this->mod_database_crm->getQuery($LIST);
             $data['list']          =  "1";
             
             $this->load->view('dashboard', $data);
         
         }
         else {
            $this->load->view('login');
        }
        
    }
    
    public function getJadwal(){
        if ($this->session->userdata('sess_apps') == TRUE) {

            $QUERY1         = "select sc_msa_kode from store_call where sc_muse_kode = '".trim(strip_tags($this->input->post('postkdPD')))."' and sc_tanggal_periode = '".trim(strip_tags($this->input->post('postTgl')))."'";
            $data_msa_kode  =  $this->mod_database_crm->getQuery($QUERY1);

            if($data_msa_kode->num_rows() != 0 ){
                foreach ($data_msa_kode->result() as $keyjajal) {
                    echo $keyjajal->sc_msa_kode."|";
                }
            }
        } else {
            $this->load->view('login');
        }
    }

    public function saveJadwal(){
        if($this->session->userdata('sess_apps') == TRUE) {
            
            $QUERY = "delete from store_call where store_call.`sc_call`<>'Y' AND sc_muse_kode = '".trim(strip_tags($this->input->post('postkdPD')))."' and sc_tanggal_periode = '".trim(strip_tags($this->input->post('postTgl')))."'";
            $exJxRemove  = $this->mod_database_crm->getQuery($QUERY);

            $data = json_decode(stripslashes($_POST['jsonDat']));
            if(count($data) > 0){
                $QUERY = "insert into store_call (sc_muse_kode, sc_msa_kode, sc_tanggal, sc_tanggal_periode, sc_call) values ";
                foreach($data as $d){
                    $QUERY = $QUERY . "('".trim(strip_tags($this->input->post('postkdPD')))."','".$d."','".date("Ymd")."','".trim(strip_tags($this->input->post('postTgl')))."','N'),";
                }
                $QUERY = substr($QUERY, 0, strlen($QUERY)-1);
                $exJxInsert  = $this->mod_database_crm->getQuery($QUERY);
            }
            echo ("Data Update...");
        } else {
            $this->load->view('login');
        }
    }

    public function formadd() {
        if ($this->session->userdata('sess_apps') == TRUE) {
            
            $data['STR_PAGE']       = 'PAGE_MST_PD_ADDFORM';
            $data['TITLE']          = 'Master Product Development';
            $data['SUB_TITLE']      = 'Add New';

            $this->load->view('dashboard', $data);
            
        } else {
            $this->load->view('login');
        }
    }
    
    public function savedata() {
        if ($this->session->userdata('sess_apps') == TRUE) {
            
            $DESC		    = trim(strip_tags($this->input->post('kode_pd')));

            $TABLE          = 'user_pd';
            $LOCK_FIELD     = 'kode_pd';
            $LOCK_VAR       = $DESC;
            $checkData      = $this->mod_database_crm->getDataSelected($TABLE, $LOCK_FIELD, $LOCK_VAR);
            
            if($checkData->num_rows() > 0) {
                echo "<script>
                        alert('PD Code already exist.');
                        window.history.back();
                      </script>";
            } else {
                
                $this->mod_mstpd->savepd();
                redirect(base_url('mstpd'));
            }
            
        } else {
            $this->load->view('login');
        }
    }

    public function resetPasswordPD() {
        if ($this->session->userdata('sess_apps') == TRUE) {
        
            $LOCK_ID        = trim(strip_tags($this->input->post('kode_pd')));
            $TABLE          = 'user_pd';
            $LOCK_FIELD     = 'kode_pd';
            $this->mod_mstpd->changePassword($TABLE, $LOCK_FIELD, $LOCK_ID);
        
        } else {
            $this->load->view('login');
        }
    }
    
    public function trash($ID_CODE) {
		if($this->session->userdata('sess_apps') == TRUE) {
	       
            $TABLE_NAME = 'user_pd';
            $FIELD_LOCK = 'kode_pd';
            
            $query = $this->mod_deletedata->trashDataCRM($ID_CODE, $TABLE_NAME, $FIELD_LOCK);
            
            redirect(base_url('mstpd'));
            
		} else {
			$this->load->view('login');
		}
	}
    
    
    
    public function formUpdate($LOCK_ID) {
        if ($this->session->userdata('sess_apps') == TRUE) {
            
            $data['STR_PAGE']       = 'PAGE_MST_PD_FORMUPDATE';
            $data['TITLE']          = 'Master Product Development';
            $data['SUB_TITLE']      = 'Edit Data';
            
            $TABLE_NAME             = 'user_pd';
            $FIELD_LOCK             = 'kode_pd';
            $data['dataSelected']   = $this->mod_database_crm->getDataSelected($TABLE_NAME, $FIELD_LOCK, $LOCK_ID);

            $data['LOCK_ID']        = $LOCK_ID;
            
            $this->load->view('dashboard', $data);
            
        } else {
			$this->load->view('login');
		}
	}
    
    public function updatedata($LOCK_ID) {
        if ($this->session->userdata('sess_apps') == TRUE) {
                
            $this->mod_mstpd->updateStore($LOCK_ID);
            redirect(base_url('mstpd'));
            
        } else {
            $this->load->view('login');
        }
    }
    
    public function trashSelected() {
        
         
        
		if($this->session->userdata('sess_apps') == TRUE) {
            
            $TABLE_NAME     = 'user_pd';
            $FIELD_LOCK     = 'kode_pd';
            
            
            
            $data = json_decode(stripslashes($_POST['data']));
            foreach($data as $d){
                $ID_CODE    = $d;
                $query      = $this->mod_deletedata->trashDataCRM($ID_CODE, $TABLE_NAME, $FIELD_LOCK);
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
    
    
    
}