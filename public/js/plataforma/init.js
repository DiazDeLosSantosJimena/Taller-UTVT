(function($){
  $(function(){

    $('.sidenav').sidenav();

  }); // end of document ready
})(jQuery); // end of jQuery name space

document.addEventListener('DOMContentLoaded', function() {
  var elems = document.querySelectorAll('.materialboxed');
  var instances = M.Materialbox.init(elems);
});

document.addEventListener('DOMContentLoaded', function() {
  var elems = document.querySelectorAll('.modal');
  var instances = M.Modal.init(elems);
});

document.addEventListener('DOMContentLoaded', function() {
  var elems = document.querySelectorAll('.carousel');
  var instance = M.Carousel.init(elems,{
    fullWidth: true,
    indicators: true
  });
});

document.addEventListener('DOMContentLoaded', function() {
  var elems = document.querySelectorAll('.fixed-action-btn');
  var instances = M.FloatingActionButton.init(elems);
});


document.addEventListener('DOMContentLoaded', function() {
  var elems = document.querySelectorAll('.tap-target');
  var instances = M.TapTarget.init(elems);
});

document.addEventListener('DOMContentLoaded', function() {
  // Selecciona el elemento del tap target
  const tapTarget = document.querySelector('.tap-target');
  // Inicializa el componente
  const instance = M.TapTarget.init(tapTarget);

  // Activa el tap target automáticamente
  instance.open();

  // Opcional: cierra automáticamente después de unos segundos
  setTimeout(() => instance.close(), 3000);
});