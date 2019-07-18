<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mod_umakses extends CI_Model{
	function __Conctruct() {
		parent::Model();
	}
    
    //--------------------------------------------------------------------------------------------------------------------------
    // CONTROL PANEL
    //--------------------------------------------------------------------------------------------------------------------------
    
    function saveLogCapt() {
        
		$data = array(
			'logs_capt_code'	     => trim(strip_tags($this->input->post('logs_capt_code'))),
			'logs_capt_desc'	     => trim(strip_tags($this->input->post('logs_capt_desc'))),
			'logs_capt_insert'	     => $this->session->userdata('sess_apps_uid')
		);
		
		$query = $this->db->insert('jawata_logs_caption', $data);
            return $query;
	}
    
    
    function saveTMASTERLIST() {
        
        $tanggal_subkon				= trim(strip_tags($this->input->post('tgl_kontrak')));
        $tanggal_rkbi				= trim(strip_tags($this->input->post('tanggal_rkbi')));
        $tanggalsubkon = date('Y/m/d',strtotime($tanggal_subkon));
        $tanggalrkbi = date('Y/m/d',strtotime($tanggal_rkbi));
        
        $data = array(
            'nomor_rkbi'          => trim(strip_tags($this->input->post('nomor_rkbi'))),
            'tanggal_rkbi'              => trim(strip_tags($tanggalrkbi)),
            'm_kkks_id'          => trim(strip_tags($this->input->post('m_kkks_id'))),
            'm_kkks_daop_id'              => trim(strip_tags($this->input->post('m_kkks_daop_id'))),
            'nama_subkon'          => trim(strip_tags($this->input->post('namasubkon'))),
            'no_kontrak_subkon'              => trim(strip_tags($this->input->post('no_subkontrak'))),
            'tanggal_subkon'          => trim(strip_tags($tanggalsubkon)),
            'status_barang'              => trim(strip_tags($this->input->post('status_barang'))),
            'kpbc'              => trim(strip_tags($this->input->post('kpbc'))),
            'nama_pic'          => trim(strip_tags($this->input->post('nama_pic'))),
            'nomor_hp'              => trim(strip_tags($this->input->post('nomor_hp'))),
            'nama_email'          => trim(strip_tags($this->input->post('nama_email'))),
            'm_jenis_rkbi_id'              => trim(strip_tags($this->input->post('m_jenis_rkbi_id'))),
            'm_subkontraktor_id'              => trim(strip_tags($this->input->post('m_subkontraktor_id'))),
            'createdby'     => $this->session->userdata('sess_apps_uid'),
            'created'       => getDateTime(),
            'updatedby'     => $this->session->userdata('sess_apps_uid'),
            'updated'       => getDateTime()
        );
        $this->db->trans_complete();
        $query = $this->db->insert('t_masterlist', $data);
        //return $query;
        return $this->db->insert_id();
    }
    
    function saveTMasterlisKimap($mkimapid, $msubkimapid, $uraian, $kondisi, $tarif, $jumlah, $msatuanid, $perkiraannilai, $lokasi, $tujuan, $keterangan, $ppn, $tmasterlistid) {
        
        $data = array(
            'm_kimap_id'          => trim(strip_tags($mkimapid)),
            'm_subkimap_id'      => trim(strip_tags($msubkimapid)),
            'uraian'          => trim(strip_tags($uraian)),
            'kondisi'      => trim(strip_tags($kondisi)),
            'tarif'          => trim(strip_tags($tarif)),
            'jumlah'      => trim(strip_tags($jumlah)),
            'm_satuan_id'          => trim(strip_tags($msatuanid)),
            'perkiraan_nilai'      => trim(strip_tags($perkiraannilai)),
            'lokasi'          => trim(strip_tags($lokasi)),
            'tujuan'      => trim(strip_tags($tujuan)),
            'keterangan'          => trim(strip_tags($keterangan)),
            'ppn'      => trim(strip_tags($ppn)),
            't_masterlist_id'          => trim(strip_tags($tmasterlistid)),
            'createdby'     => $this->session->userdata('sess_apps_uid'),
            'created'       => getDateTime(),
            'updatedby'     => $this->session->userdata('sess_apps_uid'),
            'updated'       => getDateTime()
        );
        
        $query = $this->db->insert('t_masterlist_kimap', $data);    
        return $query;
    }
	
    
	function savetmasterlistkimap() {
        
        $data = array(
            'm_kimap_id'          => trim(strip_tags($this->input->post('m_kimap_id', TRUE))),
            'm_subkimap_id'      => trim(strip_tags($this->input->post('m_subkimap_id', TRUE))),
            'uraian'           => (($this->input->post('uraian', TRUE))),
            'kondisi'    => trim(strip_tags($this->input->post('kondisi', TRUE))),
            'tarif'    => trim(strip_tags($this->input->post('tarif', TRUE))),
            'jumlah'    => trim(strip_tags($this->input->post('jumlah', TRUE))),
            'm_satuan_id'    => trim(strip_tags($this->input->post('m_satuan_id', TRUE))),
            'perkiraan_nilai'    => trim(strip_tags($this->input->post('perkiraan_nilai', TRUE))),
            'lokasi'    => trim(strip_tags($this->input->post('lokasi', TRUE))),
            'tujuan'    => (($this->input->post('tujuan', TRUE))),
            'keterangan'    => (($this->input->post('keterangan', TRUE))),
            't_masterlist_id'    => trim(strip_tags($this->input->post('t_masterlist_id', TRUE))),
			
            'createdby'     => $this->session->userdata('sess_apps_uid', TRUE),
            'created'       => getDateTime(),
            'updatedby'     => $this->session->userdata('sess_apps_uid', TRUE),
            'updated'       => getDateTime()
        );
        
        $query = $this->db->insert('t_masterlist_kimap', $data);
            return $query;
    }
    
    function saveTMasterlisNumber($tmasterlistid, $regnumberol, $nomorseqol ) {
        
        $data = array(
            'tanggal_reg_number_ol'          => getDateTime(),
            'nomor_seq_ol'          => $nomorseqol,
            'reg_number_ol'          => $regnumberol,
            't_masterlist_id'          => trim(strip_tags($tmasterlistid)),
            'm_jenis_rkbi_id'          => "1",
            'createdby'     => $this->session->userdata('sess_apps_uid'),
            'created'       => getDateTime(),
            'updatedby'     => $this->session->userdata('sess_apps_uid'),
            'updated'       => getDateTime()
        );
        
        $query = $this->db->insert('t_masterlist_number', $data);    
        return $query;
    }
    
    
    
    function saveTMasterlistFile($tmasterlistid, $file1a, $file1b, $file1c, $file2, $file3a, $file3b, $file3c, $file4a, $file4b, $file_4c, $file5a, $file5b, $file6, $file7 ) {
        
        $data = array(
            't_masterlist_id'          => trim(strip_tags($tmasterlistid)),
            'file_1a'      => trim(strip_tags($file1a)),
            'file_1b'          => trim(strip_tags($file1b)),
            'file_1c'      => trim(strip_tags($file1c)),
            'file_2'          => trim(strip_tags($file2)),
            'file_3a'      => trim(strip_tags($file3a)),
            'file_3b'          => trim(strip_tags($file3b)),
            'file_3c'      => trim(strip_tags($file3c)),
            'file_4a'          => trim(strip_tags($file4a)),
            'file_4b'      => trim(strip_tags($file4b)),
            'file_4c'          => trim(strip_tags($file_4c)),
            'file_5a'      => trim(strip_tags($file5a)),
            'file_5b'      => trim(strip_tags($file5b)),
            'file_6'          => trim(strip_tags($file6)),
            'file_7'          => trim(strip_tags($file7)),
            'createdby'     => $this->session->userdata('sess_apps_uid'),
            'created'       => getDateTime(),
            'updatedby'     => $this->session->userdata('sess_apps_uid'),
            'updated'       => getDateTime()
        );
        
        $query = $this->db->insert('t_masterlist_file', $data);    
        return $query;
    }
    
    function updateTMasterlistStatus($LOCK_VAR) {
        $data = array(
            'selesai'          => "Y",
            'updatedby'     => $this->session->userdata('sess_apps_uid'),
            'updated'       => getDateTime()
        );


        $this->db->where('t_masterlist_id', $LOCK_VAR);
        $update = $this->db->update('t_masterlist', $data);
        return $update;
    }
    
    function updateTMasterlistStatusLoket($LOCK_ID) {
        
        $tanggalsuratpengantar     = trim(strip_tags($this->input->post('tanggal_surat_pengantar')));
        $tanggalsuratpengantar = date('Y/m/d',strtotime($tanggalsuratpengantar));

        
        $data = array(
            'surat_pengantar'          => trim(strip_tags($this->input->post('surat_pengantar'))),
            'tanggal_surat_pengantar'              => trim(strip_tags($tanggalsuratpengantar)),
            'm_selesai_loket_id'          => trim(strip_tags($this->input->post('m_selesai_loket_id'))),
            'updatedby'     => $this->session->userdata('sess_apps_uid'),
            'updated'       => getDateTime()
        );


        $this->db->where('t_masterlist_id', $LOCK_ID);
        $update = $this->db->update('t_masterlist', $data);
        return $update;
    }

    
    function filter_data(){
        if (isset($_GET['filterscount']))
    {
            $filterscount = $_GET['filterscount'];

            if ($filterscount > 0)
            {
                $where = "(";
                $tmpdatafield = "";
                $tmpfilteroperator = "";
                for ($i=0; $i < $filterscount; $i++)
                {
                    // get the filter's value.
                    $filtervalue = $_GET["filtervalue" . $i];
                    // get the filter's condition.
                    $filtercondition = $_GET["filtercondition" . $i];
                    // get the filter's column.
                    $filterdatafield = $_GET["filterdatafield" . $i];
                    // get the filter's operator.
                    $filteroperator = $_GET["filteroperator" . $i];

                    if ($tmpdatafield == "")
                    {
                        $tmpdatafield = $filterdatafield;            
                    }
                    else if ($tmpdatafield <> $filterdatafield)
                    {
                        $where .= ")AND(";
                    }
                    else if ($tmpdatafield == $filterdatafield)
                    {
                        if ($tmpfilteroperator == 0)
                        {
                                $where .= " AND ";
                        }
                        else $where .= " OR ";    
                    }

                    // build the "WHERE" clause depending on the filter's condition, value and datafield.
                    switch($filtercondition)
                    {
                        case "CONTAINS":
                                $where .= " " . $filterdatafield . " LIKE '%" . $filtervalue ."%'";
                                break;
                        case "DOES_NOT_CONTAIN":
                                $where .= " " . $filterdatafield . " NOT LIKE '%" . $filtervalue ."%'";
                                break;
                        case "EQUAL":
                                $where .= " " . $filterdatafield . " = '" . $filtervalue ."'";
                                break;
                        case "NOT_EQUAL":
                                $where .= " " . $filterdatafield . " <> '" . $filtervalue ."'";
                                break;
                        case "GREATER_THAN":
                                $where .= " " . $filterdatafield . " > '" . $filtervalue ."'";
                                break;
                        case "LESS_THAN":
                                $where .= " " . $filterdatafield . " < '" . $filtervalue ."'";
                                break;
                        case "GREATER_THAN_OR_EQUAL":
                                $where .= " " . $filterdatafield . " >= '" . $filtervalue ."'";
                                break;
                        case "LESS_THAN_OR_EQUAL":
                                $where .= " " . $filterdatafield . " <= '" . $filtervalue ."'";
                                break;
                        case "STARTS_WITH":
                                $where .= " " . $filterdatafield . " LIKE '" . $filtervalue ."%'";
                                break;
                        case "ENDS_WITH":
                                $where .= " " . $filterdatafield . " LIKE '%" . $filtervalue ."'";
                                break;
                    }

                    if ($i == $filterscount - 1)
                    {
                        $where .= ")";
                    }

                    $tmpfilteroperator = $filteroperator;
                    $tmpdatafield = $filterdatafield;            
                }
                // build the query.
                return $this->db->where($where);
            }
    }
    }
            
    function result(){
    $pagenum = $_GET['pagenum'];
    $pagesize = $_GET['pagesize'];
    $start = $pagenum * $pagesize;
        
        // filter data.
    $this->filter_data();
        
        if (isset($_GET['sortdatafield']))
    {

            $sortfield = $_GET['sortdatafield'];
            $sortorder = $_GET['sortorder'];

            if ($sortorder != '')
            {
                if ($_GET['filterscount'] == 0)
                {
                        if ($sortorder == "desc")
                        {
                            $this->db->order_by($sortfield, "desc"); 
                        }
                        else if ($sortorder == "asc")
                        {
                            $this->db->order_by($sortfield, "asc"); 
                        }
                }
                else
                {
                    if ($sortorder == "desc")
                    {
                        $this->db->order_by($sortfield, "desc"); 
                    }
                    else if ($sortorder == "asc")    
                    {
                        $this->db->order_by($sortfield, "asc"); 
                    }
                }        
            }
    }

        
        
        return $this->get(FALSE, $pagesize, $start);
    }
    
    function total_rows(){
        // filter data.
    $this->filter_data();
        return $this->get(TRUE);
    }
    
    
}
