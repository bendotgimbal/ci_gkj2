<?php
	$url1=$_SERVER['REQUEST_URI'];
	header("Refresh: 600; URL=$url1");
?>


<div class="box box-success">
    <div class="box-header">
        <div class="btn-group">
            
        </div>
        
        <div class="btn-group navbar-btn" role="group" aria-label="...">
           
        </div>
    </div>
    
    <!-- /.box-header -->
    <div class="box-body" >
    	<h2>Outlet/Agent Shipment Pickup List</h2> 
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th width="30" class="text-center" style="padding:0; padding-bottom: 10px;">No</th>
                    <th>NOMOR WAYBILL</th>
                    <th>TANGGAL</th>
                    <th>KODE OUTLET</th>
                    <th>NAMA OUTLET</th>
                    <th>ALAMAT OUTLET</th>
                    <th>KOTA OUTLET</th>
                    <th>MISS PICKUP</th>
                    <th>PENGIRIM</th>
                    <th>KOTA DESTINATION</th>
                    
                    <th>LAST STATUS</th>
                </tr>
            </thead>
            <tbody >
                
            <?php $iLoop = 1; foreach($dataOutlet->result() as $rsOutlet): ?>
                <tr>
                    <td class="text-center">
                        <?php echo $iLoop; ?>
                    </td>
                    <td><?php echo $rsOutlet->ttwba_nomor; ?></td>
                    <td><?php 
						$tanggal = date('d/m/Y',strtotime($rsOutlet->ttwba_tanggal));
						echo $tanggal. "   ".$rsOutlet->ttwba_waktu; ?></td>
                    <td><?php echo $rsOutlet->ttwba_mcus_kode; ?></td>
                    <td><?php echo $rsOutlet->ttwba_mcus_nama; ?></td>
                    <td><?php echo $rsOutlet->ttwba_mcus_alamat1. " ". $rsOutlet->ttwba_mcus_alamat2; ?></td>
                    <td><?php echo $rsOutlet->ttwba_mcus_kota; ?></td>
                    <?php
						$dateNow = date("Y-m-d");
						$dateFirst =  date('Y-m-d',strtotime($rsOutlet->ttwba_tanggal)) ;
						
						$date1=date_create($dateNow);
						$date2=date_create($dateFirst);
						$diff=date_diff($date1,$date2);
						$dateDiff = $diff->format("%a");
						
						
    					//$timeNow = date('H:i');
						
						//$timeNow = $timeNow->format('Y-m-d H:i:s');;
						
						//$timeNow = strtotime($timeNow);
						//$timeFirst = $rsOutlet->ttwba_waktu ;
						
						
						
						//if($timeNow < $timeFirst) {
    					//	$timeNow += 24 ;
						//}
						//$timeDiff = ($timeNow - $timeFirst) ;
						
						
						//$dateDiff = date_diff($dateNow, $dateFirst);
						
					?>
                    
                    
                     <td><?php echo $dateDiff." days "; ?></td>
                     <td><?php echo $rsOutlet->ttwba_dikirim_oleh; ?></td>
                     <td><?php echo $rsOutlet->ttwba_mpen_kota; ?></td>
                     
                    
                    <?php       
						$query =  "SELECT lowb_mswb_nomor, (lowb_tanggal_trs), (lowb_jam_trs), lowb_kode FROM log_waybill where lowb_mswb_nomor ='".$rsOutlet->ttwba_nomor. "' ORDER BY (lowb_tanggal_trs) DESC, (lowb_jam_trs) DESC LIMIT 1";                
                        $getDetail = $this->mod_database->getQuery($query);
                            
                                    foreach($getDetail->result() as $rsRow):
                                      $lastStatus = $rsRow->lowb_kode;
                                    endforeach;
                        ?>
                    
                    <td><?php echo $lastStatus; ?></td>
                </tr>
            <?php $iLoop++; endforeach; ?>
                
            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
    
    <!-- /.box-header -->
    <div class="box-body">
    	 <h2>ALFAGROUP Drop Store Pickup List </h2>
        <table id="example2" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th width="30" class="text-center" style="padding:0; padding-bottom: 10px;">No</th>
                    
                    <th>NOMOR WAYBILL</th>
                    <th>TANGGAL</th>
                    <th>KODE STORE</th>
                    <th>NAMA STORE</th>
                    <th>ALAMAT STORE</th>
                    <th>KOTA STORE</th>
                    <th>MISS PICKUP</th>
                    <th>KOTA DESTINATION</th>
                    <th>PENGIRIM</th>
                    <th>LAST STATUS</th>
                </tr>
            </thead>
            <tbody >
                
            <?php $iLoop = 1; foreach($dataDrop->result() as $rsDrop): ?>
                <tr>
                    <td class="text-center">
                        <?php echo $iLoop; ?>
                    </td>
                    <td><?php echo $rsDrop->waybill; ?></td>
                    <td><?php echo $rsDrop->TanggalDrop. " ". $rsDrop->WaktuDrop; ?></td>
                    <td><?php echo $rsDrop->store; ?></td>
                    <td><?php echo $rsDrop->tdo_nama_store; ?></td>
                    <?php       
						$query =  "SELECT msa_alamat, msa_kota FROM mst_store_alfamart WHERE msa_kode ='".$rsDrop->store. "' ";
						$alamatToko = "";
						$kotaToko = "";                
                        $getDetail = $this->mod_database->getQuery($query);
                            
                                    foreach($getDetail->result() as $rsRow):
                                      $alamatToko = $rsRow->msa_alamat;
									  $kotaToko = $rsRow->msa_kota;
                                    endforeach;
                        ?>
                    
                    <td><?php echo $alamatToko; ?></td>
                    <td><?php echo $kotaToko; ?></td>
                    <?php
						$dateNow = date("Y-m-d");
						//$dateFirst =  date('Y-m-d',strtotime($rsDrop->TanggalDrop)) ;
						
						//$date1 = 
						//$date2=date_create($dateFirst);
						//$diff=date_diff($date1,$date2);
						//$dateDiff = $diff->format("%a");
						
						$dateNow = date("Y-m-d");
						$dateFirst =  date('Y-m-d',strtotime($rsDrop->TanggalDrop)) ;
						
						$date1=date_create($dateNow);
						$date2=date_create($dateFirst);
						$diff=date_diff($date1,$date2);
						$dateDiff = $diff->format("%a");
					
					?>
                    
                    <td><?php echo $dateDiff." days "; ?></td>
                    <td><?php echo $rsDrop->kota_tujuan; ?></td>
                    <td><?php echo $rsDrop->nama_pengirim; ?></td>
                    
                    <?php       
						$query =  "SELECT lowb_mswb_nomor, (lowb_tanggal_trs), (lowb_jam_trs), lowb_kode FROM log_waybill where lowb_mswb_nomor ='".$rsDrop->waybill. "' ORDER BY (lowb_tanggal_trs) DESC, (lowb_jam_trs) DESC LIMIT 1";                
                        $getDetail = $this->mod_database->getQuery($query);
                            
                                    foreach($getDetail->result() as $rsRow):
                                      $lastStatus = $rsRow->lowb_kode;
                                    endforeach;
                        ?>
                    
                    <td><?php echo $lastStatus; ?></td>
                </tr>
            <?php $iLoop++; endforeach; ?>
                
            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
    
    <!-- /.box-header -->
    <div class="box-body" >
    	<h2>B2B Pickup List</h2> 
        <table id="example3" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th width="30" class="text-center" style="padding:0; padding-bottom: 10px;">No</th>
                    <th>TANGGAL PO</th>
                    <th>TANGGAL REQUEST PO</th>
                    <th>CABANG PICKUP</th>
                    <th>NAMA CABANG</th>
                    <th>NOMOR PICKUP</th>
                    <th>NAMA KONSUMEN</th>
                    <th>KOTA KONSUMEN</th>
                    <th>MISS PICKUP</th>
                    <th>KOTA DESTINATION</th>
                    <th>LAST STATUS</th>
                </tr>
            </thead>
            <tbody >
                
            <?php $iLoop = 1; foreach($dataB2B->result() as $rsB2B): ?>
                <tr>
                    <td class="text-center">
                        <?php echo $iLoop; ?>
                    </td>
                    <td><?php echo 
						$tanggal = date('d/m/Y',strtotime($rsB2B->TanggalPO));
						echo $tanggal. "   ".$rsB2B->WaktuPO; ?> </td>
                    <td><?php 
						$tanggal = date('d/m/Y',strtotime($rsB2B->TanggalPickup));
						echo $tanggal. "   ".$rsB2B->WaktuPickup; ?></td>
                    <td><?php echo $rsB2B->CabangPickup; ?></td>
                    <td><?php echo $rsB2B->NamaCabangPickup; ?></td>
                    <td><?php echo $rsB2B->NomorPO; ?></td>
                    <td><?php echo $rsB2B->NamaCustomer; ?></td>
                    <td><?php echo $rsB2B->Kota; ?></td>
                    <?php
						$dateNow = date("Y-m-d");
						$dateFirst =  date('Y-m-d',strtotime($rsB2B->TanggalPickup)) ;
						
						$date1=date_create($dateNow);
						$date2=date_create($dateFirst);
						$diff=date_diff($date1,$date2);
						$dateDiff = $diff->format("%a");
						
						
    											
					?>
                    
                    
                     <td><?php echo $dateDiff." days "; ?></td>
                     <td><?php echo $rsB2B->Kotatujuan; ?></td>
                     <td><?php echo $rsB2B->STATUS; ?></td>
                     
                    
                    <?php       
						//$query =  "SELECT lowb_mswb_nomor, (lowb_tanggal_trs), (lowb_jam_trs), lowb_kode FROM log_waybill where lowb_mswb_nomor ='".$rsB2B->ttwba_nomor. "' ORDER BY (lowb_tanggal_trs) DESC, (lowb_jam_trs) DESC LIMIT 1";                
                        //$getDetail = $this->mod_database->getQuery($query);
                            
                          //          foreach($getDetail->result() as $rsRow):
                          //            $lastStatus = $rsRow->lowb_kode;
                          //          endforeach;
						  //<td><?php echo $lastStatus; </td>
                        ?>
                    
                    
                </tr>
            <?php $iLoop++; endforeach; ?>
                
            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
    
</div>
<!-- /.box -->
<script type="text/javascript">
    var chkArray          = [];
        chkArray.length   = 0;
    
    
    
    $(function () {
        //- DATATABLE
        $("#example1").dataTable({ 
            "aoColumnDefs": [{ 
                "bSortable": false, 
                "aTargets": [ 0, 7 ] 
            }],
            "order": [[ 0, "asc" ]]
        });
		
		$("#example2").dataTable({ 
            "aoColumnDefs": [{ 
                "bSortable": false, 
                "aTargets": [ 0, 8 ] 
            }],
            "order": [[ 0, "asc" ]]
        });
		$("#example3").dataTable({ 
            "aoColumnDefs": [{ 
                "bSortable": false, 
                "aTargets": [ 0, 8 ] 
            }],
            "order": [[ 0, "asc" ]]
        });
    });
    
    
    
    
    
</script>