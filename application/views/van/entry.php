<form enctype="multipart/form-data" action="<?php echo base_url('van/savedata/'); ?>" method="post" name="defaultForm" id="defaultForm"  class="form-horizontal">
        
    <div class='box box-primary color-palette-box'>
        <div class='box-header with-border'>
            <h3 class='box-title'><i class="fa fa-tag"></i> <?php echo $SUB_TITLE; ?> Forms</h3>
        </div>
        <div class='box-body'>
            <div class="row">
                <div class="box-body" style="padding: 20px;">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label class="col-sm-3">No VAN </label>
                            <input maxlength="15"  type="text" name="trsh_nomor" class="form-control input-sm" style="width: 60%;" id="trsh_nomor" disabled="disabled">
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-3">Area</label>
                        <select name="trsh_kota" class="form-control select2" id="trsh_kota" style="width: 60%;">
                                <option value="0">-- Select --</option>
                                <?php
                                    $list = "SELECT mcty_kode, mcty_nama FROM atex.mst_city";
                                    $GET_HASIL = $this->db->query($list);
                                    foreach($GET_HASIL->result() as $rsRow):
                                        echo "<option value='".$rsRow->mcty_kode."'>".$rsRow->mcty_nama."</option>";
                                    endforeach;
                                ?>
                            </select>
                        
                        
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-3">Nama Kurir *</label>
                            <input maxlength="30" type="text" name="trsh_mkur_nama" class="form-control input-sm" id="trsh_mkur_nama" style="width: 60%;" required> 
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-3">Tanggal *</label>
                            <div class="input-group date">
                            
                                <input type="text" class="form-control pull-right" name="tanggal" id="tanggal"  required>
                            </div>
                        </div>
                        
                        
                		
                			<div class="form-group">
                  				<label class="col-sm-3">Jam :</label>

                  				<div class="input-group clockpicker"  data-align="top" data-autoclose="true">
    								<input type="text" class="form-control" name="jam" id="jam" value="<?php echo date('G:i'); ?>">
    								
								</div>
                			<!-- /.form group -->
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

<script>

 $(function () {
    $(".select2").select2();
  });
  
  $('#tanggal').datepicker({
      autoclose: true
    });
	
	
$('.clockpicker').clockpicker();	
	//$('#jam').timepicker();
</script>

