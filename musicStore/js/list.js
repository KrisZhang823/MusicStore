$(document).ready(function(){

	var url = window.location.href;
	path = url.split('&');
	idx = path[0].indexOf('=');
	curpage = path[0].substring(idx+1);

	artistName = 'all';
	if(path.length>1){
		idx = path[1].indexOf('=');
		artistName = path[1].substring(idx+1);
	}

	$.ajax({
		type: 'GET',
		url: 'phps/get_albums.php',
		dataType: 'json',
		data:{ page: curpage, artist: artistName},
		success: function(response){

			pages = response['pages'];
			ablums = response['albums'];
			page = response['page'];

			paginginfo = "";
			if (artistName == 'all') {
				for (var i = 1; i <= pages; i++) {
					paginginfo += "<li><a href=\"list.php?page=" +i + "\">" + i + "</a></li>";
				}
			} else {
				for (var i = 1; i <= pages; i++) {
					paginginfo += "<li><a href=\"list.php?page=" +i + "&artist=" + artistName + "\">" + i + "</a></li>";
				}
			}


			$("#paging_link").html(paginginfo);
			main = "";
			$.each(ablums,function(k,album){
				console.log(k, album);

				// deals with stock situation
				if (album['inventory'] == 0 ) {
					button = "<a href= \"#\" class=\"btn btn-danger pull-right\" role=\"button\">Out of Stock</a>";
				} else {
					button = "<a href=\"cart.php?id=" + album["album_id"] + "\" class=\"btn btn-success pull-right\" role=\"button\">Add to Cart</a>";
				}

				main += "<div class=\"col-sm-8 col-md-4\">" +
				"<div class=\"thumbnail\">" +
				"<img src=\"" + album["imagepath"] +"\" class=\"img-responsive\">" +
				"<div class=\"caption\">" +
				"<h3> " +album["title"] + "</h3>" + 
				"<p class = \"description\">" + album["description"] + "</p>" + 
				"<div class= \"clearfix\">" +
				"<div class=\"price pull-left\"> $ " + album["price"] + "</div>" +
				button + 
				"</div></div></div></div>";

			});
			$("#main").html(main);
		}
	});
	
	
	$('#search').click(function(e){
		title = $('#searchval').val().trim();	
		if (title.length == 0)
			return;

		$.ajax({
			type: "GET",
			url: "phps/search.php",
			data: {album_title: title},
			dataType: 'json',
			success: function(response){

				pages = response['pages'];
				searchedalbums = response['albums'];
				page = response['page'];
				

				paginginfo = "";
				
				for (var i = 1; i <= pages; i++) {
					paginginfo += "<li><a href=\"list.php?search=" +title +"&page=" +i + "\">" + i + "</a></li>";
				}
				$("#paging_link").html(paginginfo);
				
				
				main = "<h1> Searched results for '" + title + "':</h1>";
				$.each(searchedalbums,function(k,album){
					console.log(k, album);

					// deals with stock situation
					if (album['inventory'] == 0 ) {
						button = "<a href= \"#\" class=\"btn btn-danger pull-right\" role=\"button\">Out of Stock</a>";
					} else {
						button = "<a href=\"cart.php?id=" + album["album_id"] + "\" class=\"btn btn-success pull-right\" role=\"button\">Add to Cart</a>";
					}

					main += "<div class=\"col-sm-8 col-md-4\">" +
					"<div class=\"thumbnail\">" +
					"<img src=\"" + album["imagepath"] +"\" class=\"img-responsive\">" +
					"<div class=\"caption\">" +
					"<h3> " +album["title"] + "</h3>" + 
					"<p class = \"description\">" + album["description"] + "</p>" + 
					"<div class= \"clearfix\">" +
					"<div class=\"price pull-left\"> $ " + album["price"] + "</div>" +
					button + 
					"</div></div></div></div>";

				});
				$("#main").html(main);
			}
		});
	});


});

