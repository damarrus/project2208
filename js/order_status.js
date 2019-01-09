$(document).ready(function(){
    $('.btn-status').click(function() {
        current_status = $(this).data('status');
        order_id = $(this).prev('#order-block').children('.order-id').text();
        $('#status_order_btn').click(function(){
            $("#status_order_id").val(order_id);
        });

        switch(current_status) {
            case 0:
                $('#status_0').attr("selected","selected");
                break;
            case 1:
                $('#status_1').attr("selected","selected");
                break;
            case 2:
                $('#status_2').attr("selected","selected");
                break;
            case 3:
                $('#status_3').attr("selected","selected");
                break;
        }
    });
});

