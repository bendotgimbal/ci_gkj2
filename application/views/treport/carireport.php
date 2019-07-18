<div class="box box-success">
    <div class="box-header">
        <div class="btn-group">
            <button type="button" class="btn btn-primary btn-sm" onclick="javascript:location.href='<?php echo base_url('umuser'); ?>'"><i class="fa fa-refresh fa-lg"></i> Refresh</button>
            
        
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
                     <button onclick="javascript:location.href='<?php echo base_url('treport/detailcaristore/'.$rsData->tco_mcus_kota.'/'.$tglawal.'/'.$tglakhir); ?>'" type="button" class="btn btn-default btn-xs glyphicon glyphicon-pencil"><span></span></button></td>
                    
                    
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

<script type="text/javascript">
    var chkArray          = [];
        chkArray.length   = 0;
    
    $(function () {
        //CHECK/UNCHECK ALL
        $('#checkall').click(function() {
            var value = $('#checkall').is(':checked');
            $(':checkbox').prop('checked', value);
            
        });
    });
    
    function setChecked() {
        $('#checkall').prop('checked', false);
    }
    
    $(function () {
        //- DATATABLE
        $("#example1").dataTable({ 
            "aoColumnDefs": [{ 
                "bSortable": false, 
                "aTargets": [ 0, 4 ] 
            }],
            "order": [[ 1, "asc" ]]
        });
    });
    
    //- TRASH DATA
    function trashData(LOCKID) {
        bootbox.dialog({
            message: "Are you sure delete data ?",
            title: "<i class='fa fa-question-circle'></i> Confirm",
            buttons: {

                danger: {
                    label: "No",
                    className: "btn-danger",
                    callback: function () {
                        var pathname 	= window.location.href; 
                        window.location = pathname; 
                    }
                },

                success: {
                    label: "Yes",
                    className: "btn-success",
                    callback: function () {
                        window.location = BASE_URL + 'umuser/trash/' + LOCKID;
                    }
                }
            }
        });
    }
    
    
    
    //- SHOW/HIDE DATA
    
    
    //- DELETED SELECTED
    $('#removeSelected').click(function() {

        $("#checkboxlist input:checked").each(function() {
            chkArray.push($(this).val());
        });

        if(chkArray.length > 0){
            var jsonString = JSON.stringify(chkArray);
            
            bootbox.dialog({
                message: "Are you sure delete data ?",
                title: "<i class='fa fa-question-circle'></i> Confirm",
                buttons: {

                    danger: {
                        label: "No",
                        className: "btn-danger",
                        callback: function () {
                            var pathname     = window.location.href; 
                            window.location = pathname; 
                        }
                    },

                    success: {
                        label: "Yes",
                        className: "btn-success",
                        callback: function () {
                            
                            $.ajax({
                                url : BASE_URL + 'umuser/trashSelected/',
                                type: 'POST',
                                data: {data : jsonString}, 
                                success: function (response) {
                                    console.log(response);
                                    window.location = BASE_URL + 'umuser'
                                }
                            });
                            
                        }
                    }
                }
            });
            
        } else {
            bootbox.dialog({
                message: "No data selected",
                title: "<i class='fa fa-question-circle'></i> Confirm",
                buttons: {

                    success: {
                        label: "OK",
                        className: "btn-success",
                        callback: function () {
                            var pathname     = window.location.href; 
                            window.location = pathname; 
                        }
                    }
                }
            });    
        }
    });
    
</script>