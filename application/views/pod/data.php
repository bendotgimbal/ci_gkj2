<form enctype="multipart/form-data" action="<?php echo base_url('pod/savedata/'); ?>" method="post" name="defaultForm" id="defaultForm"  class="form-horizontal">
        
    <div class='box box-primary color-palette-box'>
        <div class='box-header with-border'>
            <h3 class='box-title'><i class="fa fa-tag"></i> <?php echo $SUB_TITLE; ?> Forms</h3>
        </div>
        <div class='box-body'>
            <div class="row">
                <div class="box-body" style="padding: 20px;">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label class="col-sm-3">Nomor Waybill </label>
                            <input maxlength="50" type="text" name="waybill" class="form-control input-sm" id="waybill" style="width: 60%;" onBlur="getData()" required>
                            <div id="waiting"><img src="assets/img/ajax-loader.gif"/></div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-3">Nama Pengirim</label>
                            <input type="text" name="mswb_pk" id="mswb_pk" class="form-control input-sm"  style="width: 60%;" value="">
                            <div id="pengirim" style="width:60%;"></div>
                        
                        
                        
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-3">Nama Tujuan</label>
                            <div id="nama_tujuan" style="width:60%px;"></div> 
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-3">Alamat Tujuan</label>
                            <div id="alamat" style="width:60%;"></div>
                        </div>
                        
               			<div class="form-group">
							<label class="col-sm-3">Diterima Oleh</label>
							<input maxlength="50" type="text" name="penerima" class="form-control input-sm" id="penerima" style="width:60%;" required>
						</div>

						<div class="form-group">
                            <label class="col-sm-3">Tipe Penerima</label>
                            <select class="form-control select2" name="tipe_pod"  id="tipe_pod" style="width:60%;">
                                <?php $iLoop = 1; foreach($pod->result() as $rsData): ?>
									<option value="<?php echo $rsData->mrem_kode; ?>">
										<?php echo $rsData->tipe_pod;?>
									</option>
								<?php  $iLoop++; endforeach; ?>
								</select>
                        </div>

						<div class="form-group">
                            <label class="col-sm-3">Tanggal Terima *</label>
                            <div class="input-group date">
                                <input type="text" class="form-control pull-right" name="tgl_terima" id="tgl_terima"  required>
                            </div>
                        </div>         
                        
                        <div class="form-group">
                  				<label class="col-sm-3">Jam Terima </label>
                  				<div class="input-group clockpicker"  data-align="top" data-autoclose="true">
                                    <input type="text" class="form-control" name="jam_terima" id="jam_terima"  value="<?php echo date('G:i'); ?>" required>
    								
								</div>
                			<!-- /.form group -->
              			</div>
               
               			<div class="form-group">
                            <label class="col-sm-3">Keterangan</label>
                            <input type="text" class="form-control" name="keterangan" id="keterangan" style="width:70%;">
                            
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

    $('#tgl_terima').datepicker({
      autoclose: true
	});
	//$('#jam_terima').timepicker();
	$('.clockpicker').clockpicker();	
	$("#waiting").hide();
	
	$('#tgl_terima').change( function() {
	  if (Date.parse($(this).val()) > Date.parse(new Date())) {
	     alert("You cannot select a day future than today!");
		 var formattedDate = new Date();
  		 var d = formattedDate.getDate();
		 var m =  formattedDate.getMonth();
		 m += 1;  // JavaScript months are 0-11
		 var y = formattedDate.getFullYear();
		$("#tgl_terima").val(m + "/" + d + "/" + y);
	  }
	});
	
	function getData()
    {
		var awb = document.getElementById("waybill").value;
		if (awb!="") {
			$("#waiting").show();
			$.ajax({
				type: "POST",
				url: "pod/getdata",
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