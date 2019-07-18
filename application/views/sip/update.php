<?php foreach($dataSelected->result() as $rsData): ?>
<form enctype="multipart/form-data" action="<?php echo base_url('ummenu/updatedata/'.$LOCK_ID); ?>" method="post" name="defaultForm" id="defaultForm"  class="form-horizontal">
        
    <div class='box box-danger color-palette-box'>
        <div class='box-header with-border'>
            <h3 class='box-title'><i class="fa fa-tag"></i> <?php echo $SUB_TITLE; ?> Forms</h3>
        </div>
        <div class='box-body'>
            <div class="row">
                <div class="box-body" style="padding: 20px;">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> Nama Menu *</label>
                            <input value="<?php echo trim($rsData->nama); ?>" maxlength="50" type="text" name="nama" class="form-control input-sm" id="nama" required>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label">Tipe Menu *</label>
                            <select name="tipemenu" class="form-control input-sm" id="tipemenu" required>
                                <option value="Summary" <?php if(trim($rsData->tipemenu) == 'Summary') { echo "selected"; } ?>>Summary</option> 
                                <option value="List" <?php if(trim($rsData->tipemenu) == 'List') { echo "selected"; } ?>>List</option>
                                <option value="Form" <?php if(trim($rsData->tipemenu) == 'Form') { echo "selected"; } ?>>Form</option>
                            </select>

                        </div>
                        
                        <div class="form-group">
                            <label>URL</label>
                            <input maxlength="50" type="text" name="url" class="form-control input-sm" id="url" value="<?php echo trim($rsData->url); ?>"> 
                        </div>
                        
                         <div class="form-group">
                            <label class="control-label">Parent URL</label><br>
                            <select name="parenturl" class="form-control input-sm" id="parenturl">
                                <option value="0">-- Select --</option>
                                <?php
                                    $GET_MENU = $this->db->query("SELECT * FROM um_menu ORDER BY nama ASC");
                                    foreach($GET_MENU->result() as $rsurl): 
                                        if(trim($rsData->parenturl) == trim($rsurl->um_menu_id)) {
                                            $strSelected = "selected";   
                                        } else {
                                            $strSelected = "";
                                        }
                                        echo "<option ".$strSelected." value=\"".$rsurl->um_menu_id."\">".$rsurl->nama."</option>";
                                    endforeach;
                                ?>
                            </select>

                        </div>
                                                
                        <div class="form-group">
                            <label>Keterangan</label>
                            <input maxlength="200" type="text" name="keterangan" class="form-control input-sm" id="keterangan" value="<?php echo trim($rsData->keterangan); ?>"> 
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