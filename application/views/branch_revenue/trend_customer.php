	<?php
			$rsDCus = $dataCus->row();
			//$nama = $rsDCus->mcus_nama;
		?>
      <div class="row">
        <div class="col-md-8" id="tabel_grafik">

        <center id="ads">Trend Customer <?php echo $rsDCus->mcus_nama; ?> last 30 days  </center>


          <!-- BAR CHART -->
          <div class="box box-success"  style = "width:100%">
            <div class="box-header with-border">
              <h3 class="box-title">Customer's Rank in last 30 days (21th position means excluded from top 20 customers sort by waybill count)</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body" >
                <div id="trendcustomer"></div>
				</div>
            <!-- /.box-body -->
          </div>
		  
        </div>
        <!-- /.col (RIGHT) -->
      </div>
      <!-- /.row -->
  
<script>

$(function () {
	var 
		
		datatrend = [
			<?php
                foreach($dataAll->result() as $rsData):
                     echo '{"y": "'.$rsData->tanggal.'", "a" : "'.$rsData->nomor.'"},';
                 endforeach;
            ?>
		];
	
    Morris.Line({
	  element: 'trendcustomer',
	  data: datatrend,
	  xkey: ["y"],
	  ykeys: ["a"],
	  labels: ["Rank"],
	  ymin: 21,
	  ymax: 1,
	  lineColors : ["blue"],
	  parseTime: true,
	  resize: true,
	  xLabelMargin: 30
	});
	
});
  
</script>
    
