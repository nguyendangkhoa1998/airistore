$(document).ready(function(){
	$('.col-12 #btn-submit').click(function(event) {
		/* Act on the event */
		var name = $('.col-12 #name').val();
		var email = $('.col-12 #email').val();
		var content = $('.col-12 #content').val();
		var product_id = $('.col-12 #product_id').val();
		$.ajax({
			url: 'post-comment',
			type: 'GET',
			dataType: 'text',
			data : {
		        name  : name,
		        email : email,
		        content : content,
		        product_id : product_id
		    },
		    success : function(data){
		    	alert(data);
		    }
		})
		
	});
});