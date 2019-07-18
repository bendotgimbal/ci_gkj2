<html data-ng-app="bab1">
<body  ng-controller="MainController" >


<form class="form-horizontal">
        
    <div class='box box-primary color-palette-box'>
        <div class='box-header with-border'>
            <h3 class='box-title'><i class="fa fa-tag"></i> <?php echo $SUB_TITLE; ?> Forms</h3>
        </div>
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped" width="70%">
                <thead>
                    <tr>
                        
                        <th width="300">NAMA HAK AKSES</th>
                        <th>NAMA MENU</th>
                        
                    </tr>
                </thead>
                <tbody> 
                     
                      <tr data-ng-repeat="key in data">
                        <td>
                            <select class="form-control select2" name="um_akses_id" id="um_akses_id" data-ng-model="data[$index].um_akses_id" >
                                <?php
                                    $GET_MENU = $this->db->query("SELECT * FROM um_akses ORDER BY nama ASC");
                                    foreach($GET_MENU->result() as $rsData):
                                        echo "<option value=\"".$rsData->um_akses_id."\">".$rsData->nama."</option>";
                                    endforeach;
                                ?>
                            </select>
                        </td>
                        <td class="form-group"> 
                            <select class="form-control select2" name="data[$index].um_menu_id" id="data[$index].um_menu_id" data-ng-model="data[$index].um_menu_id" >
                                <?php
                                    $GET_MENU = $this->db->query("SELECT * FROM um_menu ORDER BY nama ASC");
                                    foreach($GET_MENU->result() as $rsData):
                                        echo "<option value=\"".$rsData->um_menu_id."\">".$rsData->nama."</option>";
                                    endforeach;
                                ?>
                            </select>
                        </td>
                      </tr>
                     
                     <tr>
                        <td colspan="2">
                            <button class="btn btn-danger btn-sm" data-ng-click="tambah()">Tambah Data</button>
                            <button type="button"  data-ng-click="simpan()" >Simpan</button>
                            <button type="button" class="btn btn-danger btn-sm" onclick="resetButton()">Batal</button>
                        </td>
                     </tr>                            
                </tbody>
            </table>
        
        
        
        
        
               

    </body>
</html>
    
<script>
     angular.module('bab1', [])

    .controller('MainController',function($scope,$http){
        //set type data 'data' dengan object
        $scope.data = [{um_akses_id  : '',  um_menu_id : ''} ];
        //fungsi tambah inputan
        $scope.tambah = function(){
            $scope.data.push({um_akses_id  : '',  um_menu_id : ''});
        };
        
        //fungsi simpan
        $scope.simpan = function(){
            $http.post('<?php echo base_url('ummenuakses/savedata/'); ?>',$scope.data).success(function(response){
                if(response > 0){
                    $scope.data = [{um_akses_id  : '',  um_menu_id : ''} ];
                    $scope.pesan = response +' Data telah berhasil di simpan';
                    $scope.$apply();
                    window.location = BASE_URL + 'ummenuakses';
                }
            });
        }
    })
</script>             
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    
    
  });
</script>

</form>