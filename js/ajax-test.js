jQuery(document).ready(function($){

  $('form#form-ajax-test').on('submit', function(e){
    e.preventDefault();
    console.log(ajaxVars.url);
    console.log(ajaxVars.truc);
  });//fin du submit

});//fin du ready
