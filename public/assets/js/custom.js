$(document).ready(function(){
	$('.add_to_cart_btn').click(function(event) {
		var idProduct=$(this).attr('data-idProduct');
		$.get("cart/add-cart/"+idProduct,function(data){
                    alert(data);
                });
	});
});