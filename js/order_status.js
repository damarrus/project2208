$(document).ready(function(){
    $('.btn-status').click(function() {
        order_id = $(this).prev('#order-block').children('#order-id').text();
        $('#status_order_btn').click(function(){
            $("#status_order_id").val(order_id);
        });
    });
    
});