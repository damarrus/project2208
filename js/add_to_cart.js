$(document).ready(function() {

    $('.product-button').click(function() {

        function getQueryParams(qs) {
            qs = qs.split("+").join(" ");
            var params = {},
                tokens,
                re = /[?&]?([^=]+)=([^&]*)/g;
        
            while (tokens = re.exec(qs)) {
                params[decodeURIComponent(tokens[1])]
                    = decodeURIComponent(tokens[2]);
            }
        
            return params;
        }
        
        var $_GET = getQueryParams(document.location.search);

        console.log($_GET);

        var product_id = $_GET['product_id'];
        // var title = $('.product-title').text();
        // var price = $('.product-price').text();

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
                product_id: product_id,
            },
            success: function(response) {
                var i = 0;
                if (response = true) {
                    i++;
                    $("#total_cart").html(i);
                }
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
