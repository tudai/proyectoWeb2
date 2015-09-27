function getLocalServerURL(){
	return ((location.href.split('/'))[0])+'//'+((location.href.split('/'))[2]) + "/";
}

function loadSiteComponent(path, target){
  $.ajax({
    method: 'GET',
    url: getLocalServerURL() + 'proyectoWeb2/index.php?action=' + path,
    dataType: 'html',
    success: function(data){
      $('#'+target).html(data);
    },
    error: function(){
      alert('nop');
    }
  })
}
// if (status){
// 		var info = {
// 				"group": getGroupNumber(),
// 				"thing": $('#loadData-page').find('form').serializeArray(),
// 			}
// $.ajax({
// 			url: getRemoteServerURL() + 'create',
// 			method: 'post',
// 			dataType: 'json',
// 			data: JSON.stringify(info),
// 			contentType: "application/json; charset=utf-8",
// 			success: function(result){
// 				if (result.status == "OK")
// 					$('#statusMessage').addClass('text-success').html('Se guardo con éxito la información');
// 				else
// 					$('#statusMessage').addClass('text-danger').html('Se produjo un error al guardar la información');
// 			},
// 			error: function(){
// 				alert('Ops, se ha producido un error de red desconocido. Por favor, contacte al Ministerio de Defensa');
// 			}
//
// 		});

function sendInfoServer(path, target){
	var info = {
		"data": $('.uploadForm').serializeArray()
	}
	$.ajax({
		method:'POST',
		url: getLocalServerURL() + 'proyectoWeb2/index.php?action=' + path,
		dataType: 'text',
		contentType: 'multipart/form-data',
		data: $('.uploadForm').serializeArray(),
		success: function(data){
			alert('funciono');
		}
	})

}



$(function(){
  $('nav li > a').click(function(event){
    event.preventDefault();
    loadSiteComponent(this.id, 'content');
  })
  
  
  $('body').on('click', '.uploadForm button', function(event){
    event.preventDefault();
    sendInfoServer($(this).attr('data-action'), 'content');
  })

  
  
  
})
