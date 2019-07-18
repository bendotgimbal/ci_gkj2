<?php foreach($dataSelected->result() as $rsData): ?>
<form enctype="multipart/form-data" action="<?php echo base_url('umakses/updatedata/'.$LOCK_ID); ?>" method="post" name="defaultForm" id="defaultForm"  class="form-horizontal">
        
    <div class='box box-danger color-palette-box'>
        <div class='box-header with-border'>
            <h3 class='box-title'><i class="fa fa-tag"></i> <?php echo $SUB_TITLE; ?> Forms</h3>
        </div>
        <div class='box-body'>
            <div class="row">
                <div class="box-body" style="padding: 20px;">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> Nama Hak Akses *</label>
                            <input value="<?php echo trim($rsData->nama); ?>" maxlength="15" type="text" name="nama" class="form-control input-sm" id="nama" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Keterangan</label>
                            <input value="<?php echo trim($rsData->keterangan); ?>" maxlength="200" type="text" name="keterangan" class="form-control input-sm" id="keterangan"> 
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
<?php endforeach; ?>