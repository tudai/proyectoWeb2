
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



$(function(){
	$('body').on('click', '#admin-list-books', function(event){
		event.preventDefault();
		listBooks();
	});
	$('body').on('click', '#admin-list-section', function(event){
		event.preventDefault();
		listSections();
	});
})
