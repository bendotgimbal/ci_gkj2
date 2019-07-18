<form enctype="multipart/form-data" action="<?php echo base_url('umuser/savedata/'); ?>" method="post" name="defaultForm" id="defaultForm"  class="form-horizontal">
        
    <div class='box box-primary color-palette-box'>
        <div class='box-header with-border'>
            <h3 class='box-title'><i class="fa fa-tag"></i> <?php echo $SUB_TITLE; ?> Forms</h3>
        </div>
        <div class='box-body'>
            <div class="row">
                <div class="box-body" style="padding: 20px;">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama User *</label>
                            <input maxlength="50" type="text" name="nama" class="form-control input-sm" id="nama" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Username *</label>
                            <input maxlength="25" type="text" name="username" class="form-control input-sm" id="username" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Password *</label>
                            <input maxlength="25" type="password" name="password" class="form-control input-sm" id="password" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Re type Password *</label>
                            <input maxlength="25" type="password" name="repassword" class="form-control input-sm" id="repassword" required>
                        </div>
                        
                        
                       
                         
                                                
                        <div class="form-group">
                            <label>Keterangan</label>
                            <input maxlength="200" type="text" name="keterangan" class="form-control input-sm" id="keterangan"> 
                        </div>
                        
                        
                         <div class="form-group">
                            <label >Nama Vendor</label>
                        <select name="customer_code" class="form-control select2" id="customer_code" required>
                                <option value="0">-- Select --</option>
                                <?php
                                    $list = "SELECT mven_kode, mven_nama FROM atex.mst_vendor";
                                    $GET_HASIL = $this->db->query($list);
                                    foreach($GET_HASIL->result() as $rsRow):
										$ket = $rsRow->mven_kode.", ".$rsRow->mven_nama;
                                        echo "<option value='".$rsRow->mven_kode."'>".$ket."</option>";
                                    endforeach;
                                ?>
                            </select>
                        
                        
                        </div>
                        
                        <div class="form-group">
                            <label >Cabang Registrasi/Lokasi</label>
                        <select name="location" class="form-control select2" id="location" required>
                                <option value="0">-- Select --</option>
                                <?php
                                    $list = "SELECT mlok_kode, mlok_nama FROM atex.mst_lokasi";
                                    $GET_HASIL = $this->db->query($list);
                                    foreach($GET_HASIL->result() as $rsRow):
										$ket = $rsRow->mlok_kode.", ".$rsRow->mlok_nama;
                                        echo "<option value='".$rsRow->mlok_kode."'>".$ket."</option>";
                                    endforeach;
                                ?>
                            </select>
                        
                        
                        </div>
                        
                        <div class="form-group">
                            <label >Kota</label>
                        <select name="city" class="form-control select2" id="city"  required>
                                <option value="0">-- Select --</option>
                                <?php
                                    $list = "SELECT mcty_kode, mcty_nama FROM atex.mst_city";
                                    $GET_HASIL = $this->db->query($list);
                                    foreach($GET_HASIL->result() as $rsRow):
										$ket = $rsRow->mcty_kode.", ".$rsRow->mcty_nama;
                                        echo "<option value='".$rsRow->mcty_kode."'>".$ket."</option>";
                                    endforeach;
                                ?>
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

<script>
  $(function () {
    $(".select2").select2();
  });
  
  
</script>