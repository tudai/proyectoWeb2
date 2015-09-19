function getLocalServerURL(){
	return ((location.href.split('/'))[0])+'//'+((location.href.split('/'))[2]) + "/";
}

function loadSection (path, target){
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

$(function(){
  $('nav li > a').click(function(event){
    event.preventDefault();
    loadSection(this.id, 'content');
  })
})
