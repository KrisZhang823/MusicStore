function ajaxCall(){
		$.ajax({
			type: 'GET',
			url: 'phps/get_all_albums.php',
			dataType: 'json',
			success: function(response) {
				lists = "<tr><th>Album_id</th><th>Album_name</th><th>Description</th><th>Price</th>" + 
				"<th>Imagepath</th><th>Is_delete</th><th>Inventory</th></tr>";
				$.each(response, function(k, album) {
					console.log(k, album);
					lists += "<tr><td>" + album['Album_id'] + "</td>" +
						"<td>" + album['Title'] + "</td>" +
						"<td>" + album['Description'] + "</td>" + 
						"<td> " + album['Price'] + "</td>" + 
						"<td><img src=\"" + album["Imagepath"] + "\" class=\"listimg\"></td>" + 
						"<td>" + album['Is_delete'] + "</td>" +
						"<td>" + album['Inventory'] + "</td>" +
 						"</tr>";
				});
				$("#lists").html(lists);
			}
		});
}





$(document).ready(function() {
	// once in, call all
	ajaxCall();

});