<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class branch_revenue extends CI_Controller {
	
	
	function __construct() {
		parent::__construct();	
        $this->load->model('mod_apps');
        $this->load->model('mod_getdata');
        $this->load->model('mod_database');
        $this->load->model('mod_umuser');
        $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
        $this->load->model('mod_deletedata');
        date_default_timezone_set('Asia/Jakarta');
	}
    
    public function index() {
        if ($this->session->userdata('sess_apps') == TRUE) {
            
            $data['STR_PAGE']       = 'BRANCH_REVENUE';
            $data['TITLE']          = 'REPORT MONTHLY BRANCH REVENUE';
            $data['SUB_TITLE']      = 'Report Monthly Branch Revenue';
       

			$TABLE = "select tahun, lowb_mlok_kode, max(pup_jan) pup_jan, max(pod_jan) pod_jan, max(inv_jan) inv_jan, max(inw_jan) inw_jan,
					max(pup_feb) pup_feb, max(pod_feb) pod_feb, max(inv_feb) inv_feb, max(inw_feb) inw_feb,
					max(pup_mar) pup_mar, max(pod_mar) pod_mar, max(inv_mar) inv_mar, max(inw_mar) inw_mar,
					max(pup_apr) pup_apr, max(pod_apr) pod_apr, max(inv_apr) inv_apr, max(inw_apr) inw_apr,
					max(pup_mei) pup_mei, max(pod_mei) pod_mei, max(inv_mei) inv_mei, max(inw_mei) inw_mei,
					max(pup_jun) pup_jun, max(pod_jun) pod_jun, max(inv_jun) inv_jun, max(inw_jun) inw_jun,
					max(pup_jul) pup_jul, max(pod_jul) pod_jul, max(inv_jul) inv_jul, max(inw_jul) inw_jul,
					max(pup_aug) pup_aug, max(pod_aug) pod_aug, max(inv_aug) inv_aug, max(inw_aug) inw_aug,
					max(pup_sep) pup_sep, max(pod_sep) pod_sep, max(inv_sep) inv_sep, max(inw_sep) inw_sep,
					max(pup_okt) pup_okt, max(pod_okt) pod_okt, max(inv_okt) inv_okt, max(inw_okt) inw_okt,
					max(pup_nov) pup_nov, max(pod_nov) pod_nov, max(inv_nov) inv_nov, max(inw_nov) inw_nov,
					max(pup_des) pup_des, max(pod_des) pod_des, max(inv_des) inv_des, max(inw_des) inw_des
					from(
					select year(lowb_tanggal_trs) tahun, lowb_mlok_kode,
					if(month(lowb_tanggal_trs)=1, sum(ttwb_total),0) pup_jan, 0 pod_jan, 0 inv_jan, 0 inw_jan,
					if(month(lowb_tanggal_trs)=2, sum(ttwb_total),0) pup_feb, 0 pod_feb, 0 inv_feb, 0 inw_feb,
					if(month(lowb_tanggal_trs)=3, sum(ttwb_total),0) pup_mar, 0 pod_mar, 0 inv_mar, 0 inw_mar,
					if(month(lowb_tanggal_trs)=4, sum(ttwb_total),0) pup_apr, 0 pod_apr, 0 inv_apr, 0 inw_apr,
					if(month(lowb_tanggal_trs)=5, sum(ttwb_total),0) pup_mei, 0 pod_mei, 0 inv_mei, 0 inw_mei,
					if(month(lowb_tanggal_trs)=6, sum(ttwb_total),0) pup_jun, 0 pod_jun, 0 inv_jun, 0 inw_jun,
					if(month(lowb_tanggal_trs)=7, sum(ttwb_total),0) pup_jul, 0 pod_jul, 0 inv_jul, 0 inw_jul,
					if(month(lowb_tanggal_trs)=8, sum(ttwb_total),0) pup_aug, 0 pod_aug, 0 inv_aug, 0 inw_aug,
					if(month(lowb_tanggal_trs)=9, sum(ttwb_total),0) pup_sep, 0 pod_sep, 0 inv_sep, 0 inw_sep,
					if(month(lowb_tanggal_trs)=10, sum(ttwb_total),0) pup_okt, 0 pod_okt, 0 inv_okt, 0 inw_okt,
					if(month(lowb_tanggal_trs)=11, sum(ttwb_total),0) pup_nov, 0 pod_nov, 0 inv_nov, 0 inw_nov,
					if(month(lowb_tanggal_trs)=12, sum(ttwb_total),0) pup_des, 0 pod_des, 0 inv_des, 0 inw_des
					from report.transaksi_waybill where year(lowb_tanggal_trs) = ".date('Y')."  and left(ttwb_nomor,1) in (1,3,7)
					group by year(lowb_tanggal_trs), lowb_mlok_kode, month(lowb_tanggal_trs)
					union ALL
					select year(lowb_tanggal_trs) tahun, lowb_mlok_kode,
					0 pup_jan, if(month(tgl_pod)=1, sum(ttwb_total),0) pod_jan, 0 inv_jan, 0 inw_jan,
					0 pup_feb, if(month(tgl_pod)=2, sum(ttwb_total),0) pod_feb, 0 inv_feb, 0 inw_feb,
					0 pup_mar, if(month(tgl_pod)=3, sum(ttwb_total),0) pod_mar, 0 inv_mar, 0 inw_mar,
					0 pup_apr, if(month(tgl_pod)=4, sum(ttwb_total),0) pod_apr, 0 inv_apr, 0 inw_apr,
					0 pup_mei, if(month(tgl_pod)=5, sum(ttwb_total),0) pod_mei, 0 inv_mei, 0 inw_mei,
					0 pup_jun, if(month(tgl_pod)=6, sum(ttwb_total),0) pod_jun, 0 inv_jun, 0 inw_jun,
					0 pup_jul, if(month(tgl_pod)=7, sum(ttwb_total),0) pod_jul, 0 inv_jul, 0 inw_jul,
					0 pup_aug, if(month(tgl_pod)=8, sum(ttwb_total),0) pod_aug, 0 inv_aug, 0 inw_aug,
					0 pup_sep, if(month(tgl_pod)=9, sum(ttwb_total),0) pod_sep, 0 inv_sep, 0 inw_sep,
					0 pup_okt, if(month(tgl_pod)=10, sum(ttwb_total),0) pod_okt, 0 inv_okt, 0 inw_okt,
					0 pup_nov, if(month(tgl_pod)=11, sum(ttwb_total),0) pod_nov, 0 inv_nov, 0 inw_nov,
					0 pup_des, if(month(tgl_pod)=12, sum(ttwb_total),0) pod_des, 0 inv_des, 0 inw_des
					from report.transaksi_waybill where year(tgl_pod) = ".date('Y')."  and left(ttwb_nomor,1) in (1,3,7)
					group by year(tgl_pod), lowb_mlok_kode, month(tgl_pod)
					union all
					select year(lowb_tanggal_trs) tahun, lowb_mlok_kode,
					0 pup_jan, 0 pod_jan, if(month(tgl_inv)=1, sum(ttwb_total),0) inv_jan, 0 inw_jan,
					0 pup_feb, 0 pod_feb, if(month(tgl_inv)=2, sum(ttwb_total),0) inv_feb, 0 inw_feb,
					0 pup_mar, 0 pod_mar, if(month(tgl_inv)=3, sum(ttwb_total),0) inv_mar,0 inw_mar,
					0 pup_apr, 0 pod_apr, if(month(tgl_inv)=4, sum(ttwb_total),0) inv_apr, 0 inw_apr,
					0 pup_mei, 0 pod_mei, if(month(tgl_inv)=5, sum(ttwb_total),0) inv_mei, 0 inw_mei,
					0 pup_jun, 0 pod_jun, if(month(tgl_inv)=6, sum(ttwb_total),0) inv_jun, 0 inw_jun,
					0 pup_jul, 0 pod_jul, if(month(tgl_inv)=7, sum(ttwb_total),0) inv_jul, 0 inw_jul,
					0 pup_aug, 0 pod_aug, if(month(tgl_inv)=8, sum(ttwb_total),0) inv_aug, 0 inw_aug,
					0 pup_sep, 0 pod_sep, if(month(tgl_inv)=9, sum(ttwb_total),0) inv_sep, 0 inw_sep,
					0 pup_okt, 0 pod_okt, if(month(tgl_inv)=10, sum(ttwb_total),0) inv_okt, 0 inw_okt,
					0 pup_nov, 0 pod_nov, if(month(tgl_inv)=11, sum(ttwb_total),0) inv_nov, 0 inw_nov,
					0 pup_des, 0 pod_des, if(month(tgl_inv)=12, sum(ttwb_total),0) inv_des, 0 inw_des
					from report.transaksi_waybill where year(tgl_inv) = ".date('Y')."  and left(ttwb_nomor,1) in (1,3,7)
					group by year(tgl_inv), lowb_mlok_kode, month(tgl_inv)
					union all
					select year(arsh_tanggal), arsh_mlok_kode,
					0 pup_jan, 0 pod_jan, 0 inv_jan, if(month(arsh_tanggal)=1,sum(arsh_nilai),0) inw_jan,
					0 pup_feb, 0 pod_feb, 0 inv_feb, if(month(arsh_tanggal)=2,sum(arsh_nilai),0) inw_feb,
					0 pup_mar, 0 pod_mar, 0 inv_mar, if(month(arsh_tanggal)=3,sum(arsh_nilai),0) inw_mar,
					0 pup_apr, 0 pod_apr, 0 inv_apr, if(month(arsh_tanggal)=4,sum(arsh_nilai),0) inw_apr,
					0 pup_mei, 0 pod_mei, 0 inv_mei, if(month(arsh_tanggal)=5,sum(arsh_nilai),0) inw_mei,
					0 pup_jun, 0 pod_jun, 0 inv_jun, if(month(arsh_tanggal)=6,sum(arsh_nilai),0) inw_jun,
					0 pup_jul, 0 pod_jul, 0 inv_jul, if(month(arsh_tanggal)=7,sum(arsh_nilai),0) inw_jul,
					0 pup_aug, 0 pod_aug, 0 inv_aug, if(month(arsh_tanggal)=8,sum(arsh_nilai),0) inw_aug,
					0 pup_sep, 0 pod_sep, 0 inv_sep, if(month(arsh_tanggal)=9,sum(arsh_nilai),0) inw_sep,
					0 pup_okt, 0 pod_okt, 0 inv_okt, if(month(arsh_tanggal)=10,sum(arsh_nilai),0) inw_okt,
					0 pup_nop, 0 pod_nop, 0 inv_nop, if(month(arsh_tanggal)=11,sum(arsh_nilai),0) inw_nop,
					0 pup_des, 0 pod_des, 0 inv_des, if(month(arsh_tanggal)=12,sum(arsh_nilai),0) inw_des
					from report.sales_invoice where arsh_mcom_kode = 'AA' and arsh_tipe = 'N' and year(arsh_tanggal) = ".date('Y')."  and arsh_status_koreksi = 0
					group by year(arsh_tanggal), arsh_mlok_kode, month(arsh_tanggal)
					) groupnya  group by tahun, lowb_mlok_kode";
					
					$tablechart = "select bulan, max(pup) pup, max(pod) pod, max(inv) inv, max(inw) inw
								from(
								select month(lowb_tanggal_trs) bulan, sum(ttwb_total) pup , 0 pod, 0 inv, 0 inw
								from report.transaksi_waybill where year(lowb_tanggal_trs) = ".date('Y')." and left(ttwb_nomor,1) in (1,3,7) and ifnull(lowb_tanggal_trs,'') <> ''
								group by month(lowb_tanggal_trs)
								union ALL
								select month(tgl_pod) bulan, 0 pup , sum(ttwb_total) pod, 0 inv, 0 inw
								from report.transaksi_waybill where year(tgl_pod) = ".date('Y')." and left(ttwb_nomor,1) in (1,3,7) and ifnull(tgl_pod,'') <> ''
								group by month(tgl_pod)
								union all
								select month(tgl_inv) bulan, 0 pup , 0 pod, sum(ttwb_total) inv, 0 inw
								from report.transaksi_waybill where year(tgl_inv) = ".date('Y')." and left(ttwb_nomor,1) in (1,3,7) and ifnull(tgl_inv,'') <> ''
								group by month(tgl_inv)
								union all
								select  month(arsh_tanggal) bulan, 0 pup, 0 pod, 0 inv, sum(arsh_nilai) inw
								from report.sales_invoice where arsh_mcom_kode = 'AA' and arsh_tipe = 'N' and year(arsh_tanggal) = ".date('Y')." and arsh_status_koreksi = 0 
								group by month(arsh_tanggal)
								) groupnya
								group by bulan";
								
			$data['dataChart']    = $this->mod_database->getQuery($tablechart);
            $data['dataAll']    = $this->mod_database->getQuery($TABLE);
          
            $this->load->view('dashboard', $data);
            
        } else {
            $this->load->view('login');
        }
    }
    
    
    public function detailreport($kode,$tglawal, $tglakhir) {
        if ($this->session->userdata('sess_apps') == TRUE) {
            
            $data['STR_PAGE']       = 'TOP_20_CUSTOMER_DETAILREPORT';
            $data['TITLE']          = 'REPORT';
            $data['SUB_TITLE']      = 'Data';
            
                $kode                = str_replace("%20", " ", $kode);
				
				$tglawal = str_replace("_", "/", $tglawal);
                $tglakhir = str_replace("_", "/", $tglakhir);
				
				$tgl1= date('Y-m-d',strtotime($tglawal));
                $tgl2 = date('Y-m-d',strtotime($tglakhir));
			/*	
                $TABLE        = "select lowb_tanggal_trs, ttwb_nomor, ttwb_mcus_mcty_kode, ttwb_mcus_kota,
ttwb_mpen_mcty_kode, ttwb_mpen_kota, ttwb_kg, ttwb_kg_real, ttwb_panjang, ttwb_lebar, ttwb_tinggi,
ttwb_total, cust_id
from trs_transaksi_waybill, log_waybill
left join crm.atx_booking_order on awb_no = lowb_mswb_nomor and cust_id = '839360016'
where ttwb_mcus_kode = '$kode' and lowb_mswb_nomor = ttwb_nomor and lowb_status = 1
and lowb_tanggal_trs between '$tgl1' and '$tgl2'
and ttwb_void = '0' and left(ttwb_nomor,1) in ('1','3','7')
 and cust_id is null
";*/
            if ($kode=="OTHER")
			{
			$queryCus = "Select 'Below TOP 20 Customer' mcus_nama ";	
			/*$others = " and FIND_IN_SET (ttwb_mcus_kode,
						(select group_concat(ttwb_mcus_kode) from (select ttwb_mcus_kode, count(ttwb_nomor)
						from trs_transaksi_waybill, log_waybill
						left join crm.atx_booking_order on awb_no = lowb_mswb_nomor and cust_id = '839360016'
						where (not ttwb_mcus_nama like '%COMAT%') and lowb_mswb_nomor = ttwb_nomor and lowb_status = 1 and lowb_tanggal_trs between '$tgl1' and '$tgl2'
						and ttwb_void = '0' and left(ttwb_nomor,1) in ('1','3','7') and cust_id is null
						group by ttwb_mcus_kode order by count(ttwb_nomor) desc limit 20) A)) = 0";*/
			$others = " and FIND_IN_SET (ttwb_mcus_kode,
						(select group_concat(ttwb_mcus_kode) from (select ttwb_mcus_kode, count(ttwb_nomor)
						from report.transaksi_waybill
						where lowb_tanggal_trs between '$tgl1' and '$tgl2' and company = 'AA'
						group by ttwb_mcus_kode order by count(ttwb_nomor) desc limit 20) A)) = 0";

			}
			elseif ($kode=="TOTAL")
			{ $others = "";
			  $queryCus = "Select 'ALL Customer' mcus_nama ";	
			}
			else
			{ $others = "and ttwb_mcus_kode = '$kode'";
			  $queryCus = "Select mcus_nama from mst_customer where mcus_kode = '".$kode."'";
			  
			}

            /*$query = "select lowb_tanggal_trs, ttwb_nomor, ttwb_mcus_kode, ttwb_mcus_nama, ttwb_mcus_mcty_kode, ttwb_mcus_kota,
			ttwb_mpen_mcty_kode, ttwb_mpen_kota, ttwb_kg, ttwb_kg_real, ttwb_panjang, ttwb_lebar, ttwb_tinggi,
			ttwb_total, cust_id
			from trs_transaksi_waybill, log_waybill
			left join crm.atx_booking_order on awb_no = lowb_mswb_nomor and cust_id = '839360016'
			where (not ttwb_mcus_nama like '%COMAT%') and lowb_mswb_nomor = ttwb_nomor and lowb_status = 1
			and lowb_tanggal_trs between '$tgl1' and '$tgl2'
			and ttwb_void = '0' and left(ttwb_nomor,1) in ('1','3','7')
			 and cust_id is null ".$others;*/
           
		   $query = "select lowb_tanggal_trs, ttwb_nomor, ttwb_mcus_kode, ttwb_mcus_nama, ttwb_mcus_mcty_kode, ttwb_mcus_kota,
					 ttwb_mpen_mcty_kode, ttwb_mpen_kota, ttwb_kg, ttwb_kg_real, ttwb_panjang, ttwb_lebar, ttwb_tinggi, ttwb_total
					 from report.transaksi_waybill where company = 'AA' and lowb_tanggal_trs between '$tgl1' and '$tgl2'".$others;
		  // echo $query;
            
	
            $data['dataAll']        = $this->mod_database->getQuery($query);
			
			$data['kode']        = $kode;
			$data['dataCus']     = $this->mod_database->getQuery($queryCus);
			$data['tgl_awal']    = $tglawal;
			$data['tgl_akhir']   = $tglakhir;
			
            $data['query'] = $query;
            $this->load->view('dashboard', $data);
            
        } else {
            $this->load->view('login');
        }
    }
    
   
    public function carireport() {
        if ($this->session->userdata('sess_apps') == TRUE) {
            
            $data['STR_PAGE']       = 'TOP_20_CUSTOMER_CARIREPORT';
            $data['TITLE']          = 'REPORT';
            $data['SUB_TITLE']      = 'Data';
            
            $tgl1 = date('Y-m-d',strtotime($this->input->post('tgl_awal')));
            $tgl2 = date('Y-m-d',strtotime($this->input->post('tgl_akhir')));
			$data['tgl_awal'] = date('m/d/Y',strtotime($this->input->post('tgl_awal')));
            $data['tgl_akhir'] = date('m/d/Y',strtotime($this->input->post('tgl_akhir')));
            
          /*  $TABLE= "select Kode, Nama, Jumlah, Berat, Total from
(select ttwb_mcus_kode Kode, ttwb_mcus_nama Nama, count(ttwb_nomor) Jumlah, sum(ttwb_kg) Berat, sum(ttwb_total) Total, cust_id
from trs_transaksi_waybill, log_waybill
left join crm.atx_booking_order on awb_no = lowb_mswb_nomor and cust_id = '839360016'
where (not ttwb_mcus_nama like '%COMAT%') and lowb_mswb_nomor = ttwb_nomor and lowb_status = 1 and lowb_tanggal_trs between '$tgl1' and '$tgl2'
and ttwb_void = '0' and left(ttwb_nomor,1) in ('1','3','7') and cust_id is null
group by ttwb_mcus_kode order by Jumlah desc limit 20) B
union all
select 'OTHER' Kode,'OTHERS' Nama, count(ttwb_nomor) Jumlah, sum(ttwb_kg) Berat, sum(ttwb_total) Total
from trs_transaksi_waybill, log_waybill
left join crm.atx_booking_order on awb_no = lowb_mswb_nomor and cust_id = '839360016'
where (not ttwb_mcus_nama like '%COMAT%') and lowb_mswb_nomor = ttwb_nomor and lowb_status = 1 and lowb_tanggal_trs between '$tgl1' and '$tgl2'
and ttwb_void = '0' and left(ttwb_nomor,1) in ('1','3','7') and cust_id is null
and FIND_IN_SET (ttwb_mcus_kode,
(select group_concat(ttwb_mcus_kode) from (select ttwb_mcus_kode
from trs_transaksi_waybill, log_waybill
left join crm.atx_booking_order on awb_no = lowb_mswb_nomor and cust_id = '839360016'
where (not ttwb_mcus_nama like '%COMAT%') and lowb_mswb_nomor = ttwb_nomor and lowb_status = 1 and lowb_tanggal_trs between '$tgl1' and '$tgl2'
and ttwb_void = '0' and left(ttwb_nomor,1) in ('1','3','7') and cust_id is null
group by ttwb_mcus_kode order by count(ttwb_nomor) desc limit 20) A)) = 0
union all
select 'TOTAL' Kode, 'TOTAL' Nama, count(ttwb_nomor) Jumlah, sum(ttwb_kg) Berat, sum(ttwb_total) Total
from trs_transaksi_waybill, log_waybill
left join crm.atx_booking_order on awb_no = lowb_mswb_nomor and cust_id = '839360016'
where (not ttwb_mcus_nama like '%COMAT%') and lowb_mswb_nomor = ttwb_nomor and lowb_status = 1 and lowb_tanggal_trs between '$tgl1' and '$tgl2'
and ttwb_void = '0' and left(ttwb_nomor,1) in ('1','3','7') and cust_id is null";*/
            
            $TABLE = "select  Kode, Nama, Jumlah, Berat, Total from
(select ttwb_mcus_kode Kode, ttwb_mcus_nama Nama, count(ttwb_nomor) Jumlah, sum(ttwb_kg) Berat, sum(ttwb_total) Total
from report.transaksi_waybill
where lowb_tanggal_trs between '$tgl1' and '$tgl2' and company = 'AA'
group by ttwb_mcus_kode order by Jumlah desc limit 20) B
union all
select 'OTHER' Kode,'OTHERS' Nama, count(ttwb_nomor) Jumlah, ifnull(sum(ttwb_kg),0) Berat, ifnull(sum(ttwb_total),0) Total
from report.transaksi_waybill
where lowb_tanggal_trs between '$tgl1' and '$tgl2' and company = 'AA'
and FIND_IN_SET (ttwb_mcus_kode,
(select group_concat(ttwb_mcus_kode) from (select ttwb_mcus_kode, count(ttwb_nomor)
from report.transaksi_waybill
where lowb_tanggal_trs between '$tgl1' and '$tgl2' and company = 'AA'
group by ttwb_mcus_kode order by count(ttwb_nomor) desc limit 20) A)) = 0
union all
select 'TOTAL' Kode, 'TOTAL' Nama, count(ttwb_nomor) Jumlah, sum(ttwb_kg) Berat, sum(ttwb_total) Total
from report.transaksi_waybill
where lowb_tanggal_trs between '$tgl1' and '$tgl2' and company = 'AA'";
            
            $data['dataAll']        = $this->mod_database->getQuery($TABLE);

            $this->load->view('dashboard', $data);
            
        } else {
            $this->load->view('login');
        }
    }
    
	public function trendcustomer($comp,$kode) {
        if ($this->session->userdata('sess_apps') == TRUE) {
            
            $data['STR_PAGE']       = 'TREND_CUSTOMER_WAYBILL';
            $data['TITLE']          = 'REPORT';
            $data['SUB_TITLE']      = 'Data';
            
                $comp                = str_replace("%20", " ", $comp);
				$kode				= str_replace("%20"," ", $kode);
				
                $TABLE = "select a.tanggal, ifnull(nomor,21) nomor, ifnull(jumlah,0) from
							(SELECT CAST(DATE_ADD((DATE_SUB(DATE(NOW()), INTERVAL 31 DAY)), INTERVAL numbers.number DAY) AS DATE) AS tanggal
							FROM (
							select
							  @i := @i + 1 as number
							from
							  (select 0 union all select 1 union all select 2 union all
							   select 3 union all select 4 union all select 5 union all
							   select 6 union all select 7 union all select 8 union all select 9) as t0,
							  (select 0 union all select 1 union all select 2 union all
							   select 3 union all select 4 union all select 5 union all
							   select 6 union all select 7 union all select 8 union all select 9) as t1,
							  (select 0 union all select 1 union all select 2 union all
							   select 3 union all select 4 union all select 5 union all
							   select 6 union all select 7 union all select 8 union all select 9) as t2,
							  (select 0 union all select 1 union all select 2 union all
							   select 3 union all select 4 union all select 5 union all
							   select 6 union all select 7 union all select 8 union all select 9) as t3,
							  (select 0 union all select 1 union all select 2 union all
							   select 3 union all select 4 union all select 5 union all
							   select 6 union all select 7 union all select 8 union all select 9) as t4,
							  (select @i:=0) as t_init
							) AS numbers HAVING CAST(`tanggal` AS DATE)< DATE(NOW())) a
							left join report.top_20_waybill b on a.tanggal = b.tanggal and company = '$comp' and Kode = '$kode'";
            
            //$TABLE = "v_store_location";
            
			$queryCus = "Select mcus_nama from mst_customer where mcus_kode = '".$kode."'";
            $data['dataAll']        = $this->mod_database->getQuery($TABLE);
			$data['dataCus']     = $this->mod_database->getQuery($queryCus);
			
			$data['kode'] = $kode;
	
            $this->load->view('dashboard', $data);
            
        } else {
            $this->load->view('login');
        }
    }
	
	public function trendtranscustomer($comp,$kode,$type) {
        if ($this->session->userdata('sess_apps') == TRUE) {
            
			switch ($type) {
				case "count" :
								$data['STR_PAGE']       = 'TREND_CUSTOMER_WAYBILL_TRANS_WB';
								break;
				case "weight" :
								$data['STR_PAGE']       = 'TREND_CUSTOMER_WAYBILL_TRANS_KG';
								break;
				case "revenue" :
								$data['STR_PAGE']       = 'TREND_CUSTOMER_WAYBILL_TRANS_RV';
								break;
			}
            
			
            $data['TITLE']          = 'REPORT';
            $data['SUB_TITLE']      = 'Data';
            
                $comp                = str_replace("%20", " ", $comp);
				$kode				= str_replace("%20"," ", $kode);
				
                $TABLE = "select a.tanggal tanggal, ifnull(count(ttwb_nomor),0) awb, ifnull(sum(ttwb_kg),0) berat, ifnull(sum(ttwb_total),0) jumlah from
							(SELECT CAST(DATE_ADD((DATE_SUB(DATE(NOW()), INTERVAL 31 DAY)), INTERVAL numbers.number DAY) AS DATE) AS tanggal
							FROM (
							select
							  @i := @i + 1 as number
							from
							  (select 0 union all select 1 union all select 2 union all
							   select 3 union all select 4 union all select 5 union all
							   select 6 union all select 7 union all select 8 union all select 9) as t0,
							  (select 0 union all select 1 union all select 2 union all
							   select 3 union all select 4 union all select 5 union all
							   select 6 union all select 7 union all select 8 union all select 9) as t1,
							  (select 0 union all select 1 union all select 2 union all
							   select 3 union all select 4 union all select 5 union all
							   select 6 union all select 7 union all select 8 union all select 9) as t2,
							  (select 0 union all select 1 union all select 2 union all
							   select 3 union all select 4 union all select 5 union all
							   select 6 union all select 7 union all select 8 union all select 9) as t3,
							  (select 0 union all select 1 union all select 2 union all
							   select 3 union all select 4 union all select 5 union all
							   select 6 union all select 7 union all select 8 union all select 9) as t4,
							  (select @i:=0) as t_init
							) AS numbers HAVING CAST(`tanggal` AS DATE)< DATE(NOW())) a
							left join report.transaksi_waybill b on a.tanggal = b.lowb_tanggal_trs and company = '$comp' and ttwb_mcus_kode = '$kode'
							group by a.tanggal";
            
			$queryCus = "Select mcus_nama from mst_customer where mcus_kode = '".$kode."'";
            $data['dataAll']        = $this->mod_database->getQuery($TABLE);
			$data['dataCus']     = $this->mod_database->getQuery($queryCus);
			
			$data['kode'] = $kode;
	
            $this->load->view('dashboard', $data);
            
        } else {
            $this->load->view('login');
        }
    }


	
public function exportexcel() {
        if ($this->session->userdata('sess_apps') == TRUE) {
            $data['STR_PAGE']       = 'PAGE_REPORT_PD';
            $data['TITLE']          = 'Report PD';
            $data['SUB_TITLE']      = 'Data Report Product Development';
            
		   $query = "select tahun, lowb_mlok_kode, max(pup_jan) pup_jan, max(pod_jan) pod_jan, max(inv_jan) inv_jan, max(inw_jan) inw_jan,
					max(pup_feb) pup_feb, max(pod_feb) pod_feb, max(inv_feb) inv_feb, max(inw_feb) inw_feb,
					max(pup_mar) pup_mar, max(pod_mar) pod_mar, max(inv_mar) inv_mar, max(inw_mar) inw_mar,
					max(pup_apr) pup_apr, max(pod_apr) pod_apr, max(inv_apr) inv_apr, max(inw_apr) inw_apr,
					max(pup_mei) pup_mei, max(pod_mei) pod_mei, max(inv_mei) inv_mei, max(inw_mei) inw_mei,
					max(pup_jun) pup_jun, max(pod_jun) pod_jun, max(inv_jun) inv_jun, max(inw_jun) inw_jun,
					max(pup_jul) pup_jul, max(pod_jul) pod_jul, max(inv_jul) inv_jul, max(inw_jul) inw_jul,
					max(pup_aug) pup_aug, max(pod_aug) pod_aug, max(inv_aug) inv_aug, max(inw_aug) inw_aug,
					max(pup_sep) pup_sep, max(pod_sep) pod_sep, max(inv_sep) inv_sep, max(inw_sep) inw_sep,
					max(pup_okt) pup_okt, max(pod_okt) pod_okt, max(inv_okt) inv_okt, max(inw_okt) inw_okt,
					max(pup_nov) pup_nov, max(pod_nov) pod_nov, max(inv_nov) inv_nov, max(inw_nov) inw_nov,
					max(pup_des) pup_des, max(pod_des) pod_des, max(inv_des) inv_des, max(inw_des) inw_des
					from(
					select year(lowb_tanggal_trs) tahun, lowb_mlok_kode,
					if(month(lowb_tanggal_trs)=1, sum(ttwb_total),0) pup_jan, 0 pod_jan, 0 inv_jan, 0 inw_jan,
					if(month(lowb_tanggal_trs)=2, sum(ttwb_total),0) pup_feb, 0 pod_feb, 0 inv_feb, 0 inw_feb,
					if(month(lowb_tanggal_trs)=3, sum(ttwb_total),0) pup_mar, 0 pod_mar, 0 inv_mar, 0 inw_mar,
					if(month(lowb_tanggal_trs)=4, sum(ttwb_total),0) pup_apr, 0 pod_apr, 0 inv_apr, 0 inw_apr,
					if(month(lowb_tanggal_trs)=5, sum(ttwb_total),0) pup_mei, 0 pod_mei, 0 inv_mei, 0 inw_mei,
					if(month(lowb_tanggal_trs)=6, sum(ttwb_total),0) pup_jun, 0 pod_jun, 0 inv_jun, 0 inw_jun,
					if(month(lowb_tanggal_trs)=7, sum(ttwb_total),0) pup_jul, 0 pod_jul, 0 inv_jul, 0 inw_jul,
					if(month(lowb_tanggal_trs)=8, sum(ttwb_total),0) pup_aug, 0 pod_aug, 0 inv_aug, 0 inw_aug,
					if(month(lowb_tanggal_trs)=9, sum(ttwb_total),0) pup_sep, 0 pod_sep, 0 inv_sep, 0 inw_sep,
					if(month(lowb_tanggal_trs)=10, sum(ttwb_total),0) pup_okt, 0 pod_okt, 0 inv_okt, 0 inw_okt,
					if(month(lowb_tanggal_trs)=11, sum(ttwb_total),0) pup_nov, 0 pod_nov, 0 inv_nov, 0 inw_nov,
					if(month(lowb_tanggal_trs)=12, sum(ttwb_total),0) pup_des, 0 pod_des, 0 inv_des, 0 inw_des
					from report.transaksi_waybill where year(lowb_tanggal_trs) = ".date('Y')."  and left(ttwb_nomor,1) in (1,3,7)
					group by year(lowb_tanggal_trs), lowb_mlok_kode, month(lowb_tanggal_trs)
					union ALL
					select year(lowb_tanggal_trs) tahun, lowb_mlok_kode,
					0 pup_jan, if(month(tgl_pod)=1, sum(ttwb_total),0) pod_jan, 0 inv_jan, 0 inw_jan,
					0 pup_feb, if(month(tgl_pod)=2, sum(ttwb_total),0) pod_feb, 0 inv_feb, 0 inw_feb,
					0 pup_mar, if(month(tgl_pod)=3, sum(ttwb_total),0) pod_mar, 0 inv_mar, 0 inw_mar,
					0 pup_apr, if(month(tgl_pod)=4, sum(ttwb_total),0) pod_apr, 0 inv_apr, 0 inw_apr,
					0 pup_mei, if(month(tgl_pod)=5, sum(ttwb_total),0) pod_mei, 0 inv_mei, 0 inw_mei,
					0 pup_jun, if(month(tgl_pod)=6, sum(ttwb_total),0) pod_jun, 0 inv_jun, 0 inw_jun,
					0 pup_jul, if(month(tgl_pod)=7, sum(ttwb_total),0) pod_jul, 0 inv_jul, 0 inw_jul,
					0 pup_aug, if(month(tgl_pod)=8, sum(ttwb_total),0) pod_aug, 0 inv_aug, 0 inw_aug,
					0 pup_sep, if(month(tgl_pod)=9, sum(ttwb_total),0) pod_sep, 0 inv_sep, 0 inw_sep,
					0 pup_okt, if(month(tgl_pod)=10, sum(ttwb_total),0) pod_okt, 0 inv_okt, 0 inw_okt,
					0 pup_nov, if(month(tgl_pod)=11, sum(ttwb_total),0) pod_nov, 0 inv_nov, 0 inw_nov,
					0 pup_des, if(month(tgl_pod)=12, sum(ttwb_total),0) pod_des, 0 inv_des, 0 inw_des
					from report.transaksi_waybill where year(tgl_pod) = ".date('Y')."  and left(ttwb_nomor,1) in (1,3,7)
					group by year(tgl_pod), lowb_mlok_kode, month(tgl_pod)
					union all
					select year(lowb_tanggal_trs) tahun, lowb_mlok_kode,
					0 pup_jan, 0 pod_jan, if(month(tgl_inv)=1, sum(ttwb_total),0) inv_jan, 0 inw_jan,
					0 pup_feb, 0 pod_feb, if(month(tgl_inv)=2, sum(ttwb_total),0) inv_feb, 0 inw_feb,
					0 pup_mar, 0 pod_mar, if(month(tgl_inv)=3, sum(ttwb_total),0) inv_mar,0 inw_mar,
					0 pup_apr, 0 pod_apr, if(month(tgl_inv)=4, sum(ttwb_total),0) inv_apr, 0 inw_apr,
					0 pup_mei, 0 pod_mei, if(month(tgl_inv)=5, sum(ttwb_total),0) inv_mei, 0 inw_mei,
					0 pup_jun, 0 pod_jun, if(month(tgl_inv)=6, sum(ttwb_total),0) inv_jun, 0 inw_jun,
					0 pup_jul, 0 pod_jul, if(month(tgl_inv)=7, sum(ttwb_total),0) inv_jul, 0 inw_jul,
					0 pup_aug, 0 pod_aug, if(month(tgl_inv)=8, sum(ttwb_total),0) inv_aug, 0 inw_aug,
					0 pup_sep, 0 pod_sep, if(month(tgl_inv)=9, sum(ttwb_total),0) inv_sep, 0 inw_sep,
					0 pup_okt, 0 pod_okt, if(month(tgl_inv)=10, sum(ttwb_total),0) inv_okt, 0 inw_okt,
					0 pup_nov, 0 pod_nov, if(month(tgl_inv)=11, sum(ttwb_total),0) inv_nov, 0 inw_nov,
					0 pup_des, 0 pod_des, if(month(tgl_inv)=12, sum(ttwb_total),0) inv_des, 0 inw_des
					from report.transaksi_waybill where year(tgl_inv) = ".date('Y')."  and left(ttwb_nomor,1) in (1,3,7)
					group by year(tgl_inv), lowb_mlok_kode, month(tgl_inv)
					union all
					select year(arsh_tanggal), arsh_mlok_kode,
					0 pup_jan, 0 pod_jan, 0 inv_jan, if(month(arsh_tanggal)=1,sum(arsh_nilai),0) inw_jan,
					0 pup_feb, 0 pod_feb, 0 inv_feb, if(month(arsh_tanggal)=2,sum(arsh_nilai),0) inw_feb,
					0 pup_mar, 0 pod_mar, 0 inv_mar, if(month(arsh_tanggal)=3,sum(arsh_nilai),0) inw_mar,
					0 pup_apr, 0 pod_apr, 0 inv_apr, if(month(arsh_tanggal)=4,sum(arsh_nilai),0) inw_apr,
					0 pup_mei, 0 pod_mei, 0 inv_mei, if(month(arsh_tanggal)=5,sum(arsh_nilai),0) inw_mei,
					0 pup_jun, 0 pod_jun, 0 inv_jun, if(month(arsh_tanggal)=6,sum(arsh_nilai),0) inw_jun,
					0 pup_jul, 0 pod_jul, 0 inv_jul, if(month(arsh_tanggal)=7,sum(arsh_nilai),0) inw_jul,
					0 pup_aug, 0 pod_aug, 0 inv_aug, if(month(arsh_tanggal)=8,sum(arsh_nilai),0) inw_aug,
					0 pup_sep, 0 pod_sep, 0 inv_sep, if(month(arsh_tanggal)=9,sum(arsh_nilai),0) inw_sep,
					0 pup_okt, 0 pod_okt, 0 inv_okt, if(month(arsh_tanggal)=10,sum(arsh_nilai),0) inw_okt,
					0 pup_nop, 0 pod_nop, 0 inv_nop, if(month(arsh_tanggal)=11,sum(arsh_nilai),0) inw_nop,
					0 pup_des, 0 pod_des, 0 inv_des, if(month(arsh_tanggal)=12,sum(arsh_nilai),0) inw_des
					from report.sales_invoice where arsh_mcom_kode = 'AA' and arsh_tipe = 'N' and year(arsh_tanggal) = ".date('Y')."  and arsh_status_koreksi = 0
					group by year(arsh_tanggal), arsh_mlok_kode, month(arsh_tanggal)
					) groupnya  group by tahun, lowb_mlok_kode";
		  // echo $query;
 
            $data['report_visit'] = $this->mod_database->getQuery($query);


            $objPHPExcel = new PHPExcel();
            $objPHPExcel->getProperties()
                    ->setCreator("IT Atex")
                    ->setTitle("Branches Revenue");

//--------------------------------------------------------------------------------------------------------------
            $objset = $objPHPExcel->setActiveSheetIndex(0);
            $objget = $objPHPExcel->getActiveSheet();

            $objget->setTitle("Tahun ".date('Y'));

            $objget->getStyle("A1:AW2")->applyFromArray(
                array(
                    'fill' => array(
                        'type' => PHPExcel_Style_Fill::FILL_SOLID,
                        'color' => array('rgb' => '92d050')
                    ),
                    'font' => array(
                        'color' => array('rgb' => '000000')
                    )
                )
            );

			
			$objset->setCellValue('A1', 'Lokasi');
			$objset->setCellValue('B1', 'Januari');
			$objset->setCellValue('F1', 'Februari');
			$objset->setCellValue('J1', 'Maret');
			$objset->setCellValue('N1', 'April');
			$objset->setCellValue('R1', 'Mei');
			$objset->setCellValue('V1', 'Juni');
			$objset->setCellValue('Z1', 'Juli');
			$objset->setCellValue('AD1', 'Agustus');
			$objset->setCellValue('AH1', 'September');
			$objset->setCellValue('AL1', 'Oktober');
			$objset->setCellValue('AP1', 'Nopember');
			$objset->setCellValue('AT1', 'Desember');
			
			$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:A2');
			$objPHPExcel->setActiveSheetIndex(0)->mergeCells('B1:E1');
			$objPHPExcel->setActiveSheetIndex(0)->mergeCells('F1:I1');
			$objPHPExcel->setActiveSheetIndex(0)->mergeCells('J1:M1');
			$objPHPExcel->setActiveSheetIndex(0)->mergeCells('N1:Q1');
			$objPHPExcel->setActiveSheetIndex(0)->mergeCells('R1:U1');
			$objPHPExcel->setActiveSheetIndex(0)->mergeCells('V1:Y1');
			$objPHPExcel->setActiveSheetIndex(0)->mergeCells('Z1:AC1');
			$objPHPExcel->setActiveSheetIndex(0)->mergeCells('AD1:AG1');
			$objPHPExcel->setActiveSheetIndex(0)->mergeCells('AH1:AK1');
			$objPHPExcel->setActiveSheetIndex(0)->mergeCells('AL1:AO1');
			$objPHPExcel->setActiveSheetIndex(0)->mergeCells('AP1:AS1');
			$objPHPExcel->setActiveSheetIndex(0)->mergeCells('AT1:AW1');
			
            $cols = array("B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z","AA","AB", "AC", "AD", "AE", "AF", "AG", "AH", "AI", "AJ", "AK", "AL", "AM", "AN", "AO", "AP", "AQ", "AR", "AS", "AT", "AU", "AV", "AW");
            $val = array("PUP", "POD", "INVOICE", "INVOICE NON AWAB", "PUP", "POD", "INVOICE", "INVOICE NON AWAB","PUP", "POD", "INVOICE", "INVOICE NON AWAB","PUP", "POD", "INVOICE", "INVOICE NON AWAB","PUP", "POD", "INVOICE", "INVOICE NON AWAB","PUP", "POD", "INVOICE", "INVOICE NON AWAB","PUP", "POD", "INVOICE", "INVOICE NON AWAB","PUP", "POD", "INVOICE", "INVOICE NON AWAB","PUP", "POD", "INVOICE", "INVOICE NON AWAB","PUP", "POD", "INVOICE", "INVOICE NON AWAB","PUP", "POD", "INVOICE", "INVOICE NON AWAB","PUP", "POD", "INVOICE", "INVOICE NON AWAB");

			
            for($a=0;$a<48;$a++){
                $objset->setCellValue($cols[$a].'2', $val[$a]);

                $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(12);
                $objPHPExcel->getActiveSheet()->getColumnDimension($cols[$a])->setWidth(12);

                $style = array(
                    'alignment' => array(
                        'horizontal' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    )
                );
                $objPHPExcel->getActiveSheet()->getStyle($cols[$a].'1')->applyFromArray($style);
				$objPHPExcel->getActiveSheet()->getStyle($cols[$a].'2')->applyFromArray($style);
            }

            $baris=3;
            foreach ($data['report_visit']->result() as $getRepData) {
                # code...
			   $objset->setCellValue("A".$baris, $getRepData->lowb_mlok_kode);
                $objset->setCellValue("B".$baris, $getRepData->pup_jan);
                $objset->setCellValue("C".$baris, $getRepData->pod_jan);
                $objset->setCellValue("D".$baris, $getRepData->inv_jan);
                $objset->setCellValue("E".$baris, $getRepData->inw_jan);
                $objset->setCellValue("F".$baris, $getRepData->pup_feb);
                $objset->setCellValue("G".$baris, $getRepData->pod_feb);
                $objset->setCellValue("H".$baris, $getRepData->inv_feb);
                $objset->setCellValue("I".$baris, $getRepData->inw_feb);
                $objset->setCellValue("J".$baris, $getRepData->pup_mar);
                $objset->setCellValue("K".$baris, $getRepData->pod_mar);
                $objset->setCellValue("L".$baris, $getRepData->inv_mar);
                $objset->setCellValue("M".$baris, $getRepData->inw_mar);
                $objset->setCellValue("N".$baris, $getRepData->pup_apr);
				$objset->setCellValue("O".$baris, $getRepData->pod_apr);
				$objset->setCellValue("P".$baris, $getRepData->inv_apr);
				$objset->setCellValue("Q".$baris, $getRepData->inw_apr);
				$objset->setCellValue("R".$baris, $getRepData->pup_mei);
				$objset->setCellValue("S".$baris, $getRepData->pod_mei);
				$objset->setCellValue("T".$baris, $getRepData->inv_mei);
				$objset->setCellValue("U".$baris, $getRepData->inw_mei);
				$objset->setCellValue("V".$baris, $getRepData->pup_jun);
				$objset->setCellValue("W".$baris, $getRepData->pod_jun);
				$objset->setCellValue("X".$baris, $getRepData->inv_jun);
				$objset->setCellValue("Y".$baris, $getRepData->inw_jun);
				$objset->setCellValue("Z".$baris, $getRepData->pup_jul);
				$objset->setCellValue("AA".$baris, $getRepData->pod_jul);
				$objset->setCellValue("AB".$baris, $getRepData->inv_jul);
				$objset->setCellValue("AC".$baris, $getRepData->inw_jul);
				$objset->setCellValue("AD".$baris, $getRepData->pup_aug);
				$objset->setCellValue("AE".$baris, $getRepData->pod_aug);
				$objset->setCellValue("AF".$baris, $getRepData->inv_aug);
				$objset->setCellValue("AG".$baris, $getRepData->inw_aug);
				$objset->setCellValue("AH".$baris, $getRepData->pup_sep);
				$objset->setCellValue("AI".$baris, $getRepData->pod_sep);
				$objset->setCellValue("AJ".$baris, $getRepData->inv_sep);
				$objset->setCellValue("AK".$baris, $getRepData->inw_sep);
				$objset->setCellValue("AL".$baris, $getRepData->pup_okt);
				$objset->setCellValue("AM".$baris, $getRepData->pod_okt);
				$objset->setCellValue("AN".$baris, $getRepData->inv_okt);
				$objset->setCellValue("AO".$baris, $getRepData->inw_okt);
				$objset->setCellValue("AP".$baris, $getRepData->pup_nov);
				$objset->setCellValue("AQ".$baris, $getRepData->pod_nov);
				$objset->setCellValue("AR".$baris, $getRepData->inv_nov);
				$objset->setCellValue("AS".$baris, $getRepData->inw_nov);
				$objset->setCellValue("AT".$baris, $getRepData->pup_des);
				$objset->setCellValue("AU".$baris, $getRepData->pod_des);
				$objset->setCellValue("AV".$baris, $getRepData->inv_des);
				$objset->setCellValue("AW".$baris, $getRepData->inw_des);

                //$objPHPExcel->getActiveSheet()->getStyle('C1:C'.$baris)->getNumberFormat()->setFormatCode('0');
                $baris++;
            }

            $objPHPExcel->getActiveSheet()->setTitle('Revenue Per Branch '.date('Y'));


            $objPHPExcel->setActiveSheetIndex(0);
            $filename = urlencode("BranchRevenue_AA_".date("Y-m-d").".xls");

                header('Content-Type: application/vnd.ms-excel');
                header('Content-Disposition: attachment;filename="'.$filename.'"');
                header('Cache-Control: max-age=0');

            $objWriter = IOFactory::createWriter($objPHPExcel, 'Excel5');
            $objWriter->save('php://output');
            
        } else {
            $this->load->view('login');
        }
    }    
    
    
    
    
}