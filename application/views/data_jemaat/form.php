<form enctype="multipart/form-data" action="<?php echo base_url('data_jemaat/savedata/'); ?>" method="post" name="defaultForm" id="defaultForm"  class="form-horizontal">
        
    <div class='box box-primary color-palette-box'>
        <div class='box-header with-border'>
            <h3 class='box-title'><i class="fa fa-tag"></i> <?php echo $SUB_TITLE; ?> Forms</h3>
        </div>
        <div class='box-body'>
            <div class="row">
                <div class="box-body" style="padding: 20px;">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>NAMA WARGA *</label>
                            <input maxlength="50" type="text" name="nama" class="form-control input-sm" id="nama" style="width:335px;" required>
                        </div>
                        
                        <div class="form-group">
                            <label>NIK *</label>
                            <input maxlength="50" type="text" name="nik" class="form-control input-sm" id="nik" style="width:335px;" required>
                        </div>
                        
                        <div class="form-group">
                            <label>NO.KK</label>
                            <input maxlength="50" type="text" name="no_induk" class="form-control input-sm" id="no_induk" style="width:335px;"> 
                        </div>

                        <div class="form-group">
                            <label>TEMPAT & TANGGAL LAHIR</label>
                            <input maxlength="50" type="text" name="tmpt_lahir" class="form-control input-sm" id="tmpt_lahir" style="width:165px;">
                            <input maxlength="50" type="text" name="tgl_lahir" class="form-control input-sm" id="tgl_lahir" style="width:165px;margin-left: 170px;margin-top: -30px;">
                        </div>

                        <div class="form-group">
                            <label>ALAMAT</label>
                            <input maxlength="50" type="text" name="alamat" class="form-control input-sm" id="alamat" style="width:335px;height:80px;text-align:justify;"> 
                        </div>
                        
                       
                        
                    </div>
                    
                    <div class="col-md-12 box-footer" style="padding-left: 0px;">
                        <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                        <button type="button" class="btn btn-danger btn-sm" onclick="resetButton()">Batal</button>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>       
    
</form>

<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
<script type="text/javascript">
        $(document).ready(function(){
             $('#nama').on('input',function(){
                
                var nama=$(this).val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('data_jemaat/formadd/get_jemaat')?>",
                    dataType : "JSON",
                    data : {nama: nama},
                    cache:false,
                    success: function(data){
                        $.each(data,function(nik, no_induk, tempat_lahir, tgl_lahir){
                            $('[name="nik"]').val(data.nik);
                            $('[name="no_induk"]').val(data.no_induk);
                            $('[name="tempat_lahir"]').val(data.tempat_lahir);
                            $('[name="tgl_lahir"]').val(data.tgl_lahir);
                        });
                        
                    }
                });
                return false;
           });

        });
    </script>