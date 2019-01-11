$(document).ready(function() {

    var price = 0;
    var id = 0;
    
    $(".form-select").change(function(){
        price = $(".form-select option:selected").data('price'); 
        $(this).parent().find('input').attr('placeholder',price);
        id =  $(this).val();

        $.ajax({
            method:'POST',
            url:'order_create_product_size.php',
            data:{
                id: id,
            },
            success: function(response) {
                if (response) {
                    data = JSON.parse(response);
                    $(".form-size").find('.size-option-zero').remove();
                    $(".form-size").find('.size-option').remove();
                    var i = 0;
                    $(data).each(function(){
                        $(".form-size").append($("<option></option>", {value: data[i]['id'], class: "size-option", text: data[i]['value']}));
                        i++;
                    })
                }
            }
        });
    })

    $("#AddProduct").on('click',function(){
        
        var new_product = $(this).prev().clone();
        new_product.find('.form-price').val('');
        new_product.find('.form-count').val('1');

        // var price_source_total = $(this).prev().parent().find('.form-price');
        // var count_source_total = $(this).prev().parent().find('.form-count');
        // var price_total = price_source_total.val() ? price_source_total.val() : price_source_total.attr('placeholder');
        // var count_total = count_source_total.val();
        // var total_zero = price_total*count_total;

        countTotal();

        $('#InputTotal').text(total_zero);
        new_product.find('input').attr('placeholder','');
        $(this).prev().after(new_product);
        new_product.find('.form-size').empty();


        new_product.find('.form-select').change(function(){
            id = new_product.find("option:selected").val(); 
            price = new_product.find("option:selected").data('price'); 
            new_product.find('input').attr('placeholder',price);

            $.ajax({
                method:'POST',
                url:'order_create_product_size.php',
                data:{
                    id: id,
                },
                success: function(response) {
                    if (response) {
                        data = JSON.parse(response);
                        new_product.find('.size-option').remove();
                        new_product.find('.new-size-option').remove();
                        var i = 0;
                        $(data).each(function(){
                            new_product.find($(".form-size")).append($("<option></option>", {value: data[i]['id'], class: "new-size-option", text: data[i]['value']}));
                            i++;
                        })
                    }
                }
            });
        })
    })

    $("#create").submit(function(){

        var status = $("#InputStatus").val();
        var adress = $("#InputAdress").val();
        var user_id = $("#InputUserId").val();
        var products = [];

        $(".form-select").each(function(){
            var price_source = $(this).parent().find('.form-price');
            var count_source = $(this).parent().find('.form-count');

            products.push({
                product_id: $(this).val(),
                size_id: $(this).parent().find('.form-size').val(),
                price: price_source.val() ? price_source.val() : price_source.attr('placeholder'),
                count: count_source.val(),
            });
        })

        $.ajax({
            method:'POST',
            url:'order_create.php',
            data:{
                status: status,
                adress: adress,
                user_id: user_id,
                products: products,
            },
            success: function(response) {
                if (response) {
                    $('.receiver').animate({
                        top:'-90px',
                        'opacity':1
                    },1000);
                    $('.receiver').html('ВАШ ЗАКАЗ ДОБАВЛЕН!');
                }
            }
        });

        return false;
    });
});

function countTotal() {
    
}
