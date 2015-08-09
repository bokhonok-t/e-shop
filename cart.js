$(document).ready(function () {
	$('button').click(function () {
		var id = $(this).attr('id');
		$.post("backend/add_to_cart.php", {id: id}, update_cart);
		
	});
	
	function update_cart() {
		$.post("backend/update_cart.php", {}, on_success);
		function on_success(html) {
			$('.small_cart').html(html);
			alert(html);
		}
	}
	
});

