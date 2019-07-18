      <div class="row">
        <div class="col-md-8" id="tabel_grafik">

        <center id="ads">BRANCHES MONTHLY REVENUE</center>
	          <!-- BAR CHART -->
	          <div class="box box-success">
	            <div class="box-header with-border">
	              <h3 class="box-title">Monthly Revenue grouping by branch<?php echo date("Y"); ?></h3>

	              <div class="box-tools pull-right">
	                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
	                </button>
	              </div>
	            </div>
	            <div class="box-body">
				
	              <div id="branches"></div>
	            </div>
	            <!-- /.box-body -->
	          </div>
        </div>
        <!-- /.col (RIGHT) -->
      </div>
      <!-- /.row -->
  


<div class="box box-success">
    <div class="box-header">
        <div class="btn-group">
            <button type="button" class="btn btn-primary btn-sm" onclick="javascript:location.href='<?php echo base_url('branch_revenue'); ?>'"><i class="fa fa-refresh fa-lg"></i> Refresh</button>
			<button type="button" class="btn btn-primary btn-sm" onclick="javascript:location.href='<?php echo base_url('branch_revenue/exportexcel'); ?>'"><i class="fa fa-file-excel-o fa_lg"></i> Export to Excel</button>
            
        
        <div class="btn-group navbar-btn" role="group" aria-label="...">
          
           
        </div>
    </div>
    
    
    <!-- /.box-header -->
    <div class="box-body" style = "overflow: auto; scrollbar-base-color:#ffeaff ">
        <table style="font-size: 9px" id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th rowspan="2">Lokasi</th>
                    <th colspan="4">Januari</th>
                    <th colspan="4">Februari</th>
                    <th colspan="4">Maret</th>
					<th colspan="4">April</th>
					<th colspan="4">Mei</th>
					<th colspan="4">Juni</th>
					<th colspan="4">Juli</th>
					<th colspan="4">Agustus</th>
					<th colspan="4">September</th>
					<th colspan="4">Oktober</th>
					<th colspan="4">Nopember</th>
                    <th colspan="4">Desember</th>
                </tr>	
				<tr>
                    <th>PUP</th>
                    <th>POD</th>
                    <th>INVOICE</th>
					<th>INV NON WAYBILL</th>
                    <th>PUP</th>
                    <th>POD</th>
                    <th>INVOICE</th>
					<th>INV NON WAYBILL</th>
                    <th>PUP</th>
                    <th>POD</th>
                    <th>INVOICE</th>
					<th>INV NON WAYBILL</th>
                    <th>PUP</th>
                    <th>POD</th>
                    <th>INVOICE</th>
					<th>INV NON WAYBILL</th>
                    <th>PUP</th>
                    <th>POD</th>
                    <th>INVOICE</th>
					<th>INV NON WAYBILL</th>
                    <th>PUP</th>
                    <th>POD</th>
                    <th>INVOICE</th>
					<th>INV NON WAYBILL</th>
                    <th>PUP</th>
                    <th>POD</th>
                    <th>INVOICE</th>
					<th>INV NON WAYBILL</th>
                    <th>PUP</th>
                    <th>POD</th>
                    <th>INVOICE</th>
					<th>INV NON WAYBILL</th>
                    <th>PUP</th>
                    <th>POD</th>
                    <th>INVOICE</th>
					<th>INV NON WAYBILL</th>
                    <th>PUP</th>
                    <th>POD</th>
                    <th>INVOICE</th>
					<th>INV NON WAYBILL</th>
                    <th>PUP</th>
                    <th>POD</th>
                    <th>INVOICE</th>
					<th>INV NON WAYBILL</th>
                    <th>PUP</th>
                    <th>POD</th>
                    <th>INVOICE</th>
					<th>INV NON WAYBILL</th>
                </tr>	
            </thead>
            <tbody id="checkboxlist">
                
            <?php 
            $iLoop = 1; foreach($dataAll->result() as $rsData): ?>
                <tr>
                    <td><?php echo $rsData->lowb_mlok_kode; ?></td>
                    <td align ="right"><?php echo number_format($rsData->pup_jan); ?></td>
					<td align ="right"><?php echo number_format($rsData->pod_jan); ?></td>
					<td align ="right"><?php echo number_format($rsData->inv_jan); ?></td>
					<td align ="right"><?php echo number_format($rsData->inw_jan); ?></td>
                    <td align ="right"><?php echo number_format($rsData->pup_feb); ?></td>
					<td align ="right"><?php echo number_format($rsData->pod_feb); ?></td>
					<td align ="right"><?php echo number_format($rsData->inv_feb); ?></td>
					<td align ="right"><?php echo number_format($rsData->inw_feb); ?></td>
                    <td align ="right"><?php echo number_format($rsData->pup_mar); ?></td>
					<td align ="right"><?php echo number_format($rsData->pod_mar); ?></td>
					<td align ="right"><?php echo number_format($rsData->inv_mar); ?></td>
					<td align ="right"><?php echo number_format($rsData->inw_mar); ?></td>
                    <td align ="right"><?php echo number_format($rsData->pup_apr); ?></td>
					<td align ="right"><?php echo number_format($rsData->pod_apr); ?></td>
					<td align ="right"><?php echo number_format($rsData->inv_apr); ?></td>
					<td align ="right"><?php echo number_format($rsData->inw_apr); ?></td>
                    <td align ="right"><?php echo number_format($rsData->pup_mei); ?></td>
					<td align ="right"><?php echo number_format($rsData->pod_mei); ?></td>
					<td align ="right"><?php echo number_format($rsData->inv_mei); ?></td>
					<td align ="right"><?php echo number_format($rsData->inw_mei); ?></td>
                    <td align ="right"><?php echo number_format($rsData->pup_jun); ?></td>
					<td align ="right"><?php echo number_format($rsData->pod_jun); ?></td>
					<td align ="right"><?php echo number_format($rsData->inv_jun); ?></td>
					<td align ="right"><?php echo number_format($rsData->inw_jun); ?></td>
                    <td align ="right"><?php echo number_format($rsData->pup_jul); ?></td>
					<td align ="right"><?php echo number_format($rsData->pod_jul); ?></td>
					<td align ="right"><?php echo number_format($rsData->inv_jul); ?></td>
					<td align ="right"><?php echo number_format($rsData->inw_jul); ?></td>
                    <td align ="right"><?php echo number_format($rsData->pup_aug); ?></td>
					<td align ="right"><?php echo number_format($rsData->pod_aug); ?></td>
					<td align ="right"><?php echo number_format($rsData->inv_aug); ?></td>
					<td align ="right"><?php echo number_format($rsData->inw_aug); ?></td>
                    <td align ="right"><?php echo number_format($rsData->pup_sep); ?></td>
					<td align ="right"><?php echo number_format($rsData->pod_sep); ?></td>
					<td align ="right"><?php echo number_format($rsData->inv_sep); ?></td>
					<td align ="right"><?php echo number_format($rsData->inw_sep); ?></td>
                    <td align ="right"><?php echo number_format($rsData->pup_okt); ?></td>
					<td align ="right"><?php echo number_format($rsData->pod_okt); ?></td>
					<td align ="right"><?php echo number_format($rsData->inv_okt); ?></td>
					<td align ="right"><?php echo number_format($rsData->inw_okt); ?></td>
                    <td align ="right"><?php echo number_format($rsData->pup_nov); ?></td>
					<td align ="right"><?php echo number_format($rsData->pod_nov); ?></td>
					<td align ="right"><?php echo number_format($rsData->inv_nov); ?></td>
					<td align ="right"><?php echo number_format($rsData->inw_nov); ?></td>
                    <td align ="right"><?php echo number_format($rsData->pup_des); ?></td>
					<td align ="right"><?php echo number_format($rsData->pod_des); ?></td>
					<td align ="right"><?php echo number_format($rsData->inv_des); ?></td>
					<td align ="right"><?php echo number_format($rsData->inw_des); ?></td>
					</tr>
            <?php $iLoop++; endforeach; ?>
                
            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
<script>
  $(function () {
	var 
		data = [
			<?php
                foreach($dataChart->result() as $rsData):
                     echo '{"y": "'.$rsData->bulan.'", "a" : "'.round($rsData->pup).'", "b" : "'.round($rsData->pod).'", "c" : "'.round($rsData->inv).'", "d" : "'.round($rsData->inw).'"},';
                 endforeach;
            ?>
		];
	
		Morris.Bar({
			element: 'branches',
			data: data,
			xkey: 'y',
			ykeys: ['a', 'b','c','d'],
			labels: ['By PUP', 'By POD','Invoice Waybill','Invoice Non Waybill'],
			barColors : ['#4295f4','#42f48c','#f442eb','#f49e42'],
			resize: true,
			gridTextWeight : 9,
			xLabelMargin: 30
		});
		
		
		
  });
</script>
    
