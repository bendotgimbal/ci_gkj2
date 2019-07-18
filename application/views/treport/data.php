
      <div class="row">
        <div class="col-md-4" id="tabel_grafik">
        <center id="ads">Report Toko PerKota</center>


          <!-- BAR CHART -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Bar Chart</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="barChart" style="height:200px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col (RIGHT) -->
      </div>
      <!-- /.row -->
  








<div class="box box-success">
    <div class="box-header">
        <div class="btn-group">
            <button type="button" class="btn btn-primary btn-sm" onclick="javascript:location.href='<?php echo base_url('treport'); ?>'"><i class="fa fa-refresh fa-lg"></i> Refresh</button>
            
        
        <div class="btn-group navbar-btn" role="group" aria-label="...">
          
           
        </div>
    </div>
    
    <form enctype="multipart/form-data" action="<?php echo base_url('treport/carireport/'); ?>" method="post" name="defaultForm" id="defaultForm"  class="form-horizontal">
     
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
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    
                    
                    <th>Nama Kota</th>
                    <th>Jumlah Waybill</th>
                    <th>Total Revenue</th>
                    <th>Total Berat</th>
                    <th>List Store </th>
                    
                </tr>
            </thead>
            <tbody id="checkboxlist">
                
            <?php 
            $tglawal = str_replace("/", "_", $tgl_awal);
            $tglakhir = str_replace("/", "_", $tgl_akhir);
            
            $iLoop = 1; foreach($dataAll->result() as $rsData): ?>
                <tr>
                    
                    
                    <td><?php echo $rsData->tco_mcus_kota; ?></td>
                    <td><?php echo $rsData->jml_waybill; ?></td>
                    <td><?php echo $rsData->total_revenue; ?></td>
                    <td><?php echo $rsData->total_berat; ?></td>
                    <td>
                     <button onclick="javascript:location.href='<?php echo base_url('treport/detailstore/'.$rsData->tco_mcus_kota.'/'.$tglawal.'/'.$tglakhir); ?>'" type="button" class="btn btn-default btn-xs glyphicon glyphicon-pencil"><span></span></button></td>
                    
                    
                </tr>
            <?php $iLoop++; endforeach; ?>
                
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

</script>
<script>
  $(function () {
        //- DATATABLE
        $("#example1").dataTable({ 
            "aoColumnDefs": [{ 
                "bSortable": false, 
                "aTargets": [ 0, 4 ] 
            }],
            "order": [[ 3, "desc" ]]
        });
    });  

  $(function () {
   
    var areaChartData = {
      labels: [
            <?php
                foreach($dataAll->result() as $rsData):
                    echo "'{".$rsData->tco_mcus_kota."}',";
                 endforeach;
            ?>
      ],
      datasets: [
        {
          label: false,
          fillColor: "rgba(60,141,188,0.9)",
          strokeColor: "rgba(60,141,188,0.8)",
          pointColor: "#3b8bba",
          pointStrokeColor: "rgba(60,141,188,1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(60,141,188,1)",
          data: [<?php
                foreach($dataAll->result() as $rsData):
                    echo $rsData->total_revenue.",";
                 endforeach;
            ?>]
        }
      ]
    };

    
    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $("#barChart").get(0).getContext("2d");
    var barChart = new Chart(barChartCanvas);
    var barChartData = areaChartData;
    barChartData.datasets.fillColor = "#00a65a";
    barChartData.datasets.strokeColor = "#00a65a";
    barChartData.datasets.pointColor = "#00a65a";
    var barChartOptions = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: true,
      //String - Colour of the grid lines
      scaleGridLineColor: "rgba(0,0,0,.05)",
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      //Boolean - If there is a stroke on each bar
      barShowStroke: true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth: 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing: 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing: 1,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
      //Boolean - whether to make the chart responsive
      responsive: true,
      maintainAspectRatio: true
    };

    barChartOptions.datasetFill = false;
    barChart.Bar(barChartData, barChartOptions);
  });
</script>
    
