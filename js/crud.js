
function createBookHTML(book){
	$.ajax({
		url: 'js/templates/book.mst',
		success: function(template){
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
			$('#libro'+idBook).remove();
		},
		error: function(){
			alert('Error! No se ha borrado el libro');
		}
});
}

function deleteSection(idSection) {
	$.ajax({
		method: 'DELETE',
		url: 'api/section/'+idSection,
		success: function(data) {
			console.log(data);
			if (data)
				$('#seccion'+idSection).remove();
			else
				alert('No se puede borrar la seccion porque hay libros asociados');
		},
		error: function(){
			alert('Error! No se ha borrado la seccion');
		}
});
}

function modifySection(formID) {
	$.ajax({
		method: 'PUT',
		url: 'api/section',
		data: $('#'+formID).serialize(),
		success: function(){
			alert('Salió bien pió');
		},
		error: function(){
			alert('No se hay modificado la seccion');
		}

	})
}

$(function(){
	$('body').on('click', 'a.deleteS', function(event){
		event.preventDefault();
		var id=$(this).data("id");
		deleteSection(id);
	});
	$('body').on('click', 'a.deleteB', function(event){
		event.preventDefault();
		var id=$(this).data("id");
		deleteBook(id);
	});
	$('body').on('click', '#modifySection button', function(event){
		event.preventDefault();
		modifySection('modifySection')

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
