<?php foreach($dataSelected->result() as $rsData): ?>
<form enctype="multipart/form-data" action="<?php echo base_url('ummenuakses/updatedata/'.$LOCK_ID); ?>" method="post" name="defaultForm" id="defaultForm"  class="form-horizontal">
        
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
                            <!-- <input value="<?php echo trim($rsData->nama); ?>" maxlength="15" type="text" name="nama" class="form-control input-sm" id="nama" required> -->
                            <select value="<?php echo trim($rsData->um_akses_id); ?>" class="form-control select2" name="um_akses_id[]" id="um_akses_id[]" placeholder = "um_akses_id" >
                                <?php
                                    $GET_MENU = $this->db->query("SELECT * FROM tbl_um_akses ORDER BY nama ASC");
                                    foreach($GET_MENU->result() as $rsData):
                                        echo "<option value=\"".$rsData->um_akses_id."\">".$rsData->nama."</option>";
                                    endforeach;
                                ?>
                            </select> 
                        </div>

                        <div class="form-group">
                            <label>Nama Menu *</label>
                            <select value="<?php echo trim($rsData->um_akses_id); ?>" name="um_menu_id" class="form-control select2" id="um_menu_id">
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
                            <label class="control-label">Tipe Menu *</label>
                            <select name="tipemenu" class="form-control input-sm" id="tipemenu" required>
                                <option value="Summary" <?php if(trim($rsData->tipemenu) == 'Summary') { echo "selected"; } ?>>Summary</option> 
                                <option value="List" <?php if(trim($rsData->tipemenu) == 'List') { echo "selected"; } ?>>List</option>
                                <option value="Form" <?php if(trim($rsData->tipemenu) == 'Form') { echo "selected"; } ?>>Form</option>
                            </select>

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