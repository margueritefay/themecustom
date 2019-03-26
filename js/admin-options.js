jQuery(document).ready(function($){

  /*************************************************** */
  /*              ajout d'une image dans la page       */
  /*************************************************** */


  var frame = wp.media({
    title : 'Sélectionner une image',
    button: {
      text: 'Utiliser ce média'
    },
    multiple: false
  });

  $("#form-tc-options #btn_img_01").click(function(e){
    //quand on click on ne veut pas que l'évennement soit exécuté
    e.preventDefault();

    frame.open();
  });

  frame.on('select', function(){
    var objImg = frame.state().get('selection').first().toJSON();
    var monUrl = objImg.sizes.thumbnail.url;
    $("img#img_preview_01").attr('src', monUrl);
    $("input#tc_image_01").attr('value', monUrl);
    $("input#tc_image_url_01").attr('value', monUrl);
  });

}); //fin du jQuery
