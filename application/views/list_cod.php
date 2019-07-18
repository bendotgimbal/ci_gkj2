<?php
	$url1=$_SERVER['REQUEST_URI'];
	header("Refresh: 600; URL=$url1");
?>


<div class="box box-success">
    <div class="box-header">
        <div class="btn-group">
            <button type="button" class="btn btn-primary btn-sm" onclick="javascript:location.href='<?php echo base_url('list_cod'); ?>'"><i class="fa fa-refresh fa-lg"></i> Refresh</button>
			<button type="button" class="btn btn-primary btn-sm" onclick="javascript:location.href='<?php echo base_url('list_cod/exportexcel'); ?>'"><i class="fa fa-file-excel-o fa_lg"></i> Export to Excel</button>
        </div>
        
        <div class="btn-group navbar-btn" role="group" aria-label="...">
           
        </div>
    </div>
    
    <!-- /.box-header -->
    <div class="box-body" style = "overflow: auto; scrollbar-base-color:#ffeaff ">
    	<h2>Live Monitoring COD</h2> 
        <table style="font-size: 12px" id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th width="30" class="text-center" style="padding:0; padding-bottom: 10px;">No</th>
                    <th>Tanggal EDP</th>
					<th>Cabang Origin</th>
                    <th>Nomor Waybill</th>
                    <th>Nama Customer</th>
                    <th>Kota Penerima</th>
                    <th>Cabang Destination</th>
                    <th>Tanggal Setoran Kurir</th>
                    <th>Tanggal Setoran Cabang-HO</th>
                    <th>Tanggal Validasi HO</th>
                    <th>Tanggal Transfer Konsumen</th>
                    <th>Tanggal POD</th>
                    <th>Tanggal DEX</th>
                    <th>Keterangan DEX</th>
                </tr>
            </thead>
            <tbody >
                
            <?php $iLoop = 1; foreach($dataCOD->result() as $rs): ?>
                <tr>
                    <td class="text-center">
                        <?php echo $iLoop; ?>
                    </td>
                    
                    <td><?php 
						//tanggal = date('d/m/Y',strtotime($rs->ttwb_tanggal_input));
						//echo $tanggal; 
						echo $rs->ttwb_tanggal_input;
					?></td>
					<td><?php echo $rs->ttwb_mlok_pk; ?></td>
                    <td><?php echo $rs->ttwb_nomor; ?></td>
                    <td><?php echo $rs->ttwb_mcus_nama; ?></td>

                    <td><?php echo $rs->ttwb_mpen_kota; ?></td>
                    <td><?php echo $rs->trsh_mlok_pk; ?></td>
                    <td><?php 
						//$tanggal = date('d/m/Y',strtotime($rs->TanggalSetoran));
						//echo $tanggal; 
						echo $rs->tanggal_setoran;
						?></td>
                        
                    <td><?php 
						//$tanggal = date('d/m/Y',strtotime($rs->TanggalBuktiSetoran));
						//echo $tanggal; 
						echo $rs->tgl_setor_rekap;
						?></td>
                    
                        
                     <td><?php 
						//$tanggal = date('d/m/Y',strtotime($rs->TanggalTransfer));
						//echo $tanggal; 
						echo $rs->tgl_validasi;
						?></td>
                     
                     <td><?php 
						//$tanggal = date('d/m/Y',strtotime($rs->TanggalPOD));
						//echo $tanggal; 
						echo $rs->tgl_bukti_transfer;
						?></td>
                    <td><?php 
						//$tanggal = date('d/m/Y',strtotime($rs->TanggalValidasi));
						//echo $tanggal; 
						echo $rs->tanggal_pod;
						?></td>
                     <td><?php 
						//$tanggal = date('d/m/Y',strtotime($rs->TanggalDEX));
						//echo $tanggal; 
						echo $rs->tanggal_dex;?></td>
                    <td><?php 
						//$tanggal = date('d/m/Y',strtotime($rs->TanggalDEX));
						//echo $tanggal; 
						echo $rs->ket_dex;?></td> 
                     
                    
                    
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
				"lengthMenu": [[50], [150]],
                "aTargets": [ 0, 7 ] 
            }],
            "order": [[ 0, "asc" ]]
        });
		
		
    });
    
    
    
    
    
</script>