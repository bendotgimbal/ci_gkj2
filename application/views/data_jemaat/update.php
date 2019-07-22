<?php foreach($dataSelected->result() as $rsData): ?>
<form enctype="multipart/form-data" action="<?php echo base_url('data_jemaat/updatedata/'.$LOCK_ID); ?>" method="post" name="defaultForm" id="defaultForm"  class="form-horizontal">
        
    <div class='box box-danger color-palette-box'>
        <div class='box-header with-border'>
            <h3 class='box-title'><i class="fa fa-tag"></i> <?php echo $SUB_TITLE; ?> Forms</h3>
        </div>
        <div class='box-body'>
            <div class="row">
                <div class="box-body" style="padding: 20px;">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> NAMA *</label>
                            <input value="<?php echo trim($rsData->nama); ?>" maxlength="50" type="text" name="nama" class="form-control input-sm" id="nama" style="width:165px;" required>
                        </div>
                        
                        <div class="form-group">
                            <label> NIK *</label>
                            <input value="<?php echo trim($rsData->nik); ?>" maxlength="50" type="text" name="nik" class="form-control input-sm" id="nik" style="width:165px;" required>
                        </div>

                        <div class="form-group">
                            <label> TEMPAT & TANGGAL LAHIR *</label>
                            <input value="<?php echo trim($rsData->tempat_lahir); ?>" maxlength="50" type="text" name="tmpt_lahir" class="form-control input-sm" id="tmpt_lahir" style="width:165px;" required>
                            <input value="<?php echo trim($rsData->tgl_lahir); ?>" maxlength="50" type="text" name="tgl_lahir" class="form-control input-sm" id="tgl_lahir" style="width:165px;margin-left: 170px;margin-top: -30px;" required>
                        </div>

                        <div class="form-group">
                            <label> UMUR *</label>
                            <input value="<?php $dateOfBirth = $rsData->tgl_lahir;$today = date("Y-m-d");$diff = date_diff(date_create($dateOfBirth), date_create($today));$age = $diff->format('%y');echo trim($age); ?>" maxlength="50" type="text" name="umur" class="form-control input-sm" id="umur" style="width:165px;" required>
                        </div>

                        <div class="form-group">
                            <label> JENIS KELAMIN *</label>
                            <input value="<?php echo trim($rsData->jenis_kelamin); ?>" maxlength="50" type="text" name="jenis_kelamin" class="form-control input-sm" id="jenis_kelamin" style="width:165px;" required>
                            <input value="<?php if ($rsData->jenis_kelamin == 'L'){echo trim($gender_name = 'Laki Laki');}elseif ($rsData->jenis_kelamin == 'P'){echo trim($gender_name = 'Perempuan');}else{echo trim($gender_name = 'Kosong');}; ?>" maxlength="50" type="text" name="ket_jenis_kelamin" class="form-control input-sm" id="ket_jenis_kelamin" style="width:165px;margin-left: 170px;margin-top: -30px;" required>
                        </div>

                        <div class="form-group">
                            <label> TEMPAT & TANGGAL BAPTIS *</label>
                            <input value="<?php if ($age < 1 && $rsData->tempat_baptis == null){echo trim($status_tempat_baptis= 'Belum Baptis');}elseif ($age > 1 && $rsData->tempat_baptis == null){echo trim($status_tempat_baptis = 'Kosong');}else{echo trim($status_tempat_baptis = $rsData->tempat_baptis);}; ?>" maxlength="50" type="text" name="tmpt_baptis" class="form-control input-sm" id="tmpt_baptis" style="width:165px;" required>
                            <input value="<?php if ($age < 1 && $rsData->tgl_baptis == null){echo trim($status_tgl_baptis= 'Belum Baptis');}elseif ($age > 1 && $rsData->tgl_baptis == null){echo trim($status_tgl_baptis = 'Kosong');}else{echo trim($status_tgl_baptis = $rsData->tgl_baptis);}; ?>" maxlength="50" type="text" name="tgl_baptis" class="form-control input-sm" id="tgl_baptis" style="width:165px;margin-left: 170px;margin-top: -30px;" required>
                        </div>

                        <div class="form-group">
                            <label> TEMPAT & TANGGAL SIDI *</label>
                            <input value="<?php if ($age < 1 && $rsData->tempat_sidi == null){echo trim($status_tempat_sidi= 'Belum Sidi');}elseif ($age > 1 && $rsData->tempat_sidi == null){echo trim($status_tempat_sidi = 'Kosong');}else{echo trim($status_tempat_sidi = $rsData->tempat_sidi);}; ?>" maxlength="50" type="text" name="tmpt_sidi" class="form-control input-sm" id="tmpt_sidi" style="width:165px;" required>
                            <input value="<?php if ($age < 1 && $rsData->tgl_sidi == null){echo trim($status_tgl_sidi= 'Belum Sidi');}elseif ($age > 1 && $rsData->tgl_sidi == null){echo trim($status_tgl_sidi = 'Kosong');}else{echo trim($status_tgl_sidi = $rsData->tgl_sidi);}; ?>" maxlength="50" type="text" name="tgl_sidi" class="form-control input-sm" id="tgl_sidi" style="width:165px;margin-left: 170px;margin-top: -30px;" required>
                        </div>

                        <div class="form-group">
                            <label> TEMPAT & TANGGAL NIKAH *</label>
                            <input value="<?php if ($age < 1 && $rsData->tempat_nikah == null){echo trim($status_tempat_nikah= 'Belum Dewasa');}elseif ($age > 1 && $rsData->tempat_nikah == null){echo trim($status_tempat_nikah = 'Kosong');}else{echo trim($status_tempat_nikah = $rsData->tempat_nikah);}; ?>" maxlength="50" type="text" name="tmpt_nikah" class="form-control input-sm" id="tmpt_nikah" style="width:165px;" required>
                            <input value="<?php if ($age < 1 && $rsData->tgl_nikah == null){echo trim($status_tgl_nikah= 'Belum Dewasa');}elseif ($age > 1 && $rsData->tgl_nikah == null){echo trim($status_tgl_nikah = 'Kosong');}else{echo trim($status_tgl_nikah = $rsData->tgl_nikah);}; ?>" maxlength="50" type="text" name="tgl_nikah" class="form-control input-sm" id="tgl_nikah" style="width:165px;margin-left: 170px;margin-top: -30px;" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label> KATEGORI *</label>
                            <input value="<?php if ($age <= 5){echo trim($status = 'Batita');}elseif ($age <= 17){echo trim($status = 'Pra Remaja');}elseif ($age <= 30){echo trim($status = 'Pemuda');}elseif ($age < 50){echo trim($status = 'Dewasa');}else{echo trim($status = 'Adiyuswa');}; ?>" maxlength="50" type="text" name="umur" class="form-control input-sm" id="umur" style="width:165px;" required>
                        </div>

                        <div class="form-group">
                            <label> EMAIL *</label>
                            <input value="<?php echo trim($rsData->email); ?>" maxlength="50" type="text" name="email" class="form-control input-sm" id="email" style="width:165px;" required>
                        </div>
                        <input value="<?php echo trim($rsData->no_induk); ?>" name="no_induk" id="no_induk" class="form-control" type="hidden" style="width:335px;">
                        <input value="<?php echo trim($rsData->Field1); ?>" name="no_kk" id="no_kk" class="form-control" type="hidden" style="width:335px;">
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
<div id="notifications" style="cursor: pointer;position: fixed;right: 0px;z-index: 9999;bottom: 0px;margin-bottom: 22px;margin-right: 15px;min-width: 300px;max-width: 800px;"><?php echo $this->session->flashdata('msg'); ?></div>
<script>   
    $('#notifications').slideDown('slow').delay(3000).slideUp('slow');
</script>
<?php endforeach; ?>