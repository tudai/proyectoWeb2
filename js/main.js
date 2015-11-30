function getLocalServerURL(){
	return ((location.href.split('/'))[0])+'//'+((location.href.split('/'))[2]) + "/";
}

function getSiteURL(){
	return getLocalServerURL() + 'proyectoWeb2/';
}

function loadSiteComponent(path, target, callback){
  $.ajax({
    method: 'GET',
    url: getSiteURL() + path,
    dataType: 'html',
    success: function(data){
      $(target).html(data);
      if( typeof callback !== 'undefined' && jQuery.isFunction( callback ) ){
			callback();
		}
    },
    error: function(){
      alert('Se produjo un erro de red. Charlale al admin para que lo arregle');
    }
  })
}


function sendContentToServer(path, FormID, callback){
	$.ajax({
		type: "POST",
		url: getSiteURL() + path,
		data: $('#'+FormID).serialize(),
		success: function(data){
			if( typeof callback !== 'undefined' && jQuery.isFunction( callback ) ){
				callback(data);
			}
		},
		error: function( jqXHR, textStatus, errorThrown){
			alert(textStatus);
		}
	})
}

/*
 * Metodos asociados al CRUD - API
 * */

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
		success: function(data) {
			console.log(data);
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

function modifySection() {

	$.ajax({
		method: 'PUT',
		url: 'api/section/'+$('#updateSection').attr('data-id') +"/"+$('#sectionInput').val(),
		datatype: 'JSON',
		success: function(data){
			console.log(data);
			alert('Salió bien pió');
		},
		error: function(){
			alert('No se hay modificado la seccion');
		}

	})
}

function saveSection() {
	$.ajax({
		method: 'POST',
		url:'api/section',
		datatype: 'JSON',
		success: function(){
			 alert('anduvo');
		},
			error: function () {
				 alert("Se produjo un erro de red. Charlale al admin para que lo arregle");
		}
	});
}

function saveBook(){
	var datos = new FormData($('#uploadBook')[0]);
    datos.append('bookSection', $('select[name="bookSection"] option:selected').attr('id'));

	$.ajax({
		method: 'POST',
		url:'api/book',
		datatype: 'JSON',
        data: datos,
	    contentType : false,
	    processData : false,
		success: function(data){
			 alert(data);
		},
	    error: function () {
	    	 alert("Se produjo un erro de red. Charlale al admin para que lo arregle");
		}
	});
}


$(function(){

  $('nav li.action > a').click(function(event){
	 event.preventDefault();
  	 loadSiteComponent(this.id, '#content');
  })

  
  /* para que al cargar el catalogo se clickee automaticamente
   * el primer elemento de la lista
   */
  $('body').on('click', '#catalog', function(){
		event.stopPropagation();
	  	loadSiteComponent(this.id, '#content', function(){
	  		$('.list-group-item:first').click();
	  	});
  })

  $('body').on('click', '.list-group-item.sec', function(event){
		event.preventDefault();
		loadSiteComponent('books-list/'+ this.id, '#bookList');
		$(this).addClass('active');
		$(this).siblings().removeClass('active');
  })

  $('body').on('click', '#listSections a.modifySection', function(event){
		event.stopPropagation();
	  id=$(this).data("id");
	  loadSiteComponent('editFormSection', '#content', function(){
		  $('#updateSection').attr('data-id', id);
	  });
  })
  
  $('body').on('click', '#listSections a.deleteSection', function(event){
	event.stopPropagation();
	var id=$(this).data("id");
	deleteSection(id);
  });  

  /*
   * Se envía el contenido del formulario de login.
   */
  $('body').on('click', '#loginForm button', function(event){
	  event.preventDefault();
	 event.stopPropagation();
	  sendContentToServer($(this).attr('data-action'), 'loginForm', function(data){
		  $('body').html(data);
	  });
  })

  $('body').on('click', '#logout', function(event){
	event.stopPropagation();
	loadSiteComponent('logout', 'body');
  })

  $('body').on('click', '#listBooks a.deleteBook', function(event){
		event.stopPropagation();
	var id=$(this).data("id");
	deleteBook(id);
  });
  

  $('body').on('click', '#updateSection', function(event){
	event.preventDefault();
	event.stopPropagation();
	modifySection('modifySection');
  });  
  

  $('body').on('click', '#admin-list-books', function(event){
	event.stopPropagation();
	listBooks();
  });
  

  $('body').on('click', '#admin-list-section', function(event){
		event.stopPropagation();
	listSections();
  }); 

  $('body').on('click', '#addBook', function(event){
		event.preventDefault();
		event.stopPropagation();
	saveBook();
  });
  
})
