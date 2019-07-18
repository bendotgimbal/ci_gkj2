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
                            <label style="align:left">: <?php echo $trsh_nomor; ?></label>
                            
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-3">Area</label>
                        	<label style="align:left">: <?php echo $trsh_kota; ?></label>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-3">Nama Kurir *</label>
							<label style="align:left">: <?php echo $trsh_mkur_nama; ?></label>
                        </div>
                </div>
            </div>
        </div>
    </div>

<form enctype="multipart/form-data" action="<?php echo base_url('van/entryawb/'.$id); ?>" method="post" name="form-add" id="form-add"  class="form-horizontal">
        
    <div class='box box-primary color-palette-box'>
        
        <div class='box-body'>
            <div class="row">
                <div class="box-body" style="padding: 20px;">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label class="col-sm-3">No AWB  <?php echo "<font color='red'>".$message."</font>"; ?> </label>
                            <input maxlength="15"  type="text" name="trsh_nomor" class="form-control input-sm" style="width: 60%;" id="trsh_nomor" required>
                            <input type="hidden" name="id" class="form-control input-sm" style="width: 60%;" id="id" value="<?php echo $id; ?>">
                        </div>
                    <div class="col-md-12 box-footer" style="padding-left: 0px;">
                        <button type="button" class="btn btn-success btn-sm" id="btn-simpan">Simpan</button>
                        <button type="button" class="btn btn-primary btn-sm" id="btn-delete">Delete</button>
                        
                        <button type="button" class="btn btn-danger btn-sm" onclick="javascript:location.href='<?php echo base_url('van'); ?>'">Entry New VAN</button>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>       
    
</form>

<?php
echo "<div id='result' style='display: none'>";
echo "<div id='content_result'>";
echo "<h5 id='result_id'>Data AWB : 
		<label class='label_output'><div id='value'> </div></label></h5><br/><hr>";
echo "</div>";
echo "</div>";
?>

<?php
echo "<div id='result2' style='display: none'>";
echo "<div id='content_result2'>";
echo "<h4 id='result_id2'>Data AWB  ditemukan : </h4>
		<label class='label_output'><div id='value2'> </div></label><br/><hr>";
echo "</div>";
echo "</div>";
?>

<div class="box box-success">
   
    
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th width="30" class="text-center" style="padding:0; padding-bottom: 10px;"></th>
                    
                    <th>NO. AWB</th>
                    <th>Kota</th>
                    <th>Alamat</th>
                    <th >Berat</th>
                </tr>
            </thead>
            <tbody id="checkboxlist">
                
            <?php $iLoop = 1; foreach($dataAll->result() as $rsData): ?>
                <tr>
                    <td class="text-center">
                        
                    </td>
                    
                    <td><?php echo $rsData->ttwb_nomor; ?></td>
                    <td><?php echo $rsData->ttwb_mpen_kota; ?></td>
                    <td><?php echo $rsData->alamat; ?></td>
                    <td class="text-center">
                        <?php echo $rsData->ttwb_kg_real; ?>
                    </td>
                </tr>
            <?php $iLoop++; endforeach; ?>
                
            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
</div>



<script>
		$('#btn-simpan').click(function(){
           	
			var v_awb = document.getElementById("trsh_nomor").value;
			var v_id = document.getElementById("id").value;
			jQuery.ajax({
				url: "<?php echo site_url()?>/van/saveawb",
				type: "POST",
				dataType: 'json',
				data: {awb: v_awb, id: v_id},
				success: function(res) {
				if (res.status == "Notfound")
				{
					jQuery("div#result").show();
					jQuery("div#value").html(res.hasil);
					jQuery("div#result2").hide();
				}
				else
				{
					//jQuery("div#result2").show();
					//jQuery("div#result").hide();
					//jQuery("div#value2").html(res.hasil);
					document.getElementById("trsh_nomor").value = "";
					window.location = BASE_URL + 'van/entryawb/' + v_id;
				}
				
				
				}
			});
      		
		});
		
		$('#btn-delete').click(function(){
           	
			var v_awb = document.getElementById("trsh_nomor").value;
			var v_id = document.getElementById("id").value;
			jQuery.ajax({
				url: "<?php echo site_url()?>/van/deleteawb",
				type: "POST",
				dataType: 'json',
				data: {awb: v_awb, id: v_id},
				success: function(res) {
				if (res.status == "Notfound")
				{
					jQuery("div#result").show();
					jQuery("div#value").html(res.hasil);
					jQuery("div#result2").hide();
				}
				else
				{
					//jQuery("div#result2").show();
					//jQuery("div#result").hide();
					//jQuery("div#value2").html(res.hasil);
					document.getElementById("trsh_nomor").value = "";
					window.location = BASE_URL + 'van/entryawb/' + v_id;
				}
				
				
				}
			});
      		
		});

</script>