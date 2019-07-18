<form enctype="multipart/form-data" action="<?php echo base_url('umuserakses/savedata/'); ?>" method="post" name="defaultForm" id="defaultForm"  class="form-horizontal">
        
    <div class='box box-primary color-palette-box'>
        <div class='box-header with-border'>
            <h3 class='box-title'><i class="fa fa-tag"></i> <?php echo $SUB_TITLE; ?> Forms</h3>
        </div>
        <div id="field" class="box-body">
            <?php $i = 1; ?> 
            <table id="field_grid" class="table table-bordered table-striped" width="70%">
                <thead>
                    <tr>
                        
                        <th width="300">NAMA USER LOGIN</th>
                        <th>NAMA HAK AKSES</th>
                        
                    </tr>
                </thead>
                <tbody> 
                     
                      <tr>
                        
                        <td class="select-container1">
                            
                            <!-- <select class="form-control select2" name="um_user_id[]" id="um_user_id[]" placeholder="um_menu_id" > -->
                            <select class="form-control select2" name="username[]" id="username[]" placeholder="um_menu_id" >
                                <?php
                                    // $GET_MENU = $this->db->query("SELECT * FROM tbl_um_user ORDER BY nama ASC");
                                    // foreach($GET_MENU->result() as $rsData):
                                    //     echo "<option value=\"".$rsData->um_user_id."\">".$rsData->nama."</option>";
                                    // endforeach;

                                    $GET_MENU = $this->db->query("SELECT (nama)nama, (nik)username FROM tbl_induk WHERE nama IS NOT NULL ORDER BY nama ASC");
                                    $GET_MENU_2 = $this->db->query("SELECT (counter)count_um_user_id FROM tbl_total_user");
                                    // foreach($GET_MENU->result() as $rsData):
                                    //     echo "<option>".$rsData->nama."</option>";
                                    // endforeach;
                                    // foreach($GET_MENU_2->result() as $rsData2):
                                    //     echo "<option>".$rsData2->um_user_id."</option>";
                                    // endforeach;
                                    foreach($GET_MENU->result() as $rsData):
                                        echo "<option value=\"".$rsData->username."\">".$rsData->nama."</option>";
                                    endforeach;

                                    // foreach($GET_MENU->result() as $rsData):
                                    //     foreach($GET_MENU_2->result() as $rsData2):
                                    //     // echo "<option value=\"".$rsData2->um_user_id."\">".$rsData->nama."</option>";
                                    //     echo "<option value=\"".$rsData2->count_um_user_id."\">".$rsData->nama."</option>";
                                    //         // echo "<option value=\"".$rsData->nama."\">".$rsData->nama."</option>";
                                    //     // echo "<option>".$rsData2->um_user_id++."</option>";
                                    //         // for ($i = 0; $i < count($rsData2->um_user_id); $i++)
                                    //         // {
                                    //         //     echo "<option value=\"".$rsData2->um_user_id."\">".$rsData->nama."</option>";
                                    //         // }
                                    //     endforeach;
                                    // endforeach;
                                ?>
                            </select>
                            
                            
                        </td>
                        
                        
                        
                        <td class="select-container">
                          
                            <select class="form-control select2" name="um_akses_id[]" id="um_akses_id[]" placeholder = "um_akses_id" >
                                <?php
                                    $GET_MENU = $this->db->query("SELECT * FROM tbl_um_akses ORDER BY nama ASC");
                                    foreach($GET_MENU->result() as $rsData):
                                        echo "<option value=\"".$rsData->um_akses_id."\">".$rsData->nama."</option>";
                                    endforeach;
                                ?>
                            </select> 
                        </td>
                        
                      </tr>
                      
                     
                                                 
                </tbody>
            </table>
            
            <div class="action-buttons btn-group">
                            <button type="button" id="add_field" class="btn btn-primary btn-sm">Tambah Data</button>
                            
                            <button type="submit" class="btn btn-success btn-sm" id="simpandata">Simpan</button>
                            <button type="button" class="btn btn-danger btn-sm" onclick="resetButton()">Batal</button>
           </div>
        
    

</form>          
<script>
  $(function () {
    //Initialize Select2 Elements
     //$('body').on('DOMNodeInserted', 'select', function () {
     //   $(this).select2();
    //});
    $(".select2").select2();
    
    
    
     
  });
  
  
</script>


<script type="text/javascript">
        //function to initialize select2
        function initializeSelect2(selectElementObj) {
            selectElementObj.select2({
                tags: true
                });
                }


        //onload: call the above function 
        $(".form-control select2").each(function() {
            initializeSelect2($(this));
        });
        
        function addField() {
            
            //$($('#template').html()).appendTo('#field_grid tbody');
            var newSelect =  
                $("<?php
                    echo "<select class='form-control select2' name='um_akses_id[]' id='um_akses_id[]' placeholder ='um_akses_id'>";
                         $GET_MENU = $this->db->query("SELECT * FROM tbl_um_akses ORDER BY nama ASC");
                         foreach($GET_MENU->result() as $rsData):
                            echo "<option value=".$rsData->um_akses_id.">".$rsData->nama."</option>";   
                         endforeach;
                     echo "</select>";
                  ?>
                ");
            $(".select-container").append("<br /><br />");
            $(".select-container").append(newSelect);
            initializeSelect2(newSelect);
            
            
           
            
            
            var newSelect1 = 
                $("<?php
                    echo "<select class='form-control select2' name='um_user_id[]' id='um_user_id[]' placeholder ='um_menu_id'>";
                         $GET_MENU = $this->db->query("SELECT * FROM tbl_um_user ORDER BY nama ASC");
                         foreach($GET_MENU->result() as $rsData):
                                 echo "<option value=".$rsData->um_user_id.">".$rsData->nama."</option>";
                         endforeach;
                     echo "</select>";
                    // echo "<select class='form-control select2' name='um_user_id[]' id='um_user_id[]' placeholder ='um_menu_id'>";
                    //      // $GET_MENU = $this->db->query("SELECT * FROM tbl_um_user ORDER BY nama ASC");
                    //      $GET_MENU = $this->db->query("SELECT (nama)nama FROM tbl_induk WHERE nama IS NOT NULL ORDER BY nama ASC");
                    //      foreach($GET_MENU->result() as $rsData):
                    //              echo "<option value=".$rsData->um_user_id.">".$rsData->nama."</option>";
                    //      endforeach;
                    //  echo "</select>";
                  ?>
                ");
            $(".select-container1").append("<br /><br />");
            $(".select-container1").append(newSelect1);
            
            initializeSelect2(newSelect1);
            
            
            
            
            
            
        }
 
        function removeField(e) {
            if($('input[type=text]').parents('tbody').find('tr').length <= 2) {
                return false;
            }
            var row = $(e).closest('tr').remove();
        }
 
        $(function() {
            $('#field_grid').on('click', '.btn-remove', function(e) {
                removeField(e.target);
                return e.preventDefault();
            });
 
            $('#add_field').click(function(e) {
                addField();
                return e.preventDefault();
            });
            
            
            
 
            $('#field_grid').on('click', '.btn-up', function(e) {
                var current = $(this).parents('tr');
                 
                if(current.prevAll().length == 1) {
                    return e.preventDefault();
                }
                current.prev().before(current);
                return e.preventDefault();
            });
 
            $('#field_grid').on('click', '.btn-down', function(e) {
                var current = $(this).parents('tr');
                current.next().after(current);
                return e.preventDefault();
            });
        });
        
        //- DELETED SELECTED
    
    </script>
    <script type="text/template" id="template">
    
     <tr>
                        <td >
                            
                        </td>
                        <td >
                             
                            
                        </td>
                      </tr>
</script>
