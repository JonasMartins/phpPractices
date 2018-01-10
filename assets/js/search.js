$(function() {
	$('.search').keyup(function() {
		var search = $(this).val();
		$.post('http://localhost/twitter/core/ajax/search.php', 
			{search:search},
			funtcion(data){
				$('search-result').html(data);
			});
	});
})