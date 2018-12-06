$(document).ready(function(){
    console.log(123);
    $('.catalog_list-item').click(function (event){
        $(this).children('.catalog_list-item-list').slideToggle();
        event.stopPropagation();
    });
})