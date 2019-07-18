      
    
    
    <form enctype="multipart/form-data" action="<?php echo base_url('sip/getdata/'); ?>" method="post" name="defaultForm" id="defaultForm"  class="form-horizontal">
        
    <div class='box box-primary color-palette-box'>
        <div class='box-header with-border'>
            <h3 class='box-title'><i class="fa fa-tag"></i> <?php echo $SUB_TITLE; ?> Forms</h3>
        </div>
        <div class='box-body'>
            <div class="row">
                <div class="box-body" style="padding: 20px;">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label class="col-sm-3">Nomor Manifest </label>
                            <input maxlength="50" type="text" name="nomor_manifest" class="form-control input-sm" id="nomor_manifest" style="width: 60%;" required>
                        </div>
                        
                        

                        
                        
                        
                   <div class="col-md-12 box-footer" style="padding-left: 0px;">
                        <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div>       
    
</form>      
