<form enctype="multipart/form-data" action="<?php echo base_url('ummenu/savedata/'); ?>" method="post" name="defaultForm" id="defaultForm"  class="form-horizontal">
        
    <div class='box box-primary color-palette-box'>
        <div class='box-header with-border'>
            <h3 class='box-title'><i class="fa fa-tag"></i> <?php echo $SUB_TITLE; ?> Forms</h3>
        </div>
        <div class='box-body'>
            <div class="row">
                <div class="box-body" style="padding: 20px;">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Menu *</label>
                            <input maxlength="50" type="text" name="nama" class="form-control input-sm" id="nama" required>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label">Tipe Menu *</label>
                            <select name="tipemenu" class="form-control input-sm" id="tipemenu" required>
                                <option value="Summary">Summary</option> 
                                <option value="List">List</option>
                                <option value="Form">Form</option>
                            </select>

                        </div>
                        
                        <div class="form-group">
                            <label>URL</label>
                            <input maxlength="50" type="text" name="url" class="form-control input-sm" id="url"> 
                        </div>
                        
                         <div class="form-group">
                            <label class="control-label">Parent URL</label><br>
                            <select name="parenturl" class="form-control input-sm" id="parenturl">
                                <option value="0">-- Select --</option>
                                <?php
                                    $GET_MENU = $this->db->query("SELECT * FROM tbl_um_menu ORDER BY nama ASC");
                                    foreach($GET_MENU->result() as $rsData):
                                        echo "<option value=\"".$rsData->um_menu_id."\">".$rsData->nama."</option>";
                                    endforeach;
                                ?>
                            </select>

                        </div>
                                                
                        <div class="form-group">
                            <label>Keterangan</label>
                            <input maxlength="200" type="text" name="keterangan" class="form-control input-sm" id="keterangan"> 
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