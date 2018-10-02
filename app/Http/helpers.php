<?php
function generate_product_id(){
    return rand(1111, 9999).str_shuffle(substr(time(), 6));
}
?>