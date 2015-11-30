
function createBookHTML(book){
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
				createBookHTML(book);
			});
		},
	    error: function () {
	    	alert('Error');
		}
	});
}
function createSectionHTML(section){
	$.ajax({
		url: 'js/templates/section.mst',
		success: function(template){

			console.log(template);
			console.log(section);
			var result = Mustache.render(template, section);
			$('#listSections').append(result);
		},
		error: function(){
			alert('se rompio todo');
		}
	})
}
function listSections(){
	$.ajax({
		method: 'GET',
		url:'api/section',
		datatype: 'JSON',
		success: function(sections){
			$('#content').html('');
			$('#content').html('<ul id="listSections"></ul>');
			$.each( sections, function( key, section ){
				createSectionHTML(section);
			});
		},
	    error: function () {
	    	alert('Error');
		}
	});
}

function deleteBook(idBook) {
	$.ajax({
		method: 'DELETE',
		url: 'api/book/'+idBook,
		datatype: 'JSON',
		success: function() {
			$('#book'+idBook).remove();
		},
		error: function(){
			alert('Error! No se ha borrado');
		}
});
}



$(function(){
	$('body').on('click', 'a.deleteB', function(event){
		event.preventDefault();
		deleteBook(this.getAttribute('id_libro'));
	});
	$('body').on('click', '#admin-list-books', function(event){
		event.preventDefault();
		listBooks();
	});
	$('body').on('click', '#admin-list-section', function(event){
		event.preventDefault();
		listSections();
	});
})
