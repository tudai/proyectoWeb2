function createHTML(book) {
  $.ajax({ url: 'js/templates/book.mst',
     success: function(template) {
       var rendered = Mustache.render(template,book);
       $('#listBooks').append(rendered);
      }
    });
}

function listBooks(book){
	$.ajax({
	method: 'GET',
	url:'api/AdminApi',
	datatype: 'JSON',
	data: book,
	success: function(idBook){
		book.id=idBook;
		var html = crearTareaHTML(book);
		$('#listBooks').append(html);
	},
	error: function () {
		alert('Error');
	}
});
}



$(function(){

})
