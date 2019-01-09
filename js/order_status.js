$(document).ready(function(){
    $('.btn-status').click(function() {
        order_id = $(this).prev('#order-block').children('#order-id').text();
        $('#status_order_btn').click(function(){
            $("#status_order_id").val(order_id);
        });

        if ($(this).text() == 'Оформлен') {
            $('#status_0').attr("selected","selected")
        };
        if ($(this).text() == 'Оплачен') {
            $('#status_1').attr("selected","selected")
        };
        if ($(this).text() == 'Доставлен') {
            $('#status_2').attr("selected","selected")
        };

        if ($(this).text() == 'Отменен') {
            $('#status_3').attr("selected","selected")
        };
    });
});

