<script type="text/javascript" >
    function get_product_brand(val) {
        $.ajax({
            type: "POST",
            url: "{{route('product.ajax.getBrand')}}",
            data:{_token:'{{csrf_token()}}',type_id:val},
            success: function(data){
                $('#product_brand').html("<option value=\"\">Choose</option>");
                $.each(data, function(key, value) {
                    $('#product_brand')
                    .append($("<option></option>")
                    .attr("value",value.id)
                    .text(value.name));
                });
            }
        });
    }
    
    </script>
   