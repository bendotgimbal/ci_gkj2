<div class="box box-success">
    <div class="box-header">
        <div class="btn-group">
            <button type="button" class="btn btn-primary btn-sm" onclick="javascript:location.href='<?php echo base_url('dataorder'); ?>'"><i class="fa fa-refresh fa-lg"></i> Refresh</button>
            <button type="button" class="btn btn-primary btn-sm" onclick="javascript:location.href='<?php echo base_url('dataorder/formadd'); ?>'"><i class="fa fa-plus fa-lg"></i> Add Data</button>
        </div>
        
        
        <!-- <div class="btn-group navbar-btn" role="group" aria-label="...">
          <button type="button" class="btn btn-primary btn-sm" id="removeSelected"><i class="fa fa-times fa-lg"></i> Delete Selected</button>
        </div> -->
        
    </div>
    
    
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                
                    <!-- <th width="30" class="text-center" style="padding:0; padding-bottom: 10px;"><input type="checkbox" name="checkall" id="checkall"></th>
                 -->
                    
                    <th>Nomor AWB</th>
                    <th>Nomor Shipment</th>
                    <th>Nama Customer</th>
                    <th>Email Customer</th>
                    <th>Tlp Customer</th>
                    <th>Kode Toko</th>
                    <th>Kode Ecommers</th>
                    <th>Jumlah Pembayaran</th>
                    <th>Status</th>
                    <!-- <th width="100" class="text-center">ACTION</th> -->
                </tr>
            </thead>
            <tbody id="checkboxlist">
                
            <?php $iLoop = 1; foreach($dataAll->result() as $rsData):
            $data['awb'] = array();
                $h = $rsData->mswb_nomor;
                array_push($data['awb'], $h);
                $data_string = json_encode($data);
                
                $ch = curl_init('http://stg.alfatrex.co.id/v1/inquiry-status-order');                                                                      
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
                curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
                    'Security-Key: y3RDyqtijzVh6zdR9uWCoVW4TcmEwbbZ', 
                    'user: atri', 
                    'Content-Type: application/json',                                                                                
                    'Content-Length: ' . strlen($data_string))                                                                       
                ); 
                $result = curl_exec($ch);
                $hasil = json_decode($result,true);
             ?>
                <tr>
                    <!--
                    <td class="text-center">
                        <input type="checkbox" id="cklist" onchange="setChecked()" value="<?php //echo $rsData->msa_kode; ?>">
                    </td>
                    -->
                    <td><?php echo $rsData->mswb_nomor; ?></td>
                    <td><?php echo $rsData->shipment_nomor; ?></td>
                    <td><?php echo $rsData->cust_nama; ?></td>
                    <td><?php echo $rsData->cust_email; ?></td>
                    <td><?php echo $rsData->cust_telp; ?></td>
                    <td><?php echo $rsData->kode_toko; ?></td>
                    <td><?php echo $rsData->kode_ecommers; ?></td>
                    <td><?php echo $rsData->mount_payment; ?></td>
                    <!-- <td width="10%"><?php
                    if($rsData->status_kode == "1"){
                        echo "Aktif";
                    }else{
                        echo "Tidak Aktif";
                    }
                    ?></td> -->
                    <td width="10%">
                    <?php foreach ($hasil['inquiryStatuses'] as $key => $value) {
                    echo $value['status'];
                    } ?>
                    </td>
                    <!-- <td class="text-center">
                        <button onclick="javascript:location.href='<?php echo base_url('dataorder/formUpdate/'.$rsData->mswb_nomor); ?>'" type="button" class="btn btn-default btn-xs glyphicon glyphicon-pencil"><span></span></button>
                        
                        <button onclick="trashData('<?php echo $rsData->mswb_nomor; ?>')" type="button" class="btn btn-default btn-xs glyphicon glyphicon-trash"><span></span></button>
                        
                        
                    </td> -->
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
                        var pathname    = window.location.href; 
                        window.location = pathname; 
                    }
                },

                success: {
                    label: "Yes",
                    className: "btn-success",
                    callback: function () {
                        window.location = BASE_URL + 'dataorder/trash/' + LOCKID;
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
                                url : BASE_URL + 'dataorder/trashSelected/',
                                type: 'POST',
                                data: {data : jsonString}, 
                                success: function (response) {
                                    console.log(response);
                                    window.location = BASE_URL + 'dataorder'
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