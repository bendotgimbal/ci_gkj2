    <script type="text/javascript">
        function addField() {
            $($('#template').html()).appendTo('#field_grid tbody');
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
    </script>
<fieldset>
    <legend>Test</legend>
    <div id="field">
        <table id="field_grid">
            <tr>
                <th>One</th>
                <th>Two</th>
                <th>Three</th>
            </tr>
            <tr>
                <td>
                    <input type="text" value=""  name="one[]" placeholder="One" />
                </td>
                <td>
                    <input type="text" value=""  name="two[]" placeholder="Two" />
                </td>
                <td>
                    <a href="#" class="btn-remove">Delete</a>
                    <a href="#" class="btn-up">Up</a>
                    <a href="#" class="btn-down">Down</a>
                </td>
            </tr>
        </table>
    </div>
    <div class="action-buttons btn-group">
        <input type="submit" class="btn btn-primary" />
        <button id="add_field">Add Field</button>
    </div>
</fieldset>
<script type="text/template" id="template">
     <tr>
        <td>
            <input type="text" value=""  name="one[]" placeholder="One" />
        </td>
        <td>
            <input type="text" value=""  name="two[]" placeholder="Two" />
        </td>
        <td>
            <a href="#" class="btn-remove">Delete</a>
            <a href="#" class="btn-up">Up</a>
            <a href="#" class="btn-down">Down</a>
        </td>
    </tr>
</script>
