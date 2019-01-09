$(document).ready(function() {

    var price = 0;
    
    $(".form-select").change(function(){
        price = $(".form-select option:selected").data('price'); 
        $(this).parent().find('input').attr('placeholder',price);
    })

    $("#AddProduct").on('click',function(){
        var new_product = $(this).prev().clone();
        new_product.find('input').attr('placeholder','');
        $(this).prev().after(new_product);
        new_product.change(function(){
            price = new_product.find("option:selected").data('price'); 
            new_product.find('input').attr('placeholder',price);
            console.log(price);
        })
    })

    $("#create").submit(function(){

        var status = $("#InputStatus").val();
        var adress = $("#InputAdress").val();
        var user_id = $("#InputUserId").val();
        var products = [];

        $(".form-select").each(function(){
            products.push({
                product_id: $(this).val(),
                price: $(this).parent().find('input').attr('placeholder')
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
                    console.log('Заказ добавлен!');
                }
            }
        });

        return false;
    });
});
