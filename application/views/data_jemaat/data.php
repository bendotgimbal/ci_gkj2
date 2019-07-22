<div class="box box-success">
    <div class="box-header">
        <div class="btn-group">
            <button type="button" class="btn btn-primary btn-sm" onclick="javascript:location.href='<?php echo base_url('data_jemaat'); ?>'"><i class="fa fa-refresh fa-lg"></i> Refresh</button>
            <button type="button" class="btn btn-primary btn-sm" onclick="javascript:location.href='<?php echo base_url('data_jemaat/formadd'); ?>'"><i class="fa fa-plus fa-lg"></i> Add Data</button>
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
                    
                    <th>NAMA</th>
                    <th>NIK</th>
                    <th>NO KK</th>
                    <th>HUBUNGAN KELUARGA</th>
                    <th>JENIS KELAMIN</th>
                    <th>EMAIL</th>
                    <!-- <th>USERNAME</th> -->
                    <!-- <th>PASSWORD</th> -->
                    <th width="100" class="text-center">ACTION</th>
                </tr>
            </thead>
            <tbody id="checkboxlist">
                
            <?php $iLoop = 1; foreach($dataAll->result() as $rsData): ?>
                <tr>
                    <td class="text-center">
                        <input type="checkbox" id="cklist" onchange="setChecked()" value="<?php echo $rsData->um_user_id; ?>">
                    </td>
                    
                    <!-- <td name="nama" id="nama"><?php echo $rsData->nama; ?></td> -->
                    <td><?php echo $rsData->nama; ?></td>
                    <td><?php echo $rsData->nik; ?></td>
                    <td><?php echo $rsData->no_kk; ?></td>
                    <!-- <td><?php echo $rsData->hubungan_keluarga; ?></td> -->
                    <td><?php $huruf = explode(" ",$rsData->hubungan_keluarga); echo $huruf[0]; ?></td>
                    <!-- <td><?php echo $rsData->username; ?></td> -->
                    <!-- <td><?php echo $rsData->password; ?></td> -->
                    <td><?php echo $rsData->jenis_kelamin; ?></td>
                    <td><?php echo $rsData->email; ?></td>
                    <td class="text-center">
                        <!-- <button onclick="javascript:location.href='<?php echo base_url('data_jemaat/formUpdate/'.$rsData->um_user_id); ?>'this.disabled=true" type="button" class="btn btn-default btn-xs glyphicon glyphicon-pencil"><span></span></button> -->

                        <button onclick="javascript:location.href='<?php echo base_url('data_jemaat/formUpdate/'.$rsData->nik); ?>'" type="button" class="btn btn-default btn-xs glyphicon glyphicon-pencil"><span></span></button>
                        <button onclick="trashData('<?php echo $rsData->um_user_id; ?>')this.disabled=true" type="button" class="btn btn-default btn-xs glyphicon glyphicon-trash"><span></span></button>
                        
                    </td>
                </tr>
            <?php $iLoop++; endforeach; ?>
                
            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
<!-- <script type="text/javascript">
        $(document).ready(function(){
             $('#nama').on('input',function(){
                
                var nama=$(this).val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('index.php/ci_gkj2/data_jemaat')?>",
                    dataType : "JSON",
                    data : {nama: nama},
                    cache:false,
                    success: function(data){
                        $.each(data,function(nama, um_user_id, nik, password, username, no_induk, no_kk, nama2){
                            $('[name="um_user_id"]').val(um_user_id.nik);
                            $('[name="nik"]').val(data.nik);
                            $('[name="nama"]').val(data.nama);
                            $('[name="password"]').val(data.password);
                            $('[name="username"]').val(data.username);
                            $('[name="no_induk"]').val(data.no_induk);
                            $('[name="no_kk"]').val(data.no_kk);
                            $('[name="nama2"]').val(data.nama2);
                        });
                        
                    }
                });
                return false;
           });

        });
    </script> -->
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
                        window.location = BASE_URL + 'data_jemaat/trash/' + LOCKID;
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
                                url : BASE_URL + 'data_jemaat/trashSelected/',
                                type: 'POST',
                                data: {data : jsonString}, 
                                success: function (response) {
                                    console.log(response);
                                    window.location = BASE_URL + 'data_jemaat'
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