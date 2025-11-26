$( document ).ready(function() { /*** Begin Ready Function ***/
setInterval(slidePic, 5000);
var runImage = 1;
function slidePic() {
    $("#run" + runImage).hide();
    if (runImage == 3) {
        runImage = 1;
        $("#run" + runImage).show();
    } else {
        runImage += 1;
        $("#run" + runImage).show();
    }
}
var sWidth = $(window).width();
var pathname = window.location.pathname;
//alert(pathname);
$(".product span.onsale").css("background-color","red");
$(".product span.onsale").css("color","white");
//$(".add_to_cart_button").text(sWidth);
if ( pathname !== "/" ) {
	$("h1.woocommerce-products-header__title").show();
	$("storefront-sorting-2, select.orderby").css("display","none");
}
if ( pathname == "/" ) {
	var sortHtml = $(".storefront-sorting").html();
	$(".storefront-sorting-2").html( sortHtml );
}
}); /*** End Ready Function ***/
