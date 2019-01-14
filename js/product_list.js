$(document).ready(function(){
    $('.btn-delete').click(function() {
        current_status = $(this).data('status');
        product_id = $(this).prev('.btn-change').prev('.product-price-block').prev('.product-title-block').prev('.product-id-block').children('#product-id').text();
        // console.log(product_id);

    });

    $('.btn-change').click(function() {
        // current_status = $(this).data('status');
        product_id = $(this).prev('.product-price-block').prev('.product-title-block').prev('.product-id-block').children('#product-id').text();
        product_title = $(this).prev('.product-price-block').prev('.product-title-block').children('#product-title').text();
        product_price = $(this).prev('.product-price-block').children('#product-price').text();
        category_id = $(this).nextAll().children('#category_id').val();
        console.log(category_id);
        collection_id = $(this).nextAll().children('#collection_id').val();
        // console.log(collection_id);
        $(".product_number_delete").val(product_id);
        $("#product_collection_area").val(collection_id);

        $('.product-title').val(product_title);
        $('.product-price').val(product_price);
        $(".product_number_change").val(product_id);
        
        current_category = $('.current-category-' + category_id).val();
        console.log(current_category)
        if (current_category == category_id) {
            $('.current-category-' + current_category).attr("selected","selected");
        }
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
