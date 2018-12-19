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
    });
});
