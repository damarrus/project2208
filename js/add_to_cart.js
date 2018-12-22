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

        var size = $('.sizes-item_e').text();
        console.log(size);


        $.ajax({
            method:'post',
            url:'add_to_cart.php',
            data:{
                product_id: product_id,
                size: size,
            },
            success: function(response) {
                var i = 0;
                if (response) {
                    i++;
                    $("#total_cart").html(response);
                }
            }
        });
    });

    $('.sizes-item').on('click',function (){
       
        $(this).removeClass("sizes-item").addClass("sizes-item_e");
        $(this).nextAll().removeClass("sizes-item_e").addClass("sizes-item");
        $(this).prevAll().removeClass("sizes-item_e").addClass("sizes-item");
        
    });

    
});
