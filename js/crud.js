function createHTML(book) {
  $.ajax({ url: 'js/templates/book.mst',
     success: function(template) {
       var rendered = Mustache.render(template,book);
       $('#listBooks').append(rendered);
      }
    });
}

function listBooks(){
	$.ajax({
	method: 'GET',
	url:'api/AdminApi',
	datatype: 'JSON',
	success: function(idBook){
		$('#listBooks').html('');
	      book.forEach(function(book){
	         var html = createHTML(book);
	        $('#listBooks').append(html);
	      });
	      console.log(book);
	    },
	    error: function () {
	      alert('Error');
});
}



$(function(){

})
