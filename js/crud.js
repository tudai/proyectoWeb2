
function createHTML(book){
	$.ajax({
		url: 'js/templates/book.mst',
		success: function(template){
			
			console.log(template);
			console.log(book);
			var result = Mustache.render(template, book); 
			$('#listBooks').append(result);
		}, 
		error: function(){
			alert('se rompio todo');
		}
	})
}

function listBooks(){
	$.ajax({
		method: 'GET',
		url:'api/book',
		datatype: 'JSON',
		success: function(books){
			$('#content').html('');
			$('#content').html('<ul id="listBooks"></ul>');
			$.each( books, function( key, book ){
				createHTML(book);
			}); 
		},
	    error: function () {
	    	alert('Error');
		}
	});
}



$(function(){
	$('body').on('click', '#admin-list-books', function(event){
		event.preventDefault();
		listBooks();
	});

})
