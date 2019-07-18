<div class="box box-success">
    <div class="box-header">
        <div class="btn-group">
            <button type="button" class="btn btn-primary btn-sm" onclick="javascript:location.href='<?php echo base_url('ummenu'); ?>'"><i class="fa fa-refresh fa-lg"></i> Refresh</button>
            <button type="button" class="btn btn-primary btn-sm" onclick="javascript:location.href='<?php echo base_url('ummenu/formadd'); ?>'"><i class="fa fa-plus fa-lg"></i> Add Data</button>
        </div>
        
        <div class="btn-group navbar-btn" role="group" aria-label="...">
          <button type="button" class="btn btn-primary btn-sm" id="removeSelected"><i class="fa fa-times fa-lg"></i> Delete Selected</button>
           
        </div>
    </div>
    
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th width="30" class="text-center" style="padding:0; padding-bottom: 10px;"><input type="checkbox" name="checkall" id="checkall"></th>
                    <th width="200">ID</th>
                    <th>NAMA</th>
                    <th>TIPE MENU</th>
                    <th>URL</th>
                    <th width="50" class="text-center">KETERANGAN</th>
                    <th width="100" class="text-center">ACTION</th>
                </tr>
            </thead>
            <tbody id="checkboxlist">
                
            <?php $iLoop = 1; foreach($dataAll->result() as $rsData): ?>
                <tr>
                    <td class="text-center">
                        <input type="checkbox" id="cklist" onchange="setChecked()" value="<?php echo $rsData->um_menu_id; ?>">
                    </td>
                    <td><?php echo $rsData->um_menu_id; ?></td>
                    <td><?php echo $rsData->nama; ?></td>
                    <td><?php echo $rsData->tipemenu; ?></td>
                    <td><?php echo $rsData->url; ?></td>
                    <td class="text-center"><?php echo $rsData->keterangan; ?></td>
                    <td class="text-center">
                        <button onclick="javascript:location.href='<?php echo base_url('ummenu/formUpdate/'.$rsData->um_menu_id); ?>'" type="button" class="btn btn-default btn-xs glyphicon glyphicon-pencil"><span></span></button>
                        <button onclick="trashData('<?php echo $rsData->um_menu_id; ?>')" type="button" class="btn btn-default btn-xs glyphicon glyphicon-trash"><span></span></button>
                        
                    </td>
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
                        var pathname 	= window.location.href; 
                        window.location = pathname; 
                    }
                },

                success: {
                    label: "Yes",
                    className: "btn-success",
                    callback: function () {
                        window.location = BASE_URL + 'ummenu/trash/' + LOCKID;
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
                                url : BASE_URL + 'ummenu/trashSelected/',
                                type: 'POST',
                                data: {data : jsonString}, 
                                success: function (response) {
                                    console.log(response);
                                    window.location = BASE_URL + 'ummenu'
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