$(document).ready(function(){
    console.log(123);
    
    var arrow = 1;

    $('.catalog_list-item').on('click',function (){

        $(this).children('.catalog_list-item-list').slideToggle();

            if (arrow == 1) {
                $(this).removeClass("catalog_list-item").addClass("catalog_list-item_e");
                arrow = 2;
            } else if (arrow == 2) {
                $(this).removeClass("catalog_list-item_e").addClass("catalog_list-item");
                arrow = 1;
            }

    });

});