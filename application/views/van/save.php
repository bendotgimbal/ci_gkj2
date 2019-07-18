
    <div class='box box-danger color-palette-box'>
        <div class='box-header with-border'>
            <h3 class='box-title'><i class="fa fa-tag"></i> <?php echo $SUB_TITLE; ?> Forms</h3>
        </div>
        <div class='box-body'>
            <div class="row">
                <div class="box-body" style="padding: 20px;">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> Nomor Manifest : <?php echo $nomor?> </label>
                        </div>
                        
                        <div class="form-group">

                        </div>
                        <table id="example1" class="table table-bordered table-striped">
				            <thead>
				                <tr>
				                    <th width="30" class="text-center" style="padding:0; padding-bottom: 10px;"><input type="checkbox" name="checkall" id="checkall"></th>
				                    <th>Waybill</th>
				                    <th>Nama Penerima</th>
				                    <th width="234" >Alamat</th>
				                    <th>Kota</th>
									<th>Kecamatan</th>
				                    
				                </tr>	
				            </thead>
				            <tbody id="checkboxlist">
				                
				            <?php 
				            
				            $iLoop = 1; foreach($datasip->result() as $rsData): ?>
				                <tr>
									<td class="text-center">
									<input type="checkbox" id="cklist" onchange="setChecked()" value="<?php echo $rsData->tmd_mswb_nomor; ?>">	
									</td>
				                    <td><?php echo $rsData->tmd_mswb_nomor; ?></td>
									<td><?php echo $rsData->ttwb_mpen_nama; ?></td>
									<td><?php echo $rsData->ttwb_mpen_alamat; ?></td>
									<td><?php echo $rsData->ttwb_mpen_kota; ?></td>
									<td><?php echo $rsData->ttwb_mpen_kecamatan; ?></td>
					            </tr>
				            <?php $iLoop++; endforeach; ?>
				                
				            </tbody>
				        </table>
                        
                    </div>

                    <div class="col-md-12 box-footer" style="padding-left: 0px;">
						<button type="button" class="btn btn-success btn-sm" id="saveSelected"><i class="fa fa-check fa-lg"></i> Save Selected</button>
                        <button type="button" class="btn btn-danger btn-sm" onclick="resetButton()"><i class="fa fa-times fa-lg"></i> Cancel</button>
                    </div>
                    
                </div>
            </div>
        </div>
    </div> 

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
    
    
    // SAVESELECTED
    $('#saveSelected').click(function() {

        $("#checkboxlist input:checked").each(function() {
            chkArray.push($(this).val());
        });

        if(chkArray.length > 0){
            var jsonString = JSON.stringify(chkArray);
            
            bootbox.dialog({
                message: "Are you sure save data ?",
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
                                url : BASE_URL + 'sip/savedata/',
                                type: 'POST',
                                data: {data : jsonString}, 
								success: function (response) {
									alert(response);
									javascript:location.href='<?php echo base_url('sip'); ?>';
								},
								error: function(error){alert('gak tahu errornya apa coba '+error+BASE_URL+jsonString);}

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