<form enctype="multipart/form-data" action="<?php echo base_url('dex_vendor/savedata/'); ?>" method="post" name="defaultForm"  class="form-horizontal">
        
    <div class='box box-primary color-palette-box'>
        <div class='box-header with-border'>
            <h3 class='box-title'><i class="fa fa-tag"></i> <?php echo $SUB_TITLE; ?> Forms</h3>
        </div>
        <div class='box-body'>
            <div class="row">
                <div class="box-body" style="padding: 20px;">
                    <div class="col-md-8">
                    	<div class="form-group">
                            <label class="col-sm-3">Tanggal Sistem</label>
                            <div class="input-group date">
                                <td width="10%">
			                    <?php $iLoop = 1; foreach($TimeServerNow->result() as $rsData): ?>
									<option value="<?php echo $rsData->dateserver; ?>">
										<?php echo $rsData->dateserver;?>
									</option>
								<?php  $iLoop++; endforeach; ?>
			                    </td>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-3">Jam Sistem</label>
                            <div class="input-group date">
                                <td width="10%">
			                    <?php $iLoop = 1; foreach($TimeServerNow->result() as $rsData): ?>
									<option value="<?php echo $rsData->timeserver; ?>">
										<?php echo $rsData->timeserver;?>
									</option>
								<?php  $iLoop++; endforeach; ?>
			                    </td>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3">Nomor Waybill *</label>
                            <!-- <input type="text" name="waybill" id="waybill" class="form-control input-sm"  style="width: 60%;" value=""> -->
                            <select class="form-control select2" name="waybill"  id="waybill" style="width:60%;" required>
                                <option value="" selected>-- Nomor Waybill --</option>
								<?php $iLoop = 1; foreach($AwbVendor->result() as $rsData): ?>
									<option value="<?php echo $rsData->mswb_nomor; ?>">
										<?php echo $rsData->mswb_nomor;?>
									</option>
								<?php  $iLoop++; endforeach; ?>
								</select>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3">Lokasi *</label>
                            <select class="form-control select2" name="master_city"  id="master_city" style="width:60%;" required>
                                <option value="" selected>-- Lokasi --</option>
								<?php $iLoop = 1; foreach($MasterCity->result() as $rsData): ?>
									<option value="<?php echo $rsData->mcty_kode."|".$rsData->mcty_nama; ?>">
										<?php echo $rsData->master_city;?>
									</option>
								<?php  $iLoop++; endforeach; ?>
								</select>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3">Alasan *</label>
                            <select class="form-control select2" name="tipe_pod"  id="tipe_pod" style="width:60%;" required>
                                <option value="" selected>-- Alasan --</option>
								<?php $iLoop = 1; foreach($pod->result() as $rsData): ?>
									<option value="<?php echo $rsData->mrem_kode."|".$rsData->mrem_keterangan; ?>">
										<?php echo $rsData->tipe_pod;?>
									</option>
								<?php  $iLoop++; endforeach; ?>
								</select>
                        </div>

                        <div class="form-group">
                  				<label class="col-sm-3">Tanggal VDR Waybill</label>
                  				<div class="input-group clockpicker"  data-align="top" data-autoclose="true">
                                    <input type="text" class="form-control" disabled="disabled"  name="tgl_vdr" id="tgl_vdr"  required>
								</div>
              			</div>
                        
                       <div class="form-group">
                            <label class="col-sm-3">Tanggal Actual *</label>
                            <div class="input-group date">
                                <input type="text" class="form-control pull-right" name="tgl_actual" id="tgl_actual"  value="<?php echo date('m/d/Y'); ?>" required>
                            </div>
                        </div>         
                        
                        <div class="form-group" Hidden="true">
                  				<label class="col-sm-3">Jam SIP</label>
                  				<div class="input-group clockpicker"  data-align="top" data-autoclose="true">
                                    <input type="text" class="form-control" name="jam_sip" id="jam_sip"  value="<?php echo date('G:i', strtotime('-135 minutes')); ?>" required>
    								
								</div>
              			</div>

              			<div class="form-group" Hidden="true">
                  				<label class="col-sm-3">Jam Van</label>
                  				<div class="input-group clockpicker"  data-align="top" data-autoclose="true">
                                    <input type="text" class="form-control" disabled="disabled"  name="jam_van" id="jam_van"  value="<?php echo date('G:i', strtotime('-120 minutes')); ?>" required>
								</div>
              			</div>

              			<div class="form-group">
                  				<label class="col-sm-3">Jam DEX *</label>
                  				<div class="input-group clockpicker"  data-align="top" data-autoclose="true" required>
                                    <input type="text" class="form-control" name="jam_dex" id="jam_dex"  value="<?php echo date('G:i'); ?>" data-inputmask="'alias': 'hh:mm'" data-mask required>
								</div>
              			</div>

              			<div class="form-group">
                            <label class="col-sm-3">Keterangan *</label>
                            <input type="text" class="form-control" name="keterangan" id="keterangan" style="width:60%;" required>
                            
                        </div>
                        
                        
                      <div class="col-md-12 box-footer" style="padding-left: 0px;">
                        <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                        
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

    $('#tgl_actual').datepicker({
      autoclose: true
	});
	//$('#jam_terima').timepicker();
	$('.clockpicker').clockpicker();	
	$("#waiting").hide();
	
	$('#tgl_actual').change( function() {
	 if (Date.parse($(this).val()) < Date.parse($("#tgl_vdr").val())){
			alert("Tanngal POD Harus Lebih Besar Dari Tanggal VDR!");
			var formattedDate = new Date();
	  		var d = formattedDate.getDate();
			var m =  formattedDate.getMonth();
			m += 1;  // JavaScript months are 0-11
			var y = formattedDate.getFullYear();
			$("#tgl_actual").val(m + "/" + d + "/" + y);
		}
	});
	
	$('#jam_dex').change( function() {
		var timeA = $("#jam_dex").val();
		var n = timeA.indexOf("_");
		if (n > -1) {
			alert("Salah Pengisian Format Waktu DEX");
		};
		function toSeconds(time_str) {
		    // Extract hours, minutes and seconds
		    var parts = time_str.split(':');	// compute  and return total seconds
		    return parts[0] * 3600 + 			// an hour has 3600 seconds
		    parts[1] * 60;
		}

		var difference = Math.abs(toSeconds(timeA) - 7200);
		var difference2 = Math.abs(toSeconds(timeA) - 8100);
		
		var result = [
		    Math.floor(difference / 3600), 			// an hour has 3600 seconds
		    Math.floor((difference % 3600) / 60)	// a minute has 60 seconds
		];

		var result2 = [
		    Math.floor(difference2 / 3600), 			// an hour has 3600 seconds
		    Math.floor((difference2 % 3600) / 60)	// a minute has 60 seconds
		];

		result = result.map(function(v) {
		    return v < 10 ? '0' + v : v;
		}).join(':');
		result2 = result2.map(function(v) {
		    return v < 10 ? '0' + v : v;
		}).join(':');
		$("#jam_van").val(result);
		$("#jam_sip").val(result2);
    });

    $("#jam_dex").inputmask("hh:mm", {"placeholder": "hh:mm"});
    $("[data-mask]").inputmask();

    $('#waybill').change( function() {
		var no_waybill = $("#waybill").val();
		var parts = no_waybill.split('|');
		var str_waybill = parts[0];
		var str_tgl = parts[1];
		var new_date = moment(str_tgl).format('MM/DD/YYYY');
		$("#tgl_vdr").val(new_date);
    });

    $(document).ready(function(){
	    $("form").submit(function(){
	        var jam_dex = $('#jam_dex').val();
	        var jam_dex_regex = /(2[0-4]|[01][1-9]|10):([0-5][0-9])/;
	        if (!jam_dex.match(jam_dex_regex) || jam_dex.length == 0) {
	        	alert("Salah Pengisian Format Waktu DEX");
	        	$("#jam_dex").focus();
	        	return false;
	        } else {
			alert("Form Submitted Successfuly!");
			return true;
			}
	    });
	});
	
	function getData()
    {
		var awb = document.getElementById("waybill").value;
		if (awb!="") {
			$("#waiting").show();
			$.ajax({
				type: "POST",
				url: "pod_vendor/getdata",
				data: {"waybill":awb},
				timeout: 10000,
				beforeSend: function(){},
				complete: function(){},
				cache: false,
				success: function(result){
					var res = result.split("|");
					if (res[0]=="error")
					{
						//$("#namaadd").html(i.value+" - Item not found !!");
						alert(res[1]);
						$("#mswb_pk").val("");
						$("#waybill").val("");
						$("#pengirim").html("");
						$("#nama_tujuan").html("");
						$("#alamat").html("");
						$("#waybill").focus();
					}
					else
					{
						$("#mswb_pk").val(res[0]);
						$("#pengirim").html(res[1]);
						$("#nama_tujuan").html(res[2]);
						$("#alamat").html(res[3]);
						
					}
					$("#waiting").hide();
				},
				error: function(error){alert('request timeout, please try again.');$("#waiting").hide();}
				}
			);
			
			}
		else
		{	$("#pengirim").html("");
			$("#nama_tujuan").html("");
			$("#alamat").html("");
		}
			
    } 		
	
</script>