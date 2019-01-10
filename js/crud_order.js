$(document).ready(function() {

    var price = 0;
    var id = 0;
    
    $(".form-select").change(function(){
        price = $(".form-select option:selected").data('price'); 
        $(this).parent().find('input').attr('placeholder',price);
        id =  $(this).val();
        console.log(id);

        $.ajax({
            method:'POST',
            url:'order_create_product_size.php',
            data:{
                id: id,
            },
            success: function(response) {
                if (response) {
                    data = JSON.parse(response);
                    $(".form-size").find('.size-option').remove();
                    var i = 0;
                    $(data).each(function(){
                        $("#create").find($(".form-size")).append($("<option></option>", {value: data[i]['id'], class: "size-option", text: data[i]['value']}));
                        i++;
                    })

                
                   console.log(data[0]['id']);
                }
            }
        });
    })

    $("#AddProduct").on('click',function(){
        var new_product = $(this).prev().clone();
        new_product.find('input').attr('placeholder','');
        $(this).prev().after(new_product);
        new_product.change(function(){
            id = new_product.find("option:selected").val(); 
            price = new_product.find("option:selected").data('price'); 
            new_product.find('input').attr('placeholder',price);
            console.log(id);
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
