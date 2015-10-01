function getLocalServerURL(){
	return ((location.href.split('/'))[0])+'//'+((location.href.split('/'))[2]) + "/";
}

function getSiteURL(){
	return getLocalServerURL() + 'proyectoWeb2/';
}


function loadSiteComponent(path, target, callback){
  $.ajax({
    method: 'GET',
    url: getSiteURL() + 'index.php?action=' + path,
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
function sendBookToServer(path, target){
    var datos = new FormData($('#uploadBook')[0]);
    datos.append('bookSection', $('select[name="bookSection"] option:selected').attr('id'));

    $.ajax({
      type: "POST",
      url: getSiteURL() + "index.php?action="+path,
      data: datos,
      contentType : false,
      processData : false,
      success: function(data){
        alert(data);
      },
      error: function(){
        alert("Se produjo un erro de red. Charlale al admin para que lo arregle");
      },
    });
}

function sendContentToServer(path, FormID, callback){
	$.ajax({
		type: "POST",
		url: getSiteURL() + "index.php?action="+path,
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

$(function(){

  $('nav li > a').click(function(event){
	  event.preventDefault();
  	loadSiteComponent(this.id, '#content');
  })

  /* para que al cargar el catalogo se clickee automaticamente
   * el primer elemento de la lista
   */
  $('body').on('click', '#catalog', function(){
	  event.preventDefault();
	  	loadSiteComponent(this.id, '#content', function(){
	  		$('.list-group-item:first').click();
	  	});
  })

  $('body').on('click', '#uploadBook button', function(event){
	  event.preventDefault();
	  sendBookToServer($(this).attr('data-action'), 'content');
  })

  $('body').on('click', '#uploadSection button', function(event){
	  event.preventDefault();
	  sendContentToServer($(this).attr('data-action'), 'uploadSection', function(data){
		$('#content').html(data);
	  });
  })

  $('body').on('click', '.tableDB', function(event){
	  event.preventDefault();
	  loadSiteComponent('admin');
  })

  $('body').on('click', '.list-group-item', function(event){
		event.preventDefault();
		loadSiteComponent('booksList&id='+ this.id, '#bookList');
		$(this).addClass('active');
		$(this).siblings().removeClass('active');
  })



  /*
   * Se envía el contenido del formulario de login.
   */
  $('body').on('click', '#loginForm button', function(event){
	  event.preventDefault();
	  sendContentToServer($(this).attr('data-action'), 'loginForm', function(data){
		  $('body').html(data);
	  });
  })

  $('body').on('click', '#logout', function(event){
	  event.preventDefault();
	  loadSiteComponent('logout', 'body');
  	})
  	

})
