$(document).ready(function(){
	$('#searchText').keyup(function(){
		var txt = $('#searchText').val();
		
		$.ajax({
			url:'getClient.php',
			method:"post",
			data:{search_name: txt},
			dataType:"text",
			success: function(data){
				$('#search-result').html(data);
			}

		});
	});
});