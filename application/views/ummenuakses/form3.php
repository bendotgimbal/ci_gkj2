<div class="select-container">
 

  <select class='select-to-select2'>
    <option value='1'>option1</option>
    <option value='2'>option2</option>
  </select>   <br />

</div>
<div>
  <button class="add-new-select">Add New Select</button>
</div>


<script type="text/javascript">  
$(document).ready(function() {

 //function to initialize select2
  function initializeSelect2(selectElementObj) {
    selectElementObj.select2({
      width: "80%",
      tags: true
    });
  }


 //onload: call the above function 
  $(".select-to-select2").each(function() {
    initializeSelect2($(this));
  });

 //dynamically added selects

  $(".add-new-select").on("click", function() {
    var newSelect = $("<select class='select-to-select2'  multiple><option>option 1</option><option>option 2</option><option>abc</option></select>");
    $(".select-container").append(newSelect);
    initializeSelect2(newSelect);
  });


});
</script>