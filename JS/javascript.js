$(window).load(function() {
    $('.flexslider').flexslider();
  });

$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').focus()
})

$('#Mensajes').on('shown.bs.modal', function () {
        $('#myInput').focus()
})

$('#Perfil').on('shown.bs.modal', function () {
        $('#myInput').focus()
})

$('#ModificarPropiedad').on('shown.bs.modal', function () {
        $('#myInput').focus()
})