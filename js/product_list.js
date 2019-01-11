$(document).ready(function(){
    $('.btn-delete').click(function() {
        current_status = $(this).data('status');
        product_id = $(this).prev('.btn-change').prev('.product-price-block').prev('.product-title-block').prev('.product-id-block').children('#product-id').text();
        console.log(product_id);
        $(".product_number_delete").val(product_id);

    });

    $('.btn-change').click(function() {
        current_status = $(this).data('status');
        product_id = $(this).prev('.product-price-block').prev('.product-title-block').prev('.product-id-block').children('#product-id').text();
        product_title = $(this).prev('.product-price-block').prev('.product-title-block').children('#product-title').text();
        product_price = $(this).prev('.product-price-block').children('#product-price').text();

        $('.product-title').val(product_title);
        $('.product-price').val(product_price);
        $(".product_number_change").val(product_id);

    });
    // $('#product-delete-form').submit(function() {
    //     $.ajax({
    //         method:'post',
    //         url:'product_delete.php',
    //         data:{
    //             product_id: product_id
    //         },
    //         success: function(response) {
    //             console.log(213);
    //         }
    //     });
    // });
});
