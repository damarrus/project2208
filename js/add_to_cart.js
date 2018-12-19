$(document).ready(function() {
    
    $('.product-button').click(function() {
        var title = $('.product-title').text();
        var price = $('.product-price').text();

        // console.log(price);
        // var data = {
        //     title: title,
        //     price: price
        // }

        // data = JSON.stringify(data);
        // console.log(data);
        $.ajax({
            method:'post',
            url:'add_to_cart.php',
            data:{
                title: title,
                price: price
            },
            success:function(response) {
                $("#total_cart").html(response);
            }
        });
        // var xhr = new XMLHttpRequest();
        // xhr.open('POST', 'add_to_cart.php', true);
        // xhr.setRequestHeader('Content-type', 'application/json');
        // xhr.send(data);

        // var xhr = $.ajax({
        //     type: "POST",
        //     url: 'add_to_cart.php',
        //     data: data,
        //     success: true,
        //     dataType: 'Content-type'
        // });

        // xhr.onreadystatechange = function() {
        //     if (xhr.readyState != 4) {
        //         return;
        //     }
        //     var response = JSON.parse(xhr.responseText);
        //     console.log(response); 
        // }
    });
});
