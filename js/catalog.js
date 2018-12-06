$(document).ready(function(){
    console.log(123);
    $('.catalog_list-item').click(function (event){

        $(this).children('.catalog_list-item-list').slideToggle();
        event.stopPropagation();
        $(this).removeClass("catalog_list-item").addClass("catalog_list-item_e");

        $('.catalog_list-item_e').click(function (){
            $(this).removeClass("catalog_list-item_e").addClass("catalog_list-item");
        });

    });
})