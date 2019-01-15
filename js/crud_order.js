$(document).ready(function() {

    var price = 0;
    var id = 0;
    
    $(".product-select").change(function(){
        price = $(".product-select option:selected").data('price'); 
        $(this).parent().find('.form-price').attr('placeholder',price);
        $(this).parent().find('.form-price').val('');
        id =  $(this).val();

        countTotal();

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
        new_product.find('.form-count').attr('placeholder','');
        new_product.find('.form-count').val('1');

        new_product.find('input').attr('placeholder','');
        $(this).prev().after(new_product);
        new_product.find('.form-size').empty();

        new_product.find('.form-price').change(function(){
            countTotal();
        });

        new_product.find('.form-count').change(function(){
            countTotal();
        });

        new_product.find('.product-select').change(function(){
            id = new_product.find("option:selected").val(); 
            price = new_product.find("option:selected").data('price'); 
            new_product.find('input').attr('placeholder',price);

            countTotal();

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
                        });
                    }
                }
            });
        });
    });

    $(".form-price").change(function(){
        countTotal();
    });

    $(".form-count").change(function(){
        countTotal();
    });

    $("#create").submit(function(){

        var status = $("#InputStatus").val();
        var adress = $("#InputAdress").val();
        var user_id = $("#InputUserId").val();
        var products = [];

        $(".product-select").each(function(){
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
                $('.receiver').animate({
                    top:'-90px'
                },1000);
                if (response != 0) {
                    number = JSON.parse(response);
                    $('.receiver').html('ВАШ ЗАКАЗ ДОБАВЛЕН! НОМЕР ЗАКАЗА - ' + number + '.');
                } else {
                    $('.receiver').html('ЗАПОЛНИТЕ ВСЕ ПОЛЯ!');
                }
                setTimeout(function() {
                    $('.receiver').animate({
                        top:'-180px'
                    },1000);
                }, 3000);
            }
        });

        return false;
    });

    $("#update").submit(function(){

        var status = $("#InputStatus").val();
        var adress = $("#InputAdress").val();
        var user_id = $("#InputUserId").val();
        var products = [];
        var order_id = $("#OrderId").val();

        $(".product-select").each(function(){
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
            url:'order_update.php',
            data:{
                status: status,
                adress: adress,
                user_id: user_id,
                products: products,
                order_id: order_id,
            },
            success: function(response) {
                $('.receiver').animate({
                    top:'-90px'
                },1000);
                if (response != 0) {
                    $('.receiver').html('ВАШ ЗАКАЗ ИЗМЕНЕН!');
                } else {
                    $('.receiver').html('ЗАПОЛНИТЕ ВСЕ ПОЛЯ!');
                }
                setTimeout(function() {
                    $('.receiver').animate({
                        top:'-180px'
                    },1000);
                }, 3000);
            }
        });

        return false;
    });

    $(".DeleteProduct").on('click',function(){
        
        $(this).parent().remove();
        countTotal();
        
    });
});

function countTotal() {

    var totals = [];

    $('.form-price').each(function(){
        totals.push({
            price: $(this).val() ? $(this).val() : $(this).attr('placeholder'),
            count: $(this).parent().find('.form-count').val() ? $(this).parent().find('.form-count').val() : 0,
        });
    });

    var totalprice = 0;

    $.each(totals, function(index,total) {
        totalprice = totalprice + total['price']*total['count'];
    });

    $('#InputTotal').text(totalprice + ' руб');

}
