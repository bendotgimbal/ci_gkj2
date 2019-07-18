<div class="box box-success">
    <div class="box-header">
        <div class="btn-group">
		<?php
			$rsDCus = $dataCus->row();
			//$nama = $rsDCus->mcus_nama;
		?>
		<table border="0">
	    <tr>
			<td><div id="kode">Kode Customer </div></td> <td> : </td> <td><div id="kode"><?php echo $kode; ?></div></td>
	    </tr>
	    <tr>
			<td><div id="nama">Nama Customer </div></td> <td> : </td> <td><div id="nama"><?php echo $rsDCus->mcus_nama; ?></div></td>
	    </tr>
		<tr>
			<td><div id="poeriode">Periode </div></td> <td> : </td> <td><div id="periode"><?php echo $tgl_awal.' s/d '.$tgl_akhir; ?></div></td>
	    </tr>

		</table>

			<button type="button" class="btn btn-primary btn-sm" onclick="javascript:location.href='<?php echo base_url('top_20_customer'); ?>'"><i class="fa fa-refresh fa-lg"></i> Refresh</button>
			<div class="btn-group navbar-btn" role="group" aria-label="...">
           
        </div>
    </div>
    
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    
                    
                    <th>Tanggal</th>
                    <th>Waybill</th>
                    <th>Kota Asal</th>
                    <th>Nama Kota Asal </th>
                    <th>Kota Tujuan</th>
					<th>Nama Kota Tujuan</th>
                    <th>Berat</th>
					<th>Berat Aktual</th>
					<th>Panjang</th>
					<th>Lebar</th>
					<th>Tinggi</th>
					<th>Total</th>
					
                </tr>
            </thead>
            <tbody id="checkboxlist">
                
            <?php $iLoop = 1; foreach($dataAll->result() as $rsData): ?>
                <tr>
                    
                    
                    <td><?php echo $rsData->lowb_tanggal_trs; ?></td>
                    <td><?php echo $rsData->ttwb_nomor; ?></td>
                    <td><?php echo $rsData->ttwb_mcus_mcty_kode; ?></td>
                    <td><?php echo $rsData->ttwb_mcus_kota; ?></td>
					<td><?php echo $rsData->ttwb_mpen_mcty_kode; ?></td>
					<td><?php echo $rsData->ttwb_mpen_kota; ?></td>
					<td align="right"><?php echo number_format($rsData->ttwb_kg); ?></td>
					<td align="right"><?php echo number_format($rsData->ttwb_kg_real); ?></td>
					<td align="right"><?php echo number_format($rsData->ttwb_panjang); ?></td>
					<td align="right"><?php echo number_format($rsData->ttwb_lebar); ?></td>
					<td align="right"><?php echo number_format($rsData->ttwb_tinggi); ?></td>
					<td align="right"><?php echo number_format($rsData->ttwb_total); ?></td>
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
                "aTargets": [ 0, 3 ] 
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