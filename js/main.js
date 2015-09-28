function getLocalServerURL(){
	return ((location.href.split('/'))[0])+'//'+((location.href.split('/'))[2]) + "/";
}

function getSiteURL(){
	return getLocalServerURL() + 'proyectoWeb2/';
}


function loadSiteComponent(path, target){
  $.ajax({
    method: 'GET',
    url: getSiteURL() + 'index.php?action=' + path,
    dataType: 'html',
    success: function(data){
      $('#'+target).html(data);
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
    	  console.log(data);
        alert(data);
      },
      error: function(){
        alert("Se produjo un erro de red. Charlale al admin para que lo arregle");
      },
    });
}

$(function(){
  $('nav li > a').click(function(event){
    event.preventDefault();
    loadSiteComponent(this.id, 'content');
  })
  
  
  $('body').on('click', '#uploadBook button', function(event){
    event.preventDefault();
    sendBookToServer($(this).attr('data-action'), 'content');
  })

  
  
  
})
