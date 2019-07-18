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
                            <input maxlength="50" type="text" name="url" class="form-control input-sm" id="url" required>
                        </div>
                        
                        <div class="form-group">
                            <label>PORT *</label>
                            <input maxlength="50" type="text" name="port" class="form-control input-sm" id="port" required>
                        </div>
                        
                        <div class="form-group">
                            <label>USERNAME</label>
                            <input maxlength="50" type="text" name="username" class="form-control input-sm" id="username"> 
                        </div>

                        <div class="form-group">
                            <label>API KEY</label>
                            <input maxlength="50" type="text" name="api_key" class="form-control input-sm" id="api_key"> 
                        </div>

                        <div class="form-group">
                            <label>KETERANGAN</label>
                            <input maxlength="50" type="text" name="keterangan" class="form-control input-sm" id="keterangan"> 
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