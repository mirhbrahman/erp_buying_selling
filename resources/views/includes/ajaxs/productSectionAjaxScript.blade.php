<script type="text/javascript" >
    function get_category(val) {
        $.ajax({
            type: "POST",
            url: "{{route('product.ajax.getCategory')}}",
            data:{_token:'{{csrf_token()}}',type_id:val},
            success: function(data){
                $('#category').html("<option value=\"\">Choose</option>");
                $.each(data, function(key, value) {
                    $('#category')
                    .append($("<option></option>")
                    .attr("value",value.id)
                    .text(value.name));
                });
            }
        });
    }
    
    
    function get_sub_category(val) {
        $.ajax({
            type: "POST",
            url: "{{route('product.ajax.getSubCategory')}}",
            data:{_token:'{{csrf_token()}}',cat_id:val},
            success: function(data){
                $('#sub_category').html("<option value=\"\">Choose</option>");
                $.each(data, function(key, value) {
                    $('#sub_category')
                    .append($("<option></option>")
                    .attr("value",value.id)
                    .text(value.name));
                });
            }
        });
    }
    </script>
   