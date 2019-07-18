<div class="box box-success">
    <div class="box-header">
        <div class='box-header with-border'>
        	<h3 class='box-title'><i class="fa fa-tag"></i> <?php echo $TITLE; ?> </h3>
        </div>
    </div>

    <div class="box-header">
        
    
    <form enctype="multipart/form-data" action="<?php echo base_url('status/carireport/'); ?>" method="post" name="defaultForm" id="defaultForm"  class="form-horizontal">
     
     <div class='box box-primary color-palette-box'>
        <div class='box-body'>
            <div class="row">
               <div class="col-md-3">
                    <div class="form-group">
                            <label class="control-label">Tanggal Awal</label>
                            <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                                <input type="text" class="form-control pull-right" name="tgl_awal" id="tgl_awal">
                            </div>
                      </div>
               </div>
               <div class="col-md-1">
               </div>
               <div class="col-md-3">
                    <div class="form-group">
                            <label class="control-label">Tanggal Akhir</label>
                            <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                                <input type="text" class="form-control pull-right" name="tgl_akhir" id="tgl_akhir">
                            </div>
                      </div>
               </div>
               <div class="col-md-1">
               </div>
               <div class="col-md-3"><br />
                    <button type="submit" class="btn btn-success btn-sm">Cari</button>
            </div>
               
     </div>   
    
    
    
    </form>
    
    <!-- /.box-header -->
    <div class="box-body" style = "overflow: auto; scrollbar-base-color:#ffeaff ">
        <table id="example1" class="table table-bordered table-striped"  >
            <thead>
                <tr>
                    
                    <th>Tanggal </th>
                    <th>Nomor Waybill</th>
                    <th>Nama Penerima</th>
                    <th>Kecamatan/Kota Penerima</th>
                    <th>Total Berat</th>
                    <th>Kubikasi</th>
                    <th>Status</th>
                    
                </tr>
            </thead>
            <tbody id="checkboxlist">
                
            <?php 
            $tglawal = str_replace("/", "_", $tgl_awal);
            $tglakhir = str_replace("/", "_", $tgl_akhir);
			
			if ($dataAll <> "") {
            
            $iLoop = 1; foreach($dataAll->result() as $rsData): ?>
                <tr>
                    
                    <td><?php echo date('d-m-Y',strtotime($rsData->ttwb_tanggal_input)) ; ?> </td>
                    <td><?php echo $rsData->ttwb_nomor; ?></td>
                    <td><?php echo $rsData->ttwb_mpen_nama; ?></td>
                    <td><?php echo $rsData->ttwb_mpen_kota."/".$rsData->ttwb_mpen_kecamatan; ?></td>
                    <td><?php echo $rsData->ttwb_kg_real; ?></td>
                    <td><?php echo $rsData->kubikasi; ?></td>
                    <td><?php echo $rsData->last_state_app; ?></td>
                    
                    
                </tr>
            <?php $iLoop++; endforeach; 
			}?>
                
            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
<script>
    $('#tgl_awal').datepicker({
      autoclose: true
    });

    $('#tgl_akhir').datepicker({
      autoclose: true
    });


  $(function () {
        //- DATATABLE
        $("#example1").dataTable({ 
            "aoColumnDefs": [{ 
                "bSortable": false, 
                "aTargets": [ 0, 5 ] 
            }],
            "order": [[ 0, "desc" ]]
        });
    });  

  
</script>
    
