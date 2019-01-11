$(document).ready(function(){
  
    $('.btn-order-id').click(function() {
        var order_id = $(this).data('id');  

        $.ajax({
            type:"POST",
            url:'order_product.php',
            data: { order_id },
            success: function(products) {
                products = JSON.parse(products)
                var html_code = '<table class="table">'+
                                   '<thead>' +
                                        '<tr>'+
                                            '<th>Артикул</th>'+
                                            '<th>Фото</th>'+
                                            '<th>Описание товара</th>'+
                                            '<th>Размер</th>'+          
                                            '<th>Кол-во</th>'+
                                            '<th>Цена</th><tbody>'+
                                        '</tr>'+
                                    '</thead>';
                products.forEach( function(product) {
                    html_code += '<tr><td>'+product.id+'</td>'+
                                            '<td>Картинка</td>'+
                                            '<td>'+product.title+'</td>'+
                                            '<td>'+product.size+'</td>'
                                            '<td>'+product.count+'</td>'+
                                            '<td>'+product.price+'</td></tr>'
                 });
                 html_code +='</tbody></table>';
                 console.log(products);
                
            }
        });
    });    
});


